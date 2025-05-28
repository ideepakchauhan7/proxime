<?php
include('../../config/db_config.php'); // Ensure correct path

$query = "SELECT * FROM employees";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Information</title>
    <link rel="stylesheet" href="../hr/css/employee_info.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="employee-container">
    <h2>👔 Employee Information</h2>
    
    <div class="actions">
        <input type="text" id="search" placeholder="Search Employee...">
        <a href="add_employee.php" class="add-btn">➕ Add Employee</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Emp ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Contact</th>
                <th>Status</th>
                <th>Actions</th>
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
                            <td>{$row['department']}</td>
                            <td>{$row['contact']}</td>
                            <td class='".($row['status'] == 'Active' ? 'active' : 'inactive')."'>{$row['status']}</td>
                            <td>
                                <a href='view_employee.php?id={$row['emp_id']}' class='view-btn'>👀 View</a>
                                <a href='edit_employee.php?id={$row['emp_id']}' class='edit-btn'>✏️ Edit</a>
                                <a href='delete_employee.php?id={$row['emp_id']}' class='delete-btn'
                                   onclick=\"return confirm('Are you sure you want to delete this employee?');\">🗑️ Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No employee records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>