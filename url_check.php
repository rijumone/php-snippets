<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$html = file_get_contents('https://github.com/');

// echo $html;

if (strpos($html, 'Using the Hello World guide') !== false) {
    echo "Negative\n";
} else {
    echo "Positive\n";
}
exit;
?>