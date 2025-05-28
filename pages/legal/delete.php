<?php
include '../../config/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $id = $_POST["delete_id"];

    // Get file path
    $stmt = $conn->prepare("SELECT file_url FROM legal_documents WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && file_exists($row['file_url'])) {
        unlink($row['file_url']);
    }

    // Delete record
    $stmt = $conn->prepare("DELETE FROM legal_documents WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Document deleted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error!"]);
    }

    $stmt->close();
}
$conn->close();
?>