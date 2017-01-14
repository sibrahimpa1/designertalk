<?php

	$mysql_db_host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST'); $connection = new PDO("mysql:dbname=wt;host=$mysql_db_host", "admin", "admin");
	$connection->exec("set names utf8");

	$forum = $connection->prepare("SELECT id, title, category, content, userid, comments FROM `forum`;");
	$forum->execute();

	$query= htmlEntities($_GET['q'], ENT_QUOTES);
	$q=explode(" ", $query);

	$keepSimilar = array();


	while( $post = $forum->fetch(PDO::FETCH_ASSOC)){
		$counter = 0;
		for($j = 0; $j<count($q); $j++) {
			if((strpos(strtolower($post['title']), strtolower($q[$j])) !== false) || (strpos(strtolower($post['content']), strtolower($q[$j])) !== false)) $counter++;
		}
		if($counter == count($q)) $keepSimilar[] = $post;
	}
	if(count($keepSimilar)==0)
	{
		echo "<p>No results.</p>";
	}
	else {
		foreach ($keepSimilar as $post) {
			echo "<a href='#'>$post['title']</a>";
		}
	}
?>
