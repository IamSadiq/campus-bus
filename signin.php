<?php
require_once('functions.php');

$email = $_POST['email'];
$password = $_POST['password'];

//connect to db
connect_2_db();

$statement = $conn_instance->prepare('SELECT * FROM users WHERE email = :mail');
$statement->bindParam(':mail', $email);
$statement->execute();


if (!$show = $statement->fetch(PDO::FETCH_ASSOC)) {
	echo "Failed to Login";
}
else
{
	if (password_check($password, $show['password_hash']))
	{
		$_SESSION['email'] = $show['email'];
	}
	else
	{
		echo "Failed to Login";
	}
}

?>