<?php
if (isset($_POST['designTitle'])){

    $xml= new SimpleXMLElement("../xml/design.xml", null, true);

  	$title = $_POST['designTitle'];
    $category = $_POST['designCategory'];

    $posts = $xml->addChild('design');

    $posts->addChild('name', $title);
    $posts->addChild('category', $category);
    $posts->addChild('author', "autor");

    $xml->asXML("../xml/design.xml");
}

?>



  <div class="designs-page grid-5">

      <h1 class="main-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque adipisci molestias.</h1>

      <div class="sort-bar">

          <a class="sort-link">Sort by
          </a>

          <ul class="sort-option">
            <li>
              Likes
            </li>
            <li>
              Date
            </li>
          </ul>
      </div>

      <div id='content-box' class="content-box clearfix">
          <h3 class="content-title">Latest designs</h3>

        <!-- ajax call -->


      </div>

      <div class="content-box clearfix add-forum-post">
        <h3 class="content-title">Add new design</h3>

        <div class="post-form">
          <form class="clearfix" id='new-post' role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

            Design title:<br>
            <input id='title' type="text" placeholder="Title" name="designTitle">
            <br> Choose category:<br>

          <select id='category' name='designCategory'>
                       <option>- Select -</option>
                        <option>UI</option>
                        <option>Icons</option>
                        <option>App design</option>
                        <option>UI/UX</option>
          </select>


            <!-- missing for photo upload -->


            <input onclick='loadDesigns(true)' class="post" type="button" value="POST">

            <p id='validation'></p>

          </form>

        </div>

      </div>

  </div>
