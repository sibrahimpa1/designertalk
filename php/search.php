<?php

	$connection = PDO("mysql:dbname=wt;host=mysql-57-centos7", "admin", "admin"));
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
