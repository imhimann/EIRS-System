<?php

class SignupContr extends Signup {

    private $username;
    private $email;
    private $pwd;
    private $pwdRepeat;

    public function __construct($username, $email, $pwd, $pwdRepeat) {
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }

    public function signupUser() {
        if($this->emptyInput() !== false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        
        if($this->invalidUsername() !== false) {
            header("location: ../signup.php?error=invalidusername");
            exit();
        }

        if($this->invalidEmail() !== false) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }

        if($this->mismatchedPassword() !== false) {
            header("location: ../signup.php?error=mismatchedpassword");
            exit();
        }

        if($this->usernameExists() !== false) {
            header("location: ../signup.php?error=usernameistaken");
            exit();
        }

        $this->setUser($this->username, $this->email, $this->pwd);

    }

    
    // functions to check for errors when submitting the form

    private function emptyInput() {
        return (empty($this->username) || empty($this->email) ||  empty($this->pwd) || empty($this->pwdRepeat)); 
    }

    private function invalidUsername() {
        return (!preg_match("/^[a-zA-Z0-9]*$/", $this->username));
    }

    private function invalidEmail() {
        return (!filter_var($this->email, FILTER_VALIDATE_EMAIL));
    }

    private function mismatchedPassword() {
        return ($this->pwd !== $this->pwdRepeat);
    }

    private function usernameExists() {
        return ($this->checkUser($this->username, $this->email));
    }
}