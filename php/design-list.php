<?php

session_start();


if (isset($_POST['dodaj']) || isset($_POST['designCategory'])){

    $xml= new SimpleXMLElement("../xml/design.xml", null, true);
    $counter=0;

    foreach($xml->children() as $design) {
      $counter+=1;
    }

    $counter++;

    $tmpFile = $_FILES['pic']['tmp_name'];
    $imagename = $_FILES['pic']['name'];
    $newFile = '../images/'.$imagename;
    $result = move_uploaded_file($tmpFile, $newFile);

    if ($result) {
          $title = $_POST['designTitle'];
      $category = $_POST['designCategory'];

    $posts = $xml->addChild('design');

    $posts->addChild('name', $title);
    $posts->addChild('category', $category);
    $posts->addChild('author', "autor");
    $posts->addChild('id',$counter);
    $posts->addChild('pic', 'images/'.$imagename);
    $xml->asXML("../xml/design.xml");

    unset($_SESSION['error']);
         header("refresh: 0");
         header("location: ../index.php");

    }
    else {
          $_SESSION['error'] = "Niste odabrali sliku!";
         header("location: ../index.php");
    }
}

?>



  <div class="designs-page grid-5">

      <h1 class="main-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque adipisci molestias.</h1>

      <div class="sort-bar">
        <?php
          session_start();
          if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
           echo '';
          }
        	else if(($_SESSION['username'])=="admin123" && ($_SESSION['password'])=="admin123"){
             echo  '<a class="sort-link" href="php/csvDesign.php">Download csv file
             </a>';
          }
        ?>

        <textarea class="search-input" type="search" onkeyup="showSearch(this.value)" placeholder="search"></textarea>
        <div id="search-dropdown" class="search-content">

        </div>
      </div>

      <div id='content-box' class="content-box clearfix">
          <h3 class="content-title">Latest designs</h3>

        <!-- ajax call -->


      </div>



      <div class="content-box clearfix add-forum-post">
        <h3 class="content-title">Add new design</h3>

        <?php
          if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
           echo '<h1 class="log-in-warning">Log in like admin to add new designs!</h1>';
          }
          else if(($_SESSION['username'])=="admin123" && ($_SESSION['password'])=="admin123"){
            $tmg = htmlspecialchars($_SERVER["PHP_SELF"]);

             echo  ' <div class="post-form">
                 <form class="clearfix" id="new-post" enctype="multipart/form-data" role="form" action="php/design-list.php" method="POST">Design title:<br>
                   <input id="title" type="text" placeholder="Title" name="designTitle">
                   <br> Choose category:<br>

                 <select id="category" name="designCategory">
                              <option>- Select -</option>
                               <option>UI</option>
                               <option>Icons</option>
                               <option>App design</option>
                               <option>UI/UX</option>
                 </select>


                   <!-- missing for photo upload -->

                   <input id="image" type="file" class="img-input" name="pic" accept="image/*">
                   <input onclick="loadDesigns(true)" class="post" name="dodaj" type="submit" value="POST">

                   <p id="validation"></p>

                 </form>

               </div>';
          }
          else{
              echo '<h1 class="log-in-warning">Only admin can add designs for now</h1>';
            }
        ?>


      </div>

  </div>
