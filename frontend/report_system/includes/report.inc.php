<?php

if (isset($_POST["submit"])) {

    $incident = $_POST["incident"];
    $location = $_POST["location"];
    $description = $_POST["description"];
    $time = date("Y-m-d H:i:s");
    $status = "active";

    require_once '../classes/dbh.classes.php';
    require_once '../classes/report.classes.php';
    require_once '../classes/report-contr.classes.php';
    $report = new ReportContr($incident, $location, $description, $time, $status);

    $report->submitReport();

    header("location: ../report.php?error=none");
    exit();
}