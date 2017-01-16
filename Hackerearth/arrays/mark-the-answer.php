<?php

/*
    Sample input :
    
    7 6
    4 3 7 6 7 2 2

    3 2
    4 5 1
 
*/

$f = fopen('php://stdin', 'r');
$temp = explode(" ", trim(fgets($f)));
// print_r($temp);exit;
$nQ = $temp[0];
$skill = $temp[1];

$f = fopen('php://stdin', 'r');
$q = explode(" ", trim(fgets($f)));
fclose($f);
// $inputArrs = array();
$score = 0;
$skippedQ = 0;
for ($i = 0; $i < $nQ; $i++) {
    // echo "\n"; echo '$i='.$i; echo "\n"; echo '$q[$i]='.$q[$i];  echo "\n"; 
    if ($q[$i] <= $skill && $skippedQ <= 1) {
        $score++;
        // echo '$score='.$score;	 echo "\n";
    } else {
        $skippedQ++;
        // echo "\n"; echo '$skippedQ='.$skippedQ;echo "\n"; 
        // $score = 0;
    }
    if ($skippedQ > 1) {
        break;
    }
}


// echo "===ans===";echo "\n";
echo $score;
?>

