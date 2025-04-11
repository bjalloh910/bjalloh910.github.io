<!DOCTYPE html lang="en">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My first PHP page</title>
    </head>
    <body>
        <h1>My first PHP page</h1>
        <p>This file contains examples of syntax, comments, variables, and using echo.</p>
        <a href="tut2.php">Next Tutorial</a>
        <?php
            echo "Hello World!<br>"; // This is a single-line comment
            
            $x = 10;
            $y = "hello";
            echo "Come say $y!<br>";

            $num = 22;
            var_dump($num);
            echo "<br>";

            $greeting = "Good Morning";
            var_dump($greeting);
        ?>
    </body>
</html>