<?php

//echo 123;exit;
//echo phpinfo();exit;
error_reporting(E_ALL);
ini_set("show_errors", 1);
try {
    $curl = curl_init();
} catch (Exception $e) {
    echo $e->getMessage();
}
/*
  $insert_arr = array();
  $insert_arr["nickname"] = "darkarmy1";
  $insert_arr["login_type"] = "facebook";
  $insert_arr["status"] = "online";
  $insert_arr["bio"] = "purple lamborghini";
  $insert_arr["images"][] = "https://i.redd.it/3552oen7hecx.jpg";
  $insert_arr["likes"][] = "joker";
  $insert_arr["likes"][] = "batman";
  $insert_arr["likes"][] = "harley";
  $insert_arr["location"] = "28.6424673,77.3727664";


 */
//echo $post_fields;exit;
//echo "<pre>";print_r($insert_arr);exit;
//echo getRandomWord(15)."\n";exit;

$imagesArr = array(
    "https://i.redd.it/kwwa6xreqecx.png", "http://i.imgur.com/4NjxD4q.jpg", "https://i.redd.it/3552oen7hecx.jpg", "https://i.redd.it/bwceqhptldcx.jpg", "http://i.imgur.com/tL93jKX.jpg", "http://i.imgur.com/i3ifq6v.jpg", "https://i.redd.it/leow42syrccx.jpg", "http://i.imgur.com/g9aG6EX.jpg", "http://i.imgur.com/YB7P6kt.jpg", "http://i.imgur.com/AV6innC.jpg", "https://i.redd.it/5p44o35tl9cx.png", "https://i.redd.it/xpnhvikb38cx.png", "https://i.redd.it/k3j2w9row7cx.jpg", "https://i.redd.it/x9ou5lphs7cx.jpg", "http://i.imgur.com/2XPJKqt.png", "https://i.redd.it/r86lnlp9z6cx.png", "https://i.redd.it/wsfkmsc686cx.jpg", "https://i.redd.it/26xgrn9x76cx.jpg", "http://imgur.com/4EmRQM0.jpg", "https://i.redd.it/da7natja56cx.jpg", "https://i.redd.it/12s4fy8hw1cx.jpg", "https://i.redd.it/byfi4ll506cx.jpg", "http://i.imgur.com/tzoWOax.jpg", "https://i.redd.it/ufodgy0yh3cx.jpg", "https://i.redd.it/p9je5ipm50cx.png", "http://i.imgur.com/f2sTwSY.jpg", "https://i.redd.it/v95jv3cci1cx.png", "http://i.imgur.com/awxbdyy.jpg", "https://i.redd.it/pjilwbetg0cx.jpg", "https://i.redd.it/l5bog8w4e0cx.jpg", "https://i.imgur.com/c957ALS.jpg", "https://i.redd.it/hjbm9kynyzbx.jpg", "https://i.redd.it/h3ysxk08kzbx.jpg", "http://i.imgur.com/Rkt3xr9.jpg", "http://i.imgur.com/L2m3VtS.jpg", "http://i.imgur.com/3GoM33M.jpg", "https://i.redd.it/9pira9194tbx.jpg", "http://i.imgur.com/7dS00lM.jpg", "http://i.imgur.com/kWr2TCv.jpg", "https://i.redd.it/7p8r4xklhubx.png", "http://imgur.com/OqPfyCQ.jpg", "https://i.redd.it/yd1xpbml3tbx.jpg", "https://i.redd.it/r8d821we3tbx.jpg", "https://i.redd.it/hxykyb202tbx.png", "https://i.redd.it/3qcik2vo1tbx.jpg", "https://i.redd.it/pwexa15c1tbx.jpg", "https://i.redd.it/xilluumvzsbx.jpg", "https://i.redd.it/59n4vbjmzsbx.jpg", "https://i.redd.it/prgcgm9zqsbx.png", "https://i.redd.it/31u25svrnobx.png", "http://i.imgur.com/Fewdcde.jpg", "https://i.redd.it/j7k2ydjpsnbx.jpg", "https://i.redd.it/mh57dovrknbx.jpg", "https://i.redd.it/thy3068nymbx.jpg", "http://imgur.com/WB9OVmO.jpg", "https://i.redd.it/s6zucx037mbx.png", "http://imgur.com/3zU0Wjk.jpg", "http://i.imgur.com/Zy1cno1.jpg", "https://i.redd.it/d2smu9reymbx.jpg", "http://i.imgur.com/Vbm9rrz.jpg", "http://i.imgur.com/rEUnxYG.jpg", "http://i.imgur.com/jH4cF9Q.jpg", "https://i.redd.it/2vx89hbbvgbx.png", "https://i.redd.it/b8qyx1x1ngbx.png", "http://imgur.com/CsIv3BS.jpg", "http://i.imgur.com/fr75HnC.png", "http://i.imgur.com/GPXnsho.jpg", "http://i.imgur.com/kCspLC1.jpg", "https://i.redd.it/4nsxctftr6bx.jpg", "https://i.redd.it/pakl1zap1dbx.jpg", "http://imgur.com/wvkfVUM.jpg", "https://i.redd.it/4ozkawg27bbx.jpg", "http://frialigan.se/wp-content/uploads/2015/11/018.jpg", "https://i.redd.it/ibmotp0jxabx.jpg", "https://i.redd.it/tmo9jq36m8bx.jpg", "https://i.redd.it/k7w0eon2k8bx.jpg", "https://i.redd.it/dl85vzst38bx.jpg", "https://i.redd.it/ekmwf3ea08bx.jpg", "https://i.redd.it/dozs2na8c6bx.jpg", "https://i.redd.it/wofpn4hxg3bx.png", "http://i.imgur.com/wtbP3Wy.jpg", "https://i.redd.it/mv55ed4ut1bx.jpg", "https://i.redd.it/xzhrvs9zo1bx.jpg", "http://i.imgur.com/zkgbkWB.png", "https://i.redd.it/nuyvan6vf0bx.jpg"
);


