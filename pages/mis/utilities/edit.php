<?php
require '../../../config/db_config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM review_reports WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $submitted_by = $_POST['submitted_by'];
    $status = $_POST['status'];

    $updateQuery = "UPDATE review_reports SET title='$title', submitted_by='$submitted_by', status='$status' WHERE id=$id";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: reports.php");
        exit();
    } else {
        echo "Error updating record.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
</head>
<body>
    <h2>Edit Review</h2>
    <form method="POST">
        <label>Title:</label>
        <input type="text" name="title" value="<?= $data['title'] ?>" required><br>

        <label>Submitted By:</label>
        <input type="text" name="submitted_by" value="<?= $data['submitted_by'] ?>" required><br>

        <label>Status:</label>
        <input type="text" name="status" value="<?= $data['status'] ?>" required><br>

        <button type="submit" name="update">Update</button>
    </form>
    <a href="reports.php">Cancel</a>
</body>
</html>