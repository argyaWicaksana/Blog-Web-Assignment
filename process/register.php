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
    session_start();
    if ($result) $_SESSION['isRegistered'] = true;
    else $_SESSION['isRegistered'] = false;

} else $_SESSION['isRegistered'] = false;

header('location: ../login.php');