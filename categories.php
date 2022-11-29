<?php include 'templates/header.php';
$sql = "SELECT id, name FROM category";
$categories = mysqli_query($connect, $sql);

// Randoming Image
function randomImage()
{
    $images = glob('img/category/*');
    return $images[rand(0, count($images) - 1)];
}
?>

<main class="container mt-4">
    <h1 class="mb-4 text-center">All Post</h1>
    <div class="row">
        <?php
        if (mysqli_num_rows($categories) > 0) {
            foreach ($categories as $category) {
                $excerpt = array_slice(explode(" ", $category['name']), 0, 15);
                $excerpt = strip_tags(implode(' ', $excerpt)) . '...';
        ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="<?= randomImage() ?>" />
                        <div class="card-body">
                            <h5 class="card-title"><?= $category['name'] ?></h5>
                            <a href="view.php?c_id=<?= $category['id'] ?>">Show More</a>
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