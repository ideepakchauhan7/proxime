<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Controls</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel = "stylesheet" href = "../material/css/inventory_controls.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <h4 class="center-align">Inventory Controls</h4>

        <!-- Filters -->
        <div class="row">
            <div class="input-field col s6">
                <input type="text" id="searchInput" placeholder="🔍 Search properties...">
            </div>
            <div class="input-field col s6">
                <select id="statusFilter">
                    <option value="all" selected>All Status</option>
                    <option value="available">Available</option>
                    <option value="sold">Sold</option>
                    <option value="maintenance">Maintenance</option>
                </select>
                <label>Status Filter</label>
            </div>
        </div>

        <!-- Inventory Grid -->
        <div class="row" id="inventoryGrid">
            <div class="col s12 m4">
                <div class="card inventory-card" data-name="Sunshine Apartments" data-status="available">
                    <div class="card-content">
                        <span class="card-title">Sunshine Apartments</span>
                        <p><strong>Type:</strong> Apartment</p>
                        <p><strong>Price:</strong> $250,000</p>
                        <span class="status available">Available</span>
                    </div>
                    <div class="card-action">
                        <button class="btn-small blue modal-trigger edit-btn" data-target="editModal">Edit</button>
                        <button class="btn-small red delete-btn">Delete</button>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card inventory-card" data-name="Green Villa" data-status="sold">
                    <div class="card-content">
                        <span class="card-title">Green Villa</span>
                        <p><strong>Type:</strong> Villa</p>
                        <p><strong>Price:</strong> $430,000</p>
                        <span class="status sold">Sold</span>
                    </div>
                    <div class="card-action">
                        <button class="btn-small blue modal-trigger edit-btn" data-target="editModal">Edit</button>
                        <button class="btn-small red delete-btn">Delete</button>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card inventory-card" data-name="Luxury Condo" data-status="maintenance">
                    <div class="card-content">
                        <span class="card-title">Luxury Condo</span>
                        <p><strong>Type:</strong> Condo</p>
                        <p><strong>Price:</strong> $1,200,000</p>
                        <span class="status maintenance">Maintenance</span>
                    </div>
                    <div class="card-action">
                        <button class="btn-small blue modal-trigger edit-btn" data-target="editModal">Edit</button>
                        <button class="btn-small red delete-btn">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Property Button -->
        <div class="center-align">
            <button class="btn green modal-trigger" data-target="addModal">+ Add Property</button>
        </div>
    </div>

    <!-- Add Inventory Modal -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <h5>Add Property</h5>
            <div class="input-field">
                <input type="text" id="propertyName" placeholder="Property Name">
            </div>
            <div class="input-field">
                <input type="text" id="propertyType" placeholder="Property Type">
            </div>
            <div class="input-field">
                <input type="text" id="propertyPrice" placeholder="Property Price">
            </div>
            <button class="btn green">Add Property</button>
        </div>
    </div>

    <!-- Edit Inventory Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h5>Edit Property</h5>
            <div class="input-field">
                <input type="text" id="editPropertyName">
            </div>
            <div class="input-field">
                <input type="text" id="editPropertyType">
            </div>
            <div class="input-field">
                <input type="text" id="editPropertyPrice">
            </div>
            <button class="btn blue">Save Changes</button>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize Materialize Components
            M.AutoInit();

            const searchInput = document.getElementById("searchInput");
            const statusFilter = document.getElementById("statusFilter");
            const inventoryCards = document.querySelectorAll(".inventory-card");

            // Filter Function
            function filterInventory() {
                let searchText = searchInput.value.toLowerCase();
                let selectedStatus = statusFilter.value;

                inventoryCards.forEach(card => {
                    let name = card.getAttribute("data-name").toLowerCase();
                    let status = card.getAttribute("data-status").toLowerCase();

                    let matchesSearch = name.includes(searchText);
                    let matchesStatus = (selectedStatus === "all" || status === selectedStatus);

                    card.style.display = matchesSearch && matchesStatus ? "block" : "none";
                });
            }

            // Delete Property
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function () {
                    this.closest(".col").remove();
                });
            });

            // Event Listeners
            searchInput.addEventListener("keyup", filterInventory);
            statusFilter.addEventListener("change", filterInventory);
        });
    </script>

</body>
</html>