<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../contractors/css/work_orders.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4">Work Orders</h2>

    <div class="row">
        <!-- Work Orders Section -->
        <div class="col-md-8">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="work-card">
                        <h5>Highway Maintenance</h5>
                        <p><strong>Department:</strong> Public Works</p>
                        <p><strong>Deadline:</strong> March 30, 2025</p>
                        <span class="badge bg-warning">Pending</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-card">
                        <h5>Bridge Repair</h5>
                        <p><strong>Department:</strong> Infrastructure</p>
                        <p><strong>Deadline:</strong> April 15, 2025</p>
                        <span class="badge bg-primary">In Progress</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-card">
                        <h5>Water Pipeline Installation</h5>
                        <p><strong>Department:</strong> Municipal</p>
                        <p><strong>Deadline:</strong> May 5, 2025</p>
                        <span class="badge bg-success">Completed</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-card">
                        <h5>Building Painting</h5>
                        <p><strong>Department:</strong> Housing</p>
                        <p><strong>Deadline:</strong> May 25, 2025</p>
                        <span class="badge bg-warning">Pending</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-card">
                        <h5>Electric Grid Expansion</h5>
                        <p><strong>Department:</strong> Energy</p>
                        <p><strong>Deadline:</strong> June 10, 2025</p>
                        <span class="badge bg-primary">In Progress</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-card">
                        <h5>Smart Traffic System</h5>
                        <p><strong>Department:</strong> Transportation</p>
                        <p><strong>Deadline:</strong> July 20, 2025</p>
                        <span class="badge bg-success">Completed</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar with Work Order Chart -->
        <div class="col-md-4">
            <div class="sidebar">
                <h4 class="text-center">Work Order Status</h4>
                <div class="chart-container">
                    <canvas id="workOrderChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Load Work Order Chart
    const ctx = document.getElementById('workOrderChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Pending', 'In Progress', 'Completed'],
            datasets: [{
                data: [10, 8, 5],  
                backgroundColor: ['#ffc107', '#007bff', '#28a745']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>

</body>
</html>