<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BruEmergency</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

        <div class="wrapper">
            <?php
                include_once "header.php";
            ?>

            <section class="hero">
                <img class="background" src="" alt="">

                <div class="container">
                    
                    <div class="left-col">
                        <h1>BruEmergency</h1>
                        <p class="subhead">
                            Digitalizing emergencies and maintaining the safety of our nation with faster response and frequent updates. Together towards a safe nation.
                        </p>
                        
                        <div class="hero-cta">
                            <a href="report_system/report.php" class="primary-cta">REPORT</a>
                        </div>
                    </div>
                    <img class="emergency-icon" src="assets/61-618382_family-near-me-hour-er-care-for-emergency.png" alt="icon">
                </div>

            </section>
        </div>
        <section class="info-left">
            <div class="feature">
                <div class="content-1">
                    <p class="title"> Emergency Map</p>
                    <a href="EIRS_Map/index.html" class="map">Open Map</a>
                </div>
                <div class="content-2">
                    <p class="title-2">Quick Dial</p>
                    <a href="#" class="near-me">Open Phone</a>
                </div>
            </div>

        </section>

        <script>
            const menu = document.querySelector('.mobile-menu')
            const close = document.querySelector('.mobile-menu-exit')
            const nav = document.querySelector('nav')

            menu.addEventListener('click',() => {
                nav.classList.add('open-nav')
            })

            close.addEventListener('click',() => {
                nav.classList.remove('open-nav')
            })
        </script>


    </body>
</html>