<?php
session_start();
		if ($_SERVER['REQUEST_METHOD'] === 'GET')  {
		$connection = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
		$connection->exec("set names utf8");
		$designs = $connection->prepare("SELECT u.username as username, d.id AS id, d.id_user AS id_user, d.title AS title, d.category AS category, d.image AS image FROM `design` AS d, `users` AS u WHERE d.id_user = u.id;");
		$designs->execute();

		if (!$designs) {
				$greska = $connection->errorInfo();
				print "SQL greška: " . $greska[2];
				exit();
		}
		
		 while($designpost = $designs->fetch(PDO::FETCH_ASSOC)) {
		 		$temp = (string)$designpost['id'];
?>

    <div class='design-post-box'>
        <div class='design-img-thumb small-design' onclick="toggleModal('show', '<?php echo $designpost['image'];?>')">
            <div class='hover-overlay'>
              <h1>Click to see bigger image!</h1>
            </div>

            <img  id='design-img' src='<?php echo $designpost['image'] ;?>'>
        </div>

        <div class='design-info'>
            <h4 href='#'><?php echo $designpost['title'];?></h4>
            <p class='design-category'>
                <span>Category:</span> <?php echo $designpost['category'] ;?>
            </p>
            <p class='design-autor'>
                by <a href='#'><?php echo $designpost['username'];?></a>
            </p>

            <a class='see-more' onclick="return loadDesignPost( '<?php echo $temp;?>', 'true');">See full post</a>
						<?php
							if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
							 echo '';
							}
							else if(($_SESSION['username'])=="admin123" && ($_SESSION['password'])=="admin123"){
						?>
								<a class="delete-design"  onclick="return deleteDesign( <?php echo $designpost['id'];?>, true);">Delete design</a>
						<?php
								}
						?>


        </div>
    </div>
<?php
	}
}

?>
