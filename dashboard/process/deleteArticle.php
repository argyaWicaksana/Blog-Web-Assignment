<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
$a_id = $_GET['a_id'];

// delete old image
$sql = "SELECT img FROM article WHERE article_id=$a_id";
$file = mysqli_query($connect, $sql);
$file = $file->fetch_assoc();

if ($file['img'] != '') {
    $file_name = basename($file['img'], '?' . $_SERVER['QUERY_STRING']);
    unlink('../../img/article/' . $file_name);
}

if (isset($_GET['true'])) {
    $role = $_GET['true'];
}

//delete article
$sql = "DELETE FROM article WHERE article_id=$a_id";
if (mysqli_query($connect, $sql)) {
    if (isset($role)) {
        echo "
        <script>
            window.alert('Article deleted successfully!')
            window.location.href = '../article/list.php'
        </script>
    ";
    } else {
        echo "
        <script>
            window.alert('Article deleted successfully!')
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
