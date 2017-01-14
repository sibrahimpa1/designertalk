<?php

	$connection = new PDO("mysql:dbname=wt;host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST')", "admin", "admin");
	$connection->exec("set names utf8");

	$query= htmlEntities($_GET['q'], ENT_QUOTES);
 	$q=explode(" ", $query);
	$searchExp = array();
  foreach ($q as $term) {
      $term = trim($term);
      if (!empty($term)) {
          $searchExp[] = "title LIKE '%$term%' OR category LIKE '%$term%'";
      }
  }

  $result = $connection->prepare("SELECT id, id_user, title, category, image, comments FROM `design` WHERE ".implode(' AND ', $searchExp).";");
  $result->execute();

  foreach ($result as $post){?>
      <a href='#'><?php echo $post['title']; ?></a>
    <?php }

 ?>
