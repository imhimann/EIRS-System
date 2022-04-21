<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/accounts.css">
</head>
<body>
    
    <div class="wrapper"></div>
    
    <div class="container">
        <form action="includes/signup.inc.php" method="post">
            <h1 class="title">Create an Account</h1>
            <div class="form-input-group">
                <p>Username</p>
                <input type="username" name="username" class="form-name" autofocus placeholder="Username">
                <p>Email</p>
                <input type="email" name="email" class="form-email" autofocus placeholder="Email">
                <div class="form-input-error"></div>
            </div>
            <div class="form-input-password">
                <p>Password</p>
                <input type="password" name="pwd" class="form-password" autofocus placeholder="Password">
                <p>Repeat Password</p>
                <input type="password" name="pwdRepeat" class="form-rptpassword" autofocus placeholder="Repeat Password">
                <div class="form-input-error"></div>
            </div>

            <button class="submit" type="submit" name="submit">Sign Up</button>

        </form>

        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields.</p>";
                } 
                else if ($_GET["error"] == "invalidusername") {
                    echo "<p>Pick a proper username.</p>";
                } 
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Pick a proper email.</p>";
                } 
                else if ($_GET["error"] == "mismatchedpassword") {
                    echo "<p>Passwords don't match.</p>";
                } 
                else if ($_GET["error"] == "usernameistaken") {
                    echo "<p>Username taken.</p>";
                } 
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again.</p>";
                } 
            }
        ?>

    </div>
</body>
</html>
