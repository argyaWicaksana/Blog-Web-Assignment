<?php include 'templates/header.php'; ?>

<main class="container mt-4">
    <h1 class="mb-4 text-center">Categories</h1>
    <div class="row">
        <?php
        for ($i = 1; $i <= 3; $i++) {
        ?>
            <div class="col-md-4 mb-4">
                <a href="#">
                    <div class="card">
                        <img src="img/nopicture.jpg" class="card-img-top">
                        <div class="card-img-overlay d-flex align-items-end p-0">
                            <h5 class="card-title text-bg-dark text-center p-4 mb-0 flex-fill bg-opacity-75">Category <?= $i ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
</main>

<?php include 'templates/footer.php'; ?>