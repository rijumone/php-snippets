
<?php

/*
 * Read input from stdin and provide input before running code

  Sample input :
  4
  1 2 3 4
 
 */

$f = fopen('php://stdin', 'r');
$nTestCases = trim(fgets($f));
for($i=0 ; $i < $nTestCases ; $i++){
	$size = trim(fgets($f));
	$arr = trim(fgets($f));
	$arr = explode(" ", $arr);
	$min = $arr[0];
	$freqCount = array();
	for($j = 0; $j < $size ; $j++){
		if(empty($freqCount[$arr[$j]])){
			$freqCount[$arr[$j]] = 0;
		}
		$freqCount[$arr[$j]]++;
		if($arr[$j] < $min){
			$min = $arr[$j];	
		}
	}
	if($freqCount[$min] % 2 == 0){
		echo "Unlucky\n";
	}else{
		echo "Lucky\n";
	}
	// echo $min;echo "\n";	
	// print_r($arr);
	// print_r($freqCount);
}
fclose($f);

// exit;
