<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BruEmergency</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<header>
    <div class="navbar">
                
        <div class="container">

            <img id="mobile-cta" class="mobile-menu" src="assets/menu-icon.svg" alt="Open Navigation">

            <nav>
                
                <img id="mobile-exit" class="mobile-menu-exit" src="assets/menu-exit.svg" alt="Close Navigation">

                <?php
                    if(isset($_SESSION["userId"])) 
                    {
                ?>
                    <ul class="primary-nav">
                        <li><a href="homepage.php">Home</a></li>
                        <li class="help"><a href="help.html">Help</a></li>
                        <li><a href="#"><?php echo $_SESSION["username"]; ?></a></li>
                        <li><a href="account_system/includes/logout.inc.php">Log Out</a></li> 
                        <li class="report-cta"><a href="report_system/report.php">Report</a></li>
                    </ul>
                <?php
                    }
                    else
                    {
                ?>
                    <ul class="primary-nav">
                        <li><a href="homepage.php">Home</a></li>
                        <li class="help"><a href="help.html">Help</a></li>
                        <li><a href="account_system/signup.php">Sign Up</a></li>
                        <li><a href="account_system/login.php">Log In</a></li>
                        <li class="report-cta"><a href="report_system/report.php">Report</a></li>
                    </ul>
                <?php
                    }
                ?>
            </nav>
        </div>
    </div>
</header>