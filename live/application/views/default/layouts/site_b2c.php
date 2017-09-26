<?php
    $role = array(
        'STD' => 'Student',
        'CCH' => 'Coach',
        'PRT' => 'Coach Affiliate',
        'ADM' => 'Admin Region',
        'SPR' => 'Student Affiliate',
        'RAD' => 'Super Admin',
    );
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> <!--320-->
        <title><?php echo $this->template->title->append(' - DynEd Live') ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/b2c/css/app.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/b2c/lib/multiple-select.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/b2c/lib/jQuery/jquery-ui.css">
        <link href="<?php echo base_url();?>assets/b2c/font/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <script type="text/javascript" src="<?php echo base_url();?>assets/b2c/lib/jQuery/jquery-2.2.3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/b2c/lib/multiple-select.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/b2c/lib/jQuery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/b2c/js/main.js"></script>

        <style media="screen">
          .active{
            background: #303e62;
          }
        </style>
    </head>

    <body>
    	    <!-- desktop header and nav menu -->
    <header class="header__desktop">
        <div class="header__logo">
            DODO
        </div>
        <div class="header__profile flex">
            <div id="noti__container">
                <div id="noti__counter"></div>   <!--SHOW NOTIFICATIONS COUNT.-->

                <div id="noti__button" class="fa fa-bell-o"></div>

                <!--THE NOTIFICAIONS DROPDOWN BOX.-->
                <div id="notifications">
                    <ul class="notification__list">
                        <?php
                        foreach($this->auth_manager->new_notification()['data_notification'] as $d){
                        ?>
                        <li>
                            <a href="<?php echo site_url('b2c/student/notification'); ?>"><?php echo($d->description);?><br>
                            <span><?php echo($this->auth_manager->new_notification()['received_time'][$d->id]);?></span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                    <div class="seeAll"><a href="<?php echo site_url('b2c/student/notification'); ?>">See All</a></div>
                </div>
            </div>
            <div class="profile__name">
                <h4><?php echo $this->auth_manager->get_name();?></h4>
                <h5><?php
                  if($this->auth_manager->role() == 'STD'){
                    echo 'Student';
                  }
                ?></h5>
            </div>
            <div class="header__profpic pic__circle--small">
                <img src="<?php echo base_url().'/'.($this->auth_manager->get_avatar()); ?>">
            </div>
            <a id="logout__container" class="trigger">
                <i class="fa fa-power-off" aria-hidden="true"></i>
            </a>
            <!-- MODAL -->
            <div class="modal-wrapper">
                <div class="modal__signout">
                    <div class="content">
                        <div>Are you sure?</div>
                        <span><a href="<?php echo site_url('logout'); ?>">Yes</a></span>
                        <span><a class="span-close">No</a></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- desktop header and nav menu -->

    <!-- mobile header and nav menu -->
    <header class="header__mobile">
        <div class="header__profpic pic__circle--small">
            <img src="<?php echo base_url().'/'.($this->auth_manager->get_avatar()); ?>">
        </div>
        <div class="header__title">
            Dashboard
        </div>
        <div class="mobile__menu">
            <div class="burger__menu">
                <div class="menu__bar"></div>
                <div class="menu__bar"></div>
                <div class="menu__bar"></div>
            </div>
            <nav class="mobile__nav">
                <ul>
                    <li id="dashboard" class="clicklimenu">
                        <a>Dashboard</a>
                    </li>
                    <li id='profile' class="clicklimenu">
                        <a>Profile</a>
                    </li>
                    <li id="study_dashboard" class="clicklimenu">
                        <a>Study Dashboard</a>
                    </li>
                    <li id="session_simulator" class="clicklimenu">
                        <a>Session Simulator</a>
                    </li>
                    <li>
                        <a id="logout__container" class="trigger">Logout</a>
                        <!-- MODAL -->
                        <div class="modal-wrapper">
                            <div class="modal__signout">
                                <div class="content">
                                    <div>Are you sure?</div>
                                    <span><a href="<?php echo site_url('logout'); ?>">Yes</a></span>
                                    <span><a class="span-close">No</a></span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- mobile header and nav menu -->

    <div class="wrapper">
     <!-- <div class="stars"></div>
    <div class="stars2"></div>
    <div class="stars3"></div> -->
        <main class="main flex">
        	<aside class="main__sidebar">
                <ul>
                    <li id="dashboard" class="clicklimenu dashboardactive">
                        <svg width="24px" height="24px" viewBox="0 0 13 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch -->
                            <title>home</title>
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="WebView-NeoLive" stroke="#fff" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="2.Study-Dashboard" transform="translate(-44.000000, -105.000000)" fill-rule="nonzero" fill="#FFFFFF">
                                    <g id="menu" transform="translate(0.000000, 80.000000)">
                                        <g id="menu-link" transform="translate(42.000000, 14.466667)">
                                            <g id="home" transform="translate(2.000000, 11.366667)">
                                                <path d="M16.5950806,10.24125 C16.3279032,10.24125 16.1112097,10.4651667 16.1112097,10.74125 L16.1112097,19.6491667 L10.9189516,19.6491667 L10.9189516,14.0573333 C10.9189516,13.78125 10.7022581,13.5573333 10.4350806,13.5573333 L6.64475806,13.5573333 C6.37758065,13.5573333 6.1608871,13.78125 6.1608871,14.0573333 L6.1608871,18.49125 C6.1608871,18.7673333 6.37758065,18.99125 6.64475806,18.99125 C6.91193548,18.99125 7.12862903,18.7673333 7.12862903,18.49125 L7.12862903,14.5573333 L9.95120968,14.5573333 L9.95120968,19.6491667 L0.968548387,19.6491667 L0.968548387,7.41075 L8.53983871,1.14083333 L16.2924194,7.56083333 C16.5009677,7.73358333 16.8054839,7.69875 16.9725806,7.48333333 C17.1396774,7.26783333 17.106129,6.95325 16.8975806,6.7805 L8.84241935,0.109833333 C8.66564516,-0.0366666667 8.41403226,-0.0366666667 8.23725806,0.109833333 L0.182096774,6.7805 C0.0675,6.87541667 0.000806451613,7.01883333 0.000806451613,7.17066667 L0.000806451613,20.1490833 C0.000806451613,20.4251667 0.217419355,20.6490833 0.484677419,20.6490833 L16.5950806,20.6490833 C16.8623387,20.6490833 17.0789516,20.4251667 17.0789516,20.1490833 L17.0789516,10.74125 C17.0789516,10.4650833 16.8623387,10.24125 16.5950806,10.24125 Z" id="Shape"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span><a> Dashboard </a></span>
                    </li>
                    <li id="profile" class="clicklimenu profileactive">
                        <svg width="24px" height="24px" viewBox="0 0 17 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch -->
                            <title>user</title>
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="WebView-NeoLive" stroke="#fff" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="2.Study-Dashboard" transform="translate(-42.000000, -155.000000)" fill-rule="nonzero" fill="#FFFFFF">
                                    <g id="menu" transform="translate(0.000000, 80.000000)">
                                        <g id="menu-link" transform="translate(42.000000, 14.466667)">
                                            <g id="user" transform="translate(0.000000, 60.966667)">
                                                <path d="M17.0782035,3.02312798 C13.177461,-1.00770933 6.83036493,-1.00770933 2.9296225,3.02312798 C1.56101357,4.4373572 0.62483267,6.21406726 0.222196841,8.1612534 C-0.169784375,10.0572476 -0.0413860958,12.0216146 0.593479602,13.8418729 C0.669758495,14.0604553 0.903142047,14.1737788 1.1146056,14.0950274 C1.32620488,14.0162059 1.43587275,13.775113 1.35959386,13.5565305 C0.776304635,11.8840977 0.658357379,10.0792672 1.01857834,8.33698893 C1.38823237,6.54905873 2.24820224,4.91722881 3.5054467,3.6180762 C7.08872235,-0.0846419733 12.9191036,-0.0846419733 16.5023793,3.6180762 C18.2088141,5.38146233 19.1640647,7.72542087 19.1920925,10.2183268 C19.2201202,12.7066746 18.3226895,15.0693568 16.6652523,16.8710317 C16.6456397,16.8923499 16.6262307,16.9138085 16.6068216,16.935267 C16.5724825,16.9732051 16.5382113,17.0112134 16.5023793,17.0482398 C12.9191036,20.750958 7.08872235,20.750958 3.5054467,17.0482398 C3.48637698,17.0285345 3.4677823,17.0084784 3.44939122,16.9884224 C3.44844112,16.9495727 3.44762676,16.9112839 3.44762676,16.8735562 C3.44762676,16.7888441 3.44918762,16.7044826 3.45217363,16.6204017 C3.45319159,16.5922812 3.4552275,16.5644412 3.45658478,16.5363908 C3.45923146,16.4805005 3.46174242,16.4246101 3.46567852,16.3690003 C3.46805376,16.3358307 3.47151481,16.3030118 3.47436509,16.2699825 C3.47864051,16.2198425 3.48264447,16.1697024 3.48793785,16.1198429 C3.49167035,16.0846397 3.49655655,16.049717 3.50083196,16.0146541 C3.50660039,15.9673191 3.51209735,15.9198438 3.51888373,15.8727192 C3.52404138,15.8368147 3.53014912,15.8012609 3.53584968,15.7655668 C3.5431111,15.7196343 3.55016893,15.6737019 3.55838045,15.6280499 C3.56482751,15.5919351 3.57222466,15.5561709 3.5792825,15.5202664 C3.58803693,15.4754559 3.59665563,15.4305753 3.60629228,15.3860454 C3.61409662,15.3499306 3.62278318,15.3140261 3.63113043,15.2781216 C3.64131,15.2342929 3.6514217,15.1904642 3.66241563,15.1469862 C3.67157724,15.1109415 3.68148536,15.0751772 3.69112201,15.0393429 C3.70272672,14.9964258 3.71426356,14.9534387 3.72668264,14.9108021 C3.7370658,14.8750379 3.74819546,14.8395542 3.75918939,14.8040705 C3.77221924,14.7619248 3.78524908,14.719709 3.79902543,14.677914 C3.810698,14.6426406 3.82291348,14.6075777 3.83512896,14.5725147 C3.84958395,14.5310002 3.8641068,14.4894856 3.87930829,14.4482516 C3.89220241,14.413399 3.90557157,14.3788971 3.9190086,14.344325 C3.93482086,14.3035819 3.95076885,14.2628387 3.96732761,14.2224462 C3.98144328,14.1880845 3.99596613,14.1540033 4.01062471,14.1199221 C4.02779425,14.0798802 4.04516737,14.0399786 4.06308341,14.0003574 C4.07835276,13.9666269 4.09396143,13.9331067 4.1097737,13.8996566 C4.12836837,13.860316 4.14716664,13.8210455 4.16643996,13.7821256 C4.18279513,13.7491664 4.19942175,13.7163475 4.21631984,13.6836688 C4.23627179,13.6449593 4.25656306,13.6063901 4.27726151,13.5680312 C4.29470251,13.5357733 4.31234709,13.5036556 4.33026313,13.4717483 C4.35157236,13.4338102 4.37322091,13.3960824 4.39527663,13.358495 C4.41380345,13.3269383 4.43253385,13.2955219 4.45153571,13.2642457 C4.47420222,13.227079 4.49720804,13.1901227 4.52055318,13.1534468 C4.54009795,13.1226615 4.55977845,13.0920165 4.57979826,13.0615819 C4.60375418,13.0251164 4.628253,12.9890717 4.65295542,12.9530971 C4.67351815,12.9231533 4.69408087,12.8932797 4.71511865,12.8637567 C4.74043184,12.8281327 4.76628794,12.7928594 4.79227977,12.7577964 C4.81379259,12.7287643 4.83523755,12.6997322 4.85722541,12.6710507 C4.88389588,12.6361981 4.91117712,12.6017663 4.93852622,12.5674747 C4.96085341,12.5394243 4.98318059,12.511374 5.00598283,12.4836742 C5.03407843,12.449593 5.06278481,12.4160027 5.09155906,12.3824825 C5.11476847,12.3554139 5.13784216,12.3282752 5.16145875,12.3016274 C5.19091164,12.2683877 5.22097529,12.2357791 5.25110681,12.2031706 C5.27513059,12.1770838 5.29901864,12.1509268 5.32344961,12.1251906 C5.35432763,12.0927924 5.38588429,12.0610955 5.41737308,12.0292583 C5.4420755,12.0043636 5.46657433,11.9791884 5.49168393,11.9546444 C5.52412281,11.9229475 5.55730821,11.8920219 5.59035787,11.8610263 C5.6156032,11.8373938 5.6405092,11.8134809 5.66609385,11.7901991 C5.70022933,11.7591333 5.73524705,11.7289792 5.77006117,11.6986147 C5.79557795,11.6763848 5.82082328,11.6538042 5.84667938,11.6319249 C5.88271505,11.6014903 5.91963295,11.5719673 5.95641512,11.5422339 C5.98206763,11.5215468 6.00731296,11.5003687 6.03323692,11.4800322 C6.07198714,11.4496677 6.11155173,11.4203551 6.15104845,11.3909022 C6.17595446,11.3722487 6.20038542,11.3531744 6.22563075,11.3348716 C6.2691993,11.3032448 6.3137858,11.27274 6.35823658,11.242095 C6.38015658,11.2270179 6.40160154,11.2113799 6.42365727,11.1965132 C6.48161294,11.1575933 6.54058657,11.1199357 6.59996738,11.0827689 C6.60919685,11.0770186 6.61815487,11.0708475 6.62745221,11.0650972 C6.69613036,11.0226009 6.7657586,10.9813669 6.83620121,10.9412548 C6.86029285,10.9275803 6.88506314,10.9147473 6.90942623,10.9013532 C6.95618438,10.8755469 7.0028068,10.8495302 7.05037931,10.8248458 C7.08085015,10.8089974 7.11206749,10.7941307 7.14280979,10.7787731 C7.18162787,10.7593482 7.22031023,10.739713 7.25960336,10.7209894 C7.99762201,11.4494573 8.98212192,11.8618678 10.0040148,11.8618678 C11.0259076,11.8618678 12.0104754,11.4493872 12.7484941,10.7208491 C14.1891743,11.4098362 15.3683076,12.6460858 16.0084666,14.1494451 C16.0989969,14.3620669 16.3391669,14.4587705 16.5451334,14.3651524 C16.7509643,14.2715343 16.8444127,14.0232185 16.7538146,13.8105967 C16.0535961,12.1661441 14.8345589,10.8520547 13.2915401,10.0587904 C13.7392374,9.38018197 13.9814433,8.57885319 13.9814433,7.75192846 C13.9814433,5.48566943 12.1971687,3.64191901 10.0040148,3.64191901 C9.77918206,3.64191901 9.59683207,3.83034733 9.59683207,4.06267447 C9.59683207,4.29500161 9.77918206,4.48342993 10.0040148,4.48342993 C11.7481819,4.48342993 13.1670779,5.94969258 13.1670779,7.75192846 C13.1670779,8.55781542 12.8772317,9.33382874 12.3510159,9.93684144 C12.350948,9.93691156 12.3508801,9.93698169 12.3508123,9.93705182 C11.7499463,10.625548 10.8945912,11.020427 10.0039469,11.020427 C9.11330261,11.020427 8.25787962,10.625548 7.65708154,9.93705182 C7.65701368,9.93691156 7.65687795,9.93684144 7.65674222,9.93677131 C7.13059431,9.33354824 6.84081595,8.55774529 6.84081595,7.75199859 C6.84081595,6.87233917 7.17409499,6.04709747 7.77930421,5.42844669 C7.93919129,5.26498319 7.94054856,4.99857486 7.78235808,4.83342834 C7.62423547,4.66814157 7.36642095,4.66687931 7.20653388,4.83020255 C6.44557727,5.60789889 6.02645054,6.64555198 6.02645054,7.75171808 C6.02645054,8.5778013 6.26804561,9.37856907 6.71499649,10.0568269 C6.71099253,10.0588605 6.70712429,10.0611046 6.70318819,10.0632083 C6.67142794,10.0796178 6.64041419,10.097009 6.6089254,10.1137691 C6.56067425,10.1395754 6.51228737,10.1652415 6.46471486,10.1920998 C6.43105442,10.2110337 6.39814049,10.2309495 6.36481937,10.2503744 C6.32036859,10.2763911 6.27584995,10.3022676 6.23200994,10.3291258 C6.19801019,10.3500233 6.16455334,10.3716221 6.13089291,10.3930105 C6.08881736,10.4197986 6.04674181,10.4465166 6.00527704,10.474076 C5.97141301,10.4965865 5.93815976,10.519728 5.90470291,10.5427293 C5.86445969,10.570429 5.82428433,10.598269 5.78465188,10.6267401 C5.75133076,10.6507232 5.71841683,10.6751971 5.68550289,10.6996711 C5.64682054,10.7284928 5.60827391,10.7574548 5.57020232,10.7869778 C5.53755984,10.8122933 5.50532455,10.8379594 5.47315711,10.8637657 C5.43583203,10.8937095 5.39877841,10.9238636 5.36213196,10.9545086 C5.33037171,10.9810162 5.29888292,11.0078745 5.26752985,11.0348729 C5.23149418,11.0660088 5.19572996,11.0974954 5.16030507,11.1293325 C5.12956278,11.156892 5.09902407,11.1846619 5.06875683,11.2127824 C5.03380698,11.2452507 4.99933217,11.2780696 4.96506096,11.311169 C4.93547235,11.3397103 4.90595161,11.3683216 4.87677018,11.3974239 C4.84290615,11.4312246 4.80958503,11.4655161 4.77633178,11.499948 C4.74796472,11.5293307 4.71959766,11.5586434 4.69177351,11.5884469 C4.65885957,11.6237202 4.62655641,11.6596247 4.59432111,11.6955291 C4.56737919,11.725543 4.54023368,11.7554167 4.5137668,11.7859214 C4.4815315,11.8229479 4.45017844,11.8607458 4.41868964,11.8984034 C4.39337645,11.9286978 4.36785967,11.9587117 4.34302152,11.9893567 C4.31105768,12.0288376 4.28011179,12.0690899 4.24896232,12.1092019 C4.22582077,12.1390755 4.20220417,12.1685284 4.1794698,12.1987527 C4.14675946,12.2422307 4.11513494,12.2865503 4.08337468,12.3307296 C4.06342273,12.3584995 4.04292787,12.3857785 4.0233831,12.4138288 C3.98320774,12.4713321 3.94432179,12.5296768 3.90577516,12.5883021 C3.89566346,12.6037298 3.88494098,12.6187367 3.87489714,12.6342346 C3.82691745,12.7082875 3.78029503,12.783182 3.73489415,12.858918 C3.71921762,12.8850749 3.70449118,12.9117929 3.68915396,12.9380901 C3.65976895,12.9885107 3.6302482,13.0388611 3.601949,13.0899829 C3.58430442,13.1218901 3.56760993,13.1543584 3.55044039,13.1865462 C3.52567011,13.2328293 3.5007641,13.2789722 3.47701178,13.3258163 C3.45936719,13.3605286 3.4426727,13.3956617 3.42550316,13.4306545 C3.40337957,13.4758156 3.38118811,13.5209066 3.35994675,13.5665585 C3.34304867,13.6028838 3.32696495,13.6396297 3.31060978,13.6761653 C3.2905221,13.7212563 3.27036655,13.7662771 3.25109324,13.8117888 C3.23521311,13.8493062 3.22001163,13.8871742 3.20474228,13.9249721 C3.18635119,13.9703435 3.16809583,14.015715 3.15058698,14.0614371 C3.13586053,14.0998661 3.12174487,14.1385055 3.1076292,14.1771448 C3.09093471,14.2230072 3.07444381,14.2689397 3.05856369,14.3151526 C3.04512666,14.354353 3.03209681,14.3937638 3.01920269,14.4332447 C3.00406907,14.4795979 2.98934263,14.5260914 2.97509123,14.5728653 C2.96294361,14.6126267 2.95120318,14.6525284 2.93966634,14.6925001 C2.92609358,14.7396949 2.91299587,14.7870299 2.90030534,14.8345752 C2.88958286,14.8746873 2.87906398,14.9148694 2.86895227,14.9552619 C2.85694038,15.0032982 2.84553927,15.0515448 2.83440961,15.0999317 C2.82511227,15.1403242 2.81588279,15.1806466 2.80726409,15.2211794 C2.79681307,15.2701974 2.78710855,15.3194959 2.77760762,15.3688645 C2.76980328,15.4092571 2.76186322,15.4496496 2.75466966,15.4902525 C2.74577951,15.5406029 2.73777158,15.5912338 2.72983152,15.6419348 C2.72358805,15.6819066 2.71700526,15.7218083 2.71137257,15.7619203 C2.70397541,15.8142342 2.69773195,15.8668286 2.69135275,15.9194231 C2.68667015,15.9584131 2.6815125,15.997333 2.67737281,16.0364632 C2.67153653,16.0915822 2.66705752,16.1470518 2.66237492,16.2025214 C2.65925318,16.2394777 2.65552067,16.2762938 2.65294185,16.3134606 C2.64859857,16.3753817 2.64574829,16.4375834 2.64283015,16.4998552 C2.64140501,16.5307808 2.6391655,16.5614959 2.63807968,16.5924916 C2.63482222,16.6858993 2.6329899,16.7796576 2.6329899,16.8737666 C2.6329899,16.975379 2.63631522,17.0714515 2.64031919,17.177552 C2.64126928,17.2020961 2.6445946,17.2259389 2.64934507,17.2492207 C2.64975225,17.251044 2.64995584,17.2528672 2.65036303,17.2546905 C2.65538495,17.2776217 2.66244278,17.2996412 2.67092575,17.3209595 C2.67174012,17.3230633 2.67248662,17.3251671 2.67336885,17.3272708 C2.68212328,17.3483086 2.6925743,17.3683646 2.7043826,17.3874389 C2.7058756,17.3898231 2.70730074,17.3922074 2.70879374,17.3945216 C2.72094136,17.4132452 2.73444625,17.4308468 2.74917269,17.4472563 C2.75025852,17.4484484 2.75100502,17.4499211 2.75209084,17.4511132 L2.80583895,17.5102293 C2.8464215,17.5551099 2.88700404,17.5998502 2.92935104,17.6435387 C4.87975619,19.6589573 7.44168189,20.6666667 10.0036755,20.6666667 C12.565669,20.6666667 15.1275947,19.6589573 17.0779999,17.6435387 C17.1203469,17.5998502 17.1609294,17.5550398 17.201512,17.5102293 L17.2552601,17.4511132 C19.0596902,15.4896214 20.0366573,12.9176835 20.0061864,10.2088598 C19.9758513,7.4946365 18.9359067,4.94275464 17.0782035,3.02312798 Z" id="Shape"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span><a> Profile </a></span>
                    </li>
                    <li id="study_dashboard" class="clicklimenu study_dashboardactive">
                        <svg width="24px" height="24px" viewBox="0 0 14 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch -->
                            <title>new-file</title>
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="WebView-NeoLive" stroke="#fff" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="2.Study-Dashboard" transform="translate(-44.000000, -199.000000)" fill-rule="nonzero" fill="#FFFFFF">
                                    <g id="menu" transform="translate(0.000000, 80.000000)">
                                        <g id="menu-link" transform="translate(42.000000, 14.466667)">
                                            <g id="new-file" transform="translate(2.000000, 105.400000)">
                                                <g id="Group">
                                                    <path d="M11.6191304,1.56662319 L4.72384058,8.69175604 C4.66905797,8.74836473 4.62985507,8.81897585 4.61043478,8.89647585 L4.01862319,11.2517271 C3.97992754,11.4059034 4.02304348,11.5696643 4.13202899,11.6823575 C4.21463768,11.7676449 4.32557971,11.8139203 4.43942029,11.8139203 C4.47586957,11.8139203 4.51253623,11.8092029 4.54869565,11.7995435 L6.82797101,11.18793 C6.90297101,11.1677874 6.97137681,11.1272778 7.02608696,11.070744 L13.9212319,3.94576087 C13.9213768,3.94561111 13.9215217,3.94553623 13.9215942,3.94546135 C13.9216667,3.94538647 13.9218116,3.94516184 13.9218841,3.94508696 L15.31,2.51070048 C15.4798551,2.33525845 15.4798551,2.05079227 15.3100725,1.87542512 L13.6227536,0.131637681 C13.5411594,0.0473236715 13.4306522,0 13.3152899,0 C13.2,0 13.0894203,0.0473236715 13.0078986,0.131637681 L11.6198551,1.56594928 C11.6197101,1.56609903 11.6195652,1.56617391 11.6194928,1.56624879 C11.6194203,1.56632367 11.6192754,1.56654831 11.6191304,1.56662319 Z M6.495,10.3489082 L5.04623188,10.7376812 L5.4223913,9.24062077 L11.9268841,2.51931159 L12.9994203,3.62767391 L6.495,10.3489082 Z M13.3152899,1.0846256 L14.3878261,2.19298792 L13.6142754,2.99232367 L12.5417391,1.88396135 L13.3152899,1.0846256 Z" id="Shape"></path>
                                                    <path d="M15.0026812,4.8687971 C14.7626087,4.8687971 14.5678986,5.06999758 14.5678986,5.31807246 L14.5678986,19.7557609 L0.927463768,19.7557609 L0.927463768,2.57711836 L8.97550725,2.57711836 C9.21557971,2.57711836 9.41028986,2.37591787 9.41028986,2.127843 C9.41028986,1.87976812 9.21557971,1.67856763 8.97550725,1.67856763 L0.492681159,1.67856763 C0.252608696,1.67856763 0.0578985507,1.87976812 0.0578985507,2.127843 L0.0578985507,20.2051111 C0.0578985507,20.453186 0.252608696,20.6543865 0.492681159,20.6543865 L15.0026812,20.6543865 C15.2427536,20.6543865 15.4374638,20.453186 15.4374638,20.2051111 L15.4374638,5.31807246 C15.4374638,5.06999758 15.2428261,4.8687971 15.0026812,4.8687971 Z" id="Shape"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span><a> Study Dashboard </a></span>
                    </li>
                    <li id="session_simulator" class="clicklimenu session_simulatoractive">
                        <svg width="24px" height="24px" viewBox="0 0 17 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch -->
                            <title>play-button</title>
                            <desc>Created with Sketch.</desc>
                            <defs></defs>
                            <g id="WebView-NeoLive" stroke="#fff" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="2.Study-Dashboard" transform="translate(-43.000000, -246.000000)" fill-rule="nonzero" fill="#FFFFFF">
                                    <g id="menu" transform="translate(0.000000, 80.000000)">
                                        <g id="menu-link" transform="translate(42.000000, 14.466667)">
                                            <g id="play-button" transform="translate(1.000000, 151.900000)">
                                                <g id="Group-3">
                                                    <path d="M18.8831864,5.60073672 C18.1832542,4.19799548 17.1625085,2.95932655 15.9314576,2.01860791 C15.7507797,1.88059661 15.4961356,1.92003842 15.3625085,2.10666893 C15.2288814,2.29329944 15.2671186,2.55650169 15.4477288,2.69458305 C16.5790508,3.55908023 17.5169492,4.69721808 18.1601356,5.98604746 C18.8340339,7.33652655 19.1757288,8.79727458 19.1757288,10.3278689 C19.1757288,15.5590576 15.0570847,19.8149898 9.99464407,19.8149898 C4.93220339,19.8149898 0.813559322,15.5590576 0.813559322,10.3277989 C0.813559322,5.09654011 4.93220339,0.840677966 9.99464407,0.840677966 C10.2192542,0.840677966 10.4014237,0.652436158 10.4014237,0.420338983 C10.4014237,0.188241808 10.2192542,0 9.99464407,0 C4.48359322,0 0,4.63304633 0,10.3277989 C0,16.0225514 4.48359322,20.6555977 9.99464407,20.6555977 C15.5056949,20.6555977 19.9892881,16.0225514 19.9892881,10.3277989 C19.9892881,8.68539435 19.6068475,7.05083616 18.8831864,5.60073672 Z" id="Shape"></path>
                                                    <path d="M7.43722034,5.53229153 C7.3100339,5.60704181 7.23145763,5.74659435 7.23145763,5.89770621 L7.23145763,15.1223254 C7.23145763,15.3544927 7.41362712,15.5426644 7.63823729,15.5426644 C7.86284746,15.5426644 8.04501695,15.3544927 8.04501695,15.1223254 L8.04501695,6.63715254 L14.0675932,10.3419503 L9.63884746,13.2904181 C9.4500339,13.4161695 9.39552542,13.6762893 9.51722034,13.8713966 C9.63898305,14.066574 9.89064407,14.1228994 10.0795254,13.997078 L15.0602034,10.6810938 C15.1785763,10.6022802 15.2490847,10.4658102 15.2465763,10.3203028 C15.2440678,10.1747955 15.1689492,10.0409876 15.0479322,9.96651751 L7.84630508,5.53649492 C7.72047458,5.4592226 7.56440678,5.45754124 7.43722034,5.53229153 Z" id="Shape"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span><a> Session Simulator </a></span>
                    </li>
                </ul>
            </aside>

            <section class="main__content">

            <?php
            echo $this->template->partial->widget('messages_widget', '', true);
            echo $content;
            ?>

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


        <script type="text/javascript" src="<?php echo base_url();?>assets/b2c/js/circle-progress.js"></script>
    <script>
      //redirect ----------------------------------------- class="clicklimenu"
      $('.clicklimenu').on('click', function(){
        // var url_href =  window.location.pathname.split( '/' );;
        var base_url =  "<?php echo site_url(); ?>";
        var getrole  =  "<?php echo $this->auth_manager->role(); ?>";

        if (getrole = "STD") {
          var role = 'student'
        }

        var url_href = base_url+'/b2c/'+role+'/'+this.id;

        if( this.id == 'session_simulator' ){
          window.open(url_href, '_blank');
          window.focus();
        }else{
          window.location.href = url_href;
        }
        // console.log(current_page);
        // console.log(url_href);
      });

      //Add menu active ----------------------------------
      current_page = document.location.href;
      menuClass    = current_page.split("/")[6];

      if(menuClass == 'find_coaches' || menuClass == 'session' || menuClass == 'token' || menuClass == 'help'){
        menuClass = 'dashboard';
      }

      $('.'+menuClass+'active').addClass('active');
      // console.log(menuClass);
    </script>

    <script>
    //notifications
      var totalNotif = '<?php echo ($this->auth_manager->new_notification()['notification'])?>';
      // console.log(totalNotif);

      $('#noti__counter')
          .css({ opacity: 0 })
          .text(totalNotif)              // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
          .css({ top: '10px', right: '5px' })
          .animate({ opacity: 1 }, 500);

      if (totalNotif == 0) {
          $('#noti__counter').hide();
      };

      $('#noti__button').click(function () {

          // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
          $('#notifications').fadeToggle('fast', 'linear', function () {
              if ($('#notifications').is(':hidden')) {
                  $('#noti__button').css('background-color', 'rgb(59, 74, 116)');
              }       // CHANGE BACKGROUND COLOR OF THE BUTTON.
          });

          $('#noti__counter').fadeOut('slow');                 // HIDE THE COUNTER.

          return false;
      });

      // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
      $(document).click(function () {
          $('#notifications').hide();

          // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
          if ($('#noti__counter').is(':hidden')) {
              // CHANGE BACKGROUND COLOR OF THE BUTTON.
              $('#noti__button').css('background-color', '#2E467C');
          }
      });

      // $('#notifications').click(function () {
      //     return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
      // });


      // $("#numnotif").addClass("hide");
      $("#noti__button").click(function(){
        // console.log('a');
        var id = '<?php echo $this->auth_manager->userid(); ?>';
        $.ajax({
          type:"POST",
          url:"<?php echo site_url('account/notification/ajax_update');?>",
          data: {'id':id},
          success: function(data){
              // console.log(id);
            }
         });
       });
    </script>
    </div>
    </body>
</html>
