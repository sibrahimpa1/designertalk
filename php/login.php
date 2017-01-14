<?php

	session_start();

	if (!empty($_GET['username']) && !empty($_GET['password'])) {
		$u = htmlEntities($_GET['username'], ENT_QUOTES);
		$p = htmlEntities($_GET['password'], ENT_QUOTES);

		$connection = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
    $connection->exec("set names utf8");

		$user = $connection->prepare("SELECT `id`, `username`, `pass` FROM `users` WHERE username = :username AND pass = :password;");

		$user->bindValue(":username", $u);
	  $user->bindValue(":password", $p);
		$user->execute();
		$rez = $user->fetch();
		if($rez){
	   $_SESSION['username'] = $u;
	   $_SESSION['password'] = $p;

	   $k = $rez['id'];
	   $_SESSION['user'] = $k;
		 unset($_SESSION['error']);
		 header("refresh: 0");
		 header("location: ../index.php");;
		}
		else{
			header("refresh: 0");
			header("location: ../index.php");
			$greska = $connection->errorInfo();
			print "SQL greška: " . $greska[2];
			exit();
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
