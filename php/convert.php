<?php
  $xml=simplexml_load_file("../xml/users.xml") or die("Error: Cannot create object");
  $mysql_db_host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST'); $connection = new PDO("mysql:dbname=wt;host=$mysql_db_host", "admin", "admin");
  //$veza->exec("set names utf8");
  $query = array();
  foreach($xml->user as $user) {
    $rezultat = $connection->query("INSERT INTO `users` (`id`, `username`, `pass`, `email`) VALUES (NULL, '$user->username', '$user->password', '$user->email');");
  }
  header('location: ../index.php');
?>
