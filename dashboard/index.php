<?php
include 'templates/header.php';
include 'quotes.php';
?>

<?php
if (isset($_SESSION['flash_message'])) { ?>
    <div class="alert alert-<?= $_SESSION['flash_message'][1] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['flash_message'][0] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['flash_message']);
} ?>


<div class="container text-center">
    <h1>Hello, <span class="admin active"><?= $username ?></span></h1>
    <hr>
    <div class="container">
        <h3>
            <q><?= $quotes ?></q>
        </h3>
    </div>
</div>


</article>
</main>
</div>

<?php include 'templates/footer.php'; ?>