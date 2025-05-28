<?php
require '../../../config/db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM review_reports WHERE id=$id";

    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: reports.php");
        exit();
    } else {
        echo "Error deleting record.";
    }
} else {
    echo "Invalid request.";
}
?>