<?php

$error = '';
$success = '';

require ('../resources/modules/connect.php');
include ('../resources/modules/session.php');
include ('../resources/modules/functions.php');

if ($_POST) { include ('../resources/modules/pages/myprofile_.php'); }

//-----------------------------------------------------
// User profile (logged in)
//-----------------------------------------------------

// set page title and share link for template
$page_title = "My Profile";
$page_share = "https://www.doolio.co/$user_check";

// define looking for work
$looking_for_work = get_user_looking_for_work($user_id, $link);

// define order for skills
$skill_order = get_user_skill_order($user_id, $link);

// define theme
$theme = get_theme($user_id, $link);

?>

<?php include('../resources/templates/head.php'); ?>

<body id="profile">

<?php include('../resources/templates/navigation.php'); ?>

<div id="wrapper" style="overflow: hidden;">

<div id="content" class="bg-color bg-color-greyscale-light">

<!-- order by -->
<!-- <section class='no-padding'>
    <div class='container full-width'>
        <div class='row'>
            <div class='col-md-12 margin-top-md'>
                <h4 class='no-margin'>Order skills by</h4>
            </div>
            <div class="col-md-6 margin-top-sm">         
                <form id='orderBy' action='myprofile' method='post' class='navbar-form no-border no-padding no-margin'>
                    <ul class='no-float no-margin'>  
                        <div class="col-md-12 no-padding">
                            <div class="col-md-4 no-padding">
                                <li>
                                    <label class='no-margin'><?php
                                        if ($skill_order == "skill_date")
                                        { 
                                            echo "<input type='radio' name='order' value='0' checked>"; 
                                        } 
                                        else
                                        {
                                            echo "<input type='radio' name='order' value='0'>";
                                        }
                                        ?>
                                        <span class='vis-xs user'>Date</span>
                                    </label>
                                </li>
                            </div>
                            <div class="col-md-4 no-padding">
                                <li>
                                    <label class='no-margin'><?php
                                        if ($skill_order == "skill_level")
                                        {
                                            echo "<input type='radio' name='order' value='1' checked>"; 
                                        } 
                                        else
                                        { 
                                            echo "<input type='radio' name='order' value='1'>";
                                        }
                                        ?>
                                        <span class='vis-xs user'>Level</span>
                                    </label>
                                </li>
                            </div>
                            <div class="col-md-4 no-padding">
                                <li>
                                    <label class='no-margin'><?php
                                        if ($skill_order == "skill_type")
                                        {
                                            echo " <input type='radio' name='order' value='2' checked>";
                                        } 
                                        else
                                        {
                                            echo " <input type='radio' name='order' value='2'>";
                                        }
                                        ?>
                                        <span class='vis-xs user'>Type</span>
                                    </label>
                                </li>
                            </div>
                        </div>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</section> -->
<!-- ./ order by -->

