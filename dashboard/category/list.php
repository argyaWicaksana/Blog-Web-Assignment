<?php
include '../templates/header.php';
include '../../connect.php';

// Are you an admin?
if ($role == 1) {

    //get title and category
    $query = "SELECT id, name FROM category";
    $categories = mysqli_query($connect, $query);
    // var_dump($query);
?>

    <h1>Category List</h1>
    <hr>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">id</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($categories) > 0) {
                $i = 1;
                foreach ($categories as $category) {
            ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['name'] ?></td>
                        <td>
                            <!-- c_id means category id -->
                            <a href="edit.php?c_id=<?= $category['id'] ?>" class="badge bg-warning">
                                <i data-feather="edit"></i>
                            </a>
                            <a href="../process/deleteCategory.php?c_id= <?= $category['id'] ?>" class="badge bg-danger" <?php if ($category['id'] == 7) {
                                                                                                                                echo "style='display:none'";
                                                                                                                            } ?>>
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
    <a class="btn btn-success" href="create.php">Create New Category</a>
    </article>
    </main>
    </div>
<?php
} else {
?>
    <h3>Oopss.. Looks like something went wrong</h3>
    <br>Click here to <a href='../index.php'>Go Back</a>
    </main>
<?php
}
include '../templates/footer.php'; ?>