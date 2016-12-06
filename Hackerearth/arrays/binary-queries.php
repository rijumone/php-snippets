
<?php

/*

Sample input :
5 2
1 0 1 1 0
1 2
0 1 4

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
/* The first and foremost thing to keep in mind is that the array being used here is a 1-indexed array (as opposed to a regular 0-indexed one, why the person who posted this question didn't mention it more clearly is beyond me)
Now to come to the 0 L R case.
If the input line begins with 0 then the output for that line needs to be either "ODD" or "EVEN" depending on the number formed by L to R indices from the array.
E.g. 0 1 4 input yields the string "1111"; since this is an odd number the currect output for this line is "ODD"
Similarly, 0 2 3 will yield "01" which is again "ODD".
0 1 2, will yield "10" which will trigger the output "EVEN".
Hope this helps! I am copy pasting the same to the Hint section as well hoping to be of assistance to future programmers.
Happy coding! :)
*/
?>

