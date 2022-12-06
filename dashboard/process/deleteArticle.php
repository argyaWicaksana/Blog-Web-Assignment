<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();
$a_id = $_GET['a_id'];
$userid = $_SESSION['user_id'];

if (isset($_GET['true'])) {
    $role = $_GET['true'];
}

// Get userid and article id
$sql = "SELECT a.user_id, u.username from article a JOIN user u ON(a.user_id=u.id) WHERE article_id=$a_id";
$call = (mysqli_query($connect, $sql));
$user = mysqli_fetch_assoc($call);
$usid = $user['user_id'];
$username = $user['username'];

// Checking Permission
if ((isset($role) && $role == 1) || ($usid == $userid)) {
    // delete old image
    $sql = "SELECT img FROM article WHERE article_id=$a_id";
    $file = mysqli_query($connect, $sql);
    $file = $file->fetch_assoc();

    if ($file['img'] != '') {
        $file_name = basename($file['img'], '?' . $_SERVER['QUERY_STRING']);
        unlink('../../img/article/' . $file_name);
    }

    //delete article
    $sql = "DELETE FROM article WHERE article_id=$a_id";
    if (mysqli_query($connect, $sql)) $_SESSION['flash_message'] = ['Article deleted succesfully', 'success'];
    else $_SESSION['flash_message'] = ['Cant delete article!', 'danger'];

} else $_SESSION['flase_message'] = ['You dont have permission to delete this article!', 'danger'];

mysqli_close($connect);

if ($role == 1) header("Location: ../users/viewArticle.php?u_id=$usid&username=$username");
else header("Location: ../article/list.php");