<?php

class Login extends Dbh {

    protected function getUser($username, $pwd) {
        $sql = "SELECT user_password FROM users WHERE user_name = ? OR user_email = ?;";
        $stmt = $this->connect()->prepare($sql);
        
        // check if there are errors when executing the sql query
        if(!$stmt->execute(array($username, $username))) {
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        // check if the user exists. Otherwise exit.
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../login.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC); // get result from sql query
        $checkPwd = password_verify($pwd, $pwdHashed[0]["user_password"]); 
 
        // exit if the passwords don't match
        if($checkPwd == false) {
            $stmt = null;
            header("location: ../login.php?error=falselogin");
            exit();
        }

        $sql = "SELECT * FROM users WHERE user_name = ? OR user_email = ?";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($username, $username))) {
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        // check if the user exists. Otherwise exit.
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../login.php?error=usernotfound");
            exit();
        }
        
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC); // get result from sql query

        session_start();
        $_SESSION["userId"] = $user[0]["user_id"];
        $_SESSION["username"] = $user[0]["user_name"];

    }


}