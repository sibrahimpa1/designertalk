<?php
file_put_contents('userList.csv'," Svi korisnici: \n\n",FILE_APPEND);
$xml=simplexml_load_file("../xml/users.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $user){
		$userName =$user->name;
		$userLastname =$user->lastname;
    $userJob =$user->job;
    $userEmail = $user->email;

		file_put_contents('userList.csv',"Ime:  ".(string)$userName."\n"."Prezime:  ".(string)$userLastname."\n"."Zanimanje:  ".(string)$userJob."\n"."Email korisnika:  ".(string)$userEmail."\n\n",FILE_APPEND);
	}
	$file = "userList.csv";

	if( !file_exists($file) ) die("File not found");

  header("Content-Disposition: attachment; filename=".basename($file)." ");
	header("Content-Length: " . filesize($file));
	header("Content-Type: application/octet-stream;");

	readfile($file);
	unlink($file);

?>
