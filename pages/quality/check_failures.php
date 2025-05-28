<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compliance Failures</title>
    <link rel="stylesheet" href="../quality/css/check_failures.css">
</head>
<body>

<div class="failures-container">
    <h2>🚨 Compliance Failures</h2>
    
    <table>
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Inspection Date</th>
                <th>Remarks</th>
                <th>Reinspection Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('../../config/db_config.php');

            $query = "SELECT * FROM compliance WHERE status='Fail'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['project_name']}</td>
                            <td>{$row['inspection_date']}</td>
                            <td>{$row['remarks']}</td>
                            <td>{$row['reinspection_date']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No failed reports found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>