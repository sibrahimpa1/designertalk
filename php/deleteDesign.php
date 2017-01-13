<?php
session_start();

if (isset($_POST['id'])){

	$query = $_POST['id'];
  $connection = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
  $connection->exec("set names utf8");
  $designs = $connection->prepare("DELETE FROM `design` WHERE id=$query;");
  $designs->bindValue(":query", $query, PDO::PARAM_INT);

    $designs->execute();

    if (!$designs) {
        $greska = $connection->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
   }
}
?>
