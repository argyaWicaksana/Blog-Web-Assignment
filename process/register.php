<!-- Random User ID function -->
<script>
    function userRandom() {
        const d = +new Date();
        document.cookie = "userid=" + d;
    }
    userRandom();
</script>
<?php
// Mengambil mekanisme koneksi
require_once('../connect.php');

// Cek apakah data ada ?
if (isset($_POST['register'])) {

    // Membuat Random User
    $userid = $_COOKIE['userid'];

    // Collect Input
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT into `user` (id, username, email, password)
    VALUES ('$userid','$username','$email', '$password')";
    $result = mysqli_query($connect, $query);
    session_start();
    if ($result) $_SESSION['isRegistered'] = true;
    else $_SESSION['isRegistered'] = false;
} else $_SESSION['isRegistered'] = false;

header('location: ../login.php');
