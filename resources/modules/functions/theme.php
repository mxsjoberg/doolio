<?php // theme.php

//	----------------------------------------------------------------------------
//	Function for getting theme for a user.
//
// 	Input 		: $user_id, $link
// 	Return 		: String ($theme)
//	----------------------------------------------------------------------------
function get_theme($user_id, $link) {
	// query for database
	$query = mysql_query("SELECT * FROM user_details WHERE user_id='$user_id'", $link);

	if (mysql_num_rows($query) != 0) {
	    while ($row = mysql_fetch_row($query)) {   
	        // define theme value for user
	        $user_theme = $row[14];
	    }

	    if ($user_theme == 1) {	
	    	// use colors
	    	$theme = "Playful";
	    } else { 
	    	// no colors
	    	$theme = "Dark";
	    }
	}

	return $theme;
}

//	----------------------------------------------------------------------------
//	Function for setting theme value for current user.
//
// 	Input 	 	: $theme_value, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function set_theme($theme_value, $user_id, $link) {
	// check if input is not null
	if ($theme_value != NULL) {   
		// check color value 0 or 1
	    if ($theme_value == 0 || $theme_value == 1) {
	        // insert color value into table for user
	        $query = " UPDATE user_details".
	                 " SET user_color=$theme_value".
	                 " WHERE user_id=$user_id ";
	        $insert = mysql_query($query, $link);

	        // return false if error with insert
	        if(!$insert) { 
	        	return false;
	        } else {
	        	return true;
	        }
	    } else {   
	        // return false if error with validation
	        return false;
	    }
	} else {	
		// return false if input is null
		return false;
	}
}

//	----------------------------------------------------------------------------
//	Function for getting theme color for skills.
//
// 	Input 		: $type
// 	Return 		: String ($color)
//	----------------------------------------------------------------------------
function get_theme_skill_color($type) {
	// color matrix
	$color_matrix = array(
	    "Technology" 	=> "red",
	    "Business" 		=> "azure",
	    "Creative" 		=> "yellow",
	    "Science" 		=> "violet",
	    "Language" 		=> "emerald",
	    "Other" 		=> "grey",
	);

	// define color based on skill type
	$color = $color_matrix[$type];

	return $color;
}

?>