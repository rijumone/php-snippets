<?php
$arr = array();
$handle = fopen("productplan.csv", "r");
if ($handle) {
	while (($line = fgets($handle)) !== false) {
        // echo $line;
		$temp = explode(",", $line);
		$temp2 = explode(" ", $temp[3]);
		$si = $temp[3];
		if(isset($temp2[1])){
			if(strtolower($temp2[1])=="lac" || strtolower($temp2[1])=="lacs"){
				$si = $temp[0] * 100000;
			}	
		}
		$arr[$temp[0]][$temp[2]] = array(
			$si
			);
		}
	fclose($handle);
} else {
    // error opening the file.
} 
print_r($arr[10001101]);
?>