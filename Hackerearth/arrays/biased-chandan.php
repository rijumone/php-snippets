
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
    if ($rating[$i]) {
        $sum += $rating[$i];
    } else {
        if ($i) {
            $sum -= $rating[$i - 1];
        }
    }
}
echo $sum;
fclose($f);
?>

