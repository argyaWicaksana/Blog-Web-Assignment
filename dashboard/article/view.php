<?php
include '../../connect.php';
include '../templates/header.php';

$a_id = $_GET['a_id'];
$query = "SELECT title, img, user_id, content, `timestamp` FROM article WHERE article_id=$a_id LIMIT 1";
$article = mysqli_query($connect, $query);
$article = $article->fetch_assoc(); //return nilai dalam bentuk array associative

// Checking role for viewing
if ($role != 1) {
    // Throw if this isn't the user's article
    if ($id != $article['user_id']) {
        header('Location: ' . baseURL . 'dashboard');
    }
} else {
    if (isset($_GET['userpost'])) {
        // Getting author's username 
        $userpost = $_GET['userpost'];
        echo "<strong>Showing article by $userpost </strong>";
    }
}

?>

<div class="col-lg-9">
    <h1><?= $article['title'] ?></h1>
    <hr>

    <?php if ($article['img'] != '') { ?>
        <img class="card-img-top" src="<?= $article['img'] ?>" alt="image">
    <?php
    } ?>

    <article class="my-3">
        <?= $article['content'] ?>
    </article>
</div>
</article>
</main>
</div>

<?php include '../templates/footer.php'; ?>