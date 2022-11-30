<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
$username = $_SESSION['username'];
$role = $_SESSION['role'];

$u_id = $_GET['u_id'];

if ($role == 1) {
    //delete user
    $sql = "DELETE FROM user WHERE id=$u_id";
    if ($u_id!=$_SESSION['user_id'] && mysqli_query($connect, $sql)) {
        $_SESSION['flash_message'] = ['User deleted successfully!', 'success'];
    } else $_SESSION['flash_message'] = ['Cant delete user!', 'danger'];

} else $_SESSION['flash_message'] = ['You dont have permisson to delete user!', 'danger'];

header('Location: ../users/list.php');
