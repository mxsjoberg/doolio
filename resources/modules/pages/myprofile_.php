<?php

//-----------------------------------------------------
// Add new skill
//-----------------------------------------------------
if (!empty($_POST["submitSkill"]) && empty($error)) {
	
	// define skill details
	$skill_name             = $_POST["skillName"]; 
	$skill_type             = $_POST["skillType"]; 
	$skill_level            = $_POST["skillLevel"];

	// define skill link
	$skill_link             = $_POST["skillLink"]; 

	// define learning resources
	$skill_resource_1    	= $_POST["skillResource1"]; 
	$skill_resource_2    	= $_POST["skillResource2"];
	$skill_resource_3   	= $_POST["skillResource3"]; 

	// update skill name
	if (!empty($skill_name) && empty($error))
	{	
		// create new skill id for user
	    $query = " INSERT INTO user_skills ".
	             " (user_id, skill_name, skill_type, skill_level, skill_link, skill_resource_1, skill_resource_2, skill_resource_3) ".
	             " VALUES ('$user_id', '', '', '', '', '', '', '') ";
	    $insert = mysql_query($query, $link);

	    // define skill id from insert
	    $skill_id = mysql_insert_id();

	    if(!$insert) 
	    {
		    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	    }
	    else
	    {	
	    	// add details
	    	$edit_skill_name = edit_skill_name($skill_name, $skill_id, $user_id, $link);
	    	$edit_skill_type = edit_skill_type($skill_type, $skill_id, $user_id, $link);
	    	$edit_skill_level = edit_skill_level($skill_level, $skill_id, $user_id, $link);

	    	// add link
	    	$edit_skill_link = edit_skill_link($skill_link, $skill_id, $user_id, $link);

	    	// add resources
	    	$edit_skill_resource_1 = edit_skill_resource_1($skill_resource_1, $skill_id, $user_id, $link);
	    	$edit_skill_resource_2 = edit_skill_resource_2($skill_resource_2, $skill_id, $user_id, $link);
	    	$edit_skill_resource_3 = edit_skill_resource_3($skill_resource_3, $skill_id, $user_id, $link);

	    	// check valid name
	    	if ($skill_name != NULL && $edit_skill_name == false)
	    	{
	    		$delete_skill = delete_skill($skill_id, $user_id, $link);
		    	$error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	    	}
	    	else
	    	{	
	    		$success = "<strong>Allons-y!</strong> Successfully added skill.";
	    	}
	    }
	}
}

