<!DOCTYPE html>
<html>
<head>
    <title>Interactive Image Gallery</title>
    <style>
        .gallery-img {
            width: 200px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Interactive Image Viewer</h1>
    <a href="https://www.sourcecodester.com/tutorials/php/4917/image-slideshow-using-php-and-simple-jquery.html" style="display: block" > resource link</a>

    <?php
    // grab all the images again 
    $imageFolder = "images/";
    $files = array_values(array_filter(scandir($imageFolder), function($file) use ($imageFolder) {
        return is_file($imageFolder . $file) && preg_match("/\.(jpg|jpeg|png|gif)$/i", $file);
    }));

    sort($files);
    ?>

   
    <label for="imageSelector">Choose an image: 👉</label>
    <select id="imageSelector">
        <option value="all">Show All</option>
        <?php foreach ($files as $index => $file): ?>
            <option value="img<?php echo $index; ?>"><?php echo $file; ?></option>
        <?php endforeach; ?>
    </select>

    <div id="gallery">
        <?php foreach ($files as $index => $file): ?>
            <img src="<?php echo $imageFolder . $file; ?>"
                 class="gallery-img"
                 id="img<?php echo $index; ?>"
                 alt="Gallery Image">
        <?php endforeach; ?>
    </div>

    <script>
        const selector = document.getElementById('imageSelector');
        const allImages = document.querySelectorAll('.gallery-img');

        selector.addEventListener('change', () => {
            const selectedId = selector.value;

            allImages.forEach(img => {
                if (selectedId === "all") {
                    img.style.display = "inline";
                } else {
                    img.style.display = (img.id === selectedId) ? "inline" : "none";
                }
            });
        });
    </script>
</body>
</html>
