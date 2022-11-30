<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
$role = $_SESSION['role'];

if ($role == 1) {
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];

        // Query
        $sql = "INSERT INTO category (name) VALUES ('$name')";
        if (mysqli_query($connect, $sql)) $_SESSION['flash_message'] = ['Category has been added!', 'success'];
        else $_SESSION['flash_message'] = ['Cant add category!', 'danger'];

        header('Location: ../category/list.php');
    }
}
