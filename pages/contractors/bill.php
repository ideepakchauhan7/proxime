<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contractor Bills</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../contractors/css/bill.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Contractor Bills</h2>

    <!-- Search Bar -->
    <div class="d-flex justify-content-end my-3">
        <input type="text" id="search" class="form-control w-25" placeholder="Search bills...">
    </div>

    <!-- Bill Table -->
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Bill ID</th>
                    <th>Contractor Name</th>
                    <th>Company</th>
                    <th>Amount (₹)</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="billTable">
                <tr>
                    <td>1001</td>
                    <td>John Doe</td>
                    <td>ABC Constructions</td>
                    <td>₹50,000</td>
                    <td class="text-success fw-bold">Paid</td>
                    <td>2024-03-10</td>
                </tr>
                <tr>
                    <td>1002</td>
                    <td>Jane Smith</td>
                    <td>XYZ Builders</td>
                    <td>₹75,000</td>
                    <td class="text-danger fw-bold">Pending</td>
                    <td>2024-03-15</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Add Bill Form -->
    <h4 class="mt-5">Add New Bill</h4>
    <form class="mt-3">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Contractor Name</label>
                <input type="text" class="form-control" placeholder="Enter contractor name">
            </div>
            <div class="col-md-4">
                <label class="form-label">Company</label>
                <input type="text" class="form-control" placeholder="Enter company name">
            </div>
            <div class="col-md-4">
                <label class="form-label">Amount (₹)</label>
                <input type="number" class="form-control" placeholder="Enter amount">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <label class="form-label">Status</label>
                <select class="form-control">
                    <option>Paid</option>
                    <option>Pending</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Date</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Add Bill</button>
            </div>
        </div>
    </form>
</div>

<script>
    // Search Functionality
    document.getElementById("search").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#billTable tr");
        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>

</body>
</html>