<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Oversight</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../engineers/css/oversight.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Project Oversight Dashboard</h2>
        
        <!-- Task Completion Chart -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Task Completion</h5>
                    <canvas id="taskChart"></canvas>
                </div>
            </div>

            <!-- Issue Tracker -->
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Issue Tracker</h5>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-danger">Bug in design module</li>
                        <li class="list-group-item list-group-item-warning">Delay in material delivery</li>
                        <li class="list-group-item list-group-item-info">Quality check pending</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Engineer Performance -->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Engineer Efficiency</h5>
                    <canvas id="efficiencyChart"></canvas>
                </div>
            </div>

            <!-- Upcoming Deadlines -->
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Upcoming Deadlines</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Task</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Final Inspection</td>
                                <td>March 20, 2025</td>
                            </tr>
                            <tr>
                                <td>Electrical Setup</td>
                                <td>March 25, 2025</td>
                            </tr>
                            <tr>
                                <td>Project Handover</td>
                                <td>April 5, 2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Charts -->
    <script>
        const taskCtx = document.getElementById('taskChart').getContext('2d');
        new Chart(taskCtx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'In Progress', 'Pending'],
                datasets: [{
                    data: [60, 30, 10],
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545']
                }]
            }
        });

        const efficiencyCtx = document.getElementById('efficiencyChart').getContext('2d');
        new Chart(efficiencyCtx, {
            type: 'bar',
            data: {
                labels: ['John', 'Alice', 'Mike', 'Sarah'],
                datasets: [{
                    label: 'Tasks Completed',
                    data: [8, 10, 7, 9],
                    backgroundColor: ['#007bff', '#17a2b8', '#ffc107', '#dc3545']
                }]
            }
        });
    </script>
</body>
</html>