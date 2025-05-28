<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Drawings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 1200px;
            margin: 30px auto;
        }
        .drawing-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }
        .drawing-item {
            background: #ffffff;
            padding: 15px;
            border-radius: 8px;
            width: calc(50% - 10px); /* Two items per row */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .drawing-item h4 {
            color: #007bff;
            margin-bottom: 8px;
        }
        .drawing-item a {
            display: block;
            color: #28a745;
            font-weight: bold;
            text-decoration: none;
        }
        .drawing-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Project Drawings</h2>

    <div class="drawing-wrapper">
        <div class="drawing-item">
            <h4>Blueprint</h4>
            <p>Project ID: 1</p>
            <p>Engineer: Amit Sharma</p>
            <a href="../../images/drawings/blueprint.webp" target="_blank">📂 View Drawing</a>
        </div>

        <div class="drawing-item">
            <h4>Design Document</h4>
            <p>Project ID: 2</p>
            <p>Engineer: Rohan Mehta</p>
            <a href="../../images/drawings/design.webp" target="_blank">📂 View Drawing</a>
        </div>

        <div class="drawing-item">
            <h4>Structural Plan</h4>
            <p>Project ID: 3</p>
            <p>Engineer: Neha Verma</p>
            <a href="../../images/drawings/Structural_Plan.pdf" target="_blank">📂 View Drawing</a>
        </div>

        <div class="drawing-item">
            <h4>Electrical Layout</h4>
            <p>Project ID: 4</p>
            <p>Engineer: Vikram Singh</p>
            <a href="../../images/drawings/electrical_layout.webp" target="_blank">📂 View Drawing</a>
        </div>
    </div>

</div>

</body>
</html>