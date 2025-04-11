<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Advanced Topics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .code-block {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            overflow-x: auto;
        }
        .nav-link {
            display: inline-block;
            padding: 8px 16px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 10px 0;
        }
        .nav-link:hover {
            background-color: #2980b9;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <a href="../startpage.html" class="nav-link">← Back to Start Page</a>
    <h1>PHP Advanced Topics</h1>

    <h2>Date and Time</h2>
    <div class="code-block">
<?php
// Get current date and time
$currentDate = date("Y-m-d H:i:s");
echo "Current date and time: " . $currentDate . "<br>";


echo "Full date: " . date("l, F j, Y") . "<br>";


$date = date_create("2024-12-31");
echo "Created date: " . date_format($date, "Y-m-d") . "<br>";
?>
 <h2>File Handling</h2>
 <div class="code-block">

<?php
// Get the current directory path
$currentDir = __DIR__;
echo "Current directory: " . $currentDir . "<br>";

// Create and write to a file with absolute path
$filename = $currentDir . "/fakeTextFile.txt";
$content = "Hello World!\nThis is a test file.\nCreated on: " . date("Y-m-d H:i:s");

// Write content to file
if (file_put_contents($filename, $content) !== false) {
    echo "<span class='success'>File created successfully!</span><br>";
} else {
    echo "<span class='error'>Failed to create file!</span><br>";
}

// Read file content
if (file_exists($filename)) {
    echo "File contents:<br>";
    echo "<pre>" . file_get_contents($filename) . "</pre>";
} else {
    echo "<span class='error'>File does not exist!</span><br>";
}
?>
</body>
</html> 