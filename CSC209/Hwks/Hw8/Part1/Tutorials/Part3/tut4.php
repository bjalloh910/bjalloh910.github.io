<!DOCTYPE html lang="en">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tutorial 4</title>
    </head>
    <body>
        <p>This file contains examples of loops, functions, and arrays in php.</p>
        <?php
        
            $i = 1;

            while ($i < 6) {
              echo $i;
              $i++;
            }

            echo "<br>";

            $l = 1;

            do {
                echo $l;
                    $l++;
            } while ($l < 6);

            echo "<br>";

            $colors = array("Dermatologist", "Neurologist", "Cardiologist", "Anesthesiologist");

            foreach ($colors as $x) {
                echo "$x <br>";
            }

            echo "<br>";

            function myMessage() {
                echo "Hello world!";
            }
              
            myMessage();

            echo "<br>";

            $colors = array("pink", "orange", "green");
            var_dump($colors);
            echo "<br>";
            echo count($colors);
            echo "<br>";
            sort($colors);

            $clength = count($colors);
            for($x = 0; $x < $clength; $x++) {
                echo $colors[$x];
                echo "<br>";
            }

        ?>
    </body>
</html>