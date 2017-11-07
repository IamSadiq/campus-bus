<?php 
$db_connection = new PDO('mysql:host=localhost;dbname=campus_news','root','');

/**
* DATABASE CLASS
*/

class myDataBase extends mysqli
{
	
	var $limit;
	var $page;

	//KONSTRUCTUR
	function myDataBase(){
		$this->set_limit(10);
		//$db_object = new myDataBase;
	}
	
	//SET FUNCTIONS
	function set_page($value)
	{
		$this->page = $value;
	}

	function set_limit($value)
	{
		$this->limit = $value;
	}

	// GET FUNCTIONS
	function get_page()
	{
		return $this->page;
	}

	function get_limit()
	{
		return $this->limit;
	}

	// DISPLAY NEWS/QUERY SELECTION FUNCTION
	public function select_all_Query($type, $limit, $offset)
	{
		$myquery = "SELECT * FROM news ";
		$myquery .= "WHERE type = '{$type}' ";
		$myquery .= "ORDER BY upload_date DESC ";
		$myquery .= "LIMIT {$limit} ";
		$myquery .= "OFFSET {$offset}; ";
		return $myquery;
	}


	public function mySelectQuery($limit,$offset)
	{
		$myquery = "SELECT * FROM news ";
		$myquery .= "ORDER BY upload_date DESC ";
		$myquery .= "LIMIT {$limit} ";
		$myquery .= "OFFSET {$offset}; ";
		return $myquery;
	}

	// UPLOAD NEWS FUNCTION/INSERTION PROCEDURE
	public function my_insert_query($title, $details, $type)
	{
		date_default_timezone_set('Africa/Accra');
		$date = date('Y-m-d');
		$query = "INSERT INTO news('title','details','type','upload_date') ";
		$query .= "VALUES('{$title}', '{$details}', '{$type}', '{$date}');";

		return $query;
	}

}

?>