<?php // profile.php

require ('../resources/modules/connect.php');  
include ('../resources/modules/functions.php');

// get and define user id from username
$user_id = get_user_id($url_keyword, $link);

//-----------------------------------------------------
// User profile (logged out)
//-----------------------------------------------------

// redirect if user doesn't exist
if ($user_id == false) {
    // close connection
    mysql_close($link);

    // redirect to home
    header ("location: home");
} else {   
    // get user profile
    $user_details = get_user_details($user_id, $link);
    $first_name     = $user_details[0];
    $second_name    = $user_details[1];
    $location       = $user_details[2];
    $email          = $user_details[3];

    // define looking for work 
    $looking_for_work = get_user_looking_for_work($user_id, $link);

    // define order for skills
    $skill_order = get_user_skill_order($user_id, $link);

    // define theme
    $theme = get_theme($user_id, $link);

    if ($theme != "Dark") {
        // get smost common skill type
        $type = get_user_most_common_skill($user_id, $link);

        if ($type != false) {
            // get and define color
            $color = get_theme_skill_color($type);

            // define border
            $photo = "$color" . ".jpg";
        } else {
            $photo = "grey.jpg";
        }
    } else {
        $photo = "grey.jpg";
    }
}

// set page title and share link
$page_title = "$url_keyword";
$page_share = "https://www.doolio.co/$url_keyword";

// define location as google maps link if not NULL
if ($location != NULL) {   
    $location_link = "<a href='https://www.google.com/maps/?q=$location' target='_blank'><i class='fa fa-map-marker'></i> $location</a>";
} else {
    $location_link = "No location";
}
?>

<?php include('../resources/templates/head.php'); ?>

<body id="profile">

<?php include('../resources/templates/navigation.php'); ?>

<div id="wrapper" style="overflow: hidden;">
    <div id="content" class="bg-color bg-color-greyscale-light">

        <!-- user details -->
        <section class="no-padding">
            <div class="container full-width no-padding">
                <div class="row no-margin">
                    <div class='col-md-12 col-sm-12 padding-md' style='background-color: #f4f4f4'>
                        <div class='col-md-12 col-sm-12 no-padding'>
                            <!-- image -->
                            <div class='col-md-3 col-sm-3'>
                                <div class="col-md-12 margin-top-md center">
                                    <img src="_img/profile/<?php echo "$photo"; ?>" class="img-profile">
                                </div>
                            </div>
                            <!-- user details -->
                            <div class='col-md-9 col-sm-9 center-xs'>
                                <div class="col-md-12">
                                    <h1>
                                        <?php echo "$url_keyword"; ?> 
                                        <?php 
                                            if ($looking_for_work == 1) { 
                                                echo "
                                                <a href='#' data-toggle='modal' data-target='#modal-contact'><span class='badge'>CONTACT ME!</span></a>";
                                            }
                                        ?>
                                    </h1>
                                    <h4 class="margin-top-md"><?php echo "$first_name $second_name"; ?></h4>
                                    <h4><?php echo "$location_link"; ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- display skills -->
        <section id="skills" class='padding-md'>
            <div class='container full-width'>
                <div class='row no-margin'>
                    <div class='col-xs-12 col-md-12 no-padding bg-color bg-color-white border-light no-border-radius'>

                        <?php // include skills template
                        include ('../resources/templates/display_user_skills.php'); ?>

                    </div>
                </div>
            </div>
        </section>

        <?php 
            if ($looking_for_work == 1) {
                // output modal for contact
                echo "
                    <div class='modal fade no-padding' id='modal-contact' tabindex='-1' role='dialog' aria-labelledby='modal-contact'>
                        <div class='container modal-dialog' role='document'>
                            <div class='row modal-content'>
                                <button type='button' class='btn btn-primary btn-greyscale-base btn-hover-greyscale-base btn-round no-margin' data-dismiss='modal' style='position: absolute;top: -15px;right: -15px;font-size: 3.2rem; padding: 0;'><i class='fa fa-times'></i></button>
                                <div class='col-md-12 modal-body'>
                                    <div class='col-md-12 no-padding'><h2 class='no-margin-top'>Contact</h2></div>
                                    <div class='col-md-12 no-padding'>
                                        <form id='contact_user' action='contact' method='post' class='register not-dark input-dark'>
                                            <div class='col-md-12 no-padding'>
                                                <input type='hidden' id='userId' name='userId' value='$user_id'>
                                                <!-- name -->
                                                <div class='col-md-12 no-padding margin-top-sm'>
                                                    <input id='contactName' name='contactName' type='text' maxlength='40'>
                                                    <label for='contactName'>Your name</label>
                                                </div>
                                                <!-- email -->
                                                <div class='col-md-12 no-padding margin-top-sm'>
                                                    <input id='contactEmail' name='contactEmail' type='text' maxlength='40'>
                                                    <label for='contactEmail'>Your email</label>
                                                </div>
                                                <!-- occupation -->
                                                <div class='col-md-12 no-padding margin-top-sm'>
                                                    <select id='contactOccupation' name='contactOccupation'>
                                                        <option value='employer'>I'm an employer</option>
                                                        <option value='recruiter'>I'm a recruiter</option>
                                                        <option value='other'>I'm none of above</option>
                                                    </select>
                                                </div>
                                                <div class='col-md-12 no-padding margin-top-sm'>
                                                    <h5 class=''>Your message:</h5>
                                                </div>
                                                <!-- text -->
                                                <div class='col-md-12 no-padding'>
                                                    <textarea id='contactText' name='contactText' type='text' maxlength='140'></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class='col-md-12 modal-footer'>
                                    <!-- buttons -->
                                    <div class='col-md-12 no-padding margin-top-sm'>
                                        <!-- send -->
                                        <div class='col-md-12 no-padding margin-top-sm'>
                                            <button type='submit' class='btn btn-primary btn-greyscale-base btn-block no-margin' name='submitContact' value='submit' form='contact_user'>Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        ?>

        <?php include ('../resources/templates/pre_footer.php'); ?>

    </div><!-- ./content -->
</div><!-- wrapper -->

<?php include ('../resources/templates/footer.php'); ?>

<?php // close connection
mysql_close($link); ?>
