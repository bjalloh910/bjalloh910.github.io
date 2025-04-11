<!DOCTYPE html lang="en">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tutorial 5</title>
    </head>
    <body>
    <a href="tut5.php">Next Tutorial</a>
        
    <?php
    $filename = "bintu_file.txt";

    // Step 1: Open the file in write mode
    $file = fopen($filename, "w");

    // Step 2: Write to the file
    fwrite($file, "Hi Bintu!\nYou're learning PHP file handling 📝");

    // Step 3: Close the file
    fclose($file);

    echo "File '$filename' written successfully!";
    ?>
    </body>
</html>