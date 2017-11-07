<?php
require_once('functions.php');

$fname = $_POST['fullname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$user_type = "";

if (isset($_POST["farmer"])) {
	$user_type = "Farmer";
}

if (isset($_POST["tractor_owner"])) {
	if (!empty($user_type))
		$user_type .= "-" . "TractorOwner";
	else
		$user_type = "TractorOwner";
}

if (isset($_POST["input_dealer"])) {
	if (!empty($user_type))
		$user_type .= "-" . "InputDealer";
	else
		$user_type = "InputDealer";
}

$email_is_valid;
$password_is_valid;

/********************EMAIL VALIDATION*******************/
function validate_email($email){
    global $email_is_valid;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	$email_is_valid=0;
    }
    else
    {
     	$email_is_valid = 1;
    }
}

/********************PASSWORD VALIDATION*******************/
	function validate_password(){

		global $password_is_valid, $password, $cpassword;

		if ($cpassword != $password) {
			echo " passwords don't match ";
			$password_is_valid = 0;
		}
	
		if($cpassword == $password){
			$password_is_valid = 1;
		}
	}

//function calls
validate_email($email);
validate_password();

if ($email_is_valid && $password_is_valid) {

	//connect to db
	connect_2_db();

	$statement = $conn_instance->prepare('SELECT * FROM users WHERE email = :mail');
	$statement->bindParam(':mail', $email);
	$statement->execute();

	if ($show = $statement->fetch(PDO::FETCH_ASSOC)) {
		echo $show['email'] . " is already registered ";
	}
	else
	{

		$hash_pword = password_encrypt($password);

		$statement = $conn_instance->prepare("INSERT INTO users(fullname, email, mobile, password_hash, user_type) 
			VALUES(:fname, :mail, :tel, :hash,:type)");

		$statement->bindParam(':fname', $fname);
		$statement->bindParam(':mail', $email);
		$statement->bindParam(':tel', $mobile);
		$statement->bindParam(':hash', $hash_pword);
		$statement->bindParam(':type', $user_type);

		if ($statement->execute()) {
			echo $email . " Successfully registered";
			mail($email, "Welcome " . $fname . "! Proceed to activate your account", 
				"follow this link to activate your account: 127.0.0.1/ttl/");
		}
		else
		{
			echo "Failed to Register";
		}
	}
}
else
	echo $email . " is not a valid email ";

?>