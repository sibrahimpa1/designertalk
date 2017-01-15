<?php
	session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET')  {
	$query = $_GET['q'];
  $mysql_db_host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST'); $connection = new PDO("mysql:dbname=wt;host=$mysql_db_host", "admin", "admin");
  $connection->exec("set names utf8");
  $design = $connection->prepare("SELECT u.username as username, d.id, d.id_user, d.title as title, d.category as category, d.image as image FROM `design` AS d, `users` as u WHERE d.id=:query;");
  $design->bindValue(":query", $query, PDO::PARAM_INT);
	$design->execute();

$designpost = $design->fetch(PDO::FETCH_ASSOC);

?>

<div id='post-page' class="design-post-page clearfix grid-5">

  <a class="go-back" onclick='loadDesigns()'>Go back to designs</a>

  <div id='content-box' class="content-box clearfix">
    <div id='single-post' class="design-post-box big-design-box clearfix">
      <div class="design-img-thumb big-thumb">
        <img src='<?php echo $designpost['image'] ;?>'>
      </div>

      <div class="design-info">

        <h4 href="#"><?php echo $designpost['title'];?></h4>

        <p class="design-category">
          <span>Category:</span><?php echo $designpost['category'] ;?>
        </p>
        <p class="design-autor">
          by <a href="#"><?php echo $designpost['username'];?></a>
        </p>

      </div>
    </div>
  </div>

</div>

<?php

}
?>
