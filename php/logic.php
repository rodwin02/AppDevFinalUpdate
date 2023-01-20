<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "createpost";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(mysqli_connect_error()) {
  echo "Failed to connect!";
  exit();
}

$sql = "SELECT * FROM post";
$result = mysqli_query($conn, $sql);

    // Create a new post
    if(isset($_POST['submit'])){
      $title = $_POST['titleInput'];
      $text = $_POST['textInput'];
      $languages = $_POST['lang uages'];
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
        header("Location: ../home-page-trial.php");
      }
      else {
        exit("<script>alert('Error par!')</script>");
      }
  }

      // Get post data based on id
      if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = "SELECT * FROM `post` ORDER BY id DESC" ;
        $result = $conn->query($sql);
    }

        // Delete a post
        if(isset($_POST['delete'])){
          $id = $_POST['id'];
  
          $sql = "DELETE FROM `post` WHERE `id` = '$id'";
          $result = $conn->query($sql);
  
          header("Location: ../home-page-trial.php");
          exit();
      }
  
      // Update a post
      if(isset($_POST['update'])){
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
  
          header("Location: ../home-page-trial.php");
          exit();
      }

      $sql2 = "SELECT * FROM comment";
      $result2 = mysqli_query($conn, $sql2);

      // Comment in post
      if(isset($_POST['post_comment'])) {
        $message = $_POST['message'];

        $sql2 = "INSERT INTO comment (message) VALUES ('$message')";
        $result2 = $conn->query($sql2);

        if($result2 == true) {
          header("Location: ../home-page-trial.php");
        }
      }
?>