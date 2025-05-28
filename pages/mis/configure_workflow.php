<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIS - Workflow Management</title>
    <link rel="stylesheet" href="../mis/css/workflow.css"> <!-- External CSS -->
</head>
<body>

    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar">
            
            <ul>
                <li><a href="../../utilities/dashboard.php">Dashboard</a></li>
                <li><a href="reports.php">Reports</a></li>
                <li><a href="../hr/attendance.php">Attendance Dashboard</a></li>
                <li class="active"><a href="../mis/configure_workflow.php">Workflow Management</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <div class="dashboard-header">
                <button onclick="alert('Add New Workflow')">+ Add Workflow</button>
            </div>

            <!-- Workflow Status Cards -->
            <div class="cards">
                <div class="card">
                    <h3>Total Workflows</h3>
                    <p><strong>120</strong></p>
                </div>
                <div class="card">
                    <h3>In Progress</h3>
                    <p><strong>45</strong></p>
                </div>
                <div class="card">
                    <h3>Completed</h3>
                    <p><strong>60</strong></p>
                </div>
                <div class="card">
                    <h3>Pending</h3>
                    <p><strong>15</strong></p>
                </div>
            </div>

            <!-- Workflow Table -->
            <h3>Workflow Tasks</h3>
            <table>
                <tr>
                    <th>Task</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                    <th>Deadline</th>
                </tr>
                <tr>
                    <td>HR Payroll Processing</td>
                    <td>Amit Kumar</td>
                    <td>In Progress</td>
                    <td>March 30, 2025</td>
                </tr>
                <tr>
                    <td>Employee Performance Review</td>
                    <td>Neha Sharma</td>
                    <td>Pending</td>
                    <td>April 2, 2025</td>
                </tr>
                <tr>
                    <td>Attendance Analysis</td>
                    <td>Rohit Singh</td>
                    <td>Completed</td>
                    <td>March 25, 2025</td>
                </tr>
            </table>
        </div>
    </div>

</body>
</html>
