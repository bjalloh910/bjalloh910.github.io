<?php
    $NROWS = 6;
    $NRCOLS = 3;

    $firstNames = ["Bintu", "Alex", "Sam", "Jordan", "Riley", "Taylor"];
    $lastNames = ["Jalloh", "Smith", "Lee", "Brown", "Nguyen", "Davis"];
    $ages = [20, 21, 22, 23, 24, 25];

    $columns = [$firstNames, $lastNames, $ages];
    $headers = ["First Name", "Last Name", "Age"];
?>

<!DOCTYPE html lang="en">
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic PHP Table</title>
  <style>
    table {
      border-collapse: collapse;
      width: 60%;
      margin: 20px auto;
    }
    th, td {
      border: 1px solid #555;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<table border="1">
  <caption>Dynamic PHP Table</caption>
  <tr>
    <?php
    for ($i = 0; $i < $NRCOLS; $i++) {
      echo "<th>{$headers[$i]}</th>";
    }
    ?>
  </tr>

  <?php
  for ($row = 0; $row < $NROWS; $row++) {
    echo "<tr>";
    for ($col = 0; $col < $NRCOLS; $col++) {
      echo "<td>{$columns[$col][$row]}</td>";
    }
    echo "</tr>";
  }
  ?>
</table>

</body>
</html>
