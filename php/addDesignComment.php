<?php
session_start();

if (isset($_POST['content']))  {

	$query = $_POST['content'];
  $postId = (string)$_POST['postId'];
  $userC = (string)$_POST['userComment'];

  $mysql_db_host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST'); $connection = new PDO("mysql:dbname=wt;host=$mysql_db_host", "admin", "admin");
  $connection->exec("set names utf8");
  $design = $connection->prepare("INSERT INTO `design-comment` (`id`, `id_design`, `id_user`, `content`) VALUES (NULL, '$postId', '$userC', '$query');");

    $design->execute();

    if (!$design) {
        $greska = $connection->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
   }
   unset($_SESSION['error']);
   header("refresh: 0");
   header("location: ../index.php");
}
?>
