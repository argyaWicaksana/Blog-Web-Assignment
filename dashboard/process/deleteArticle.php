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
$sql = "SELECT user_id from article WHERE article_id=$a_id";
$call = (mysqli_query($connect, $sql));
$user = mysqli_fetch_assoc($call);
$usid = $user['user_id'];

// Checking Permission
if (isset($role) || ($usid == $userid)) {
    if ($role == 1 || ($usid == $userid)) {
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
        if (mysqli_query($connect, $sql)) {
            echo "
            <script>
                window.alert('Article deleted successfully!')
                window.location.href = '../article/list.php'
            </script>
        ";
        } else {
            echo "
            <script>
                window.alert('Cant delete article!')
                window.location.href = '../article/list.php'
            </script>
        ";
        }
    } else {
        echo "
        <script>
            window.alert('Cant delete article!')
            window.location.href = '../article/list.php'
        </script>
    ";
    }
} else {
    echo "
        <script>
            window.alert('Cant delete article!')
            window.location.href = '../article/list.php'
        </script>
    ";
}
