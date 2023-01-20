<?php
  include '../config.php';

  if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "DELETE FROM `user_form` WHERE `id` = '$user_id'";

    $result = $conn->query($sql);

    if($result == true) {
        header("location: ../home-page-admin.php");
      }
      else {
        echo "Error:" .$sql. "<br/>" .$conn->error;
      }
    }
?>