<?php

ini_set("max_execution_time", 1000000);

echo "<pre>";
$mysql = mysql_connect("localhost", "root", "");
mysql_select_db("11_nov_customer_path_new");

// $query = "SELECT customer_path_oct.cookie_id, customer_path_oct.url, customer_path_oct.ts, payment_oct.policy_id, payment_oct.transaction_ref_num, payment_oct.uw_dicision, payment_oct.policy_num FROM `customer_path_oct` left join payment_oct on customer_path_oct.cookie_id = payment_oct.cookie_id order by customer_path_oct.ts limit 1000 offset 2200";
$query = "SELECT customer_path_oct.cookie_id, customer_path_oct.url, customer_path_oct.ts, 
payment_oct.policy_id, payment_oct.transaction_ref_num, payment_oct.uw_dicision, payment_oct.policy_num 
FROM `customer_path_oct` 
left join payment_oct on customer_path_oct.cookie_id = payment_oct.cookie_id 
where customer_path_oct.ts > '2016-10-27 12:30:00'
order by customer_path_oct.ts 
limit 500 offset 2000";
$rowCount1 = mysql_query($query, $mysql);
$rowCount = mysql_num_rows($rowCount1);
$rows = mysql_query($query, $mysql);
$dataArr = array();
while ($row = mysql_fetch_array($rows, MYSQL_ASSOC)) {
    // print_r($row);
    $dataArr[$row['cookie_id']][] = $row;
}
// $json = json_encode($dataArr);
// echo $json;exit;

