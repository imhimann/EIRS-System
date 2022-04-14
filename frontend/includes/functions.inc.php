<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    
    $result = false;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    
    return $result;
    }
}

function invalidUsername($username) {

    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    
    return $result;
    }
}

function invalidEmail($email) {
    
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    
    return $result;
    }
}

function mismatchedPassword($pwd, $pwdRepeat) {
    
    $result = false;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    
    return $result;
    }
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

function createUser($conn, $name, $email, $username, $pwd) {

    $sql = "INSERT INTO users (usersName, usersEmail, usersUsername, usersPassword) VALUES (?, ?, ?, ?);";
    // initialize a prepared statement 
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd) {
    
    $result = false;
    if (empty($username) || empty($pwd)) {
        $result = true;
    
    return $result;
    }
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