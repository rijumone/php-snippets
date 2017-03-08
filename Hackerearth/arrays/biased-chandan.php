
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
 $temp = array(3,0,8,0,0,4);
 $last = 0;
$f = fopen('biased-chandan.txt', 'r');

$N = trim(fgets($f));
$sum = 0;

$temp = array();

for ($i = 0; $i < $N; $i++) {
    $temp[] = trim(fgets($f));
}
// $N=6;
$sum = 0;
 for($i = 0; $i < $N; $i++){
    if($temp[$i] == 0){
      if($last >= 0){
        $sum -= $temp[$last];
        unset($temp[$last]); 
        unset($temp[$i]);
        $last--;

      }else{
        unset($temp[$i]);
        $last = $temp[$i+1];
      }
      
    }else{
      $sum += $temp[$i];
      $last = $i;
    }
 }

echo $sum;exit;
// $f = fopen('php://stdin', 'r');
unset($rating[1504]);
// print_r($rating);
for ($i = 0; $i < count($rating); $i++) {
    
}
for ($i = 0; $i < count($rating); $i++) {
    $sum += $rating[$i];
}

echo $sum;
fclose($f);
?>

