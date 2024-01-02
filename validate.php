<?php
error_reporting(0);
require 'config.php';
header("Access-Control-Allow-Origin: *");
$response = $_POST["cf-turnstile-response"];
$verify_url = "https://challenges.cloudflare.com/turnstile/v0/siteverify";
$data = array("secret" => $secret_key,"response" => $response);

$options = array(
    "http" => array(
        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "POST",
        "content" => http_build_query($data))
		);

$context = stream_context_create($options);
$result = file_get_contents($verify_url, false, $context);
$response_data = json_decode($result, true);

if (!$response_data["success"]) {exit();}
if ($response_data["success"]) {
	setcookie("captcha", "1", time()+1800, "/");
	exit();
}

?>