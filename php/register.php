<?php

  session_start();

  if(!empty($_POST['userName']) && !empty($_POST['userPassword']) && !empty($_POST['userEmail'] )){

    $xml= new SimpleXMLElement("../xml/users.xml", null, true);
    $counter = count($xml->children());

    $getname = $_POST['userName'];
    $getpass = $_POST['userPassword'];
    $getmail = $_POST['userEmail'];

    $users = $xml->addChild('user');

    $users->addChild('id', $counter+1);
    $users->addChild('username', $getname);
    $users->addChild('password', $getpass);
    $users->addChild('email', $getmail);
    $users->addChild('image', 'images/user.jpg');
    $users->addChild('alt', 'user-image');

    $xml->asXML("../xml/users.xml");
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
