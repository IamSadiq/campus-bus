<style>

table,td 
{ 
	border: 1px solid blue;
	border-collapse: collapse; 
	padding: 10px
}

</style>

<?php

$mysqli = new mysqli('localhost','root','','campus_news');

$result = $mysqli->query("SELECT *  FROM edu_news ORDER BY upload_date;");
$result1 = $mysqli->query("SELECT *  FROM enter_news ORDER BY upload_date;");

?>

<h2 style" text-align: center;"><strong>EDUCATIONAL NEWS</strong></h2>
<table>
<tr>
	<th>id</th>
	<th>title</th>
	<th>details</th>
	<th>upload_date</th>
</tr>
<?php while($row = $result->fetch_object()) : ?>
<tr>
	<td><?php echo $row->id; ?></td>
	<td><?php echo $row->title; ?></td>
	<td><?php echo $row->details; ?></td>
	<td><?php echo $row->upload_date; ?></td>
</tr>
<?php endwhile; ?> 
</table>
<p>
<h2 style" text-align: center;"><strong>ENTERTAINMENT NEWS</strong></h2>
<table>
<tr>
	<th>id</th>
	<th>title</th>
	<th>details</th>
	<th>upload_date</th>
</tr>

<?php while($row = $result1->fetch_object()) : ?>
<tr>
	<td><?php echo $row->id; ?></td>
	<td><?php echo $row->title; ?></td>
	<td><?php echo $row->details; ?></td>
	<td><?php echo $row->upload_date; ?></td>
</tr>
<?php endwhile; ?> 
</table>
</p>
<?php 
	mysqli_close($mysqli);
?