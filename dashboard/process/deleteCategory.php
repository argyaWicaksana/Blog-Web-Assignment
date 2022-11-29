<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
$c_id = $_GET['c_id'];

// Change category to uncategorized
$sql = "UPDATE article SET category_id=7 WHERE category_id=$c_id";
mysqli_query($connect, $sql);

//delete category
$sql = "DELETE FROM category WHERE id=$c_id";
if (mysqli_query($connect, $sql)) {
    echo "
        <script>
            window.alert('Category deleted successfully!')
            window.location.href = '../category/list.php'
        </script>
    ";
} else {
    echo "
        <script>
            window.alert('Cant delete user!')
            window.location.href = '../category/list.php'
        </script>
    ";
}
