<?php
if (isset($_POST['id'])){

    $tmp = $_POST['id'];

    $xml= new SimpleXMLElement("../xml/design.xml", null, true);

    foreach($xml->children() as $design) {
      if($design->id==$tmp){
        $design=dom_import_simplexml($design);
        $design->parentNode->removeChild($design);
      }
    }

    $xml->asXML("../xml/design.xml");
}
?>
