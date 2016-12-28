<?php

	session_start();

	if (!empty($_GET['username']) && !empty($_GET['password'])) {
		$u = htmlEntities($_GET['username'], ENT_QUOTES);
		$p = htmlEntities($_GET['password'], ENT_QUOTES);
	//else return false;
	$xml=simplexml_load_file("../xml/users.xml") or die("Error: Cannot create object");
	foreach ($xml->children() as $user) {
		if($user->username == $u && $user->password == $p) {

			//	session_register($u);
    	//å	session_register($p);
		    $_SESSION['username'] = $_GET['username']; // store username
		    $_SESSION['password'] = $_GET['password']; // store password
				header("location: ../index.php");
				exit();
		}
		else {
    		$error = "Invalid Username or Password Please Try Again";
    	}
  }
}

?>

<div class="login-photo overlay">
  <img src="../images/about-photo.jpg" />
    <h1 class="login-title">Log in</h1>

    <div class="log-form login-page grid-3">
              <form id='login' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method="get">

                      Username<br>
                      <input id='user' type="text" name="username" placeholder="Username">
                      <br>Password<br>
                      <input id='pass' type="password" name="password" placeholder="Password">
                      <br>


                      <input onclick='loginValidate()' class="log-in" name="login" type="submit" value="Log in">
                        <p id='validation'></p>
                  </form>

          </div>

</div>
