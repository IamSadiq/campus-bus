<?php

require_once '../controller/controller.php';  
require_once 'header.php'; 

foreach ($news as $row) 
{ ?>
	<div class = "DBview">
	<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
	<img src="<?php echo '../view/uploads/'. $row["id"] .'.jpg'; ?>"/>
	<div class = "news_details"><?php echo $row["details"]; ?></div>
	</div>

<?php
}

$page = 1;
?>
