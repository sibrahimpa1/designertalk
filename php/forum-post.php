<?php
	session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET')  {
	$query = $_GET['q'];
  $connection = new PDO("mysql:dbname=wt;host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST')", "admin", "admin");
  $connection->exec("set names utf8");
  $forum = $connection->prepare("SELECT id, title, category, content, userid FROM `forum` WHERE id=:query;");
  $forum->bindValue(":query", $query, PDO::PARAM_INT);
  $forum->execute();


	if (!$forum) {
      $greska = $connection->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 }

while($forumpost = $forum->fetch(PDO::FETCH_ASSOC)) {
	$commentsquery=$connection->prepare("SELECT COUNT(*) as n FROM `forum-comment` WHERE id_post=:forumid;");
	$commentsquery->bindValue(":forumid", $forumpost['id'], PDO::PARAM_INT);
	$commentsquery->execute();
	$commentsnumber = $commentsquery->fetch(PDO::FETCH_ASSOC);
?>

  <div id='post-page' class="forum-post-page grid-5">

    <a class="go-back" onclick='loadForum()'>Go back</a>

    <div id='content-box' class="content-box clearfix">
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
                  <a href='#'> <?php echo (int)$commentsnumber['n'];?> comments</a>
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

        </div>
    </div>

  </div>

<?php
  }
}
?>
