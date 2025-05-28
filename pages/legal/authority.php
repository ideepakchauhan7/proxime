<?php
include '../../config/db_config.php';

// Fetch Authority Documents
$query = "SELECT * FROM legal_documents WHERE type = 'authority' ORDER BY date DESC";
$documents = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authority Documents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
    <div class="container">
        <h4 class="center-align">Authority Documents</h4>

        <!-- Upload Authority Document Form -->
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title center">Upload Authority Document</span>
                        <form id="uploadForm">
                            <div class="input-field">
                                <input type="text" name="document_name" id="document_name" required>
                                <label for="document_name">Document Name</label>
                            </div>
                            <div class="input-field">
                                <input type="text" name="property" id="property" required>
                                <label for="property">Property Name</label>
                            </div>
                            <div class="input-field">
                                <input type="date" name="date" id="date" required>
                                <label for="date" class="active">Date</label>
                            </div>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Upload File</span>
                                    <input type="file" name="file" required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Choose a file">
                                </div>
                            </div>
                            <input type="hidden" name="type" value="authority">
                            <button type="submit" class="btn green btn-block">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="message"></div>

        <!-- Display Uploaded Authority Documents in Card Layout -->
        <h5 class="center-align">Uploaded Authority Documents</h5>
        <div class="row">
            <?php while ($row = $documents->fetch_assoc()): ?>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title"><?php echo htmlspecialchars($row['document_name']); ?></span>
                            <p><strong>Property:</strong> <?php echo htmlspecialchars($row['property']); ?></p>
                            <p><strong>Date:</strong> <?php echo htmlspecialchars($row['date']); ?></p>
                            <p><a href="../../uploads/<?php echo $row['file_name']; ?>" target="_blank" class="blue-text">View File</a></p>
                        </div>
                        <div class="card-action">
                            <button class="btn red delete-btn" data-id="<?php echo $row['id']; ?>">Delete</button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize Materialize components
            M.updateTextFields();

            // Handle form submission
            $("#uploadForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#message").html(response);
                        location.reload();
                    }
                });
            });

            // Handle document deletion
            $(".delete-btn").click(function() {
                let docId = $(this).data("id");
                $.post("delete.php", { delete_id: docId }, function(response) {
                    $("#row-" + docId).remove();
                });
            });
        });
    </script>
</body>
</html>