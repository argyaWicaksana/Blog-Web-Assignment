<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();

// hooopeee it works. so sleepy
// var_dump($_FILES['file']['name']);

if (isset($_POST['submit'])) {
   $title = $_POST['title'];
   $category = $_POST['category'];
   $content = $_POST['content'];
   $id = $_SESSION['user_id'];

   if ($_FILES['file']['name'] != '') { // is image file avaible?
      // Image Cek
      $image = $_FILES['file']['name'];
      $target_dir = "../../img/article/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);

      // Select file type
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("jpg", "jpeg", "png", "gif");

      // Check extension
      if (in_array($imageFileType, $extensions_arr)) {
         // Upload file
         if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $image)) {
            // Submit data
            $image = baseURL . 'img/article/' . $image;

            if ($title != '') {
               mysqli_query($connect, "INSERT INTO article(title, img, category_id, user_id, content) 
                  VALUES('$title', '$image', '$category', '$id'," . " '" . $content . "')");
               header('location: ../index.php');
               exit();
            }
         }
      }
   }

   if ($title != '') {
      mysqli_query($connect, "INSERT INTO article(title, category_id, user_id, content) 
         VALUES('$title', '$category', '$id'," . " '" . $content . "')");
      header('location: ../index.php');
   }
}
