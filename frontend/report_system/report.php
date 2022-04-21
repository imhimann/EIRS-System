<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="css/report.css">
</head>
<body>
    <div class="wrapper"></div>

    <div class="container">
        <form action="includes/report.inc.php" method="post">
            <h1 class="title">File a Report</h1>
            <div>
                <p>What was the incident?</p>
                <input type="text" name="incident" autofocus placeholder="Incident">
                <p>Where did the incident occur?</p>
                <input type="text" name="location" autofocus placeholder="Location">
                <input type="text" name="description" class="description" autofocus placeholder="Provide informative description of the incident">
            </div>
    
            <button class="submit" type="submit" name="submit">Submit</button>
        </form>
    </div>

    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields.</p>";
            } 
            else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wrong, try again.</p>";
            } 
            else if ($_GET["error"] == "none") {
                echo "<p>Report submitted!</p>";
            } 
        }
    ?>



</body>
</html>
<!--
    incident = input("Please input the type of incident: ")
    
    now = datetime.now()
    time = now.strftime("%d/%m/%Y %H:%M:%S") #dd/mm/yy H:M:S
    
    location = input("Please input location: ")
    
    description = input("Please enter description for the incident: ")
    
    status = "active"
    #account = 
    index = len(ReportList) - 1
    
    ReportList.append(Report(incident, time, location, description, status, index))
    return ReportList
-->