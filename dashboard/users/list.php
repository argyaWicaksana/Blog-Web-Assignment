<?php
include '../templates/header.php';
include '../../connect.php';

// Are you an admin?
if ($role == 1) {

    //get title and category
    $query = "SELECT id, username, email FROM user WHERE isAdmin ='0'";
    $users = mysqli_query($connect, $query);
    // var_dump($query);
?>

    <h1>User List</h1>
    <hr>
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
            <?php if (mysqli_num_rows($users) > 0) {
                $i = 1;
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