<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Management - Real Estate ERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../accounts/css/tax.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">🏛️ Tax Management - Real Estate</h2>

    <!-- Tax Categories -->
    <div class="accordion mt-4" id="taxAccordion">
        
        <!-- Property Tax -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#propertyTax">
                    🏡 Property Tax
                </button>
            </h2>
            <div id="propertyTax" class="accordion-collapse collapse show" data-bs-parent="#taxAccordion">
                <div class="accordion-body">
                    <p><strong>Applicable On:</strong> Residential & Commercial Properties</p>
                    <p><strong>Rate:</strong> 1% of Annual Property Value</p>
                    <p><strong>Due Date:</strong> 31st March</p>
                    <button class="btn btn-primary">Pay Property Tax</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <!-- GST on Real Estate -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gst">
                    💰 GST on Real Estate
                </button>
            </h2>
            <div id="gst" class="accordion-collapse collapse" data-bs-parent="#taxAccordion">
                <div class="accordion-body">
                    <p><strong>Applicable On:</strong> Sale of Under-Construction Properties</p>
                    <p><strong>Rate:</strong> 5% (without ITC) | 12% (with ITC)</p>
                    <p><strong>Due Date:</strong> 20th of Every Month</p>
                    <button class="btn btn-primary">File GST</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <!-- Stamp Duty -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#stampDuty">
                    🏦 Stamp Duty
                </button>
            </h2>
            <div id="stampDuty" class="accordion-collapse collapse" data-bs-parent="#taxAccordion">
                <div class="accordion-body">
                    <p><strong>Applicable On:</strong> Property Registrations</p>
                    <p><strong>Rate:</strong> 4-7% (Varies by State)</p>
                    <p><strong>Due Date:</strong> At the Time of Property Registration</p>
                    <button class="btn btn-primary">Pay Stamp Duty</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <!-- Capital Gains Tax -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#capitalGains">
                    📈 Capital Gains Tax
                </button>
            </h2>
            <div id="capitalGains" class="accordion-collapse collapse" data-bs-parent="#taxAccordion">
                <div class="accordion-body">
                    <p><strong>Applicable On:</strong> Sale of Property</p>
                    <p><strong>Rate:</strong> 20% (Long Term) | Slab Rate (Short Term)</p>
                    <p><strong>Exemptions:</strong> Section 54 (Reinvestment in Property)</p>
                    <button class="btn btn-primary">Calculate Tax</button>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

    </div>

    <!-- Add New Tax Section -->
    <h4 class="mt-5">➕ Add New Tax Record</h4>
    <form class="mt-3">
        <div class="form-grid">
            <input type="text" class="form-control" placeholder="Tax Type">
            <input type="number" class="form-control" placeholder="Tax Rate (%)">
            <input type="text" class="form-control" placeholder="Applicable On">
            <input type="date" class="form-control" placeholder="Due Date">
            <button type="submit" class="btn btn-success">Add Tax</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>