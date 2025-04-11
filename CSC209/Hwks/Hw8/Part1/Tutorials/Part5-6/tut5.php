<!DOCTYPE html lang="en">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tutorial 5</title>
    </head>
    <body>
        <a href="fileex.php">Previous Tutorial</a>
        <?php
            echo date("Y/m/d");
            echo "<br>";

            $file = fopen("bintu_test.txt", "w"); // creates file if it doesn't exist
            fwrite($file, "Hi Bintu! You got this 💪");
            fclose($file);

            $filename = "bintu_test.txt";

            if (file_exists($filename)) {
                $file = fopen($filename, "r"); // 'r' = read mode
                $contents = fread($file, filesize($filename));
                fclose($file);
                
                echo nl2br($contents); // this shows the text with line breaks if any
            } else {
                echo "File not found!";
            }
        ?>
    </body>
</html>