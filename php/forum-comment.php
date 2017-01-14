<?php
	session_start();


  if ($_SERVER['REQUEST_METHOD'] === 'GET')  {
	$query = $_GET['q'];
  $connection = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
  $connection->exec("set names utf8");
  $forum = $connection->prepare("SELECT u.id, f.content as content, u.username as username, f.id, f.id_post, f.id_user, content FROM `forum-comment` AS f, `users` AS u  WHERE f.id_post=:query AND f.id_user=u.id;");
  $forum->bindValue(":query", $query, PDO::PARAM_INT);
  $forum->execute();

	if (!$forum) {
      $greska = $connection->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 }



?>

    <div class="comments clearfix">

      <h4>Comments</h4>

<?php
  while($forumComment = $forum->fetch(PDO::FETCH_ASSOC)) {

?>
      <div class="one-comment">
        <h3><?php echo $forumComment['username'] ;?></h3>
        <p>
          <?php echo $forumComment['content'] ;?>
        </p>
      </div>
<?php
  }
?>
      <div class="input-comment clearfix">
        <form id='add-comment' method="POST" action="php/addComment.php">
          Enter your comment here:<br>
          <input type="hidden" name="postId" value="<?php echo $query;?>">
          <input type="hidden" name="userComment" value="<?php echo $_SESSION['user'];?>">
          <textarea id='comment' name='content' type="text" placeholder="Start typing.."></textarea>
          <input class='post-comment' type="submit">
          <p id='validation'></p>
        </form>
      </div>

    </div>

<?php
}
?>
