<?php

echo "<pre>";

$filePath = 'user_path_new1/Oct';
$files = scandir($filePath);
$jsonData = '';
$mysql = mysqli_connect("localhost", "root", "");
mysqli_select_db($mysql, "30_oct_cookie_report");

// echo "<pre>";print_r($files);exit;
foreach ($files as $key => $value) {
    if ($key > 1) {
        $jsonData = file_get_contents($filePath . '/' . $value);

        $jsonArr = json_decode($jsonData, true);
// echo "<pre>";print_r($jsonArr);exit;
        mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS `30_oct_cookie_report`.`oct_path` ( `cookie_id` VARCHAR(100) NOT NULL , `first_visited_url` TEXT NOT NULL , `pb_ts` DATETIME NOT NULL , `rel_ts` DATETIME NOT NULL , PRIMARY KEY (`cookie_id`), INDEX (`pb_ts`), INDEX (`rel_ts`)) ENGINE = InnoDB;");

        foreach ($jsonArr['data'] as $cookie) {
            // echo "cookie coming thru<br>";
            // print_r($cookie);

            $first_visited_url = "";
            // $pb_ts = "";
            // $rel_ts = "";
// $policy_num = "";
// $policy_id = "";
// $transaction_ref_num = "";

            $Date = new DateTime(); //create dateTime object322945102nkjgWshbRUpguVt
            $Date->setTimezone(new DateTimeZone('Europe/London')); //set the timezone
            $earliestTs = $pb_ts = $rel_ts = $Date->format('Y-m-d H:i:s');
// echo $earliestTs;exit;
            foreach ($cookie['flow'] as $cookieFlow) {
                $conditionArr = array("https://buy.religare", "https://www.religare", "policybazaar", "http://buy.religare", "http://www.religare");
                foreach ($conditionArr as $condition) {
                    if (strpos($cookieFlow["visitedURL"], $condition) !== false) {

                        $Date = new DateTime($cookieFlow["createdAt"]); //create dateTime object
                        $Date->setTimezone(new DateTimeZone('Europe/London')); //set the timezone

                        $Ts = $Date->format('Y-m-d H:i:s');
// if($cookie['_id']=='886068941rvGYKkkiZZqlIQO'){echo $earliestTs;exit;}
                        if ($earliestTs > $Ts) {
                            echo '<br> 1: ' . $cookie['_id'] . " " . $earliestTs . ' is greater than ' . $Ts;
                            $earliestTs = $Ts;
                            $first_visited_url = $cookieFlow['visitedURL'];
// if($cookie['_id']=='886068941rvGYKkkiZZqlIQO'){echo $first_visited_url;exit;}
                            if (strpos($cookieFlow["visitedURL"], 'policybazaar') !== false) {
                                if ($pb_ts > $Ts) {
                                    echo '<br> 2: ' . $cookie['_id'] . " " . $pb_ts . ' is greater than ' . $Ts;
                                    $pb_ts = $Ts;
                                    $rel_ts = "";
                                }
                            } else {
                                if ($rel_ts > $Ts) {
                                    echo '<br> 3: ' . $cookie['_id'] . " " . $rel_ts . ' is greater than ' . $Ts;
                                    $rel_ts = $Ts;
                                    $pb_ts = "";
                                }
                            }
                        }
                    }
                }
            }

            $insertStatement = "insert into `30_oct_cookie_report`.`oct_path` values ('" . $cookie['_id'] . "','" . $first_visited_url . "','" . $pb_ts . "','" . $rel_ts . "')";
            if ($cookie['_id'] == '182576580StbwtVOKgdmLBgM') {
                echo $insertStatement . "<br><br>";
                exit;
            }
            // $ins = mysqli_query($mysql, $insertStatement);
            if (false && !$ins) {
                echo $insertStatement . "<br>";
                // die('1.Could not enter data: ' . mysqli_error($mysql));
            }
        }
    }
}
?>