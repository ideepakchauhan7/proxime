<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Sales Campaigns</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../sales/css/campaigns.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">🏡 Sales Campaigns</h2>

    <!-- Search Bar -->
    <div class="d-flex justify-content-end my-3">
        <input type="text" id="search" class="form-control w-25" placeholder="Search campaigns...">
    </div>

    <!-- Campaigns List -->
    <div id="campaign-list">
        <div class="campaign">
            <div class="campaign-header">
                <h5>📢 Pre-Launch Offer – Luxury Villas</h5>
                <span class="status active">Active</span>
            </div>
            <p><strong>Type:</strong> Limited-Time Discount</p>
            <p><strong>Target Audience:</strong> High-Net-Worth Individuals</p>
            <p><strong>Start Date:</strong> 2024-06-10</p>
            <p><strong>End Date:</strong> 2024-08-15</p>
        </div>

        <div class="campaign">
            <div class="campaign-header">
                <h5>🎉 Festive Season Offer – Smart Apartments</h5>
                <span class="status upcoming">Upcoming</span>
            </div>
            <p><strong>Type:</strong> Special Festival Pricing</p>
            <p><strong>Target Audience:</strong> First-Time Home Buyers</p>
            <p><strong>Start Date:</strong> 2024-10-01</p>
            <p><strong>End Date:</strong> 2024-11-15</p>
        </div>

        <div class="campaign">
            <div class="campaign-header">
                <h5>🔑 Referral Program – Commercial Spaces</h5>
                <span class="status active">Active</span>
            </div>
            <p><strong>Type:</strong> Lead Generation</p>
            <p><strong>Incentives:</strong> ₹50,000 Cashback for Referrals</p>
            <p><strong>Start Date:</strong> 2024-05-01</p>
            <p><strong>End Date:</strong> 2024-12-31</p>
        </div>
    </div>

    <!-- Add Campaign Form -->
    <h4 class="mt-5">Create New Campaign</h4>
    <form class="mt-3">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Campaign Name</label>
                <input type="text" class="form-control" placeholder="Enter campaign name">
            </div>
            <div class="col-md-4">
                <label class="form-label">Type</label>
                <select class="form-control">
                    <option>Discount Offer</option>
                    <option>Social Media Promotion</option>
                    <option>Email Marketing</option>
                    <option>Referral Program</option>
                    <option>Webinar</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Start Date</label>
                <input type="date" class="form-control">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <label class="form-label">End Date</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Target Audience</label>
                <input type="text" class="form-control" placeholder="Ex: First-time buyers, Investors">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Create Campaign</button>
            </div>
        </div>
    </form>
</div>

<script>
    // Search Functionality
    document.getElementById("search").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let campaigns = document.querySelectorAll(".campaign");
        campaigns.forEach(campaign => {
            let text = campaign.textContent.toLowerCase();
            campaign.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>

</body>
</html>