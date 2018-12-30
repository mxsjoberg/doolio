<?php // resetpassword.php

require ('../resources/modules/connect.php');

$error = '';

if ($_POST) {
    include ('../resources/modules/pages/resetpassword_.php');
}

// define page title
$page_title = "Reset password";

?>

<?php include ('../resources/templates/head.php'); ?>

<body id="reset_password">

<div id="wrapper" class="no-margin">
    <div id="content">

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
                </script>";
            }
        ?>

        <!-- reset password -->
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
                        <!-- reset password form -->
                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                            <div class="col-xs-12 padding-sm">
                                <div class="col-xs-12">
                                    <!-- header -->
                                    <div class="col-xs-12 margin-top-sm">
                                        <div class="col-xs-12 border-bottom-light no-padding">
                                            <div class="col-md-8 col-xs-8 no-padding">
                                                <h2 style="margin: 0 0 17px 0;">Reset password</h2>
                                            </div>
                                            <div class="col-md-4 col-xs-4 no-padding right">
                                                <p style="margin: 12px 0 20px 0;">or <strong><a href="home">sign in</a></strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- form wrapper -->
                                    <div class="col-xs-12 no-padding margin-top-sm">
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
                                        <!-- form -->
                                        <form action="" method="post" class="register input-dark">
                                            <!-- email -->
                                            <div class="col-xs-12 col-md-12 padding-bottom-sm">
                                                <p class="no-margin margin-top-sm text-muted">Enter the email you signed up with.</p>
                                                <div class="col-xs-12 no-padding margin-top-sm">
                                                    <input id="email" name="email" type="email">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>  
                                            <!-- send button -->
                                            <div class="col-xs-12">
                                                <div class="col-xs-12 padding-md margin-top-sm border-top-light">
                                                    <div class="col-xs-12 col-sm-6 no-padding">
                                                        <button name="submit" type="submit" class="btn btn-primary btn-greyscale-base btn-block no-margin" style="font-size: 2rem;">Send</button>
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
