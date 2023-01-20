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
?>