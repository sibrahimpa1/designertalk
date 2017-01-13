<?php
	session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET')  {
  $connection = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
  $connection->exec("set names utf8");
  $forum = $connection->prepare("SELECT id, title, category, content, userid, comments FROM `forum`;");

  $forum->execute();

	if (!$forum) {
      $greska = $connection->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 }

	while($forumpost = $forum->fetch(PDO::FETCH_ASSOC)) {
?>

        <div class='forum-post-box'>
          <p class='forum-category'>
            <span>Category:</span> <?php echo $forumpost['category'] ;?>
          </p>

          <p></p>
          <h4><?php echo $forumpost['title'] ;?></h4>
          <p class='forum-post-description'>
            <?php echo $forumpost['content'] ;?>
          </p>

          <p class='forum-post-info'>
            <span class='comment-icon'>
                        <img src='images/comment.svg'>
                  <a href='#'> <?php echo $forumpost['comments'];?> comments</a>
            </span>
          </p>

					<?php
						if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
						 echo '';
						}
						else if(($_SESSION['username'])=="admin123" && ($_SESSION['password'])=="admin123"){
					?>
						  <a class="delete-post"  onclick="return deleteForum( <?php echo (string)$forumpost['id'];?>, true);">Delete post</a>
					<?php
							}
					?>


          <a class='see-more open-post' onclick='loadForumPost()'>See full post</a>
        </div>
<?php
	}
}
?>
