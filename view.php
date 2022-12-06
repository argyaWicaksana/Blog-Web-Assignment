<?php
include 'templates/header.php';
$a_id = $_GET['a_id'];

$sql = "SELECT title, content, img, `timestamp`, username AS author, name AS category FROM article AS a
JOIN user AS u ON(a.user_id = u.id)
JOIN category AS c ON(a.category_id = c.id) WHERE article_id=$a_id";
$article = mysqli_query($connect, $sql);
$article = $article->fetch_assoc();
?>
<main class="container mt-4 gap-5 d-grid">
    <section class="row justify-content-center">
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
    </section>

    <section class="row justify-content-center">
        <div class="col-md-8">
            <h2>Comment</h2>
            <hr>
            <?php
                if(isset($_SESSION['username'])){
            ?>
            <div class="card mb-5">
                <form class="card-body" method="POST" action="process/comment.php">
                    <input type="hidden" name="a_id" value="<?= $a_id ?>">
                    <textarea class="form-control card mb-3" id="user-comment" rows="3" name="comment"></textarea>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <?php
                }
            $sql = "SELECT u.username, c.comment FROM comment c
                JOIN user u ON(u.id = c.user_id)
                WHERE article_id=$a_id ORDER BY `timestamp` DESC";
            $comments = mysqli_query($connect, $sql);

            if (mysqli_num_rows($comments) > 0) {
                foreach ($comments as $comment) {
            ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5><?= $comment['username'] ?></h5>
                            <?= $comment['comment'] ?>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
</main>

<?php include 'templates/footer.php' ?>