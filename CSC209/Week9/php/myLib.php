<?php
function extractFolderNumber($path){
    $folderName = basename(realpath($path));

    preg_match('/(\d+)$/', $folderName, $matches);

    if (isset($matches[1])) {
        return intval($matches[1]);
    } else {
        return null; 
    }
}
?>