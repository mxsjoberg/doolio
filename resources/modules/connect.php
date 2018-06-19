<?php

//-----------------------------------------------------
// Establish connection to server and select database
//-----------------------------------------------------

// $db_server  	    = 'database.doolio.co';
// $db_username  	= 'doolio_admin';
// $db_password  	= 'Micke1990';
// $db_database  	= 'doolio_beta';

$db_server  	= 'localhost';
$db_username  	= 'root';
$db_password  	= 'root';
$db_database  	= 'doolio_db';

// connect to server and define link or die.
$link = mysql_connect($db_server, $db_username, $db_password);
if (!$link) {
    die('Unable to connect to server: ' . mysql_error());
}

// select database or die
$db_selected = mysql_select_db($db_database, $link);
if (!$db_selected) {
    die ('Unable to use database: ' . mysql_error());
}

mysql_query("SET NAMES 'utf8'"); 
mysql_query("SET CHARACTER SET 'utf8'");

?>