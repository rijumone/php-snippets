<?php  
echo phpinfo();exit;
$url = "http://localhost/ajax_check.php";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);



echo phpinfo();
$contents = curl_exec($ch);
echo $contents;
curl_close($ch);


?>