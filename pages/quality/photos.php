<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="../quality/css/photos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
</head>
<body>

<div class="gallery-container">
    <h2>📷 Proxime Photo Gallery</h2>
    <div class="gallery-grid" id="gallery">
        <div class="gallery-item"><img src="../../images/flatimg3.jpg" alt="Corporate Building"></div>
        <div class="gallery-item"><img src="../../images/warehouse.jpg" alt="Residential Project"></div>
        <div class="gallery-item"><img src="../../images/shopping_mall.webp" alt="Luxury Apartment"></div>
        <div class="gallery-item"><img src="../../images/quality_checks/residency.jpeg" alt="Under Construction"></div>
        <div class="gallery-item"><img src="../../images/corporate.jpg" alt="Modern Interior"></div>
        <div class="gallery-item"><img src="../../images/img3.jpg" alt="Luxury Villa"></div>
    </div>
</div>

<!-- Lightbox Popup -->
<div id="lightbox" class="lightbox">
    <span class="close">&times;</span>
    <img class="lightbox-content" id="lightbox-img">
</div>

<script src="photo.js"></script>
</body>
</html>