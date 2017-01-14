<?php
	session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET')  {
	$query = $_GET['q'];
  $connection = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
  $connection->exec("set names utf8");
  $design = $connection->prepare("SELECT id, id_user, title, category, image, comments FROM `design` WHERE id=:query;");
  $design->bindValue(":query", $query, PDO::PARAM_INT);
  $names = $connection->prepare("SELECT id, username FROM `users`;");

  $design->execute();
  $names->execute();


	if (!$design) {
      $greska = $connection->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
 }

while($designpost = $design->fetch(PDO::FETCH_ASSOC)) {
  while( $name = $names->fetch(PDO::FETCH_ASSOC)){
    if((string)$designpost['id_user']==(string)$name['id'])
      $tempName= (string)$name['username'];
		}
?>

<div id='post-page' class="design-post-page clearfix grid-5">

  <a class="go-back" onclick='loadDesigns()'>Go back to designs</a>

  <div id='content-box' class="content-box clearfix">
    <div id='single-post' class="design-post-box big-design-box clearfix">
      <div class="design-img-thumb big-thumb">
        <img src='<?php echo $designpost['image'] ;?>'>
      </div>

      <div class="design-info">

        <h4 href="#"><?php echo $designpost['title'];?></h4>

        <p class="design-category">
          <span>Category:</span><?php echo $designpost['category'] ;?>
        </p>
        <p class="design-autor">
          by <a href="#"><?php echo $tempName;?></a>
        </p>

      </div>
    </div>
  </div>

</div>

<?php
  }
}
?>
