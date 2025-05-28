<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ongoing Projects</title>
    <link rel="stylesheet" href="../projects/css/ongoing.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-text">
            <h3>Stay updated with the projects we're currently working on</h3>
        </div>
    </header>
  
    <main>
        <section class="projects">
        <?php
            include '../../config/db_config.php';


            $sql = "SELECT id, title, details FROM ongoing_project"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
               
                while ($row = $result->fetch_assoc()) {
                    $id = htmlspecialchars($row['id']);
                    $title = htmlspecialchars($row['title']);
                    $details = htmlspecialchars($row['details']);

                    
                    echo "<a href='projectDetails.php?id=$id' class='project'>";
                    echo "<article>";
                    echo "<h2>$title</h2>";
                    echo "<p>$details</p>";
                    echo "</article>";
                    echo "</a>";
                }
            } else {
                echo "<p>No ongoing projects found.</p>";
            }

            $conn->close();
            ?>
        </section>

        <!-- Our Work in Cities Section -->
        <section id="our-work-in-cities">
            <!-- Left: Pie Chart -->
            <div class="pie-chart">
                <canvas id="pieChart"></canvas>
            </div>

            <!-- Center: Image Grid -->
            <div class="image-grid">
                <div class="grid">
                    <img src="../../images/img1.jpg" alt="Image 1">
                    <img src="../../images/img3.jpg" alt="Image 2">
                </div>
            </div>

            <!-- Right: Bar Graph -->
            <div class="bar-graph">
                <canvas id="barChart"></canvas>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <div class="footer text-center">
        &copy; 2024 Proxime. All rights reserved.
    </div>

    <!-- JavaScript for Charts -->
    <script>
        // Pie Chart
        const ctxPie = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Flats', 'Villas', 'Commercial', 'Others'],
                datasets: [{
                    data: [30, 25, 25, 20],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                            }
                        }
                    }
                }
            }
        });

        const ctxBar = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                datasets: [{
                    label: 'Property Trend',
                    data: [120, 200, 180, 150],
                    backgroundColor: '#36A2EB',
                    borderColor: '#1e90ff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Trend: ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>