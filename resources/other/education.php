<?php

$education_name         = $_POST["educationName"];      // new education name from form input
$education_type         = $_POST["educationType"];      // new education type from form input
$education_date         = $_POST["educationYear"];      // new education year from form input

$education_to_delete    = $_POST["deleteEducationId"];  // education to delete from delete button

//-----------------------------------------------------
// Add new education
//-----------------------------------------------------

$add_education = add_education($education_name, $education_type, $education_date, $user_id, $link);

if (($education_name != NULL || $education_date != NULL) && $add_education == false)
{
    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='#'>Need help?</a></strong>";
}

//-----------------------------------------------------
// Delete education
//-----------------------------------------------------

$delete_education = delete_education($education_to_delete, $user_id, $link);

if ($education_to_delete != NULL && $delete_education == false)
{
    $error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='#'>Need help?</a></strong>";
}
?>

<!-- add new education -->
<section class='no-padding margin-top-md padding-sm border-top-light'>
    <div class="panel-group no-margin" id="accordion-education" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default no-border-radius">

            <!-- button -->
            <a role="button" data-toggle="collapse" data-parent="#accordion-education" href="#collapseEducation" aria-expanded="false" aria-controls="collapseEducation">
                <div class="panel-heading no-border-radius" role="tab" id="headingTwo">
                    <h4 class="no-margin center">
                        <i id="new-education-icon" class='fa fa-plus-circle' aria-hidden='true'></i> Add education
                    </h4>
                </div>
            </a>

            <!-- content -->
            <div id="collapseEducation" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body no-padding no-margin no-border">
                    <div class='container full-width'>
                        <div class='row no-margin'>

                            <div class='col-md-12 no-padding'>
                                <form action='myprofile.php' method='post'>
                                    <div class='bar-main-container dark shadow-hover'>
                                        <div class='wrap'>

                                            <div class="col-md-12 no-padding">
                                                <!-- education name -->
                                                <div class="col-md-5 input-name">
                                                    <label>Degree/ Course</label>
                                                    <input type='text' id='educationName' name='educationName' size='100' maxlength='100' placeholder='Java for Beginners I' />
                                                </div>

                                                <!-- education institution -->
                                                <div class="col-md-4 input-type">
                                                    <label>Institution</label>
                                                    <input type='text' id='educationType' name='educationType' size='40' maxlength='40' placeholder='Georgia Institute of Technology' />
                                                </div>

                                                <!-- education level -->
                                                <div class="col-md-1 input-level">
                                                    <label>Year</label>
                                                    <input type='number' id='educationYear' name='educationYear' size='4' maxlength='4' placeholder='2014'/>
                                                </div>

                                                <!-- education button  -->
                                                <div class="col-md-2 input-button">
                                                    <button type='submit' class='btn btn-secondary no-border-radius btn-block' name='submitEducation' value='submit'/>Add</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div> <!-- end collapse-->
</section>

<!-- display education -->
<section class='no-padding padding-bottom-lg'>
    <div class='container full-width'>
        <div class='row'>
            <div class='col-md-12'>

                <?php // include education template
                include ('../resources/modules/education.php'); ?>

            </div>
        </div>
    </div>
</section>