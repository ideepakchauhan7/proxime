<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contractor Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .step { display: none; }
        .active { display: block; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Contractor Registration</h2>
        <form id="contractorForm" action="register_contractor.php" method="POST" enctype="multipart/form-data">
    
    <!-- Personal Details -->
    <input type="text" name="full_name" class="form-control mb-2" placeholder="Full Name" required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="text" name="phone" class="form-control mb-2" placeholder="Phone Number" required>
    <input type="text" name="address" class="form-control mb-2" placeholder="Address" required>

    <!-- Company Information -->
    <input type="text" name="company_name" class="form-control mb-2" placeholder="Company Name" required>
    <select name="business_type" class="form-control mb-2">
        <option value="">Select Business Type</option>
        <option value="Individual">Individual</option>
        <option value="Firm">Firm</option>
        <option value="Corporation">Corporation</option>
    </select>
    <input type="number" name="experience" class="form-control mb-2" placeholder="Years of Experience" required>

    <!-- Document Upload -->
    <label>Business License (PDF)</label>
    <input type="file" name="business_license" class="form-control mb-2" accept=".pdf" required>
    
    <label>Certifications (PDF)</label>
    <input type="file" name="certification" class="form-control mb-2" accept=".pdf" required>
    
    <label>ID Proof (PDF)</label>
    <input type="file" name="id_proof" class="form-control mb-2" accept=".pdf" required>

    <button type="submit" class="btn btn-success">Submit</button>
</form>

    </div>
    
    <script>
        let currentStep = 0;
        const steps = document.querySelectorAll(".step");
        const nextButtons = document.querySelectorAll(".next");
        const prevButtons = document.querySelectorAll(".prev");
        
        nextButtons.forEach((btn) => {
            btn.addEventListener("click", () => {
                steps[currentStep].classList.remove("active");
                currentStep++;
                steps[currentStep].classList.add("active");
            });
        });
        
        prevButtons.forEach((btn) => {
            btn.addEventListener("click", () => {
                steps[currentStep].classList.remove("active");
                currentStep--;
                steps[currentStep].classList.add("active");
            });
        });
    </script>
</body>
</html>