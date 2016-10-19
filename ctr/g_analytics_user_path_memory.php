<?php
  $URL="analytics.religarehealthinsurance.com/user/path";
  $URL1="analytics.religarehealthinsurance.com/user/payment";
  $reportPath="user_path_new/";
  $reportPath1="user_path_new/payment/";

  $array=array("startDate"=>"","endDate"=>"");

  $mon=array("Aug","Sep","Oct");
  echo "<pre>";
  $timeList=array("06","12","18","24");
  for ($j=0; $j < sizeof($mon); $j++) { 
    for ($i=1; $i <32 ; $i++) { 
      for ($k=0; $k < sizeof($timeList) ; $k++) { 
        if ($k==0) {
          $array["startDate"]="Sun ".$mon[$j]." ".$i." 2016 00:00:00 GMT+0530 (India Standard Time)";
          $array["endDate"]="Mon ".$mon[$j]." ".$i." 2016 ".(intval($timeList[$k])-1).":59:59 GMT+0530 (India Standard Time)";
        }
        else{
          $array["startDate"]="Sun ".$mon[$j]." ".$i." 2016 ".(intval($timeList[$k-1])).":00:00 GMT+0530 (India Standard Time)";
          $array["endDate"]="Mon ".$mon[$j]." ".$i." 2016 ".(intval($timeList[$k])-1).":59:59 GMT+0530 (India Standard Time)";
        }
        // print_r($array);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 600);
        curl_setopt($ch, CURLOPT_POST,1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($array));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
        $jsonResponse = curl_exec($ch);
        $ch_info = curl_getinfo($ch);
        curl_close($ch);
        if (!file_exists($reportPath.$mon[$j])) {
          mkdir($reportPath.$mon[$j]);
        }
        $fp=fopen($reportPath.$mon[$j]."/analytics_".($i)."_".$mon[$j]."_".$timeList[$k].".json", "w");
        fwrite($fp, $jsonResponse);
        fclose($fp);




        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $URL1);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_VERBOSE, true);
        // curl_setopt($ch, CURLOPT_TIMEOUT, 600);
        // curl_setopt($ch, CURLOPT_POST,1 );
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($array));
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
        // $jsonResponse = curl_exec($ch);
        // $ch_info = curl_getinfo($ch);
        // curl_close($ch);
        // if (!file_exists($reportPath1.$mon[$j])) {
        //   mkdir($reportPath1.$mon[$j]);
        // }
        // $fp=fopen($reportPath1.$mon[$j]."/analytics_".($i)."_".$mon[$j]."_".$timeList[$k].".json", "w");
        // fwrite($fp, $jsonResponse);
        // fclose($fp);
      }
    }
  }
  echo "Data retrieval Completed.";
?>