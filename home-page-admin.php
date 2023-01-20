<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum Hub</title>
  <link rel="stylesheet" href="dist/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>

  <div class="container">

    <header class="header">
      <div class="header__logo">
        <img src="images/Forum Hub Logo.png" alt="Forum Hub Logo">
      </div>
      <div class="header__navbar">
          <input type="text" placeholder="Type Search Words">
          
          <!-- <img src="images/header_search-logo.png" alt=""> -->
      </div>
      <div class="header__profile">

        <div class="header__profile__bell">
          <img src="images/header_bell.png" alt="bell">
        </div>

        <div class="header__profile__info">
          <img src="images/header_profile.png" alt="profile-pic">

          <div class="header__profile__info__stats">
            <p><?php session_start(); echo $_SESSION['user_name']; ?></p>
            <p>Online</p>
          </div>
        </div>

        <div class="polygon">
          <img src="images/header_polygon.png" alt="polygon">
        </div>

        <div class="logout">
          <a href="php/logout.php">Logout</a>
        </div>

      </div>
    </header>

    <div class="left-sidebar">
      <ul>
        <li><img src="images/left-sidebar-home-logo.png" alt="home-logo">Home</li>
        <li><img src="images/left-sidebar-id-card-logo.png" alt="id-card-logo">User Profile</li>
        <li class="menus"><img src="images/archive-logo.png" alt="menu-logo">Archive</li>
        <li id="block"><img src="images/block-logo.png" alt="block-user-logo">Blocked Users</li>
        <div id="users-account">
        <?php

          include "config.php";

          $sql = "SELECT * FROM user_form";
          $result = $conn->query($sql);

          while($row = mysqli_fetch_array($result)) {
          ?>
          <div class="users-container">
          <p><?php echo $row['name']; ?></p>
          <h3><a class="delete" href="php/delete-user.php?id=<?php
               echo $row['id'] ?>">Delete</a></h3>
          </div>
          <?php
            }
          ?>
        </div>
        <li><img src="images/files-logo.png" alt="archive-post-logo">Archived Post</li>
        <li><img src="images/schedule-logo.png" alt="schedul-logo">Schedule Post</li>
      </ul>
    </div>

    <main class="main">
      <div class="main__header">
        <ul>
          <li>Recent question</li>
          <li>Most Answers</li>
          <li>Most Voted</li>
          <li>Most Visit</li>
        </ul>
      </div>

      <hr>
      
      <div class="p-container">
        <p class="out1" id="out1">Post: Nove 23, 2022 </p>
        <p class="out2" id="out2"></p>
        <p class="out3" id="out3"></p>
        <p class="out4" id="out4"></p>
        
      </div>
      

      <?php

          include "php/dbBase.php";

          $sql = "SELECT * FROM post ORDER BY id DESC";
          $result = $conn->query($sql);

          while($row = mysqli_fetch_array($result)) {
        ?>
      <div class="main__comment" id="comment">

        <div class="main__comment__section2">
          
          <div class="post-head">
            <div class="context">
            <p class="posted">Posted: <?php echo date("Y/m/d"); ?> <span>In: <?php echo $row ['progLan']; ?></span></p>
            <p class="name">@anonymous</p>
            </div>

            <div class="option" id="option">
              <i class="fa-solid fa-ellipsis-vertical"></i>
            </div>
          </div>

          <div class="option-context" id="option-context">
            <!-- <a class="edit" href="">Edit</a> -->
            <a class="delete" href="php/delete-post-admin.php?id=<?php
               echo $row['id'] ?>">Delete</a>
               <a class="update" href="#update-post-admin">Edit</a>
          </div>

          <p class="title"><?php echo $row['title'];?></p>
          <p><?php echo $row['text'];?></p>
          <div class="imgCon">
            <img src="./imagePath/<?php echo $row['filename'];?>"alt="">
          </div>
          
          <div class="section2__footer">
            <div class="boxs">
              <button><i class="far fa-thumbs-up"></i> Like</button>
              <button id="commentBtn"><i class="far fa-comment"></i> Comments</button>
              <button><i class="fab fa-font-awesome-flag"></i> Report</button>
            </div>
          </div>
        </div>
      </div>
      <?php
          }
        ?>

    </main>

    <div class="right-sidebar">

      <div class="right-sidebar__header">
        <div class="right-sidebar__header__discussion-admin" id="right-sidebar-disc">
          <a href="#" class="discussionbtn" id="discussionbtn">+ Start Discussion</a>
        </div>
      </div>

      <div class="right-sidebar__related">

      </div>
        
        <div class="right-sidebar__related__category__bg">

        <div class="recent">
        <h3><img src="images/recent-logo.png" alt="recent-logo"> Recent Activity</h3>
        </div>
        <div class="right-sidebar__related__category__bg__comments">
            <div class="image">
              <img src="images/right-sidebar-profile1.png" alt="">
            </div>
            <div class="com">
              <p>Difference between Static and 
                Dynamic Hashing</p>
                <p><img src="images/right-sidebar-chat-logo.png" alt="chat logo">12 Comments</p>
            </div>
        </div>

        <div class="right-sidebar__related__category__bg__comments">
          <div class="image">
            <img src="images/right-sidebar-profile1.png" alt="">
          </div>
          <div class="com">
            <p>Is Golang a low-level language
              like C?</p>
              <p><img src="images/right-sidebar-chat-logo.png" alt="chat logo">7 Comments</p>
          </div>
      </div>

      <div class="right-sidebar__related__category__bg__comments">
        <div class="image">
          <img src="images/right-sidebar-profile1.png" alt="">
        </div>
        <div class="com">
          <p>What it the best way to deal with
            poor quality code during code 
            reviews?</p>
            <p><img src="images/right-sidebar-chat-logo.png" alt="chat logo">2 Comments</p>
        </div>
      </div>
    </div>

      </div>

      <div class="right-sidebar__recent">

        <div class="">
          <p><img src="images/right-sidebar-recent.png" alt="recent">Recent Activity</p>
        </div>

        <div class="recent-info">
          <div class="">
          <img src="images/right-sidebar-profile2.png" alt="">
          </div>
          <div class="">
            <p><span>Sergio Aquinna</span> started following your
            question.</p>
            <p>March 25, 2022 at 5:30pm</p>
          </div>
        </div>

        <div class="recent-info">
          <div class="">
          <img src="images/right-sidebar-profile2.png" alt="">
          </div>
          <div class="">
            <p><span>Habaza</span> added a new question “Is Golang a 
              low-level language like C?”</p>
            <p>March 25, 2022 at 5:30pm</p>
          </div>
        </div>

        <div class="recent-info">
          <div class="">
          <img src="images/right-sidebar-profile2.png" alt="">
          </div>
          <div class="">
            <p><span>Abu Hashem</span> added a new question “What it the
              best way to deal with poor quality code during 
              code reviews?”</p>
            <p>March 25, 2022 at 5:30pm</p>
          </div>
        </div>

        <div class="more">
          <img src="images/right-sidebar-more.png" alt="">
        </div>

      </div>

    </div>
  </div>

    <div class="create-post" id="create-post">
      <div class="create-post-container">
        <div class="close-container">
          <img src="images/close (1).png" alt="Close" class="close">
        </div>
        

        <form action="php/create-post-admin.php" method="POST" enctype="multipart/form-data" id="frm-lang">

          <input type="text" name="titleInput" placeholder="Title" class="title-post" id="title-post" required>

          <textarea rows="13" cols="80" placeholder="Text (Optional)" name="textInput" class="title-text" id="title-text" required></textarea>

          <fieldset>

            <legend>Categories:</legend>

            <input type="checkbox" value="Data Structure" name="languages[]">
            <label for="datastructure">Data Structure</label>
            <input type="checkbox" value="Networking" name="languages[]">
            <label for="networking">Networking</label>
            <input type="checkbox" value="Data Base" name="languages[]">
            <label for="database">Data Base</label>
            <input type="checkbox" value="OS" name="languages[]">
            <label for="os">OS</label>
            <input type="checkbox" value="Java" name="languages[]">
            <label for="java">Java</label>
            <input type="checkbox" value="Andriod" name="languages[]">
            <label for="andriod">Andriod</label><br>
            <input type="checkbox" value="IOS" name="languages[]">
            <label for="ios">IOS</label>
            <input type="checkbox" value="HTML" name="languages[]">
            <label for="html">HTML</label>
            <input type="checkbox" value="Python" name="languages[]">
            <label for="python">Python</label>
            <input type="checkbox" value="CSS" name="languages[]">
            <label for="css">CSS</label>

          </fieldset>
          <div class="footer">
            <input type="file" id="file" name="imagefile" accept=".jpg, .jpeg, .png">
            <input type="submit" name="submit" value="Post">
          </div>
        </form>
      </div>
    </div>

    <?php

    include "php/dbBase.php";

    foreach($result as $row) {

    ?>

    <div class="update-post" id="update-post">
      <div class="create-post-container">
        <div class="close-container">
          <img src="images/close (1).png" alt="Close" class="close-update">
        </div>
        
        <form action="php/update-admin.php" method="POST" enctype="multipart/form-data" id="frm-lang">
          <input type="text" hidden value='<?php echo $row['id']?>' name="id">

          <input type="text" name="titleInput" placeholder="Title" class="title-post" id="title-post" value="<?php echo $row['title']?>" required>

          <textarea rows="13" cols="80" placeholder="Text (Optional)" name="textInput" class="title-text" id="title-text" required><?php echo $row['text']?></textarea>

          <fieldset>

            <legend>Categories:</legend>

            <input type="checkbox" value="Data Structure" name="languages[]">
            <label for="datastructure">Data Structure</label>
            <input type="checkbox" value="Networking" name="languages[]">
            <label for="networking">Networking</label>
            <input type="checkbox" value="Data Base" name="languages[]">
            <label for="database">Data Base</label>
            <input type="checkbox" value="OS" name="languages[]">
            <label for="os">OS</label>
            <input type="checkbox" value="Java" name="languages[]">
            <label for="java">Java</label>
            <input type="checkbox" value="Andriod" name="languages[]">
            <label for="andriod">Andriod</label><br>
            <input type="checkbox" value="IOS" name="languages[]">
            <label for="ios">IOS</label>
            <input type="checkbox" value="HTML" name="languages[]">
            <label for="html">HTML</label>
            <input type="checkbox" value="Python" name="languages[]">
            <label for="python">Python</label>
            <input type="checkbox" value="CSS" name="languages[]">
            <label for="css">CSS</label>

          </fieldset>
          <div class="footer">
            <input type="file" id="file" name="imagefile" accept=".jpg, .jpeg, .png" value="<?php echo $row['filename']?>">
            <input type="submit" name="update" value="Update">
          </div>
        </form>
      </div>
    </div>

    <?php
    }
    ?>
  
  
  <script>

    const blockEl = document.getElementById("block");
    const userEl = document.getElementById("users-account");

    blockEl.addEventListener("click", function() {
      if(userEl.style.display == "none") {
        userEl.style.display = "block";
      }
      else {
        userEl.style.display = "none";
      }
    })

