<?php

/*
 * Read input from stdin and provide input before running code

 Sample input :

3 5
13 4 8 14 1
9 6 3 7 21
5 12 17 9 3
*/
fscanf(STDIN, "%s\n", $rowsCols);
echo $rowsCols;
$temp = explode(" ", $rowsCols);
print_r($temp);


echo "Hello World!";


?>
