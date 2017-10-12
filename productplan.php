<?php

echo "<pre>";
$arr = array();
$neededArr = array(20001004, 10001101, 12001002, 11001001, 30001006, 40001001, 40001011);
$handle = fopen("productplan.csv", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // echo $line;
        $temp = explode(",", $line);
        if (isset($temp[3])) {
            $si = array("amount"=>$temp[3],"currency"=>"inr");
            $temp2 = explode(" ", $temp[3]);
            // echo "*************";echo $temp[0];echo "<br>";print_r($temp2);
            foreach ($temp2 as $subkey => $subval) {
                // var_dump($subval)."<br>";
                if (strpos(strtolower($subval), "lac") > -1 || strpos(strtolower($subval), "lacs") > -1) {
                    // if($temp[0]=="20001004"){echo $temp2[$subkey-1]."<br>";}
                    if (isset($temp2[$subkey - 1]) && is_numeric($temp2[$subkey - 1])) {
                     	$si = array("amount"=>(int) $temp2[$subkey - 1] * 100000,"currency"=>"inr");  
                    }
                }
                if (strpos(strtolower($subval), "cr") > -1 || strpos(strtolower($subval), "crore") > -1) {
                    if (isset($temp2[$subkey - 1]) && is_numeric($temp2[$subkey - 1])) {
                     	$si = array("amount"=>(int) $temp2[$subkey - 1] * 10000000,"currency"=>"inr");
                    }
                }
                // echo $temp[3];
                if (strpos(strtolower($temp[3]), "usd") > -1) {
                    $temp3 = explode("USD ", $temp[3]);
                    foreach ($temp3 as $k => $v) {
                        if ($v % 10 == 0) {
                     		$si = array("amount"=>(int) $v,"currency"=>"usd");
                        }
                    }
                }
                if (strpos(strtolower($temp[3]), "rs.") > -1) {
                    $temp3 = explode("Rs. ", $temp[3]);
                    // $set = false;
                    if ($temp[0] == 12001002) {
                        $si = array("amount"=>(int) (str_replace(" X", "", $temp3[1])),"currency"=>"inr");
                    } elseif ($temp[0] == 20004001) {
                        // print_r($temp3);
                    } else {
                        foreach ($temp3 as $k => $v) {
                            if ($v % 10 == 0) {
                                $si = array("amount"=>(int) $v,"currency"=>"inr");
                            }
                        }
                    }
                }
                if (strpos(strtolower($temp[3]), "euro") > -1) {
                    $temp3 = explode("EURO ", $temp[3]);
                    foreach ($temp3 as $k => $v) {
                        if ($v % 10 == 0) {
                              $si = array("amount"=>(int) $v,"currency"=>"eur");
                        }
                    }
                }
                if (strpos(strtolower($temp[3]), "$ ") > -1) {
                    $temp3 = explode("$ ", $temp[3]); //print_r($temp3);
                    foreach ($temp3 as $k => $v) {
                        if ($v % 10 == 0) {
                         	$si = array("amount"=>(int) $v,"currency"=>"usd");
                        }
                    }
                }
                if (strpos(strtolower($temp[3]), "$") > -1) {
                    $temp3 = explode("$", $temp[3]); //print_r($temp3);
                    foreach ($temp3 as $k => $v) {
                        if ($v % 10 == 0) {
                            $si = array("amount"=>(int) $v,"currency"=>"usd");
                        }
                    }
                }
            }
            if (in_array($temp[0], $neededArr) || true) {
                $arr[$temp[0]][$temp[2]] = $si;
            }
        }
    }
    fclose($handle);
} else {
    // error opening the file.
}
// print_r($arr);exit;
echo json_encode($arr);
?>