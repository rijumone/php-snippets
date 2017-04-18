<?php

echo "<pre>";


$filePath = 'user_path_new1/payment/Oct';
$files = scandir($filePath);
$jsonData = '';
$mysql = mysqli_connect("localhost", "root", "");
mysqli_select_db($mysql, "30_oct_cookie_report");


// echo "<pre>";print_r($files);exit;
foreach ($files as $key => $value) {
    if ($key > 1) {
        $jsonData = file_get_contents($filePath . '/' . $value);

        $jsonArr = json_decode($jsonData, true);

// mysqli_query($mysql, "CREATE TABLE  IF NOT EXISTS `cookie_report`.`oct_path` ( `cookie_id` VARCHAR(100) NOT NULL , `first_visited_url` TEXT NOT NULL , `pb_ts` DATETIME NOT NULL , `rel_ts` DATETIME NOT NULL , PRIMARY KEY (`cookie_id`), INDEX (`pb_ts`), INDEX (`rel_ts`)) ENGINE = InnoDB;");
        mysqli_query($mysql, "CREATE TABLE IF NOT EXISTS `30_oct_cookie_report`.`oct_payment` ( `cookie_id` VARCHAR(100) NOT NULL , `policy_num` VARCHAR (100) NOT NULL , `policy_id` VARCHAR (100) NOT NULL , `transaction_ref_num` VARCHAR (100) NOT NULL , `ts` DATETIME NOT NULL , INDEX (`ts`)) ENGINE = InnoDB;");

        foreach ($jsonArr['data'] as $cookie) {
            // echo "cookie coming thru<br>";
            // print_r($cookie); cookieId: '683955964UwwOiAoDrNBXhtf'

            foreach ($cookie['flow'] as $cookieFlow) {

                $Date = new DateTime($cookieFlow["createdAt"]); //create dateTime object
                $Date->setTimezone(new DateTimeZone('Europe/London')); //set the timezone

                $Ts = $Date->format('Y-m-d H:i:s');

                $insertStatement = "insert into `30_oct_cookie_report`.`oct_payment` values ('" . $cookieFlow['cookieID'] . "','" . $cookieFlow['policyNum'] . "','" . $cookieFlow['policyId'] . "','" . $cookieFlow['transactionRefNum'] . "','" . $Ts . "')";
                // echo $insertStatement."<br><br>";
                $ins = mysqli_query($mysql, $insertStatement);
                if (!$ins) {
                    echo $insertStatement . "<br>";
                    die('1.Could not enter data: ' . mysqli_error($mysql));
                }
            }
        }
    }
}
?>