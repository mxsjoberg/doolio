<?php

//	----------------------------------------------------------------------------
//	Function for adding education to user.
//
//	Require 	: connect.php, session.php, myprofile_.php
// 	Parameter 	: $education_name, $education_type, $education_date, $user_id, $link
//	----------------------------------------------------------------------------
function add_education($education_name, $education_type, $education_date, $user_id, $link) {	
	
	// check if input is not null
	if ($education_name != NULL || $education_date != NULL)
	{   
	    // check if education name is accepted characters, education date is greater than 0, and education date is 4 characters
	    $regex_name = "/(\w+)/";
	    if (preg_match($regex_name, $education_name) && $education_date > 0 && strlen($education_date) == 4)
	    {
	        // insert new education into table for user
	        $query = " INSERT INTO user_education".
	                 " (user_id, education_name, education_type, education_date) ".
	                 " VALUES ('$user_id', '$education_name', '$education_type', '$education_date') ";
	        $insert = mysql_query($query, $link);

	        // return false if error with insert
	        if(!$insert)
	        { 
	        	return false;
	        }
	        // otherwise return true
	        else
	        {
	        	return true;
	        }
	    }
	    else
	    {   
	        // return false if error with validation
	        return false;
	    }
	}
	else
	{	
		// return false if input is null
		return false;
	}
}

//	----------------------------------------------------------------------------
//	Function for deleting education from user.
//
//	Require 	: connect.php, session.php, myprofile_.php
// 	Parameter 	: $education_to_delete, $user_id, $link
//	----------------------------------------------------------------------------
function delete_education($education_to_delete, $user_id, $link) {	
	
	// check if input is not null
	if ($education_to_delete != NULL) {   
	    
	    // delete education from table for user
	    $query = "DELETE FROM user_education WHERE user_id='$user_id' AND education_index='$education_to_delete'";
	    $delete = mysql_query($query, $link);

	    // return false if error with delete
	    if(!$delete) { 
	    	return false;
	    }
	    // otherwise return true
	    else {
	    	return true;
	    }
	}
	else {	
		// return false if input is null
		return false;
	}
}

?>