<!-- personal details -->
<section class="no-padding padding-md">
    <div class="container">
        <div class="row">

            <!-- update personal details form -->
            <div class='col-md-8 col-md-offset-2 no-padding' style="padding: 40px;">
                <h2 class="padding-md">Personal details</h2>
                <form action="" method="post" class="register input-dark">
                        
                        <div class="col-md-12 no-padding">
                            <div class="col-md-6 col-padding-first">
                                <label>First name</label>
                                <input id="firstname" name="firstname" placeholder='<?php echo"$first_name"; ?>' type="text">
                            </div>
                            <div class="col-md-6 col-padding-last">
                                <label>Last name</label>
                                <input id="lastname" name="lastname" placeholder='<?php echo"$second_name"; ?>' type="text">
                            </div>
                        </div>

                        <div class="col-md-12 no-padding padding-sm">
                            <div class="col-md-6 col-padding-first">
                                <label>Country</label>
                                <input id="country" name="country" placeholder='<?php echo"$country"; ?>' type="text">
                            </div>
                            <div class="col-md-6 col-padding-last">
                                <label>Phone</label>
                                <input id="phone" name="phone" placeholder='<?php echo"$phone"; ?>' type="text">
                            </div>
                        </div>

                        <div class="col-md-12 no-padding">
                            <label>Website</label>
                            <input id="website" name="website" placeholder='<?php echo"$website"; ?>' type="text">
                        </div>

                        <div class="col-md-12 no-padding padding-sm">
                            <button name="submit" type="submit" class="btn btn-primary btn-greyscale-base btn-hover-greyscale-dark shadow-hover btn-block no-border-radius no-margin">Update</button>
                        </div>

                        <?php // error message
                            if ($error != NULL)
                            { 
                                echo "
                                    <div class='col-md-12 margin-top-md'>
                                        <p class='error-message center no-margin no-padding'>$error</p>
                                    </div>
                                ";
                            }
                        ?>

                </form>
            </div>

        </div>
    </div>
</section>

<!-- account details -->
<section class="no-padding padding-sm border-top-light">
    <div class="container">
        <div class="row">

            <!-- update account details form -->
            <div class='col-md-8 col-md-offset-2 no-padding' style="padding: 40px;">
                <h2 class="padding-md">Account details</h2>
                <form action="" method="post" class="register input-dark">
                        <div class="col-md-12 no-padding">
                            <div class="col-md-6 col-padding-first">
                                <label>Username</label>
                                <input id="username" name="username" placeholder='<?php echo"$user_check"; ?>' type="text">
                            </div>
                            <div class="col-md-6 col-padding-last">
                                <label>Email</label>
                                <input id="email" name="email" placeholder="<?php echo"$user_details_row[4]"; ?>" type="text">
                            </div>
                        </div>

                        <div class="col-md-12 no-padding padding-sm">
                            <div class="col-md-6 col-padding-first">
                                <label>New password</label>
                                <input id="newPassword" name="newPassword" placeholder='' type="password">
                            </div>
                            <div class="col-md-6 col-padding-last">
                                <label>Current password <a href ="#" data-toggle="modal" data-target="#modal-help" class="text-white"><i class="fa fa-question-circle"></i></a></label>
                                <input id="password" name="password" placeholder='' type="password">
                            </div>
                        </div>

                        <div class="col-md-12 no-padding">
                            <button name="submit" type="submit" class="btn btn-primary btn-greyscale-base btn-hover-greyscale-dark btn-block shadow-hover no-border-radius no-margin">Update</button>
                        </div>

                        <?php // error message
                            if ($error != NULL)
                            { 
                                echo "
                                    <div class='col-md-12 margin-top-md'>
                                        <p class='error-message center no-margin no-padding'>$error</p>
                                    </div>
                                ";
                            }
                        ?>

                </form>
            </div>

        </div>
    </div>
</section>

<!-- modal for help -->
<div class="modal fade no-padding" id="modal-help" tabindex="-1" role="dialog" aria-labelledby="modal-help">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <h4 class="no-margin-top">Forgot your password?</h4>
                <p>
                    Send an email to <a href="mailto:support@doolio.co">support@doolio.co</a>, the email should match the current email as registered with your account.
                </p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-hover-greyscale-dark btn-block no-border-radius no-margin" data-dismiss="modal">Got it!</button>
            </div>
        </div>
    </div>
</div>