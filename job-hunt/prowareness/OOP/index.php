<?php

include("class_lib.php");


$riju = new Person();
$sam = new Person();
$sar = new Person("sarthak");

$riju->set_name("rijumone");
$sam->set_name("sumit");

echo $riju->get_name();
echo "\n";
echo $sam->get_name();
echo "\n";
echo $sar->get_name();
echo $sar->get_pin();

?>