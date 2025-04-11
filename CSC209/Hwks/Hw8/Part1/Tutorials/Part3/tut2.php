<!DOCTYPE html lang="en">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tutorial 2</title>
    </head>
    <body>
        <p>This file contains examples of casting, math, constants, and magic constants.</p>
        <a href="tut3.php">Next Tutorial</a>
        <?php
           $a = 5;       // Integer
           $b = 5.34;    // Float

           $a = (string) $a;
           $b = (string) $b;

           var_dump($a);
           var_dump($b);

           //math
           echo(min(0, -1, 90, 20, -849, -200) . "<br>");

           // case-sensitive constant name
           define("GOODBYE", "Have a Great Night!");
           echo GOODBYE;

           echo "<br>";

           //Magic Constants
           echo __FILE__;
        ?>
    </body>
</html>