<?php
	$xml=simplexml_load_file("../xml/forum.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $forumpost) {
    echo "
        <div class='forum-post-box'>
          <p class='forum-category'>
            <span>Category:</span> $forumpost->category
          </p>
          <div class='recommend-info'>
            <img src='images/heart.svg'>
            <span> $forumpost->suggestions suggestions</span>
          </div>

          <p></p>
          <h4>$forumpost->title</h4>
          <p class='forum-post-description'>
            $forumpost->description
          </p>

          <p class='forum-post-info'>
            <span class='comment-icon'>
                        <img src='images/comment.svg'>
                  <a href=#'>$forumpost->comments comments</a>
                </span>
          </p>

					<a class='delete-post' onclick='deleteForum($forumpost->id, true)'>Delete post</a>

          <a class='see-more open-post' onclick='loadForumPost()'>See full post</a>
        </div>

  ";
  	}
?>
