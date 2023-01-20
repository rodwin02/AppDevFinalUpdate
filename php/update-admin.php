<?php
  include "dbBase.php";
  if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['titleInput'];
    $text = $_POST['textInput'];
    $languages = $_POST['languages'];
    $empty = "";
    $filename = $_FILES["imagefile"]["name"];
    $tempname = $_FILES["imagefile"]["tmp_name"];
    $folder = "../imagePath/";
    move_uploaded_file($tempname, $folder.$filename);

    if(!empty($languages)) {

      foreach($languages as $prog) {
        if($languages > 1) {
        $empty .= $prog. ", ";
        }
      }

    }

    $sql = "UPDATE post SET title = '$title', text = '$text', progLan = '$empty', filename = '$filename' WHERE id = $id";
    $result = $conn->query($sql);

    if($result == true) {
      header('Location: ../home-page-admin.php');
    }
    else {
      echo "Error:" .$sql. "<br/>" .$conn->error;
    }
  }

  if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `post` WHERE `id` = '$user_id'";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $title = $_POST['titleInput'];
        $text = $_POST['textInput'];
        $languages = $_POST['languages'];
        $empty = "";
        $filename = $_FILES["imagefile"]["name"];
        $tempname = $_FILES["imagefile"]["tmp_name"];
        $folder = "../imagePath/";
        move_uploaded_file($tempname, $folder.$filename);
    
        if(!empty($languages)) {
    
          foreach($languages as $prog) {
            if($languages > 1) {
            $empty .= $prog. ", ";
            }
          }
    
        }

      }
    } else {
      header('Location: ../home-page-admin.php');
    }
  }
?>