<?php

  session_start();

  if(!empty($_POST['userName']) && !empty($_POST['userPassword']) && !empty($_POST['userEmail'] )){

     $username = $_POST['userName'];
     $pass = $_POST['userPassword'];
     $email = $_POST['userEmail'];

     $connection = PDO("mysql:dbname=wt;host=mysql-57-centos7", "admin", "admin"));
     $connection->exec("set names utf8");
     $adduser = $connection->query("INSERT INTO `users` (`id`, `username`, `pass`, `email`) VALUES (NULL, '$username', '$pass', '$email');");

     if (!$adduser) {
         $greska = $connection->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
      }


    unset($_SESSION['error']);
    header("refresh: 0");
    header("location: ../index.php");
  }
  else{
      echo "<p id='phpValidation'>Please enter all fields and then submit post!</p>";
  }


?>

<div class="login-photo overlay">
  <img src="images/about-photo.jpg" />
    <h1 class="login-title">Join us!</h1>

    <div class="register-text">

    </div>


    <div class="log-form grid-3">
              <form id='register'  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                      Choose your username<br>
                      <input id='user' type="text" name="userName" placeholder="Username">
                      <br>Enter your password<br>
                      <input id='pass' type="password" name="userPassword" placeholder="Password">
                      <br>

                      <br>Enter your email address<br>
                      <input id='email' type="email" name="userEmail" placeholder="Email">
                      <br>

                      <input class="log-in" type="submit" onclick="registerValidate()" value="Register">
                        <p id='validation'></p>
                  </form>

          </div>

</div>
