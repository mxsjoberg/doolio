<?php // settings.php

//-----------------------------------------------------
// User settings (logged in)
//-----------------------------------------------------

require ('../resources/modules/connect.php');  
include ('../resources/modules/session.php');  
include ('../resources/modules/functions.php');

$error = '';
$success = '';

// set page title for template
$page_title = "Settings";

// define theme
$theme = get_theme($user_id, $link);

// get user details
$user_details = get_user_details($user_id, $link);
$first_name     = $user_details[0];
$second_name    = $user_details[1];
$country       	= $user_details[2];
$email          = $user_details[3];

if ($_POST) {
    include ('../resources/modules/pages/settings_.php');
}

?>

<?php include ('../resources/templates/head.php'); ?>

<body id="settings">

<?php // success message
    if ($success != NULL) {        
        echo "
        <div id='overlay'> 
		    <i class='fa fa-spinner fa-spin'></i>
		</div>
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

<?php include ('../resources/templates/navigation.php'); ?>

<div id="wrapper" style="overflow: hidden;">
    <div id="content" class="bg-color bg-color-greyscale-light">

        <!-- personal details -->
        <section class="padding-md">
            <div class="container full-width">
                <div class="row">
                	<div class="col-xs-12 col-md-12 no-padding">
                    	<div class="col-xs-12 col-md-12">
        			        <?php // error message
        			            if ($error != NULL) { 
        			                echo "
        			                    <div class='alert alert-danger alert-dismissible' role='alert'>
        			                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        			                            <span aria-hidden='true'>&times;</span>
        			                        </button>
        			                        <p class='error'>$error</p>
        			                    </div>  
        			                ";
        			            }
        			        ?>
        	        	</div>
        	        </div>
                    <!-- settings form -->
                    <form id="form-edit-account" action="settings.php" method="post" enctype="multipart/form-data" class="register input-dark">
        	            <div class="col-xs-12 col-md-12 no-padding">
        	                <div class="col-xs-12 col-md-12 no-padding">
        	                    <!-- form -->
        	                    <div id="form-wrapper" class="col-xs-12 col-md-12 no-padding">
        	                        <!-- account -->
        	                        <div class="col-xs-12 col-md-6">
        		                        <div class="col-xs-12 col-md-12 no-padding bg-color bg-color-white border-light no-border-radius">
        			                        <!-- header -->
        			                        <div class="col-xs-12 col-md-12 border-bottom-light">
        					                	<div class="col-xs-12 col-md-12 padding-sm">
        					                		<h4 class="no-margin">Account</h4>
        					                	</div>
        					                </div>
        				                    <!-- form inputs -->
        				                    <div class="col-xs-12 col-md-12">
        					                    <div class="col-xs-12 col-md-12 padding-md">
        					                        <div class="col-xs-12 col-md-12">
        					                        	<div class="col-xs-12 col-md-12 no-padding">
        					                        		<h5 class="no-margin">Username</h5>
        					                        	</div>
        					                        	<div class="col-xs-12 col-md-12 no-padding margin-top-sm">
        						                            <input id="username" name="username" type="text" pattern="^[a-zA-Z0-9]{3,16}$">
        						                            <label for="username"><?php echo "$user_check"; ?></label>
        						                        </div>
        					                        </div>
        					                        <div class="col-xs-12 col-md-12 margin-top-md">
        					                        	<div class="col-xs-12 col-md-12 no-padding">
        					                        		<h5 class="no-margin">Email</h5>
        					                        	</div>
        					                        	<div class="col-xs-12 col-md-12 no-padding margin-top-sm">
        						                            <input id="email" name="email" type="email">
        						                            <label for="email"><?php echo "$email"; ?></label>
        						                        </div>
        					                        </div>
        					                        <!-- forgot password -->
        					                        <div class="col-xs-12 col-md-12 margin-top-md">
        					                            <a type="button" href="#" class="btn btn-secondary btn-block no-margin margin-top-sm" data-toggle='modal' data-target='#modal-password'><i class='fa fa-lock'></i> Change Password</a>
        					                        </div>
        					                    </div>
        					                </div>
        				                </div>
        				            </div>
        			                <!-- personal details -->
        			                <div class="col-xs-12 col-md-6 margin-top-md--sm">
        			                	<div class="col-xs-12 col-md-12 no-padding bg-color bg-color-white border-light no-border-radius">
        			                    	<!-- header -->
        	                        		<div class="col-xs-12 col-md-12 border-bottom-light">
        			                        	<div class="col-xs-12 col-md-12 padding-sm">
        			                        		<h4 class="no-margin">Personal details</h4>
        			                        	</div>
        			                        </div>
        		                        	<!-- form inputs -->
        			                        <div class="col-xs-12 col-md-12">
        					                    <div class="col-xs-12 col-md-12 padding-md">
        				                            <div class="col-xs-12 col-md-12">
        				                            	<div class="col-xs-12 col-md-12 no-padding">
        				                            		<h5 class="no-margin">First name</h5>
        				                            	</div>
        				                            	<div class="col-xs-12 col-md-12 no-padding margin-top-sm">
        					                                <input id="firstName" name="firstName" type="text">
        					                                <label for="firstName"><?php echo "$first_name"; ?></label>
        					                            </div>
        				                            </div>
        				                            <div class="col-xs-12 col-md-12 margin-top-md">
        				                            	<div class="col-xs-12 col-md-12 no-padding">
        				                            		<h5 class="no-margin">Second name</h5>
        				                            	</div>
        				                            	<div class="col-xs-12 col-md-12 no-padding margin-top-sm">
        					                                <input id="secondName" name="secondName" type="text">
        					                                <label for="secondName"><?php echo "$second_name"; ?></label>
        					                            </div>
        				                            </div>
        				                            <div class="col-xs-12 col-md-12 margin-top-md">
        				                            	<div class="col-xs-12 col-md-12 no-padding">
        				                            		<h5 class="no-margin">Country</h5>
        				                            	</div>
        				                            	<div class="col-xs-12 col-md-12 no-padding margin-top-sm">
        					                                <input id="country" name="country" type="text">
        					                                <label for="country"><?php echo "$country"; ?></label>
        					                            </div>
        				                            </div>
        				                        </div>
        			                        </div>
        			                    </div>
        			                </div>
        			                <!-- buttons -->
        		                    <div class="col-xs-12 col-md-12 no-padding">
        		                        <div class="col-xs-12 col-md-12">
        		                            <!-- save -->
        		                            <div class="col-xs-12 col-md-3 col-md-offset-9 no-padding margin-top-md right">
        		                                <button type="submit" class="btn btn-primary btn-greyscale-base btn-block no-margin margin-top-sm" value="submitEditAccount" name="submitEditAccount" form="form-edit-account">Save</button>
        		                            </div>
        		                        </div>
        		                    </div>
        	                    </div>
        	                </div>
        	            </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- modal for password -->
        <div class="modal fade no-padding" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="modal-password">
            <div class='container modal-dialog' role='document'>
                <div class='row modal-content'>
                    <!-- close button -->
                    <button type='button' class='btn btn-primary btn-greyscale-base btn-round no-margin' data-dismiss='modal' style='position: absolute;top: -15px;right: -15px;font-size: 3.2rem; padding: 0;'><i class='fa fa-times'></i></button>
                    <!-- modal body -->
                    <div class='col-xs-12 col-md-12 modal-body'>
                        <div class='col-xs-12 col-md-12 no-padding'>
                            <div class="col-xs-12 col-md-12">
                                <h2 class='no-margin-top'>Change password</h2>
                                <p class="no-margin margin-top-sm text-muted">A strong password would include uppercase, lowercase, and numbers.</p>
                            </div>
                            <!-- form -->
                            <form id="form-edit-password" action="settings.php" method="post" class="register not-dark input-dark">
                            	<!-- new password -->
                            	<div class='col-xs-12 col-md-12 no-padding'>
        	                    	<div class="col-xs-12 col-md-6 margin-top-md">
        			                	<div class="col-xs-12 no-padding">
        			                		<h5 class="no-margin">New password</h5>
        			                	</div>
        			                	<div class="col-xs-12 no-padding margin-top-sm">
        				                    <input id="newPasswordFirst" name="newPasswordFirst" type="password">
        				                    <label for="newPasswordFirst">********</label>
        				                </div>
        			                </div>
        			                <div class="col-xs-12 col-md-6 margin-top-md">
        			                	<div class="col-xs-12 no-padding">
        			                		<h5 class="no-margin">New password again</h5>
        			                	</div>
        			                	<div class="col-xs-12 no-padding margin-top-sm">
        				                    <input id="newPasswordSecond" name="newPasswordSecond" type="password">
        				                    <label for="newPasswordSecond">********</</label>
        				                </div>
        			                </div>
        			            </div>
                                <!-- current pasword -->
        		                <div class='col-xs-12 col-md-12'>
                                    <div class="col-xs-12 col-md-12 no-padding margin-top-md border-top-light">
            		                	<p class="no-margin padding-md text-muted">Please enter your current password – <a href="resetpassword">Forgot password?</a></p>
            		                    <div class="col-xs-12 no-padding">
            			                	<div class="col-xs-12 no-padding">
            				                    <input id="password" name="password" type="password">
            				                    <label for="password">Password</label>
            				                </div>
            			                </div>
                                    </div>
        		                </div>
                            </form>
                        </div>
                    </div>
                    <!-- modal footer -->
                    <div class='col-md-12 col-xs-12 modal-footer'>
                        <!-- buttons -->
                        <div class='col-md-12 col-xs-12 no-padding margin-top-md'>
                            <!-- save -->
                            <div class='col-md-12 col-xs-12'>
                                <button type='submit' class='btn btn-primary btn-greyscale-base btn-block no-margin' name='submitNewPassword' value='submit' form='form-edit-password'>Change password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include ('../resources/templates/pre_footer.php'); ?>

    </div><!-- ./content -->
</div> <!-- ./wrapper -->

<?php include ('../resources/templates/footer.php'); ?>

<?php // close connection
mysql_close($link); ?>
