<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proxime</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="navbar.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Centered text -->
            <div class="navbar-text text-center flex-grow-1" style="margin-left:300px; font-size:24px; color:teal;">
                Welcome to Proxime ERP Software
            </div>

            <!-- Logout Button on the Right -->
            <button class="btn btn-danger ms-auto" onclick="window.location.href='../index.php';">
            <i class="fas fa-sign-out-alt"></i> 
            </button>
        </div>
    </nav>

    <!-- Bootstrap JS & Popper.js (required for dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
