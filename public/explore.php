<?php // explore.php

require ('../resources/modules/connect.php');
include ('../resources/modules/functions.php');

$error = '';

// define page title
$page_title = "Explore";

// set default type and theme
$type = NULL;
$theme = "Playful";
if ($type != NULL) {
    // get and define color
    $color = get_theme_skill_color($type);
} else {
    // $color = "grey";
    $border = "dark";
}

?>

<?php include ('../resources/templates/head.php'); ?>

<body id='explore'>

<?php include('../resources/templates/navigation.php'); ?>

<div id="wrapper" style="overflow: hidden;">
    <div id="content" class="bg-color bg-color-greyscale-light">
        <!-- search bar -->
        <section class='padding-md bg-color bg-color-white border-bottom-light'>
            <div class='container full-width'>
                <div class='row'>
                    <div class="col-xs-12 col-md-12">
                        <form action="explore.php" method="post" class="register input-dark">
                            <div class="col-xs-12 col-md-12 no-padding">
                                <div class="col-xs-12 col-sm-8 no-padding">
                                    <input id="search" name="search" type="text">
                                    <label for="search">Search for a skill</label>
                                </div>
                                <div class="col-xs-12 col-sm-4 padding-sm--xs">
                                    <div class="col-xs-12 no-padding padding-left--xs right">
                                        <button name="submit" type="submit" class="btn btn-primary btn-greyscale-base btn-block no-margin no-border">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- display skills -->
        <section id="skills" class='padding-md'>
            <div class='container full-width'>
                <div class='row no-margin'>
                    <?php // if search
                        if ($_POST) { 
                            include ('../resources/modules/pages/explore_.php');
                        } else {
                            echo "
                            <div class='col-md-12 col-xs-12'>
                                <div class='col-md-12 col-xs-12'>
                                    <div class='col-md-12 col-xs-12 padding-md center'>
                                        <p class='text-muted no-margin margin-top-sm'>Search for a skill to show users.</p>
                                    </div>
                                </div>
                            </div>";
                        }
                    ?>
                </div>
            </div>
        </section>

        <?php include ('../resources/templates/pre_footer.php'); ?>

    </div><!-- ./content -->
</div><!-- ./wrapper -->

<?php include ('../resources/templates/footer.php'); ?>

<?php // close connection
mysql_close($link); ?>