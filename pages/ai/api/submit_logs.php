<?php
include '../../../config/db_config.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $log_id = uniqid('LOG_');
    $manager_id = $data['manager_id'];
    $project_id = $data['project_id'];
    $log_text = $data['log_text'];
    
    $evidence_path = $data['evidence_path'] ?? null;
    $voice_clip_path = $data['voice_clip_path'] ?? null;
    $created_at = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO site_logs (log_id, manager_id, project_id, log_text, evidence_path, voice_clip_path, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siissss", $log_id, $manager_id, $project_id, $log_text, $evidence_path, $voice_clip_path, $created_at);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Log submitted"]);
    } else {
        echo json_encode([
            "status" => "error", 
            "message" => "Submission failed",
        "error" => $stmt->error 
        ]);
    }
}
?>
