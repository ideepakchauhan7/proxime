<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GST Management - Real Estate ERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../accounts/css/gst.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">💰 GST Management - Real Estate</h2>

    <!-- GST Categories -->
    <div class="accordion mt-4" id="gstAccordion">
        
        <!-- GST on Construction -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#gstConstruction">
                    🏗️ GST on Construction Services
                </button>
            </h2>
            <div id="gstConstruction" class="accordion-collapse collapse show" data-bs-parent="#gstAccordion">
                <div class="accordion-body">
                    <p><strong>Applicable On:</strong> Under-Construction Properties</p>
                    <p><strong>Rate:</strong> 5% (without ITC) | 12% (with ITC)</p>
                    <p><strong>Due Date:</strong> 20th of Every Month</p>
                    <button class="btn btn-primary">File GST</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <!-- GST on Rental Income -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gstRent">
                    🏢 GST on Rental Income
                </button>
            </h2>
            <div id="gstRent" class="accordion-collapse collapse" data-bs-parent="#gstAccordion">
                <div class="accordion-body">
                    <p><strong>Applicable On:</strong> Commercial Property Rentals</p>
                    <p><strong>Rate:</strong> 18%</p>
                    <p><strong>Exemptions:</strong> Residential properties rented for personal use</p>
                    <button class="btn btn-primary">Generate Invoice</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <!-- GST on Sale of Properties -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gstSale">
                    🏠 GST on Sale of Properties
                </button>
            </h2>
            <div id="gstSale" class="accordion-collapse collapse" data-bs-parent="#gstAccordion">
                <div class="accordion-body">
                    <p><strong>Applicable On:</strong> Sale of Under-Construction Properties</p>
                    <p><strong>Rate:</strong> 5% (without ITC) | 12% (with ITC)</p>
                    <p><strong>Exemptions:</strong> Sale of Ready-to-Move Properties</p>
                    <button class="btn btn-primary">Pay GST</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

    </div>

    <!-- GST Invoice Upload -->
    <h4 class="mt-5">📂 Upload GST Invoice</h4>
    <form class="mt-3">
        <div class="upload-section">
            <input type="file" class="form-control">
            <button type="submit" class="btn btn-success">Upload</button>
        </div>
    </form>

    <!-- File GST Return -->
    <h4 class="mt-5">📝 File GST Return</h4>
    <form class="mt-3">
        <div class="form-grid">
            <input type="text" class="form-control" placeholder="GST Number">
            <input type="number" class="form-control" placeholder="Total Taxable Amount">
            <input type="number" class="form-control" placeholder="GST Payable (₹)">
            <input type="date" class="form-control" placeholder="Filing Date">
            <button type="submit" class="btn btn-success">Submit Return</button>
        </div>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>