
<?php

/*

  Sample input :
  2
  3 4
  1 2 5
  3 2
  2 5 5

  Sample output :
  3
  0

 */

$f = fopen('php://stdin', 'r');
$temp = explode(" ", trim(fgets($f)));
// print_r($temp);exit;
$testCases = $temp[0];
for ($i = 0; $i < ($testCases); $i++) {
    $arr = explode(" ", trim(fgets($f)));
    $N = $arr[0];
    $K = $arr[1];

    $arr = explode(" ", trim(fgets($f)));

    $largestDiff = 0;

    for ($j = 0; $j < $N; $j++) {
        if (($K - $arr[$j]) > $largestDiff) {
            $largestDiff = $K - $arr[$j];
        }
        // echo "$largestDiff : ".$largestDiff."\n";
    }
    echo ($largestDiff) ? $largestDiff : "0";
    echo "\n";
}
// print_r($arr1);exit;
fclose($f);
// print_r($arr1);
// exit;
?>

