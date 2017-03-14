
<?php

/*

  Sample input :
  1
  5 2
  1 2 3 4 5

  5 1 2 3 4

  5

  Sample output :
  4 5 1 2 3

 */
// $f = fopen('php://stdin', 'r');
$f = fopen('monk-and-rotation.txt', 'r');

$T = trim(fgets($f));

for ($k = 0; $k < $T; $k++) {

    $temp = explode(" ", fgets($f));
    $N = $temp[0];
    
    // echo "\n";
    $nRotations = $temp[1];
    // echo "\n";
    $arr = explode(" ", trim(fgets($f)));
    // print_r($arr);
    $arr2 = array();
    for ($i = 0; $i < $nRotations; $i++) {
        for ($j = 0; $j < $N; $j++) {
            if (!$j) {
                $arr2[$j] = $arr[$N - 1];
            } else {
                $arr2[$j] = $arr[$j - 1];
            }
        }
        $arr = $arr2;
    }
    for ($i = 0; $i < $N; $i++) {
        echo $arr[$i] . " ";
    }
    echo "\n";
}

fclose($f);
?>

