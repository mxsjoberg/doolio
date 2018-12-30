<?php // register.php

require ('../resources/modules/connect.php');
include ('../resources/modules/functions.php');

$error = '';

if ($_POST) {
    include ('../resources/modules/pages/register_.php');
}

//-----------------------------------------------------
// Register new account
//-----------------------------------------------------

// set page title for template
$page_title = "Create account";

// redirect if active session
if(isset($_SESSION['login_user'])) {
    header("location: myprofile");
}
?>

<?php include ('../resources/templates/head.php'); ?>

<body id="register">

<div id="wrapper" class="no-margin">
    <div id="content">

        <!-- register -->
        <section class="no-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12 no-padding">
                        <!-- brand -->
                        <div class="col-xs-12 margin-top-md">
                            <div class="col-xs-12">
                                <div class="col-xs-12 splash-brand center">
                                    <a href="home"><img class="padding-sm no-margin" src="../_img/logo-color.png" style="max-width:220px;"></a>
                                </div>
                            </div>
                        </div>
                        <!-- register form -->
                        <div class="col-md-12 col-xs-12">
                            <div class="col-xs-12 padding-sm">
                                <div class="col-xs-12">
                                    <!-- header -->
                                    <div class="col-xs-12 margin-top-sm">
                                        <div class="col-xs-12 border-bottom-light no-padding">
                                            <div class="col-md-8 col-xs-8 no-padding">
                                                <h2 style="margin: 0 0 17px 0;">Create account</h2>
                                            </div>
                                            <div class="col-md-4 col-xs-4 no-padding right">
                                                <p style="margin: 12px 0 20px 0;">or <strong><a href="home">sign in</a></strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- form -->
                                    <div class="col-xs-12 no-padding margin-top-sm">
                                        <?php // error message
                                            if ($error != NULL) { 
                                                echo "
                                                <div class='alert alert-danger alert-dismissible' role='alert'>
                                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                    <p class='error'>$error</p>
                                                </div>";
                                            }
                                        ?>
                                        <form id="form-register" action="register" method="post" class="register input-dark">
                                            <!-- left column -->
                                            <div class="col-xs-12 col-md-6 padding-bottom-sm">
                                                <!-- account details -->
                                                <p class="no-margin margin-top-sm text-muted">Enter a username (no spaces or special characters), a valid email address, and your country (optional).</p>
                                                <div class="col-xs-12 no-padding margin-top-sm">
                                                    <input id="username" name="username" type="text" pattern="^[a-zA-Z0-9]{3,16}$" required>
                                                    <label for="username">Username</label>
                                                </div>

                                                <div class="col-xs-12 no-padding margin-top-sm">
                                                    <input id="email" name="email" type="email" required>
                                                    <label for="email">Email</label>
                                                </div>

                                                <div class="col-xs-12 no-padding margin-top-sm">
                                                    <input id="country" name="country" type="text">
                                                    <label for="country">Country</label>
                                                </div>
                                            </div>
                                            <!-- right column -->
                                            <div class="col-xs-12 col-md-6 padding-bottom-sm">
                                                <!-- password -->
                                                <div class="col-xs-12 no-padding">
                                                    <p class="no-margin margin-top-sm text-muted">Enter a password, a strong password would include uppercase, lowercase, and numbers.</p>
                                                    <div class="col-xs-12 no-padding margin-top-sm">
                                                        <input id="password" name="password" type="password" required>
                                                        <label for="password">Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- save button -->
                                            <div class="col-xs-12">
                                                <div class="col-xs-12 border-top-light padding-md margin-top-sm">
                                                    <div class="col-xs-12 col-sm-6 no-padding sign-in-form-link">
                                                        <a href="mailto:support@doolio.co">Need help?</a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 no-padding">
                                                        <button name="submit" type="submit" class="btn btn-primary btn-greyscale-base btn-block no-margin" style="font-size: 2rem;">Next</button>
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
            </div>
        </section>

    </div><!-- ./content -->
</div><!-- ./wrapper -->

<?php include ('../resources/templates/footer.php'); ?>
