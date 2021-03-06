<?php
	session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET')  {
	$query = $_GET['q'];
  $mysql_db_host=getenv('MYSQL_55_CENTOS7_SERVICE_HOST'); $connection = new PDO("mysql:dbname=wt;host=$mysql_db_host", "admin", "admin");
  $connection->exec("set names utf8");
  $design = $connection->prepare("SELECT id, id_user, title, category, image FROM `design` WHERE id=:query;");
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
?>

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

<?php
  }
}
?>
