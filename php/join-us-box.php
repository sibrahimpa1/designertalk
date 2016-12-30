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
    $users->addChild('name', $getname);
    $users->addChild('password', $getpass);
    $users->addChild('email', $getmail);
    $users->addChild('image', 'images/user.jpg');
    $users->addChild('alt', 'user-image');

    $xml->asXML("../xml/users.xml");
    unset($_SESSION['error']);
    header("refresh: 0");
    header("location: ../index.php");
  }


?>

<div class="join-us-box overlay">

    <img src="images/background.jpg" />

    <div class="join-form-wrap">
        <div class="join-content">

            <h3 class="grid-2">Join us right now!</h3>

            <div class="join-form grid-3">
                <form id='register' method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    Choose username:<br>
                    <input id='user' type="text" placeholder="Username" name='userName'>
                    <br>Enter password:<br>
                    <input id='pass' type="password" placeholder="Password" name='userPassword'>
                    <br> Your email:<br>
                    <input id='email' type="text" placeholder="Email" name="userEmail">
                    <input class='submit' type="submit" onclick="registerValidate()" value="Sign up">
                    <p id='validation'></p>
                </form>
            </div>
        </div>
    </div>

</div>
