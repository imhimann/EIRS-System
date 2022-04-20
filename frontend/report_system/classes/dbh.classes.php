<?php

class Dbh {
    // setup database connection
    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost;dbname=eirs', $username, $password);
            return $dbh;
        } 
        catch (PDOException $e) {
            print "Error!: ". $e->getMessage() . "<br/>";
            die();
        }
    }

} 