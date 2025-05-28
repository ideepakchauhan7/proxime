<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Engineers Schedule</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }
        .completed { background-color: #28a745; color: white; }
        .in-progress { background-color: #ffc107; color: black; }
        .pending { background-color: #dc3545; color: white; }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Engineers Schedule</h2>
    
    <!-- Search Bar -->
    <input type="text" id="search" class="form-control mb-3" placeholder="Search schedules...">
    
    <div class="table-container">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Engineer</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="scheduleTable">
                <!-- Data will be populated here using AJAX -->
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function(){
    // Fetch schedules from the PHP file
    $.ajax({
        url: "get_schedules.php",
        method: "GET",
        dataType: "json",
        success: function(data) {
            let tableContent = "";
            data.forEach((item, index) => {
                let statusClass = item.color === "#28a745" ? "completed" : 
                                  item.color === "#ffc107" ? "in-progress" : "pending";
                tableContent += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.title}</td>
                        <td>${item.engineer}</td>
                        <td>${item.start}</td>
                        <td>${item.end}</td>
                        <td><span class="status-badge ${statusClass}">${item.status}</span></td>
                    </tr>
                `;
            });
            $("#scheduleTable").html(tableContent);
        },
        error: function() {
            $("#scheduleTable").html("<tr><td colspan='6' class='text-center'>No schedules found</td></tr>");
        }
    });

    // Search Functionality
    $("#search").on("keyup", function() {
        let value = $(this).val().toLowerCase();
        $("#scheduleTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
</script>

</body>
</html>