<!DOCTYPE html>
<html>
    <head>
        <title>User path exporter</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- <script src="jquery.js"></script> -->
    </head>
    <body>
        <!-- <button id="btnExport" style="display: block">Export</button> -->
        <form action="" method="POST">
            <select id="sheet" name="sheet">
                <option value="1">PB Cookie earlier than REL Cookie with 10mins interval</option>
                <option value="2">Cookie ID dropped on both</option>
                <option value="3">PB Cookie earlier than REL Cookie</option>
                <option value="4">REL Cookie earlier than PB Cookie</option>
                <option value="5">Cookie Id where PB start time stamp is earlier than Religare Time Stamp with Policy details</option>
                <option value="6">Cookie Id where Religare start time stamp is earlier than PB Time Stamp with Policy details</option>
            </select>

            <select id="mon" name="mon">
                <option value="Aug">August</option>
                <option value="Sep">September</option>
                <option value="Oct">October</option>
            </select>
            <input type="submit" value="Get Data">
        </form>
        <?php
        ini_set("memory_limit", -1);
        ini_set("max_execution_time", 1000000);
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        /*
          $mon=array("Aug","Sep");
          $condition=array("https://buy.religare","https://www.religare","policybazaar","http://buy.religare","http://www.religare");
          $cookieID=array();
          $createdAt=array();
          $visitedURL=array();
          for ($j=0; $j < sizeof($mon); $j++)
          {
          $start=1;
          for ($i=$start; $i <32 ; $i++)
          {
          $count=0;
          // echo $mon[$j]."-".$i."<br>";
          if ($mon[$j]=="Sep" && ($i==21))
          {
          break;
          }
          else
          {
          $file="user_path_new/".$mon[$j]."/analytics_".($i)."_".$mon[$j].".json";
          if (file_exists($file)) {
          $string = file_get_contents($file);
          if (strlen($string)>0) {
          $json = json_decode($string, true)["data"];
          if (sizeof($json)>0) {
          foreach ($json as $key => $value) {
          foreach ($value["flow"] as $key1 => $value1) {
          foreach ($condition as $key2 => $value2) {
          if (strpos($value1["visitedURL"], $value2)!==false) {
          $count+=1;
          array_push($cookieID, $value1["cookieID"]);
          array_push($createdAt, $value1["createdAt"]);
          array_push($visitedURL, $value1["visitedURL"]);
          }
          }
          }
          }
          }
          }
          }
          // echo sizeof($cookieID)."<br>";
          }
          // echo "Entries on $i-$mon[$j] are :".$count."<br>";
          }
          // echo sizeof($cookieID)."<br>";
          }

          $array1=array("06","12","18","24");
          for ($i=21; $i <31 ; $i++)
          {
          // echo $mon[1]."-".$i."<br>";
          foreach ($array1 as $ts) {
          $count=0;
          $file="user_path_new/Sep/analytics_".($i)."_Sep_".$ts.".json";
          // echo $file."<br>";
          if (file_exists($file)) {
          $string = file_get_contents($file);
          if (strlen($string)>0) {
          $json = json_decode($string, true)["data"];
          if (sizeof($json)>0) {
          foreach ($json as $key => $value) {
          foreach ($value["flow"] as $key1 => $value1) {
          foreach ($condition as $key2 => $value2) {
          if (strpos($value1["visitedURL"], $value2)!==false) {
          $count+=1;
          array_push($cookieID, $value1["cookieID"]);
          array_push($createdAt, $value1["createdAt"]);
          array_push($visitedURL, $value1["visitedURL"]);
          }
          }
          }
          }
          }
          }
          // echo sizeof($cookieID)."<br>";
          }
          // echo "Entries on $i-$mon[1] at $ts hours are :".$count."<br>";
          }
          }
          echo "Inserting ".sizeof($cookieID)." datas into DB<br>";
          $mysql=mysql_connect("localhost","root","");
          mysql_select_db("customer_path_new");

          foreach ($cookieID as $key => $value) {
          $mysqlQuery="insert into customer_path(cookie_id,url,ts) values ('".$value."','".$visitedURL[$key]."','".$createdAt[$key]."')";
          $ins=mysql_query($mysqlQuery,$mysql);
          if(! $ins ) {
          die('Could not enter data: ' . mysql_error());
          }

          echo "$key : Entered data successfully<br>";

          }
          mysql_close($mysql);
          print_r($visitedURL);
         */
        $mysql = @mysql_connect("localhost", "root", "");
        mysql_select_db("customer_path_new");

        /*
          $sheet2_PBCookieIdQuery="SELECT * FROM customer_path where URL like '%policybazaar%' limit 0,100000";
          $rows = mysql_query($sheet2_PBCookieIdQuery,$mysql);
          while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
          $sql="insert into pb(cookie_id,url,ts) values('".$row['cookie_id']."','".$row['url']."','".$row['ts']."')";
          $ins=mysql_query($sql,$mysql);
          if (! $ins) {
          die('Could not enter data: '. mysql_error());
          }
          }

          $sheet2_RELCookieIdQuery="SELECT * FROM customer_path where URL like '%www.religare%' limit 0,100000";
          $rows = mysql_query($sheet2_RELCookieIdQuery,$mysql);
          while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
          $sql="insert into rel(cookie_id,url,ts) values('".$row['cookie_id']."','".$row['url']."','".$row['ts']."')";
          $ins=mysql_query($sql,$mysql);
          if (! $ins) {
          die('Could not enter data: '. mysql_error());
          }
          }
         */

        $reportName = array("Time stamp difference is 10 minutes", "Cookie ID dropped on PB and REL", "PB Cookie earlier than REL Cookie", "REL Cookie earlier than PB Cookie", "Cookie Id where PB start time stamp is earlier than Religare Time Stamp with policy details", "Cookie Id where Religare start time stamp is earlier than PB Time Stamp with policy details");

        if (isset($_POST["sheet"]) && isset($_POST["mon"])) {
            $sheetSelection = 0;
            $pageLimit = 4000;
            $start = 0;
            $rowCount = 0;
            if (isset($_POST["start"])) {
                $start = $_POST["start"] * $pageLimit;
            }

            $sheet = $_POST["sheet"];
            $mon = $_POST["mon"];

            $si = array();
            $cookieID = array();
            $createdAt = array();
            $createdAt1 = array();
            $visitedURL = array();

            $session = array();
            $policyId = array();
            $policyNum = array();
            $trn = array();
            $uwd = array();


            if ($sheet == 1) {
                $sheetSelection = 0;
                $sheet1Count_CookieIdQuery = "select pb_" . $mon . ".* from pb_" . $mon . " inner join rel_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id and pb_" . $mon . ".ts<rel_" . $mon . ".ts and (TIME_TO_SEC(TIMEDIFF(rel_" . $mon . ".ts,pb_" . $mon . ".ts))/60)>=10 group by pb_" . $mon . ".cookie_id order by pb_" . $mon . ".ts";
                $sheet1_CookieIdQuery = "select pb_" . $mon . ".cookie_id as Cookie,pb_" . $mon . ".ts as TimeStamp1,rel_" . $mon . ".ts as TimeStamp2 from pb_" . $mon . " inner join rel_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id and pb_" . $mon . ".ts<rel_" . $mon . ".ts and (TIME_TO_SEC(TIMEDIFF(rel_" . $mon . ".ts,pb_" . $mon . ".ts))/60)>=10 group by pb_" . $mon . ".cookie_id order by pb_" . $mon . ".ts limit $start,$pageLimit";
echo "<pre>";print_r($sheet1Count_CookieIdQuery);exit;
                $rowCount1 = mysql_query($sheet1Count_CookieIdQuery, $mysql);
                // echo "<br>";print_r($rowCount1);exit;
                $rowCount = mysql_num_rows($rowCount1);
                $rows = mysql_query($sheet1_CookieIdQuery, $mysql);

                $i = 1;
                while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
                    array_push($si, $i++);
                    array_push($cookieID, $row["Cookie"]);
                    array_push($createdAt, $row["TimeStamp2"]);
                    array_push($createdAt1, $row["TimeStamp1"]);
                }
            }
            if ($sheet == 2) {
                $sheetSelection = 1;
                $sheet2Count_PBCookieIdQuery = "select pb_" . $mon . ".cookie_id as Cookie,pb_" . $mon . ".ts as TimeStamp1,rel_" . $mon . ".ts as TimeStamp2 from pb_" . $mon . " inner join rel_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id group by pb_" . $mon . ".cookie_id order by pb_" . $mon . ".ts";
                $sheet2_PBCookieIdQuery = "select pb_" . $mon . ".cookie_id as Cookie,pb_" . $mon . ".ts as TimeStamp1,rel_" . $mon . ".ts as TimeStamp2 from pb_" . $mon . " inner join rel_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id group by pb_" . $mon . ".cookie_id order by pb_" . $mon . ".ts limit $start,$pageLimit";


                // echo "<pre>";print_r($sheet2_PBCookieIdQuery);exit;

                $rowCount1 = mysql_query($sheet2Count_PBCookieIdQuery, $mysql);
                $rowCount = mysql_num_rows($rowCount1);
                $rows = mysql_query($sheet2_PBCookieIdQuery, $mysql);
                $abc = 0;
                while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
                    $abc+=1;
                    array_push($si, $abc++);
                    array_push($cookieID, $row["Cookie"]);
                    array_push($createdAt, $row["TimeStamp2"]);
                    array_push($createdAt1, $row["TimeStamp1"]);
                    // array_push($visitedURL, $row["url"]);
                }
            }
            // if ($sheet==2.2) {
            // 	$sheetSelection=2;
            // 	$sheet2Count_RELCookieIdQuery="SELECT * FROM customer_path where URL like '%www.religare%'";
            // 	$sheet2_RELCookieIdQuery="SELECT * FROM customer_path where URL like '%www.religare%' limit $start,$pageLimit";
            // 	$rowCount1=mysql_query($sheet2Count_RELCookieIdQuery,$mysql);
            // 	$rowCount=mysql_num_rows($rowCount1);
            // 	$rows=mysql_query($sheet2_RELCookieIdQuery,$mysql);
            // 	while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
            // 		array_push($si, $row["si"]);
            // 		array_push($cookieID, $row["cookie_id"]);
            // 		array_push($visitedURL, $row["url"]);
            // 	}
            // }
            if ($sheet == 3) {
                $sheetSelection = 2;
                $sheet3Count_PB2RELCookieIdQuery = "select pb_" . $mon . ".cookie_id as Cookie,pb_" . $mon . ".ts as TimeStamp from pb_" . $mon . " inner join rel_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id and pb_" . $mon . ".ts<rel_" . $mon . ".ts group by pb_" . $mon . ".cookie_id order by pb_" . $mon . ".ts";
                $sheet3_PB2RELCookieIdQuery = "select pb_" . $mon . ".cookie_id as Cookie,pb_" . $mon . ".ts as TimeStamp from pb_" . $mon . " inner join rel_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id and pb_" . $mon . ".ts<rel_" . $mon . ".ts group by pb_" . $mon . ".cookie_id order by pb_" . $mon . ".ts limit $start,$pageLimit";

                $rowCount1 = mysql_query($sheet3Count_PB2RELCookieIdQuery, $mysql);
                $rowCount = mysql_num_rows($rowCount1);
                $rows = mysql_query($sheet3_PB2RELCookieIdQuery, $mysql);
                $abc = 0;
                while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
                    if (!in_array($row["Cookie"], $cookieID)) {
                        $abc+=1;
                        array_push($si, $abc);
                        array_push($cookieID, $row["Cookie"]);
                        array_push($createdAt, $row["TimeStamp"]);
                    }
                }
            }

            if ($sheet == 4) {
                $sheetSelection = 3;
                $sheet4Count_PB2RELCookieIdQuery = "select rel_" . $mon . ".cookie_id as Cookie,rel_" . $mon . ".ts as TimeStamp,pb_" . $mon . ".ts as TimeStamp2 from rel_" . $mon . " inner join pb_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id and rel_" . $mon . ".ts<pb_" . $mon . ".ts group by rel_" . $mon . ".cookie_id order by rel_" . $mon . ".ts";
                $sheet4_PB2RELCookieIdQuery = "select rel_" . $mon . ".cookie_id as Cookie,rel_" . $mon . ".ts as TimeStamp,pb_" . $mon . ".ts as TimeStamp2 from rel_" . $mon . " inner join pb_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id and rel_" . $mon . ".ts<pb_" . $mon . ".ts group by rel_" . $mon . ".cookie_id order by rel_" . $mon . ".ts limit $start,$pageLimit";

                $rowCount1 = mysql_query($sheet4Count_PB2RELCookieIdQuery, $mysql);
                $rowCount = mysql_num_rows($rowCount1);
                $rows = mysql_query($sheet4_PB2RELCookieIdQuery, $mysql);
                $abc = 0;
                while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
                    if (!in_array($row["Cookie"], $cookieID)) {
                        $abc+=1;
                        array_push($si, $abc);
                        array_push($cookieID, $row["Cookie"]);
                        array_push($createdAt, $row["TimeStamp"]);
                        array_push($createdAt1, $row["TimeStamp2"]);
                    }
                }
            }

            if ($sheet == 5) {
                $sheetSelection = 4;
                $sheet5Count_PB2RELCookieIdQuery = "select pb_" . $mon . ".cookie_id as Cookie,pb_" . $mon . ".ts as TimeStamp,rel_" . $mon . ".ts as TimeStamp1,payment_" . $mon . ".session_id as session,payment_" . $mon . ".policy_id as policyId,payment_" . $mon . ".policy_num as policyNum,payment_" . $mon . ".transaction_ref_num as trn,payment_" . $mon . ".uw_dicision as uwd from pb_" . $mon . " inner join rel_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id inner join payment_" . $mon . " on pb_" . $mon . ".session_id=payment_" . $mon . ".session_id and pb_" . $mon . ".ts<rel_" . $mon . ".ts group by pb_" . $mon . ".cookie_id order by pb_" . $mon . ".ts";
                $sheet5_PB2RELCookieIdQuery = "select pb_" . $mon . ".cookie_id as Cookie,pb_" . $mon . ".ts as TimeStamp,rel_" . $mon . ".ts as TimeStamp1,payment_" . $mon . ".session_id as session,payment_" . $mon . ".policy_id as policyId,payment_" . $mon . ".policy_num as policyNum,payment_" . $mon . ".transaction_ref_num as trn,payment_" . $mon . ".uw_dicision as uwd from pb_" . $mon . " inner join rel_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id inner join payment_" . $mon . " on pb_" . $mon . ".session_id=payment_" . $mon . ".session_id and pb_" . $mon . ".ts<rel_" . $mon . ".ts group by pb_" . $mon . ".cookie_id order by pb_" . $mon . ".ts,payment_" . $mon . ".ts limit $start,$pageLimit";

                $rowCount1 = mysql_query($sheet5Count_PB2RELCookieIdQuery, $mysql);
                $rowCount = mysql_num_rows($rowCount1);
                $rows = mysql_query($sheet5_PB2RELCookieIdQuery, $mysql);
                $abc = 0;
                while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
                    if (!in_array($row["Cookie"], $cookieID)) {
                        $abc+=1;
                        array_push($si, $abc);
                        array_push($cookieID, $row["Cookie"]);
                        array_push($createdAt, $row["TimeStamp"]);
                        array_push($createdAt1, $row["TimeStamp1"]);
                        array_push($session, $row["session"]);
                        array_push($policyId, $row["policyId"]);
                        array_push($policyNum, $row["policyNum"]);
                        array_push($trn, $row["trn"]);
                        array_push($uwd, $row["uwd"]);
                    }
                }
            }

            if ($sheet == 6) {
                $sheetSelection = 5;
                $sheet5Count_PB2RELCookieIdQuery = "select pb_" . $mon . ".cookie_id as Cookie,pb_" . $mon . ".ts as TimeStamp,rel_" . $mon . ".ts as TimeStamp1,payment_" . $mon . ".session_id as session,payment_" . $mon . ".policy_id as policyId,payment_" . $mon . ".policy_num as policyNum,payment_" . $mon . ".transaction_ref_num as trn,payment_" . $mon . ".uw_dicision as uwd from pb_" . $mon . " inner join rel_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id inner join payment_" . $mon . " on pb_" . $mon . ".session_id=payment_" . $mon . ".session_id and pb_" . $mon . ".ts>rel_" . $mon . ".ts group by pb_" . $mon . ".cookie_id order by pb_" . $mon . ".ts";
                $sheet5_PB2RELCookieIdQuery = "select pb_" . $mon . ".cookie_id as Cookie,pb_" . $mon . ".ts as TimeStamp,rel_" . $mon . ".ts as TimeStamp1,payment_" . $mon . ".session_id as session,payment_" . $mon . ".policy_id as policyId,payment_" . $mon . ".policy_num as policyNum,payment_" . $mon . ".transaction_ref_num as trn,payment_" . $mon . ".uw_dicision as uwd from pb_" . $mon . " inner join rel_" . $mon . " on pb_" . $mon . ".cookie_id=rel_" . $mon . ".cookie_id inner join payment_" . $mon . " on pb_" . $mon . ".session_id=payment_" . $mon . ".session_id and pb_" . $mon . ".ts>rel_" . $mon . ".ts group by pb_" . $mon . ".cookie_id order by pb_" . $mon . ".ts,payment_" . $mon . ".ts limit $start,$pageLimit";

                $rowCount1 = mysql_query($sheet5Count_PB2RELCookieIdQuery, $mysql);
                $rowCount = mysql_num_rows($rowCount1);
                $rows = mysql_query($sheet5_PB2RELCookieIdQuery, $mysql);
                $abc = 0;
                while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
                    if (!in_array($row["Cookie"], $cookieID)) {
                        $abc+=1;
                        array_push($si, $abc);
                        array_push($cookieID, $row["Cookie"]);
                        array_push($createdAt, $row["TimeStamp"]);
                        array_push($createdAt1, $row["TimeStamp1"]);
                        array_push($session, $row["session"]);
                        array_push($policyId, $row["policyId"]);
                        array_push($policyNum, $row["policyNum"]);
                        array_push($trn, $row["trn"]);
                        array_push($uwd, $row["uwd"]);
                    }
                }
            }

            if ($rowCount < (($start) + $pageLimit)) {
                $fileName = $reportName[$sheetSelection] . "_" . $mon . "_" . (($start) + 1) . "-" . ($rowCount) . ".xlsx";
            } else
                $fileName = $reportName[$sheetSelection] . "_" . (($start) + 1) . "-" . (($start) + $pageLimit) . ".xlsx";
            echo "<br>Current Page:" . (ceil($start / $pageLimit) + 1) . "<br>";

            if ($rowCount > 0) {
                echo "<br><button id='btnExport' style='display: block'>Export</button><br>";

                if ($start < $rowCount) {
                    $start = (intval($start) / intval($pageLimit));
                    ?>
                    <?php
                    if ($start > 0) {
                        ?>
                        <form action="" method="POST">
                            <input type="hidden" name="sheet" value="<?php echo $sheet; ?>">
                            <input type="hidden" name="rowCount" value="<?php echo $rowCount; ?>">
                            <input type="hidden" name="start" value="<?php echo ($start - 1); ?>">
                            <input type="submit" value="Prev">
                        </form>
                        <?php
                    }
                    if ($start < (ceil($rowCount / $pageLimit) - 1)) {
                        ?>
                        <form action="" method="POST">
                            <input type="hidden" name="sheet" value="<?php echo $sheet; ?>">
                            <input type="hidden" name="rowCount" value="<?php echo $rowCount; ?>">
                            <input type="hidden" name="start" value="<?php echo ($start + 1); ?>">
                            <input type="submit" value="Next">
                        </form>
                        <?php
                    }
                }

                if ($sheet == 1) {
                    echo "<table style='border:1px solid #000' id='dataTable'>";
                    echo "<tr style='border:1px solid #000'>";
                    echo "<th style='border:1px solid #000' colspan='3'> Condition: Cookie id  where PB start time stamp is earlier than Religare Time Stamp  & where Time stamp difference is 10 minutes";
                    echo "</th>";
                    echo "</tr>";
                    echo "<tr style='border:1px solid #000'>";
                    // echo "<th style='border:1px solid #000'> Si";
                    // echo "</th>";
                    echo "<th style='border:1px solid #000'> Cookie ID";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Start Time Stamp of Religare";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Start Time Stamp of Policy Bazaar";
                    echo "</th>";
                    echo "</tr>";
                }
                if ($sheet == 2) {
                    echo "<table style='border:1px solid #000' id='dataTable'>";
                    echo "<tr style='border:1px solid #000'>";
                    // echo "<th style='border:1px solid #000'> Si";
                    // echo "</th>";
                    // echo "<th style='border:1px solid #000'> URL";
                    // echo "</th>";
                    echo "<th style='border:1px solid #000'> Unique Cookie ID";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> First Time Stamp on Religare";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> First Time Stamp on Policy Bazaar";
                    echo "</th>";
                    echo "</tr>";
                }
                // if ($sheet==2.2) {
                // 	echo "<table style='border:1px solid #000' id='dataTable'>";
                // 	echo "<tr style='border:1px solid #000'>";
                // 		// echo "<th style='border:1px solid #000'> Si";
                // 		// echo "</th>";
                // 		// echo "<th style='border:1px solid #000'> URL";
                // 		// echo "</th>";
                // 		echo "<th style='border:1px solid #000'> Cookie ID (dropped on by Rel Domain)";
                // 		echo "</th>";
                // 		echo "<th style='border:1px solid #000'> Start Time Stamp";
                // 		echo "</th>";
                // 	echo "</tr>";
                // }
                if ($sheet == 3) {
                    echo "<table style='border:1px solid #000' id='dataTable'>";
                    echo "<tr style='border:1px solid #000'>";
                    // echo "<th style='border:1px solid #000'> Si";
                    // echo "</th>";
                    // echo "<th style='border:1px solid #000'> URL";
                    // echo "</th>";
                    echo "<th style='border:1px solid #000'> Unique Cookie ID";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Timestamp where timestamp of PB is earlier than timestamp Religare";
                    echo "</th>";
                    echo "</tr>";
                }
                if ($sheet == 4) {
                    echo "<table style='border:1px solid #000' id='dataTable'>";
                    echo "<tr style='border:1px solid #000' style='background-color:rgba(110,167,189,0.6)'>";
                    echo "<th style='border:1px solid #000' colspan='3'> Condition: Cookie ID where Religare start time is earlier than PB Time stamp";
                    echo "</th>";
                    echo "</tr>";
                    echo "<tr style='border:1px solid #000'>";
                    echo "<th style='border:1px solid #000'> Cookie ID";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Start Time Stamp of Religare";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Start Time Stamp of Policy Bazaar";
                    echo "</th>";
                    echo "</tr>";
                }
                if ($sheet == 5) {
                    echo "<table style='border:1px solid #000' id='dataTable'>";
                    echo "<tr style='border:1px solid #000' style='background-color:rgba(110,167,189,0.6)'>";
                    echo "<th style='border:1px solid #000' colspan='6'> Condition : Cookie Id where PB start time stamp is earlier than Religare Time Stamp";
                    echo "</th>";
                    echo "</tr>";
                    echo "<tr style='border:1px solid #000'>";
                    echo "<th style='border:1px solid #000'> Cookie ID";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Start Time Stamp of Policy Bazaar";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Start Time Stamp of Religare";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Policy Number";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Policy ID";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Transactional Ref Number";
                    echo "</th>";
                    echo "</tr>";
                }
                if ($sheet == 6) {
                    echo "<table style='border:1px solid #000' id='dataTable'>";
                    echo "<tr style='border:1px solid #000' style='background-color:rgba(110,167,189,0.6)'>";
                    echo "<th style='border:1px solid #000' colspan='6'> Condition : Cookie Id where Religare start time stamp is earlier than PB Time Stamp";
                    echo "</th>";
                    echo "</tr>";
                    echo "<tr style='border:1px solid #000'>";
                    echo "<th style='border:1px solid #000'> Cookie ID";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Start Time Stamp of Policy Bazaar";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Start Time Stamp of Religare";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Policy Number";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Policy ID";
                    echo "</th>";
                    echo "<th style='border:1px solid #000'> Transactional Ref Number";
                    echo "</th>";
                    echo "</tr>";
                }

                foreach ($cookieID as $key => $value) {
                    if ($sheet == 1) {
                        echo "<tr style='border:1px solid #000'>";
                        // echo "<td style='border:1px solid #000'>".$si[$key]."</td>";
                        echo "<td style='border:1px solid #000'>" . $value . "</td>";
                        echo "<td style='border:1px solid #000'>" . $createdAt[$key] . "</td>";
                        echo "<td style='border:1px solid #000'> " . $createdAt1[$key] . "</td>";
                        echo "</tr>";
                    }
                    if ($sheet == 2) {
                        echo "<tr style='border:1px solid #000'>";
                        // echo "<td style='border:1px solid #000'>".$si[$key]."</td>";
                        // echo "<td style='border:1px solid #000'>".$visitedURL[$key]."</td>";
                        echo "<td style='border:1px solid #000'>" . $value . "</td>";
                        echo "<td style='border:1px solid #000'>" . $createdAt[$key] . "</td>";
                        echo "<td style='border:1px solid #000'>" . $createdAt1[$key] . "</td>";
                        echo "</tr>";
                    }
                    // if ($sheet==2.2) {
                    // 	echo "<tr style='border:1px solid #000'>";
                    // 		// echo "<td style='border:1px solid #000'>".$si[$key]."</td>";
                    // 		// echo "<td style='border:1px solid #000'>".$visitedURL[$key]."</td>";
                    // 		echo "<td style='border:1px solid #000'>".$value."</td>";
                    // 		echo "<td style='border:1px solid #000'>".$createdAt[$key]."</td>";
                    // 	echo "</tr>";
                    // }
                    if ($sheet == 3) {
                        echo "<tr style='border:1px solid #000'>";
                        // echo "<td style='border:1px solid #000'>".$si[$key]."</td>";
                        // echo "<td style='border:1px solid #000'>".$visitedURL[$key]."</td>";
                        echo "<td style='border:1px solid #000'>" . $value . "</td>";
                        echo "<td style='border:1px solid #000'>" . $createdAt[$key] . "</td>";
                        echo "</tr>";
                    }
                    if ($sheet == 4) {
                        echo "<tr style='border:1px solid #000'>";
                        // echo "<td style='border:1px solid #000'>".$si[$key]."</td>";
                        // echo "<td style='border:1px solid #000'>".$visitedURL[$key]."</td>";
                        echo "<td style='border:1px solid #000'>" . $value . "</td>";
                        echo "<td style='border:1px solid #000'>" . $createdAt[$key] . "</td>";
                        echo "<td style='border:1px solid #000'>" . $createdAt1[$key] . "</td>";
                        echo "</tr>";
                    }
                    if ($sheet == 5) {
                        echo "<tr style='border:1px solid #000'>";
                        // echo "<td style='border:1px solid #000'>".$si[$key]."</td>";
                        // echo "<td style='border:1px solid #000'>".$visitedURL[$key]."</td>";
                        echo "<td style='border:1px solid #000'>" . $value . "</td>";
                        echo "<td style='border:1px solid #000'>" . $createdAt[$key] . "</td>";
                        echo "<td style='border:1px solid #000'>" . $createdAt1[$key] . "</td>";
                        echo "<td style='border:1px solid #000'>" . $policyNum[$key] . "</td>";
                        echo "<td style='border:1px solid #000'>" . $policyId[$key] . "</td>";
                        echo "<td style='border:1px solid #000'>" . $trn[$key] . "</td>";
                        echo "</tr>";
                    }
                    if ($sheet == 6) {
                        echo "<tr style='border:1px solid #000'>";
                        // echo "<td style='border:1px solid #000'>".$si[$key]."</td>";
                        // echo "<td style='border:1px solid #000'>".$visitedURL[$key]."</td>";
                        echo "<td style='border:1px solid #000'>" . $value . "</td>";
                        echo "<td style='border:1px solid #000'>" . $createdAt[$key] . "</td>";
                        echo "<td style='border:1px solid #000'>" . $createdAt1[$key] . "</td>";
                        echo "<td style='border:1px solid #000'>" . $policyNum[$key] . "</td>";
                        echo "<td style='border:1px solid #000'>" . $policyId[$key] . "</td>";
                        echo "<td style='border:1px solid #000'>" . $trn[$key] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    jQuery(function () {
                        $("select#sheet option:eq(<?php echo $sheetSelection; ?>)").prop("selected", true);
                        $("select#mon option:eq(<?php echo $mon; ?>)").prop("selected", true);
                        jQuery('#btnExport').click();
                    });
                    $("#btnExport").click(function (e) {
                        //getting values of current time for generating the file name
                        var dt = new Date();
                        var day = dt.getDate();
                        var month = dt.getMonth() + 1;
                        var year = dt.getFullYear();
                        var hour = dt.getHours();
                        var mins = dt.getMinutes();
                        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
                        postfix = "<?php echo $fileName; ?>";
                        //creating a temporary HTML link element (they support setting file names)
                        var a = document.createElement('a');
                        //getting data from our div that contains the HTML table
                        var data_type = 'data:application/vnd.ms-excel;charset=utf-8';

                        var table_html = $('#dataTable')[0].outerHTML;
                        //    table_html = table_html.replace(/ /g, '%20');
                        table_html = table_html.replace(/<tfoot[\s\S.]*tfoot>/gmi, '');

                        var css_html = '<style>td {border: 0.5pt solid #c0c0c0} .tRight { text-align:right} .tLeft { text-align:left} </style>';
                        //    css_html = css_html.replace(/ /g, '%20');

                        a.href = data_type + ',' + encodeURIComponent('<html><head>' + css_html + '</' + 'head><body>' + table_html + '</body></html>');

                        //setting the file name
                        a.download = postfix;
                        //triggering the function
                        a.click();
                        //just in case, prevent default behaviour
                        e.preventDefault();
                    });
                });
            </script>
            <?php
        }


        mysql_close($mysql);
        ?>
    </body>
</html>