<?php

function emptyInputSignup($username, $email, $pwd, $pwdRepeat) {

    return (empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat));
}


function invalidUsername($username) {

    return (!preg_match("/^[a-zA-Z0-9]*$/", $username));
}


function invalidEmail($email) {

    return (!filter_var($email, FILTER_VALIDATE_EMAIL));
}


function mismatchedPassword($pwd, $pwdRepeat) {
    
    return ($pwd !== $pwdRepeat);
}


function usernameExists($conn, $username, $email) {

    $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $username, $email, $pwd) {

    $sql = "INSERT INTO users (usersName, usersEmail, usersPassword) VALUES (?, ?, ?);";
    // initialize a prepared statement 
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
}


function emptyInputLogin($username, $pwd) {
    
    return (empty($username) || empty($pwd));
}


function loginUser($conn, $username, $pwd) {
    $usernameExists = usernameExists($conn, $username, $username);

    if ($usernameExists === false) {
        header("location: ../signup.php?error=falselogin");
        exit();
    }

    $pwdHashed = $usernameExists["usersPassword"];
    $checkPassword = password_verify($pwd, $pwdHashed);

    if ($checkPassword === false) {
        header("location: ../signup.php?error=falselogin");
        exit();
    }

    session_start();
    $_SESSION["userId"] = $usernameExists["usersId"];
    $_SESSION["userUsername"] = $usernameExists["usersUsername"];
    header("location: ../index.php");
    exit();
}