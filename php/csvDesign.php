<?php
file_put_contents('designPosts.csv'," Svi dizajn postovi: \n\n",FILE_APPEND);
$xml=simplexml_load_file("../xml/design.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $design){
		$designName =$design->name;
		$designCategory =$design->category;
    $designAuthor =$design->author;

		file_put_contents('designPosts.csv',"Naziv dizajna: ".(string)$designName."\n"."Kategorija dizajna: ".(string)$designCategory."\n"."Autor: ".(string)$designAuthor."\n\n",FILE_APPEND);
	}
	$file = "designPosts.csv";

	if( !file_exists($file) ) die("File not found");

  header("Content-Disposition: attachment; filename=".basename($file)." ");
	header("Content-Length: " . filesize($file));
	header("Content-Type: application/octet-stream;");

	readfile($file);
	unlink($file);

?>
