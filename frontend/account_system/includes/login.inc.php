<?php

if (isset($_POST["submit"])) {

    // Grabbing the data
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    //Instantiate SignupContr class
    require_once "../../dbh.php";
    require_once '../classes/login.classes.php';
    require_once '../classes/login-contr.classes.php';
    $login = new LoginContr($username, $pwd);

    // Running error handlers and user login
    $login->loginUser();

    // Going back to front page
    header("location: ../../homepage.php?login=success");
    exit();
}