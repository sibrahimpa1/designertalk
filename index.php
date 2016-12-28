<!DOCTYPE html>
<html>

<head>

  <script src="js/formValidation.js"></script>


  <meta name="viewport" content="width=device-width">
  <title>DesignersTalk</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:100,100i,300,400,500,700,900" rel="stylesheet">

  <link rel='stylesheet' type='text/css' href='css/main.css' />
  <link rel='stylesheet' type='text/css' href='css/profile.css' />
  <link rel='stylesheet' type='text/css' href='css/about.css' />
  <link rel='stylesheet' type='text/css' href='css/contact.css' />
  <link rel='stylesheet' type='text/css' href='../css/login.css' />

  <link rel='stylesheet' type='text/css' href='css/forum-post.css' />
  <link rel='stylesheet' type='text/css' href='css/design-post.css' />
  <link rel='stylesheet' type='text/css' href='css/register.css' />



  <link rel='stylesheet' type='text/css' href='css/media.css' />

  <script src="js/main.js"></script>

</head>

<body id='body'>

  <header>

    <nav id="primary_nav_wrap">
      <a class='open-dropdown' onclick="dropdownToggle()">See all pages</a>

      <div id='dropdown' class="dropdown">

        <ul>

          <li><a onclick='loadProfile()'>Profile</a></li>
          <li><a onclick='loadDesigns()'>Designs</a></li>
          <li><a onclick='loadForum()'>Forum</a></li>
          <li><a onclick='loadAbout()'>About Us</a></li>

          <li><a onclick='loadContact()'>Contact</a></li>


  			<?php

          session_start();

          if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
           echo '<li><a onclick="loadLogin()" class="log-btn-mobile">Log in</a></li>';
				  }
          else{
             echo '<a href="php/logOut.php" class="log-btn-mobile">Log out</a>';
          }
        ?>

        </ul>


      </div>

    </nav>

    <div class="logo grid-1">
      <a onclick='loadMain()'>
        <img class="logo" src='images/logo.png' alt='logo' />
      </a>
    </div>

    <div class="header-links grid-4">
      <a href="php/csvUsers.php">Users csv</a>
      <a onclick='loadProfile()'>Profile</a>
      <a onclick='loadDesigns()'>Designs</a>
      <a onclick='loadForum()'>Forum</a>
      <a onclick='loadAbout()'>About Us</a>
      <a onclick='loadContact()'>Contact</a>

      <?php

        session_start();

        if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
         echo '<a onclick="loadLogin()">Log in</a>';
        }
        else{
           echo '<a href="php/logOut.php">Log out</a>';
        }
      ?>

    </div>



  </header>

  <div id='join' class="join-us-bar clearfix">
    <h4>Join us in few seconds!</h4>
    <a onclick='loadRegister()'>Register</a>
  </div>


  <div id='main-page' class="main-page-content">

    <!-- ajax calls on this container -->

  </div>

  <footer>
    <h3>All rights reserved.</h3>
  </footer>

  <div id="modal" class="modal">
    <div class="modal-view">
      <div class="modal-close" onclick="toggleModal('hide');">X</div>

      <div class="design-post-box">
        <div class="design-img-thumb modal-img-wrap">
          <img id='modal-img' src="">
        </div>
      </div>

    </div>
  </div>


</body>

</html>
