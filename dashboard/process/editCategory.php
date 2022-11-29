<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $c_id = $_POST['c_id'];

    // Query
    $sql = "UPDATE category SET name='$name' WHERE id='$c_id'";
    if (mysqli_query($connect, $sql)) {
        echo "
        <script>
            window.alert('Category has been updated !')
            window.location.href = '../category/list.php';
        </script>
    ";
    } else {
        echo "
        <script>
            window.alert('Something went wrong...')
            window.location.href = '../category/list.php';
        </script>
    ";
    }
}
