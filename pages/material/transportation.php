<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportation Management</title>
    <link rel="stylesheet" href="../material/css/transportation.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <h2 class="title">Transportation Contacts</h2>

        <div class="filters">
            <input type="text" id="searchInput" placeholder="🔍 Search by transport provider..." onkeyup="filterList()">
            <select id="statusFilter" onchange="filterList()">
                <option value="all">All Status</option>
                <option value="available">Available</option>
                <option value="busy">Busy</option>
                <option value="in-transit">In Transit</option>
            </select>
        </div>

        <div class="transport-grid" id="transportList">
            <div class="transport-card" data-status="available">
                <div class="icon"><i class="fas fa-truck"></i></div>
                <h3>ABC Transport Co.</h3>
                <p><strong>Vehicle:</strong> 10-Ton Truck</p>
                <p><strong>Contact:</strong> Rajesh Sharma</p>
                <p><strong>Phone:</strong> +91 98765 43210</p>
                <span class="status available">Available</span>
            </div>

            <div class="transport-card" data-status="busy">
                <div class="icon"><i class="fas fa-shipping-fast"></i></div>
                <h3>Fast Movers Ltd.</h3>
                <p><strong>Vehicle:</strong> Mini Loader</p>
                <p><strong>Contact:</strong> Sunil Kumar</p>
                <p><strong>Phone:</strong> +91 87654 32109</p>
                <span class="status busy">Busy</span>
            </div>

            <div class="transport-card" data-status="in-transit">
                <div class="icon"><i class="fas fa-trailer"></i></div>
                <h3>Reliable Logistics</h3>
                <p><strong>Vehicle:</strong> Container Truck</p>
                <p><strong>Contact:</strong> Akash Verma</p>
                <p><strong>Phone:</strong> +91 99876 54321</p>
                <span class="status in-transit">In Transit</span>
            </div>

            <div class="transport-card" data-status="available">
                <div class="icon"><i class="fas fa-truck-moving"></i></div>
                <h3>Global Cargo</h3>
                <p><strong>Vehicle:</strong> Heavy Loader</p>
                <p><strong>Contact:</strong> Manish Tiwari</p>
                <p><strong>Phone:</strong> +91 91234 56789</p>
                <span class="status available">Available</span>
            </div>
        </div>
    </div>

    <script>
        function filterList() {
            let searchInput = document.getElementById('searchInput').value.toLowerCase();
            let statusFilter = document.getElementById('statusFilter').value;
            let transportCards = document.querySelectorAll('.transport-card');

            transportCards.forEach(card => {
                let providerName = card.querySelector('h3').innerText.toLowerCase();
                let status = card.getAttribute('data-status');

                let matchesSearch = providerName.includes(searchInput);
                let matchesStatus = (statusFilter === 'all' || status === statusFilter);

                if (matchesSearch && matchesStatus) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        }
    </script>

</body>
</html>