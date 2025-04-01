<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Syntax & Variables</title>
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
    </style>
</head>
<body>
    <a href="index.php" class="nav-link">← Back to Tutorials</a>
    <h1>PHP Syntax & Variables</h1>

    <h2>Basic PHP Syntax</h2>
    <p>PHP code is executed on the server, and the plain HTML result is sent to the browser.</p>
    <div class="code-block">
<?php
// This is a single-line comment
# This is also a single-line comment

/* This is a
   multi-line comment */

// PHP code goes here
echo "Hello World!";
echo "<br>";

$name = "John";
$age = 25;
$height = 1.75;
$is_student = true;

echo "Name: " . $name . "<br>";
echo "Age: " . $age . "<br>";
echo "Height: " . $height . "<br>";
echo "Is Student: " . $is_student . "<br>";
?>
    </div>
</body>
</html> 