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

}