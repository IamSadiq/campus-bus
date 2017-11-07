<?php 
include_once("../controller/functions.php");
$mysql = mysqli_connect("localhost", "root", "","campus_news"); 

?>

<!-- includes HTML DOC HEADER -->

<?php require_once("header.php"); ?>

<div id="navDiv">
	<div class="menu"  id="topDiv">   
	<h3>Top stories</h3>
	</div> 

	<div>
	<div class="menu" id="eduDiv"> 
	<h3>Education<h3>
	</div>

	<div class="menu"  id="enterDiv">   
	<h3>Entertainment</h3>
	</div>

	<div id="searchDiv">
	<input id="searchArea" placeholder = "Search Here" />
	</div>
	<div id="btnDiv"><button id="btn"></button></div>
</div>

<!-- _____________DIVs TABLE____________ -->
<table><tr><td>

<!-- ¬¬¬¬¬¬¬¬¬¬¬¬¬¬TOP DIV¬¬¬¬¬¬¬¬¬¬¬¬¬ -->
<div class="info top">
<?php
$query0 = mySelectQuery("*", "news", "id", "1");
$result = mysqli_query($mysql, $query0);

//var_dump($query0);
//var_dump($result);

$row = mysqli_fetch_assoc($result);
?>	
<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
<img src="images/chinesePres.jpg"/>
<?php echo $row["details"]; ?>

<?php 
// free $result
mysqli_free_result($result); ?>


<?php 
$query0 = mySelectQuery("*", "news", "id", "2");
$result = mysqli_query($mysql, $query0);

?>
<?php $row = mysqli_fetch_assoc($result); ?>	
<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
<img src="images/clayton.jpg"/>
<?php echo $row["details"]; ?>

<?php 
// free $result
mysqli_free_result($result); ?>
</div>

<!-- ¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬EDU DIV¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬ -->
<div class="info edu">
<?php
$query0 = mySelectQuery("*", "news", "id", "3");
$result = mysqli_query($mysql, $query0);

$row = mysqli_fetch_assoc($result);
?>	
<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
<img src="images/batt.jpg"/>
<?php echo $row["details"]; ?>

<?php 
// free $result
mysqli_free_result($result); ?>


<a href="#"><h2> ... </h2></a>
<img src="#"/>


</div>

<!-- ¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬ENTER DIV¬¬¬¬¬¬¬¬¬¬¬¬¬¬ -->
<div class="info enter">
<?php
$query0 = mySelectQuery("*", "news", "id", "4");
$result = mysqli_query($mysql, $query0);

$row = mysqli_fetch_assoc($result);
?>

<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
<img src="images/clayton.jpg"/>
<?php echo $row["details"]; ?> 

<?php 
// free $result
mysqli_free_result($result); ?>


<a href="#"><h2> ... </h2></a>
<img src="#"/>


</div></td>

<!-- ¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬TOP DIV¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬ -->
<td><div class="info top">
<?php 
$query0 = mySelectQuery("*", "news", "id", "3");
$result = mysqli_query($mysql, $query0);

?>
<?php $row = mysqli_fetch_assoc($result); ?>	
<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
<img src="images/batt.jpg"/>
<?php echo $row["details"]; ?>


<?php 
// free $result
mysqli_free_result($result); ?>

<?php 
$query0 = mySelectQuery("*", "news", "id", "4");
$result = mysqli_query($mysql, $query0);

?>
<?php $row = mysqli_fetch_assoc($result); ?>	
<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
<img src="images/djk.jpg"/>
<?php echo $row["details"]; ?>

<?php 
// free $result
mysqli_free_result($result); ?>
</div>

<!-- ¬¬¬¬¬¬¬¬¬¬¬¬¬EDU DIV¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬ -->
<div class="info edu">
<?php 
$query0 = mySelectQuery("*", "news", "id", "1");
$result = mysqli_query($mysql, $query0);

?>
<?php $row = mysqli_fetch_assoc($result); ?>	
<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
<img src="images/chinesePres.jpg"/>
<?php echo $row["details"]; ?>


<?php 
// free $result
mysqli_free_result($result); ?>

<p><a href="#"/><h1> ... </h1></a></p>
<img src="#"/>

</div>

<!-- ¬¬¬¬¬¬¬¬¬¬¬¬¬ENTER DIV¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬¬ -->
<div class="info enter">
<?php
$query0 = mySelectQuery("*", "news", "id", "2");
$result = mysqli_query($mysql, $query0);

$row = mysqli_fetch_assoc($result);
?>

<a href="#"><h2> <?php echo $row["title"] . "<br />";  ?> </h2></a>
<img src="images/djk.jpg"/>
<?php echo $row["details"]; ?>

<?php 
// free $result
mysqli_free_result($result); ?>

<a href="#"><h2> ... </h2></a>
<img src="#">

</div></td>
</tr></table>

<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<script src="js/CN.js"></script>
<?php 

//include footer
require_once("footer.php");

//close connection
mysqli_close($mysql); 
?>