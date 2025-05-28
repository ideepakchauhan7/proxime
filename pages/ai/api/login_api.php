<?php
include '../../../config/db_config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $email = trim($data['email']);

    $stmt = $conn->prepare("SELECT id, email FROM project_managers WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $manager = $res->fetch_assoc();
        echo json_encode(["status" => "success", "manager_id" => $manager['id']]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid Login"]);
    }
}
?>
