<?php
// Defining the number of rows and columns
define("NROWS", 6);
define("NRCOLS", 3);

// Creating arrays for each column
$firstNames = array("John", "Jane", "Mike", "Sarah", "David", "Emma");
$lastNames = array("Smith", "Johnson", "Williams", "Brown", "Jones", "Garcia");
$ages = array(25, 30, 35, 28, 32, 27);

// Have to make sure array sizes match NROWS
if (count($firstNames) !== NROWS || count($lastNames) !== NROWS || count($ages) !== NROWS) {
    die("Error: Array sizes must match NROWS");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table with Arrays</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f5f5f5;
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
    <a href="../startpage.html" class="nav-link">← Back to Start Page</a>
    <h1>Dynamic Table with Arrays</h1>
    
    <p>This table shows <?php echo NROWS; ?> people with <?php echo NRCOLS; ?> columns of information.</p>
    
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < NROWS; $i++) {
                echo "<tr>";
                echo "<td>" . $firstNames[$i] . "</td>";
                echo "<td>" . $lastNames[$i] . "</td>";
                echo "<td>" . $ages[$i] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html> 