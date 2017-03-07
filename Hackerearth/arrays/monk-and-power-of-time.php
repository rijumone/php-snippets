
<?php

/*

  Sample input :
3
3 2 1
1 3 2

  Sample output :
  5

*/

$f = fopen('php://stdin', 'r');

$N = trim(fgets($f));

$arr1 = explode(" ", trim(fgets($f)));
$arr2 = explode(" ", trim(fgets($f)));

$time = 0;
for ($i = 0; $i < ($N); $i++) {
    if ($arr1[$i] != $arr2[$i]) {
        $time++;
    }echo $time."\n";
    $time++;
}
echo $time;
fclose($f);
?>

