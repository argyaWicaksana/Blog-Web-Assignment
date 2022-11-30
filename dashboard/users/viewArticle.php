<?php
include '../templates/header.php';
include '../../connect.php';

// Get data from selected user
$u_id = $_GET['u_id'];
$username = $_GET['username'];

//get title and category
$query = "SELECT article_id, a.title, c.name AS category FROM article a
        JOIN category c ON(a.category_id = c.id) WHERE user_id =$u_id";
$articles = mysqli_query($connect, $query);
// var_dump($query);
?>

<h1>Article List</h1>
<strong>
    <small>Showing Article for user : <?php echo "$username" ?></small>
</strong>
<hr>
<?php
if (isset($_SESSION['flash_message'])) { ?>
    <div class="alert alert-<?= $_SESSION['flash_message'][1] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['flash_message'][0] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['flash_message']);
} ?>
<table class="table table-striped mb-5">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (mysqli_num_rows($articles) > 0) {
            $i = 1;
            foreach ($articles as $article) {
        ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $article['title'] ?></td>
                    <td><?= $article['category'] ?></td>
                    <td>
                        <!-- a_id means article_id -->
                        <a href="../article/view.php?a_id=<?= $article['article_id'] ?>&userpost=<?= $username ?>" class="badge bg-info">
                            <i data-feather="eye"></i>
                        </a>
                        <a href="../process/deleteArticle.php?a_id=<?= $article['article_id'] ?>&true=<?= 1 ?>" class="badge bg-danger">
                            <i data-feather="trash-2"></i>
                        </a>
                    </td>
                </tr>
        <?php
                $i++;
            }
        }
        ?>
    </tbody>
</table>
</article>
</main>
</div>

<?php include '../templates/footer.php'; ?>