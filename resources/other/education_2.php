<?php // query and markup for education
$result = mysql_query("SELECT * FROM user_education WHERE user_id='$user_id'", $link);

if (mysql_num_rows($result) != 0)
{
    while ($row = mysql_fetch_row($result))
    {   
        $education_name = ucfirst($row[2]);
        $education_type = ucfirst($row[3]);
        $education_year = $row[4];
        $education_id   = $row[0];

        // output markup for education
        echo "
            <div class='bar-main-container education'> 
                <a href='#' data-toggle='modal' data-target='#modal-education-$education_id'>
                    <div class='wrap display'>

                        <div class='col-md-6 col-xs-12 input-name'>
                            <span>$education_name</span>
                        </div>

                        <div class='col-md-4 col-xs-10 input-level'>
                            <span>$education_type</span>
                        </div>

                        <div class='col-md-2 col-xs-2 input-level right'>
                            <span>$education_year</span>
                        </div>

                    </div>
                </a>
            </div>
        ";

        // output modal for editing education
        echo "
            <div class='modal fade no-padding' id='modal-education-$education_id' tabindex='-1' role='dialog' aria-labelledby='modal-education-$education_id'>
                <div class='container modal-dialog' role='document'>
                    <div class='row modal-content'>

                        <div class='col-md-12 modal-body'>
                            <div class='col-md-12'>
                                <h2 class='no-margin-top'>$education_name</h2>
                            </div>
                        </div>

                        <div class='col-md-12 modal-footer'>

                            <!-- buttons -->
                            <div class='col-md-12 no-padding margin-top-md'>

                                <!-- close -->
                                <div class='col-md-12'>
                                    <button type='button' class='btn btn-primary btn-greyscale-base btn-hover-greyscale-base shadow-hover btn-block no-border-radius' data-dismiss='modal'>Close</button>
                                </div>
                            </div>

                            <!-- delete -->
                            <div class='col-md-12 center border-top-light' style='padding-top: 40px;'>
                                <form id='delete_$education_id' action='myprofile.php' method='post'>
                                    <input type='hidden' id='deleteEducationId' name='deleteEducationId' value='$education_id'>
                                    <button type='submit' class='btn btn-primary btn-greyscale-light btn-hover-alert btn-round no-margin' value='submit' form='delete_$education_id'><i class='fa fa-trash'></i></button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        ";
    }
}
else 
{
    // output if no education
    echo "
        <div class='col-md-12 center'>
            <img src='_img/arrow-up.png' style='max-height: 60px;'>
            <p class='text-large margin-top-sm'>... and some education.</p>
        </div>
    ";
}
?>