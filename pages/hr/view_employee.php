<?php
include('../../config/db_config.php');

if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];
    $query = "SELECT * FROM employees WHERE emp_id = $emp_id";
    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>Employee Details</h2>";
        echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
        echo "<p><strong>Designation:</strong> " . $row['designation'] . "</p>";
        echo "<p><strong>Department:</strong> " . $row['department'] . "</p>";
        echo "<p><strong>Contact:</strong> " . $row['contact'] . "</p>";
        echo "<p><strong>Status:</strong> " . ($row['status'] == 'Active' ? "<span style='color:green'>Active</span>" : "<span style='color:red'>Inactive</span>") . "</p>";
    } else {
        echo "No details found.";
    }
} else {
    echo "Invalid request.";
}
?>