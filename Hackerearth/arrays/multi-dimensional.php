<?php

/*
 * Read input from stdin and provide input before running code

  Sample input :

  3 5
  13 4 8 14 1
  9 6 3 7 21
  5 12 17 9 3
 */
$arr1 = array(
    array(13 ,4 ,8 ,14, 1),
    array(9 ,6, 3, 7, 21),
    array(5, 12, 17, 9, 3)
);

$arr2 = array();
$rows = count($arr1);
$columns = count($arr1[0]);

for($i = 0 ; $i < $rows; $i++){
    for($j = 0 ; $j < count($arr1[$i]); $j++){
        $arr2[$j][$i] = $arr1[$i][$j];
    }
}

for($i = 0 ; $i < count($arr2); $i++){
    for($j = 0 ; $j < count($arr2[$i]); $j++){
        echo $arr2[$i][$j];
        echo " ";
    }
    echo "\n";
}

?>
