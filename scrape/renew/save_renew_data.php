<?php
header('Access-Control-Allow-Origin: *');

$line = '';

$f = fopen('tilldate.txt', 'r');
$cursor = -1;

fseek($f, $cursor, SEEK_END);
$char = fgetc($f);

/**
 * Trim trailing newline chars of the file
 */
while ($char === "\n" || $char === "\r") {
    fseek($f, $cursor--, SEEK_END);
    $char = fgetc($f);
}

/**
 * Read until the start of file or first newline char
 */
while ($char !== false && $char !== "\n" && $char !== "\r") {
    /**
     * Prepend the new char
     */
    $line = $char . $line;
    fseek($f, $cursor--, SEEK_END);
    $char = fgetc($f);
}

// echo $line;
// echo "<pre>";print_r($_REQUEST);exit;
$txt = $_REQUEST['name'] . "," . $line;
$myfile = file_put_contents('logs.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);

$txt = ++$line;
$myfile = file_put_contents('tilldate.txt', $txt.PHP_EOL , FILE_APPEND | LOCK_EX);


echo $txt;

 ?>