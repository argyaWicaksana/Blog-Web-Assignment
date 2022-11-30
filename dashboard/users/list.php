<?php
include '../templates/header.php';
include '../../connect.php';

// Are you an admin?
if ($role == 1) {
?>

    <h1>User List</h1>
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
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">id</th>
                <th scope="col">username</th>
                <th scope="col">email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Limiter Module
            $batas = 5;
            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            // Page number
            $previous = $halaman - 1;
            $next = $halaman + 1;

            // Get actual rows of data
            $sql = "SELECT id, username, email FROM user WHERE isAdmin ='0'";
            $data = mysqli_query($connect, $sql);
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);

            //limiting data
            $query = "$sql limit $halaman_awal, $batas";
            $users = mysqli_query($connect, $query);


            if (mysqli_num_rows($users) > 0) {
                $i = $halaman_awal + 1;
                foreach ($users as $user) {
            ?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <!-- a_id means article_id -->
                            <a href="viewArticle.php?u_id=<?= $user['id'] ?>&username=<?= $user['username'] ?>" class="badge bg-info">
                                <i data-feather="eye"></i>
                            </a>
                            <a href="deleteUser.php?u_id=<?= $user['id'] ?>" class="badge bg-danger">
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