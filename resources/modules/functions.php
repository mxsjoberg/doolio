<?php

include ('../resources/modules/functions/user.php');
include ('../resources/modules/functions/skills.php');
include ('../resources/modules/functions/theme.php');

//	----------------------------------------------------------------------------
//	Function for checking available username.
//
// 	Input 		: $username, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function is_username_available($username, $link) {

	// system names not available as usernames
	$system_names = array(
		"home",
		"login",
		"index",
		"register",
		"logout",
		"settings",
		"myprofile",
		"press",
		"about",
		"help",
		"doolio",
		"reset",
		"resetpassword",
		"explore"
	);

	// escape input
	$username = stripslashes($username);
	$username = mysql_real_escape_string($username);

	// make lowercase
	$username = strtolower($username);

	// check system names
	if (in_array($username, $system_names)) {
	    return false;
	}
	else {
		
		// SQL query to check username
		$query = mysql_query("SELECT * FROM user_auth WHERE username='$username'", $link);
		$check = mysql_num_rows($query);

		// check username
		if ($check != 0) {
			return false;
		}
		else {
			return true;
		}

	}
}

?>