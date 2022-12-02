<?php include 'templates/header.php';
?>

<main class="container mt-4">
    <?php
    if (isset($_GET['c_name'])) {
        $c_name = $_GET['c_name'];
    ?>
        <h1 class="mb-4 text-center">Showing <?php echo "$c_name" ?></h1>
    <?php
    } else {
    ?>
        <h1 class="mb-4 text-center">All Post</h1>
    <?php
    }
    ?>


    <div class="row">
        <?php
        // Limiter Module
        $batas = 6;
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

        // Page Number
        $previous = $halaman - 1;
        $next = $halaman + 1;

        // Get actual rows of data
        if (isset($_GET['c_id'])) {
            $c_id = $_GET['c_id'];
            $sql = "SELECT c.name as kategori, article_id, title, content, img, `timestamp`, username AS author, name AS category FROM article AS a
            JOIN user AS u ON(a.user_id = u.id)
            JOIN category AS c ON(a.category_id = c.id) WHERE a.category_id = $c_id";
            if (isset($_GET['s'])) {
                $search = $_GET['s'];
                $sql .= " AND (content LIKE '%$search%' OR title LIKE '%$search%')";
            }
            $sql .= " ORDER BY `timestamp` DESC";
        } else if (isset($_GET['s'])) {
            $search = $_GET['s'];
            $sql = "SELECT article_id, title, content, img, `timestamp`, username AS author, name AS category FROM article AS a
            JOIN user AS u ON(a.user_id = u.id)
            JOIN category AS c ON(a.category_id = c.id) WHERE content LIKE '%$search%' OR title LIKE '%$search%' ORDER BY `timestamp` DESC";
        } else {
            $sql = "SELECT article_id, title, content, img, `timestamp`, username AS author, name AS category FROM article AS a
            JOIN user AS u ON(a.user_id = u.id)
            JOIN category AS c ON(a.category_id = c.id) ORDER BY `timestamp` DESC";
        }
        $articles = mysqli_query($connect, $sql);
        $jumlah_data = mysqli_num_rows($articles);
        $total_halaman = ceil($jumlah_data / $batas);

        // limiting data
        $query = "$sql limit $halaman_awal, $batas";
        $articles = mysqli_query($connect, $query);

        if (mysqli_num_rows($articles) > 0) {
            foreach ($articles as $article) {
                $excerpt = array_slice(explode(" ", $article['content']), 0, 15);
                $excerpt = strip_tags(implode(' ', $excerpt), '<ol><ul><li>') . '...';
        ?>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 bg_green">
                        <div class="card card_hover">
                            <?php
                            if ($article['img'] != '') {
                            ?>
                                <img src="<?= $article['img'] ?>" class="self-align-center">
                            <?php
                            } else {
                            ?>
                                <img src="img/nopicture.jpg" style="max-height: 170px;" class="align-self-center">
                            <?php
                            }
                            ?>
                            <div class="card-body">
                                <a class="fs-4 card-title text-decoration-none text-capitalize" href="view.php?a_id=<?= $article['article_id'] ?>"><?= $article['title'] ?></a>
                                <br>
                                <!-- <h5 class="card-title">/h5> -->
                                <small class="card-text text-muted">By <?= $article['author'] ?> in <?= $article['category'] ?></small>
                                <p class="card-text"><?= $excerpt ?></p>
                                <a href="view.php?a_id=<?= $article['article_id'] ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- Pagination Module -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" <?php if ($halaman > 1) {
                                                    echo "href='?halaman=$previous'";
                                                } ?>>Previous</a>
                    </li>
                    <?php
                    for ($x = 1; $x <= $total_halaman; $x++) {
                    ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $x ?>"><?= $x; ?></a></li>
                    <?php
                        // var_dump($total_halaman);
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                    echo "href='?halaman=$next'";
                                                } ?>>Next</a>
                    </li>
                </ul>
            </nav>
        <?php
        } else {
        ?>
            <p class="text-center">No Article Found</p>
        <?php
        }
        ?>
    </div>
</main>

<?php include 'templates/footer.php'; ?>