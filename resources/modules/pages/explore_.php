<?php // explore_.php

//  ----------------------------------------------------------------------------
//  Iterate and output skills based on search query.
//
//  Require     : connect.php
//  Input       : 
//  ----------------------------------------------------------------------------
if (!empty($_POST["search"]) && empty($error)) {
    // define form inputs
    $search = $_POST["search"];

    if ($search != NULL) {
        // query database for skills
        $query = mysql_query("SELECT * FROM user_skills WHERE skill_name='$search' ORDER BY skill_date DESC", $link);

        // check if more than one skill
        if (mysql_num_rows($query) != 0) {   
            // text
            echo "
            <div class='col-xs-12 col-md-12 padding-sm'>
                <p class='no-margin'>Showing users with skill: <strong>$search</strong></p>
            </div>";
            // start skill wrapper
            echo "
            <div class='col-xs-12 col-md-12 no-padding bg-color bg-color-white border-light no-border-radius'>";

            // helper counter
            $counter = 0;

            // iterate skills
            while ($row = mysql_fetch_row($query)) {   
                // define skill details
                $skill_date     = date('d F, Y', strtotime($row[6]));
                $skill_id       = $row[0];
                $user_id        = $row[1];
                $skill_name     = ucfirst($row[2]);
                $skill_type     = $row[3];
                $skill_level    = $row[4] * 25;

                // define username
                $username = get_username($user_id, $link);

                // define skill level
                $level = get_skill_level($skill_level);

                // define type and color
                $type = $skill_type;
                $color = get_theme_skill_color($type);

                echo"
                <a href='$username'>";

                // bar main container wrapper
                if ($counter == 0) {
                    echo "
                    <div class='bar-main-container simple no-margin no-border'>";
                } else { 
                    echo "
                    <div class='bar-main-container simple no-margin'>";
                }

                        // skill details
                        echo "
                        <!-- skill name -->
                        <div class='col-xs-12 col-md-2 input-name'>
                            <span>$username</span>
                        </div>

                        <!-- skill bar -->
                        <div class='col-xs-10 col-md-9 input-level'>
                            <div class='col-xs-12 col-md-12 no-padding'>
                                <div class='bar-container'>
                                    <div class='bar $color' data-percentage='$skill_level'></div>
                                </div>
                            </div>
                        </div>
                        <div class='col-xs-2 col-md-1 right'>
                            <a href='$username' class='btn btn-secondary btn-no-bg no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                        </div>";

                    // end bar main container wrapper
                    echo"
                    </div>";

                echo"
                </a>";
                
                // iterate counter
                $counter++;
            }

            // end skill wrapper
            echo "</div>";
        } else {
            // output if no skills for search
            echo "
            <div class='col-md-12 col-xs-12'>
                <div class='col-md-12 col-xs-12'>
                    <div class='col-md-12 col-xs-12 padding-md center'>
                        <p class='text-muted no-margin margin-top-sm'>Search for <strong>$search</strong> gave no results.</p>
                    </div>
                </div>
            </div>
            ";
        }

    } else {
        echo "
        <div class='col-md-12 col-xs-12'>
            <div class='col-md-12 col-xs-12'>
                <div class='col-md-12 col-xs-12 padding-md center'>
                    <p class='text-muted no-margin margin-top-sm'>Search for a skill to show users.</p>
                </div>
            </div>
        </div>";
    }

} else {
    echo "
    <div class='col-md-12 col-xs-12'>
        <div class='col-md-12 col-xs-12'>
            <div class='col-md-12 col-xs-12 padding-md center'>
                <p class='text-muted no-margin margin-top-sm'>Search for a skill to show users.</p>
            </div>
        </div>
    </div>";
}

unset($_POST);

?>