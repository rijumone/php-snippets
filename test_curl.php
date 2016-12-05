<?php 

//echo "test curl"; 


$url = "http://localhost/cms/public/en/list-testimonials-home";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);



// echo phpinfo();
$contents = curl_exec($ch);
echo $contents;
curl_close($ch);


?>