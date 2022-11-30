<?php
include 'templates/header.php';
include 'quotes.php';
?>

<div class="text-center">
    <h1>Hello, <?= $username ?></h1>
    <hr>
    <!-- <p>Quotes to help yourself</p> -->
    <h3>
        <q><?= $quotes ?></q>
    </h3>

</div>


</article>
</main>
</div>

<?php include 'templates/footer.php'; ?>