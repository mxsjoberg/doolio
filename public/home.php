<?php

// variable to store error messages
$error = '';

// includes
require ('../resources/modules/connect.php');
include ('../resources/modules/pages/login_.php');

// define page title
$page_title = "Sign in";

// redirect if active session
if (isset($_SESSION['login_user']))
{
    header("location: myprofile");
}
?>

<?php include ('../resources/templates/head.php'); ?>

<body id="home">

<div id="wrapper">

<div id="content">

<!-- Login or Register -->
<section>
    <div class="container no-padding">
        <div class="row">

            <!-- brand -->
            <div class="col-xs-12">
                <div class="col-xs-12">
                    <div class="col-xs-12 padding-sm--xs splash-brand center">
                        <a href="home"><img class="no-padding no-margin" src="../_img/logo-color.png"></a>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 margin-top-xl">

                <!-- notice -->
                <!-- <div class="col-xs-12 col-md-6 no-padding">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <div class="col-xs-12 col-md-12 no-padding bg-color bg-color-white border-light no-border-radius" style="border: 1px solid #e4e4e4;">
                                <div class="col-xs-12 col-md-12 border-bottom-light">
                                    <div class="col-xs-12 col-md-12 padding-sm">
                                        <h4 class="no-margin">Notice – May 5, 2018</h4>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <div class="col-xs-12 col-md-12 padding-sm">
                                        <div class="col-xs-12 no-padding">
                                            <p class="no-margin">Update on GDPR: We're sorry, but EU countries will be blocked from visiting this website from May 25, 2018.</p>
                                        </div>
                                        <div class="col-xs-12 no-padding margin-top-md">
                                            <p class="no-margin">To everyone else, thanks for testing!</p>
                                            <p class="no-margin">Michael</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                        
                <!-- sign in -->
                <div class="col-md-6 col-md-offset-3 col-xs-12 margin-top-md--sm">
                    <div class="col-xs-12">

                        <!-- header -->
                        <div class="col-xs-12 no-padding border-bottom-light">
                            <div class="col-md-4 col-xs-4 no-padding">
                                <h2 class="no-margin">Sign in</h2>
                            </div>
                            <div class="col-md-8 col-xs-8 no-padding right">
                                <p style="margin: 12px 0 20px 0;">or <strong><a href="register">create account</a></strong></p>
                            </div>
                        </div>

                        <div class="col-xs-12 no-padding margin-top-sm">

                            <?php // error message
                                if ($error != NULL)
                                { 
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

                            <form action="" method="post" class="register input-dark">
                                <div class="col-xs-12 no-padding">
                                    <input id="username" name="username" type="text">
                                    <label for="username">Username</label>
                                </div>
                                <div class="col-xs-12 no-padding margin-top-sm">
                                    <input id="password" name="password" type="password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-xs-12 padding-sm margin-top-sm border-top-light">
                                    <div class="col-xs-12 col-sm-6 sign-in-form-link no-padding">
                                        <a href="resetpassword">Forgot your password?</a>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 no-padding right">
                                        <button name="submit" type="submit" class="btn btn-primary btn-greyscale-base btn-block no-margin" style="font-size: 2rem;">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Technology -->
<section class="bg-color bg-color-red margin-left-right-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 no-padding">

                <!-- text -->
                <div class="col-md-12 col-xs-12 padding-md no-padding-top">
                    <div class="col-xs-12">
                        <div class="col-xs-12 center">
                            <img src="../_img/profile/red.jpg" style="max-height: 120px;">
                            <div class="no-padding">
                                 <p class="text-large center">public static void main(String[] args) </p>
                                 <p class="center">Add your <strong>Technology</strong> skills and get hired!</p>
                            </div>

                            <!-- java -->
                            <div class="padding-top-sm margin-top-md">
                                <div class='bar-main-container white simple'>
                                    <!-- skill name -->
                                    <div class='col-xs-12 col-md-2 input-name left'>
                                        <span>Java</span>
                                    </div>
                                    <!-- skill bar -->
                                    <div class='col-xs-10 col-md-9 input-level'>
                                        <div class='col-xs-12 no-padding'>
                                            <div class='bar-container'>
                                                <div class='bar red' data-percentage='50'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buttons -->
                                    <div class='col-xs-2 col-md-1 right padding-top-xs--xs'>
                                        <a href='#' class='btn btn-secondary btn-no-bg btn-greyscale-light btn-hover-greyscale-light no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ java -->

                            <!-- python -->
                            <div class="padding-top-sm">
                                <div class='bar-main-container white simple'>
                                    <!-- skill name -->
                                    <div class='col-xs-12 col-md-2 input-name left'>
                                        <span>Python</span>
                                    </div>
                                    <!-- skill bar -->
                                    <div class='col-xs-10 col-md-9 input-level'>
                                        <div class='col-xs-12 no-padding'>
                                            <div class='bar-container'>
                                                <div class='bar red' data-percentage='75'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buttons -->
                                    <div class='col-xs-2 col-md-1 right padding-top-xs--xs'>
                                        <a href='#' class='btn btn-secondary btn-no-bg btn-greyscale-light btn-hover-greyscale-light no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ python -->

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Business -->
<section class="bg-color bg-color-azure margin-top-md margin-left-right-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 no-padding">

                <!-- text -->
                <div class="col-md-12 col-xs-12 padding-md no-padding-top">
                    <div class="col-xs-12">
                        <div class="col-xs-12 center">
                            <img src="../_img/profile/azure.jpg" style="max-height: 120px;">
                            <div class="no-padding">
                                 <p class="text-large center">A business that makes nothing but money is a poor business. - Henry Ford</p>
                                 <p class="center">Add your <strong>Business</strong> skills and find new opportunities!</p>
                            </div>

                            <!-- excel -->
                            <div class="padding-top-sm margin-top-md">
                                <div class='bar-main-container white simple'>
                                    <!-- skill name -->
                                    <div class='col-xs-12 col-md-2 input-name left'>
                                        <span>MS Excel</span>
                                    </div>
                                    <!-- skill bar -->
                                    <div class='col-xs-10 col-md-9 input-level'>
                                        <div class='col-xs-12 no-padding'>
                                            <div class='bar-container'>
                                                <div class='bar azure' data-percentage='25'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buttons -->
                                    <div class='col-xs-2 col-md-1 right padding-top-xs--xs'>
                                        <a href='#' class='btn btn-secondary btn-no-bg btn-greyscale-light btn-hover-greyscale-light no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ excel -->

                            <!-- accounting -->
                            <div class="padding-top-sm">
                                <div class='bar-main-container white simple'>
                                    <!-- skill name -->
                                    <div class='col-xs-12 col-md-2 input-name left'>
                                        <span>Accounting</span>
                                    </div>
                                    <!-- skill bar -->
                                    <div class='col-xs-8 col-md-9 input-level'>
                                        <div class='col-xs-12 no-padding'>
                                            <div class='bar-container'>
                                                <div class='bar azure' data-percentage='50'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buttons -->
                                    <div class='col-xs-2 col-md-1 right padding-top-xs--xs'>
                                        <a href='#' class='btn btn-secondary btn-no-bg btn-greyscale-light btn-hover-greyscale-light no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                                    </div>    
                                </div>
                            </div>
                            <!-- ./ accounting -->

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Science -->
<section class="bg-color bg-color-violet margin-top-md margin-left-right-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 no-padding">

                <!-- text -->
                <div class="col-md-12 col-xs-12 padding-md no-padding-top">
                    <div class="col-xs-12">
                        <div class="col-xs-12 center">
                            <img src="../_img/profile/violet.jpg" style="max-height: 120px;">
                            <div class="no-padding">
                                 <p class="text-large center">If you're not part of the solution, then you're part of the precipitate.</p>
                                 <p class="center">Add your <strong>Science</strong> skills and help others!</p>
                            </div>

                            <!-- linear algebra -->
                            <div class="padding-top-sm margin-top-md">
                                <div class='bar-main-container white simple'>
                                    <!-- skill name -->
                                    <div class='col-xs-12 col-md-2 input-name left'>
                                        <span>Linear Algebra</span>
                                    </div>
                                    <!-- skill bar -->
                                    <div class='col-xs-10 col-md-9 input-level'>
                                        <div class='col-xs-12 no-padding'>
                                            <div class='bar-container'>
                                                <div class='bar violet' data-percentage='75'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buttons -->
                                    <div class='col-xs-2 col-md-1 right padding-top-xs--xs'>
                                        <a href='#' class='btn btn-secondary btn-no-bg btn-greyscale-light btn-hover-greyscale-light no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ linear algebra -->

                            <!-- physics -->
                            <div class="padding-top-sm">
                                <div class='bar-main-container white simple'>
                                    <!-- skill name -->
                                    <div class='col-xs-12 col-md-2 input-name left'>
                                        <span>Physics</span>
                                    </div>
                                    <!-- skill bar -->
                                    <div class='col-xs-10 col-md-9 input-level'>
                                        <div class='col-xs-12 no-padding'>
                                            <div class='bar-container'>
                                                <div class='bar violet' data-percentage='50'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buttons -->
                                    <div class='col-xs-2 col-md-1 right padding-top-xs--xs'>
                                        <a href='#' class='btn btn-secondary btn-no-bg btn-greyscale-light btn-hover-greyscale-light no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ physics -->

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Creative -->
<section class="bg-color bg-color-yellow margin-top-md margin-left-right-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 no-padding">

                <!-- text -->
                <div class="col-md-12 col-xs-12 padding-md no-padding-top">
                    <div class="col-xs-12">
                        <div class="col-xs-12 center">
                            <img src="../_img/profile/yellow.jpg" style="max-height: 120px;">
                            <div class="no-padding">
                                 <p class="text-large center">Painting is just another way of keeping a diary. - Pablo Picasso</p>
                                 <p class="center">Add your <strong>Creative</strong> skills and reach new fans!</p>
                            </div>

                            <!-- photoshop -->
                            <div class="padding-top-sm margin-top-md">
                                <div class='bar-main-container white simple'>
                                    <!-- skill name -->
                                    <div class='col-xs-12 col-md-2 input-name left'>
                                        <span>Photoshop</span>
                                    </div>
                                    <!-- skill bar -->
                                    <div class='col-xs-8 col-md-9 input-level'>
                                        <div class='col-xs-12 no-padding'>
                                            <div class='bar-container'>
                                                <div class='bar yellow' data-percentage='100'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buttons -->
                                    <div class='col-xs-2 col-md-1 right padding-top-xs--xs'>
                                        <a href='#' class='btn btn-secondary btn-no-bg btn-greyscale-light btn-hover-greyscale-light no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ photoshop -->

                            <!-- logic pro -->
                            <div class="padding-top-sm">
                                <div class='bar-main-container white simple'>
                                    <!-- skill name -->
                                    <div class='col-xs-12 col-md-2 input-name left'>
                                        <span>Logic Pro</span>
                                    </div>
                                    <!-- skill bar -->
                                    <div class='col-xs-10 col-md-9 input-level'>
                                        <div class='col-xs-12 no-padding'>
                                            <div class='bar-container'>
                                                <div class='bar yellow' data-percentage='50'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buttons -->
                                    <div class='col-xs-2 col-md-1 right padding-top-xs--xs'>
                                        <a href='#' class='btn btn-secondary btn-no-bg btn-greyscale-light btn-hover-greyscale-light no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                                    </div>                                    
                                </div>
                            </div>
                            <!-- ./ logic pro -->

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Language -->
<section class="bg-color bg-color-emerald margin-top-md margin-left-right-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 no-padding">

                <!-- text -->
                <div class="col-md-12 col-xs-12 padding-md no-padding-top">
                    <div class="col-xs-12">
                        <div class="col-xs-12 center">
                            <img src="../_img/profile/emerald.jpg" style="max-height: 120px;">
                            <div class="no-padding">
                                 <p class="text-large center">¿Cuántos lenguajes hablas tú?</p>
                                 <p class="center">Add your <strong>Language</strong> skills and inspire others!</p>
                            </div>

                            <!-- english -->
                            <div class="padding-top-sm margin-top-md">
                                <div class='bar-main-container white simple'>
                                    <!-- skill name -->
                                    <div class='col-xs-12 col-md-2 input-name left'>
                                        <span>English</span>
                                    </div>
                                    <!-- skill bar -->
                                    <div class='col-xs-10 col-md-9 input-level'>
                                        <div class='col-xs-12 no-padding'>
                                            <div class='bar-container'>
                                                <div class='bar emerald' data-percentage='75'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buttons -->
                                    <div class='col-xs-2 col-md-1 right padding-top-xs--xs'>
                                        <a href='#' class='btn btn-secondary btn-no-bg btn-greyscale-light btn-hover-greyscale-light no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ english -->

                            <!-- norwegian -->
                            <div class="padding-top-sm">
                                <div class='bar-main-container white simple'>
                                    <!-- skill name -->
                                    <div class='col-xs-12 col-md-2 input-name left'>
                                        <span>Norwegian</span>
                                    </div>
                                    <!-- skill bar -->
                                    <div class='col-xs-10 col-md-9 input-level'>
                                        <div class='col-xs-12 no-padding'>
                                            <div class='bar-container'>
                                                <div class='bar emerald' data-percentage='50'></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- buttons -->
                                    <div class='col-xs-2 col-md-1 right padding-top-xs--xs'>
                                        <a href='#' class='btn btn-secondary btn-no-bg btn-greyscale-light btn-hover-greyscale-light no-border no-padding no-margin'><i class='fa fa-user'></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- ./ norwegian -->

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<!-- Register -->
<section class="">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 padding-lg">

                <!-- explore button -->
                <div class="col-md-12 col-xs-12 no-padding">
                    <div class="col-xs-12">
                        <div class="col-xs-12">
                            <div class="no-padding">
                                <p class="text-large center">Ready to add your skills?</p>
                            </div>
                            <div class="col-md-8 col-md-offset-2 no-padding center">
                                <a href="register" class="btn btn-primary btn-greyscale-base no-margin" style="font-size: 2rem;">Create account</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<?php include ('../resources/templates/pre_footer.php'); ?>

</div>
</div><!-- ./wrapper -->

<?php include ('../resources/templates/footer.php'); ?>