<!-- modal for adding new skill -->
<div class='modal fade no-padding' id='modal-add-new-skill' tabindex='-1' role='dialog' aria-labelledby='modal-add-new-skill'>
    <div class='container modal-dialog' role='document'>
        <div class='row modal-content'>

            <button type='button' class='btn btn-primary btn-greyscale-base btn-round no-margin' data-dismiss='modal' style='position: absolute;top: -15px;right: -15px;font-size: 3.2rem; padding: 0;'><i class='fa fa-times'></i></button>

            <div class='col-md-12 modal-body'>

                <div class='col-md-12'>
                    <h2 class='no-margin-top'>Add new skill</h2>
                </div>

                <div class='col-md-12 no-padding margin-top-sm'>
                    <form id='add-new-skill' action='myprofile.php' method='post' class='register input-dark'>
                        
                        <!-- left column -->
                        <div class='col-md-6 padding-bottom-sm'>
                            <!-- skill name -->
                            <div class='col-md-12 no-padding margin-top-sm'>
                                <input id='skillName' name='skillName' type='text' maxlength='40'>
                                <label for='skillName'>Name (e.g. Java)</label>
                            </div>
                            <!-- skill type -->
                            <div class='col-md-12 no-padding margin-top-sm'>
                                <select id='skillType' name='skillType'>
                                    <!-- <option>Type</option> -->
                                    <option value='Other'>Other</option>
                                    <option value='Technology'>Technology</option>
                                    <option value='Business'>Business</option>
                                    <option value='Science'>Science</option>
                                    <option value='Creative'>Creative</option>
                                    <option value='Language'>Language</option>
                                </select>
                            </div>
                            <!-- skill level -->
                            <div class='col-md-12 no-padding margin-top-sm'>
                                <select id='skillLevel' name='skillLevel'>
                                    <option value='1'>Beginner</option>
                                    <option value='2'>Familiar</option>
                                    <option value='3'>Proficient</option>
                                    <option value='4'>Expert</option>
                                    <option value='5'>Master</option>
                                </select>
                            </div>
                        </div>

                        <!-- right column -->
                        <div class='col-md-6 padding-bottom-sm'>
                            <!-- header and info -->
                            <div class='col-md-12 no-padding margin-top-sm'>
                                <h4 class="no-margin">Link (optional)</h4>
                                <p class="no-margin padding-sm">
                                    A portfolio, publication, or other work using the skill.
                                </p>
                            </div>
                            <!-- skill link -->
                            <div class='col-md-12 no-padding margin-top-sm'>
                                <input id='skillLink' name='skillLink' type='text' maxlength='140'>
                                <label for='skillLink'>Link</label>
                            </div>

                        </div>

                        <!-- bottom column -->
                        <div class='col-md-12'>
                            <!-- header and info -->
                            <div class='col-md-12 no-padding margin-top-sm'>
                                <h4 class="no-margin">Learning resources (optional)</h4>
                                <p class="no-margin padding-sm">
                                    Resources used to learn the skill, e.g. textbooks, online courses, or tutorials.
                                </p>
                            </div>
                            <!-- resource link 1 -->
                            <div class='col-md-12 no-padding margin-top-sm'>
                                <input id='skillResource1' name='skillResource1' type='text' maxlength='140'>
                                <label for='skillResource1'>Learning resource</label>
                            </div>
                            <!-- resource link 2 -->
                            <div class='col-md-12 no-padding margin-top-sm'>
                                <input id='skillResource2' name='skillResource2' type='text' maxlength='140'>
                                <label for='skillResource2'>Learning resource</label>
                            </div>
                            <!-- resource link 3 -->
                            <div class='col-md-12 no-padding margin-top-sm'>
                                <input id='skillResource3' name='skillResource3' type='text' maxlength='140'>
                                <label for='skillResource3'>Learning resource</label>
                            </div>
                        </div>

                    </form>
                </div>

            </div>

            <div class='col-md-12 modal-footer'>

                <!-- buttons -->
                <div class='col-md-12 no-padding margin-top-md'>
                    
                    <!-- add -->
                    <div class='col-md-12'>
                        <button type='submit' class='btn btn-primary btn-greyscale-base btn-block no-margin' name='submitSkill' value='submit' form='add-new-skill'>Add</button>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<!-- add new skill -->
<section class='no-padding margin-top-md'>
    <div class='container full-width'>
        <div class='row'>
            <!-- buttons -->
            <div class='col-md-12 col-xs-12 no-padding'>
                <!-- add new skill -->
                <div class='col-md-10 col-sm-10 col-xs-12 skill-toggle'>
                    <button class='btn btn-primary btn-greyscale-base btn-block no-margin' data-toggle='modal' data-target='#modal-add-new-skill'><i class='fa fa-plus-circle'></i> Add new skill</button>
                </div>
                <!-- help button -->
                <div class='col-md-2 col-sm-2 col-xs-12 margin-top-md--xs help-toggle'>
                    <button id="help-toggle" class='btn btn-primary btn-greyscale-base btn-block no-margin' data-toggle='modal' data-target='#modal-help'><i class='fa fa-question'></i></button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php // error message
    if ($error != NULL) {
        echo "
        <div class='alert alert-danger no-border-radius no-margin' role='alert'>
            <div class='container full-width'>
                <div class='row'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close' style='right:0;top: -1px;'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    <p class='error no-margin'>$error</p>
                </div>
            </div>
        </div>
        ";
    }
?>

