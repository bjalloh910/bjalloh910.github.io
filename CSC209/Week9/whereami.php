<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Where Am I?</title>
    <?php
        $folderName = basename(realpath(dirname(__FILE__)));
        echo $folderName;
        echo "<br>";
        $weekNrString = substr($folderName, -1);
        echo $weekNrString;

        $weekNr = null;
        
        // check to if the characters are digits and if so conver it into an number
        if (ctype_digit($weekNrString)) {
            $weekNrString = intval($weekNrString);
        } else {
            $weekNr = 0;
        }
    ?>
</head>
<body>
    <h1>This page figures out its whereabouts</h1>

    <h1>Welcome to Week <?php echo $weekNrString; ?>!</h1>

    <p>My week number is <?php echo $weekNr; ?></p>
</body>
</html>
