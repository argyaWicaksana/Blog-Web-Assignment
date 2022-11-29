<?php
// Mengambil mekanisme koneksi
require_once('../connect.php');

// Cek apakah data ada ?
if (isset($_POST['register'])) {

    // Collect Input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT into `user` (username, email, password)
    VALUES ('$username','$email', '$password')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        include "../templates/header.php";
        // Auto redirect to login page after 5 seconds
        // header("Refresh:5; url=../login.php");

?>
        <!-- // Menampilkan halaman success -->
        <main class="container mt-5 col-lg-4 border rounded p-5">
            <div class='text-center'>
                <h3>You are registered successfully.</h3>
                <br>Click here to <a href='../login.php'>Login</a>
            </div>
        </main>
    <?php
        include "../templates/footer.php";
    }
} else {
    include "../templates/header.php"
    ?>
    <!-- // Menampilkan halaman success -->
    <main class="container mt-5 col-lg-4 border rounded p-5">
        <div class='text-center'>
            <h3>Oopss.. Looks like something went wrong</h3>
            <br>Click here to <a href='../register.php'>Try Again</a>
        </div>
    </main>
<?php
    include "../templates/footer.php";
}
