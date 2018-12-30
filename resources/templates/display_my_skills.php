<?php // display_my_skills.php

//  ----------------------------------------------------------------------------
//  Iterate and output skills for user. (Logged in)
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

        // define skill date, level, and type
        $skill_date             = date('d F, Y', strtotime($row[9]));
        $level                  = get_skill_level($skill_level);
        $skill_level_number     = $skill_level / 20;
        $type                   = $skill_type;

        // theme colors
        if ($theme == "Playful")  {
            $color = get_theme_skill_color($type);
        } elseif ($theme == "Dark") {
            $color = "dark";
        }

        // accordion wrapper
        echo "
        <div id='accordion-$skill_id' role='tablist'>
            <div id='heading-$skill_id' class='col-xs-12 col-md-12 no-padding' role='tab'>";

                // link wrapper
                if ($some_link) {
                    echo "
                    <a data-toggle='collapse' href='#collapse-$skill_id' aria-expanded='false' aria-controls='collapse-$skill_id'>";
                } else {
                    echo "
                    <a href='#'>";
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
                        <div class='col-xs-2 col-md-1 right'>
                            <a href='#' class='btn btn-secondary btn-no-bg no-border no-padding no-margin' data-toggle='modal' data-target='#modal-skills-$skill_id'><i class='fa fa-edit'></i></a>
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
                                };
                                if ($resource_link_2 != NULL) { 
                                    echo "
                                    <p class='no-margin'>
                                    <a href='"; echo "$resource_link_2"; echo "' target='_blank'>"; echo "$resource_link_2"; echo "</a>";
                                    echo "
                                    </p>";
                                };
                                if ($resource_link_3 != NULL) { 
                                    echo "
                                    <p class='no-margin'>
                                    <a href='"; echo "$resource_link_3"; echo "' target='_blank'>"; echo "$resource_link_3"; echo "</a>";
                                    echo "
                                    </p>";
                                };
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

        // output modal for editing skill
        echo "
        <div class='modal fade no-padding' id='modal-skills-$skill_id' tabindex='-1' role='dialog' aria-labelledby='modal-skills-$skill_id'>
            <div class='container modal-dialog' role='document'>
                <div class='row modal-content'>
                    <button type='button' class='btn btn-primary btn-greyscale-base btn-hover-greyscale-base btn-round no-margin' data-dismiss='modal' style='position: absolute;top: -15px;right: -15px;font-size: 3.2rem; padding: 0;'><i class='fa fa-times'></i></button>
                    <div class='col-md-12 modal-body'>
                        <div class='col-md-12 no-padding'><h2 class='no-margin-top'>Edit skill</h2></div>
                        <div class='col-md-12 no-padding'>
                            <form id='update_$skill_id' action='myprofile.php' method='post' class='register input-dark'>
                                <input type='hidden' id='updateSkillId' name='updateSkillId' value='$skill_id'>
                                <div class='col-md-12 no-padding'>
                                    <!-- skill name -->
                                    <div class='col-md-12 no-padding margin-top-sm'>
                                        <input id='updateSkillName' name='updateSkillName' type='text' maxlength='40'>
                                        <label for='updateSkillName'>$skill_name</label>
                                    </div>
                                    <!-- skill type -->
                                    <div class='col-md-12 no-padding margin-top-sm'>
                                        <select id='updateSkillType' name='updateSkillType'>
                                            <option value='Other'"; if ($skill_type == "Other") { echo"selected"; } echo ">Other</option>
                                            <option value='Technology'"; if ($skill_type == "Technology") { echo"selected"; } echo ">Technology</option>
                                            <option value='Business'"; if ($skill_type == "Business") { echo"selected"; } echo ">Business</option>
                                            <option value='Science'"; if ($skill_type == "Science") { echo"selected"; } echo ">Science</option>
                                            <option value='Creative'"; if ($skill_type == "Creative") { echo"selected"; } echo ">Creative</option>
                                            <option value='Language'"; if ($skill_type == "Language") { echo"selected"; } echo ">Language</option>
                                        </select>
                                    </div>
                                    <!-- skill level -->
                                    <div class='col-md-12 no-padding margin-top-sm'>
                                        <select id='updateSkillLevel' name='updateSkillLevel'>
                                            <option value='1'"; if ($skill_level == 20) { echo "selected"; } echo ">Beginner</option>
                                            <option value='2'"; if ($skill_level == 40) { echo "selected"; } echo ">Familiar</option>
                                            <option value='3'"; if ($skill_level == 60) { echo "selected"; } echo ">Proficient</option>
                                            <option value='4'"; if ($skill_level == 80) { echo "selected"; } echo ">Expert</option>
                                            <option value='4'"; if ($skill_level == 100) { echo "selected"; } echo ">Master</option>
                                        </select>
                                    </div>
                                    <div class='col-md-12 no-padding margin-top-md'>
                                        <h4 class='no-margin'>Link (optional)</h4>
                                        <p class='no-margin padding-sm'>
                                            SPACE to remove.
                                        </p>
                                    </div>
                                    <!-- skill link -->
                                    <div class='col-md-12 no-padding margin-top-sm'>
                                        <input id='updateSkillLink' name='updateSkillLink' type='text' maxlength='140'>
                                        <label for='updateSkillLink'>"; if ($skill_link == '' || $skill_link == ' ') { echo "Add a link"; } else { echo "$skill_link"; } echo "</label>
                                    </div>
                                    <div class='col-md-12 no-padding margin-top-md'>
                                        <h4 class='no-margin'>Learning resources (optional)</h4>
                                        <p class='no-margin padding-sm'>
                                            SPACE to remove.
                                        </p>
                                    </div>
                                    <!-- resource link 1 -->
                                    <div class='col-md-12 no-padding margin-top-sm'>
                                        <input id='updateSkillResource1' name='updateSkillResource1' type='text' maxlength='140'>
                                        <label for='updateSkillResource1'>"; if ($resource_link_1 == '' || $resource_link_1 == ' ') { echo "Add a Resource"; } else { echo "$resource_link_1"; } echo "</label>
                                    </div>
                                    <!-- resource link 2 -->
                                    <div class='col-md-12 no-padding margin-top-sm'>
                                        <input id='updateSkillResource2' name='updateSkillResource2' type='text' maxlength='140'>
                                        <label for='updateSkillResource2'>"; if ($resource_link_2 == '' || $resource_link_2 == ' ') { echo "Add a resource"; } else { echo "$resource_link_2"; } echo "</label>
                                    </div>
                                    <!-- resource link 3 -->
                                    <div class='col-md-12 no-padding margin-top-sm'>
                                        <input id='updateSkillResource3' name='updateSkillResource3' type='text' maxlength='140'>
                                        <label for='updateSkillResource3'>"; if ($resource_link_3 == '' || $resource_link_3 == ' ') { echo "Add a resource"; } else { echo "$resource_link_3"; } echo "</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class='col-md-12 modal-footer'>
                        <!-- buttons -->
                        <div class='col-md-12 no-padding margin-top-sm'>
                            <!-- delete -->
                            <div class='col-md-3 no-padding margin-top-sm'>
                                <form id='delete_$skill_id' action='myprofile.php' method='post'>
                                    <input type='hidden' id='deleteSkillId' name='deleteSkillId' value='$skill_id'>
                                    <button type='submit' class='btn btn-secondary btn-alert btn-block no-margin' form='delete_$skill_id'><i class='fa fa-trash'></i></button>
                                </form>
                            </div>
                            <!-- update -->
                            <div class='col-md-8 col-md-offset-1 no-padding margin-top-sm'>
                                <button type='submit' class='btn btn-primary btn-greyscale-base btn-block no-margin' name='updateSkill' value='submit' form='update_$skill_id'>Update</button>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <p class='text-muted no-margin margin-top-sm'>You have not added any skills yet.</p>
                </div>
            </div>
        </div>
    ";
}

?>