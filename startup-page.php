<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dist/style2.css?v=<?php echo time(); ?>">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <title>Forum Hub</title>
</head>
<body>

  <nav class="header">
    <div class="left-section">
      <img src="images/website-logo.png" alt="">
    </div>

      <div class="middle-section">
        <ul>
          <li><a href="#goal">ABOUT</a></li>
          <li><a href="#members">TEAMS</a></li>
          <li><a href="#footer">FAQ</a></li>
        </ul>
      </div>
        
      <div class="right-section">
        <div class="buttons">
          <a href="register.php" class="sign-btn" id="sign-up-btn">Sign Up</a>
          <a href="login.php" class="sign-btn" id="sign-in-btn">Sign In</a>
          
        </div>
      </div>
  </nav>

  <section class="home">
    
      <h1 class="title" data-aos="fade-right" data-aos-delay="500" data-aos-duration="1000">
        Welcome to
      </h1>
      <h1 class="title2" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000">
        Forum Hub
      </h1>
      <h2 class="description"data-aos="zoom-in" data-aos-delay="200" data-aos-duration="500">Be a part of our friendly, industry-focused community ofprofessionals meeting,<br>
        learning, and sharing knowledge via articles, Q&As, discussion forums, and realtime chats.</h2>
      <a href="register.php" class="start-discussion-btn" id="start" data-aos="flip-right" data-aos-delay="500" data-aos-duration="1000">Start discussion</a>

  </section>

  
    <img class="circle" src="images/ELEMENTS.png" alt="">
  

  <section class="goal" id="goal">
      <div class="mission-container">
        <div class="mission-box">
          <div class="mission-title">Who we are</div>
          <img src="images/Group 38.png" alt="team-logo">
          <div class="mission-description">A collaborative and innovative group of 
            professionals who wants to see 
            each other succeed.
            
            </div>
        </div>

        <div class="mission-box">
          <div class="mission-title">What we belive</div>
          <img src="images/Group 39.png" alt="team-logo">
          <div class="mission-description">We believe that technology is collaborative
            and it is important to have a community of
            peers who you can trust. 
           between members.
            </div>
        </div>

        <div class="mission-box">
          <div class="mission-title">What we do</div>
          <img src="images/Group 40.png" alt="team-logo">
          <div class="mission-description">An online discussion board 
            where people can ask questions, 
            share their experiences, and discuss 
            topics of mutual interest
            
            </div>
        </div>
      </div>

    </section>

  <section class="members" id="members">
    <div class="collab-team-container">
      <h1 class="member-title" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">Collaboration Team</h1>

      <div class="member-container">
        <div class="members" data-aos="flip-right" data-aos-delay="300" data-aos-duration="700">
          <h3 class="member-name">Rodwin Homeres</h3>
          <h4 class="member-job">Front-end developer/Admin</h4>
        </div>
  
        <div class="members" data-aos="flip-right" data-aos-delay="300" data-aos-duration="700">
          <h3 class="member-name">Renz Bato</h3>
          <h4 class="member-job">Back-end developer</h4>
        </div>
  
        <div class="members" data-aos="flip-right" data-aos-delay="300" data-aos-duration="700">
          <h3 class="member-name">Gonzalo Itulid</h3>
          <h4 class="member-job">Data adaministrator</h4>
        </div>
  
        <div class="members" data-aos="flip-right" data-aos-delay="300" data-aos-duration="700">
          <h3 class="member-name">Ivan Javier</h3>
          <h4 class="member-job">Web designer/Admin</h4>
        </div>
      </div>
    </div>
    
  </section>

  <footer class="footer" id="footer">
    <div class="logo-container">
      <img src="images/website-logo.png" alt="website-logo">
    </div>
    <div class="legal-rights">
      <p>2022 All Rights Reserved Designed by ForumHub</p> 
    </div>
    <div class="to-top-container">
      <div class="faq-container">

        <div class="contact-accounts">
          <div class="twitter">
            <img src="images/twitter-sign 1.png" alt="twitter-sign">
            <a href="#">ForumHub</a>
          </div>
          <div class="facebook">
            <img src="images/facebook 1.png" alt="facebook-sign">
            <a href="#">ForumHub</a>
          </div>
  
        </div>

        <div class="contact-no">
          <p class="phone-no">Phone: +63 962 541 5896</p>
          <p class="email">Email: forumhub@gmail.com</p>
        </div>
          
      </div>
      <a href="#" class="back">Back to Top</a>
    </div>
  </footer>



  <script>
    
    // Sign up will popup
    document.getElementById("sign-up-btn").addEventListener("click", function(){
      document.querySelector(".sign-up").style.display = "flex";
    })
    // Sign up will close
    document.querySelector(".close").addEventListener("click", function (){
      document.querySelector(".sign-up").style.display = "none";
    })
    // Sign in will popup
    document.getElementById("sign-in-btn").addEventListener("click", function(){
      document.querySelector(".sign-in").style.display = "flex";
    })
    // Sign up will close
    document.querySelector(".close1").addEventListener("click", function (){
      document.querySelector(".sign-in").style.display = "none";
    })
    // Admin login will popup
    document.querySelector(".admin").addEventListener("click", function (){
      document.querySelector(".sign-in").style.display = "none"; //Sign in will close
      document.querySelector(".admin-login-page").style.display = "flex"; //Admin login will popup
    })
    // Admin login will close
    document.querySelector(".close2").addEventListener("click", function (){
      document.querySelector(".admin-login-page").style.display = "none";
    })
    // Admin login to User Sign in 
    document.querySelector(".user").addEventListener("click", function (){
      document.querySelector(".admin-login-page").style.display = "none"; //Admin login page will close
      document.querySelector(".sign-in").style.display = "flex"; //Sign in will popup
    })
    // Sign in to Sign up
    document.querySelector(".have-account-in").addEventListener("click", function (){
      document.querySelector(".sign-in").style.display = "none"; //Sign in will close
      document.querySelector(".sign-up").style.display = "flex"; //Sign up will popup
    })
    // Sign up to Sign in
    document.querySelector(".have-account-up").addEventListener("click", function (){
      document.querySelector(".sign-up").style.display = "none"; //Sign up will close
      document.querySelector(".sign-in").style.display = "flex"; //Sign in will popup
    })

    

  </script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  AOS.init();
</script>

</body>
</html>


