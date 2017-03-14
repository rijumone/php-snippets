
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
// $f = fopen('php://stdin', 'r');
$f = fopen('speed_input.txt', 'r');

$N = trim(fgets($f));
if (!$N) {
    trim(fgets($f));
}

for ($i = 0; $i < $N; $i++) { //echo '$N: '. $N;
    $nCars = trim(fgets($f));
    $speedsArr = explode(" ", trim(fgets($f)));
    print_r($speedsArr);
    $topSpeed = 0;
    $nTopCars = 0;
    for ($j = 0; $j < $nCars; $j++) {//echo '$nCars: '.$nCars."\n";
        if ($speedsArr[$j] > $topSpeed) {
            $topSpeed = $speedsArr[$j];
        }
   
        if (!$j) {
            $nTopCars++;
        }
        if ($topSpeed < $speedsArr[$j]) {
         echo '$nTopCars: ' . $nTopCars . "\n";   
         echo '$topSpeed: ' . $topSpeed . "\n";   
         echo '$speedsArr[$i]: ' . $speedsArr[$j] . "\n";   
         echo '$nTopCars: ' . $nTopCars . "\n";   
         echo '================================== '. "\n";   
         $nTopCars++;
        }
        // }      
    }
    echo ">>>>>>>>>>>>>>> " . $nTopCars . " <<<<<<<<<<<<<<<<<\n";
}

fclose($f);
?>

