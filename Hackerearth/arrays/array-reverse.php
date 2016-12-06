
<?php

/*
 * Read input from stdin and provide input before running code

  Sample input :
  5
  4
  12
  7
  15
  9
 */

$f = fopen('php://stdin', 'r');
$size = trim(fgets($f));
$arr1 = array();
for ($i = 0; $i < $size; $i++) {
    $line = trim(fgets($f));
    $arr1[] = $line;
}

fclose($f);
print_r($arr1);
// exit;
for ($i = 0; $i < $size; $i++) {
    echo $arr1[$size - ($i+1)];
    echo "\n";
}
?>
