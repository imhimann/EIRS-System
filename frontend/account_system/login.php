<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/accounts.css">
    <title>Login</title>
</head>
<body>


    <div class="wrapper">
    </div>

    <div class="container">
        <form action="includes/login.inc.php" method="post" id="login" class="form">
            <h1 class="form-title">Login</h1>
            <div class="form-message-error">Incorrect Username/Password</div>
            <div class="form-input-group">
                <input type="text" name="username" class="form-email" autofocus placeholder="Username or email">
                <div class="form-input-error"></div>
            </div>
            <div class="form-input-password">
                <input type="password" name="pwd" class="form-password" autofocus placeholder="Password">
                <div class="form-input-error"></div>
            </div>

            <button class="submit" type="submit" name="submit">Log In</button>

            <p class="form-text">
                <a href="signup.php" class="signup-link">Don't have an account? Create Account</a>
                <a href="#" class="password-forgot">Forgot your password?</a>
            </p>

        </form>

        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields.</p>";
            } 
            else if ($_GET["error"] == "falselogin") {
                echo "<p>Incorrect login information.</p>";
            } 
            else if ($_GET["error"] == "usernotfound") {
                echo "<p>User not found.</p>";
            }  
        }
        ?>

    </div>

    <script src="js/accounts.js"></script>


    <!-- <div class="wrapper">
        <section class="login">
            <h2>Log In</h2>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="username" placeholder="Username/E-mail">
                <br>
                <input type="password" name="pwd" placeholder="Password">
                <br>
                <button type="submit" name="submit">Log In</button>
            </form>
        </section> 
    </div> -->
</body>
</html>