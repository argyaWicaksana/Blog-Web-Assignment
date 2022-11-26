<?php
include '../../connect.php';
include '../templates/header.php';

$a_id = $_GET['a_id'];
$query = "SELECT title, img, user_id, content, `timestamp` FROM article WHERE article_id=$a_id LIMIT 1";
$article = mysqli_query($connect, $query);
$article = $article->fetch_assoc(); //return nilai dalam bentuk array associative

//check is this user's article
if ($id != $article['user_id']) {
    header('Location: ' . baseURL . 'dashboard');
}
?>

    <div class="col-lg-9">
        <h1><?= $article['title'] ?></h1>
        <hr>

        <?php if (isset($article['img'])) { ?>
            <img class="card-img-top" src="<?= $article['img'] ?>" alt="image">
        <?php
        }?>

        <article class="my-3">
            <?= $article['content'] ?>
        </article>
    </div>
</article>
</main>
</div>

<?php include '../templates/footer.php'; ?>