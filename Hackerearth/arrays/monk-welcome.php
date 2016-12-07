
<?php

/*
  Sample input :
5
1 2 3 4 5
4 5 3 2 10
 */

$f = fopen('php://stdin', 'r');
$size = trim(fgets($f));
$inputArrs = array();

for ($i = 0; $i < 2; $i++) {
    $inputArrs[] = explode(" ", trim(fgets($f)));
}


fclose($f);
// print_r($inputArrs);
// exit;


for ($i = 0; $i < $size; $i++) {
    echo ($inputArrs[0][$i]+$inputArrs[1][$i]);
    echo " ";
}
?>

