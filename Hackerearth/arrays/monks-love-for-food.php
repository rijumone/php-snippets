
<?php

/*

  Sample input :
  6
  1
  2 5
  2 7
  2 9
  1
  1

  Sample output :
  No Food
  9
  7

 */

$f = fopen('php://stdin', 'r');

$N = trim(fgets($f));
$arr = array();

for ($i = 0; $i < $N; $i++) {

    $temp = explode(" ", trim(fgets($f)));
    if (!empty($temp[1])) {
        array_push($arr, $temp[1]);
    } else {
        if (!empty($arr)) {
            echo $arr[count($arr) - 1];
            array_pop($arr);
            echo "\n";
        } else {
            echo "No Food";
            echo "\n";
        }
    }
}

fclose($f);
?>

