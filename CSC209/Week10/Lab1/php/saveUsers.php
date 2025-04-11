<html>
<body>

Your username is <?php echo $_POST["username"]; ?><br>
Your password is: <?php echo $_POST["password"]; ?>

<?php
$file = fopen("../output/users.txt","w");
echo fwrite($file,$_POST["username"].":".$_POST["password"]);
fclose($file);
?>
</body>
</html>