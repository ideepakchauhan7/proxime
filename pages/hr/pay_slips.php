<?php
include('../../config/db_config.php'); // Ensure correct path

// Define all months
$all_months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];

// Get the current year and define a range (last 10 years)
$currentYear = date("Y");
$all_years = range($currentYear - 10, $currentYear);

// Get selected filter values (default to current month/year)
$filterMonth = isset($_GET['month']) ? $_GET['month'] : date('F');
$filterYear = isset($_GET['year']) ? $_GET['year'] : $currentYear;

// Fetch payslips with filter
$query = "SELECT e.emp_id, e.name, e.designation, p.basic_salary, p.deductions, p.net_pay, p.payment_date 
          FROM payslips p
          JOIN employees e ON p.emp_id = e.emp_id
          WHERE MONTHNAME(p.payment_date) = '$filterMonth' AND YEAR(p.payment_date) = '$filterYear'
          ORDER BY p.payment_date DESC";

$result = mysqli_query($conn, $query);

// Debugging SQL errors
if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Slips</title>
    <link rel="stylesheet" href="../hr/css/pay_slips.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> <!-- For PDF Download -->
</head>
<body>

<div class="payslip-container">
    <h2>💰 Employee Pay Slips</h2>

    <!-- Filter Form -->
    <form method="GET">
        <!-- Month Dropdown -->
        <select name="month">
            <?php foreach ($all_months as $month) { ?>
                <option value="<?php echo $month; ?>" <?php if ($month == $filterMonth) echo "selected"; ?>>
                    <?php echo $month; ?>
                </option>
            <?php } ?>
        </select>

        <!-- Year Dropdown -->
        <select name="year">
            <?php foreach ($all_years as $year) { ?>
                <option value="<?php echo $year; ?>" <?php if ($year == $filterYear) echo "selected"; ?>>
                    <?php echo $year; ?>
                </option>
            <?php } ?>
        </select>

        <button type="submit">🔍 Filter</button>
        <button type="button" onclick="resetFilters()">🔄 Reset</button> <!-- Reset Button -->
    </form>

    <!-- Payslip Table -->
    <table>
        <thead>
            <tr>
                <th>Emp ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Basic Salary</th>
                <th>Deductions</th>
                <th>Net Pay</th>
                <th>Payment Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['emp_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['designation']}</td>
                            <td>₹ {$row['basic_salary']}</td>
                            <td>₹ {$row['deductions']}</td>
                            <td>₹ {$row['net_pay']}</td>
                            <td>{$row['payment_date']}</td>
                            <td>
                                <button class='download-btn' onclick='downloadPDF(\"{$row['emp_id']}\", \"{$row['name']}\", \"{$row['basic_salary']}\", \"{$row['deductions']}\", \"{$row['net_pay']}\", \"{$row['payment_date']}\")'>
                                    📄 Download
                                </button>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No pay slips found for the selected month and year.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function downloadPDF(empId, name, salary, deductions, netPay, date) {
        const { jsPDF } = window.jspdf;
        let doc = new jsPDF();

        doc.setFontSize(16);
        doc.text("Employee Pay Slip", 80, 20);
        doc.setFontSize(12);
        doc.text(`Emp ID: ${empId}`, 20, 40);
        doc.text(`Name: ${name}`, 20, 50);
        doc.text(`Basic Salary: ₹ ${salary}`, 20, 60);
        doc.text(`Deductions: ₹ ${deductions}`, 20, 70);
        doc.text(`Net Pay: ₹ ${netPay}`, 20, 80);
        doc.text(`Payment Date: ${date}`, 20, 90);

        doc.save(`${name}_PaySlip.pdf`);
    }

    function resetFilters() {
        window.location.href = window.location.pathname; // Reload page without query parameters
    }
</script>

</body>
</html>