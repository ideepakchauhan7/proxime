<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Flow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel = "stylesheet" href = "../engineers/css/cashflow.css">
</head>
<body>
<div class="cashflow-container">
    <!-- Left Section: Monthly Cash Flow Chart -->
    <div class="left-section">
        <div class="card">
            <h3>Monthly Cash Flow</h3>
            <canvas id="cashflowChart"></canvas>
        </div>
    </div>

    <!-- Right Section: Balance Card + Expense Breakdown -->
    <div class="right-section">
        <div class="card balance-card">
            <h3>Current Balance</h3>
            <h2 style="color: green;">₹ 3,45,000</h2>
        </div>
        <div class="card">
            <h3>Expense Breakdown</h3>
            <canvas id="expenseChart"></canvas>
        </div>
    </div>
</div>


    <!-- JavaScript for Charts -->
    <script>
        const cashFlowCtx = document.getElementById('cashflowChart').getContext('2d');
        new Chart(cashFlowCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug' , 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Revenue',
                        data: [50000, 60000, 75000, 80000, 90000, 95000, 85000, 65000, 60000, 75000, 90000,88000],
                        backgroundColor: '#28a745'
                    },
                    {
                        label: 'Expenses',
                        data: [30000, 35000, 40000, 45000, 50000, 55000, 30000, 25000, 35000, 40000, 45000, 30000],
                        backgroundColor: '#dc3545'
                    }
                ]
            }
        });

        const expenseCtx = document.getElementById('expenseChart').getContext('2d');
        new Chart(expenseCtx, {
            type: 'pie',
            data: {
                labels: ['Salaries', 'Materials', 'Maintenance', 'Miscellaneous'],
                datasets: [{
                    data: [40, 30, 20, 10],
                    backgroundColor: ['#007bff', '#ffc107', '#28a745', '#dc3545']
                }]
            }
        });
    </script>
</body>
</html>