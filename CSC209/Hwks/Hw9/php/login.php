<?php
// Always set content type to JSON
header('Content-Type: application/json');

// Get username and password from POST data
$username = isset($_POST["uname"]) ? $_POST["uname"] : "";
$password = isset($_POST["psw"]) ? $_POST["psw"] : "";


$newData = [
    "username" => $username,
    "password" => $password,
    "date" => date('Y-m-d H:i:s')
];

// Check if username starts with 'A' (admin)
if (strpos($username, 'A') === 0) {
    echo json_encode(["success" => true, "redirect" => "admin.html.php"]);
    exit();
}

$filepath = "../output/users.json";

$loginData = [];

if (file_exists($filepath)) {
    //read the file contents in
    $file = fopen($filepath, "r");
    $json = fread($file, filesize($filepath));
    fclose($file);

    // turn the data into json format
    $loginData = json_decode($json, true);
    if (!is_array($loginData)) $loginData = [];
}

$loginData[] = $newData; //add the new data

$file = fopen($filepath, "w");
fwrite($file, json_encode($loginData, JSON_PRETTY_PRINT));
fclose($file);

echo json_encode(["success" => true, "message" => "Login successful"]); //make the text into a json bc the javascript only handles json
?>
