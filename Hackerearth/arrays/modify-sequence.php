<?php

/*
  Sample input :
  2
  1 2
 */

// $f = fopen('php://stdin', 'r');
// ini_set('memory_limit', '-1');
$f = fopen('modify-sequence1.txt', 'r');
$size = trim(fgets($f));
// $inputArrs = array();
// for ($i = 0; $i < 2; $i++) {
$inputArrs = explode(" ", trim(fgets($f)));
// }


fclose($f);
$flagAllPositive = true;
modifySequence($inputArrs,$flagAllPositive);

// print_r($inputArrs);
// exit;
// $flag = true;

// echo ($flag) ? "YES" : "NO";

function modifySequence($arr,$flagAllPositive) {
    
    for ($i = 0; $i < (count($arr) - 1); $i++) {
        $arr[$i] = ($arr[$i] - 1);
        $arr[$i + 1] = ($arr[$i + 1] - 1);
        if ($arr[$i] < 0 || $arr[$i + 1] < 0) {
            echo '$arr[$i] : ' . $arr[$i] . "\n" . '$arr[$i + 1] : '. $arr[$i + 1] . "\n";
            $flagAllPositive = false;
            echo "NO";
            break;
        }
    }
    // print_r($arr);
    if ($flagAllPositive) {
        modifySequence($arr,$flagAllPositive);
    }
    echo "YES";
}
?>

