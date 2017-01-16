<?php
$f = fopen('php://stdin', 'r');
echo "this will print main method argument if passed\nthe way needed by you\nEnter the line to read\nif you type your first name the program will exit.\n";
while($line = fgets($f)){
  echo "you entered:",$line,"\n";
  if(trim($line)=="sumit")    exit;  
  echo "type more below : \n";  
}