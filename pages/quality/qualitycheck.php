<?php
include '../../config/db_config.php';

$sql = "SELECT * FROM quality_checks ORDER BY date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Quality Check</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../quality/css/quality_check.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">🏗️ Quality Check</h1>
    <p class="text-center text-muted">Ensuring top-notch quality</p>

    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Dynamic status colors
                $statusColor = ($row['status'] == 'Passed') ? 'green' : (($row['status'] == 'Failed') ? 'red' : 'orange');
                ?>
                <div class="col-md-4">
                    <div class="card quality-card">
                        <img src="../<?= htmlspecialchars($row['image_path']); ?>" class="card-img-top" alt="Property Image">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['product_name']); ?></h5>
                            <p class="card-text"><strong>Date:</strong> <?= htmlspecialchars($row['date']); ?></p>
                            <p class="status" style="color: <?= $statusColor; ?>;"><strong>Status:</strong> <?= htmlspecialchars($row['status']); ?></p>
                            <p class="card-text"><?= htmlspecialchars($row['remarks']); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center text-danger'>No quality check records found.</p>";
        }
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>