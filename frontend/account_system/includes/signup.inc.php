<?php

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($username, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUsername($username) !== false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }
    if(invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(mismatchedPassword($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=mismatchedpassword");
        exit();
    }
    if(usernameExists($conn, $username, $email) !== false) {
        header("location: ../signup.php?error=usernameistaken");
        exit();
    }

    createUser($conn, $username, $email, $pwd);

} else {
    header("location: ../signup.php");
    exit();
}
