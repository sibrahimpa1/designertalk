<?php
	$connection = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
	$connection->exec("set names utf8");
	$forum = $connection->prepare("SELECT id, title, category, content, userid, comments FROM `forum`;");
	$forum->execute();
	$query= htmlEntities($_GET['q'], ENT_QUOTES);
 	$q=explode(" ", $query);
	$searchExp = array();
  foreach ($q as $term) {
      $term = trim($term);
      if (!empty($term)) {
          $searchExp[] = "title LIKE '%$term%' OR content LIKE '%$term%'";
      }
  }
  $result = $connection->prepare("SELECT id, title, category, content, userid, comments FROM `forum` WHERE ".implode(' AND ', $searchExp).";");
  $result->execute();
  foreach ($result as $post){?>
      <a href='#'><?php echo $post['title']; ?></a>
    <?php }
 ?>
