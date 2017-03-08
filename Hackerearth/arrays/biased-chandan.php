
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

// $f = fopen('php://stdin', 'r');
$f = fopen('biased-chandan.txt', 'r');

$N = trim(fgets($f));
$sum = 0;

$rating = array();

for ($i = 0; $i < $N; $i++) {

    array_push($rating, trim(fgets($f)));
}
// unset($rating[1504]);
// print_r($rating);
for ($i = 0; $i < count($rating); $i++) {

    if (!$rating[$i] && $i) {
        // $sum += $rating[$i];
        $delKey = $i;
//        do{}
        while (!$rating[$delKey - 1]) {
            
        }
    }
}
for ($i = 0; $i < count($rating); $i++) {
    $sum += $rating[$i];
}

echo $sum;
fclose($f);
?>

