<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contractor Gradings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../contractors/css/gradings.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Contractor Gradings</h2>

    <!-- Grading Table -->
    <div class="table-responsive mt-4">
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Contractor Name</th>
                    <th>Company Name</th>
                    <th>Experience (Years)</th>
                    <th>Specialization</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>ABC Constructions</td>
                    <td>10</td>
                    <td>Civil Engineering</td>
                    <td class="fw-bold text-success">A+</td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>XYZ Builders</td>
                    <td>7</td>
                    <td>Electrical Works</td>
                    <td class="fw-bold text-primary">A</td>
                </tr>
                <tr>
                    <td>Mark Wilson</td>
                    <td>Urban Infrastructures</td>
                    <td>12</td>
                    <td>Plumbing</td>
                    <td class="fw-bold text-success">A+</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Grading Chart -->
    <div class="text-center mt-4">
        <h4>Grade Distribution</h4>
        <div class="chart-container">
            <canvas id="gradingChart" width="300" height="300"></canvas>
        </div>
    </div>
</div>

<script>
    // Load Grading Chart
    const ctx = document.getElementById('gradingChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['A+', 'A', 'B+', 'B'],
            datasets: [{
                data: [50, 30, 15, 5], 
                backgroundColor: ['#28a745', '#007bff', '#ffc107', '#dc3545']
            }]
        },
        options: {
            maintainAspectRatio : false,
            responsive : true,
            plugins: {
            legend: {
                display: false,
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 10
                },
                grid: {
                    display: false  // 🔥 Removes Y-axis grid lines
                }
            },
            x: {
                grid: {
                    display: false  // 🔥 Removes X-axis grid lines
                }
            }
        }
    }
 });
</script>

</body>
</html>