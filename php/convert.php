<?php
  $xml=simplexml_load_file("../xml/users.xml") or die("Error: Cannot create object");
  $connection = new mysqli("localhost", "root", "", "wt");
  //$veza->exec("set names utf8");
  $query = array();
  foreach($xml->user as $user) {
    $rezultat = $connection->query("INSERT INTO `users` (`id`, `username`, `pass`, `email`) VALUES (NULL, '$user->username', '$user->password', '$user->email');");
  }
  header('location: ../index.php');
?>
