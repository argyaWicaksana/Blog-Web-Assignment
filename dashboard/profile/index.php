<?php 
include '../templates/header.php';
include '../../connect.php';

$sql = "SELECT * FROM user WHERE id=$id";
$profile = mysqli_query($connect, $sql);
$profile = $profile->fetch_assoc();
?>

<h1>Profile</h1>
<hr>
<div class="row">
    <form action="../process/editProfile.php" method="post" class="col-xl-7">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" value="<?= $profile['username'] ?>" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="<?= $profile['email'] ?>" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Old Password</label>
            <input type="password" class="form-control" id="password" name="oldpassword" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="password" name="newpassword">
        </div>
        <div class="mb-3 d-md-flex justify-content-md-end">
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </div>
    </form>

</div>

</article>
</main>
</div>

<?php include '../templates/footer.php' ?>