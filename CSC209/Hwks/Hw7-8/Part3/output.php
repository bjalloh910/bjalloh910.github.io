<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Echo/Print & Data Types</title>
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
    <h1>PHP Echo/Print & Data Types</h1>

    <h2>Echo and Print</h2>
    <p>Both echo and print are used to output data to the screen.</p>
    <div class="code-block">
        <pre>
<?php
// Using echo
echo "Hello World!";
echo "This is", " multiple", " parameters";

// Using print
print "Hello World!";


// Echo with HTML
echo "<h2>PHP is Fun!</h2>";
echo "Hello " . "World!";

// Variables in echo
$txt1 = "Learn PHP";
$txt2 = "W3Schools.com";
$x = 5;
$y = 4;

echo "<h2>$txt1</h2>";
echo "Study PHP at $txt2<br>";
echo $x + $y;
?>
        </pre>
    </div>

    <h2>PHP Data Types</h2>
    <p>PHP supports several data types:</p>
    <div class="code-block">
        <pre>
<?php
// String
$string = "Hello World!";
var_dump($string);

// Integer
$integer = 42;
var_dump($integer);

// Float
$float = 3.14;
var_dump($float);

// Boolean
$boolean = true;
var_dump($boolean);

// Array
$array = array("red", "green", "blue");
var_dump($array);


// NULL
$null = null;
var_dump($null);

?>
        </pre>
    </div>

    <h2>Type Checking</h2>
    <p>PHP provides functions to check data types:</p>
    <div class="code-block">
        <pre>
<?php
$string = "Hello";
$integer = 42;
$float = 3.14;
$boolean = true;
$array = array("red", "green", "blue");
$null = null;

// Type checking functions, these will return 1 if the variable is of the correct type
echo is_string($string);    
echo is_int($integer);     
echo is_float($float);      
echo is_bool($boolean);    
echo is_array($array);      
echo is_null($null);       

// Get type as string
echo gettype($string);     
echo gettype($integer);     
echo gettype($float);       
echo gettype($boolean);    
echo gettype($array);       
echo gettype($null);       
?>
        </pre>
    </div>
</body>
</html> 