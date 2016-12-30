<?php
session_start();

if (isset($_POST['postCategory']) && !empty($_POST['postTitle']) && !empty($_POST['postDesc']) && !empty($_POST['postCategory'])){
    $post = file_get_contents('php://input');

    $xml= new SimpleXMLElement("../xml/forum.xml", null, true);
  //  echo($_POST['postTitle']);

      $counter=0;

      foreach($xml->children() as $forumpost) {
        $counter+=1;
      }

      $counter++;


      $title = $_POST['postTitle'];
      $desc = $_POST['postDesc'];
      $category = $_POST['postCategory'];


      $posts = $xml->addChild('forumpost');

      $posts->addChild('category', $title);
      $posts->addChild('title', $category);
      $posts->addChild('description', $desc);
      $posts->addChild('id', $counter);
      $posts->addChild('comments', '0');
      $posts->addChild('suggestions', '0');
    $xml->asXML("../xml/forum.xml");
}
else{
  echo "<p id='phpValidation'>Please enter all fields and then submit post!</p>";
}

?>


<div class="forum-page grid-5">

  <h1 class="main-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque adipisci molestias.</h1>

  <div class="sort-bar">
    <?php
      session_start();
      if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
       echo '';
      }
      else{
         echo  '<a class="sort-link" href="php/csvForum.php">Download csv file
         </a>';
      }
    ?>


  </div>

  <div id='content-box' class="content-box clearfix">
    <h3 class="content-title">Recent forum posts</h3>


  </div>

  <div class="content-box clearfix add-forum-post">
    <h3 class="content-title">Add new post</h3>

    <?php
      if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
       echo '<h1 class="log-in-warning">Log in like admin to add new forum posts!</h1>';
      }
      else{
        $tmp=htmlspecialchars($_SERVER["PHP_SELF"]);
        echo '<div class="post-form">
      <form class="clearfix" id="new-post" role="form" action="<?php echo $tmp?>" method="POST">

        Post title:<br>
        <input id="title" type="text" placeholder="Title" name="postTitle">
        <br> Choose category:<br>

      <select id="category" name="postCategory">
                   <option>- Select -</option>
                    <option>UI</option>
                    <option>Icons</option>
                    <option>App design</option>
                    <option>UI/UX</option>
      </select>

        <br> Post content:<br>

        <textarea id="content" cols="10" rows="5" placeholder="Enter post content here.." name="postDesc"></textarea>

        <input onclick="loadForum(true)" class="post" type="button" value="POST">

        <p id="validation"></p>

      </form>

    </div>'; }
    ?>

  </div>

</div>
