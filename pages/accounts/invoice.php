<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Invoice Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../accounts/css/invoice.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">📄 E-Invoice Management</h2>

    <!-- Search & Filters -->
    <div class="filters mt-4">
        <input type="text" class="form-control" placeholder="🔍 Search Invoice ID or Client Name">
        <select class="form-select">
            <option>Status: All</option>
            <option>Paid</option>
            <option>Pending</option>
            <option>Overdue</option>
        </select>
    </div>

    <!-- Invoice Cards -->
    <div class="invoice-grid mt-4">
        <div class="invoice-card">
            <h5>🏢 ABC Developers</h5>
            <p><strong>Invoice ID:</strong> INV-001</p>
            <p><strong>Amount:</strong> ₹5,00,000</p>
            <p><strong>Status:</strong> <span class="status paid">✅ Paid</span></p>
            <button class="btn btn-primary">View</button>
        </div>

        <div class="invoice-card">
            <h5>🏠 Urban Builders</h5>
            <p><strong>Invoice ID:</strong> INV-002</p>
            <p><strong>Amount:</strong> ₹7,80,000</p>
            <p><strong>Status:</strong> <span class="status pending">⏳ Pending</span></p>
            <button class="btn btn-primary">View</button>
        </div>

        <div class="invoice-card">
            <h5>🏗️ Skyline Constructions</h5>
            <p><strong>Invoice ID:</strong> INV-003</p>
            <p><strong>Amount:</strong> ₹3,50,000</p>
            <p><strong>Status:</strong> <span class="status overdue">❌ Overdue</span></p>
            <button class="btn btn-primary">View</button>
        </div>
    </div>
</div>

<!-- Floating Action Button (FAB) -->
<button class="fab" onclick="createInvoice()">
    <i class="fas fa-plus"></i>
</button>

<script>
    function createInvoice() {
        alert("Redirecting to Invoice Creation Form...");
    }
</script>

</body>
</html>