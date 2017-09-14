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
                    <li class="btn__signin"><a href="">Sign In</a></li>
                </ul>
            </div>
        </header>
        <main class="main flex--center" style="background-image:url('<?php echo base_url();?>assets/b2c/img/bgStarLarge.png')">
            <section class="box__assessment">
                <div class="assignup">
                    <div class="signup__title">
                        Sign In
                    </div>
										<form id="login-form" action="login" method="POST">
                    <div class="signup__form">

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="login__warning hide">*Invalid email address</div>
                            <p class="control">
                                <input class="input" type="email" placeholder="email" data-parsley-trigger="change" required data-parsley-required-message="Please input your e-mail address" data-parsley-type-message="Invalid e-mail address" name="email" onblur="validateEmail(this);">
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <p class="control">
                                <input class="input" type="password" placeholder="password" name="password" data-parsley-trigger="change" required data-parsley-required-message="Please input your password" style="letter-spacing:2px;">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="signin">
                    Don't have an account? <span><a href="#">Sign Up</a></span>
                </div>
								<button type="submit" class="neobutton next" value="Sign In" name="__submit">SIGN IN</button>
								</form>
                <!-- <button class="neobutton next">SIGN IN</button> -->
            </section>
        </main>
        <footer class="flex--center">
            <span>Powered by</span>
            <a style="pointer-events: none;cursor: default;"><img src="http://idbuild.id.dyned.com/dsa-ept/public/assets/img/logo-200pxl" height="20" style="margin-left:10px;" alt="DynEd International, Inc.">
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
