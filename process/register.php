<!-- Random User ID function -->
<!-- <script>
    function randomStr(strLength) {
        const chars = ['abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'];
        return [Array(strLength)]
            .map(() => chars[Math.trunc(Math.random() * chars.length)])
            .join('');
    }

    function uid(options = {}) {
        const now = String(Date.now());
        const middlePos = Math.ceil(now.length / 2);
        let output = `${now.substr(0, middlePos)}-${randomStr(6)}-${now.substr(middlePos)}`;
        // We add a 3 letter CODE in front of the id to make it more recognizable
        if (options.prefix) output = `${options.prefix}-${output}`;
        return output;
    }

    function userRandom() {
        d = uid({
            prefix: 'IDF'
        });
        document.cookie = "userid=" + d;
    }
    userRandom();
</script> -->
<?php
// Deprecated
// $userid = $_COOKIE['userid'];
// $userid = uniqid();

// Mengambil mekanisme koneksi
require_once('../connect.php');

// Membuat Random User
$userid = rand(-2147483648, 2147483647);

// Cek apakah data ada ?
if (isset($_POST['register'])) {

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
