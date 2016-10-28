<?php

$jsonData = '{
  "data": [
    {
      "_id": "796134578RbHsOTtpTclcgfD",
      "flow": [
        {
          "cookieID": "796134578RbHsOTtpTclcgfD",
          "trackid": "579df61c88e4111071b21e30",
          "visitedURL": "http://localhost/care-thankyou?proposal_number=1120000427956&code=f0be8f3a897e1933aae6ac52594bf73f567c5d2ba28b93d69ed7a7b089777886",
          "baseURL": "http://localhost",
          "referrer": "",
          "sessionID": "s%3A69a1zLQ-J8k3JSUKyTix4sECSNi0oIpS.uE4PkNwNzRLIOARCE42vMaCihLSbtOpJ1hr69W4FPlk",
          "createdAt": "2016-10-28T09:55:23.445Z",
          "updatedAt": "2016-10-28T09:55:23.445Z",
          "recordId": "5813208bea0c66e40d30fc5f"
        },
        {
          "cookieID": "796134578RbHsOTtpTclcgfD",
          "trackid": "579df61c88e4111071b21e30",
          "visitedURL": "http://localhost/buy-health-insurance-policy-plan-online/care-filldetails?id=1372959&code=40bb5bb65556e352ff47b3be0b6e76260fd5ebc79450d5545409761025a325cb&status=1&caseUW=NO",
          "baseURL": "http://localhost",
          "referrer": "http://localhost/buy-health-insurance-policy-plan-online/care-filldetails",
          "sessionID": "s%3A69a1zLQ-J8k3JSUKyTix4sECSNi0oIpS.uE4PkNwNzRLIOARCE42vMaCihLSbtOpJ1hr69W4FPlk",
          "createdAt": "2016-10-28T09:53:21.632Z",
          "updatedAt": "2016-10-28T09:53:21.632Z",
          "recordId": "58132011ea0c66e40d30fc5d"
        },
        {
          "cookieID": "796134578RbHsOTtpTclcgfD",
          "trackid": "579df61c88e4111071b21e30",
          "visitedURL": "http://localhost/care-thankyou?proposal_number=1120000427956&code=f0be8f3a897e1933aae6ac52594bf73f567c5d2ba28b93d69ed7a7b089777886",
          "baseURL": "http://localhost",
          "referrer": "",
          "sessionID": "s%3A69a1zLQ-J8k3JSUKyTix4sECSNi0oIpS.uE4PkNwNzRLIOARCE42vMaCihLSbtOpJ1hr69W4FPlk",
          "createdAt": "2016-10-28T09:55:23.438Z",
          "updatedAt": "2016-10-28T09:55:23.438Z",
          "recordId": "5813208bea0c66e40d30fc5e"
        },
        {
          "cookieID": "796134578RbHsOTtpTclcgfD",
          "trackid": "579df61c88e4111071b21e30",
          "visitedURL": "http://localhost/buy-health-insurance-policy-plan-online/care-filldetails",
          "baseURL": "http://localhost",
          "referrer": "http://localhost/PortalProposal.php",
          "sessionID": "s%3A69a1zLQ-J8k3JSUKyTix4sECSNi0oIpS.uE4PkNwNzRLIOARCE42vMaCihLSbtOpJ1hr69W4FPlk",
          "createdAt": "2016-10-28T09:51:30.922Z",
          "updatedAt": "2016-10-28T09:51:30.922Z",
          "recordId": "58131fa2ea0c66e40d30fc5c"
        },
        {
          "cookieID": "796134578RbHsOTtpTclcgfD",
          "trackid": "579df61c88e4111071b21e30",
          "visitedURL": "http://localhost/buy-health-insurance-policy-plan-online.html",
          "baseURL": "http://localhost",
          "referrer": "http://localhost/",
          "sessionID": "s%3A69a1zLQ-J8k3JSUKyTix4sECSNi0oIpS.uE4PkNwNzRLIOARCE42vMaCihLSbtOpJ1hr69W4FPlk",
          "createdAt": "2016-10-28T09:51:06.794Z",
          "updatedAt": "2016-10-28T09:51:06.794Z",
          "recordId": "58131f8aea0c66e40d30fc5b"
        },
        {
          "cookieID": "796134578RbHsOTtpTclcgfD",
          "trackid": "579df61c88e4111071b21e30",
          "visitedURL": "http://localhost/",
          "baseURL": "http://localhost",
          "referrer": "",
          "sessionID": "s%3A69a1zLQ-J8k3JSUKyTix4sECSNi0oIpS.uE4PkNwNzRLIOARCE42vMaCihLSbtOpJ1hr69W4FPlk",
          "createdAt": "2016-10-28T09:50:14.046Z",
          "updatedAt": "2016-10-28T09:50:14.046Z",
          "recordId": "58131f56ea0c66e40d30fc5a"
        }
      ]
    },
    {
      "_id": "331041421gJZwkSNcDgtLHef",
      "flow": [
        {
          "cookieID": "331041421gJZwkSNcDgtLHef",
          "trackid": "579df61c88e4111071b21e30",
          "visitedURL": "http://localhost/",
          "baseURL": "http://localhost",
          "referrer": "",
          "sessionID": "s%3AF550pc-xXrpP_9IBF5Fc-q3Tqm1Q7yU6.KYhAqmBBeLpIIn1qv%2BA2E1ERnkavoSEOQBnvklXR1BY",
          "createdAt": "2016-10-28T10:08:32.236Z",
          "updatedAt": "2016-10-28T10:08:32.236Z",
          "recordId": "581323a0ea0c66e40d30fc63"
        }
      ]
    }
  ]
}';

echo $jsonData;exit;


 $mysql = mysqli_connect("localhost", "root", "root");
            mysqli_select_db($mysql, "customer_path_new_27Oct");

            
?>