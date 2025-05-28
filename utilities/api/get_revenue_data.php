<?php
header('Content-Type: application/json');
include '../../config/db_config.php';

// Mapping month names to array indexes
$monthMapping = [
    "Jan" => 0, "Feb" => 1, "Mar" => 2, "Apr" => 3,
    "May" => 4, "Jun" => 5, "Jul" => 6, "Aug" => 7,
    "Sep" => 8, "Oct" => 9, "Nov" => 10, "Dec" => 11
];

// SQL Query to fetch all available revenues
$sql = "SELECT month_name, total_revenue FROM revenue";
$result = $conn->query($sql);

// ✅ Check if SQL execution failed
if (!$result) {
    die(json_encode(["error" => "SQL Error: " . $conn->error]));
}

// Initialize an array with 12 months, default value = 0
$revenues = array_fill(0, 12, 0);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $month = trim($row['month_name']); // Trim to remove accidental spaces
        if (isset($monthMapping[$month])) { // Ensure valid month names
            $revenues[$monthMapping[$month]] = (float)$row['total_revenue'];
        }
    }
}

// Send JSON response
echo json_encode(["revenue" => $revenues]);

$conn->close();
?>
