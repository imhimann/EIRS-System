<?php

class LoginContr extends Login {

    private $username;
    private $pwd;

    public function __construct($username, $pwd) {
        $this->username = $username;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        if($this->emptyInput() !== false) {
            header("location: ../login.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->username, $this->pwd);

    }

    private function emptyInput() {
        return (empty($this->username) || empty($this->pwd)); 
    }
}