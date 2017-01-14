<?php
session_start();

if (!empty($_POST['postTitle']) && !empty($_POST['postDesc']) && !empty($_POST['postCategory'])){

  if(isset($_SESSION['username']) && isset($_SESSION['password']))
    $user = $_SESSION['user'];

    $title = $_POST['postTitle'];
    $category = $_POST['postCategory'];
    $content = $_POST['postDesc'];
    $userid = (string)$user;

    $connection = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
    $connection->exec("set names utf8");
    $addpost = $connection->query("INSERT INTO `forum` (`id`, `title`, `category`, `content`, `userid`, `comments`) VALUES (NULL, '$title', '$category', '$content', '$userid', '20');");

    if (!$addpost) {
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


<div class="forum-page grid-5">

  <h1 class="main-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque adipisci molestias.</h1>

  <div class="sort-bar">
    <?php
      if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
       echo '';
      }
      else if(($_SESSION['username'])=="admin123" && ($_SESSION['password'])=="admin123"){
         echo  '<a class="sort-link" href="php/csvForum.php">Download csv file
         </a>';
      }
    ?>

    <input class="search-input" type="search" onkeyup="showSearchPosts(this.value)" placeholder="Search.." rows="1" cols="20">
    <div id="search-dropdown" class="search-content">

    </div>

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
      else if(($_SESSION['username'])=="admin123" && ($_SESSION['password'])=="admin123"){
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
    else{
      echo '<h1 class="log-in-warning">Only admin can add posts</h1>';
    }
    ?>

  </div>

</div>
