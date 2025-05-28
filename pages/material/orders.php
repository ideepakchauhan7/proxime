<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate ERP - Orders</title>
    <link rel="stylesheet" href="../material/css/orders.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <h2 class="title">Property Orders</h2>

        <div class="filters">
            <input type="text" id="searchInput" placeholder="🔍 Search by property name...">
            <select id="statusFilter">
                <option value="all">All Status</option>
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>

        <div class="orders-grid">
            <div class="order-card" data-name="Sunshine Apartments" data-buyer="John Doe" data-amount="$250,000" data-status="Pending">
                <div class="order-header">
                    <h3>Sunshine Apartments</h3>
                    <span class="status pending"><i class="fas fa-clock"></i> Pending</span>
                </div>
                <p><strong>Buyer:</strong> John Doe</p>
                <p><strong>Amount:</strong> $250,000</p>
                <button class="view-btn">View Details</button>
            </div>

            <div class="order-card" data-name="Green Villa" data-buyer="Jane Smith" data-amount="$430,000" data-status="Approved">
                <div class="order-header">
                    <h3>Green Villa</h3>
                    <span class="status approved"><i class="fas fa-check-circle"></i> Approved</span>
                </div>
                <p><strong>Buyer:</strong> Jane Smith</p>
                <p><strong>Amount:</strong> $430,000</p>
                <button class="view-btn">View Details</button>
            </div>

            <div class="order-card" data-name="Luxury Condo" data-buyer="David Lee" data-amount="$1,200,000" data-status="Rejected">
                <div class="order-header">
                    <h3>Luxury Condo</h3>
                    <span class="status rejected"><i class="fas fa-times-circle"></i> Rejected</span>
                </div>
                <p><strong>Buyer:</strong> David Lee</p>
                <p><strong>Amount:</strong> $1,200,000</p>
                <button class="view-btn">View Details</button>
            </div>
        </div>
    </div>

    <!-- Modal Popup -->
    <div class="modal" id="orderModal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2 id="modalTitle"></h2>
            <p><strong>Buyer:</strong> <span id="modalBuyer"></span></p>
            <p><strong>Amount:</strong> <span id="modalAmount"></span></p>
            <p><strong>Status:</strong> <span id="modalStatus"></span></p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById("searchInput");
            const statusFilter = document.getElementById("statusFilter");
            const orderCards = document.querySelectorAll(".order-card");
            const viewButtons = document.querySelectorAll(".view-btn");
            const modal = document.getElementById("orderModal");
            const modalTitle = document.getElementById("modalTitle");
            const modalBuyer = document.getElementById("modalBuyer");
            const modalAmount = document.getElementById("modalAmount");
            const modalStatus = document.getElementById("modalStatus");
            const closeBtn = document.querySelector(".close-btn");

            // Search & Filter Function
            function filterList() {
                let searchText = searchInput.value.toLowerCase();
                let selectedStatus = statusFilter.value;

                orderCards.forEach(card => {
                    let propertyName = card.getAttribute("data-name").toLowerCase();
                    let status = card.getAttribute("data-status").toLowerCase();

                    let matchesSearch = propertyName.includes(searchText);
                    let matchesStatus = (selectedStatus === "all" || status === selectedStatus);

                    if (matchesSearch && matchesStatus) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                });
            }

            // Open Modal Function
            viewButtons.forEach(button => {
                button.addEventListener("click", function () {
                    let parentCard = this.closest(".order-card");
                    modalTitle.innerText = parentCard.getAttribute("data-name");
                    modalBuyer.innerText = parentCard.getAttribute("data-buyer");
                    modalAmount.innerText = parentCard.getAttribute("data-amount");
                    modalStatus.innerText = parentCard.getAttribute("data-status");
                    modal.style.display = "block";
                });
            });

            // Close Modal
            closeBtn.addEventListener("click", function () {
                modal.style.display = "none";
            });

            // Close modal when clicking outside
            window.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });

            // Event Listeners
            searchInput.addEventListener("keyup", filterList);
            statusFilter.addEventListener("change", filterList);
        });
    </script>

</body>
</html>