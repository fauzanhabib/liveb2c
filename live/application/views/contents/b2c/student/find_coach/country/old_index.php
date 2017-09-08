            <section class="main__content">
                <div class="dashboard">
                    <?php if(count($datasession)!=0){ ?>
                    <div class="dashboard__notif">
                        <?php if(count($datasession)==1){ ?>
                        <span>You Have <?php echo count($datasession); ?> Session Left For Today</span>
                        <?php }else{ ?>
                        <span>You Have <?php echo count($datasession); ?> Sessions Left For Today</span>
                        <?php } ?>
                        <i class="fa fa-times"></i>
                    </div>
                    <?php } ?>

                    <div class="dashboard__menu">
                        <a href="<?php echo site_url('b2c/student/find_coaches/single_date'); ?>" >
                            <div class="booking activediv">
                                <svg width="54px" height="65px" viewBox="0 0 54 65" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 45.1 (43504) - http://www.bohemiancoding.com/sketch -->
                                    <title>icBookCoach</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs></defs>
                                    <g id="WebView-NeoLive" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                        <g id="9.Dashboard" class="svgstroke" transform="translate(-391.000000, -187.000000)" stroke="#a1a6b3">
                                            <g id="Group-2" transform="translate(330.000000, 158.000000)">
                                                <g id="icBookCoach" transform="translate(62.507392, 30.913298)">
                                                    <g id="Group">
                                                        <path d="M25.8375,49.2125 L25.8375,49.2125 C18.0645833,49.2125 11.8083333,43.0125 11.4291667,35.45625 L11.05,24.21875 C11.05,16.85625 16.9270833,10.85 24.3208333,10.85 L27.1645833,10.85 C34.5583333,10.85 40.4354167,16.85625 40.4354167,24.21875 L40.05625,35.45625 C39.8666667,43.0125 33.6104167,49.2125 25.8375,49.2125 Z" id="Shape-Copy-2" stroke-width="2"></path>
                                                        <rect id="Rectangle-path" stroke-width="2" x="0.433333333" y="22.66875" width="3.60208333" height="7.55625"></rect>
                                                        <rect id="Rectangle-path" stroke-width="2" x="47.6395833" y="22.66875" width="3.60208333" height="7.55625"></rect>
                                                        <path d="M21.6666667,57.54375 C8.01666667,57.54375 0.433333333,42.625 0.433333333,28.675" id="Shape" stroke-width="2"></path>
                                                        <ellipse id="Oval" stroke-width="2" cx="25.8375" cy="57.54375" rx="4.17083333" ry="4.2625"></ellipse>
                                                        <path d="M42.9,18.6 L42.9,17.4375 C42.9,7.75 35.3166667,0 25.8375,0 C16.3583333,0 8.775,7.75 8.775,17.4375 L8.775,18.6" id="Shape" stroke-width="2"></path>
                                                        <path d="M4.03541667,30.6125 C4.03541667,32.74375 5.55208333,34.4875 7.44791667,34.4875 C9.34375,34.4875 10.8604167,32.74375 10.8604167,30.6125 L10.8604167,22.475 C10.8604167,20.34375 9.34375,18.6 7.44791667,18.6 C5.55208333,18.6 4.03541667,20.34375 4.03541667,22.475 L4.03541667,30.6125 Z" id="Shape" stroke-width="2"></path>
                                                        <path d="M40.625,30.6125 C40.625,32.74375 42.1416667,34.4875 44.0375,34.4875 C45.9333333,34.4875 47.45,32.74375 47.45,30.6125 L47.45,22.475 C47.45,20.34375 45.9333333,18.6 44.0375,18.6 C42.1416667,18.6 40.625,20.34375 40.625,22.475 L40.625,30.6125 Z" id="Shape" stroke-width="2"></path>
                                                        <path d="M20.71875,36.61875 C20.71875,36.61875 22.8041667,38.55625 25.8375,38.55625 C29.0604167,38.55625 30.95625,36.61875 30.95625,36.61875" id="Shape" stroke-width="2"></path>
                                                        <path d="M21.6666667,26.93125 L21.6666667,27.125" id="Shape" stroke-width="2"></path>
                                                        <path d="M30.3333333,26.93125 L30.3333333,27.125" id="Shape" stroke-width="2"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span>Book a coach</span>
                            </div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/session'); ?>">
                            <div class="sessions">
                                <i><?php echo count($datasession);?></i>
                                <svg width="54px" height="63px" viewBox="0 0 54 63" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 45.1 (43504) - http://www.bohemiancoding.com/sketch -->
                                    <title>ic_Sessions</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs></defs>
                                    <g id="WebView-NeoLive" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="9.Dashboard" class="svgstroke" transform="translate(-594.000000, -188.000000)" stroke="#a1a6b3" stroke-width="2">
                                            <g id="Group-2" transform="translate(330.000000, 158.000000)">
                                                <g id="ic_Sessions" transform="translate(263.854839, 31.400000)">
                                                    <path d="M43.0921057,6.74471962 L47.4534766,6.74471962 C50.517084,6.74471962 53.0400548,10.1170794 53.0400548,14.2388525 L53.0400548,52.833637 C53.0400548,56.9554101 49.7962352,60.3277699 45.8315668,60.3277699 L8.70785352,60.3277699 C4.74318511,60.3277699 1.49936551,56.9554101 1.49936551,52.833637 L1.49936551,14.2388525 C1.49936551,10.1170794 4.38276071,6.74471962 7.98700472,6.74471962 L13.1296377,6.74471962" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M18.9529171,6.44027047 L36.9453032,6.44027047" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <g id="Group" transform="translate(12.885172, 21.896920)">
                                                        <path d="M27.3473791,14.168595 C27.3473791,6.87922214 21.466043,1 14.1736896,1 C6.8813361,1 1,6.87922214 1,14.168595 C1,21.4579679 6.8813361,27.3371901 14.1736896,27.3371901 C21.466043,27.3371901 27.3473791,21.4579679 27.3473791,14.168595 Z" id="Shape"></path>
                                                        <polyline id="Shape" stroke-linecap="round" stroke-linejoin="round" points="13.5294309 5.8767468 13.5294309 13.5047035 16.5896594 18.1132607"></polyline>
                                                    </g>
                                                    <path d="M16.3290275,12.9273793 L16.3290275,12.9273793 C14.829662,12.9273793 13.7051378,11.8032593 13.7051378,10.3044328 L13.7051378,3.18500649 C13.7051378,1.6861799 14.829662,0.562059968 16.3290275,0.562059968 L16.3290275,0.562059968 C17.828393,0.562059968 18.9529171,1.6861799 18.9529171,3.18500649 L18.9529171,10.3044328 C18.9529171,11.8032593 17.828393,12.9273793 16.3290275,12.9273793 Z" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M39.5691928,12.9273793 L39.5691928,12.9273793 C38.0698273,12.9273793 36.9453032,11.8032593 36.9453032,10.3044328 L36.9453032,3.18500649 C36.9453032,1.6861799 38.0698273,0.562059968 39.5691928,0.562059968 L39.5691928,0.562059968 C41.0685583,0.562059968 42.1930825,1.6861799 42.1930825,3.18500649 L42.1930825,10.3044328 C42.1930825,11.8032593 41.0685583,12.9273793 39.5691928,12.9273793 Z" id="Shape" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span>Sessions</span>
                            </div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/token'); ?>">
                            <div class="tokens">
                                <svg width="63px" height="63px" viewBox="0 0 63 63" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 45.1 (43504) - http://www.bohemiancoding.com/sketch -->
                                    <title>Token</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs></defs>
                                    <g id="WebView-NeoLive" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="9.Dashboard" class="svgstroke" transform="translate(-788.000000, -188.000000)">
                                            <g id="Group-2"  transform="translate(330.000000, 158.000000)">
                                                <g id="Token" transform="translate(458.604839, 30.144000)">
                                                    <g id="Group">
                                                        <circle id="Oval-2-Copy-2" stroke="#FFFFFF" stroke-width="2" cx="31" cy="31" r="30"></circle>
                                                        <circle class="svgstroke" id="Oval-2" stroke="#a1a6b3" stroke-width="2" cx="31" cy="31" r="30"></circle>
                                                        <circle class="svgstroke" id="Oval-2-Copy" stroke="#a1a6b3" cx="31" cy="31" r="21.3823529"></circle>
                                                        <path class="svgfill" d="M36.7185882,33.1882353 C36.7185882,31.1458824 35.4250979,29.6481567 32.8381176,28.6950588 L30.9234118,28.0312941 C30.344745,27.7930197 29.915,27.559 29.6341765,27.3292353 C29.3533529,27.0994706 29.2129412,26.7973727 29.2129412,26.4229412 C29.2129412,25.9804315 29.387392,25.6528038 29.7362941,25.4400588 C30.0851962,25.2273139 30.5234509,25.1209412 31.0510588,25.1209412 C32.2254118,25.1209412 33.2040391,25.699608 33.9869412,26.8569412 L36.2845882,25.1209412 C35.4165882,23.5040786 34.1486273,22.5339609 32.4807059,22.2105882 L32.4807059,19.1725882 L29.4682353,19.1725882 L29.4682353,22.2616471 C28.3789803,22.5169412 27.5024706,23.0105097 26.8387059,23.7423529 C26.1749412,24.4741962 25.8430588,25.3592156 25.8430588,26.3974118 C25.8430588,28.422745 27.1110197,29.9034509 29.6469412,30.8395294 L31.3829412,31.4777647 C32.0637256,31.7500786 32.5615491,32.0096273 32.8764118,32.2564118 C33.1912744,32.5031962 33.3487059,32.8308235 33.3487059,33.2392941 C33.3487059,33.7328626 33.1444706,34.1072941 32.736,34.3625882 C32.3275294,34.6178824 31.7914118,34.7455294 31.1276471,34.7455294 C29.5448235,34.7455294 28.2598433,33.9711374 27.2727059,32.4223529 L24.9495294,34.1583529 C25.9366668,36.0305097 27.4429021,37.1793332 29.4682353,37.6048235 L29.4682353,40.7704706 L32.4807059,40.7704706 L32.4807059,37.6558824 C33.7401567,37.4516471 34.7613332,36.9538235 35.5442353,36.1624118 C36.3271374,35.371 36.7185882,34.379608 36.7185882,33.1882353 Z" id="$" fill="#a1a6b3"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span>Tokens</span>
                            </div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/help'); ?>">
                            <div class="help">
                                <svg width="46px" height="55px" viewBox="0 0 46 55" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 45.1 (43504) - http://www.bohemiancoding.com/sketch -->
                                    <title>icHelp</title>
                                    <desc>Created with Sketch.</desc>
                                    <defs></defs>
                                    <g id="WebView-NeoLive"  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="9.Dashboard" transform="translate(-999.000000, -190.000000)">
                                            <g id="Group-2" transform="translate(330.000000, 158.000000)">
                                                <g id="icHelp" transform="translate(664.945601, 32.201352)">
                                                    <g id="Group" stroke-width="1" fill-rule="evenodd" transform="translate(3.857143, 0.000000)">
                                                        <rect  class="svgstroke" id="Rectangle-2-Copy" stroke="#a1a6b3" stroke-width="2" x="1.64285714" y="1" width="43" height="52.1207762" rx="4"></rect>
                                                        <text id="?" font-family="CeraGR-Medium" font-size="24" font-weight="500" line-spacing="20" fill="#a1a6b3">
                                                            <tspan x="18.2857143" y="27">?</tspan>
                                                        </text>
                                                    </g>
                                                    <path  class="svgstroke" d="M16.0714286,38.5714286 L37.9285714,38.5714286" id="Line" stroke="#a1a6b3" stroke-width="2" stroke-linecap="square"></path>
                                                    <path  class="svgstroke" d="M16.0714286,45 L37.9285714,45" id="Line-Copy" stroke="#a1a6b3" stroke-width="2" stroke-linecap="square"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span>Help</span>
                            </div>
                        </a>
                    </div>

                    <!-- web display -->
                    <div class="dashboard__bookacoach">
                        <div class="booking__tabs tabs">
                            <div class="c-dropdown__item current" data-tab="tab-1" data-dropdown-value="Name">NAME</div>
                            <div class="c-dropdown__item" data-tab="tab-2" data-dropdown-value="Date">DATE</div>
                            <div class="c-dropdown__item" data-tab="tab-3" data-dropdown-value="Country">COUNTRY</div>
                            <div class="c-dropdown__item" data-tab="tab-4" data-dropdown-value="Language">LANGUAGE</div>
                        </div>

                        <div id="tab-1" class="tab-content alt1 current">
                            <?php echo form_open('b2c/student/find_coaches/search/name', 'class="pure-form search-b-2 margin-auto border-2-primary border-rounded-5 width100perc"'); ?>
                            <div class="bookcoach__flexing">
                                <input type="text" name="name" placeholder=" Search Coach...">
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton ">Search Coach</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div id="tab-2" class="tab-content alt2 hide">
                            <?php echo form_open('b2c/student/find_coaches/book_by_single_date', 'id="date_value" role="form" class="pure-g pure-form"'); ?>
                            <div class="bookcoach__flexing">
                                <input type="text" name="date" id="datepicker" placeholder="Date.." class="dateavailable datepicker">
                                <style>
                                    #ui-datepicker-div {
                                        top: 0!important;
                                        left: -140px!important;
                                    }
                                </style>
                                <div class="datepicker__here"></div>
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton ">Search Coach</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div id="tab-3" class="tab-content alt3 hide">
                            <div class="bookcoach__flexing">
                                <div class="bycountry">
                                    <div class="c-dropdown js-dropdown">
                                        <?php echo form_open('b2c/student/find_coaches/search/country', 'class="pure-form search-b-2 margin-auto border-2-primary border-rounded-5 width100perc"'); ?>
                                        <input type="hidden" name="country" id="country" class="js-dropdown__input">
                                        <span class="c-button c-button--dropdown js-dropdown__current">Country..</span>
                                        <ul class="c-dropdown__list">
                                            <!-- <li class="c-dropdown__item" data-dropdown-value="Indonesia">Indonesia</li>
                                            <li class="c-dropdown__item" data-dropdown-value="India">India</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Prancis">Prancis</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Portugal">Portugal</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Jepang">Jepang</li> -->
                                            <?php foreach($countrylist as $cl){ ?>
                                            <li class="c-dropdown__item" data-dropdown-value="<?php echo $cl; ?>"><?php echo $cl; ?></li>
                                            <? } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton ">Search Coach</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>

                        <div id="tab-4" class="tab-content alt4 hide">
                            <div class="bookcoach__flexing">
                                <div class="bylanguage">
                                    <div class="c-dropdown js-dropdown">
                                        <?php echo form_open('b2c/student/find_coaches/search/spoken_language', 'class="pure-form search-b-2 margin-auto border-2-primary border-rounded-5 width100perc"'); ?>
                                        <input type="hidden" name="language" id="language" class="js-dropdown__input">
                                        <span class="c-button c-button--dropdown js-dropdown__current">Language..</span>
                                        <ul class="c-dropdown__list">
                                            <!-- <li class="c-dropdown__item" data-dropdown-value="Indonesia">Indonesia</li>
                                            <li class="c-dropdown__item" data-dropdown-value="India">India</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Prancis">Prancis</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Portugal">Portugal</li>
                                            <li class="c-dropdown__item" data-dropdown-value="Jepang">Jepang</li> -->
                                            <?php foreach($languagelist as $ll){ ?>
                                            <li class="c-dropdown__item" data-dropdown-value="<?php echo $ll; ?>"><?php echo $ll; ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton ">Search Coach</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- result -->
                    <div class="dashboard__resultbook">
                        <?php for($i=0;$i<count($coaches);$i++){ ?>
                        <div class="boxprofilecoach list">
                            <div class="profilecoach">
                                <div class="profilecoach__picture">
                                    <img src="<?php echo base_url().$coaches[$i]->profile_picture;?>" alt="">
                                </div>
                                <div class="profilecoach__name">
                                    <?php echo($coaches[$i]->fullname); ?>
                                </div>
                                <div class="profilecoach__rate">
                                    <section class='rating-widget'>

                                        <!-- Rating Stars Box -->
                                        <div class='rating-stars text-center'>
                                            <style type="text/css">

                                                .disabled {
                                                    pointer-events: none;
                                                    opacity: 0.6;
                                                }

                                            </style>
                                            <?php 
                                                $id = $coaches[$i]->id;

                                                $allrate = $this->db->select('rate')
                                                                ->from('coach_ratings')
                                                                ->where('coach_id', $id)
                                                                ->get()->result();

                                                $temp = array();
                                                foreach($allrate as $in)
                                                {
                                                    $temp[] = $in->rate;
                                                }

                                                $sumrate   = array_sum($temp);
                                                $countrate = count((array)$allrate);

                                                if($sumrate != null && $countrate != null){
                                                    $classrate = $sumrate / $countrate * 20;
                                                    $tooltip   = $sumrate / $countrate;
                                                }else{
                                                    $classrate = 0;
                                                    $tooltip   = 0;
                                                }
                                                
                                                $nostar = 5 - $tooltip;
                                                // echo "<pre>";
                                                // print_r($i);
                                                // exit();
                                            ?>
                                            <ul id='stars' class="disabled">
                                                <?php 
                                                if($tooltip != 0){
                                                    for($s=0;$s<$tooltip;$s++){
                                                ?>
                                                <li class='star hover selected'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <?php } for($t=0;$t<$nostar;$t++){ ?>
                                                    <li class='star'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                <?php } }else{ for($u=0;$u<5;$u++){?>
                                                <li class='star'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <?php } } ?>
                                            </ul>
                                        </div>

                                        <div class='success-box'>
                                            <div class='text-message'></div>
                                        </div>
                                    </section>

                                </div>

                                <div class="profilecoach__location">
                                    <i class="fa fa-map-marker"> </i><?php echo($coaches[$i]->country); ?>
                                </div>

                                <div class="profilecoach__token">
                                    <i class="fa fa-google-wallet"> </i> 
                                    <?php 
                                        if($coaches[$i]->coach_type_id == 1){
                                            echo $standard_coach_cost;
                                        } else if($coaches[$i]->coach_type_id == 2){
                                            echo $elite_coach_cost; 
                                        }
                                    ?> 
                                    Tokens
                                </div>
                            </div>

                            <div class="profilecoach__timebook">
                                <ul class="accordion_book">
                                    <li class="accordion-item">
                                        <div class="accordion-thumb available-at click">
                                            <span>Available At</span>
                                            <i class="fa fa-angle-down"></i>
                                        </div>

                                        <div class="accordion-panel">
                                            <div style="display:flex;flex-direction: column;margin:15px;">
                                                 <input type="text" class="datepicker__each" name="<?php echo($coaches[$i]->id);?>" placeholder="Date..">
                                                 <div class="datepickerEach__here" style="position: absolute;margin-left: 98px;margin-top:30px;"></div>

                                                 <button class="weekly_schedule btn-green btn-small" value="<?php echo(@$coaches[$i]->id); ?>">WEEKLY SCHEDULE</button>

                                                 <form class="pure-form">
                                                    <div class="list-schedule" style="color:#939393;height: 150px;margin-top:5px;">
                                                        <p class="txt text-cl-primary">Click in the box for calendar or on Weekly Schedule to see your coach’s availability</p>
                                                        <div id="result_<?php echo(@$coaches[$i]->id); ?>">
                                                            <img src='<?php echo base_url(); ?>assets/images/small-loading.gif' alt='loading...' style="display:none;" id="schedule-loading"/>
                                                        </div>
                                                    </div>
                                                </form>   
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                            </div>

                        </div>
                        <?php } ?>

                        <!-- dummy element to align left the content -->
                        <div class="boxprofilecoach flex-dummy"></div>
                        <div class="boxprofilecoach flex-dummy"></div>
                        <div class="boxprofilecoach flex-dummy"></div>
                        <div class="boxprofilecoach flex-dummy"></div>
                        <div class="boxprofilecoach flex-dummy"></div>
                        <div class="boxprofilecoach flex-dummy"></div>
                        <div class="boxprofilecoach flex-dummy"></div>
                        <div class="boxprofilecoach flex-dummy"></div>
                        <div class="boxprofilecoach flex-dummy"></div>
                        <div class="boxprofilecoach flex-dummy"></div>
                        <!-- dummy element to align left the content -->
                    </div>
                </div>
            </section>
        <script>
            $( function() {
                $("#datepicker").datepicker({ 
                    minDate: 0,
                    beforeShow:function(textbox, instance){
                        $('.datepicker__here').append($('#ui-datepicker-div'));
                        $('#ui-datepicker-div').hide();
                    } 
                });
            } );

            $('.datepicker__each').each(function() {
                $(this).datepicker({ 
                    minDate: 0,
                    beforeShow:function(textbox, instance){
                        $(this).next().append($('#ui-datepicker-div'));
                        $('#ui-datepicker-div').hide();
                    } 
                });
            });
        </script>

        <script type="text/javascript">
        $(function () {
            $(document).ready(function () {

                $('.list').each(function() {
                var $dropdown = $(this);

                    $(".click", $dropdown).click(function(e) {
                        e.preventDefault();

                        $schedule = $(".accordion-panel", $dropdown);
                        $span = $("span", $dropdown);
                        $icon = $("i", $dropdown);

                        if($($schedule).hasClass("show")) {
                            $($schedule).addClass('hide');
                            $($schedule).removeClass('show');
                            $($span).removeClass('active-schedule');
                            $($icon).addClass('icon-arrow-down');
                            $($icon).removeClass('icon-arrow-up');
                        }
                        else {
                            $($schedule).addClass('show');
                            $($schedule).removeClass('hide');
                            $($span).addClass('active-schedule');
                            $($icon).addClass('icon-arrow-up');
                            $($icon).removeClass('icon-arrow-down');
                        }

                        $(".view-schedule").not($schedule).addClass('hide');
                        $(".view-schedule").not($schedule).removeClass('show');
                        $("span").not($span).removeClass('active-schedule');
                        $("i").not($icon).removeClass('icon-arrow-up').addClass('icon-arrow-down');

                        return false;
                    });
                });

                var now = new Date();
                var day = ("0" + (now.getDate() + 1)).slice(-2);
                var month = ("0" + (now.getMonth() + 1)).slice(-2);
                var resultDate = now.getFullYear() + "-" + (month) + "-" + (day);

                $('.datepicker__each').datepicker({
                    startDate: resultDate,
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                });


            });

            // ajax
            // don't cache ajax or content won't be fresh
            $.ajaxSetup({
                cache: false
            });

            $(".datepicker__each").on('change', function () {
                var date = $(this).val();
                var newdate = date.split('/');
                var dateformat = newdate[2]+'-'+newdate[0]+'-'+newdate[1];
                //alert(this.name);
                var loadUrl = "<?php echo site_url('b2c/student/find_coaches/availability/country'); ?>" + "/" + this.name + "/" + dateformat;
                var m = $('[id^=result_]').html($('[id^=result_]').val());
                // alert(loadUrl);
                if (dateformat != '') {
                    $("#schedule-loading").show();
                    $(".txt").hide();
                    $("#result_" + this.name).load(loadUrl, function () {
                        for(i=0; i<m.length; i++){
                            $('#'+m[i].id).html($('#'+m[i].id).html().replace('/*',' '));
                            $('#'+m[i].id).html($('#'+m[i].id).html().replace('*/',' '));
                        }
                        $("#schedule-loading").hide();
                    });
                }

            });

            $(".weekly_schedule").click(function () {
                //alert(this.name);
                var loadUrl = "<?php echo site_url('b2c/student/find_coaches/schedule_detail'); ?>" + "/" + this.value;
                var m = $('[id^=result_]').html($('[id^=result_]').val());
                //alert(loadUrl);
                if (this.value != '') {
                    $("#schedule-loading").show();
                    $(".txt").hide();
                    $("#result_" + this.value).load(loadUrl, function () {
                        for(i=0; i<m.length; i++){
                            $('#'+m[i].id).html($('#'+m[i].id).html().replace('/*',' '));
                            $('#'+m[i].id).html($('#'+m[i].id).html().replace('*/',' '));
                        }
                        $("#schedule-loading").hide();
                    });
                }

            });
        })
    </script>

        <script type="text/javascript">
            // $(function () {
            // var now = new Date();
            // var day = ("0" + (now.getDate() + 1)).slice(-2);
            // var month = ("0" + (now.getMonth() + 1)).slice(-2);
            // var resultDate = now.getFullYear() + "-" + (month) + "-" + (day);
            // $('.datepicker').datepicker({
            // startDate: resultDate,
            // format: 'yyyy-mm-dd',
            // autoclose: true,
            // });
            //     $('.dateavailable').change(function(){
            //         $('.dateavailable').parsley().reset();
            //     });
            // });
    
        document.getElementById("datepicker").onchange = function() {
            // console.log(this.value);
            var date = this.value;
            var newdate = date.split('/');
            var dateformat = newdate[2]+'-'+newdate[0]+'-'+newdate[1];
            // console.log(dateformat);
            var newurl = "<?php echo site_url('b2c/student/find_coaches/book_by_single_date'); ?>"+"/"+dateformat;
            $('#date_value').attr('action', newurl);
        };

        </script>