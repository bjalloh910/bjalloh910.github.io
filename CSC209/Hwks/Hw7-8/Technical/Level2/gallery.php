<?php

// get all the image files from the folder
$imageFolder = "images/";
$files = array_values(array_filter(scandir($imageFolder), function($file) use ($imageFolder) {
    return is_file($imageFolder . $file) && preg_match("/\.(jpg|jpeg|png|gif)$/i", $file);
}));

sort($files);

// Get current image index from URL (?img=0), default is 0
$currentIndex = isset($_GET['img']) ? intval($_GET['img']) : 0;
$totalImages = count($files);

// Loop back if out of range
if ($currentIndex < 0) $currentIndex = $totalImages - 1;
if ($currentIndex >= $totalImages) $currentIndex = 0;

$currentImage = $files[$currentIndex];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Image Gallery</title>
    <style>
        body {
            text-align: center;
            font-family: sans-serif;
        }
        img {
            max-width: 90%;
            height: auto;
            margin: 20px 0;
        }
        .nav {
            margin-top: 20px;
        }
        .nav a {
            padding: 10px 20px;
            background: #333;
            color: white;
            text-decoration: none;
            margin: 0 10px;
            border-radius: 5px;
        }
        .nav a:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <h1>PHP Gallery</h1>
    <img src="<?php echo $imageFolder . $currentImage; ?>" alt="Slideshow Image">

    <div class="nav">
        <a href="?img=<?php echo ($currentIndex - 1 + $totalImages) % $totalImages; ?>">⬅ Prev</a>
        <a href="?img=<?php echo ($currentIndex + 1) % $totalImages; ?>">Next ➡</a>
    </div>
</body>
</html>