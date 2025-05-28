<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Projects</title>
    <link rel="stylesheet" href="../projects/css/completed.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <!-- Header Section -->
    <header class="completed-header">
        <div class="header-content">
            <h1>Our Completed Projects</h1>
            <p>We've delivered innovative solutions for clients worldwide.</p>
        </div>
    </header>

    <!-- Project Statistics Section -->
   <!-- Stats Section -->
<section class="stats">
    <div class="stats-card">
        <h2>Total Completed Projects</h2>
        <div class="stats-number">250+</div>
    </div>
    <!-- Pie Chart Card -->
    <div class="stats-card pie-chart-card">
        <div class="chart-labels">
        <ul>
            <li class="li-residential">Residential</li>
            <li class="li-commercial">Commercial</li>
            <li class="li-industrial">Industrial</li>
            <li class="li-others">Others</li>
        </ul>
        </div>
        <canvas id="pieChart"></canvas>
    </div>
    <div class="stats-card">
        <h2>Completion Rate</h2>
        <div class="completion-rate">
            <span>100%</span>
            <div class="progress-bar">
                <div class="progress" style="width: 100%;"></div>
            </div>
        </div>
    </div>
</section>

    <!-- Projects Showcase -->
    <section class="projects">
    <?php
        include '../../config/db_config.php';

        // Fetch completed projects from the database
        $sql = "SELECT title, description, completion_date, project_images FROM completed_project";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output each project
            while ($row = $result->fetch_assoc()) {
                // Decode the JSON data in 'project_images'
                $images = json_decode($row['project_images'], true); // Decoding JSON into an array
        
                echo "<div class='project-card'>";
        
                // Loop through each image in the JSON array and display it
                foreach ($images as $image) {
                    // Adjust image path to be relative from the projects folder
                    $imagePath = "../../" . htmlspecialchars($image);
                    echo "<img src='" . $imagePath . "' alt='Project Image'>";
                }
        
                echo "<div class='project-info'>";
                echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                echo "<p class='date'>Completed on: " . htmlspecialchars($row['completion_date']) . "</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No completed projects found.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </section>

    <!-- Footer -->
    <div class="footer text-center">
        &copy; 2024 Proxime. All rights reserved.
    </div>

    <!-- JavaScript for Charts -->
        <!-- JavaScript for Charts -->
        <script>
        // Pie Chart for Project Type Distribution
        const ctxPie = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Residential', 'Commercial', 'Industrial', 'Others'],
                datasets: [{
                    data: [45, 30, 15, 10],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,  // This will hide the default legend
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
    </script>

</body>
</html>