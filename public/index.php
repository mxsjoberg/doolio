<?php

//-----------------------------------------------------
// Include template based on url keyword
//-----------------------------------------------------

// set url keyword as key (defined in .htaccess)
// eg. index.php?key=mqe
$url_keyword = strtolower($_GET['key']);

/*
* Require inactive session (logged out)
*/
if($url_keyword == 'home' || $url_keyword == 'home.php')
{	
	// include template for home
    include ('home.php');
}
elseif($url_keyword == 'register' || $url_keyword == 'register.php')
{	
	// include template for register
    include ('register.php');
}

/*
* Require active session (logged in)
*/
elseif($url_keyword == 'logout' || $url_keyword == 'logout.php')
{	
	// include template for logout
    include ('logout.php');
}
elseif($url_keyword == 'myprofile' || $url_keyword == 'myprofile.php')
{	
	// include template for user profile
	include ('myprofile.php');
}
elseif($url_keyword == 'settings' || $url_keyword == 'settings.php')
{	
	// include template for user settings
	include ('settings.php');
}

/*
* Require inactive- or active session
*/
elseif($url_keyword == 'explore' || $url_keyword == 'explore.php')
{	
	// include template for explore
    include ('explore.php');
}
elseif($url_keyword == 'resetpassword' || $url_keyword == 'resetpassword.php')
{	
	// include template for reset password
    include ('resetpassword.php');
}
elseif($url_keyword == 'contact' || $url_keyword == 'contact.php')
{	
	// include template for reset password
    include ('contact.php');
}
else 
{	
	// include template for profile
    include ('profile.php');
}

?>