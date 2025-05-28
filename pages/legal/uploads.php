<?php
include '../../config/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $name = $_POST['name'];
    $property = $_POST['property'];
    $date = $_POST['date'];
    $type = $_POST['type'];

    // File Upload Handling
    $allowed_extensions = ['pdf', 'docx', 'jpg', 'png'];
    $file_extension = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_extensions)) {
        die(json_encode(["status" => "error", "message" => "Invalid file type! Only PDF, DOCX, JPG, PNG allowed."]));
    }

    if ($_FILES["file"]["size"] > 5 * 1024 * 1024) { // 5MB limit
        die(json_encode(["status" => "error", "message" => "File is too large! Max 5MB."]));
    }

    // Unique file name
    $new_filename = "uploads/" . uniqid() . "." . $file_extension;
    if (!file_exists("uploads/")) mkdir("uploads/", 0777, true);
    move_uploaded_file($_FILES["file"]["tmp_name"], $new_filename);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO legal_documents (name, property, date, type, file_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $property, $date, $type, $new_filename);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Document uploaded successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error!"]);
    }

    $stmt->close();
}
$conn->close();
?>