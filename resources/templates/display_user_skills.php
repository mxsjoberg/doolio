<?php // display_user_skills.php

//  ----------------------------------------------------------------------------
//  Iterate and output skills for user. (Logged out)
//
//  Require     : connect.php, session.php
//  Input       : $user_id, $sill_order, $skill_color, $link
//  ----------------------------------------------------------------------------

// query database for skills
$query = mysql_query("SELECT * FROM user_skills WHERE user_id='$user_id' ORDER BY $skill_order DESC", $link);

// check if more than one skill
if (mysql_num_rows($query) != 0) {   
    // helper counter
    $counter = 0;

    // iterate all skills
    while ($row = mysql_fetch_row($query)) {   
        // define skill details
        $skill_id               = $row[0];
        $skill_user_id          = $row[1];
        $skill_name             = ucfirst($row[2]);
        $skill_type             = ucfirst($row[3]);
        $skill_level            = $row[4] * 20;

        // define link to skill
        $skill_link             = $row[5];

        if ($skill_link == '' || $skill_link == ' ') {
            $skill_link = NULL;
        }

        // define learning resources
        $resource_link_1        = $row[6];
        $resource_link_2        = $row[7];
        $resource_link_3        = $row[8];

        if ($resource_link_1 == '' || $resource_link_1 == ' ') {
            $resource_link_1 = NULL;
        }
        if ($resource_link_2 == '' || $resource_link_2 == ' ') {
            $resource_link_2 = NULL;
        }
        if ($resource_link_3 == '' || $resource_link_3 == ' ') {
            $resource_link_3 = NULL;
        }

        if ($skill_link != NULL || $resource_link_1 != NULL || $resource_link_2 != NULL || $resource_link_3 != NULL) {
            $some_link = true;
        } else {
            $some_link = false;
        }

        // define date
        $skill_date             = date('d F, Y', strtotime($row[9]));

        // define skill level
        $level                  = get_skill_level($skill_level);

        // define skill level as fraction
        $skill_level_number     = $skill_level / 20;

        // define type for colors
        $type                   = $skill_type;

        // theme colors
        if ($theme == "Playful")  {
            $color = get_theme_skill_color($type);
        } elseif ($theme == "Dark") {
            $color = "dark";
        }

        // accordion wrapper
        echo "
        <div id='accordion-$skill_id' class='col-xs-12 col-md-12 no-padding' role='tablist'>
            <div id='heading-$skill_id' class='col-xs-12 col-md-12 no-padding' role='tab'>";

                // link wrapper
                if ($some_link) {
                    echo "
                    <a data-toggle='collapse' href='#collapse-$skill_id' aria-expanded='false' aria-controls='collapse-$skill_id'>";
                } else {
                    echo "
                    <a>";
                }

                    // output markup for skill
                    if ($counter == 0) { 
                    echo "
                        <div class='bar-main-container simple no-margin no-border'>";
                    } else { 
                    echo "
                        <div class='bar-main-container simple no-margin'>";
                    }
                
                    // skill name and bar
                    echo "  
                        <!-- skill name -->
                        <div class='col-xs-12 col-md-2 input-name'>
                            <span>$skill_name</span>
                        </div>
                        <!-- skill bar -->
                        <div class='col-xs-10 col-md-9 input-level'>
                            <div class='bar-container'>
                                <div class='bar $color' data-percentage='$skill_level'></div>
                            </div>
                        </div>
                        <div class='col-xs-2 col-md-1 right'>";
                            if ($some_link) {
                                echo"
                                <a data-toggle='collapse' href='#collapse-$skill_id' aria-expanded='false' aria-controls='collapse-$skill_id' class='btn btn-secondary btn-no-bg no-border no-padding no-margin'><i class='fa fa-caret-down'></i></a>";
                            }
                        echo"
                        </div>";

                    // end output markup for skill
                    echo "
                    </div>
                    ";
                
                // end link wrapper
                echo "
                </a>";

                // collapse
                echo "
                <div id='collapse-$skill_id' class='col-xs-12 col-md-12 no-padding no-margin collapse' role='tabpanel' aria-labelledby='heading-$skill_id' data-parent='accordion-$skill_id'>";

                    // bar main container wrapper
                    echo"
                    <div class='bar-main-container simple no-margin'>";

                        if ($skill_link != NULL) {
                        // portfolio
                        echo"
                        <div class='col-xs-12 col-md-12 no-padding no-margin'>";
                            // portfolio title
                            echo "
                            <div class='col-xs-12 col-md-2 input-name'>
                                <span class='text-muted'>Portfolio</span>
                            </div>";
                            // portfolio link wrapper
                            echo "
                            <div class='col-xs-12 col-md-10 input-name'>";
                                // portfolio link
                                echo"
                                <p class='no-margin'>";
                                if ($skill_link != NULL) { 
                                    echo "
                                    <a href='"; echo "$skill_link"; echo "' target='_blank'>"; echo "$skill_link"; echo "</a>";
                                };
                                echo"
                                </p>";
                            // end portfolio link wrapper
                            echo "
                            </div>";
                        // end portfolio
                        echo"
                        </div>";
                        }

                        if ($resource_link_1 != NULL || $resource_link_2 != NULL || $resource_link_3 != NULL) {
                            
                        // resource
                        if ($skill_link == NULL) {
                        echo"
                        <div class='col-xs-12 col-md-12 no-padding'>";
                        } else {
                        echo"
                        <div class='col-xs-12 col-md-12 no-padding margin-top-sm'>";
                        }
                            // resource title
                            echo "
                            <div class='col-xs-12 col-md-2 input-name'>
                                <span class='text-muted'>Resources</span>
                            </div>";
                            // resource link wrapper
                            echo "
                            <div class='col-xs-12 col-md-10 input-name'>";
                                // resource links
                                if ($resource_link_1 != NULL) { 
                                    echo "
                                    <p class='no-margin'>
                                    <a href='"; echo "$resource_link_1"; echo "' target='_blank'>"; echo "$resource_link_1"; echo "</a>";
                                    echo "
                                    </p>";
                                }
                                if ($resource_link_2 != NULL) { 
                                    echo "
                                    <p class='no-margin'>
                                    <a href='"; echo "$resource_link_2"; echo "' target='_blank'>"; echo "$resource_link_2"; echo "</a>";
                                    echo "
                                    </p>";
                                }
                                if ($resource_link_3 != NULL) { 
                                    echo "
                                    <p class='no-margin'>
                                    <a href='"; echo "$resource_link_3"; echo "' target='_blank'>"; echo "$resource_link_3"; echo "</a>";
                                    echo "
                                    </p>";
                                }
                            // end resource wrapper
                            echo "
                            </div>";
                        // end resource
                        echo"
                        </div>";
                        }

                    // end bar main container wrapper
                    echo "
                    </div>";

                // end collapse
                echo"
                </div>";

        // end accordion wrapper
        echo "
            </div>
        </div>
        ";

        // iterate counter
        $counter++;
    }
} else {
    // output if no skills
    echo "
        <div class='col-md-12 col-xs-12'>
            <div class='col-md-12 col-xs-12'>
                <div class='col-md-12 col-xs-12 padding-md center'>
                    <p class='text-muted no-margin margin-top-sm'>This user has not added any skills yet.</p>
                </div>
            </div>
        </div>
    ";
}
?>