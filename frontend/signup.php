<?php
?>
    <section>
        <h2>Sign Up</h2>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full Name">
            <br>
            <input type="text" name="email" placeholder="E-mail">
            <br>
            <input type="text" name="username" placeholder="Username">
            <br>
            <input type="password" name="pwd" placeholder="Password">
            <br>
            <input type="password" name="pwdrepeat" placeholder="Repeat password">
            <br>
            <button type="submit" name="submit">Sign up</button>
        </form>

    </section>
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
                else if ($_GET["error"] == "useristaken") {
                    echo "<p>Username taken.</p>";
                } 
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again.</p>";
                } 
                else if ($_GET["error"] == "none") {
                    echo "<p>You have signed up!</p>";
                } 
            }
        ?>
