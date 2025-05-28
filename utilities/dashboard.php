<?php
 session_start();
  include '../config/db_config.php';
  
 
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: loginpage.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proxime</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Link to Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../utilities/css/dashboard.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

  <?php include '../components/navbar.php';?>

  <div class="container-fluid d-flex">

  <!-- Side Panel -->
  <div class="side-panel">
    <h3>PROXIME</h3>
    <ul class="list-unstyled">

    <!-- Home with Submenu -->
    <li>
        <a href="../index.php"><i class="fas fa-home"></i> Home</a>
    </li>
      <!-- Projects with Submenu -->
      <li>
        <a href="#" class="toggle-menu" data-target="#projects-submenu">
          <i class="fas fa-project-diagram"></i> Projects
        </a>
        <ul class="submenu" id="projects-submenu">
        <li class="<?= ($_SERVER['PHP_SELF'] == '/pages/projects/ongoing.php') ? 'active' : '' ?>">
            <a href="../pages/projects/ongoing.php"><i class="fas fa-spinner"></i> Ongoing</a>
        </li>

          <li class="<?= ($_SERVER['PHP_SELF'] == '/pages/projects/completed.php') ? 'active' : '' ?>">
            <a href="../pages/projects/completed.php"><i class="fas fa-check"></i> Completed</a>
          </li>

          <li class="<?= ($_SERVER['PHP_SELF'] == '/pages/projects/upcoming.php') ? 'active' : '' ?>">
            <a href="../pages/projects/upcoming.php"><i class="fas fa-calendar-alt"></i>Upcoming</a></li>
        </ul>
      </li>

      <!-- Engineers with Submenu -->
      <li>
        <a href="#" class="toggle-menu" data-target="#engineers-submenu">
          <i class="fas fa-users"></i> Engineers
        </a>
        <ul class="submenu" id="engineers-submenu">
        <li><a href="../pages/engineers/budget.php"><i class="fas fa-rupee-sign"></i> Budgets</a></li>
          <li><a href="../pages/engineers/projectmgr.php"><i class="fas fa-user-tie"></i> Project Managers</a></li>
          <li><a href="../pages/engineers/scheduling.php"><i class="fas fa-calendar-alt"></i> Scheduling</a></li>
          <li><a href="../pages/engineers/drawing.php"><i class="fas fa-drafting-compass"></i> Drawing</a></li>
          <li><a href="../pages/engineers/oversight.php"><i class="fas fa-shield-alt"></i> Oversight</a></li>
          <li><a href="../pages/engineers/cashflow.php"><i class="fas fa-cash-register"></i> Cash Flow</a></li>
        </ul>
      </li>

      <!-- Contractors with Submenu -->
      <li>
        <a href="#" class="toggle-menu" data-target="#contractor-submenu">
          <i class="fas fa-hard-hat"></i> Contractors
        </a>
        <ul class="submenu" id="contractor-submenu">
        <li><a href="../pages/contractors/registration.php"><i class="fas fa-id-card"></i> Registration</a></li>
          <li><a href="../pages/contractors/gradings.php"><i class="fas fa-star"></i> Gradings</a></li>
          <li><a href="../pages/contractors/tenders.php"><i class="fas fa-bullhorn"></i> Tenders</a></li>
          <li><a href="../pages/contractors/work_orders.php"><i class="fas fa-clipboard"></i> Work Orders</a></li>
          <li><a href="../pages/contractors/bill.php"><i class="fas fa-file-invoice"></i> Bills</a></li>

        </ul>
      </li>

       <!-- Material with Submenu -->
      <li>
        <a href="#" class="toggle-menu" data-target="#material-submenu">
          <i class="fas fa-cogs"></i> Material
        </a>
        <ul class="submenu" id="material-submenu">
        <li><a href="../pages/material/suppliers.php"><i class="fas fa-truck"></i> Suppliers</a></li>
          <li><a href="../pages/material/requisition.php"><i class="fas fa-box-open"></i> Material Requisition</a></li>
          <li><a href="../pages/material/orders.php"><i class="fas fa-box"></i> Orders</a></li>
          <li><a href="../pages/material/transportation.php"><i class="fas fa-truck-loading"></i> Transportation</a></li>
          <li><a href="../pages/material/inventory_controls.php"><i class="fas fa-cogs"></i> Inventory Controls</a></li>
        </ul>
      </li>

      <!-- Sales with Submenu -->
      <li><a href="#" class="toggle-menu" data-target="#sales-submenu">
        <i class="fas fa-chart-line"></i> Sales
      </a>
      <ul class="submenu" id="sales-submenu">
      <li><a href="../pages/sales/budget.php"><i class="fas fa-wallet"></i> Budget</a></li>
          <li><a href="../pages/sales/campaigns.php"><i class="fas fa-bullhorn"></i> Campaigns</a></li>
          <li><a href="../pages/sales/leads.php"><i class="fas fa-user-plus"></i> Leads</a></li>
          <li><a href="../pages/sales/remuneration.php"><i class="fas fa-money-check-alt"></i> Remuneration</a></li>
        </ul>
    </li>

    <!-- Accounts with Submenu -->
      <li><a href="#" class="toggle-menu" data-target="#accounts-submenu">
        <i class="fas fa-calculator"></i> Accounts
      </a>
      <ul class="submenu" id="accounts-submenu">
          <li><a href="../pages/accounts/transactions.php"><i class="fas fa-money-bill-wave"></i> Transactions</a></li>
          <li><a href="../pages/accounts/banks.php"><i class="fas fa-building"></i> Banks</a></li>
          <li><a href="../pages/accounts/tax.php"><i class="fas fa-file-invoice"></i> Tax</a></li>
          <li><a href="../pages/accounts/gst.php"><i class="fas fa-file-invoice-dollar"></i> GST</a></li>
          <li><a href="../pages/accounts/invoice.php"><i class="fas fa-file-alt"></i> E-Invoice</a></li>
        </ul>
    </li>

    <!-- Legal with Submenu -->
      <li><a href="#" class="toggle-menu" data-target="#legal-submenu">
        <i class="fas fa-gavel"></i> Legal
      </a>
      <ul class="submenu" id="legal-submenu">
          <li><a href="../pages/legal/documents.php"><i class="fas fa-file-alt"></i> Documents</a></li>
          <li><a href="../pages/legal/compliances.php"><i class="fas fa-check-circle"></i> Compliances</a></li>
          <li><a href="../pages/legal/authority.php"><i class="fas fa-users-cog"></i> Authority</a></li>
      </ul>
    </li>

    <!-- Quality with Submenu -->
      <li><a href="#" class="toggle-menu" data-target="#quality-submenu">
        <i class="fas fa-check-circle"></i> Quality
      </a>
      <ul class="submenu" id="quality-submenu">
      <li><a href="../pages/quality/qualitycheck.php"><i class="fas fa-check"></i> Quality Check</a></li>
          <li><a href="../pages/quality/check_failures.php"><i class="fas fa-times-circle"></i> Check Failures</a></li>
          <li><a href="../pages/quality/photos.php"><i class="fas fa-camera"></i> Photos</a></li>
          <li><a href="../pages/quality/compliance.php"><i class="fas fa-user-shield"></i> Compliance</a></li>
      </ul>
    </li>

    <!-- HR with Submenu -->
      <li><a href="#" class="toggle-menu" data-target="#hr-submenu">
        <i class="fas fa-user-tie"></i> HR
      </a>
      <ul class="submenu" id="hr-submenu">
        <li><a href="../pages/hr/employee_info.php"><i class="fas fa-id-card"></i> Employee Info</a></li>
        <li><a href="../pages/hr/attendance.php"><i class="fas fa-clock"></i> Attendance</a></li>
        <li><a href="../pages/hr/pay_slips.php"><i class="fas fa-file-invoice-dollar"></i> Pay Slips</a></li>
        <li><a href="../pages/hr/performance.php"><i class="fas fa-chart-line"></i> Performance Manager</a></li>
        <li><a href="../pages/hr/documents.php"><i class="fas fa-folder"></i> Documents</a></li>
      </ul>
    </li>

    <!-- MIS with Submenu -->
    <li><a href="#" class="toggle-menu" data-target="#mis-submenu"><i class="fas fa-chart-pie"></i>MIS</a>
      <ul class="submenu" id="mis-submenu">
        <li><a href="../pages/mis/reports.php"><i class="fas fa-file-alt"></i> Review Reports</a></li>
        <li><a href="../pages/mis/configure_workflow.php"><i class="fas fa-cogs"></i> Configure Workflow</a></li>
        <li><a href="../pages/mis/land_purchase.php"><i class="fas fa-map-signs"></i> Land Purchase</a></li>
        <li><a href="../pages/mis/contacts.php"><i class="fas fa-address-book"></i> Contacts</a></li>
      </ul>
    </li>

    <!-- AI Embedded with Submenu -->
    <li><a href="#"  href="#" class="toggle-menu" data-target="#ai-submenu"><i class="fas fa-robot"></i></i> AI Embedded</a>
      <ul class="submenu" id="ai-submenu">
        <li><a href="../pages/ai/revenue_predictor.php"><i class="fas fa-chart-line"></i> Revenue Predictor</a></li>
        <li><a href="../pages/ai/site_logs.php"><i class="fas fa-clipboard-list"></i> Site Logs</a></li>
      </ul>
    </li>

    <!-- Maps-->
    <li><a href="#"  href="#" class="toggle-menu" data-target="#map-submenu">
    <i class="fas fa-map-marked-alt"></i>Maps
      </a>
      <ul class="submenu" id="map-submenu">
        <li><a href="../pages/maps/map.html"><i class="fas fa-map"></i> Google Maps</a></li>
      </ul>
    </li>
    </ul>
  </div>
