

<?php
session_start();
if (isset($_POST['dodaj']) || isset($_POST['designCategory'])){

  if(isset($_SESSION['username']) && isset($_SESSION['password']))
    $user = $_SESSION['user'];

    $title = $_POST['designTitle'];
    $category = $_POST['designCategory'];
    $userid = $user;

    $tmpFile = $_FILES['pic']['tmp_name'];
    $imagename = $_FILES['pic']['name'];
    $newFile = '../images/'.$imagename;
    $result = move_uploaded_file($tmpFile, $newFile);

    $imagepath = ('images/'.$imagename);

    $connection = PDO("mysql:dbname=wt;host=mysql-57-centos7", "admin", "admin"));
    $connection->exec("set names utf8");
    $adddesign = $connection->query("INSERT INTO `design` (`id`, `id_user`, `title`, `category`, `image`) VALUES (NULL, '$userid', '$title', '$category', '$imagepath');");

    if (!$adddesign) {
        $greska = $connection->errorInfo();
        print "SQL greška: " . $greska[2];
        exit();
     }

     unset($_SESSION['error']);
     header("refresh: 0");
     header("location: ../index.php");

}
else{
  echo "<p id='phpValidation'>Please enter all fields and then submit post!</p>";
}

?>


  <div class="designs-page grid-5">

      <h1 class="main-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque adipisci molestias.</h1>

      <div class="sort-bar">
        <?php
          if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
           echo '';
          }
        	else if(($_SESSION['username'])=="admin123" && ($_SESSION['password'])=="admin123"){
             echo  '<a class="sort-link" href="php/csvDesign.php">Download csv file
             </a>';
          }
        ?>

        <input class="search-input" type="search" onkeyup="showSearch(this.value)" placeholder="search">
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
          else if(isset($_SESSION['username']) && isset($_SESSION['password'])){
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