//     const categories = document.querySelector('.left-sidebar__categories')
//     const menuEl = document.querySelector('.menu')


//     menuEl.addEventListener('click', () => {
//     categories.classList.toggle('toggle')
// })

    document.getElementById("discussionbtn").addEventListener("click", function(){
      document.querySelector(".create-post").style.display = "flex";
    })
    // Sign up will close
    document.querySelector(".close").addEventListener("click", function (){
      document.querySelector(".create-post").style.display = "none";
    })
    document.querySelector(".update").addEventListener("click", function(){
      document.querySelector(".update-post").style.display = "flex";
    })
    // Sign up will close
    document.querySelector(".close-update").addEventListener("click", function (){
      document.querySelector(".update-post").style.display = "none";
    })

    const logEl = document.querySelector('.logout');
    const polyEl = document.querySelector('.polygon');

    polyEl.addEventListener("click", function() {
      logEl.classList.toggle("toggleLog");
    })

    const optionEl = document.getElementById("option"); 
    const opContextEl = document.getElementById("option-context");

    optionEl.addEventListener("click", function() {
      if(opContextEl.style.display == "none") {
        opContextEl.style.display = "block";
      } else {
        opContextEl.style.display = "none";
      }
    })

    const commentEl = document.querySelector(".main-comment");
    const commentBtnEl = document.getElementById("commentBtn");
    const boxEl = document.querySelector(".section2__footer");
    const closeComEl = document.querySelector(".closeComment");

    // commentBtnEl.addEventListener("click", function() {
    //   commentEl.style.display = "block";
    //   if(commentEl.style.display == "block") {
    //     boxEl.style.display = "none";
    //   }
    //   else {
    //     boxEl.style.display = "block";
    //   }
    // })

    closeComEl.addEventListener("click", function() {
      commentEl.style.display = "none";
      if(commentEl.style.display == "none") {
        boxEl.style.display = "block";
      }
      else {
        boxEl.style.display = "none";
      }
    })

  </script>
</body>
</html>