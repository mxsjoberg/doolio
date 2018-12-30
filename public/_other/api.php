<?php // api.php

//-----------------------------------------------------
// Display a user badge with name and skills
//-----------------------------------------------------

$submit = $_GET['username'];
 
require ('../resources/modules/connect.php');

// regex for validating url keyword as legal username
$regex_username = "/\b([a-zA-Z0-9]+){3,}\b/";

if (preg_match($regex_username, $submit))
{   
    // set username as url keyword
    $user_username = $submit;

    // get user id from username
    $user_id_query = mysql_query("SELECT * FROM user_auth WHERE username='$user_username'", $link);
    $user_id_result = mysql_fetch_row($user_id_query);

    // set user id for username
    $user_id = $user_id_result[0];

    // get user details for user id
    $user_details_query = mysql_query("SELECT * FROM user_details WHERE user_id='$user_id'", $link);
    $user_details_row = mysql_fetch_row($user_details_query);

    // define name
    if ($user_details_row[1] == NULL || $user_details_row[2] == NULL) {   
        // set name to 'Private' if missing
        $name = "Private";
    } else { 
        // set name to first- and second name
        $name = "$user_details_row[1] $user_details_row[2]";
    }

    // get number of skills
    $user_skills_query = mysql_query("SELECT * FROM user_skills WHERE user_id='$user_id'", $link);
    $user_skills_total = mysql_num_rows($user_skills_query);

    // set default font
    $font = "Source Sans Pro";

    echo "
    <body style='margin:0;padding:0;'>
        <style>
        a {
            color:rgba(33,33,33,1);
            box-sizing: border-box;
            padding-top:0;
            letter-spacing:1px;
            font-family: $font,sans-serif;
            font-size: 16px;
            line-height: 1.2;
            font-weight: 200;
            position: relative;
            display: block;
        }
        .user-badge {
            display:inline-block;
            padding:20px;
            width:auto;
            background:#fff;
            border-radius:0px;
            box-shadow: 5px 5px 0 0 rgba( 0, 0, 0, 0.1 );
        }
        .user-badge:hover,
        .user-badge:focus
        { 
            box-shadow: 5px 5px 0 0 rgba( 0, 0, 0, 0.15 );
        }

        </style>
        <!-- change beta.doolio.co when live -->
        <a href='http://beta.doolio.co/$submit' target='_parent'>
            <div class='user-badge'>
                <div style='display:inline-block;float:left;width:20%;'>
                    <!-- change beta.doolio.co when live -->
                    <img src='http://beta.doolio.co/_img/icon-color.png' style='width:100%;height:auto;'>
                </div>
                <div style='display:inline-block;width:72%;float:right;overflow:hidden;padding-left:10px;'>
                    <span style='display:block;font-weight:bold;'>$name</span>
                    <span style='display:block;'>$user_skills_total Skills</span>
                </div>
            </div>
        </a>
    </body>

    ";

    // close connection
    mysql_close($link);
} else {
    // set default font
    $font = "Source Sans Pro";

    echo "
    <body style='margin:0;padding:0;'>
        <style>
        a {
            color:rgba(33,33,33,1);
            box-sizing: border-box;
            padding-top:0;
            letter-spacing:1px;
            font-family: $font,sans-serif;
            font-size: 16px;
            line-height: 1.2;
            font-weight: 200;
            position: relative;
            display: block;
        }
        .user-badge {
            display:inline-block;
            padding:20px;
            width:auto;
            background:#fff;
            border-radius:0px;
            box-shadow: 5px 5px 0 0 rgba( 0, 0, 0, 0.1 );
        }
        .user-badge:hover,
        .user-badge:focus
        { 
            box-shadow: 5px 5px 0 0 rgba( 0, 0, 0, 0.15 );
        }

        </style>
        <a href='http://doolio.co/' target='_parent'>
            <div class='user-badge'>
                <div style='display:inline-block;float:left;width:20%;'>
                    <img src='http://www.doolio.co/_img/icon-color.png' style='width:100%;height:auto;'>
                </div>
                <div style='display:inline-block;width:72%;float:right;overflow:hidden;padding-left:10px;'>
                    <span style='display:block;font-weight:bold;'>Not found</span>
                    <span style='display:block;'>0 Skills</span>
                </div>
            </div>
        </a>
    </body>

    ";

    // close connection
    mysql_close($link);
}

?>
