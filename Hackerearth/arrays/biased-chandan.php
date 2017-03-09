
<?php

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
$temp = array(3, 0, 8, 0, 0, 4);
$last = 0;

/*
  $temp = array();

  for ($i = 0; $i < $N; $i++) {
  $temp[] = trim(fgets($f));
  }
  // $N=6;
  $sum = 0;
  for ($i = 0; $i < $N; $i++) {
  if ($temp[$i] == 0) {
  if ($last >= 0) {
  $sum -= $temp[$last];
  unset($temp[$last]);
  unset($temp[$i]);
  $last--;
  } else {
  unset($temp[$i]);
  $last = $temp[$i + 1];
  }
  } else {
  $sum += $temp[$i];
  $last = $i;
  }
  }

  echo $sum;
  exit;
 */

// unset($rating[1504]);
// print_r($rating);
// $f = fopen('php://stdin', 'r');
$f = fopen('biased-chandan.txt', 'r');

$N = trim(fgets($f));
if(!$N){trim(fgets($f));}
$sum = 0;
$rating = array();

for ($i = 0; $i < $N; $i++) {
    $rating[] = trim(fgets($f));
}
$zeroKeys = array();
$lastZero = false;
for ($i = 0; $i < $N; $i++) {

    if (!$rating[$i]) {
      // unset($rating[$i]);
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
        // $zeroKeys[$i] = ($lastZero) ? ($zeroKeys[$i] + 1) : 1;
        $lastZero = true;
    } else {
        $lastZero = false;
    }
}
$negativeSum = 0;
// print_r($zeroKeys);
foreach ($zeroKeys as $key => $val) {
    for ($i = 1; $i <= $val; $i++) {
        $negativeSum += $rating[$key - $i];
        // echo $rating[$key - $i]."\n";
    }
}

// foreach ($rating as $key => $val) {
//     if (!$val) {
//         // unset($rating[$key]);
//         $delKey = $key - 1;
//         // echo "========".$rating[$delKey]."========";exit;
//         echo "========".$delKey."========\n";
//        /* while (!$rating[$delKey]) {
//             unset($rating[$delKey]);
//             $delKey = $key -1;
//         }*/
//     }
// }
for ($i = 0; $i < count($rating); $i++) {
    $sum += $rating[$i];
}

echo $sum - $negativeSum;
fclose($f);
?>

