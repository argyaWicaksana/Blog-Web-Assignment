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
    <h1 class="mb-4 text-center">All Category</h1>
    <div class="row">
        <?php
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
        }
        ?>
    </div>
</main>

<?php include 'templates/footer.php'; ?>