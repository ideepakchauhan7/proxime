<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../accounts/css/banks.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">🏦 Bank Accounts</h2>

    <!-- Bank Cards Section -->
    <div class="bank-grid mt-4">
        <div class="bank-card">
            <i class="fas fa-university bank-icon"></i>
            <div class="bank-details">
                <h5>HDFC Bank</h5>
                <p>Account: ****5678</p>
                <p>IFSC: HDFC0001234</p>
                <p>Balance: ₹5,00,000</p>
            </div>
            <div class="bank-actions">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </div>
        </div>

        <div class="bank-card">
            <i class="fas fa-landmark bank-icon"></i>
            <div class="bank-details">
                <h5>ICICI Bank</h5>
                <p>Account: ****1234</p>
                <p>IFSC: ICIC0005678</p>
                <p>Balance: ₹8,20,000</p>
            </div>
            <div class="bank-actions">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </div>
        </div>

        <div class="bank-card">
            <i class="fas fa-piggy-bank bank-icon"></i>
            <div class="bank-details">
                <h5>SBI Bank</h5>
                <p>Account: ****7890</p>
                <p>IFSC: SBIN0004567</p>
                <p>Balance: ₹10,50,000</p>
            </div>
            <div class="bank-actions">
                <button class="btn btn-primary"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>

    <!-- Add New Bank -->
    <h4 class="mt-5">➕ Add New Bank</h4>
    <form class="mt-3">
        <div class="form-grid">
            <input type="text" class="form-control" placeholder="Bank Name">
            <input type="text" class="form-control" placeholder="Account Number">
            <input type="text" class="form-control" placeholder="IFSC Code">
            <input type="number" class="form-control" placeholder="Initial Balance">
            <button type="submit" class="btn btn-success">Add Bank</button>
        </div>
    </form>
</div>

</body>
</html>