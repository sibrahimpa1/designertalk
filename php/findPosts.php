<?php

	$mysql_db_host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST'); $connection = new PDO("mysql:dbname=wt;host=$mysql_db_host", "admin", "admin");
	$connection->exec("set names utf8");
	$query= htmlEntities($_GET['q'], ENT_QUOTES);
	$q=explode(" ", $query);

	$searchExp = array();
	foreach ($q as $term) {
			$term = trim($term);
			if (!empty($term)) {
					$searchExp[] = "title LIKE '%$term%' OR content LIKE '%$term%'";
			}
	}

	$result = $connection->prepare("SELECT  id, title, category, content, userid FROM `forum` WHERE ".implode(' AND ', $searchExp).";");
	$result->execute();

	foreach ($result as $post){?>
			<a onclick='loadForumPost( <?php echo $post['id'];?> ,true)'><?php echo $post['title']; ?></a>

			<?php } ?>
