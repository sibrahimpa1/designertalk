<?php
session_start();

if (isset($_POST['id'])){

	$query = $_POST['id'];
  $connection = new PDO("mysql:dbname=wt;host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST')", "admin", "admin");
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
