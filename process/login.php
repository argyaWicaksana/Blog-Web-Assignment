<?php
// Memulai session
session_start();

// Include koneksi database.
require_once "../connect.php";

// Jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password.
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $userpass = $_POST['password']; // password yang di inputkan oleh user lewat form login.

    // Query ke database.
    $sql = mysqli_query($connect, "SELECT id, username, password, isAdmin FROM user WHERE username = '$username'");

    list($id, $username, $password, $role) = mysqli_fetch_array($sql);

    // Jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify.
    // $userpass -----> diambil dari password yang diinputkan user lewat form login
    // $password -----> diambil dari password dalam database
    if (mysqli_num_rows($sql) > 0 && password_verify($userpass, $password)) {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $id;
        $_SESSION['role'] = $role;

        // Jika login berhasil, user akan diarahkan ke halaman admin.
        mysqli_close($connect);
        header("location: ../dashboard/index.php");
        die();

    } else {
        // memberikan flash message
        $_SESSION['flash_message'] = ['Looks like your username / password wrong!', 'danger'];
        mysqli_close($connect);
        header("Location: ../login.php");
    }
}
