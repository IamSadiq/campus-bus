$(document).ready(function(){

	$('.loginDiv').hide();
	$('.registerDiv').hide();


	$('#login').on('click', function(){
		//$('.loginDiv').slideDown(500);
		$('.loginDiv').fadeIn(1000);
		$('.registerDiv').hide();
	
		$('.closeLogin').on('click', function(){
			$('.loginDiv').fadeOut(300);
		});

	});

	$('#register').on('click', function(){
		$('.loginDiv').hide();
		$('.registerDiv').fadeIn(1000);
	
		$('.closeRegister').on('click', function(){
			$('.registerDiv').hide();
			$('.loginDiv').fadeIn(1000);
		});
	});

});

/********************************************************
*					LOGIN VALIDATION					*
*********************************************************/

function validateEmail() {
    var x = document.forms["login"]["username"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementById("login_error").innerHTML = "Not a valid Email";
        return false;
    }
    else{
    	document.getElementById("login_error").innerHTML = "";
    	return true;
    }
}

function validateLogin()
{
	var email = validateEmail();

	if(!email)
		document.signUp.submit();
	else
		return false;	
}




/********************************************************
*					SIGN-UP VALIDATION					*
*********************************************************/

//---------------------FIRSTNAME VALIDATION----------------
function checkfName(){
	var fname = document.signUp.firstname.value;
	if(fname==""){
		document.getElementById("fname_error").innerHTML = "Name requires atleast 1 letter";
		return false;
	}
	else{
		document.getElementById("fname_error").innerHTML = "";
		return true;
	}
}

//------------------LASTNAME VALIDATION--------------------
function checklName(){
	var lname = document.signUp.lastname.value;
	if(lname==""){
		document.getElementById("lname_error").innerHTML = "Name requires atleast 1 letter";
		return false;
	}
	else{
		document.getElementById("lname_error").innerHTML = "";
		return true;
	}
}

//----------------------EMAIL VALIDATION------------------------
function checkEmail()
{
	var email = document.signUp.email.value;
	//the input data must contain an @ sign and at least one dot (.). Also, 
	//the @ must not be the first character of the email address, and 
	//the last dot must be present after the @ sign, and minimum of 2 characters before the end

	var x = document.forms["signUp"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
 
	if(email==""){
		document.getElementById("email_error").innerHTML = "Must provide e-mail address";
		return false;
	}
	else if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementById("email_error").innerHTML = "Not a valid e-mail address";
        return false;
    }
	else{
		document.getElementById("email_error").innerHTML = "";
		return true;
	}
}

//---------------PASSWORD VALIDATION---------------
var minLen = 6, tempPsword;
function Psword(){
	psword = document.signUp.password.value;
	tempPsword = psword = document.signUp.password.value;
	if(psword == ""){
		document.getElementById("pswordError").innerHTML = "Password can't be left blank";
		return false;
	}
	else if(psword.length < minLen){
		document.getElementById("pswordError").innerHTML = "Passwords require 6-18 characters";
		return false;
	}
	else{
		document.getElementById("pswordError").innerHTML = "";
		return true;
	}
}

function cPsword(){
	var cpsword = document.signUp.passwordagain.value;
	if(cpsword == ""){
		document.getElementById("cpswordError").innerHTML = "Password can't be left blank";
		return false;
	}
	else if(cpsword !== tempPsword){
		document.getElementById("cpswordError").innerHTML = "Passwords don't match";
		return false;
	}
	else{
		document.getElementById("cpswordError").innerHTML = "";
		return true;
	}
}


// ------------------CAMPUS VALIDATION----------------
function campus_sect()
{
		var chosen = "";
		var len = document.signUp.campus.length;
		var i;
		for(i=0; i<len; i++)
		{
			if(document.signUp.campus[i].selected){
				chosen = document.signUp.campus[i].value;
			}
		}
		if(chosen == "Choose_Campus"){
			document.getElementById("campusError").innerHTML = "Must choose campus";
			return false;
		}
		else{
			document.getElementById("campusError").innerHTML = "";
			return true;
		}
}


//------------------GENDER VALIDATION----------------------
function gender_sect()
{
		var chosen = "";
		var len = document.signUp.gender.length;
		var i;
		for(i=0; i<len; i++)
		{
			if(document.signUp.gender[i].selected){
				chosen = document.signUp.gender[i].value;
			}
		}
		if(chosen == "Select_Gender"){
			document.getElementById("genderError").innerHTML = "Must select gender";
			return false;
		}
		else{
			document.getElementById("genderError").innerHTML = "";
			return true;
		}
}

//------------------------VALIDATION--------------------
function validateSignUp()
{
	var fname = checkfName() ,lname = checklName() 
	,check_email = checkEmail() , psword = Psword() ,cpsword = cPsword()
	,gender = gender_sect() ,campus = campus_sect();

	if(fname && lname && check_email && psword && cpsword && gender && campus)
		document.signUp.submit();
	else
		return false;	
}