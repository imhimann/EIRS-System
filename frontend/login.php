<section>
    <h2>Log In</h2>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username/E-mail">
        <br>
        <input type="password" name="pwd" placeholder="Password">
        <br>
        <button type="submit" name="submit">Log In</button>
    </form>

    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields.</p>";
        } 
        else if ($_GET["error"] == "falselogin") {
            echo "<p>False login information.</p>";
        } 
    }
    ?>
</section>