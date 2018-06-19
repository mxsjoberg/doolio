<?php // session user details

require ('connect.php');

// starting session
session_start();

// storing session
$user_check = $_SESSION['login_user'];

// SQL query to fetch complete information of user
$ses_sql = mysql_query("SELECT * FROM user_auth WHERE username='$user_check'", $link);
$row = mysql_fetch_assoc($ses_sql);

// check active session
$login_session = $row['username'];

if(!isset($login_session))
{
	// closing connection
	mysql_close($link);

	// redirect to index
	header('location: home');
}
else
{
	// get user from database
    // $user_auth_query = mysql_query("SELECT * FROM user_auth WHERE username='$user_check'", $link);
    // $user_auth_row = mysql_fetch_row($user_auth_query);

    // set user id for session
    $user_id = $row['user_id'];

    // get and define user id from username
	//$user_id = get_user_id($url_keyword, $link);
}

?>