<?php include 'templates/header.php'; ?>

<main class="container mt-4">
    <h1 class="mb-4 text-center">All Post</h1>
    <div class="row">
        <?php
            for ($i=0; $i < 10; $i++) { 
        ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="img/nopicture.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</main>

<?php include 'templates/footer.php'; ?>