// $finalArr = array();
// $dataArr = json_decode('{
//   "246275437vKPIuADpkreujwZ": [
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/why-religare.html",
//       "ts": "2016-10-25 18:30:03",
//       "policy_id": "4120001509688",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/why-religare.html",
//       "ts": "2016-10-25 18:30:03",
//       "policy_id": "4120001509688",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/why-religare.html",
//       "ts": "2016-10-25 18:30:03",
//       "policy_id": "4120001509684",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/why-religare.html",
//       "ts": "2016-10-25 18:30:03",
//       "policy_id": "4120001509684",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-agents.html",
//       "ts": "2016-10-25 18:30:43",
//       "policy_id": "4120001509688",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-agents.html",
//       "ts": "2016-10-25 18:30:43",
//       "policy_id": "4120001509688",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-agents.html",
//       "ts": "2016-10-25 18:30:43",
//       "policy_id": "4120001509684",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-agents.html",
//       "ts": "2016-10-25 18:30:43",
//       "policy_id": "4120001509684",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore",
//       "ts": "2016-10-25 18:31:38",
//       "policy_id": "4120001509688",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore",
//       "ts": "2016-10-25 18:31:38",
//       "policy_id": "4120001509688",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore",
//       "ts": "2016-10-25 18:31:38",
//       "policy_id": "4120001509688",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore",
//       "ts": "2016-10-25 18:31:38",
//       "policy_id": "4120001509688",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore",
//       "ts": "2016-10-25 18:31:38",
//       "policy_id": "4120001509684",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore",
//       "ts": "2016-10-25 18:31:38",
//       "policy_id": "4120001509684",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore",
//       "ts": "2016-10-25 18:31:38",
//       "policy_id": "4120001509684",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "246275437vKPIuADpkreujwZ",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore",
//       "ts": "2016-10-25 18:31:38",
//       "policy_id": "4120001509684",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     }
//   ],
//   "546557192VUrrodYNrYFPcCX": [
//     {
//       "cookie_id": "546557192VUrrodYNrYFPcCX",
//       "url": "http://www.religarehealthinsurance.com/network_hospital_locator.php",
//       "ts": "2016-10-25 18:30:16",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "546557192VUrrodYNrYFPcCX",
//       "url": "http://www.religarehealthinsurance.com/network_hospital_locator.php",
//       "ts": "2016-10-25 18:30:48",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "546557192VUrrodYNrYFPcCX",
//       "url": "http://www.religarehealthinsurance.com/health-plan-network-hospitals.html?pagel=page_2&start=1&next=2&prev=0&city=1&state=1&advanceSearch=",
//       "ts": "2016-10-25 18:31:16",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "546557192VUrrodYNrYFPcCX",
//       "url": "http://www.religarehealthinsurance.com/health-plan-network-hospitals.html?pagel=page_3&start=1&next=2&prev=0&city=1&state=1&advanceSearch=",
//       "ts": "2016-10-25 18:31:42",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "546557192VUrrodYNrYFPcCX",
//       "url": "http://www.religarehealthinsurance.com/health-plan-network-hospitals.html?pagel=page_2&start=1&next=2&prev=0&city=1&state=1&advanceSearch=",
//       "ts": "2016-10-25 18:32:04",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "546557192VUrrodYNrYFPcCX",
//       "url": "http://www.religarehealthinsurance.com/health-plan-network-hospitals.html",
//       "ts": "2016-10-25 18:32:11",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "805011403uEWDofCqkagXYAJ": [
//     {
//       "cookie_id": "805011403uEWDofCqkagXYAJ",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:30:25",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "805011403uEWDofCqkagXYAJ",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-brochure.html",
//       "ts": "2016-10-25 18:30:45",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "805011403uEWDofCqkagXYAJ",
//       "url": "http://www.religarehealthinsurance.com/claim_search.php",
//       "ts": "2016-10-25 18:30:49",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "805011403uEWDofCqkagXYAJ",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-brochure.html",
//       "ts": "2016-10-25 18:30:55",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "805011403uEWDofCqkagXYAJ",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-claim-forms.html",
//       "ts": "2016-10-25 18:30:58",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "512785991YiDERBjKjDGrAbZ": [
//     {
//       "cookie_id": "512785991YiDERBjKjDGrAbZ",
//       "url": "http://www.religarehealthinsurance.com/network_hospital_locator.php",
//       "ts": "2016-10-25 18:30:39",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "512785991YiDERBjKjDGrAbZ",
//       "url": "http://www.religarehealthinsurance.com/network_hospital_locator.php",
//       "ts": "2016-10-25 18:30:52",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "512785991YiDERBjKjDGrAbZ",
//       "url": "http://www.religarehealthinsurance.com/network_hospital_locator.php",
//       "ts": "2016-10-25 18:31:21",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "512785991YiDERBjKjDGrAbZ",
//       "url": "http://www.religarehealthinsurance.com/network_hospital_locator.php",
//       "ts": "2016-10-25 18:31:52",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "512785991YiDERBjKjDGrAbZ",
//       "url": "http://www.religarehealthinsurance.com/network_hospital_locator.php",
//       "ts": "2016-10-25 18:32:04",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "512785991YiDERBjKjDGrAbZ",
//       "url": "http://www.religarehealthinsurance.com/network_hospital_locator.php",
//       "ts": "2016-10-25 18:32:47",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "512785991YiDERBjKjDGrAbZ",
//       "url": "http://www.religarehealthinsurance.com/network_hospital_locator.php",
//       "ts": "2016-10-25 18:33:20",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "918893143CDpGcqMUPZuLpDY": [
//     {
//       "cookie_id": "918893143CDpGcqMUPZuLpDY",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore/explore-filldetails",
//       "ts": "2016-10-25 18:30:53",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "918893143CDpGcqMUPZuLpDY",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore",
//       "ts": "2016-10-25 18:31:14",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "918893143CDpGcqMUPZuLpDY",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore",
//       "ts": "2016-10-25 18:31:14",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "918893143CDpGcqMUPZuLpDY",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore/explore-filldetails",
//       "ts": "2016-10-25 18:32:40",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "170624844FXpZXIMCFSCeBpV": [
//     {
//       "cookie_id": "170624844FXpZXIMCFSCeBpV",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore?agentId=20027307",
//       "ts": "2016-10-25 18:31:13",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "170624844FXpZXIMCFSCeBpV",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore?agentId=20027307",
//       "ts": "2016-10-25 18:31:13",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "540304583AqLQhYhIQeiLWUC": [
//     {
//       "cookie_id": "540304583AqLQhYhIQeiLWUC",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-brochure.html",
//       "ts": "2016-10-25 18:31:14",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "540304583AqLQhYhIQeiLWUC",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-brochure.html",
//       "ts": "2016-10-25 18:31:16",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "540304583AqLQhYhIQeiLWUC",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-brochure.html",
//       "ts": "2016-10-25 18:31:27",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "540304583AqLQhYhIQeiLWUC",
//       "url": "http://www.religarehealthinsurance.com/other-downloads.html",
//       "ts": "2016-10-25 18:31:29",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "540304583AqLQhYhIQeiLWUC",
//       "url": "http://www.religarehealthinsurance.com/other-downloads.html",
//       "ts": "2016-10-25 18:31:53",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "540304583AqLQhYhIQeiLWUC",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-brochure.html",
//       "ts": "2016-10-25 18:32:12",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "540304583AqLQhYhIQeiLWUC",
//       "url": "http://www.religarehealthinsurance.com/buy-health-insurance-policy-plan-online.html",
//       "ts": "2016-10-25 18:32:13",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "862736233fXeBotYlKbHlNEY": [
//     {
//       "cookie_id": "862736233fXeBotYlKbHlNEY",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:31:27",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "435871903dHqlaUHnIHsIQgJ": [
//     {
//       "cookie_id": "435871903dHqlaUHnIHsIQgJ",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore?agentId=20024993&gclid=CIz8g8XL9s8CFQokhgodiY4CFw",
//       "ts": "2016-10-25 18:31:56",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "435871903dHqlaUHnIHsIQgJ",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore?agentId=20024993&gclid=CIz8g8XL9s8CFQokhgodiY4CFw",
//       "ts": "2016-10-25 18:31:57",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "806563832aSwWZiOFdiESIwu": [
//     {
//       "cookie_id": "806563832aSwWZiOFdiESIwu",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore?agentId=20027284&gclid=CNPUzJLB888CFdWFaAodDcsGcA",
//       "ts": "2016-10-25 18:31:57",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "806563832aSwWZiOFdiESIwu",
//       "url": "http://www.religarehealthinsurance.com/travel-insurance-explore?agentId=20027284&gclid=CNPUzJLB888CFdWFaAodDcsGcA",
//       "ts": "2016-10-25 18:31:57",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "535223607NYKmnlfAmlUdoet": [
//     {
//       "cookie_id": "535223607NYKmnlfAmlUdoet",
//       "url": "http://www.religarehealthinsurance.com/health-insurance-branch-locator.html",
//       "ts": "2016-10-25 18:32:45",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "887039644ZYNHKhFktGQAPRb": [
//     {
//       "cookie_id": "887039644ZYNHKhFktGQAPRb",
//       "url": "http://www.religarehealthinsurance.com/religare/index.php",
//       "ts": "2016-10-25 18:33:11",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "280679670WhSVOUZhJrTGbRv": [
//     {
//       "cookie_id": "280679670WhSVOUZhJrTGbRv",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:33:20",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     },
//     {
//       "cookie_id": "280679670WhSVOUZhJrTGbRv",
//       "url": "http://www.religarehealthinsurance.com/buy-health-insurance-policy-plan-online.html",
//       "ts": "2016-10-25 18:33:34",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "666999414VkMrSawWBhsopAF": [
//     {
//       "cookie_id": "666999414VkMrSawWBhsopAF",
//       "url": "http://www.religarehealthinsurance.com/buy-health-insurance-policy-plan-online.html?utm_source=bs-cpc-textad-mobile&agentId=20025836",
//       "ts": "2016-10-25 18:34:17",
//       "policy_id": null,
//       "transaction_ref_num": null,
//       "uw_dicision": null,
//       "policy_num": null
//     }
//   ],
//   "736811197LADLIUisptKrWrb": [
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001504492",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001502176",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001502589",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001502589",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001503907",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001506219",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001503146",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001503146",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001505116",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001504393",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001503734",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001503734",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001503775",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001505384",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001505384",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001505116",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001502988",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001504306",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001504306",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001504492",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001506219",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001506219",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001504668",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001503907",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001502988",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001504492",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001504393",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001503886",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001504668",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001506219",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001504492",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001502176",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001503775",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "4120001503886",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001501602",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001501602",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001504668",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001501602",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001501602",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001504668",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001510752",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001508183",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     },
//     {
//       "cookie_id": "736811197LADLIUisptKrWrb",
//       "url": "http://www.religarehealthinsurance.com/",
//       "ts": "2016-10-25 18:34:22",
//       "policy_id": "1120001508183",
//       "transaction_ref_num": "",
//       "uw_dicision": "",
//       "policy_num": ""
//     }
//   ]
// }', true);
// print_r($dataArr);
foreach ($dataArr as $cookie_id => $data) {
	
	$trueKey = 0;
	$earliestTs = $data[$trueKey]['ts'];	// already order by timestamp (ts)

	$pebKey = 0;
	$pebTs = $data[$pebKey]['ts'];

	$relKey = 0;
	$relTs = $data[$relKey]['ts'];


	foreach ($data as $key => $value) { //echo "<br>" .$value['cookie_id'] . "<br>" . strtotime($value['ts']) . "<br>" . strtotime($earliestTs);
		// $finalArr[$cookie_id][$key]['cookie_id'] = $data[$trueKey]['cookie_id'];
			

		$finalArr[$cookie_id][$key]['url'] = $data[$trueKey]['url'];
			$finalArr[$cookie_id][$key]['peb_ts'] = $finalArr[$cookie_id][$key]['rel_ts'] = "";
		if(strpos($value["url"], 'policybazaar') !== false){ // echo "<br>cookie lo: ".$data[$trueKey]['cookie_id'];
			if(strtotime($value["ts"]) < strtotime($pebTs)){
				$pebTs = $value["ts"];
				$pebKey = $key;
			}
		
			$finalArr[$cookie_id][$key]['peb_ts'] = $data[$pebKey]['ts'];
			$finalArr[$cookie_id][$key]['owner'] = "PB";
		
		}else{
			if(strtotime($value["ts"]) < strtotime($relTs)){
				$relTs = $value["ts"];
				$relKey = $key;
			}

			$finalArr[$cookie_id][$key]['rel_ts'] = $data[$relKey]['ts'];
		$finalArr[$cookie_id][$key]['owner'] = "Religare";	
		}


		$finalArr[$cookie_id][$key]['policy_id'] = $value['policy_id'];
			$finalArr[$cookie_id][$key]['transaction_ref_num'] = $value['transaction_ref_num'];
			$finalArr[$cookie_id][$key]['uw_dicision'] = $value['uw_dicision'];
		
			$finalArr[$cookie_id][$key]['policy_num'] = $value['policy_num'];
	}
	
}

// print_r($finalArr);
echo json_encode($finalArr);

?>