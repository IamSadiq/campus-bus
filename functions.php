<?php

function connect_2_db(){
	//db connection
	global $conn_instance;
	try{
		$conn_instance = new PDO('mysql:host=localhost;dbname=ttl','root','');
	}
	catch(PDOException $e){
		//check for connection error
		echo "Could not connect to Database";
		echo "Error type: " . $e;
	}
}

function generate_salt($len){
	//Not 100% unique or random, but good enough for a salt
	//MD5 returns 32 chars
	$unique_random_str = md5(uniqid(mt_rand(), true));

	//valid chars for a salt are [a-zA-Z0-9./]
	$base64_str = base64_encode($unique_random_str);

	//but not + which is valid in base64 encoding
	$modified_base64_str = str_replace("+", ".", $base64_str);

	//Truncate str to the correct len
	$salt = substr($modified_base64_str, 0, $len);

	return $salt;
}

function password_check($password, $existing_hash){

	//existing hash contains format and salt at start
	$hash = crypt($password, $existing_hash);
	if ($hash === $existing_hash)
		return true;
	else
		return false;
}

function password_encrypt($password){

	//tell PHP to user Blowfish with a cost of 10
	$hash_format = "$2y$10$";

	//Blowfish should be 22 chars or more
	$salt_len = 22;

	$salt = generate_salt($salt_len);
	$format_and_salt = $hash_format . $salt;

	$hash = crypt($password, $format_and_salt);
	return $hash;
}

function token_gen($email){

	//tell PHP to user Blowfish with a cost of 10
	$hash_format = "$2y$10$";

	//Blowfish should be 22 chars or more
	$salt_len = 22;

	$salt = generate_salt($salt_len);
	$format_and_salt = $hash_format . $salt;

	$hash = crypt($email, $format_and_salt);
	return $hash;
}

?>