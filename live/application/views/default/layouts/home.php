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

</head>

<body>
    <div class="stars1"></div>
    <div class="stars2"></div>
    <div class="stars3"></div>

    <div class="wrapper">
        <header class="login__header">
            <div class="login__header__logo">
                <img src="<?php echo base_url();?>assets/b2c/img/logo_neo.png">
            </div>

            <!-- DESKTOP HEADER -->
            <div class="login__header__nav">
                <ul>
                    <li><a href="<?php echo site_url('b2c/about'); ?>">About Us</a></li>
                    <li><a href="<?php echo site_url('b2c/contact'); ?>">Contact Us</a></li>
                    <li class="btn__signin"><a href="<?php echo site_url('login'); ?>">Sign In</a></li>
                </ul>
            </div>

            <!-- MOBILE HEADER -->
            <div class="login__header__mobile">
                <ul>
                    <li class="btn__signin"><a href="<?php echo site_url('login'); ?>">Sign In</a></li>
                </ul>
            </div>
        </header>
        <main class="main flex--center" >
            <h2>Welcome to NEO.</h2>
        </main>
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