//-----------------------------------------------------
// Edit skill
//-----------------------------------------------------
if (!empty($_POST["updateSkill"]) && empty($error)) {

	// define skill details
    $update_skill_id 		= $_POST["updateSkillId"]; 	
	$update_skill_name      = $_POST["updateSkillName"]; 
	$update_skill_type      = $_POST["updateSkillType"]; 
	$update_skill_level     = $_POST["updateSkillLevel"];

	// define skill link
	$update_skill_link      = $_POST["updateSkillLink"]; 

	// define skill resources
	$update_skill_resource_1      = $_POST["updateSkillResource1"]; 
	$update_skill_resource_2      = $_POST["updateSkillResource2"]; 
	$update_skill_resource_3      = $_POST["updateSkillResource3"]; 

	// update skill name
	if (!empty($update_skill_name) && empty($error))
	{
		// call function to update skill name
		$edit_skill_name = edit_skill_name($update_skill_name, $update_skill_id, $user_id, $link);

		// error if not null and return is false
		if ($update_skill_name != NULL && $edit_skill_name == false)
		{
		    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
		}
		else
		{
			$success = "<strong>Allons-y!</strong> Successfully updated skill.";
		}
	}

	// update skill type
	if (!empty($update_skill_type) && empty($error))
	{	
		// call function to update skill type
		$edit_skill_type = edit_skill_type($update_skill_type, $update_skill_id, $user_id, $link);

		// error if not null and return is false
		if ($update_skill_type != NULL && $edit_skill_type == false)
		{
		    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
		}
		else 
		{
			$success = "<strong>Allons-y!</strong> Successfully updated skill.";
		}
	}
 	
 	// update skill level
	if (!empty($update_skill_level) && empty($error))
	{	
		// call function to update skill level
		$edit_skill_level = edit_skill_level($update_skill_level, $update_skill_id, $user_id, $link);

		// error if not null and return is false
		if ($update_skill_level != NULL && $edit_skill_level == false)
		{
		    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
		}
		else 
		{
			$success = "<strong>Allons-y!</strong> Successfully updated skill.";
		}
	}

	// update skill link
	if ($update_skill_link != NULL && empty($error))
	{	
		// call function to update skill link
		$edit_skill_link = edit_skill_link($update_skill_link, $update_skill_id, $user_id, $link);

		// error if not null and return is false
		if ($edit_skill_link == false)
		{
		    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
		}
		else 
		{
			$success = "<strong>Allons-y!</strong> Successfully updated skill.";
		}
	}

	// update skill resource 1
	if ($update_skill_resource_1 != NULL && empty($error))
	{	
		// call function to update skill link
		$edit_skill_resource = edit_skill_resource_1($update_skill_resource_1, $update_skill_id, $user_id, $link);

		// error if not null and return is false
		if ($edit_skill_resource == false)
		{
		    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
		}
		else 
		{
			$success = "<strong>Allons-y!</strong> Successfully updated skill.";
		}
	}
	// update skill resource 2
	if ($update_skill_resource_2 != NULL && empty($error))
	{	
		// call function to update skill link
		$edit_skill_resource = edit_skill_resource_2($update_skill_resource_2, $update_skill_id, $user_id, $link);

		// error if not null and return is false
		if ($edit_skill_resource == false)
		{
		    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
		}
		else 
		{
			$success = "<strong>Allons-y!</strong> Successfully updated skill.";
		}
	}
	// update skill resource 3
	if ($update_skill_resource_3 != NULL && empty($error))
	{	
		// call function to update skill link
		$edit_skill_resource = edit_skill_resource_3($update_skill_resource_3, $update_skill_id, $user_id, $link);

		// error if not null and return is false
		if ($edit_skill_resource == false)
		{
		    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
		}
		else 
		{
			$success = "<strong>Allons-y!</strong> Successfully updated skill.";
		}
	}
}

//-----------------------------------------------------
// Change looking for work
//-----------------------------------------------------
if (is_numeric($_POST["work"]) && empty($error)) {	
	
	// define looking for work value
	$looking_for_work_value = $_POST["work"];

	// update looking for work value
	$update_looking_for_work= set_user_looking_for_work($looking_for_work_value, $user_id, $link);

	// check for errors
	if ($looking_for_work_value != NULL && $update_looking_for_work == false)
	{
	    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	}
}

//-----------------------------------------------------
// Change theme
//-----------------------------------------------------
if (is_numeric($_POST["color"]) && empty($error)) {	
	
	// define theme value
	$theme_value = $_POST["color"];

	// update theme value
	$update_theme_value = set_theme($theme_value, $user_id, $link);

	// check for errors
	if ($theme_value != NULL && $update_theme_value == false)
	{
	    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	}
}

//-----------------------------------------------------
// Change order
//-----------------------------------------------------
if (is_numeric($_POST["order"]) && empty($error)) {

	// define skill order value
	$order_by = $_POST["order"];

	// update skill order value
	$update_order_by = set_user_skill_order($order_by, $user_id, $link);

	// check for errors
	if ($order_by != NULL && $update_order_by == false)
	{
	    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	}
}

//-----------------------------------------------------
// Delete skill
//-----------------------------------------------------
if (!empty($_POST["deleteSkillId"]) && empty($error)) {	
	
	// define skill to delete
	$skill_to_delete = $_POST["deleteSkillId"];

	// delete skill
	$delete_skill = delete_skill($skill_to_delete, $user_id, $link);

	// check for error
	if ($skill_to_delete != NULL && $delete_skill == false)
	{
	    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	}
}

?>