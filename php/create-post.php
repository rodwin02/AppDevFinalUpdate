<?php
  session_start();
  include "dbBase.php";

  if(isset($_POST['submit'])) {
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


    $sql = "INSERT INTO post (title, text, progLan, filename) VALUES ('$title', '$text', '$empty', '$filename')";
  
    $result = $conn->query($sql);

    if(move_uploaded_file($tempname, $folder)) {
      echo "<h3>Image uploaded successfully!</h3>";
    }
    else {
      echo "<h3>Failed to upload image!</h3>";
    }
  
    if($result == true) {
      header("Location: ../home-page.php");
    }
    else {
      exit("<script>alert('Error par!')</script>");
    }

  }

  $conn->close();

?>