</div>

<div class="dashboard-content">
    <h2>Welcome to Proxime ERP Software</h2>

    <!-- Stats Section -->
    <div class="stats-container">
      <div class="stat-box">
          <p> Total Projects<br><span id = "totalProjects">Loading...</span></p>
      </div>
      <div class="stat-box">
          <p>Last Month Revenue<br><span id = "revenue-amount">Loading...</span></p>
      </div>
      <div class="stat-box">
          <p>Pending Tasks<br><span id="pendingTasks">Loading...</span></p>
      </div>
      <div class="stat-box">
          <h3>New Clients</h3>
          <p class="count" data-target="32">0</p>
      </div>
    </div>

    <!-- Revenue Chart -->
    <div class="card">
      <div class="card-body">
          <h5 class="card-title">Revenue Trend</h5>
          <canvas id="revenueChart"></canvas>
      </div>
    </div>


    <!-- Recent Activities -->
    <div class="recent-activities">
        <h3>Recent Activities</h3>
          <?php
              $activities = [
                  "New project started: Tower Construction",
                  "Client signed a contract for Office Space",
                  "Updated pricing for residential units",
                  "Completed milestone: Phase 1 Infrastructure"
              ];
              foreach ($activities as $activity) {
                  echo "<div class='activity-item'>$activity</div>";
              }
          ?>
     </div>
