<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live B2c</title>
    <link href="<?php echo base_url();?>assets/b2c/font/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/b2c/css/app.css">

	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/b2c/js/jquery.translate.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/b2c/js/flag-translate.js"></script>
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
	<div class="stars1"></div>
    <div class="stars2"></div>
    <div class="stars3"></div>

	<div class="alert-login">
		<div id="alert-login-confirm">
			<h3 id="alert-login-title"></h3>
			<button id="alert-login-reload" class="btn-primary pure-button trn" data-trn-key="conti">Continue</button>
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
                <img src="<?php echo base_url();?>assets/b2c/img/logo_newneo.svg">
            </div>
            <div class="login__header__nav">
                <ul class="ulheder">
                    <li><a href="<?php echo site_url('b2c/about'); ?>" class="trn" data-trn-key="about" style="color:#49C5FE!important;">About</a></li>
                    <li><a href="<?php echo site_url('b2c/contact'); ?>" class="trn" data-trn-key="contact">Contact</a></li>
                    <li class="btn__signin"><a href="<?php echo site_url('login'); ?>" class="trn" data-trn-key="sign_in" style="color:#fff!important;">Sign In</a></li>
                    <li>
                        <div id="lang_selector" class="language-dropdown">
                            <?php if($this->session->userdata('language')){ ?>
                                <label for="toggle" class="lang-flag lang-<?php echo $this->session->userdata('language'); ?>"  title="Click to select the language">
                                    <span class="title1"> <?php echo strtoupper($this->session->userdata('language')); ?> </span>
                                    <span class="flag"></span>
                                    <div class="bxarrow" id="bxarrow">
                                        <span class="arrow"></span>
                                    </div>
                                </label>
                            <?php }else{ ?>
                                <label for="toggle" class="lang-flag lang-en"  title="Click to select the language">
                                    <span class="title1"> EN </span>
                                    <span class="flag"></span>
                                    <div class="bxarrow" id="bxarrow">
                                        <span class="arrow"></span>
                                    </div>
                                </label>
                            <?php } ?>
                            <ul class="lang-list">
                                <li class="lang lang-en" title="English">
                                    <span class="title2">EN</span>
                                    <span class="flag"></span>
                                </li>
                                <li class="lang lang-id"  title="Indonesia">
                                    <span class="title2">ID</span>
                                    <span class="flag"></span>
                                </li>
                                <li class="lang lang-es"  title="Spanish">
                                    <span class="title2">ES</span>
                                    <span class="flag"></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        
        <!-- mobile header and nav menu -->
        <header class="header__mobile--login">
            <div class="login__header__logo">
                <img src="<?php echo base_url();?>assets/b2c/img/logo_newneo.svg">
            </div>

            <div class="mobile__menu">
                <div id="lang_selector" class="language-dropdown hidden">
                    <?php if($this->session->userdata('language')){ ?>
                        <label for="toggle" class="lang-flag lang-<?php echo $this->session->userdata('language'); ?>"  title="Click to select the language">
                            <span class="title1"> <?php echo strtoupper($this->session->userdata('language')); ?> </span>
                            <span class="flag"></span>
                            <div class="bxarrow" id="bxarrow">
                                <span class="arrow"></span>
                            </div>
                        </label>
                    <?php }else{ ?>
                        <label for="toggle" class="lang-flag lang-en"  title="Click to select the language">
                            <span class="title1"> EN </span>
                            <span class="flag"></span>
                            <div class="bxarrow" id="bxarrow">
                                <span class="arrow"></span>
                            </div>
                        </label>
                    <?php } ?>
                    <ul class="lang-list">
                        <li class="lang lang-en" title="English">
                            <span class="title2">EN</span>
                            <span class="flag"></span>
                        </li>
                        <li class="lang lang-id" title="Indonesia">
                            <span class="title2">ID</span>
                            <span class="flag"></span>
                        </li>
                        <li class="lang lang-es" title="Spanish">
                            <span class="title2">ES</span>
                            <span class="flag"></span>
                        </li>
                    </ul>
                </div>
                <div class="burger__menu">
                    <div class="menu__bar"></div>
                    <div class="menu__bar"></div>
                    <div class="menu__bar"></div>
                </div>
                <nav class="mobile__nav">
                    <ul>
                        <li><a href="<?php echo site_url('b2c/about'); ?>" class="trn" data-trn-key="about">About</a></li>
                        <li><a href="<?php echo site_url('b2c/contact'); ?>" class="trn" data-trn-key="contact">Contact</a></li>
                        <li class="btn__signin"><a href="<?php echo site_url('login'); ?>" target="_self" class="trn" data-trn-key="sign_in">Sign In</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- mobile header and nav menu -->

        <main class="main flex--center">
            <div class="about__us">
                <h2 class="title trn" data-trn-key="about3">About Us</h2>
                <!-- <p><b>DynEd International, Inc.</b>, has the world's most comprehensive lineup of award-winning English Language Teaching (ELT/ESL) solutions.</p>
                <p>DynEd's courses cover all proficiency levels and include a range of age-appropriate courses, from kids in school to adults in university, corporate, aviation or other vocational settings. DynEd courses have been approved by Ministries of Education in several countries.</p>
                <p>With over 13 million active users, DynEd courses are designed to be used in a blended learning environment, along with teachers and classroom support.</p>
                <p>DynEd's headquarters and development center is in Burlingame, California – overlooking the San Francisco Bay. The company has sales and support offices around the world and additional development centers in Beijing and Jakarta.</p>
                <p>For a representative in your area, or to become a partner, please <a href="mailto:info@dyned.com">contact us</a>.</p> -->
                <p style="text-align: justify;" class="trn" data-trn-key="aboutdeckrip">neo LIVE is our online platform for your personalized coaching sessions where, from the very first session, you will talk about yourself using the English language you've already learned. That will help you personalize what you have been studying in the neo Study App. With neo LIVE, you can practice with our trained coaches anytime, anywhere. The coach can see all your study data, which they will use to help you learn more efficiently. neo LIVE also gives your coach a personalized coaching script to guide your conversation class.</p>
            </div>
        </main>
        <footer class="flex--center">
            <span>Powered by</span>
            <a style="pointer-events: none;cursor: default;">
                <svg width="48px" viewBox="0 0 56 38" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 46.2 (44496) - http://www.bohemiancoding.com/sketch -->
                    <title>powerbyDynEd</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Live-portal" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="3-copy-2" transform="translate(-132.000000, -478.000000)">
                            <g id="powerbyDynEd" transform="translate(132.000000, 477.000000)">
                                <g transform="translate(-1.000000, 0.000000)">
                                    <g id="Logo" transform="translate(1.000000, 19.000000)">
                                        <g id="Group" fill="#FFFFFF">
                                            <path d="M5.52005659,0.0341641964 C5.52005659,0.0341641964 12.9601329,-0.307477768 12.7029874,7.89192937 C12.3429837,14.793097 5.53719962,14.6222761 5.53719962,14.6222761 L0.0171430329,14.6222761 L0.0171430329,0.0170820982 L5.52005659,0.0170820982 L5.52005659,0.0341641964 Z M2.05716395,1.81070241 L2.05716395,12.8628199 L5.77720208,12.8628199 C5.77720208,12.8628199 10.3372488,12.9823946 10.5772513,7.75527258 C10.7486816,1.53738884 5.74291602,1.79362031 5.74291602,1.79362031 L2.05716395,1.79362031 L2.05716395,1.81070241 Z" id="Shape"></path>
                                            <polygon id="Shape" points="12.9429898 4.39009924 16.6287419 14.1781415 14.7944374 19.1661142 16.8001722 19.1661142 22.6288034 4.39009924 20.5716395 4.39009924 17.6401808 12.0257971 15.0858689 4.39009924"></polygon>
                                            <path d="M23.1945235,4.39009924 L23.1945235,14.6222761 L25.0802571,14.6222761 L25.0802571,7.17448125 C25.0802571,7.17448125 25.7831215,5.82499549 27.8917145,5.82499549 C30.0003076,5.82499549 30.5317416,7.25989174 30.5317416,8.31898183 L30.5317416,14.6393582 L32.4517613,14.6393582 L32.4517613,8.48980281 C32.4517613,8.48980281 32.5717625,4.18511406 28.4917207,4.18511406 C25.9716948,4.18511406 24.8916838,5.50043562 24.8916838,5.50043562 L24.6516813,4.39009924 L23.1945235,4.39009924 Z" id="Shape"></path>
                                        </g>
                                        <polygon id="Shape" fill="#2B89B9" points="42.3947203 1.81070241 42.3947203 0.0341641964 33.4460572 0.0341641964 33.4460572 14.6393582 42.5490076 14.6222761 42.5490076 12.8457378 35.468935 12.8457378 35.468935 7.89192937 40.663274 7.89192937 40.663274 6.11539116 35.468935 6.11539116 35.468935 1.81070241"></polygon>
                                        <path d="M50.4348028,0.0341641964 L50.4348028,5.48335352 C50.4348028,5.50043562 50.4519458,5.51751772 50.4519458,5.55168192 C49.6290802,4.68049491 48.5147831,4.16803196 47.3147708,4.16803196 C44.7604589,4.16803196 42.6861519,6.47411522 42.6861519,9.44640031 C42.6861519,12.4186854 44.7604589,14.8443433 47.3147708,14.8443433 C48.5147831,14.8443433 49.5947941,14.3147983 50.4176597,13.4436113 L50.6233761,14.6222761 L52.3205364,14.6222761 L52.3205364,0.0170820982 L50.4348028,0.0170820982 L50.4348028,0.0341641964 Z M47.6062023,13.2557082 C45.9261851,13.2557082 44.5547425,11.8549762 44.5547425,9.5318108 C44.5547425,7.05490656 45.9261851,5.80791339 47.6062023,5.80791339 C49.2862196,5.80791339 50.6576622,7.48195901 50.6576622,9.5318108 C50.6576622,11.7866478 49.2862196,13.2557082 47.6062023,13.2557082 Z" id="Shape" fill="#2B89B9"></path>
                                        <g id="Group" transform="translate(53.314832, 0.000000)" fill="#2B89B9">
                                            <path d="M0.788579513,0.0341641964 C1.21715534,0.0341641964 1.56001599,0.409970357 1.56001599,0.85410491 C1.56001599,1.31532156 1.21715534,1.67404562 0.788579513,1.67404562 C0.360003691,1.67404562 0.0171430329,1.29823946 0.0171430329,0.85410491 C0.0171430329,0.409970357 0.360003691,0.0341641964 0.788579513,0.0341641964 Z M0.788579513,1.53738884 C1.1485832,1.53738884 1.42287173,1.24699317 1.42287173,0.85410491 C1.42287173,0.461216652 1.1485832,0.170820982 0.788579513,0.170820982 C0.428575822,0.170820982 0.154287296,0.461216652 0.154287296,0.85410491 C0.154287296,1.24699317 0.428575822,1.53738884 0.788579513,1.53738884 Z" id="Shape"></path>
                                            <path d="M0.600006151,1.22991107 L0.497147954,1.22991107 L0.497147954,0.461216652 L0.805722546,0.461216652 C0.960009842,0.461216652 1.06286804,0.546627143 1.06286804,0.683283928 C1.06286804,0.785776517 0.994295908,0.871187008 0.89143771,0.905351205 L1.08001107,1.21282897 L0.960009842,1.21282897 L0.788579513,0.905351205 L0.582863118,0.905351205 L0.582863118,1.22991107 L0.600006151,1.22991107 Z M0.600006151,0.837022812 L0.805722546,0.837022812 C0.908580743,0.837022812 0.977152875,0.785776517 0.977152875,0.683283928 C0.977152875,0.597873437 0.908580743,0.529545044 0.805722546,0.529545044 L0.617149184,0.529545044 L0.617149184,0.837022812 L0.600006151,0.837022812 Z" id="Shape"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
        </footer>
    </div>
    <script>
        var getlang  =  "<?php echo $this->session->userdata('language'); ?>";
        if (!getlang) {
            getlang = "en";
        }
        DefaultLanguage(getlang);
    </script>
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
    
    <script>
        $(document).ready(function () {
            $(".lang-flag").click(function () {
                $(".language-dropdown").toggleClass("open");
                $(".bxarrow").toggleClass("active");
            });
            $("ul.lang-list li").click(function () {
                $("ul.lang-list li").removeClass("selected");
                $(this).addClass("selected");
                if ($(this).hasClass('lang-en')) {
                    $(".language-dropdown").find(".lang-flag").addClass("lang-en").removeClass("lang-es").removeClass("lang-id");
                    $(".title1").html("<p>EN</p>")
                    langselect = "en";
                    // $(".lang-en").attr("data-value", "en")
                } else if ($(this).hasClass('lang-id')) {
                    $(".language-dropdown").find(".lang-flag").addClass("lang-id").removeClass("lang-es").removeClass("lang-en");
                    $(".title1").html("<p>ID</p>")
                    langselect = "id";
                    // $(".lang-id").attr("data-value", "id")
                } else {
                    $(".language-dropdown").find(".lang-flag").addClass("lang-es").removeClass("lang-en").removeClass("lang-id");
                    $(".title1").html("<p>ES</p>")
                    langselect = "es";
                    // $(".lang-es").attr("data-value", "es")
                }
                $.ajax({
                  type:"POST",
                  url: "<?php echo site_url().'/home/session'; ?>",
                  data: {'language':langselect},
                 });
                $(".bxarrow").removeClass("active");
                $(".language-dropdown").removeClass("open");
                ChangeLanguages();
            });

            //FUNCTION CHECK TO ADD CLASS TO DROPDOWN LANGUAGE
        if (langselect == "en") {
            $(".language-dropdown").find(".lang-flag").addClass("lang-en").removeClass("lang-es").removeClass("lang-id");
            $(".lang-list").find(".lang-en").addClass("selected");
            $(".title1").html("<p>EN</p>")
        } else if (langselect == "id") {
            $(".language-dropdown").find(".lang-flag").addClass("lang-id").removeClass("lang-es").removeClass("lang-en");
            $(".lang-list").find(".lang-id").addClass("selected");
            $(".title1").html("<p>ID</p>")
        } else {
            $(".language-dropdown").find(".lang-flag").addClass("lang-es").removeClass("lang-en").removeClass("lang-id");
            $(".lang-list").find(".lang-es").addClass("selected");
            $(".title1").html("<p>ES</p>")
        }

        })
    </script>
</body>

</html>
