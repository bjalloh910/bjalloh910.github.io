<!DOCTYPE html lang="en">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tutorial 3</title>
    </head>
    <body>
        <p>This file contains examples of operators, if statements, and switch cases.</p>
        <a href="tut4.php">Next Tutorial</a>
        <?php
            //operators
            $x = 10;
            $y = 6;
            
            echo $x - $y;
            echo "<br>";

            $a = 10;
            $b = 6;

            echo $x + $y;
            echo "<br>";

            // if statements
            $t = 14;

            if ($t < 20) {
                echo "Have a good day!<br>";
            } else {
                echo "Have a good night!<br>";
            }

            // switch statement
            $favcolor = "red";

            switch ($favcolor) {
                case "red":
                echo "Your favorite color is red!";
                break;
            case "blue":
                echo "Your favorite color is blue!";
                break;
            case "green":
                echo "Your favorite color is green!";
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
            }

        ?>
    </body>
</html>