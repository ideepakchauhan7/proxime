<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../../config/db_config.php';

header('Content-Type: application/json');

if (!$conn) {
    echo json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]);
    exit;
}

$sql = "SELECT total_revenue FROM revenue WHERE month_name = DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, '%b');";

$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit;
}

$row = $result->fetch_assoc();
$total_revenue = $row['total_revenue'] ?? 0;

echo json_encode([
    "status" => "success",
    "total_revenue" => $total_revenue
]);

$conn->close();
exit;
?>
