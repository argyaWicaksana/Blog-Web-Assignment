<?php include '../templates/header.php' ?>

<h1 class="tes">Create New Category</h1>
<hr>
<div class="row">
    <form action="../process/createCategory.php" method="post" enctype="multipart/form-data" class="col-lg-9">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Enter New Category" required>
        </div>
        <div class="mb-3 d-md-flex justify-content-md-end">
            <button name="submit" type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>
</article>
</main>
</div>

<?php include '../templates/footer.php' ?>