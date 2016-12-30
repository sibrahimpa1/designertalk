<?php
session_start();
	$xml=simplexml_load_file("../xml/design.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $design) {

	$tmp= $design->pic;
?>

    <div class='design-post-box'>
        <div class='design-img-thumb small-design' onclick="toggleModal('show', '<?php echo $tmp?>')">
            <div class='hover-overlay'>
              <h1>Click to see bigger image!</h1>
            </div>

            <img  id='design-img' src='<?php echo $design->pic ;?>'>
        </div>

        <div class='design-info'>
            <h4 href='#'><?php echo $design->name ;?></h4>
            <p class='design-category'>
                <span>Category:</span> <?php echo $design->category ;?>
            </p>
            <p class='design-autor'>
                by <a href='#'><?php echo $design->author ;?></a>
            </p>

            <a class='see-more' onclick='loadDesignPost()'>See full post</a>
						<?php
							if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
							 echo '';
							}
							else if(($_SESSION['username'])=="admin123" && ($_SESSION['password'])=="admin123"){
						?>
								<a class="delete-design"  onclick="return deleteDesign( <?php echo (string)$design->id;?>, true);">Delete design</a>
						<?php
								}
						?>


        </div>
    </div>
<?php
	}
?>
