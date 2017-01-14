<?php
session_start();

if (isset($_POST['id'])){

	$query = $_POST['id'];
  $mysql_db_host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST'); $connection = new PDO("mysql:dbname=wt;host=$mysql_db_host", "admin", "admin");
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
