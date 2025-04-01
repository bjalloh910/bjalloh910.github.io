<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Type Casting & Constants</title>
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
    <h1>PHP Type Casting & Constants</h1>

    <h2>Type Casting</h2>
    <p>Type casting allows you to convert a value to a specific type.</p>
    <div class="code-block">
        <pre>
<?php
// Casting to Integer
$float = 3.14;
$int = (int)$float;  // $int is now 3
echo $int . "<br>";

// Casting to Float
$string = "3.14";
$float = (float)$string;  // $float is now 3.14
echo $float . "<br>";

// Casting to String
$number = 42;
$string = (string)$number;  // $string is now "42"
echo $string . "<br>";
?>
    </div>

    <h2>Constants</h2>
    <p>Constants are like variables, but once defined, they cannot be changed or undefined.</p>
    <div class="code-block">
<?php
// Define a constant
define("GREETING", "Welcome to PHP!");
echo GREETING . "<br>";

// Define multiple constants
define("NAME", "John");
define("AGE", 30);
define("IS_STUDENT", true);

// Using constants
echo "My name is " . NAME . " and I am " . AGE . " years old.\n";

?>
        </pre>
    </div>

    <h2>Magic Constants</h2>
    <p>PHP provides several magic constants that are case-insensitive.</p>
    <div class="code-block">
<?php
// __LINE__ - Current line number
echo "Line number: " . __LINE__ . "<br>";

// __FILE__ - Full path and filename of the current file
echo "File path: " . __FILE__ . "<br>";

// __DIR__ - Directory of the current file
echo "Directory: " . __DIR__ . "<br>";
?>
</body>
</html> 