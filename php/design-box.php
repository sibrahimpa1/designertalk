<?php
	$xml=simplexml_load_file("../xml/design.xml") or die("Error: Cannot create object");

	foreach($xml->children() as $design) {
    echo "

    <div class='design-post-box'>
        <div class='design-img-thumb small-design' onclick='toggleModal('show')'>
            <div class='hover-overlay'>
              <h1>Click to see bigger image!</h1>
            </div>

            <img  id='design-img' src='$design->image'>
        </div>

        <div class='design-info'>
            <h4 href='#'>$design->name</h4>
            <p class='design-category'>
                <span>Category:</span> $design->category
            </p>
            <p class='design-autor'>
                by <a href='#'>$design->author</a>
            </p>

						<a class='delete-design'  onclick='deleteDesign($design->id, true)'>Delete design</a>
            <a class='see-more' onclick='loadDesignPost()'>See full post</a>
        </div>
    </div>

  ";
    }
?>
