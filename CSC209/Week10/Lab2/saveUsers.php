<!DOCTYPE html>
<html lang="en">
<body>

<?php
// Check if username starts with 'A' (admin)
if (isset($_POST["username"]) && strpos($_POST["username"], 'A') === 0) {
    header("Location: admin.html.php");
    exit();
}
?>

Your username is <?php echo $_POST["username"]; ?><br>
Your password is: <?php echo $_POST["password"]; ?>

<?php
$file = fopen("./output/users.txt","w");
echo fwrite($file,$_POST["username"].":".$_POST["password"]);
fclose($file);
?>
</body>
</html>
