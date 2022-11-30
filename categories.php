<?php include 'templates/header.php';

// Randoming Image
function randomImage()
{
    $images = glob('img/category/*');
    return $images[rand(0, count($images) - 1)];
}
?>

<main class="container mt-4">
    <h1 class="mb-4 text-center">All Category</h1>
    <div class="row">
        <?php
        // Limiter Module
        $batas = 6;
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

        // Page number
        $previous = $halaman - 1;
        $next = $halaman + 1;

        // Get actual data
        $sql = "SELECT id, name FROM category";
        $data = mysqli_query($connect, $sql);
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);

        // Limitting Data
        $query = "$sql limit $halaman_awal, $batas";
        $categories = mysqli_query($connect, $query);

        if (mysqli_num_rows($categories) > 0) {
            foreach ($categories as $category) {
                $excerpt = array_slice(explode(" ", $category['name']), 0, 15);
                $excerpt = strip_tags(implode(' ', $excerpt)) . '...';
        ?>
                <div class="col-md-4 mb-4">
                    <a href="index.php?c_id=<?= $category['id'] ?>&c_name=<?= $category['name'] ?>">
                        <div class="card">
                            <img class="card-img-top" src="<?= randomImage() ?>" />
                            <div class="card-img-overlay d-flex align-items-end p-0">
                                <h5 class="card-title text-bg-dark text-center p-4 mb-0 flex-fill bg-opacity-75"><?= $category['name'] ?></h5>
                            </div>
                        </div>
                    </a>
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
        }
        ?>
    </div>
</main>

<?php include 'templates/footer.php'; ?>