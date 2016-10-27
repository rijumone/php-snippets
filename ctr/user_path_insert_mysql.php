<!DOCTYPE html>
<html>
    <head>
        <title>User path exporter</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- <script src="jquery.js"></script> -->
    </head>
    <body>
        <?php
        ini_set("memory_limit", -1);
        ini_set('max_execution_time', 100000);
        ini_set('display_errors', 1);
        $reportPath = "user_path_new/";
        $reportPath1 = "user_path_new/payment/";

//        $mon = array("Aug", "Sep", "Oct");
        $mon = array("Sep");
        $condition = array("https://buy.religare", "https://www.religare", "policybazaar", "http://buy.religare", "http://www.religare");

        $cookieID1 = array();
        $sessionID1 = array();
        $createdAt1 = array();
        $policyId1 = array();
        $transactionRefNum1 = array();
        $uwDicision1 = array();
        $policyNum1 = array();
        for ($j = 0; $j < sizeof($mon); $j++) {
            $cookieID = array();
            // $sessionID=array();
            $createdAt = array();
            $visitedURL = array();
            $baseURL = array();

            $start = 1;
            $array1 = array("06", "12", "18", "24");
            for ($i = 1; $i < 32; $i++) {
                // echo $mon[1]."-".$i."<br>";
                foreach ($array1 as $ts) {
                    $count = 0;
                    // $file = $reportPath1 . $mon[$j] . "/analytics_" . ($i) . "_" . $mon[$j] . "_" . $ts . ".json";
                    $file = $reportPath . $mon[$j] . "/analytics_" . ($i) . "_" . $mon[$j] . "_" . $ts . ".json";
                    // echo $file."<br>";
                    if (file_exists($file)) {
                        $string = file_get_contents($file);
                        if (strlen($string) > 0) {
                            $json = json_decode($string, true)["data"];
                            print_r($json);
                            if (sizeof($json) > 0) {
                                foreach ($json as $key => $value) {
                                    foreach ($value["flow"] as $key1 => $value1) {
// echo "<pre>";print_r($value);
                                        foreach ($condition as $key2 => $value2) {
                                            if (isset($value1["visitedURL"]) && strpos($value1["visitedURL"], $value2) !== false) {
                                                $count+=1;
                                                array_push($cookieID, $value1["cookieID"]);
                                                // array_push($sessionID, $value1["sessionID"]);
                                                array_push($createdAt, $value1["createdAt"]);
                                                array_push($visitedURL, $value1["visitedURL"]);
                                                array_push($baseURL, $value1["baseURL"]);
                                            }
                                        }

                                        /*
                                          $count+=1;
                                          array_push($cookieID1, $value1["cookieID"]);
                                          array_push($policyId1, $value1["policyId"]);
                                          array_push($transactionRefNum1, $value1["transactionRefNum"]);
                                          array_push($policyNum1, $value1["policyNum"]);
                                          array_push($uwDicision1, $value1["uwDicision"]);
                                          array_push($createdAt1, $value1["createdAt"]);
                                         */
                                    }
                                }
                            }
                        }
                        // echo sizeof($cookieID)."<br>";
                    }
                    echo "Entries on $i-$mon[$j] at $ts hours are :" . $count . "<br>";
                }
            }

            echo "Inserting " . sizeof($cookieID) . " datas into DB<br>";
            $mysql = mysql_connect("localhost", "root", "");
            mysql_select_db("customer_path_new");

            $customer_path_table_create = "CREATE TABLE IF NOT EXISTS customer_path_" . $mon[$j] . " ( si int(11) NOT NULL AUTO_INCREMENT, cookie_id varchar(1000) NOT NULL, url varchar(1000) NOT NULL, baseurl varchar(1000) NOT NULL, ts timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (si))";


            $pb_table_create = "CREATE TABLE IF NOT EXISTS pb_" . $mon[$j] . " ( si int(11) NOT NULL AUTO_INCREMENT, cookie_id varchar(1000) NOT NULL, url varchar(1000) NOT NULL, baseurl varchar(1000) NOT NULL,  ts timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (si))";

            $rel_table_create = "CREATE TABLE IF NOT EXISTS rel_" . $mon[$j] . " ( si int(11) NOT NULL AUTO_INCREMENT, cookie_id varchar(1000) NOT NULL, url varchar(1000) NOT NULL, baseurl varchar(1000) NOT NULL,  ts timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (si))";

            $payment_table_create = "CREATE TABLE IF NOT EXISTS payment_" . $mon[$j] . " ( si int(11) NOT NULL AUTO_INCREMENT, cookie_id varchar(1000) NOT NULL, policy_id varchar(1000) NOT NULL, transaction_ref_num varchar(1000) NOT NULL, uw_dicision varchar(1000) NOT NULL, policy_num varchar(1000) NOT NULL,ts timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,PRIMARY KEY (si))";

            mysql_query($customer_path_table_create, $mysql);
            mysql_query($pb_table_create, $mysql);
            mysql_query($rel_table_create, $mysql);
            mysql_query($payment_table_create, $mysql);

            foreach ($cookieID as $key => $value) {
                $vURL = str_replace("\\", "", $visitedURL[$key]);
                $vURL = str_replace("'", "", $vURL);

                $bURL = str_replace("\\", "", $baseURL[$key]);
                $bURL = str_replace("'", "", $bURL);

                $mysqlQuery = "insert into customer_path_" . $mon[$j] . "(cookie_id,url,baseurl,ts) values ('" . $value . "','" . $vURL . "','" . $bURL . "','" . $createdAt[$key] . "')";
                // echo $mysqlQuery;//exit;
                $ins = mysql_query($mysqlQuery, $mysql);
                if (!$ins) {
                    echo $mysqlQuery . "<br>";
                    die('1.Could not enter data: ' . mysql_error());
                }

                // echo "$key : Entered data successfully<br>";
                echo ".<br>";
            }

            /*
              echo "<pre>";
              print_r($cookieID1);
              print_r($policyId1);
              print_r($transactionRefNum1);
              print_r($policyNum1);
              print_r($uwDicision1);
              print_r($createdAt1);
              exit;
             */
            /*
              foreach ($cookieID1 as $key => $value) {
              $mysqlQuery = "insert into payment_" . $mon[$j] . "(cookie_id, policy_id, transaction_ref_num, uw_dicision, policy_num, ts) values ('" . $cookieID1[$key] . "','" . $policyId1[$key] . "','" . $transactionRefNum1[$key] . "','" . $policyNum1[$key] . "','" . $uwDicision1[$key] . "','" . $createdAt1[$key] . "')";
              $ins = mysql_query($mysqlQuery, $mysql);
              if (!$ins) {
              echo $mysqlQuery . "<br>";
              die('1.Could not enter data: ' . mysql_error());
              }

              // echo "$key : Entered data successfully<br>";
              echo ".<br>";
              }
             */
            $sheet2_PBCookieIdQuery = "SELECT * FROM customer_path_" . $mon[$j] . " where URL like '%policybazaar%'";
            $rows = mysql_query($sheet2_PBCookieIdQuery, $mysql);
            while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
                $sql = "insert into pb_" . $mon[$j] . "(cookie_id,url,baseurl,ts) values('" . $row['cookie_id'] . "','" . $row['url'] . "','" . $row['burl'] . "','" . $row['ts'] . "')";
                $ins = mysql_query($sql, $mysql);
                if (!$ins) {
                    die('2.Could not enter data: ' . mysql_error());
                }
            }

            $sheet2_RELCookieIdQuery = "SELECT * FROM customer_path_" . $mon[$j] . " where URL like '%www.religare%'";
            $rows = mysql_query($sheet2_RELCookieIdQuery, $mysql);
            while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
                $sql = "insert into rel_" . $mon[$j] . "(cookie_id,url,baseurl,ts) values('" . $row['cookie_id'] . "','" . $row['url'] . "','" . $row['burl'] . "','" . $row['ts'] . "')";
                $ins = mysql_query($sql, $mysql);
                if (!$ins) {
                    die('3.Could not enter data: ' . mysql_error());
                }
            }

            mysql_close($mysql);
        }
        ?>
    </body>
</html>