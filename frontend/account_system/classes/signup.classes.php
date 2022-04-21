<?php

class Signup extends Dbh {

    // create user
    protected function setUser($username, $email, $pwd) { 
        // prepare an sql statement to be queried
        $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        // checks if the statement fails
        if(!$stmt->execute(array($username, $email, $hashedPwd))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
    }

    
    protected function checkUser($username, $email) {
        $sql = "SELECT user_name FROM users WHERE user_name = ? OR user_email = ?;";
        $stmt = $this->connect()->prepare($sql);

        // check if the statement fails
        if(!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        // checks if the user is in the database
        return ($stmt->rowCount() > 0);
    }

}