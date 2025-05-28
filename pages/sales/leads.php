<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Leads Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../sales/css/leads.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">📊 Current Leads </h2>

    <!-- Search and Filter Section -->
    <div class="d-flex justify-content-between my-3">
        <input type="text" id="search" class="form-control w-25" placeholder="Search leads...">
        <select id="filter" class="form-control w-25">
            <option value="all">All Leads</option>
            <option value="new">New</option>
            <option value="contacted">Contacted</option>
            <option value="qualified">Qualified</option>
            <option value="closed">Closed</option>
        </select>
    </div>

    <!-- Leads List -->
    <div id="lead-list">
        <div class="lead">
            <div class="lead-header">
                <h5>🏠 John Doe - Interested in 3BHK Apartment</h5>
                <span class="status new">New</span>
            </div>
            <p><strong>Contact:</strong> 9876543210</p>
            <p><strong>Email:</strong> john@example.com</p>
            <p><strong>Lead Source:</strong> Website</p>
            <p><strong>Follow-Up Date:</strong> 2024-06-12</p>
        </div>

        <div class="lead">
            <div class="lead-header">
                <h5>🏠 Jane Smith - Looking for Villa</h5>
                <span class="status contacted">Contacted</span>
            </div>
            <p><strong>Contact:</strong> 9876543222</p>
            <p><strong>Email:</strong> jane@example.com</p>
            <p><strong>Lead Source:</strong> Social Media</p>
            <p><strong>Follow-Up Date:</strong> 2024-06-15</p>
        </div>

        <div class="lead">
            <div class="lead-header">
                <h5>🏠 Alex Johnson - Interested in Commercial Property</h5>
                <span class="status qualified">Qualified</span>
            </div>
            <p><strong>Contact:</strong> 9876543233</p>
            <p><strong>Email:</strong> alex@example.com</p>
            <p><strong>Lead Source:</strong> Referral</p>
            <p><strong>Follow-Up Date:</strong> 2024-06-18</p>
        </div>
    </div>

    <!-- Add New Lead -->
    <h4 class="mt-5">Add New Lead</h4>
    <form class="mt-3">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter lead name">
            </div>
            <div class="col-md-4">
                <label class="form-label">Contact</label>
                <input type="text" class="form-control" placeholder="Phone number">
            </div>
            <div class="col-md-4">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Email address">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <label class="form-label">Lead Source</label>
                <select class="form-control">
                    <option>Website</option>
                    <option>Social Media</option>
                    <option>Referral</option>
                    <option>Walk-in</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Follow-Up Date</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Add Lead</button>
            </div>
        </div>
    </form>
</div>

<script>
    // Filter Functionality
    document.getElementById("filter").addEventListener("change", function() {
        let selected = this.value;
        let leads = document.querySelectorAll(".lead");
        leads.forEach(lead => {
            let status = lead.querySelector(".status").classList[1]; // Get lead status
            lead.style.display = (selected === "all" || status === selected) ? "" : "none";
        });
    });

    // Search Functionality
    document.getElementById("search").addEventListener("keyup", function() {
        let filter = this.value.toLowerCase();
        let leads = document.querySelectorAll(".lead");
        leads.forEach(lead => {
            let text = lead.textContent.toLowerCase();
            lead.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>

</body>
</html>