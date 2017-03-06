
<?php

/*

Sample input :
2
3 4
1 2 5
3 2
2 5 5

*/

$f = fopen('php://stdin', 'r');
$temp = explode(" ", trim(fgets($f)));
// print_r($temp);exit;
$size = $temp[0];
$nQueries = $temp[1];

$arr1 = explode(" ", trim(fgets($f)));

for ($i = 1; $i < ($nQueries+1); $i++) {
    $input = explode(" ", trim(fgets($f)));
    if($input[0]){
      $arr1[($input[1]-1)] =  ($arr1[($input[1]-1)]) ? 0 : 1; 
    }else{
      echo ($arr1[($input[2]-1)]) ? "ODD" : "EVEN";
      echo "\n";
    }
}
// print_r($arr1);exit;
fclose($f);
// print_r($arr1);
// exit;
?>

