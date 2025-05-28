<?php
include '../../config/db_config.php';

$sql = "SELECT sl.*, pm.name as manager_name 
        FROM site_logs sl 
        JOIN project_managers pm ON sl.manager_id = pm.id 
        ORDER BY sl.created_at DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Site Logs</title>
    <link href = "./css/site_logs.css" rel = "stylesheet">
    <script>
        function filterTable() {
            const input = document.getElementById("searchInput").value.toLowerCase();
            const rows = document.querySelectorAll("#logsTable tbody tr");

            rows.forEach(row => {
                const rowText = row.innerText.toLowerCase();
                row.style.display = rowText.includes(input) ? "" : "none";
            });
        }
    </script>
</head>
<body>

<h2>Site Logs</h2>

<input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search by any field...">

<table id="logsTable">
    <thead>
        <tr>
            <th>S.No</th>
            <th>Project Manager</th>
            <th>Project ID</th>
            <th>Log Text</th>
            <th>Evidence</th>
            <th>Voice Clip</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $counter = 1;
        while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $counter++; ?></td>
                <td><?php echo $row['manager_name']; ?></td>
                <td><?php echo $row['project_id']; ?></td>
                <td><?php echo $row['log_text']; ?></td>
                <td>
                    <?php if (!empty($row['evidence_path'])): ?>
                      <a class="btn" href="/ERP/<?php echo $row['evidence_path']; ?>" target="_blank">View</a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($row['voice_clip_path'])): ?>
                        <a class="btn" href="/ERP/<?php echo $row['voice_clip_path']; ?>" target="_blank">Play</a>
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
