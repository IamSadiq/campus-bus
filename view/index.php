<?php 
require_once("../controller/functions.php");
require_once("../controller/login_control.php");

//----------LOGIN VALIDATION---------
if(isset($_POST["login"]))
{		
	//form was submitted
	$username = $_POST["username"];
	$password = $_POST["password"];

	if(preg_match("/@/", $username))
	{
		if($username == "siddique@cb.edu" && $password == "123456")
		{
			//succesful log in
			redirect_to("campus_news.php");
		}
		else
		{
			$message = "Incorrect username or password combination";
		}
	}
	else
	{
		$message = "Invalid email!";
	}

}
else
{

	$username = "";
	$message = "Please Login!";
}

//----------SIGN UP VALIDATION-----------
/*$errors = array();
if(isset($_POST["signup"]))
{
	// store firstnames & lastnames in database
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];

	// checking email validity, store in database if valid
	$email = $_POST["email"];
	if(!preg_match("/@/", $email)){
		$errors['Email'] = $email . " is invalid!";
	}

	//store phone number in database
	$phone_number = $_POST["phonenumber"];

	//----checking to make sure passwords match, store in database if match is found----
	$password = $_POST["password"];
	$password_again = $_POST["passwordagain"];
	 
	//short passwords
	 $min=4;
	if(strlen($password) < $min)
	{
		$errors['Password'] .= "Password too short";
	}

	// long passwords
	$max=12;
	if(strlen($password) > $max)
	{
		$errors['Password'] .= "Password too long";
	}
 
	// password and password_again must be equal (password again is to ensure that previous password was delibrate)
	if($password_again !== $password)
	{
		$errors['PasswordAgain'] .= "Second password doesn't match previous one";
	}

	//store campus in database
	$campus = $_POST["campus"];

	// show all form errors
	echo form_errors($errors);
	
}
else
{
	$firstname = "";
	$lastname = "";
	$email = "";
	$phonenumber = "";
	$password = "";
	$password_again = "";
	$campus = "";
}*/
?>

<?php require_once("header.php") ?>

<div class="loginDiv"> 
	<div class = "Login-Register-Header">
		<h3 style = "text-align: center"><?php echo $message; ?></h3>
		<div class ="closeLogin"><span>x</span></div>
	</div>
	<div class = "Login-Register-Body"><form name ="login" action="index.php" method = "post">
		<span style = "color:red" id="login_error"></span><br />
		<input type="text" class = "input" name="username" placeholder = "Email" value= "<?php echo htmlspecialchars($username); ?>" required="required"/><br />
		<input type="password" class = "input" name="password" placeholder = "Password" value = "" required="required"/><br />
		<input type="submit" class = "input submitBtn" name="login" value="Login" onClick = "validateLogin()"/>
	</div></form>
	<div class = "Login-Register-Header"><h3>Not a member? <a href = "#" id = "register"> Register Now </a> </h3></div>
</div>



<div class="registerDiv"> 
	<div class = "Login-Register-Header">
		<h2 style = "text-align: center; ">Registration Portal</h2>
		<div class="closeRegister"><span>x</span></div>
	</div>
	<div class = "Login-Register-Body"><form name = "signUp" action= "index.php"  method = "post">
		<table>
		<tr><input type="text" class = "input" name = "firstname" placeholder = "First Name" value = "" required="required"/></tr><br /><span style = "color:red" id = "fname_error"></span><br />

		<tr><input type="text" class = "input" name = "lastname" placeholder = "Last Name" value = "" required="required"/></tr><br /><span style = "color:red"  id="lname_error"></span><br />

		<tr><input type="text" class = "input" name = "email" placeholder = "Email" value = "" required="required" maxlength="97"/></tr><br/>
        <span style = "color:red" id="email_error"></span><br />

		<tr><input type="" class = "input" name = "phonenumber" placeholder = "Phone Number" value= "" maxlength="12"/></tr><br/>

		<tr><input type="password" class = "input" name = "password" placeholder = "Choose Password" value = "" required="required" maxlength="18"/></tr><br/>
		<span style = "color:red" id="pswordError"></span><br />

		<tr><input type="password" class = "input" name = "passwordagain" placeholder = "Confirm Password" value = "" required="required" maxlength="18"/></tr><br/>
		<span style = "color:red" id="cpswordError"></span><br />

		<tr><select name="campus" class="select-Box">
                <option name ="campus" value="Choose_Campus">Choose Campus</option>
                <option name ="campus" value="GTUC">GTUC</option>
                <option name ="campus" value="ASHESI">ASHESI</option>
                <option name ="campus" value="LEGON">LEGON</option>
                <option name ="campus" value="KNUST">KNUST</option>
                <option name ="campus" value="Other">Other</option>
            </select><br />
        <span style = "color:red" id="campusError"></span><br />
        <!-- End campus-sect --></tr>

		<tr><select name="gender" class="select-Box">
                <option name ="gender" value="Select_Gender">Select Gender</option>
                <option name ="gender" value="Female">Female</option>
                <option name ="gender" value="Male">Male</option>
                <option name ="gender" value="Other">Other</option>
            </select><br />
        <span style = "color:red" id="genderError"></span><br />
        <!-- End gender-sect --></tr>

		<tr><input type= "submit" class = "input submitBtn" name= "signup" value= "Sign Up" onClick = "validateSignUp()"/></tr>
		</table>
	</div></form>
</div>

<?php require_once("footer.php"); ?>