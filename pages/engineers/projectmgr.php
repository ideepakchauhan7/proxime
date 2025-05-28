<?php
include '../../config/db_config.php';

// --- Debugging query for ongoing managers ---
$ongoing_sql = "SELECT pm.*, op.title AS project_name 
                FROM project_managers pm 
                JOIN ongoing_project op ON pm.id = op.project_manager_id";
$ongoing_result = mysqli_query($conn, $ongoing_sql);
if (!$ongoing_result) {
    die("Ongoing Query Failed: " . mysqli_error($conn));
}

// --- Debugging query for other managers ---
$others_sql = "SELECT pm.*, p.project_name 
               FROM project_managers pm 
               LEFT JOIN ongoing_project op ON pm.id = op.project_manager_id 
               LEFT JOIN projects p ON pm.id = p.id 
               WHERE op.project_manager_id IS NULL";
$others_result = mysqli_query($conn, $others_sql);
if (!$others_result) {
    die("Others Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Managers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="text-center">Project Managers</h2>

    <!-- Search -->
    <input type="text" id="search" class="form-control mb-3" placeholder="Search Managers..." onkeyup="searchCards()">

    <!-- 🔹 Ongoing Project Managers -->
    <h4>Currently Assigned Project Managers</h4>
    <div class="row mb-5">
        <?php while ($row = mysqli_fetch_assoc($ongoing_result)) { ?>
            <div class="col-md-4 manager-card">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <img src="<?= !empty($row['profile_image']) ? 'http://localhost/ERP/' . htmlspecialchars($row['profile_image']) : 'default-profile.png'; ?>" 
                             alt="<?= htmlspecialchars($row['name']); ?>" 
                             class="rounded-circle mb-3" 
                             width="80" 
                             onerror="this.onerror=null; this.src='default-profile.png';">

                        <h5><?= htmlspecialchars($row['name']); ?></h5>
                        <p class="text-muted"><?= htmlspecialchars($row['email']); ?></p>
                        <p><strong>Phone:</strong> <?= htmlspecialchars($row['phone']); ?></p>
                        <p><strong>Project:</strong> <?= htmlspecialchars($row['project_name'] ?: 'Not Assigned'); ?></p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="view_manager.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">View</a>
                            <a href="edit_manager.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_manager.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- 🔸 Other Project Managers -->
    <h4>Other Project Managers</h4>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($others_result)) { ?>
            <div class="col-md-4 manager-card">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <img src="<?= !empty($row['profile_image']) ? 'http://localhost/ERP/' . htmlspecialchars($row['profile_image']) : 'default-profile.png'; ?>" 
                             alt="<?= htmlspecialchars($row['name']); ?>" 
                             class="rounded-circle mb-3" 
                             width="80" 
                             onerror="this.onerror=null; this.src='default-profile.png';">

                        <h5><?= htmlspecialchars($row['name']); ?></h5>
                        <p class="text-muted"><?= htmlspecialchars($row['email']); ?></p>
                        <p><strong>Phone:</strong> <?= htmlspecialchars($row['phone']); ?></p>
                        <p><strong>Project:</strong> <?= htmlspecialchars($row['project_name'] ?: 'Not Assigned'); ?></p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="view_manager.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">View</a>
                            <a href="edit_manager.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_manager.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
    function searchCards() {
        let input = document.getElementById("search").value.toLowerCase();
        let cards = document.querySelectorAll(".manager-card");

        cards.forEach(card => {
            let text = card.innerText.toLowerCase();
            card.style.display = text.includes(input) ? "block" : "none";
        });
    }
</script>

<style>
    .card img {
        border: 2px solid #ddd;
        padding: 5px;
        background: #f9f9f9;
    }
</style>
</body>
</html>
