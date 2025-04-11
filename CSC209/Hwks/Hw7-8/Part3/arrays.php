<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Arrays & Functions</title>
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
    <h1>PHP Arrays & Functions</h1>

    <h2>Arrays</h2>
    <p>Arrays in PHP can store multiple values in a single variable.</p>
    <div class="code-block">
        <pre>
<?php

$cars = array("Volvo", "BMW", "Toyota");
echo $cars[0];
echo "<br>";
echo $cars[1];
echo "<br>";
echo $cars[2];
echo "<br>";


// Array functions
$fruits = ["Apple", "Banana", "Orange"];
echo count($fruits);  // Outputs: 3
?>
        </pre>
    </div>

    <h2>Functions</h2>
    <p>Functions are blocks of code that can be reused throughout your program.</p>
    <div class="code-block">
        <pre>
<?php
// Basic function
function writeMsg() {
    echo "Hello world!";
    echo "<br>";
}
writeMsg();

// Function with parameters
function familyName($fname) {
    echo "$fname Refsnes.<br>";
}
familyName("Jani");
familyName("Hege");
familyName("Stale");
familyName("Kai Jim");
familyName("Borge");

// Function with default parameter value
function setHeight($minheight = 50) {
    echo "The height is : $minheight <br>";
}
setHeight(350);
setHeight(135);
setHeight(80);

// Function returning values
function sum($x, $y) {
    $z = $x + $y;
    return $z;
}
echo "5 + 10 = " . sum(5, 10) . "<br>";
echo "7 + 13 = " . sum(7, 13) . "<br>";
echo "2 + 4 = " . sum(2, 4) . "<br>";


function addNumbers(int $a, int $b) {
    return $a + $b;
}
echo addNumbers(5, 5); 
?>
        </pre>
    </div>

    <h2>Variable Functions</h2>
    <p>PHP supports the concept of variable functions.</p>
    <div class="code-block">
        <pre>
<?php
function foo() {
    echo "In foo()<br>";
}

function bar($arg = '') {
    echo "In bar(); argument was '$arg'.";
}

$func = 'foo';
$func(); 

$func = 'bar';
$func('test'); 
?>
</body>
</html> 