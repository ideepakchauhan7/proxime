<?php
include '../../config/db_config.php';

// Fetch requisition data
$sql = "SELECT * FROM material_requisition ORDER BY request_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material Requisition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../material/css/requisition.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Material Requisition</h2>
    
    <div class="accordion mt-4" id="requisitionAccordion">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $row['id']; ?>">
                    <button class="accordion-button collapsed <?php echo strtolower($row['status']); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $row['id']; ?>">
                        <?php echo $row['material_name']; ?> (<?php echo $row['quantity']; ?> units) 
                        <span class="status <?php echo strtolower($row['status']); ?>"><?php echo $row['status']; ?></span>
                    </button>
                </h2>
                <div id="collapse<?php echo $row['id']; ?>" class="accordion-collapse collapse" data-bs-parent="#requisitionAccordion">
                    <div class="accordion-body">
                        <p><strong>Requested By:</strong> <?php echo $row['requestor_name']; ?></p>
                        <p><strong>Department:</strong> <?php echo $row['department']; ?></p>
                        <p><strong>Date:</strong> <?php echo date("M d, Y", strtotime($row['request_date'])); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>