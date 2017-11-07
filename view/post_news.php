<?php
require '../controller/DB_controller.php';  
require_once 'header.php';


?>


<div id="post_news_header"><h2>POST A NEWS</h2></div>

<form enctype="multipart/form-data" action ="post_news.php" method="post">
	<div id="post_news_div">
		<h3>Start posting your News, click the review button below afterwards to review your Post.</h3>
		<div>
			<input style ="width: 500px;" placeholder="ENTER YOUR TITLE HERE.." name = "title" required="required">
		</div>
		<div style = "margin-top: 40px;">
			<textarea placeholder = "DETAILS GO IN HERE..." class="news_details" name = "details" required="required"></textarea>
		</div>
		<div class = "TON_IMG" style = "margin-top: 40px;">
			Type Of News: <select name="TON" required="required">
				<option name="TON" value= "Type Of News">Type Of News</option>
				<option name="TON" value= "edu">Educatonal</option>
				<option name="TON" value= "enter">Entertainment</option>
			</select>
		</div>
		<div class = "TON_IMG" style = "margin-top: 40px;">
			News Image: <input type = "file" value ="" name = "news_image">
		</div>	
		<div style = "margin-top: 40px;">
			<input  type = "submit" name = "submit_btn" value = "POST NEWS" 
			style ="height: 40px; cursor: pointer; font-weight: bold;">
		</div>		
	</div>	
</form>

<?php 

//---------------------title, details and type posting handlings---------------------------

if(isset($_POST['submit_btn']))
{
	$title = $_POST['title'];
	$details = $_POST['details'];
	$type = $_POST['TON'];
	if ($type == "Educatonal") {
		$type = "edu";
	}
	elseif ($type == "Entertainment") 
	{
		$type = "enter";
	}

	//echo $title;
	//echo $details;
	//echo $type;

	insertion($title, $details, $type);	

	//--------------------------Image File Upload handlings-------------------------------------

	// Access the $_FILES global variable for this specific file being uploaded
	// and create local PHP variables from the $_FILES array of information

	$fileName = $_FILES["news_image"]["name"]; // The file name
	$fileTmpLoc = $_FILES["news_image"]["tmp_name"]; // File in the PHP tmp folder
	$fileType = $_FILES["news_image"]["type"]; // The type of file it is
	$fileSize = $_FILES["news_image"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["news_image"]["error"]; // 0 = false | 1 = true
	$kaboom = explode(".", $fileName); // Split file name into an array using the dot
	$fileExt = end($kaboom); // Now target the last array element to get the file extension

	// START PHP Image Upload Error Handling --------------------------------------------------
	if (!$fileTmpLoc) { // if file not chosen
	    echo "Please browse for a file before clicking the upload button.";
	    exit();
	} else if($fileSize > 1024000) { // if file size is larger than 1MB
	    echo "ERROR: Your file was larger than 1 Megabyte in size.";
	    //unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
	    exit();
	} else if (!preg_match("/.(gif|jpg|png)$/", $fileName) ) {
	     // This condition is only if you wish to allow uploading of specific file types    
	     echo "ERROR: Your image was not .gif, .jpg, or .png.";
	    // unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
	     exit();
	} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
	    echo "ERROR: An error occured while processing the file. Try again.";
	    exit();
	}
	// END PHP Image Upload Error Handling ----------------------------------------------------
	// Place it into your "uploads" folder mow using the move_uploaded_file() function
	$moveResult = move_uploaded_file($fileTmpLoc, "uploads/$fileName");
	// Check to make sure the move result is true before continuing
	if ($moveResult != true) {
	    echo "ERROR: File not uploaded. Try again.";
	   // unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
	    exit();
	}
	else
	{
		echo "Succesfully posted News on " . date("Y-m-d h:i:sa");
		// Display things to the page so you can see what is happening for testing purposes
		echo "<br />T<br />The file named <strong>$fileName</strong> uploaded successfuly.<br /><br />";
		echo "It is <strong>$fileSize</strong> bytes in size.<br /><br />";
		echo "It is an <strong>$fileType</strong> type of file.<br /><br />";
		echo "The file extension is <strong>$fileExt</strong><br /><br />";
		echo "The Error Message output for this upload is: $fileErrorMsg";
		//unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
	}

}

include_once 'footer.php';

?>