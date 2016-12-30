<?php
if (isset($_POST['id'])){
    echo("jajajajaj");

    $tmp = $_POST['id'];

    $xml= new SimpleXMLElement("../xml/forum.xml", null, true);

    foreach($xml->children() as $forumpost) {
      if($forumpost->id==$tmp){
        $forumpost=dom_import_simplexml($forumpost);
        $forumpost->parentNode->removeChild($forumpost);
      }
    }

    $xml->asXML("../xml/forum.xml");
}
?>
