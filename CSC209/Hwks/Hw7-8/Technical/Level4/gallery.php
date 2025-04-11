<?php
$imageFolder = "images/";
$images = array_values(array_filter(scandir($imageFolder), function($file) use ($imageFolder) {
    return is_file($imageFolder . $file) && preg_match("/\.(jpg|jpeg|png|gif)$/i", $file);
}));

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Slideshow</title>
    <style>
        body {
            background-color:rgb(225, 204, 220);
            text-align: center;
            font-family: sans-serif;
        }
        #slideshow img {
            max-width: 80%;
            height: auto;
            display: none;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        #slideshow img.active {
            display: block;
        }
        .controls {
            margin-top: 10px;
        }
        button {
            background-color: pink;
            padding: 10px 20px;
            font-size: 1rem;
            margin: 0 5px;
            cursor: pointer;
            border-radius: 5px;
            border: 1px solid white;
        }
    </style>
</head>
<body>
    <h1>Dynamic Image Slideshow</h1>

    <div id="slideshow">
        <?php foreach ($images as $index => $img): ?>
            <img src="<?php echo $imageFolder . $img; ?>" alt="Image <?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" data-index="<?php echo $index; ?>">
        <?php endforeach; ?>
    </div>

    <div class="controls">
        <button onclick="prevSlide()">← Prev</button>
        <button onclick="nextSlide()">Next →</button>
    </div>

    <script>
        const images = document.querySelectorAll('#slideshow img');
        let current = 0;

        function showSlide(index) {
            images.forEach(img => img.classList.remove('active'));
            images[index].classList.add('active');
        }

        function nextSlide() {
            current = (current + 1) % images.length;
            showSlide(current);
        }

        function prevSlide() {
            current = (current - 1 + images.length) % images.length;
            showSlide(current);
        }
    </script>
</body>
</html>

