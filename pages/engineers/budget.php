<?php
include '../../config/db_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Management </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../engineers/css/add_budget.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .modal-content {
            max-width: 90%;
            margin: auto;
        }
    </style>

</head>
<body>

    <!-- Budget Management Section -->
    <div class="container mt-4">
        <h2 class="text-center">Budget Management</h2>

        <!-- Search & Add Budget -->
        <div class="row my-3">
            <div class="col-12 col-md-8">
                <input type="text" class="form-control" placeholder="Search Budgets...">
            </div>
            <div class="col-12 col-md-4 text-md-end mt-2 mt-md-0">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBudgetModal">+ Add Budget</button>
            </div>
        </div>

        <!-- Budget Table -->
         <div class="table-responsive">
         <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Total Budget (INR)</th>
                    <th>Spent (INR)</th>
                    <th>Remaining (INR)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM budgets";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $remaining = $row['total_budget'] - $row['spent'];
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['project_name']}</td>
                            <td>₹ " . number_format($row['total_budget'],2 ) . "</td>
                            <td>₹ " . number_format($row['spent'],2) . " </td>
                            <td>₹ " . number_format($remaining,2) . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No budgets found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
         </div>
        

<!-- Add Budget Modal -->
<div class="modal fade" id="addBudgetModal" tabindex="-1" aria-labelledby="addBudgetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl"> 
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title w-100 text-center" id="addBudgetModalLabel" id="addBudgetModalLabel justify-content-center">Add New Budget</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="budgetForm" method="POST" action="add_budget.php">
                    <div class="mb-3">
                        <label for="project_name" class="form-label">Project Name:</label>
                        <input type="text" class="form-control" name="project_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_budget" class="form-label">Total Budget (INR):</label>
                        <input type="number" class="form-control" name="budget_amount" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="spent" class="form-label">Spent Amount (INR):</label>
                        <input type="number" class="form-control" name="spent_amount" min="0" required>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" id="saveBudgetBtn" class="btn btn-primary">Add Budget</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Add jQuery for AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#budgetForm").submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        $.ajax({
            type: "POST",
            url: "add_budget.php",
            data: $(this).serialize(),
            success: function(response) {
                alert(response);  // Show success or error message
                location.reload(); // Reload page after adding budget
            }
        });
    });
});
</script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>