<?php // success message
    if ($success != NULL) {
        echo "
        <div id='toast-info' class='toast center'>
            <p class='no-margin'>$success</p>
        </div>
        <script>
            $(document).ready(function() {
                $('#toast-info').addClass('show');

                setTimeout(function(){
                    $('#toast-info').removeClass('show');
                }, 3000);
            });
        </script> 
        ";
    }
?>

<!-- display skills -->
<section id="skills" class='padding-md'>
    <div class='container full-width'>
        <div class='row no-margin'>
            <div class='col-md-12 col-xs-12 no-padding bg-color bg-color-white border-light no-border-radius'>

                <?php // include skills template
                include ('../resources/templates/display_my_skills.php'); ?>

            </div>
        </div>
    </div>
</section>

<?php include ('../resources/templates/pre_footer.php'); ?>

</div><!-- ./content -->

<!-- modal for help -->
<div class="modal fade no-padding" id="modal-help" tabindex="-1" role="dialog" aria-labelledby="modal-help">
    <div class='container modal-dialog' role='document'>
        <div class='row modal-content'>

            <button type='button' class='btn btn-primary btn-greyscale-base btn-round no-margin' data-dismiss='modal' style='position: absolute;top: -15px;right: -15px;font-size: 3.2rem; padding: 0;'><i class='fa fa-times'></i></button>

            <div class='col-md-12 modal-body'>

                <div class='col-md-12 no-padding'>
                    <h2 class='no-margin-top'>Beginner, Expert... or?</h2>

                    <p class="no-margin margin-top-sm">
                        Here's a reference guide for skill levels, it's best to pick a level based on recent work.
                    </p>

                    <div class="col-md-12 no-padding margin-top-md">
                        <div class="col-md-3 no-padding">
                            <h4 class="no-margin">Beginner</h4>
                        </div>
                        <div class="col-md-9 no-padding">
                            <p class="no-margin">You're just starting to explore a skill.</p>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding margin-top-md">
                        <div class="col-md-3 no-padding">
                            <h4 class="no-margin">Familiar</h4>
                        </div>
                        <div class="col-md-9 no-padding">
                            <p class="no-margin">You have basic knowledge of a skill, but plenty of room to learn more.</p>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding margin-top-md">
                        <div class="col-md-3 no-padding">
                            <h4 class="no-margin">Proficient</h4>
                        </div>
                        <div class="col-md-9 no-padding">
                            <p class="no-margin">You're comfortable using a skill in routine ways.</p>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding margin-top-md">
                        <div class="col-md-3 no-padding">
                            <h4 class="no-margin">Expert</h4>
                        </div>
                        <div class="col-md-9 no-padding">
                            <p class="no-margin">You're fluent in a skill and it's latest developments.</p>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding margin-top-md">
                        <div class="col-md-3 no-padding">
                            <h4 class="no-margin">Master</h4>
                        </div>
                        <div class="col-md-9 no-padding">
                            <p class="no-margin">You're a pro, and know a skill inside and out.</p>
                        </div>
                    </div>

                </div>

                <div class='col-md-12 no-padding margin-top-lg border-top-light'>
                    <h2 class='margin-top-lg'>Why include optional links?</h2>
                    <p class="no-margin margin-top-sm">
                        A portfolio, publication, or repository is a great way to prove your skills! Adding references to learning resources could help beginners with their learning, consider using an affiliate link or similar.
                    </p>
                </div>

                <div class='col-md-12 no-padding margin-top-lg border-top-light center'>
                    <div class='col-md-12 no-padding margin-top-md'>
                        <div class='col-md-6'>
                            <a href='mailto:support@doolio.co' class='btn btn-primary btn-greyscale-base btn-block no-margin margin-top-sm'><i class='fa fa-envelope'></i> Email</a>
                        </div>
                        <div class='col-md-6 margin-top-md--sm'>
                            <a href='https://twitter.com/0xSjoeberg' target='_blank' class='btn btn-primary btn-greyscale-base btn-block no-margin margin-top-sm'><i class='fa fa-twitter'></i> Tweet @me</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</div><!-- ./wrapper -->

<?php include ('../resources/templates/footer.php'); ?>

<?php // close connection
mysql_close($link); ?>
