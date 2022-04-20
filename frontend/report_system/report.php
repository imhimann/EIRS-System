<div class="container">
    <form action="includes/report.inc.php" method="post">
        <h1 class="title">File a Report</h1>
        <div>
            <p>Incident</p>
            <input type="text" name="incident" autofocus placeholder="Incident">
            <p>Location</p>
            <input type="text" name="location" autofocus placeholder="Location">
            <p>Description</p>
            <input type="text" name="description" autofocus placeholder="Description">
        </div>

        <button class="submit" type="submit" name="submit">Submit</button>
    </form>
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

</div>