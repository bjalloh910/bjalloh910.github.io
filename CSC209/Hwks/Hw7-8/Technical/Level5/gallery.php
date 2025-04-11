<?php
$imageFolder = "images/";
$images = array_values(array_filter(scandir($imageFolder), function($file) use ($imageFolder) {
    return is_file($imageFolder . $file) && preg_match("/\.(jpg|jpeg|png|gif)$/i", $file);
}));

sort($images);

$totalImages = count($images);
$currentSlide = isset($_GET['slide']) ? intval($_GET['slide']) : 0;

// this will make sure the images will wrap-around
if ($currentSlide < 0) {
    $currentSlide = $totalImages - 1;
} elseif ($currentSlide >= $totalImages) {
    $currentSlide = 0;
}

$currentImage = $images[$currentSlide];


// creating a function to make each image's file name be it's caption
function makeCaption($filename) {
    $name = pathinfo($filename, PATHINFO_FILENAME); 
    $name = str_replace(['-', '_'], ' ', $name);
    return ucwords($name); 
}

$caption = makeCaption($currentImage);
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP-Only Slideshow</title>
    <style>
        body {
            text-align: center;
            font-family: sans-serif;
            background-color:rgb(225, 204, 220);
            color: white;
        }
        img {
            max-width: 80%;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .caption {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .controls {
            margin-top: 20px;
        }
        .controls a {
            text-decoration: none;
            background-color: pink;
            color: white;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            border: 1px solid white;
            cursor: pointer;
        }
        .controls a:hover {
            background-color: #FFB6C1;
        }
    </style>
</head>
<body>
    <h1>PHP Slideshow</h1>
    <p> I combined level 5 and 6 together in this file.</p>
    <div class="caption"><?php echo $caption; ?></div>

    <img src="<?php echo $imageFolder . $currentImage; ?>" alt="Slide <?php echo $currentSlide + 1; ?>">

    <div class="controls">
        <a href="?slide=<?php echo ($currentSlide - 1 + $totalImages) % $totalImages; ?>">← Prev</a>
        <a href="?slide=<?php echo ($currentSlide + 1) % $totalImages; ?>">Next →</a>
    </div>

    

    <p>Showing image <?php echo $currentSlide + 1; ?> of <?php echo $totalImages; ?></p>
</body>
</html>


