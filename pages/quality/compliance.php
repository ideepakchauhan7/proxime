<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compliance Reports</title>
    <link rel="stylesheet" href="../quality/css/compliance.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="compliance-container">
    <h2>📜 Compliance Reports</h2>
    
    <table>
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Inspection Date</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('../../config/db_config.php'); // Ensure correct path

            $query = "SELECT * FROM compliance";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['project_name']}</td>
                            <td>{$row['inspection_date']}</td>
                            <td class='".($row['status'] == 'Pass' ? 'pass' : 'fail')."'>{$row['status']}</td>
                            <td>{$row['remarks']}</td>
                            <td><a href='view_compliance.php?id={$row['id']}' class='view-btn'>View</a></td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No compliance reports found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>