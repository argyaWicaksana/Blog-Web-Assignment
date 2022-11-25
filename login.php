<?php include 'templates/header.php';

if (isset($_SESSION['username'])) {
    header("location: dashboard/index.php");
}
?>
<main class="container mt-5 col-lg-4 border rounded p-5">
    <h1 class="text-center mb-4">Login</h1>
    <form action="process/login.php" method="post">
        <div class="form-floating mb-3">
            <input name="username" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button name="login" class="mt-4 btn btn-primary w-100" type="submit">Login</button>
        <small>New User? <a href="register.php">Create an account</a></small>
    </form>

</main>

<?php include 'templates/footer.php' ?>