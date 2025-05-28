<?php
include('../../config/db_config.php');

if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    // Fetch employee details
    $query = "SELECT * FROM employees WHERE emp_id = $emp_id";
    $result = mysqli_query($conn, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $designation = $row['designation'];
        $department = $row['department'];
        $contact = $row['contact'];
        $status = $row['status'];
    } else {
        echo "Employee not found!";
        exit();
    }
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];
    $status = $_POST['status'];

    $updateQuery = "UPDATE employees SET 
                    name='$name', designation='$designation', department='$department', 
                    contact='$contact', status='$status' 
                    WHERE emp_id=$emp_id";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Employee updated successfully!'); window.location='employee_info.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="../hr/css/employee_info.css">
</head>
<body>

<div class="employee-container">
    <h2>✏️ Edit Employee</h2>

    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>" required>

        <label>Designation:</label>
        <input type="text" name="designation" value="<?php echo $designation; ?>" required>

        <label>Department:</label>
        <input type="text" name="department" value="<?php echo $department; ?>" required>

        <label>Contact:</label>
        <input type="text" name="contact" value="<?php echo $contact; ?>" required>

        <label>Status:</label>
        <select name="status">
            <option value="Active" <?php echo ($status == 'Active') ? 'selected' : ''; ?>>Active</option>
            <option value="Inactive" <?php echo ($status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
        </select>

        <button type="submit" name="update">✅ Update Employee</button>
        <a href="employee_info.php" class="cancel-btn">❌ Cancel</a>
    </form>
</div>

</body>
</html>