<?php
session_start();

if (isset($_POST['content']))  {

	$query = $_POST['content'];
  $postId = (string)$_POST['postId'];
  $userC = (string)$_POST['userComment'];

  $mysql_db_host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST'); $connection = new PDO("mysql:dbname=wt;host=$mysql_db_host", "admin", "admin");
  $connection->exec("set names utf8");
  $forum = $connection->prepare("INSERT INTO `forum-comment` (`id`, `id_post`, `id_user`, `content`) VALUES (NULL, '$postId', '$userC', '$query');");

    $forum->execute();

    if (!$forum) {
        $greska = $connection->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
   }
   unset($_SESSION['error']);
   header("refresh: 0");
   header("location: ../index.php");
}
?>
