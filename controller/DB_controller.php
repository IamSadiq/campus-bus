<?php 
include '../model/class_Database.php';


$db_object = new myDataBase;

//Display News According to type / uses type filtering
function display_news($type){

	// The global keyword tells the compiler to use the alredy declared object & conn in the fxn
	global $db_object, $db_connection; 
	//echo is_object($db_object);
	//var_dump($db_object);

	$lim = $db_object->get_limit();
	$offset = $db_object->get_page() * $lim;

	$db_query = $db_connection->query($db_object->select_all_Query($type, $lim, $offset));

	while($row = $db_query->fetch(PDO::FETCH_ASSOC)){
	?>	

	<div class = "DBview">
	<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
	<img src="<?php echo '../view/uploads/'. $row["id"] .'.jpg'; ?>"/>
	<div><?php echo $row["details"]; ?></div>
	</div>
	<hr>
<?php 

	}

 }

// displays Top News
function top_news(){

	// The global keyword tells the compiler to use the alredy declared object & conn in the fxn
	global $db_object, $db_connection;

	$lim = $db_object->get_limit();
	$offset = $db_object->get_page() * $lim; 

	$db_query = $db_connection->query($db_object->mySelectQuery($lim, $offset));

	while($row = $db_query->fetch(PDO::FETCH_ASSOC)){
	?>	

	<div class = "DBview">
	<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
	<img src="<?php echo '../view/uploads/'. $row["id"] .'.jpg'; ?>"/>
	<div><?php echo $row["details"]; ?></div>
	</div>
	<hr>
<?php 

	}

 }


function insertion($title, $details, $type)
{
global $db_object, $db_connection;
$db_query = $db_connection->query($db_object->my_insert_query(htmlspecialchars($title), htmlspecialchars($details),$type));
}

?>