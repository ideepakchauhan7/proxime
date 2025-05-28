<?php
include '../../config/db_config.php';

// Fetch Documents
$query = "SELECT * FROM legal_documents ORDER BY date DESC";
$documents = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Documents Upload</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <style>
        /* Fix overlapping label issue */
        .input-field input:focus + label,
        .input-field input:not(:placeholder-shown) + label {
            transform: translateY(-20px);
            font-size: 12px;
            color: #26a69a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4 class="center-align">Legal Documents Upload</h4>

        <!-- Upload Form -->
        <form id="uploadForm" class="card-panel">
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
            <div class="input-field">
                <select name="type" id="type" required>
                    <option value="" disabled selected>Select Document Type</option>
                    <option value="agreement">Agreement</option>
                    <option value="ownership">Ownership</option>
                    <option value="compliance">Compliance</option>
                </select>
                <label for="type">Document Type</label>
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
            <button type="submit" class="btn green">Upload Document</button>
        </form>

        <div id="message"></div>
    </div>

    <script>
        $(document).ready(function() {
            // Initialize Materialize form elements
            $('select').formSelect();

            // Fix label floating issue when page reloads with autofilled values
            M.updateTextFields();
        });

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
    </script>
</body>
</html>