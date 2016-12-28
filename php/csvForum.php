<?php
file_put_contents('forumPosts.csv'," Svi forum postovi: \n\n",FILE_APPEND);
$xml=simplexml_load_file("../xml/forum.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $forumpost){
		$postTitle =$forumpost->title;
		$postCategory =$forumpost->category;
    $postDesc =$forumpost->description;

		file_put_contents('forumPosts.csv',"Ime: ".(string)$postTitle."\n"."Kategorija: ".(string)$postCategory."\n"."Opis teme: ".(string)$postDesc."\n\n",FILE_APPEND);
	}
	$file = "forumPosts.csv";

	if( !file_exists($file) ) die("File not found");

  header("Content-Disposition: attachment; filename=".basename($file)." ");
	header("Content-Length: " . filesize($file));
	header("Content-Type: application/octet-stream;");

	readfile($file);
	unlink($file);

?>
