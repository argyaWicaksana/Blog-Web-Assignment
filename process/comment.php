<?php
    include '../connect.php';
    session_start();

    if (isset($_POST['submit'])) {
        $user_id = $_SESSION['user_id'];
        $a_id = $_POST['a_id'];
        $comment = $_POST['comment'];

        $stmt = $connect->prepare("INSERT INTO comment(user_id, article_id, comment)
        VALUES (?, ?, ?)");

        $stmt->bind_param("iis", $user_id, $a_id, $comment);
        $stmt->execute();
    }

    mysqli_close($connect);
    header("Location: ../view.php?a_id=$a_id");
?>