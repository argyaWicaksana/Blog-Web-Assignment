<?php
include 'templates/header.php';
$a_id = $_GET['a_id'];

$sql = "SELECT title, content, img, `timestamp`, username AS author, name AS category FROM article AS a
JOIN user AS u ON(a.user_id = u.id)
JOIN category AS c ON(a.category_id = c.id) WHERE article_id=$a_id";
$article = mysqli_query($connect, $sql);
$article = $article->fetch_assoc();
?>
<main class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4 text-center text-capitalize"><?= $article['title'] ?></h2>
            <div class="d-flex align-items-center">
                <img class="card-img-top" src="<?= $article['img'] != '' ? $article['img'] : 'img/nopicture.jpg' ?>" alt="article image">
            </div>
            <small class="text-muted">By <?= $article['author'] ?> in <?= $article['category'] ?></small>
            <article class="my-3">
                <?= $article['content'] ?>
            </article>
        </div>
    </div>
</main>

<?php include 'templates/footer.php' ?>