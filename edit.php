<?php
include '../templates/header.php';
include "../../connect.php";

if ($role == 1) {
    $c_id = $_GET['cid'];
    $sql = "SELECT * FROM category WHERE id=$c_id";
    $category = mysqli_query($connect, $sql);
    $category = $category->fetch_assoc();

?>

    <h1 class="tes">Edit Category</h1>
    <hr>
    <div class="row">
        <form action="../process/editCategory.php" method="post" class="col-lg-9">
            <input type="hidden" name="c_id" value="<?= $c_id ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" value="<?= $category['name'] ?>" type="text" class="form-control" id="name" placeholder="Enter Category Name" required>
            </div>
            <div class="mb-3 d-md-flex justify-content-md-end">
                <button name="submit" type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
    </article>
    </main>
    </div>
<?php include '../templates/footer.php';
}
?>