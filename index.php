<?php include 'templates/header.php'; 
$sql = "SELECT article_id, title, content, img, `timestamp`, username AS author, name AS category FROM article AS a
JOIN user AS u ON(a.user_id = u.id)
JOIN category AS c ON(a.category_id = c.id) ORDER BY `timestamp` DESC";
$articles = mysqli_query($connect, $sql);
?>

<main class="container mt-4">
    <h1 class="mb-4 text-center">All Post</h1>
    <div class="row">
        <?php
            if(mysqli_num_rows($articles) > 0){
                foreach($articles as $article){
                    $excerpt = array_slice( explode( " ", $article['content'] ), 0, 15 );
                    $excerpt = strip_tags(implode(' ', $excerpt)) . '...';
        ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <?php
                    if($article['img'] != ''){
                ?>
                <img src="<?= $article['img'] ?>" class="self-align-center">
                <?php
                    } else{
                ?>
                <img src="img/nopicture.jpg" style="max-height: 170px;" class="align-self-center">
                <?php
                    }
                ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $article['title'] ?></h5>
                    <small class="card-text text-muted">By <?= $article['author'] ?> in <?= $article['category'] ?></small>
                    <p class="card-text"><?= $excerpt ?></p>
                    <a href="view.php?a_id=<?= $article['article_id'] ?>">Read More</a>
                </div>
            </div>
        </div>
        <?php
                }
            }
        ?>
    </div>
</main>

<?php include 'templates/footer.php'; ?>