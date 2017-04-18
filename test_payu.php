<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
// Merchant key here as provided by Payu
try{
$key = "gtKFFx";
$salt = "eCwWELxi";
$command = "getNetbankingStatus";
$var1 = "default"; // ibibo_code
//$var2 = "4675764";//"7893238";// to be used in case of refund
//$var3 = "500";// to be used in case of refund

$hash_str = $key  . '|' . $command . '|' . $var1 . '|' . $salt ;
$hash = strtolower(hash('sha512', $hash_str));

    $r = array('key' => $key , 'hash' =>$hash , 'var1' => $var1, 'command' => $command);
    
    $qs= http_build_query($r);
    $wsUrl = "https://test.payu.in/merchant/postservice.php?form=1";
    //$wsUrl = "https://info.payu.in/merchant/postservice?form=1";
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $wsUrl);
    // echo "<pre>";print_r($qs);exit;
    curl_setopt($c, CURLOPT_POST, 1);
    curl_setopt($c, CURLOPT_POSTFIELDS, $qs);
    curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
  echo 1234;  
        $o = curl_exec($c);
  
    var_dump($o);exit;
    
    curl_close($c);

    $valueSerialized = @unserialize($o);
    if($o === 'b:0;' || $valueSerialized !== false) {
      print_r($valueSerialized);
    }
    print_r($o);
      }catch(Exception $e){echo 123; echo $e->getMessage();exit;}
?>