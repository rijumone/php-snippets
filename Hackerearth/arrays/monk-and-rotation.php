
<?php

/*

  Sample input :
  3
  1
  10
  3
  8 3 6
  5
  4 5 1 2 3

  Sample output :
  1
  2
  2


 */
$f = fopen('php://stdin', 'r');
// $f = fopen('speed_input.txt', 'r');

$N = trim(fgets($f));
if (!$N) {
    trim(fgets($f));
}

for ($i = 0; $i < $N; $i++) {
    $nCars = trim(fgets($f));
    $speedsArr = explode(" ", trim(fgets($f)));
    $permissibleSpeed = 0;
    $nTopCars = 0;
    for ($j = 0; $j < $nCars; $j++) {
        if (!$j) {
            $permissibleSpeed = $speedsArr[$j];
            $nTopCars++;
        } else {
            if ($speedsArr[$j] < $permissibleSpeed) {
                $permissibleSpeed = $speedsArr[$j];
                $nTopCars++;
            }
        }  
    }
    echo $nTopCars . "\n";
}

fclose($f);
?>

