<?php
	session_start();
  if ($_SERVER['REQUEST_METHOD'] === 'GET')  {

	$query = $_GET['q'];
  $connection = new PDO("mysql:dbname=wt;host=mysql-57-centos7", "admin", "admin");
  $connection->exec("set names utf8");
  $design = $connection->prepare("SELECT f.id, u.id, f.content as content, u.username as username, f.id, f.id_design, f.id_user, content FROM `design-comment` AS f, `users` AS u  WHERE f.id_design=:query AND f.id_user=u.id ORDER BY f.id;");
  $design->bindValue(":query", $query, PDO::PARAM_INT);
  $design->execute();

	if (!$design) {
      $greska = $connection->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 }
?>
    <div class="comments clearfix">
      <h4>Comments</h4>
<?php
  while($designComment = $design->fetch(PDO::FETCH_ASSOC)) {
?>
      <div class="one-comment">
        <h3><?php echo $designComment['username'] ;?></h3>
        <p>
          <?php echo $designComment['content'] ;?>
        </p>
      </div>
<?php
  }
      if(isset($_SESSION['user'])){
?>
      <div class="input-comment clearfix">
        <form id='add-comment' method="POST" action="php/addDesignComment.php">
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

else{ ?>
<div class='please-login'>
  Please login to leave a comment
</div>

</div>
<?php  }
}
?>
