<?php
  include 'dbBase.php';

  if(isset($_POST['post_comment'])) {
    $message = $_POST['message'];

    $sql = "INSERT INTO comment (message) VALUES ('$message')";
    $result = $conn->query($sql);

    if($result == true) {
      header("Location: ../home-page.php");
    }
  }



?>