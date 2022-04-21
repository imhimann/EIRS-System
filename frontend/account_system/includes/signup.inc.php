<?php

if (isset($_POST["submit"])) {

    // Grabbing the data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    //Instantiate SignupContr class
    require_once "../../dbh.php";
    require_once '../classes/signup.classes.php';
    require_once '../classes/signup-contr.classes.php';
    $signup = new SignupContr($username, $email, $pwd, $pwdRepeat);

    // Running error handlers and user signup
    $signup->signupUser();

    // Going to login page
    header("location: ../login.php?signup=success");
    exit();
}
