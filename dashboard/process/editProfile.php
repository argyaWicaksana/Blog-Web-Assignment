<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $old_password = $_POST['oldpassword'];
    $id = $_SESSION['user_id'];

    //verify password
    $sql = "SELECT password FROM user WHERE id=$id";
    $password = mysqli_query($connect, $sql);
    $password = $password->fetch_assoc()['password'];

    if (password_verify($old_password, $password) && $username != '' && $email != '') {

        if($_POST['newpassword'] != '') $newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
        else $newpassword = password_hash($old_password, PASSWORD_DEFAULT);

        $sql = "UPDATE user SET username='$username', email='$email', password='$newpassword' WHERE id='$id'";
        mysqli_query($connect, $sql);
        $_SESSION['username'] = $username;
        echo "
            <script>
                window.alert('Successfully update profile!')
                window.location.href = '../index.php';
            </script>
        ";
    }
}
