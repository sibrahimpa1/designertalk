<?php

  session_start();

  if(!empty($_POST['userName']) && !empty($_POST['userPassword']) && !empty($_POST['userEmail'] )){

     $username = $_POST['userName'];
     $pass = $_POST['userPassword'];
     $email = $_POST['userEmail'];

     $mysql_db_host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST'); $connection = new PDO("mysql:dbname=wt;host=$mysql_db_host", "admin", "admin");
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

<?php
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
  echo';<div class="join-us-box overlay">

    <img src="images/background.jpg" />

    <div class="join-form-wrap">
        <div class="join-content">

            <h3 class="grid-2">Join us right now!</h3>

            <div class="join-form grid-3">
                <form id="register" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    Choose username:<br>
                    <input id="user" type="text" placeholder="Username" name="userName">
                    <br>Enter password:<br>
                    <input id="pass" type="password" placeholder="Password" name="userPassword">
                    <br> Your email:<br>
                    <input id="email" type="text" placeholder="Email" name="userEmail">
                    <input class="submit" type="submit" onclick="registerValidate()" value="Sign up">
                    <p id="validation"></p>
                </form>
            </div>
        </div>
    </div>

</div>';
}
else{
    echo "";
}

?>
