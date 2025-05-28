<?php
include '../../config/db_config.php';

// Insert supplier into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $company = $_POST['company'];
    $contact = $_POST['contact'];
    $material_type = $_POST['material_type'];
    $location = $_POST['location'];

    $sql = "INSERT INTO suppliers (name, company, contact, material_type, location) VALUES ('$name', '$company', '$contact', '$material_type', '$location')";
    if ($conn->query($sql) === TRUE) {
        header("Location: suppliers.php"); 
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>