curl_setopt_array($curl, array(
    CURLOPT_PORT => "8080",
    CURLOPT_URL => "http://localhost:8080/api/users",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded",
        "postman-token: a8e9246d-b601-cf6f-9399-bf06db5dfc9f"
    ),
));


for ($i = 0; $i < 50000 ; $i++) {
    $insert_arr = array();
//    echo getRandomLocation() . "\n";
    $randomLocation = getRandomLocation();
    $temp = explode(",", $randomLocation);
//    print_r($temp);
    $nCharNickname = substr($temp[0], -1);
    $nStatusAndImgs = substr($temp[1], -1);
    $insert_arr["location_lat"] = $temp[0];
    $insert_arr["location_long"] = $temp[1];
    $insert_arr["nickname"] = ucfirst(getRandomWord($nCharNickname));
    $insert_arr["login_type"] = ($nCharNickname % 2 == 0) ? "google" : "facebook";
    $insert_arr["status"] = (($nStatusAndImgs % 2 == 0) ? "on" : "off") . "line";
    $insert_arr["bio"] = getRandomWord(((int) $temp[0]) * 100, true, true);
    for ($j = 0; $j < $nStatusAndImgs; $j++) {
        $rand = rand(0, count($imagesArr));
//        echo $rand."\n";
        $insert_arr["images"][] = $imagesArr[$rand];
    }
    for ($k = 0; $k < $nCharNickname; $k++) {
        $rand = rand(0, 7);
//        echo "rand: ". $rand."\n";
        $insert_arr["likes"][] = getRandomWord($rand, false, true);
    }
    $post_fields = http_build_query($insert_arr);
    print_r($insert_arr);
    echo "\n";
//    echo $post_fields ."\n";

    curl_setopt_array($curl, array(
        CURLOPT_POSTFIELDS => $post_fields,
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);



    if ($err) {
        echo "cURL Error #:" . $err . "\n\n";
    } else {
        echo "Response:\n" . $response . "\n\n";
    }
}

curl_close($curl);
exit;

function getRandomWord($len = 10, $nFlag = true, $spaceFlag = false) {
    if ($nFlag) {
        if ($spaceFlag) {
            $word = array_merge(array(" "), array_merge(range('a', 'z'), array_merge(range('0', '9'), range('A', 'Z'))));
        } else {
            $word = array_merge(range('a', 'z'), array_merge(range('0', '9'), range('A', 'Z')));
        }
    } else {
        if ($spaceFlag) {
            $word = array_merge(array(" "), array_merge(range('a', 'z'), range('A', 'Z')));
        } else {
            $word = array_merge(range('a', 'z'), range('A', 'Z'));
        }
    }

//    echo "<pre>";print_r($word);exit;
    shuffle($word);
    return substr(implode($word), 0, $len);
}

function getRandomLocation() {

    return ((substr((string) (mt_rand(-90, 90) + (mt_rand() / mt_getrandmax())), 0, 10)) . "," . (substr((string) (mt_rand(-180, 180) + (mt_rand() / mt_getrandmax())), 0, 10)));
}
