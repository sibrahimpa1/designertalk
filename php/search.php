
<?php
	$xml=simplexml_load_file("../xml/design.xml") or die("Error: Cannot create object");

	$query= htmlEntities($_GET['q'], ENT_QUOTES);
	$q=explode(" ", $query);

	$keepSimilar = array();

	foreach ($xml->children() as $design) {
		$counter = 0;
		for($i = 0; $i<count($q); $i++) {
			if((strpos(strtolower($design->name), strtolower($q[$i])) !== false) || (strpos(strtolower($design->category), strtolower($q[$i])) !== false)) $counter++;
		}
		if($counter == count($q)) $keepSimilar[] = $design;
	}
	if(count($keepSimilar)==0)
	{
		echo "<p>No results.</p>";
	}
	else {
		foreach ($keepSimilar as $design) {

			echo "<a href='#'>$design->name</a>";
		}
	}
?>
