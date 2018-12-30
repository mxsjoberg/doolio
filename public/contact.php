<?php // contact.php

require ('../resources/modules/connect.php');  
include ('../resources/modules/functions.php');

$success = "";
$error = "";

// define page title
$page_title = "Contact user";

// if no user id, redirect to home
$user_id = $_POST["userId"];
if ($user_id == NULL) {
	header ('location: home');
}

//-----------------------------------------------------
// Contact user
//-----------------------------------------------------
if (!empty($_POST["submitContact"]) && empty($error)) {
	// regex for validation
	$regex_text = "/\b([a-zA-Z0-9]+){3,}\b/";
	$regex_email = "/\b[a-zA-Z0-9._%+-]+(@)[a-zA-Z0-9.-]+[a-zA-Z]{2,4}\b/";
	
	// define form inputs
	// $user_id             	  = $_POST["userId"];
	$contact_name             = $_POST["contactName"]; 
	$contact_email            = $_POST["contactEmail"]; 
	$contact_occupation       = $_POST["contactOccupation"];
	$contact_text 			  = $_POST["contactText"];

	$username = get_username($user_id, $link);

	// validate name, email, and text
	if (preg_match($regex_text, $contact_name) && preg_match($regex_email, $contact_email) && preg_match($regex_text, $contact_text)) {
		// get user email
	    $user_details = get_user_details($user_id, $link);
	    $user_email = $user_details[3];
	    $user_looking_for_work = get_user_looking_for_work($user_id, $link);

	    if ($user_email != false && $user_looking_for_work == 1) {
	    	// send email
			$to = "$user_email";
			$subject = "New contact request on doolio.co!";
			$txt = '<html><body>';
			$txt .= "
				<strong>Message from:</strong> $contact_name ($contact_email)</br>
				</br>
				<i>$contact_text</i></br>
			";
			$txt .= '</body></html>';
			$headers = "From: annie@doolio.co \r\n";
			$headers .= "Reply-To: $contact_email \r\n";
			$headers .= "MIME-Version: 1.0 \r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1 \r\n";

			mail($to, $subject, $txt, $headers);
		    $success = "<strong>Geronimo!</strong> Successfully sent message!";
	    } else {
			$error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	    }
	} else {
		$error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
	}
} else {
	$error = "<strong>Uh-oh!</strong> Something went wrong, please try again. <strong><a href='mailto:support@doolio.co'>Need help?</a></strong>";
}

?>

<?php include ('../resources/templates/head.php'); ?>

<body id="contact">

<div id="wrapper" class="no-margin">
    <div id="content">
        <section class="no-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 no-padding">
                        <!-- logo -->
                        <div class="col-xs-12 margin-top-md">
                            <div class="col-xs-12">
                                <div class="col-xs-12 splash-brand center">
                                    <a href="home"><img class="padding-sm no-margin" src="../_img/logo-color.png" style="max-width:220px;"></a>
                                </div>
                            </div>
                        </div>
                        <!-- text -->
                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                            <div class="col-xs-12 col-md-12 padding-sm">
                                <div class="col-xs-12 col-md-12">
        			                <?php // error title
                                    if ($error != NULL) { 
        			                	echo "
        			                	<div class='col-xs-12 col-md-12 margin-top-sm'>
                                            <div class='col-xs-12 border-bottom-light no-padding'>
            			                		<div class='col-xs-8 col-md-8 no-padding'>
            			                			<h2 class='no-margin'>Contact '$username'</h2>
            			                		</div>
            			                		<div class='col-xs-4 col-md-4 no-padding right'>
            	                                    <p style='margin: 12px 0 20px 0;''>or <strong><a href='$username'>go back</a></strong></p>
            	                                </div>
                                            </div>
        			                	</div>";
        			                } else if ($success != NULL) {
        			                	echo "
        			                	<div class='col-xs-12 col-md-12 margin-top-md'>
        			                		<div class='col-xs-12 col-md-12 no-padding center'>
        			                			<h2 style='margin:0;margin-bottom:17px;'>Contact request sent!</h2>
        			                		</div>
        			                	</div>";
        			                }
        			                ?>
                                    
                                    <div class="col-xs-12 col-md-12 padding-sm">
                                        <?php
                                        	// contact form
                                            if ($error != NULL) { 
                                                echo "
                                                <div class='col-xs-12 col-md-12'>
                                                    <div class='alert alert-danger alert-dismissible no-margin' role='alert'>
                                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                        <p class='error'>$error</p>
                                                    </div>
                                                </div>";
                                                echo "
        	                        			<div class='col-xs-12 col-md-12 padding-bottom-sm'>
        			                                <form id='contact_user' action='contact' method='post' class='register input-dark'>
        			                                    <div class='col-md-12 no-padding'>
        			                                        <input type='hidden' id='userId' name='userId' value='$user_id'>
        			                                        <!-- name -->
        			                                        <div class='col-xs-12 col-md-12 no-padding margin-top-sm'>
        			                                            <input id='contactName' name='contactName' type='text' maxlength='40'>
        			                                            <label for='contactName'>Your name</label>
        			                                        </div>
        			                                        <!-- email -->
        			                                        <div class='col-xs-12 col-md-12 no-padding margin-top-sm'>
        			                                            <input id='contactEmail' name='contactEmail' type='text' maxlength='40'>
        			                                            <label for='contactEmail'>Your email</label>
        			                                        </div>
        			                                        <!-- occupation -->
        			                                        <div class='col-xs-12 col-md-12 no-padding margin-top-sm'>
        			                                            <select id='contactOccupation' name='contactOccupation'>
        			                                                <option value='employer'>I'm an employer</option>
        			                                                <option value='recruiter'>I'm a recruiter</option>
        			                                                <option value='other'>I'm none of above</option>
        			                                            </select>
        			                                        </div>
        			                                        <div class='col-xs-12 col-md-12 no-padding margin-top-sm'>
        			                                            <h5 class=''>Your message:</h5>
        			                                        </div>
        			                                        <!-- text -->
        			                                        <div class='col-xs-12 col-md-12 no-padding'>
        			                                            <textarea id='contactText' name='contactText' type='text' maxlength='140'></textarea>
        			                                        </div>
        			                                    </div>
        			                                </form>
        			                            </div>
        			                            <!-- buttons -->
                                                <div class='col-xs-12 col-md-12'>
                                                    <div class='col-xs-12 col-md-12 padding-md margin-top-sm border-top-light'>
            			                                <div class='col-xs-12 col-md-12 no-padding'>
            			                                    <button type='submit' class='btn btn-primary btn-greyscale-base btn-block no-margin' name='submitContact' value='submit' form='contact_user'>Send</button>
            			                                </div>
                                                    </div>
        			                            </div>";
                                            } else {	
        								        // close connection
        									    mysql_close($link);
        								    }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- ./content -->
</div><!-- ./wrapper -->

<?php include ('../resources/templates/footer.php'); ?>