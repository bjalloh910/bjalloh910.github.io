<!DOCTYPE html lang="en">
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>How to include PHP in HTML in two ways</title>
    </head>
    <body>
        <h1>This file just shows the 2 different ways to add php using echo and using html.</h1>
        <a href="tut1.php">Next Tutorial</a>
        <?php
            echo "<h1>Hello World</h1>";
            echo "This is in php code blocks";
        ?>

        <h1>Hello <?php echo "This is Embedding PHP variables inside HTML "; ?></h1>

    </body>
</html>