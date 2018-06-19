<?php

//	----------------------------------------------------------------------------
//	Function for updating skill name for skill.
//
// 	Input 	 	: $skill_name, $skill_id, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function edit_skill_name($skill_name, $skill_id, $user_id, $link) {	
	
	// check if input is not null
	if ($skill_name != NULL) {

	    // check if skill name is accepted characters
	    $regex_name = "/^[A-Za-z0-9\s\+\/\#\.]+$/";
	    if (preg_match($regex_name, $skill_name))
	    {
	    	$skill_name = mysql_real_escape_string($skill_name);

	        // update skill name in table for user
	        $query = " UPDATE user_skills".
	                 " SET skill_name='$skill_name'".
	                 " WHERE skill_index=$skill_id";

	        $update = mysql_query($query, $link);

	        // return false if error with update
	        if(!$update)
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
//	Function for updating skill type for skill.
//
// 	Input 	 	: $skill_type, $skill_id, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function edit_skill_type($skill_type, $skill_id, $user_id, $link) {	
	
	// check if input is not null
	if ($skill_type != NULL) {

	    // check if skill type is valid
	    if ( $skill_type == "Other" ||
	    	 $skill_type == "Technology" ||
	    	 $skill_type == "Business" ||
	    	 $skill_type == "Science" ||
	    	 $skill_type == "Creative" ||
	    	 $skill_type == "Language" )
	    {
	        // update skill type in table for user
	        $query = " UPDATE user_skills".
	                 " SET skill_type='$skill_type'".
	                 " WHERE skill_index=$skill_id";

	        $update = mysql_query($query, $link);

	        // return false if error with update
	        if(!$update)
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
//	Function for updating skill level for skill.
//
// 	Input 	 	: $skill_level, $skill_id, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function edit_skill_level($skill_level, $skill_id, $user_id, $link) {
	
	// check if skill level is not null
	if ($skill_level != NULL)
	{   
	    // check if skill level is 1, 2, 3, or 4
	    if ( $skill_level == 1 ||
	    	 $skill_level == 2 ||
	    	 $skill_level == 3 ||
	    	 $skill_level == 4 ||
	    	 $skill_level == 5 )
	    {
	        // update skill level in table for user
	        $query = " UPDATE user_skills".
	                 " SET skill_level=$skill_level".
	                 " WHERE skill_index=$skill_id";

	        $update = mysql_query($query, $link);

	        // return false if error with update
	        if(!$update)
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
//	Function for updating skill link for skill.
//
// 	Input 	 	: $skill_link, $skill_id, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function edit_skill_link($skill_link, $skill_id, $user_id, $link) {	
	
	$skill_link = mysql_real_escape_string($skill_link);

	// update skill link in table for user
	$query = " UPDATE user_skills".
	         " SET skill_link='$skill_link'".
	         " WHERE skill_index=$skill_id";

	$update = mysql_query($query, $link);

	// return false if error with update
	if(!$update)
	{ 
		return false;
	}
	// otherwise return true
	else
	{
		return true;
	}
}

//	----------------------------------------------------------------------------
//	Function for updating skill resource 1
//
// 	Input 	 	: $skill_resource_1, $skill_id, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function edit_skill_resource_1($skill_resource_1, $skill_id, $user_id, $link) {	
	
	$skill_resource_1 = mysql_real_escape_string($skill_resource_1);

	// update skill link in table for user
	$query = " UPDATE user_skills".
	         " SET skill_resource_1='$skill_resource_1'".
	         " WHERE skill_index=$skill_id";

	$update = mysql_query($query, $link);

	// return false if error with update
	if(!$update)
	{ 
		return false;
	}
	// otherwise return true
	else
	{
		return true;
	}
}

//	----------------------------------------------------------------------------
//	Function for updating skill resource 2
//
// 	Input 	 	: $skill_resource_2, $skill_id, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function edit_skill_resource_2($skill_resource_2, $skill_id, $user_id, $link) {	
	
	$skill_resource_2 = mysql_real_escape_string($skill_resource_2);

	// update skill link in table for user
	$query = " UPDATE user_skills".
	         " SET skill_resource_2='$skill_resource_2'".
	         " WHERE skill_index=$skill_id";

	$update = mysql_query($query, $link);

	// return false if error with update
	if(!$update)
	{ 
		return false;
	}
	// otherwise return true
	else
	{
		return true;
	}
}

//	----------------------------------------------------------------------------
//	Function for updating skill resource 3
//
// 	Input 	 	: $skill_resource_3, $skill_id, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function edit_skill_resource_3($skill_resource_3, $skill_id, $user_id, $link) {	
	
	$skill_resource_3 = mysql_real_escape_string($skill_resource_3);

	// update skill link in table for user
	$query = " UPDATE user_skills".
	         " SET skill_resource_3='$skill_resource_3'".
	         " WHERE skill_index=$skill_id";

	$update = mysql_query($query, $link);

	// return false if error with update
	if(!$update)
	{ 
		return false;
	}
	// otherwise return true
	else
	{
		return true;
	}
}

//	----------------------------------------------------------------------------
//	Function for deleting skill from user.
//
// 	Input 	 	: $skill_to_delete, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function delete_skill($skill_to_delete, $user_id, $link) {

	// check if input is not null
	if ($skill_to_delete != NULL)
	{   
	    // delete skill from table for user
	    $query = "DELETE FROM user_skills WHERE user_id='$user_id' AND skill_index='$skill_to_delete'";
	    $delete = mysql_query($query, $link);

	    // return false if error with delete
	    if(!$delete)
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
		// return false if input is null
		return false;
	}
}

//	----------------------------------------------------------------------------
//	Function for getting skill level for skills.
//
// 	Input 		: $skill_level
// 	Return 		: String ($level)
//	----------------------------------------------------------------------------
function get_skill_level($skill_level) {
	
	if ($skill_level == 20) { $level = "Beginner"; }
    elseif ($skill_level == 40) { $level = "Familiar"; }
    elseif ($skill_level == 60) { $level = "Proficient"; }
    elseif ($skill_level == 80) { $level = "Expert"; }
    elseif ($skill_level == 100) { $level = "Master"; }
    else { $level = "Beginner"; }

	return $level;
}

?>