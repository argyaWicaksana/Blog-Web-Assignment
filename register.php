<?php include 'templates/header.php' ?>
<main class="container mt-5 col-lg-4 border rounded p-5">
    <h1 class="text-center mb-4">Register</h1>
    <form action="" method="post">
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="mt-4 btn btn-primary w-100" type="submit">Login</button>
        <small>Already have account? <a href="login.php">Login</a></small>
    </form>

</main>

<?php include 'templates/footer.php' ?>