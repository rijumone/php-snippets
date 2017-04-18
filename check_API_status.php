<?php
$request = $_REQUEST;
// echo "<pre>";print_r($request);exit;
?>
<form action="http://localhost/Kitchen/php-snippets/check_API_status.php" method="GET">
    <select name="serverURL">
        <option value="//localhost:1337/">localhost</option>
        <option value="//analytics.religarehealthinsurance.com/">production - analytics</option>
        <option value="//52.66.134.24:1337/">dev - 52.66.134.24</option>
        <option value="//52.66.137.111/">production - 52.66.137.111</option>
        <option value="//52.66.137.111/">production - 35.154.25.15</option>
    </select>
    <input type="submit">
    <span id="status"></span>
</form>
<!--<script  src="https://code.jquery.com/jquery-3.1.1.min.js"></script>-->
<script type="text/javascript">
    // var serverURL = "//52.66.134.24:1337/";
    var serverURL = "<?php echo $request['serverURL']; ?>";
    // var serverURL = "//analytics.religarehealthinsurance.com/";
    var _raq = _raq || [];
    //    _raq.push(['_setAccount',  '579df61c88e4111071b21e30']);
    //    _raq.push(['_setData', {key1 : 'value1', key2 : 'value2'  }]);
    // _raq.push(['_setAccount', '579df61c88e4111071b21e30']);
    _raq.push(['_setAccount', '57a33b8abbc768b941d4a63d']);
    _raq.push(['_setData', {'tagid': "RHI47380", 'pbaction': 'Proceed'}]);
    (function () {
        var ra = document.createElement('script');
        ra.type = 'text/javascript';
        ra.async = true;
        ra.src = serverURL + "ra.js";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ra, s);
    })();
    var ajaxCompleted = false;
    var intervalVar = setInterval(function () {
        if (ajaxCompleted == false) {
            console.log('pending');
            document.getElementById('status').innerHTML = 'pending';
        } else {
            console.log('complete');
            clearInterval(intervalVar);
            document.getElementById('status').innerHTML = 'complete';
        }
    }, 500);

    /*
     var vowels = ['a', 'e', 'i', 'o', 'u'];
     var consonants = ['b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z', ];
     var resultArr = [];
     for (var i = 0; i < consonants.length; i++) {
     for (var j = 0; j < vowels.length; j++) {
     for (var k = 0; k < consonants.length; k++) {
     for (var l = 0; l < vowels.length; l++) {
     resultArr.push(consonants[i] + vowels[j] + consonants[k] + vowels[l]);
     }
     }
     }
     }
     document.write(resultArr);
     
     */
</script>



<!--<script src="http://analytics.religarehealthinsurance.com/ra.js"></script>-->