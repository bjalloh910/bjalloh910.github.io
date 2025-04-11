<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work for the Week 9 Lab</title>
    <?php
       //add the external file
       include("php/myLib.php");

       $currentPath = dirname(__FILE__);
    $weekNr = extractFolderNumber($currentPath);
    ?>
</head>
<body>
    <?php if ($weekNr !== null): ?>
        <h1>This is work for Week <?php echo $weekNr; ?>!</h1>
    <?php else: ?>
        <h1>Could not determine the week number.</h1>
    <?php endif; ?>
</body>
</html>
