<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Tutorials</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .tutorial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .tutorial-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .tutorial-card:hover {
            transform: translateY(-5px);
        }
        .tutorial-card h2 {
            color: #2c3e50;
            margin-top: 0;
        }
        .tutorial-card p {
            color: #666;
            margin-bottom: 15px;
        }
        .tutorial-card a {
            display: inline-block;
            padding: 8px 16px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.2s;
        }
        .tutorial-card a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>PHP Tutorials</h1>
    <div class="tutorial-grid">
        <div class="tutorial-card">
            <h2>Basic Syntax & Variables</h2>
            <p>Learn about PHP syntax, variables, and basic data types.</p>
            <a href="syntax.php">Start Learning</a>
        </div>
        <div class="tutorial-card">
            <h2>Echo/Print & Data Types</h2>
            <p>Understanding output methods and PHP data types.</p>
            <a href="output.php">Start Learning</a>
        </div>
        <div class="tutorial-card">
            <h2>Type Casting & Constants</h2>
            <p>Learn about type casting and working with constants.</p>
            <a href="casting.php">Start Learning</a>
        </div>
        <div class="tutorial-card">
            <h2>Control Structures</h2>
            <p>If, else, and elseif statements in PHP.</p>
            <a href="control.php">Start Learning</a>
        </div>
        <div class="tutorial-card">
            <h2>Arrays & Functions</h2>
            <p>Working with arrays and creating functions.</p>
            <a href="arrays.php">Start Learning</a>
        </div>
    </div>
</body>
</html> 