<?php
if (isset($_POST['submit'])){
    $post = file_get_contents('php://input');
    echo($post);

    $xml= new SimpleXMLElement("../xml/forum.xml", null, true);
    echo($_POST['postTitle']);

  	$title = $_POST['postTitle'];
		$desc = $_POST['postDesc'];
    $category = $_POST['postCategory'];


    $posts = $xml->addChild('forumpost');

    $posts->addChild('category', $title);
    $posts->addChild('title', $category);
    $posts->addChild('description', $desc);

    $xml->asXML("../xml/forum.xml");
}

?>


<div class="forum-page grid-5">

  <h1 class="main-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque adipisci molestias.</h1>

  <div class="sort-bar">

    <a class="sort-link">Sort by
        </a>

    <ul class="sort-option">
      <li>
        Suggestions
      </li>
      <li>
        Date
      </li>
    </ul>
  </div>

  <div id='content-box' class="content-box clearfix">
    <h3 class="content-title">Recent forum posts</h3>


  </div>

  <div class="content-box clearfix add-forum-post">
    <h3 class="content-title">Add new post</h3>

    <div class="post-form">
      <form class="clearfix" id='new-post' role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

        Post title:<br>
        <input id='title' type="text" placeholder="Title" name="postTitle">
        <br> Choose category:<br>

      <select id='category' name='postCategory'>
                  <option value="choose">- Select -</option>
                    <option value="volvo">UI</option>
                    <option value="saab">Icons</option>
                    <option value="opel">App design</option>
                    <option value="audi">UI/UX</option>
        </select>

        <br> Post content:<br>

        <textarea id='content' cols="10" rows="5" placeholder="Enter post content here.." name='postDesc'></textarea>

        <input onclick='postValidation()' class="post" type="submit" value="Post" name="submit">

        <p id='validation'></p>

      </form>

    </div>

  </div>

</div>
