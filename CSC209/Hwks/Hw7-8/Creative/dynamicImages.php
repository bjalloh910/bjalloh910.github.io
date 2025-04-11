<?php
$baseDir = "Images/";

$folders = array_values(array_filter(scandir($baseDir), function($item) use ($baseDir) {
    return is_dir($baseDir . $item) && $item !== '.' && $item !== '..';
}));

// Get the selected category from the dropdown menu (or default to first category)
$category = isset($_GET['category']) ? $_GET['category'] : $folders[0];

// Get slide index
$currentSlide = isset($_GET['slide']) ? intval($_GET['slide']) : 0;

// Get image list for each  category
$folderPath = $baseDir . $category . "/";
$images = array_values(array_filter(scandir($folderPath), function($file) use ($folderPath) {
    return is_file($folderPath . $file) && preg_match("/\.(jpg|jpeg|png|gif)$/i", $file);
}));


$totalImages = count($images);
$currentSlide = ($totalImages > 0) ? ($currentSlide % $totalImages + $totalImages) % $totalImages : 0;
$currentImage = $images[$currentSlide] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Slide Show with Categories</title>
    <style>
        body {
            text-align: center;
            font-family: sans-serif;
        }
        img {
            max-width: 80%;
            margin: 20px 0;
        }
        select {
            padding: 8px;
            margin-bottom: 20px;
            font-size: 1rem;
        }
        .controls a {
            text-decoration: none;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }
        .controls a:hover {
            background-color: #555;
        }
        .heart-icon {
            font-size: 2rem;
            cursor: pointer;
            user-select: none;
            transition: color 0.3s ease;
        }
        .heart-icon.favorited {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Slideshow by Category</h1>

    
    <form method="GET">
        <label for="category">Choose a category:</label>
        <select id="category" name="category" onchange="this.form.submit()">
            <?php foreach ($folders as $folder): ?>
                <option value="<?php echo $folder; ?>" <?php if ($folder === $category) echo 'selected'; ?>>
                    <?php echo ucfirst($folder); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <?php if ($currentImage): ?>
        <img src="<?php echo $folderPath . $currentImage; ?>" alt="Slide Image">
        <div class="controls">
            <a href="?category=<?php echo $category; ?>&slide=<?php echo ($currentSlide - 1); ?>">← Prev</a>
            <a href="?category=<?php echo $category; ?>&slide=<?php echo ($currentSlide + 1); ?>">Next →</a>
        </div>
        <span 
            class="heart-icon" 
            onclick="toggleFavorite('<?php echo $folderPath . $currentImage; ?>', this)">
            ♡
        </span>
        <p>Showing image <?php echo $currentSlide + 1; ?> of <?php echo $totalImages; ?> in "<?php echo ucfirst($category); ?>"</p>
    <?php else: ?>
        <p>No images found in <?php echo htmlspecialchars($category); ?>.</p>
    <?php endif; ?>

    <script>
        function toggleFavorite(imagePath, heartEl) {
            let favorites = JSON.parse(localStorage.getItem("favorites")) || [];

            if (favorites.includes(imagePath)) {
                favorites = favorites.filter(fav => fav !== imagePath);
                heartEl.classList.remove("favorited");
            } else {
                favorites.push(imagePath);
                heartEl.classList.add("favorited");
            }

            localStorage.setItem("favorites", JSON.stringify(favorites));
        }

        // this is so that the heart is already favorited if the image is already in the local storage
        window.onload = function() {
            const heart = document.querySelector(".heart-icon");
            const currentImage = "<?php echo $folderPath . $currentImage; ?>";
            const favorites = JSON.parse(localStorage.getItem("favorites")) || [];
            if (favorites.includes(currentImage)) {
                heart.classList.add("favorited");
            }
        }
    </script>
</body>
</html>


