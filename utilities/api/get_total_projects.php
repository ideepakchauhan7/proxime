<?php
include '../../config/db_config.php';

$sql = "SELECT COUNT(*) AS total_projects FROM projects";
$result = $conn->query($sql);

if ($result) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo json_encode(["error" => "Database query failed"]);
}

$conn->close();
exit;  // Prevent further execution
?>
