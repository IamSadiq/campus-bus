<?php 
include_once '../model/class.DB_class.php';
require_once '../view/sample.php';

$obj = new DB_class(); 
//var_dump($obj);

$news = $obj->select_all_Query($page*2);


?>