<?php

// require ('../connect.php');

// starting session
session_start();

if (isset($_POST['submit']))
{
	if (empty($_POST['username']) || empty($_POST['password']))
	{
		$error = "Invalid username or password, please try again. <strong><a href='resetpassword'>Forgot password?</a></strong>";
	}
	else
	{
		// define username and password
		$username = $_POST['username'];
		$password = $_POST['password'];

		// to protect MySQL injection for security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);

		// encrypt password
		$password = md5($password);

		// SQL query to fetch information of registerd users and finds user match
		$query = mysql_query("SELECT * FROM user_auth WHERE password='$password' AND username='$username'", $link);
		$rows = mysql_num_rows($query);

		if ($rows == 1)
		{
			// SQL query to update active date
		    $query_update = "UPDATE user_auth SET active=now() WHERE username='$username'";
		    $update = mysql_query($query_update, $link);

		    if(!$update) 
		    {
			    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
		    }
		    else
		    {	
		    	// initializing session
				$_SESSION['login_user'] = $username;
				
		    	// redirecting to other page
				header("location: myprofile");
		    }
		}
		else
		{
			$error = "Invalid username or password, please try again. <strong><a href='resetpassword'>Forgot password?</a></strong>";
		}
		
		// closing Connection
		mysql_close($link);
	}
}

?>