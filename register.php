<?php

include 'config.php';

if(isset($_POST['createbtn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $error[] = 'User already exist!';
   }else{
      if($pass != $cpass){
         $error[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `user_form`(name, email, password) VALUES('$name', '$email', '$cpass')") or die('query failed');
         $error[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style3.css">
  <title>Document</title>
</head>
<body>
 <!-- SIGN UP -->
  <div class="sign-up">
    <div class="sign-up-container">
      <div class="left-container">
        <img class="img" src="images/undraw_online_discussion_re_nn7e (1) 2.png" alt="">
        <h1 class="welcome-title">Welcome to ForumHUB</h1>
        <h2 class=welcome-description>Be a part of our friendly, industry-focused 
          community of professionals meeting,learning, and 
          sharing knowledge via articles, Q&As, discussion 
          forums, and realtime chats.</h2>
      </div>
      <div class="right-container">
        <a href="startup-page.php"><img src="images/close (1).png" alt="Close" class="close"></a>

        <div class="sign-up-title">Sign up</div>
        <div class="line-two-container">
          <div class="line"></div>
          <div class="sign-up-with">Sign-up-with</div>
        </div>
        <div class="line-three-container">
          <div class="button">
            <img class="logo" src="images/google.png" alt="">
            <a href="#" class="link-name">Sign up with Google</a>
          </div>
         
          </div>
          <!-- SIGN UP INFO -->
        <form action="" method="post" autocomplete="off">
           <?php

          if(isset($error)){
            foreach($error as $error){
              echo '<span class="error-msg">'.$error.'</span>';
            }
          };    

           ?>
            <div class="input-container">
              <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Enter your name.." id="name" required value="">
              <label for="email">Email:</label>
                <input type="text" name="email" placeholder="Enter your email.." id="email" required value="">
              <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter your password.." id="password" required value="">
              <label for="confirmpassword">Confirm Password:</label>
                <input type="password" name="cpassword" placeholder="Confirm your password.." id="cpassword" required value="">
              <!-- <label for="usertype">User type:</label> 
                <select name="user_type">
                 <option value="user">User</option>
                 <option value="admin">Admin</option>
              </select> -->
            </div>

          <div class="skip-container">
            <button type="submit" name="createbtn" class="createbtn">
              <img class="arrow" src="images/Arrow 1.png" alt="">
            </button>

             <!-- have-account-up means Sign up account -->
             <a href="login.php" class="have-account-up" id="have-account">Already have account? <span>Sign in</span></a>
          </div>
            
        </form>
           
      </div>        
    </div>
    </div>
</body>
</html>
