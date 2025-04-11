<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work for the Week 9 Lab</title>
</head>
<body>
    <form action="saveUsers.php" method="post">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" value="john.doe"><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" value="123456"><br><br>
      <input type="submit" value="Submit">
    </form>

    <?php
   
    function extractFolderNumber($path) {
       
        $folderName = basename($path);
        
        
        if (preg_match('/Lab(\d+)/', $folderName, $matches)) {
            return $matches[1];
        }
        
        return null;
    }
    
    $currentPath = dirname(__FILE__);
    $labNr = extractFolderNumber($currentPath);
    
    if ($labNr !== null): ?>
        <h1>This is work for Lab <?php echo $labNr; ?>!</h1>
    <?php else: ?>
        <h1>Could not determine the Lab number.</h1>
    <?php endif; ?>
    
</body>
</html>
