<?php

$dir = getcwd();
$files1 = scandir($dir);
//$files2 = scandir($dir, 1);

print_r($files1);
//print_r($files2);

foreach ($files1 as $key => $file) {
    $temp = explode(".", $file);
    if ($temp[1] == "xml") {
        unlink($files1[$key]);
        echo "\ndeleted file: " . $files1[$key];
    }
}
?>