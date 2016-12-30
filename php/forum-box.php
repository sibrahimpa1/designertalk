<?php
	session_start();
	$xml=simplexml_load_file("../xml/forum.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $forumpost) {
?>

        <div class='forum-post-box'>
          <p class='forum-category'>
            <span>Category:</span> <?php echo $forumpost->category ;?>
          </p>
          <div class='recommend-info'>
            <img src='images/heart.svg'>
            <span> <?php echo $forumpost->suggestions ;?> suggestions</span>
          </div>

          <p></p>
          <h4><?php echo $forumpost->title ;?></h4>
          <p class='forum-post-description'>
            <?php echo $forumpost->description ;?>
          </p>

          <p class='forum-post-info'>
            <span class='comment-icon'>
                        <img src='images/comment.svg'>
                  <a href='#'> <?php echo $forumpost->comments;?> comments</a>
            </span>
          </p>

					<?php
						if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
						 echo '';
						}
						else if(($_SESSION['username'])=="admin123" && ($_SESSION['password'])=="admin123"){
					?>
						  <a class="delete-post"  onclick="return deleteForum( <?php echo (string)$forumpost->id;?>, true);">Delete post</a>
					<?php
							}
					?>


          <a class='see-more open-post' onclick='loadForumPost()'>See full post</a>
        </div>
<?php
  	}
?>
