<?php
// Database connection
include '../../config/db_config.php';
// Fetch suppliers
$sql = "SELECT * FROM suppliers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../material/css/supplier.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">🏗️ Suppliers Management</h2>

    <!-- Search & Filters -->
    <div class="filters mt-4">
        <input type="text" id="search" class="form-control" placeholder="🔍 Search Supplier">
        <select class="form-select">
            <option>Material Type: All</option>
            <option>Steel</option>
            <option>Cement</option>
            <option>Bricks</option>
            <option>Tiles</option>
        </select>
    </div>

    <!-- Supplier List -->
    <div class="suppliers-grid mt-4">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="supplier-card">
                <h5>🏢 <?= $row['company']; ?></h5>
                <p><strong>Name:</strong> <?= $row['name']; ?></p>
                <p><strong>Contact:</strong> <?= $row['contact']; ?></p>
                <p><strong>Material Type:</strong> <?= $row['material_type']; ?></p>
                <p><strong>Location:</strong> <?= $row['location']; ?></p>
                <button class="btn btn-danger delete-btn" data-id="<?= $row['id']; ?>">❌ Delete</button>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Floating Action Button (FAB) -->
<button class="fab" onclick="showAddForm()">
    <i class="fas fa-plus"></i>
</button>

<!-- Add Supplier Form (Hidden Initially) -->
<div class="modal-bg" id="modal-bg">
    <div class="modal-box">
        <h4>Add Supplier</h4>
        <form action="add_supplier.php" method="POST">
            <input type="text" name="name" placeholder="Supplier Name" required>
            <input type="text" name="company" placeholder="Company Name" required>
            <input type="text" name="contact" placeholder="Contact Number" required>
            <input type="text" name="material_type" placeholder="Material Type" required>
            <input type="text" name="location" placeholder="Location" required>
            <button type="submit" class="btn btn-success">✔ Add Supplier</button>
            <button type="button" class="btn btn-secondary" onclick="hideAddForm()">Cancel</button>
        </form>
    </div>
</div>

<script>
    function showAddForm() {
        document.getElementById("modal-bg").style.display = "flex";
    }

    function hideAddForm() {
        document.getElementById("modal-bg").style.display = "none";
    }
</script>

</body>
</html>

<?php $conn->close(); ?>