<?php
include('../../config/db_config.php');

if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    $deleteQuery = "DELETE FROM employees WHERE emp_id = $emp_id";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Employee deleted successfully!'); window.location='employee_info.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}
?>