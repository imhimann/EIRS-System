CREATE TABLE reports (
    report_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    report_incident TINYTEXT not null,
    report_location TINYTEXT not null,
    report_description TEXT not null,
    report_time TIMESTAMP not null,
    report_status TINYTEXT not null
);