</div>


  <!-- Footer -->
<div class="footer text-center">
        &copy; 2024 Proxime. All rights reserved.
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Toggle submenu visibility
    document.addEventListener('DOMContentLoaded', () => {
      const toggleMenus = document.querySelectorAll('.toggle-menu');
      
      toggleMenus.forEach(menu => {
        menu.addEventListener('click', (e) => {
          e.preventDefault();
          const target = document.querySelector(menu.dataset.target);
          target.style.display = target.style.display === 'block' ? 'none' : 'block';
        });
      });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", async function () {
        try {
            // Fetch revenue data from PHP backend
            let response = await fetch('../utilities/api/get_revenue_data.php'); 
            let data = await response.json();

            if (!data || !data.revenue) {
                console.error("Invalid data format received:", data);
                return;
            }

            let revenueData = data.revenue; // Array of revenue values

            var ctx = document.getElementById('revenueChart').getContext('2d');
            var revenueChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Revenue (₹)",
                        data: revenueData, // Dynamically fetched data
                        backgroundColor: "rgba(75, 192, 192, 0.2)",
                        borderColor: "rgba(75, 192, 192, 1)",
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

        } catch (error) {
            console.error("Error fetching revenue data:", error);
        }
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll('.count');

    counters.forEach(counter => {
        let target = +counter.getAttribute('data-target');
        let count = 0;
        let speed = target / 40; // Adjust speed as needed

        let updateCount = () => {
            count += speed;
            if (count < target) {
                counter.innerText = counter.classList.contains("currency") ? `₹ ${Math.floor(count)}` : Math.floor(count);
                requestAnimationFrame(updateCount);
            } else {
                counter.innerText = counter.classList.contains("currency") ? `₹ ${target}` : target;; 
            }
        };

        updateCount();
    });
});

</script>

<script>
        // Fetch project count from API
        fetch('../utilities/api/get_total_projects.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('totalProjects').textContent = data.total_projects || "N/A";
            })
            .catch(error => {
                console.error("Error fetching project count:", error);
                document.getElementById('totalProjects').textContent = "Error";
            });
</script>

<script>
        function fetchPendingTasks() {
          fetch("../utilities/api/pending_tasks.php")
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(data => {
                if (data.pendingTasks !== undefined) {
                    document.getElementById("pendingTasks").innerText = data.pendingTasks;
                } else {
                    console.error("Invalid response format:", data);
                }
            })
            .catch(error => console.error("Error fetching data:", error));
          }
          window.onload = fetchPendingTasks;
</script>

<script>
    // Fetch revenue data from the API
    fetch('../utilities/api/revenue.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                let revenueElement = document.getElementById("revenue-amount");
                let totalRevenue = data.total_revenue;
    
                animateCount(revenueElement, totalRevenue);
            }
        })
        .catch(error => {
            console.error("Error fetching revenue:", error);
            document.getElementById("revenue-amount").innerText = "Error";
        });

    // Function to animate counting effect
    function animateCount(element, target) {
        let start = 0;
        let duration = 2000; // Animation duration (2s)
        let stepTime = Math.abs(Math.floor(duration / target));
        
        let timer = setInterval(() => {
            start += Math.ceil(target / 100);
            element.innerText = "₹" + start.toLocaleString(); // Formatting currency

            if (start >= target) {
                clearInterval(timer);
                element.innerText = "₹" + target.toLocaleString();
            }
        }, stepTime);
    }
</script>

</body>
</html>
