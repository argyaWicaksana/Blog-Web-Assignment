<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
$c_id = $_GET['c_id'];
$role = $_SESSION['role'];

// Check Permission
if ($role == 1) {
    // Change category to uncategorized
    $sql = "UPDATE article SET category_id=7 WHERE category_id=$c_id";
    mysqli_query($connect, $sql);

    //delete category
    $sql = "DELETE FROM category WHERE id=$c_id";
    if ($c_id!=7 && mysqli_query($connect, $sql)) $_SESSION['flash_message'] = ['Category deleted successfully!', 'success'];
    else $_SESSION['flash_message'] = ['Cant delete category', 'danger'];
    mysqli_close($connect);
    header('Location: ../category/list.php');
}
