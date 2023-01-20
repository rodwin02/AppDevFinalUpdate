<?php

include 'config.php';
session_start();

if(isset($_POST['createbtn'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
         header('location:home-page-admin.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home-page.php');

      }

   }else{
      $error[] = 'Incorrect Email or Password!';
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
  <title>Sign-In</title>
</head>
<body>
  <div class="sign-in">
        <div class="sign-in-container">
          <div class="left-container">
            <img class="img" src="images/undraw_online_discussion_re_nn7e (1) 2.png" alt="">
            <h1 class="welcome-title">Welcome to ForumHUB</h1>
            <h2 class=welcome-description>Be a part of our friendly, industry-focused 
              community of professionals meeting,learning, and 
              sharing knowledge via articles, Q&As, discussion 
              forums, and realtime chats.</h2>
          </div>
          <div class="right-container">
            <a href="startup-page.php"><img src="images/close (1).png" alt="Close" class="close1"></a>
            <div class="sign-up-title">Sign in</div>
            <div class="line-two-container">
              <div class="line"></div>
              <div class="sign-up-with">Sign-in-with</div>
            </div>
            <div class="line-three-container">
              <div class="button">
                <img class="logo" src="images/google.png" alt="">
                <a href="#" class="link-name">Sign in with Google</a>
              </div>
            
              </div>

              <!-- INPUTING INFO -->
       <form action="" method="post" autocomplete="off">
         <?php

          if(isset($error)){
            foreach($error as $error){
              echo '<span class="error-msg">'.$error.'</span>';
            }
          };    

           ?>
        <div class="input-container">
          <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Enter your email.." id="email" required value="">
          <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter your password.." id="password" required value="">
        </div>
          
            <div class="line-four-container">
              <div class="capcha-container">
                <input type="checkbox" id="checkbox" required value="">
                <p class="capcha-description">Im not a robot</p>
                <img src="images/RecaptchaLogo 1.png" alt="capcha">
              </div>
            </div>
      
          <div class="skip-container">
            <button type="submit" name="createbtn" class="createbtn">
              <img class="arrow" src="images/Arrow 1.png" alt="">
            </button>
          <!-- have-account-in means Sign in account -->
          <a href="register.php" class="have-account-in" id="have-account">New to ForumHub? <span>Create an account</span></a>
        </div>
      </form>
          
      </div>        
    </div>
</div>
</body>
</html>