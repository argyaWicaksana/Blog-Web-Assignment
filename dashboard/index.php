<?php
include 'templates/header.php';
include 'quotes.php';
?>

<div class="text-center">
    <h1>Hello, <span class="admin active"><?= $username ?></span></h1>
    <hr>
    <!-- <p>Quotes to help yourself</p> -->
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