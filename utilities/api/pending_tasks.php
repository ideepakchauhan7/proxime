<?php
    include'../../config/db_config.php';

    if (!$conn) {
        die(json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]));
    }

// Query to count pending tasks
$sql = "SELECT COUNT(*) AS pendingCount FROM ongoing_project";
$result = $conn->query($sql);
if (!$result) {
    die(json_encode(["error" => "Query failed: " . $conn->error]));
}

// Fetch result
$row = $result->fetch_assoc();
$pendingTasks = $row ? $row["pendingCount"] : 0;

echo json_encode(["pendingTasks" => $pendingTasks]);

$conn->close();
?>
