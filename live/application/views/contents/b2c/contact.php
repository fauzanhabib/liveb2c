<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live B2c</title>
    <link href="<?php echo base_url();?>assets/b2c/font/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/b2c/css/app.css">

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/b2c/js/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/FuckAdBlock-master/fuckadblock.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/parsleyjs/parsley.min.js"></script>

	<style>
		.alert-login {
			height: 0;
		}
		.alert-login.error {
			z-index: 999;
			position: absolute;
			width: 100%;
			height: 100%;
			color: #f6f6f6;
		    background: rgba(0, 0, 0, 0.8);
		    display: table;
		}
		#alert-login-confirm {
			display: table-cell;
    		vertical-align: middle;
			text-align: center;
		}
		#alert-login-reload {
			display: none;
		}
	</style>
</head>

<body>
    <div class="stars"></div>
    <div class="stars2"></div>
    <div class="stars3"></div>

	<div class="alert-login">
		<div id="alert-login-confirm">
			<h3 id="alert-login-title"></h3>
			<button id="alert-login-reload" class="btn-primary pure-button">Continue</button>
		</div>
		<!-- pervent adblock -->
		<script>
			function adBlockDetected() {
				$('.alert-login').addClass('error');
				$('#alert-login-title').html('Please disable AdBlock browser extension.<br> Once you have disabled AdBlock browser extension click button below').css("padding", "5px");
				$('#alert-login-reload').show();
			}
			if(typeof fuckAdBlock === 'undefined') {
				adBlockDetected();
			} else {
				fuckAdBlock.onDetected(adBlockDetected);
				fuckAdBlock.onNotDetected(adBlockNotDetected);
				// and|or
				fuckAdBlock.on(true, adBlockDetected);
				fuckAdBlock.on(false, adBlockNotDetected);
				// and|or
				fuckAdBlock.on(true, adBlockDetected).onNotDetected(adBlockNotDetected);
			}
		</script>
		<!-- pervent adblock -->
	</div>

    <div class="wrapper">
        <header class="login__header">
            <div class="login__header__logo">
                <img src="<?php echo base_url();?>assets/b2c/img/logo_neo.png">
            </div>
            <div class="login__header__nav">
                <ul>
                    <li><a href="<?php echo site_url('b2c/about'); ?>">About Us</a></li>
                    <li><a href="<?php echo site_url('b2c/contact'); ?>">Contact Us</a></li>
                    <li class="btn__signin"><a href="<?php echo site_url('login'); ?>">Sign In</a></li>
                </ul>
            </div>
        </header>
        <main class="main flex--center">
            <div class="contact__us">
                <h2 class="title">Contact Us</h2>
                <form class="pure-form pure-form-stacked" data-parsley-validate>
                    <span>Do you have a question? Fill in the form below and we will get back to you within 24 hours:</span>
                    <div class="contact__us__form">
                        <div class="p10">
                            <input class="input" placeholder="Name" type="text" required data-parsley-required-message="Please input your name"  >
                        </div> 
                        <div class="p10">
                            <input class="input" placeholder="Email" type="email" required data-parsley-required-message="Please input your e-mail address" data-parsley-type-message="Invalid e-mail address">
                        </div>
                        <div class="p10">
                            <input class="input" placeholder="Country" type="text" required data-parsley-required-message="Please input your Country">
                        </div>
                        <div class="p10">
                            <input class="input" placeholder="City" type="text" required data-parsley-required-message="Please input your City">
                        </div>  
                        <div class="p10__textarea">
                            <textarea class="input" placeholder="Messages" style="height: 150px;resize: none;" required data-parsley-required-message="Please input your message"></textarea>
                        </div>
                    </div>
                    <div class="p10__button">
                        <button type="submit" class="neobutton">SEND</button>
                    </div>
                </form>
            </div>
        </main>
        <div class="contact__us--address">
                <div class="left">
                    <div>
                        <h3>DynEd International, Inc.</h3>
                        1350 Bayshore Highway, Suite 850<br>
                        Burlingame, CA 94010<br>
                        USA<br>
                        Phone: +1-650-375-7011
                    </div>
                </div>
                <div class="right">
                    <iframe width='100%' height='180px' frameBorder='0' src='https://a.tiles.mapbox.com/v4/djiepanji.n3c1a3hj/attribution,zoompan,zoomwheel,geocoder,share.html?access_token=pk.eyJ1IjoiZGppZXBhbmppIiwiYSI6InNXakYwcUUifQ.f1sLn25sWb-DA3VNMQlKJw'></iframe>
                </div>
        </div>
        <footer class="flex--center">
            <span>Powered by</span>
            <a style="pointer-events: none;cursor: default;"><img src="http://idbuild.id.dyned.com/dsa-ept/public/assets/img/logo-200pxl" height="20" style="margin: 10px 0 0 10px;" alt="DynEd International, Inc.">
            </a>
        </footer>
    </div>

    <script>
		$('#login-form').parsley();

		// TO REFRESH WHEN ADBLOCK POPUP SHOW UP
		$('#alert-login-reload').click(function() {
		    location.reload();
		});
		// TO REFRESH WHEN ADBLOCK POPUP SHOW UP END

		var d = new Date()
        var n = d.getTimezoneOffset();

        $('#min_raw').val(n);

        // function validateEmail(emailField){
        //     var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        //     if (reg.test(emailField.value) == false)
        //     {
        //         $('.login__warning').show();
        //         return false;
        //     } else {
        //         $('.login__warning').hide();
        //     }

        //     return true;
        // }
    </script>
</body>

</html>
