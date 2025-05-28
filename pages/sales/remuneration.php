<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remuneration Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../sales/css/remuneration.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">💰 Remunerations</h2>

    <!-- Employee List with Remuneration Details -->
    <div id="remuneration-list">
        <div class="remuneration-card">
            <h5>👤 John Doe - Senior Sales Agent</h5>
            <p><strong>Basic Salary:</strong> ₹50,000</p>
            <p><strong>Commission:</strong> ₹25,000 (5% on sales)</p>
            <p><strong>Performance Bonus:</strong> ₹10,000</p>
            <p><strong>Total Payout:</strong> ₹85,000</p>
            <span class="status paid">Paid</span>
        </div>

        <div class="remuneration-card">
            <h5>👤 Jane Smith - Marketing Executive</h5>
            <p><strong>Basic Salary:</strong> ₹40,000</p>
            <p><strong>Commission:</strong> ₹5,000</p>
            <p><strong>Performance Bonus:</strong> ₹8,000</p>
            <p><strong>Total Payout:</strong> ₹53,000</p>
            <span class="status pending">Pending</span>
        </div>

        <div class="remuneration-card">
            <h5>👤 Alex Johnson - Real Estate Consultant</h5>
            <p><strong>Basic Salary:</strong> ₹60,000</p>
            <p><strong>Commission:</strong> ₹30,000</p>
            <p><strong>Performance Bonus:</strong> ₹15,000</p>
            <p><strong>Total Payout:</strong> ₹1,05,000</p>
            <span class="status paid">Paid</span>
        </div>
    </div>

    <!-- Add New Payment -->
    <h4 class="mt-5">Add New Payment</h4>
    <form class="mt-3">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Employee Name</label>
                <input type="text" class="form-control" placeholder="Enter name">
            </div>
            <div class="col-md-4">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" placeholder="Designation">
            </div>
            <div class="col-md-4">
                <label class="form-label">Basic Salary</label>
                <input type="number" class="form-control" placeholder="Amount">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <label class="form-label">Commission</label>
                <input type="number" class="form-control" placeholder="Commission Amount">
            </div>
            <div class="col-md-4">
                <label class="form-label">Performance Bonus</label>
                <input type="number" class="form-control" placeholder="Bonus Amount">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Add Payment</button>
            </div>
        </div>
    </form>
</div>

<script>
    // Change Payment Status on Click
    document.querySelectorAll('.status').forEach(status => {
        status.addEventListener('click', function () {
            if (this.classList.contains('paid')) {
                this.classList.remove('paid');
                this.classList.add('pending');
                this.textContent = "Pending";
            } else {
                this.classList.remove('pending');
                this.classList.add('paid');
                this.textContent = "Paid";
            }
        });
    });
</script>

</body>
</html>