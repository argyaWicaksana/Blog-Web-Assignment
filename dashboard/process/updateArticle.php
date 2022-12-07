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

   $sql = "SELECT img FROM article WHERE article_id=$a_id";
   $file = mysqli_query($connect, $sql);
   $file = $file->fetch_assoc();

   if ($_FILES['file']['name'] != '' && $title != '') { // is user upload an image?
      //delete old image
      if ($file['img'] != '') {
         $file_name = basename($file['img'], '?' . $_SERVER['QUERY_STRING']);
         unlink('../../img/article/' . $file_name);
      }

      // Image Cek
      $image = "img" . rand(-2147483648, 2147483647) . "." . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
      $target_dir = "../../img/article/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);

      // Select file type
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("jpg", "jpeg", "png", "gif", "webp");

      // Check extension
      if (in_array($imageFileType, $extensions_arr)) {
         // Upload file
         if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $image)) {
            // Submit data
            $image = baseURL . 'img/article/' . $image;

            $stmt = $connect->prepare("UPDATE article SET title=?, category_id=?, img=?, content=? WHERE article_id=?");
            $stmt->bind_param("sissi", $title, $category, $image, $content, $a_id);
            $stmt->execute();

            $_SESSION['flash_message'] = ['Successfully updated article!', 'success'];
         } else $_SESSION['flash_message'] = ['Cant upload file!', 'danger'];
      } else $_SESSION['flash_message'] = ['Can only upload image file!', 'danger'];
   } else if ($title != '') {
      if($file['img'] != '' && isset($_POST['del_img'])){ //old image exist, and user want to delete it
         //delete old image
         $file_name = basename($file['img'], '?' . $_SERVER['QUERY_STRING']);
         unlink('../../img/article/' . $file_name);

         $stmt = $connect->prepare("UPDATE article SET title=?, category_id=?, img='', content=? WHERE article_id=?");

      } else{ //old image exist, user don't want to delete || old image dont exist
         $stmt = $connect->prepare("UPDATE article SET title=?, category_id=?, content=? WHERE article_id=?");
      }
      $stmt->bind_param("sisi", $title, $category, $content, $a_id);
      $stmt->execute();
      $_SESSION['flash_message'] = ['Successfully updated article!', 'success'];
   }

   mysqli_close($connect);
   var_dump($_POST['del_img']);
   header("Location: ../article/list.php");
}
