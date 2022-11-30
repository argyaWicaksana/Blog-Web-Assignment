<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
$role = $_SESSION['role'];

// Check Permission
if ($role == 1 && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $c_id = $_POST['c_id'];

    // Query
    $sql = "UPDATE category SET name='$name' WHERE id='$c_id'";
    if (mysqli_query($connect, $sql)) $_SESSION['flash_message'] = ['Category has been updated!', 'success'];
    else $_SESSION['flash_message'] = ['Cant update category!', 'danger'];
    
    header('Location: ../category/list.php');
}
