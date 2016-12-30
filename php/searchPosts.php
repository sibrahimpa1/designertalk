
<?php
	$xml=simplexml_load_file("../xml/forum.xml") or die("Error: Cannot create object");

	$query= htmlEntities($_GET['q'], ENT_QUOTES);
	$q=explode(" ", $query);

	$keepSimilar = array();

	foreach ($xml->children() as $forumpost) {
		$counter = 0;
		for($j = 0; $j<count($q); $j++) {
			if((strpos(strtolower($forumpost->title), strtolower($q[$j])) !== false) || (strpos(strtolower($forumpost->description), strtolower($q[$j])) !== false)) $counter++;
		}
		if($counter == count($q)) $keepSimilar[] = $forumpost;
	}
	if(count($keepSimilar)==0)
	{
		echo "<p>No results.</p>";
	}
	else {
		foreach ($keepSimilar as $forumpost) {

			echo "<a href='#'>$forumpost->title</a>";
		}
	}
?>
