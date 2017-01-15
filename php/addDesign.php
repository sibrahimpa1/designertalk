<?php
session_start();

if (isset($_POST['dodaj']) || isset($_POST['designCategory'])){

  if(isset($_SESSION['username']) && isset($_SESSION['password']))
    $user = $_SESSION['user'];

    $title = $_POST['designTitle'];
    $category = $_POST['designCategory'];
    $userid = $user;

    $tmpFile = $_FILES['pic']['tmp_name'];
    $imagename = $_FILES['pic']['name'];
    $newFile = '../images/'.$imagename;
    $result = move_uploaded_file($tmpFile, $newFile);

    $imagepath = ('images/'.$imagename);

    $mysql_db_host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST'); $connection = new PDO("mysql:dbname=wt;host=$mysql_db_host", "admin", "admin");
    $connection->exec("set names utf8");
    $adddesign = $connection->query("INSERT INTO `design` (`id`, `id_user`, `title`, `category`, `image`) VALUES (NULL, '$userid', '$title', '$category', '$imagepath');");

    if (!$adddesign) {
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
