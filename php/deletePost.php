<?php
session_start();

if (isset($_POST['id']))  {

	$query = $_POST['id'];
  $connection = PDO("mysql:dbname=wt;host=mysql-57-centos7", "admin", "admin"));
  $connection->exec("set names utf8");
  $forum = $connection->prepare("DELETE FROM `forum` WHERE id=$query;");
  $forum->bindValue(":query", $query, PDO::PARAM_INT);

    $forum->execute();

    if (!$forum) {
        $greska = $connection->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
   }
}
?>
