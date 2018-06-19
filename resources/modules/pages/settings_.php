<?php

// regex for validation
$regex_username = "/^[a-zA-Z0-9]{3,16}$/";
$regex_text = "/\b([a-zA-Z0-9]+){3,}\b/";
$regex_name = "/\b([a-zA-Z]+){1,}\b/";
$regex_email = "/\b[a-zA-Z0-9._%+-]+(@)[a-zA-Z0-9.-]+[a-zA-Z]{2,4}\b/";

//-----------------------------------------------------
// Change username
//-----------------------------------------------------
if (!empty($_POST["username"]) && empty($error)) {

	$new_username = strtolower($_POST['username']);
	
	// validate username
	if (preg_match($regex_username, $new_username))
	{
		// $new_username = stripslashes($new_username);
		// $new_username = mysql_real_escape_string($new_username);

		// SQL query to check username
		// $new_username_query = mysql_query("SELECT * FROM user_auth WHERE username='$new_username'", $link);
		// $new_username_check = mysql_num_rows($new_username_query);

		// check if new username is available
		if (is_username_available($new_username, $link) === false)
		{
			$error = "<strong>Sorry!</strong> This username is not available.";
		}
		else
		{
			// update new username in user_auth
	        $query = "UPDATE user_auth SET username='$new_username' WHERE user_id='$user_id'";
	        $update = mysql_query($query, $link);

	        if(!$update) {
	            $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	        }
	        else
	        {	
	        	// update active session
	        	$_SESSION['login_user'] = $new_username;

				// success message
	        	$success = "<strong>Geronimo!</strong> Successfully updated settings.";
	        }
		}
	}
	else {
		$error = "<strong>Sorry!</strong> This username is not available.";
	}
}

//-----------------------------------------------------
// Change email
//-----------------------------------------------------
if (!empty($_POST["email"]) && empty($error)) {

	$new_email = strtolower($_POST['email']);
	
	if (preg_match($regex_email, $new_email))
	{
		$new_email = stripslashes($new_email);
		$new_email = mysql_real_escape_string($new_email);

		// SQL query to check email
		$new_email_query = mysql_query("SELECT * FROM user_details WHERE contact_email='$new_email'", $link);
		$new_email_check = mysql_num_rows($new_email_query);

		// check if new email is available
		if ( $new_email_check != 0 )
		{
			$error = "<strong>Sorry!</strong> This email is already in use.";
		}
		else
		{
			// update new email in user_auth
	        $query = "UPDATE user_details SET contact_email='$new_email' WHERE user_id='$user_id'";
	        $update = mysql_query($query, $link);

	        if(!$update) {
	            $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	        }
	        else
	        {	
				// success message
	        	$success = "<strong>Geronimo!</strong> Successfully updated settings.";
	        }
		}
	}
	else {
		$error = "<strong>Sorry!</strong> This email is not valid.";
	}
}

//-----------------------------------------------------
// Change country
//-----------------------------------------------------
if (!empty($_POST["country"]) && empty($error)) {

	$new_country = ucwords($_POST['country']);
	
	if (preg_match($regex_text, $new_country))
	{
		$new_country = stripslashes($new_country);
		$new_country = mysql_real_escape_string($new_country);

		// update new username in user_auth
	    $query = "UPDATE user_details SET country='$new_country' WHERE user_id='$user_id'";
	    $update = mysql_query($query, $link);

	    if(!$update) {
	        $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	    }
	    else
	    {	
			// success message
	    	$success = "<strong>Geronimo!</strong> Successfully updated settings.";
	    }
	}
	else {
		$error = "<strong>Sorry!</strong> This country is not valid.";
	}
}

//-----------------------------------------------------
// Change first name
//-----------------------------------------------------
if (!empty($_POST["firstName"]) && empty($error)) {

	$new_first_name = ucwords($_POST["firstName"]);
	
	if (preg_match($regex_name, $new_first_name))
	{
		$new_first_name = stripslashes($new_first_name);
		$new_first_name = mysql_real_escape_string($new_first_name);

		// update new first name in user_auth
	    $query = "UPDATE user_details SET first_name='$new_first_name' WHERE user_id='$user_id'";
	    $update = mysql_query($query, $link);

	    if(!$update) {
	        $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	    }
	    else
	    {	
			// success message
	    	$success = "<strong>Geronimo!</strong> Successfully updated settings.";
	    }
	}
	else {
		$error = "<strong>Sorry!</strong> This first name is not valid.";
	}
}

//-----------------------------------------------------
// Change second name
//-----------------------------------------------------
if (!empty($_POST["secondName"]) && empty($error)) {

	$new_second_name = ucwords($_POST["secondName"]);
	
	if (preg_match($regex_name, $new_second_name))
	{
		$new_second_name = stripslashes($new_second_name);
		$new_second_name = mysql_real_escape_string($new_second_name);

		// update new second name in user_auth
	    $query = "UPDATE user_details SET last_name='$new_second_name' WHERE user_id='$user_id'";
	    $update = mysql_query($query, $link);

	    if(!$update) {
	        $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	    }
	    else
	    {	
			// success message
	    	$success = "<strong>Geronimo!</strong> Successfully updated settings.";
	    }
	}
	else {
		$error = "<strong>Sorry!</strong> This second name is not valid.";
	}
}

//-----------------------------------------------------
// Change password
//-----------------------------------------------------
if (!empty($_POST["newPasswordFirst"]) || !empty($_POST["newPasswordSecond"]) || !empty($_POST["oldPassword"]) && empty($error))
{
	if ($_POST["newPasswordFirst"] === $_POST["newPasswordSecond"])
	{
		// define new and current password
		$new_password = $_POST["newPasswordFirst"];
		$password = $_POST['password'];

		// to protect MySQL injection for security purpose
		$password = stripslashes($password);
		$new_password = stripslashes($new_password);
		
		$password = mysql_real_escape_string($password);
		$new_password = mysql_real_escape_string($new_password);

		// encrypt password
		$password = md5($password);
		$new_password = md5($new_password);
		
		// SQL query to check password
		$query = mysql_query("SELECT * FROM user_auth WHERE password='$password' AND user_id='$user_id'", $link);
		$rows = mysql_num_rows($query);

		if ($rows == 1)
		{
			// update new password in user_auth for user id
		    $query = "UPDATE user_auth SET password='$new_password' WHERE user_id='$user_id'";
		    $update = mysql_query($query, $link);

		    if(!$update) {
		        $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
		    }
		    else
		    {	
				// success message
		    	$success = "<strong>Geronimo!</strong> Successfully updated settings.";
		    }
		}
		else
		{
			$error = "Invalid password, please try again. <strong><a href='resetpassword.php'>Forgot password?</a></strong>";
		}
	}
	else {
		$error = "Password did not match, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	}
}

if (!empty($_POST["submitEditAccount"]) || !empty($_POST["submitNewPassword"]) && empty($error))
{	
	// refresh page if updated
	if ($success != Null) { header("Refresh: 2; url=settings"); }
}

?>
