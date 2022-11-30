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
    $result = mysqli_query($connect, $query);
    session_start();
    if ($result) $_SESSION['flash_message'] = ['Registered Successfully', 'success'];
    else $_SESSION['flash_message'] = ['Oopss.. Looks like something went wrong', 'danger'];

    header('location: ../login.php');
}

