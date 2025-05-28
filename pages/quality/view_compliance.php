<?php
include('../../config/db_config.php'); // Ensure correct path

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch compliance details
    $query = "SELECT * FROM compliance WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Compliance Details</title>
            <link rel="stylesheet" href="../quality/css/view_compliance.css">
        </head>
        <body>

        <div class="compliance-details">
            <h2>📄 Compliance Report Details</h2>
            <p><strong>Project Name:</strong> <?= htmlspecialchars($row['project_name']); ?></p>
            <p><strong>Inspection Date:</strong> <?= htmlspecialchars($row['inspection_date']); ?></p>
            <p><strong>Status:</strong> <span class="<?= $row['status'] == 'Pass' ? 'pass' : 'fail'; ?>">
                <?= htmlspecialchars($row['status']); ?>
            </span></p>
            <p><strong>Remarks:</strong> <?= htmlspecialchars($row['remarks']); ?></p>

            <?php if (!empty($row['reinspection_date'])): ?>
                <p><strong>Re-Inspection Date:</strong> <?= htmlspecialchars($row['reinspection_date']); ?></p>
            <?php endif; ?>

            <a href="compliance.php" class="back-btn">🔙 Back to Reports</a>
        </div>

        </body>
        </html>
        <?php
    } else {
        echo "<p>Compliance record not found.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>