<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        img {
            width: 200px;
            margin: 10px;
            transition: 0.3s;
            cursor: pointer;
        }

        img:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>PHP Image Gallery</h1>
    <p> Click on the image to view it in full size</p>
    <div id="gallery">
        <?php
        $imageFolder = "Images/";
        $images = scandir($imageFolder);

        foreach ($images as $image) {
            $filePath = $imageFolder . $image;
            if (is_file($filePath) && preg_match("/\.(jpg|jpeg|png|gif)$/i", $image)) {
                echo "<img src='$filePath' alt='Image'>";
            }
        }
        ?>
    </div>

    <script>
        const images = document.querySelectorAll("img");
        images.forEach(img => {
            img.addEventListener("click", () => {
                img.classList.toggle("full-size");
            }); 
        });
    </script>
    <style>
        .full-size {
            width: 90vw; /* Make the image take 90% of the viewport width*/
            display: block;
            margin: 20px auto; /*center the image */
        }
    </style>
</body>
</html>