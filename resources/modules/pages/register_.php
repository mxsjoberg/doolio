<?php // register_.php

//-----------------------------------------------------
// Register new user
//-----------------------------------------------------

// start session
session_start();

// regex for validation
$regex_username = "/^[a-zA-Z0-9]{3,16}$/";
$regex_text = "/\b([a-zA-Z0-9]+){3,}\b/";
$regex_email = "/\b[a-zA-Z0-9._%+-]+(@)[a-zA-Z0-9.-]+[a-zA-Z]{2,4}\b/";

if (isset($_POST['submit']) && empty($error)) {	
	// check if username, email, or password is empty
	if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
		$error = "Invalid account details, please try again. <strong><a href='mailto:support@doolio.co'>Neep help?</a></strong>";
	} elseif (preg_match($regex_username, $_POST['username']) && preg_match($regex_email, $_POST['email']) && preg_match($regex_text, $_POST['country'])) {
		// define username, email, and password
		$username = strtolower($_POST['username']);
		$email = strtolower($_POST['email']);
		$country = ucwords($_POST['country']);
		$password = $_POST['password'];

		// to protect MySQL injection for security purpose
		// $username = stripslashes($username);
		$email = stripslashes($email);
		$country = stripslashes($country);
		$password = stripslashes($password);

		// $username = mysql_real_escape_string($username);
		$email = mysql_real_escape_string($email);
		$country = mysql_real_escape_string($country);
		$password = mysql_real_escape_string($password);

		// encrypt password
		$password = md5($password);

		// SQL query to check username
		// $username_query = mysql_query("SELECT * FROM user_auth WHERE username='$username'", $link);
		// $username_check = mysql_num_rows($username_query);

		// SQL query to check email
		$email_query = mysql_query("SELECT * FROM user_details WHERE contact_email='$email'", $link);
		$email_check = mysql_num_rows($email_query);

		// check if username is available
		if (is_username_available($username, $link) === false) {
			$error = "<strong>Sorry!</strong> This username is not available.";
		} else {
			// check if email is available
			if ($email_check != 0) {
				$error = "<strong>Sorry!</strong> This email is already in use.";
			} else {
				// insert new user into user_auth
			    $insert_auth_query = " INSERT INTO user_auth".
			                    	 " (username, password) ".
			                    	 " VALUES ('$username', '$password') ";
			    $insert_auth = mysql_query($insert_auth_query, $link);

			    if(!$insert_auth ) {
			        $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
			    }

			    // get user id from user_auth
				$user = mysql_query("SELECT * FROM user_auth WHERE username='$username'", $link);
				$user_details = mysql_fetch_row($user);
				$user_id = $user_details[0];

			    // insert new user into user_details
			    $insert_user_query = " INSERT INTO user_details".
			                    " (user_id, country, contact_email) ".
			                    " VALUES ('$user_id', '$country', '$email') ";
			    $insert_user = mysql_query($insert_user_query, $link);

			    if(! $insert_user ) {
			        $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
			    }

				// initializing session
				$_SESSION['login_user'] = $username;

				// redirecting to other page
				header ("location: myprofile.php");
			}
		}
		
		// closing Connection
		mysql_close($link);
	} else {
		$error = "Invalid account details, please try again. <strong><a href='mailto:support@doolio.co'>Neep help?</a></strong>";
	}
}

?>