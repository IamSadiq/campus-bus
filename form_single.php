<?php

	require_once("include_functions.php");

	
	if(isset($_POST["submit"])){
		//form was submitted
		$username = $_POST["username"];
		$password = $_POST["password"];

		if($username == "Siddique" && $password == "12345"){
			//succesful log in
			redirect_to("Basic.php");
		}
		else
		{
			$message = "There were some errors!";
		}

	}
	else{

		$username = "";
		$message = "Please Log in.";
	}
?>
<!DOCTYPE html>

<html>
<head>
	<title>Form Single</title>
</head>
<body>
	<?php echo $message; ?>
	<form action="form_single.php" method = "post">
		Username: <input type="text" name="username" value="" <?php echo htmlspecialchars($username); ?> /><br />
		Password: <input type="password" name="password" value="" /><br />
		<input type="submit" name="submit" value="Submit" />

	</form>
</body>
</html>