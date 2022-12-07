<?php
include '../connect.php';
session_start();

if (isset($_POST['submit'])) {
    $a_id = $_POST['a_id'];
    $c_id = $_POST['c_id'];

    $stmt = $connect->prepare("DELETE FROM comment WHERE id=?");

    $stmt->bind_param("i", $c_id);
    $stmt->execute();
}

mysqli_close($connect);
header("Location: ../view.php?a_id=$a_id");
