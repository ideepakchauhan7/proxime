<?php
require '../../../config/db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM review_reports WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "Invalid Request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Review</title>
</head>
<body>
    <h2>Review Details</h2>
    <p><strong>ID:</strong> <?= $data['id'] ?></p>
    <p><strong>Title:</strong> <?= $data['title'] ?></p>
    <p><strong>Submitted By:</strong> <?= $data['submitted_by'] ?></p>
    <p><strong>Status:</strong> <?= $data['status'] ?></p>
    <a href="reports.php">Back</a>
</body>
</html>