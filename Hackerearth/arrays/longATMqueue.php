
<?php

/*
 * Read input from stdin and provide input before running code

  Sample input :
  4
  1 2 3 4
 
 */

$f = fopen('php://stdin', 'r');
$size = trim(fgets($f));
$arr1 = array();

$line = trim(fgets($f));
$arr = explode(" ", $line);

fclose($f);
// print_r($arr);
// exit;
$groupEnd = 1;
$lastInt = $arr[0];
for($i=1 ; $i < $size ; $i++){
  if($arr[$i]<$arr[$i-1]){
    $groupEnd++;
  }
}
echo $groupEnd;
