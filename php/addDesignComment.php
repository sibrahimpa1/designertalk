<?php
session_start();

if (isset($_POST['content']))  {

	$query = $_POST['content'];
  $postId = (string)$_POST['postId'];
  $userC = (string)$_POST['userComment'];

  $connection = new PDO("mysql:dbname=wt;host=mysql-57-centos7", "admin", "admin");
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
