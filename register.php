<?php
include 'templates/header.php';
?>
<script>
    function check(data) {
        let confirm = document.getElementById("password-valid").classList;
        let actual = document.getElementById("password").value;
        let button = document.getElementById('button');
        if (data !== actual) {
            button.style.display = "none";
            // button.setAttribute("disabled");
            confirm.add('is-invalid');
            document.getElementById("invalid").innerHTML = 'Password does not match !';
        } else {
            button.style.display = "block";
            // button.removeAttribute("disabled");
            confirm.remove('is-invalid');
            document.getElementById("invalid").innerHTML = '';
        }
    }
</script>

<main class="container mt-5 col-lg-4 border rounded p-5">
    <h1 class="text-center mb-4">Register</h1>
    <form action="process/register.php" method="post">
        <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control" placeholder="name@example.com" required>
            <label for="email">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input name="username" type="text" class="form-control" placeholder="Username" required>
            <label for="name">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <div class="form-floating">
            <input id="password-valid" name="confirm-password" type="password" class="form-control" placeholder="Confirm Password" onkeyup="check(this.value)">
            <label for="confirm-password">Confirm Password</label>
            <div id="invalid" class="invalid-feedback"></div>
        </div>
        <button name="register" id="button" class="mt-4 btn btn-primary w-100" type="submit">Register</button>
        <small>Already have account? <a href="login.php">Login</a></small>
    </form>

</main>

<?php include 'templates/footer.php' ?>