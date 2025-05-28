<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Budget</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../sales/css/budget.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Sales Budget Management</h2>

    <!-- Search Bar -->
    <div class="d-flex justify-content-end my-3">
        <input type="text" id="search" class="form-control w-25" placeholder="Search budgets...">
    </div>

    <!-- Budget Table -->
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Budget ID</th>
                    <th>Department</th>
                    <th>Allocated Amount (₹)</th>
                    <th>Used Amount (₹)</th>
                    <th>Remaining (₹)</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody id="budgetTable">
                <tr>
                    <td>001</td>
                    <td>Marketing</td>
                    <td>₹1,50,000</td>
                    <td>₹80,000</td>
                    <td class="text-success fw-bold">₹70,000</td>
                    <td>2024</td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Sales</td>
                    <td>₹2,00,000</td>
                    <td>₹1,40,000</td>
                    <td class="text-warning fw-bold">₹60,000</td>
                    <td>2024</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Add Budget Form -->
    <h4 class="mt-5">Allocate New Budget</h4>
    <form class="mt-3">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Department</label>
                <input type="text" class="form-control" placeholder="Enter department name">
            </div>
            <div class="col-md-4">
                <label class="form-label">Allocated Amount (₹)</label>
                <input type="number" class="form-control" placeholder="Enter amount">
            </div>
            <div class="col-md-4">
                <label class="form-label">Year</label>
                <input type="number" class="form-control" placeholder="Enter year">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Allocate Budget</button>
            </div>
        </div>
    </form>
</div>

<script>
    // Search Functionality
    document.getElementById("search").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#budgetTable tr");
        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>

</body>
</html>