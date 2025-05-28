<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../accounts/css/transaction.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">💰 Transactions Overview</h2>

    <!-- Transaction Summary -->
    <div class="summary-cards mt-4">
        <div class="summary-card income">
            <i class="fas fa-wallet"></i>
            <h4>₹75,00,000</h4>
            <p>Total Income</p>
        </div>
        <div class="summary-card expense">
            <i class="fas fa-money-bill-wave"></i>
            <h4>₹32,00,000</h4>
            <p>Total Expenses</p>
        </div>
        <div class="summary-card pending">
            <i class="fas fa-clock"></i>
            <h4>₹5,00,000</h4>
            <p>Pending Transactions</p>
        </div>
    </div>

    <!-- Transactions Grid -->
    <div class="transactions-grid mt-4">
        <div class="transaction-card">
            <i class="fas fa-home icon income"></i>
            <div class="details">
                <h5>Apartment Sale</h5>
                <p>₹50,00,000</p>
                <p>Bank Transfer</p>
            </div>
            <span class="status completed">Completed</span>
        </div>

        <div class="transaction-card">
            <i class="fas fa-tools icon expense"></i>
            <div class="details">
                <h5>Contractor Payment</h5>
                <p>₹12,00,000</p>
                <p>Cheque</p>
            </div>
            <span class="status pending">Pending</span>
        </div>

        <div class="transaction-card">
            <i class="fas fa-bolt icon expense"></i>
            <div class="details">
                <h5>Electricity Bill</h5>
                <p>₹25,000</p>
                <p>Online Payment</p>
            </div>
            <span class="status failed">Failed</span>
        </div>

        <div class="transaction-card">
            <i class="fas fa-home icon income""></i>
            <div class="details">
                <h5>Villa Sale</h5>
                <p>₹5,25,000</p>
                <p>Cheque</p>
            </div>
            <span class="status completed">Completed</span>
        </div>
    </div>

    <!-- Add New Transaction -->
    <h4 class="mt-5">Add Transaction</h4>
    <form class="mt-3">
        <div class="form-grid">
            <select class="form-control">
                <option>Incoming</option>
                <option>Outgoing</option>
            </select>
            <input type="number" class="form-control" placeholder="Enter Amount">
            <select class="form-control">
                <option>Bank Transfer</option>
                <option>Cash</option>
                <option>Cheque</option>
                <option>Online Payment</option>
            </select>
            <input type="date" class="form-control">
            <select class="form-control">
                <option>Completed</option>
                <option>Pending</option>
                <option>Failed</option>
            </select>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>

</body>
</html>