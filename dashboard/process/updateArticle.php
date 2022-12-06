<?php
include '../../connect.php';
define('baseURL', explode('dashboard', $_SERVER['REQUEST_URI'])[0]);
session_start();

if (isset($_POST['submit'])) {
   $title = $_POST['title'];
   $category = $_POST['category'];
   $content = $_POST['content'];
   $id = $_SESSION['user_id'];
   $a_id = $_POST['a_id'];

   if ($_FILES['file']['name'] != '' && $title != '') { // is image file avaible?
      //delete old image
      $sql = "SELECT img FROM article WHERE article_id=$a_id";
      $file = mysqli_query($connect, $sql);
      $file = $file->fetch_assoc();
      $file_name = basename($file['img'], '?' . $_SERVER['QUERY_STRING']);
      unlink('../../img/article/' . $file_name);

      // Image Cek
      $image = "img" . rand(-2147483648, 2147483647) .".". pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
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

            $sql = "UPDATE article SET title='$title', img='$image', category_id='$category', content='" . $content .
               "' WHERE article_id='$a_id'";
            mysqli_query($connect, $sql);
            $_SESSION['flash_message'] = ['Successfully updated article!', 'success'];

         } else $_SESSION['flash_message'] = ['Cant upload file!', 'danger'];
      } else $_SESSION['flash_message'] = ['Can only upload image file!', 'danger'];

   } else if ($title != '') {
      $sql = "UPDATE article SET title='$title', category_id='$category', content='" . $content .
         "' WHERE article_id='$a_id'";
      mysqli_query($connect, $sql);
      $_SESSION['flash_message'] = ['Successfully updated article!', 'success'];
   }

   mysqli_close($connect);
   header("Location: ../article/list.php");
}
