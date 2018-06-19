<?php

// define border based on theme
if ($theme == "Playful") {
    
    // get most common skill type
    $type = get_user_most_common_skill($user_id, $link);

    if ($type != false) {
        // get and define color
        $color = get_theme_skill_color($type);

        // define border
        $border = "$color";
    }
    else {
        $border = "dark";
    }
}
// otherwise use dark
elseif ($theme == "Dark") {

    // get and define color
    $color = "dark";

    // define border
    $border = "$color";
}

?>

<?php 
    
    if (stripos($_SERVER['REQUEST_URI'], 'explore')) {
        echo "<nav id='mainNav' class='navbar navbar-default navbar-fixed-top no-margin'>";
    }
    else {
        echo "<nav id='mainNav' class='navbar navbar-default navbar-default--$border navbar-fixed-top no-margin'>";
    }

?>
    
    <!-- top -->
    <div class='container full-width'>

        <div class='navbar-header'>
            <button type='button' class='navbar-toggle collapsed no-border no-border-radius' data-toggle='collapse' data-target='#main-navigation'>
                <span class='sr-only'>Toggle navigation</span>
                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
            </button>

            <a class='navbar-brand page-scroll' href='home'>
                <?php // theme logo
                    if ($theme == "Dark") {
                        echo "<img class='' src='../_img/logo-dark.png' style='max-height: 28px; display: inline-block;'>";
                    }
                    else {
                         echo "<img class='' src='../_img/logo-color.png' style='max-height: 28px; display: inline-block;'>";
                    }
                ?>
                <span class="beta-badge">BETA 0.5.0</span>
            </a>
        </div>

        <div class='collapse navbar-collapse no-padding' id='main-navigation'>
            <ul class='nav navbar-nav navbar-right no-margin'>
                <?php // check for active session
                if ($user_check != NULL)
                {      
                    // user
                    echo "<li><span class='vis-xs user'>Logged in as <strong>$user_check</strong></span></li>"; 

                    // profile
                    if (stripos($_SERVER['REQUEST_URI'], 'myprofile')) {
                        echo "<li><a class='page-scroll active' href='myprofile'><span class='vis-xs'><i class='fa fa-user invisible--xs' aria-hidden='true'></i> My Profile</span></a></li>";
                    }
                    else {
                        echo "<li><a href='myprofile'><span class='vis-xs'><i class='fa fa-user invisible--xs' aria-hidden='true'></i> My Profile</span></a></li>";
                    }

                    // preview
                    echo "<li><a class='page-scroll' href='$user_check'><span class='vis-xs'><i class='fa fa-eye invisible--xs' aria-hidden='true'></i> Preview</span></a></li>";

                    // settings
                    if (stripos($_SERVER['REQUEST_URI'], 'settings')) {
                        echo "<li><a class='active' href='settings'><span class='vis-xs'><i class='fa fa-cog invisible--xs' aria-hidden='true'></i> Settings</span></a></li>"; 
                    }
                    else {
                        echo "<li><a href='settings'><span class='vis-xs'><i class='fa fa-cog invisible--xs' aria-hidden='true'></i> Settings</span></a></li>"; 
                    }

                    // logout
                    echo "<li><a class='page-scroll' href='logout'><span class='vis-xs'><i class='fa fa-sign-out invisible--xs' aria-hidden='true'></i> Logout</span></a></li>";
                }
                else
                {   
                    if (isset($_SESSION['login_user'])) {
                        echo "
                        <li><a class='page-scroll' href='home'><i class='fa fa-user' aria-hidden='true'></i> My Profile</a></li>";
                    }
                    else {
                        echo "
                        <li><a class='page-scroll' href='home'><i class='fa fa-sign-in' aria-hidden='true'></i> Sign in</a></li>";
                    }
                }

                ?>
            </ul>
        </div>

    </div>

</nav>
