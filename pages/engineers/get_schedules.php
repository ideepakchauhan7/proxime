<?php
include '../../config/db_config.php';

// Fetch schedules with engineer details
$query = "
    SELECT s.id, s.project_name, DATE_FORMAT(s.start_date, '%Y-%m-%d') as start_date, 
           DATE_FORMAT(s.end_date, '%Y-%m-%d') as end_date, s.status, e.name as engineer_name 
    FROM schedules s
    JOIN engineers e ON s.engineer_id = e.id
";

$result = mysqli_query($conn, $query);

$schedules = [];

while ($row = mysqli_fetch_assoc($result)) {
    $schedules[] = [
        'title' => $row['project_name'],
        'engineer' => $row['engineer_name'],
        'start' => $row['start_date'],
        'end'   => $row['end_date'],
        'status' => $row['status'],
        'color' => ($row['status'] == 'Completed') ? '#28a745' : 
                   (($row['status'] == 'In Progress') ? '#ffc107' : '#dc3545')
    ];
}

header('Content-Type: application/json');
echo json_encode($schedules);
?>