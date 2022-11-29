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
        if (mysqli_query($connect, $sql)) {
            echo "
            <script>
                window.alert('Category has been added !')
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
}
