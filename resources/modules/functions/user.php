<?php

//	----------------------------------------------------------------------------
//	Function for checking and getting user id using URL keyword.
//
// 	Input 		: $url_keyword, $link
// 	Return 		: Int ($user_id)
//	----------------------------------------------------------------------------
function get_user_id($url_keyword, $link) {
	
	// regex for validating keyword as username
	$regex = "/\b([a-zA-Z0-9]+){3,}\b/";

	// check if username is accepted characters
	if (preg_match($regex, $url_keyword))
	{   
	    // define username from keyword
	    $username = $url_keyword;

	    // query database for user id
	    $query = mysql_query("SELECT * FROM user_auth WHERE username='$username'", $link);
	    $row = mysql_fetch_row($query);

	    // check if user id exists
	    if ($row != NULL)
	    {    
	        // define user id for username
	        $user_id = $row[0];

	        // return user id
	        return $user_id;
	    }
	    else
	    {
	    	// return false if user id doesn't exist
	    	return false;
	    }
	}
	else
	{
		// return false if error with validation
		return false;
	}
}

//	----------------------------------------------------------------------------
//	Function for checking and getting username using user id.
//
// 	Input 		: $user_id, $link
// 	Return 		: String ($username)
//	----------------------------------------------------------------------------
function get_username($user_id, $link) {

	// check if user id is accepted characters
	if ($user_id > 0)
	{   
	    // query database for user id
	    $query = mysql_query("SELECT * FROM user_auth WHERE user_id='$user_id'", $link);
	    $row = mysql_fetch_row($query);

	    // check if user id exists
	    if ($row != NULL)
	    {    
	        // define username for user id
	        $username = $row[1];

	        // return username
	        return $username;
	    }
	    else
	    {
	    	// return false if user id doesn't exist
	    	return false;
	    }
	}
	else
	{
		// return false if error with validation
		return false;
	}
}

//	----------------------------------------------------------------------------
//	Function for getting user details.
//
// 	Input 		: $user_id, $link
// 	Return 		: Array ($user_details)
//	----------------------------------------------------------------------------
function get_user_details($user_id, $link) {

	// check if user id is not NULL
	if ($user_id != NULL)
	{    
	    // query database for user details
	    $query = mysql_query("SELECT * FROM user_details WHERE user_id='$user_id'", $link);
	    $row = mysql_fetch_row($query);

	    // define user details
	    $first_name  	= $row[1];        // first name as text
	    $second_name  	= $row[2];        // second name as text
	    $country  		= $row[3];        // country as text
	    
	    // // define email if not hidden
	    // if ($row[11] == 0) {
	        
	    //     $email = $row[4];          	  // email as text
	    // }
	    // // otherwise define email as NULL
	    // else {
	    //     $email = NULL;
	    // }

	    $email = $row[4];          	  // email as text

	    // define user details as array
	    $user_details = array($first_name, $second_name, $country, $email, $photo);

	    return $user_details;
	}
	else
	{
		// return false if user is NULL
		return false;
	}
}

//	----------------------------------------------------------------------------
//	Function for getting skill order setting for user.
//
// 	Input 	 	: $user_id, $link
//  Return 		: String ($order)
//	----------------------------------------------------------------------------
function get_user_skill_order($user_id, $link) {
	
	// query for database
	$query = mysql_query("SELECT * FROM user_details WHERE user_id='$user_id'", $link);

	if (mysql_num_rows($query) != 0)
	{
	    while ($row = mysql_fetch_row($query))
	    {   
	        // define order by value for user
	        $order_by_value = $row[13];
	    }

	    if ($order_by_value == 1)
	    {	
	    	// order by level
	    	$order = "skill_level";
	    }
	    else if ($order_by_value == 2)
	    { 	
	    	// order by type
	    	$order = "skill_type";
	    }
	    else
	    { 
	    	// order by date
	    	$order = "skill_date";
	    }
	}

	return $order;
}

//	----------------------------------------------------------------------------
//	Function for setting skill order setting for user.
//
// 	Input 	 	: $order_by, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function set_user_skill_order($order_by, $user_id, $link) {
	
	// check if input is not null
	if ($order_by != NULL)
	{   
		// check order value 0, 1, or 2
	    if ($order_by >= 0 && $order_by <= 3)
	    {
	        // insert order value into table for user
	        $query = " UPDATE user_details".
	                 " SET user_order=$order_by".
	                 " WHERE user_id=$user_id";
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
//	Function for getting most common skill for user.
//
// 	Input 		: $user_id, $link
// 	Return 		: String ($type)
//	----------------------------------------------------------------------------
function get_user_most_common_skill($user_id, $link) {
	
	// query for database
	$query = mysql_query("SELECT skill_type FROM user_skills WHERE user_id='$user_id'", $link);

    if (mysql_num_rows($query) != 0)
    {	
    	// add all skill types to array
        while ($row = mysql_fetch_row($query))
        {   
            $skills[] = $row[0];
        }

        // count skills types and find most common type
        $count = array_count_values($skills); 
        $type = array_search(max($count), $count);

        // return type
        return $type;
    }
    else
    {
    	return false;
    }
}

//	----------------------------------------------------------------------------
//	Function for getting looking for work value for user.
//
// 	Input 	 	: $user_id, $link
//  Return 		: String ($order)
//	----------------------------------------------------------------------------
function get_user_looking_for_work($user_id, $link) {
	
	// query for database
	$query = mysql_query("SELECT * FROM user_details WHERE user_id='$user_id'", $link);

	if (mysql_num_rows($query) != 0)
	{
	    while ($row = mysql_fetch_row($query))
	    {   
	        // define looking for work value for user
	        $looking_for_work_value = $row[15];
	    }

	    if ($looking_for_work_value == 1)
	    {	
	    	// looking for work value
	    	$looking_for_work_value = 1;
	    }
	    else if ($looking_for_work_value == 0)
	    { 	
	    	// looking for work value
	    	$looking_for_work_value = 0;
	    }
	    else
	    { 
	    	// looking for work value
	    	$looking_for_work_value = 0;
	    }
	}

	return $looking_for_work_value;
}

//	----------------------------------------------------------------------------
//	Function for setting looking for work value for user.
//
// 	Input 	 	: $looking_for_work_value, $user_id, $link
// 	Return 		: Boolean
//	----------------------------------------------------------------------------
function set_user_looking_for_work($looking_for_work_value, $user_id, $link) {

	// check if input is not null
	if ($looking_for_work_value != NULL)
	{   
		// check looking for work value 0 or 1
	    if ($looking_for_work_value == 0 || $looking_for_work_value == 1)
	    {
	        // insert looking for work value into table for user
	        $query = " UPDATE user_details".
	                 " SET user_looking_for_work=$looking_for_work_value".
	                 " WHERE user_id=$user_id";
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

?>