<?php

class ReportContr extends Report {

    private $incident;
    private $location;
    private $description;
    private $time;
    private $status;

    public function __construct($incident, $location, $description, $time, $status) {
        $this->incident = $incident;
        $this->location = $location;
        $this->description = $description;
        $this->time = $time;
        $this->status = $status;
    }

    public function submitReport() {
        if($this->emptyInput() !== false) {
            header("location: ../report.php?error=emptyinput");
            exit();
        }

        $this->setReport($this->incident, $this->location, $this->description, $this->time, $this->status);
    }
    
    
    private function emptyInput() {
        return (empty($this->incident) || empty($this->location) ||  empty($this->description));
    }
}