
<?php

error_reporting(0);
/*

  Sample input :
  5
  2
  3
  0
  7
  0

  Sample output :
  2


 */
$f = fopen('php://stdin', 'r');
// $f = fopen('biased-chandan.txt', 'r');

$N = trim(fgets($f));
if (!$N) {
    trim(fgets($f));
}
$sum = 0;
$rating = array();

for ($i = 0; $i < $N; $i++) {
    $rating[] = trim(fgets($f));
}
//print_r($rating);exit;
$zeroKeys = array();
$lastZero = false;
for ($i = 0; $i < $N; $i++) {

    if (!$rating[$i]) {
        if (count($zeroKeys)) {
            if (!$lastZero) {
                $zeroKeys[$i] = 1;
            } else {
                $lastKey = 0;
                foreach ($zeroKeys as $foo => $bar) {
                    $lastKey = $foo;
                }
                $zeroKeys[$lastKey] ++;
            }
        } else {
            $zeroKeys[$i] = 1;
        }
        $lastZero = true;
    } else {
        $lastZero = false;
    }
}
// print_r($zeroKeys);
foreach ($zeroKeys as $key => $val) {
    for ($i = 1; $i <= $val; $i++) {
        // echo '$key: '. ($key - $i) . "\n";
        // echo ($key - $i) . " : " . $rating[$key - $i]."\n";

        if (!$rating[$key - $i]) {
            $delKey = $key - $i - 1;
            while (!$rating[$delKey]) {
                $delKey--;
            }
            // echo $delKey . " : " . $rating[$delKey]."\n";
            unset($rating[$delKey]);
        }
        unset($rating[$key - $i]);
        // echo $rating[$key - $i]."\n";
    }
}

foreach ($rating as $key => $val) {
    $sum += $val;
}

echo $sum;
fclose($f);
?>

