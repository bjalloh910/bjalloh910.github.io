<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Control Structures</title>
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
    <h1>PHP Control Structures</h1>

    <h2>If Statement</h2>
    <p>The if statement executes some code if one condition is true.</p>
    <div class="code-block">
<?php
$t = date("H");

if ($t < "20") {
    echo "Have a good day!<br>";
}

?>
    </div>

    <h2>If...Else Statement</h2>
    <p>The if...else statement executes some code if a condition is true and another code if that condition is false.</p>
    <div class="code-block">
<?php
$t = date("H");

if ($t < "20") {
    echo "Have a good day!<br>";
} else {
    echo "Have a good night!<br>";
}
?>
    </div>

    <h2>If...Elseif...Else Statement</h2>
    <p>The if...elseif...else statement executes different codes for more than two conditions.</p>
    <div class="code-block">
<?php
$t = date("H");

if ($t < "10") {
    echo "Have a good morning!<br>";
} elseif ($t < "20") {
    echo "Have a good day!<br>";
} else {
    echo "Have a good night!<br>";
}
?>
    </div>

    <h2>Switch Statement</h2>
    <p>The switch statement is used to perform different actions based on different conditions.</p>
    <div class="code-block">
<?php
$favcolor = "red";

switch ($favcolor) {
    case "red":
        echo "Your favorite color is red!<br>";
        break;
    case "blue":
        echo "Your favorite color is blue!<br>";
        break;
    case "green":
        echo "Your favorite color is green!<br>";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!<br>";
}
?>
    </div>
</body>
</html> 