<?php 
function redirect_to($location){
	header("Location: " . $location);
	exit;
}

/*
function mySelectQuery($column, $table, $id, $val)
{
	$myquery = "SELECT {$column} ";
	$myquery .= "FROM {$table} ";
	$myquery .= "WHERE {$id} = {$val} ";
	return $myquery;
}*/

function form_errors($errors=array()){
	$output = "";
	if(!empty($errors)){
		$output .= "<div class=\"error\">";
		$output .= "Please fix the following errors:";
		$output .= "<ul>";
		foreach ($errors as $key => $error) {
			$output .= "<li>{$error}</li>";
		}
		$output .= "</ul>";
		$output .= "</div>";
	}
	return $output;
}
?>