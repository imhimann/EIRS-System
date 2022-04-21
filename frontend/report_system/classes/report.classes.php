<?php

class Report extends Dbh {

    //create report
    protected function setReport($incident, $location, $description, $time, $status) {
        // prepare an sql statement to be queried
        $sql = "INSERT INTO reports (report_incident, report_location, report_description, 
        report_time, report_status) VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        
        // checks if the statement fails
        if(!$stmt->execute(array($incident, $location, $description, $time, $status))) {
            $stmt = null;
            header("location: ../report.php?error=stmtfailed");
            exit();
        }
    }

    protected function searchByActiveOrClosed($status) {
        $sql = "SELECT * FROM reports WHERE report_status = ?;";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($status))) {
            $stmt = null;
            header("location: ../report.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../report.php?error=notfound");
            exit();
        }
        
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC); // get result from sql query

    }

}