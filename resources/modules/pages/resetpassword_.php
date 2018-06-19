<?php

$regex_email = "/\b[a-zA-Z0-9._%+-]+(@)[a-zA-Z0-9.-]+[a-zA-Z]{2,4}\b/";

if (isset($_POST['submit']) && empty($error)) {

	// check if email is empty
	if (empty($_POST['email']))
	{
		$error = "Invalid email, please try again. <strong><a href='mailto:support@doolio.co'>Neep help?</a></strong>";
	}
	// check if email is valid
	elseif (preg_match($regex_email, $_POST['email']))
	{
		// define email
		$email = $_POST['email'];

		// to protect MySQL injection for security purpose
		$email = stripslashes($email);
		$email = mysql_real_escape_string($email);

		// SQL query to check email
		$email_query = mysql_query("SELECT * FROM user_details WHERE contact_email='$email'", $link);
		$email_check = mysql_num_rows($email_query);

		// check if email exists
		if ($email_check != 0)
		{	
			// query database for user id
	    	$query = mysql_query("SELECT * FROM user_details WHERE contact_email='$email'", $link);
	    	$row = mysql_fetch_row($query);

	    	// define user id
	    	$user_id = $row[0];

			// generate new password
			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		    $new_password = array();
		    $len = strlen($characters) - 1;
		    for ($i = 0; $i < 8; $i++) {
		        $n = rand(0, $len);
		        $new_password[] = $characters[$n];
		    }

		    $new_password = implode($new_password);
			
			// encrypt password
			$password = md5($new_password);

			// update new password in user_auth
			$update_auth_query = "UPDATE user_auth SET password='$password' WHERE user_id='$user_id'";
			$update_auth = mysql_query($update_auth_query, $link);

			if(!$update_auth ) {
			    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
			}
			else {
				// send new password to existing email
				$to = "$email";
				$subject = "Your new password at doolio.co";
				$txt = "Password: $new_password";
				$headers = "From: annie@doolio.co [NO REPLY]";

				mail($to, $subject, $txt, $headers);

				// success message
	        	$success = "<strong>Geronimo!</strong> Successfully reset password.";
			}
		}
		else
		{
			$error = "Invalid email, please try again. <strong><a href='mailto:support@doolio.co'>Neep help?</a></strong>";
		}
		
		// closing Connection
		mysql_close($link);
	}
	else
	{
		$error = "Invalid email, please try again. <strong><a href='mailto:support@doolio.co'>Neep help?</a></strong>";
	}
}

?>