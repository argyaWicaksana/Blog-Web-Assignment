<?php
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
    session_start();
    try {
        mysqli_query($connect, $query);
        $_SESSION['flash_message'] = ['Registered Successfully', 'success'];
    } catch (\Throwable $th) {
        if (mysqli_errno($connect) == 1062) {
            $_SESSION['flash_message'] = ['Email / Username already used!', 'danger'];
        }else $_SESSION['flash_message'] = [mysqli_error($connect), 'danger'];
    }

    mysqli_close($connect);
    header('location: ../login.php');
}
