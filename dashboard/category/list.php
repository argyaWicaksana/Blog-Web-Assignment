<?php
include '../templates/header.php';
include '../../connect.php';

// Are you an admin?
if ($role == 1) {
?>

    <h1>Category List</h1>
    <hr>
    <?php
    if (isset($_SESSION['flash_message'])) { ?>
        <div class="alert alert-<?= $_SESSION['flash_message'][1] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['flash_message'][0] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['flash_message']);
    } ?>
    <div class="table-responsive">
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
                <?php
                // Limiter Module
                $batas = 5;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                // Page Number
                $previous = $halaman - 1;
                $next = $halaman + 1;

                // Get actual rows of data
                $sql = "SELECT id, name FROM category";
                $data = mysqli_query($connect, $sql);
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                // limiting data
                $query = "$sql limit $halaman_awal, $batas";
                $categories = mysqli_query($connect, $query);

                if (mysqli_num_rows($categories) > 0) {
                    $i = $halaman_awal + 1;
                    foreach ($categories as $category) {
                ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $category['id'] ?></td>
                            <td><?= $category['name'] ?></td>
                            <td>
                                <!-- cid means category id -->
                                <a href="edit.php?cid=<?= $category['id'] ?>" class="badge bg-warning">
                                    <i data-feather="edit"></i>
                                </a>
                                <a href="../process/deleteCategory.php?cid= <?= $category['id'] ?>" class="badge bg-danger" <?php if ($category['id'] == 7) {
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
    </div>

    <a class="btn btn-success" href="create.php">Create New Category</a>
    <!-- Pagination Module -->
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($halaman > 1) {
                                            echo "href='?halaman=$previous'";
                                        } ?>>Previous</a>
            </li>
            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
            ?>
                <li class="page-item"><a class="page-link" href="?halaman=<?= $x ?>"><?= $x; ?></a></li>
            <?php
                // var_dump($total_halaman);
            }
            ?>
            <li class="page-item">
                <a class="page-link" <?php if ($halaman < $total_halaman) {
                                            echo "href='?halaman=$next'";
                                        } ?>>Next</a>
            </li>
        </ul>
    </nav>
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