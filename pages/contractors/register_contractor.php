<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "proxime");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$fullName = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$companyName = $_POST['company_name'];
$businessType = $_POST['business_type'];
$experience = $_POST['experience'];

// File upload handling
$targetDir = "uploads/"; // Folder where files will be stored

// Business License Upload
$businessLicense = $targetDir . basename($_FILES["business_license"]["name"]);
move_uploaded_file($_FILES["business_license"]["tmp_name"], $businessLicense);

// Certification Upload
$certification = $targetDir . basename($_FILES["certification"]["name"]);
move_uploaded_file($_FILES["certification"]["tmp_name"], $certification);

// ID Proof Upload
$idProof = $targetDir . basename($_FILES["id_proof"]["name"]);
move_uploaded_file($_FILES["id_proof"]["tmp_name"], $idProof);

// Insert data into the database
$sql = "INSERT INTO contractors (full_name, email, phone, address, company_name, business_type, experience, business_license, certification, id_proof) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Query preparation failed: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("ssssssisss", $fullName, $email, $phone, $address, $companyName, $businessType, $experience, $businessLicense, $certification, $idProof);

// Execute the query
if ($stmt->execute()) {
    echo "Contractor registered successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>