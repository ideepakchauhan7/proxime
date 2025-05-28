<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tender Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../contractors/css/tenders.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4">Tender Management</h2>

    <div class="row">
        <!-- Tender Cards Section -->
        <div class="col-md-8">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="tender-card">
                        <h5>Road Construction</h5>
                        <p><strong>Department:</strong> Public Works</p>
                        <p><strong>Deadline:</strong> March 25, 2025</p>
                        <span class="badge bg-success">Open</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tender-card">
                        <h5>School Renovation</h5>
                        <p><strong>Department:</strong> Education</p>
                        <p><strong>Deadline:</strong> April 10, 2025</p>
                        <span class="badge bg-warning">Under Review</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tender-card">
                        <h5>Water Pipeline</h5>
                        <p><strong>Department:</strong> Municipal</p>
                        <p><strong>Deadline:</strong> April 30, 2025</p>
                        <span class="badge bg-danger">Closed</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tender-card">
                        <h5>Bridge Repair</h5>
                        <p><strong>Department:</strong> Infrastructure</p>
                        <p><strong>Deadline:</strong> May 15, 2025</p>
                        <span class="badge bg-success">Open</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tender-card">
                        <h5>Solar Panel Installation</h5>
                        <p><strong>Department:</strong> Energy</p>
                        <p><strong>Deadline:</strong> June 5, 2025</p>
                        <span class="badge bg-warning">Under Review</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tender-card">
                        <h5>Smart City Planning</h5>
                        <p><strong>Department:</strong> Urban Development</p>
                        <p><strong>Deadline:</strong> July 20, 2025</p>
                        <span class="badge bg-danger">Closed</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar with Tender Chart -->
        <div class="col-md-4">
            <div class="sidebar">
                <h4 class="text-center">Tender Status</h4>
                <div class="chart-container">
                    <canvas id="tenderChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Load Tender Chart
    const ctx = document.getElementById('tenderChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Open', 'Under Review', 'Closed'],
            datasets: [{
                data: [7, 5, 3],  
                backgroundColor: ['#28a745', '#ffc107', '#dc3545']
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