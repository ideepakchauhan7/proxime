<?php
// Include database connection
include '../../config/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $project_name = $_POST['project_name']; // Match with form input
    $total_budget = $_POST['budget_amount']; 
    $spent = $_POST['spent_amount'];

    // Prepare SQL query
    $sql = "INSERT INTO budgets (project_name, total_budget, spent) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if prepare() was successful
    if (!$stmt) {
        die("Error in SQL: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sdd", $project_name, $total_budget, $spent);

    // Execute query
    if ($stmt->execute()) {
        echo "Budget added successfully!";
    } else {
        echo "Execution failed: " . $stmt->error;
    }

    // Close statement & connection
    $stmt->close();
    $conn->close();
}
?>