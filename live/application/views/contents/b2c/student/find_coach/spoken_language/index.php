                <style>
                        .pagination-items{
                            width: 100%;
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -ms-flex-wrap: wrap;
                            flex-wrap: wrap;
                            justify-content: space-around;
                        }

                        i svg {
                            transform:translate(0,6px);
                            margin-right: 5px;
                        }

                </style>
                <?php if(count($datasession)!=0){ ?>
                    <div class="dashboard__notif success__notif">
                        <?php if(count($datasession)==1){ ?>
                        <span>You Have <?php echo count($datasession); ?> Session Left For Today</span>
                        <?php }else{ ?>
                        <span>You Have <?php echo count($datasession); ?> Sessions Left For Today</span>
                        <?php } ?>
                        <i class="fa fa-times"></i>
                    </div>
                <?php } ?>

                <div class="dashboard">
                <div class="dashboard__menubookingcoachresult">
                        <a href="<?php echo site_url('b2c/student/find_coaches/single_date'); ?>">
                            <div class="bookkacoach activediv trn" data-trn-key="bookcoach">Book a Coach</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/session'); ?>">
                            <div class="session trn" data-trn-key="session">Session</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/token'); ?>">
                            <div class="token trn" data-trn-key="tokens">Token</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/help'); ?>">
                            <div class="help trn" data-trn-key="help">Help</div>
                        </a>
                    </div>

                    <!-- web display -->
                    <div class="dashboard__bookacoach">
                    <div class="booking__tabs tabs">
                            <div class="c-dropdown__item current trn" data-tab="tab-1" data-dropdown-value="Name"  data-trn-key="name1">NAME</div>
                            <div class="c-dropdown__item trn" data-tab="tab-2" data-dropdown-value="Date"  data-trn-key="date1">DATE</div>
                            <div class="c-dropdown__item trn" data-tab="tab-3" data-dropdown-value="Country"  data-trn-key="country1">COUNTRY</div>
                            <div class="c-dropdown__item trn" data-tab="tab-4" data-dropdown-value="Language"  data-trn-key="language1">LANGUAGE</div>
                        </div>

                        <div id="tab-1" class="tab-content alt1 current">
                            <?php echo form_open('b2c/student/find_coaches/search/name', 'class="pure-form search-b-2 margin-auto border-2-primary border-rounded-5 width100perc"'); ?>
                            <div class="bookcoach__flexing">
                                <input type="text" name="name" class="trn" placeholder=" Search Coach..." data-trn-holder="searchcoach">
                                <div class="btnsearch">
                                    <button type="submit" class="neobutton trn" data-trn-key="searchcoach1">Search Coach</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div id="tab-2" class="tab-content alt2 hide">
                            <?php echo form_open('b2c/student/find_coaches/book_by_single_date', 'id="date_value" role="form" class="pure-g pure-form"'); ?>
                            <div class="recurring__book">
                                <div class="bycountry" style="padding: 0 15px;">
                                    <div class='border-2-primary border-rounded-5'>
                                        <span class='custom-dropdown'>
                                            <select class="select--recurring" name="selector" id="selector" style="width:100%;">
                                                <option class="trn" disabled selected data-trn-key="typebook">Booking Type</option>
                                                <option class="trn" value="single-book" data-trn-key="singlebook">Single Book</option>
                                                <option class="trn" value="multiple-book" data-trn-key="multiplebook">Recurring Book</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                                <div class="bycountry" id="multi-book2" style="padding: 10px 15px 0;">
                                    <div class='border-2-primary border-rounded-5'>
                                        <span class='custom-dropdown'>
                                            <select class="select--recurring" name="type_booking" style="width:100%;">
                                                <option value="2" selected>2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="bookcoach__flexing">
                                <input type="text" name="date" id="datepicker" autocomplete="off" placeholder="Date.." class="dateavailable datepicker trn" data-trn-holder="searchdate">
                                <style>
                                    .datepicker__here #ui-datepicker-div {
                                        top: 0!important;
                                        left: -140px!important;
                                    }
                                    .datepickerEach__here #ui-datepicker-div {
                                        top: 0!important;
                                        left: -140px!important;
                                    }
                                    @media only screen and (device-width:768px) and (device-height:1024px) and (-webkit-min-device-pixel-ratio:1) {
                                        .datepickerEach__here #ui-datepicker-div {
                                            left: -117px!important;
                                        }
                                    }
                                    @media only screen and (max-device-width:414px) {
                                        .datepickerEach__here #ui-datepicker-div {
                                            left: -50px!important;
                                        }
                                    }
                                    @media only screen and (max-device-width:375px) {
                                        .datepickerEach__here #ui-datepicker-div {
                                            left: -76px!important;
                                        }
                                    }
                                    @media only screen and (max-device-width:360px) {
                                        .datepickerEach__here #ui-datepicker-div {
                                            left: -83px!important;
                                        }
                                    }
                                    @media only screen and (max-device-width:320px) {
                                        .datepickerEach__here #ui-datepicker-div {
                                            left: -102px!important;
                                        }
                                    }
                                </style>
                                <div class="datepicker__here"></div>
                                <div class="btnsearch">
                                <button type="submit" class="neobutton trn" data-trn-key="searchcoach1">Search Coach</button>
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
                                        <span class="c-button c-button--dropdown js-dropdown__current trn" data-trn-key="searchcountry">Country..</span>
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
                                    <button type="submit" class="neobutton trn" data-trn-key="searchcoach1">Search Coach</button>
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
                                        <span class="c-button c-button--dropdown js-dropdown__current trn" data-trn-key="searchlanguage">Language..</span>
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
                                <button type="submit" class="neobutton trn" data-trn-key="searchcoach1">Search Coach</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- result -->
                    <div class="dashboard__resultbook">
                        <?php if(!$coaches){ ?>
                            <span class="trn" data-trn-key="nocoaches">No coaches matched your criteria</span>
                        <?php }else{ ?>
                        <?php for($i=0;$i<count($coaches);$i++){
                                $partner_id = $this->auth_manager->partner_id($coaches[$i]->id);
                                $region_id = $this->auth_manager->region_id($partner_id);

                                // check status setting region
                                $setting_region = $this->db->select('status_set_setting')->from('specific_settings')->where('user_id',$region_id)->get()->result();

                                // $setting = $this->db->select('standard_coach_cost,elite_coach_cost, session_duration')->from('global_settings')->where('type','partner')->get()->result();

                                // jika 0 / disallow
                                if($setting_region[0]->status_set_setting == 0){
                                    $setting = $this->db->select('standard_coach_cost,elite_coach_cost, session_duration')->from('global_settings')->where('type','partner')->get()->result();
                                    $standard_coach_cost = @$setting[0]->standard_coach_cost;
                                    $elite_coach_cost = @$setting[0]->elite_coach_cost;
                                } else {
                                    $setting = $this->db->select('standard_coach_cost,elite_coach_cost, session_duration')->from('specific_settings')->where('partner_id',$partner_id)->get()->result();
                                    $standard_coach_cost = @$setting[0]->standard_coach_cost;
                                    $elite_coach_cost = @$setting[0]->elite_coach_cost;
                                }
                                // $setting = $this->db->select('standard_coach_cost,elite_coach_cost, session_duration')->from('specific_settings')->where('partner_id',$partner_id)->get()->result();
                                // $region_setting = $this->db->select('standard_coach_cost,elite_coach_cost, session_duration')->from('specific_settings')->where('user_id',$region_id)->get()->result();
                                // $global_setting = $this->db->select('standard_coach_cost,elite_coach_cost, session_duration')->from('global_settings')->where('type','partner')->get()->result();
                                //
                                // $standard_coach_cost = @$setting[0]->standard_coach_cost;
                                // if(!$standard_coach_cost || $standard_coach_cost == 0){
                                //     $standard_coach_cost_region = @$region_setting[0]->standard_coach_cost;
                                //     $standard_coach_cost = $standard_coach_cost_region;
                                //     if(!$standard_coach_cost_region || $standard_coach_cost_region == 0){
                                //         $standard_coach_cost_global = @$global_setting[0]->standard_coach_cost;
                                //         $standard_coach_cost = $standard_coach_cost_global;
                                //     }
                                // }
                                //
                                // $elite_coach_cost = @$setting[0]->elite_coach_cost;
                                // if(!$elite_coach_cost || $elite_coach_cost == 0){
                                //     $elite_coach_cost_region = @$region_setting[0]->elite_coach_cost;
                                //     $elite_coach_cost = $elite_coach_cost_region;
                                //     if(!$elite_coach_cost_region || $elite_coach_cost_region == 0){
                                //         $elite_coach_cost_global = @$global_setting[0]->elite_coach_cost;
                                //         $elite_coach_cost = $elite_coach_cost_global;
                                //     }
                                // }

                                $session_duration = @$setting[0]->session_duration;
                                if(!$session_duration || $session_duration == 0){
                                    $session_duration_region = @$region_setting[0]->session_duration;
                                    $session_duration = $session_duration_region;
                                    if(!$session_duration_region || $session_duration_region == 0){
                                        $session_duration_global = @$global_setting[0]->session_duration;
                                        $session_duration = $session_duration_global;
                                    }
                                }
                        ?>
                        <div class="boxprofilecoach list article-loop">
                            <div class="profilecoach">
                                <div class="profilecoach__picture">
                                  <?php
                                    $check_url = base_url();
                                    // $check_url = 'https://54.254.255.216/liveb2itest';
                                    if (strpos($check_url, 'liveb2ctest') !== false) {
                                  ?>
                                    <img src="<?php echo "https://52.77.200.151/liveb2itest/".$coaches[$i]->profile_picture;?>" alt="">
                                  <?php }else{ ?>
                                    <img src="<?php echo "https://live.dyned.com/".$coaches[$i]->profile_picture;?>" alt="">
                                  <?php } ?>
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

                                                $nostar = 5 - round($tooltip);
                                                // echo "<pre>";
                                                // print_r($i);
                                                // exit();
                                            ?>
                                            <ul id='stars' class="disabled">
                                                <?php
                                                if($tooltip != 0){
                                                    for($s=0;$s<round($tooltip);$s++){
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
                                     <i>
                                        <svg width="22px" height="22px" viewBox="0 0 63 63" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <!-- Generator: Sketch 45.1 (43504) - http://www.bohemiancoding.com/sketch -->
                                            <title>Token</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs></defs>
                                            <g id="WebView-NeoLive" stroke="none" class="down" stroke-width="3" fill="none" fill-rule="evenodd">
                                                <g id="9.Dashboard"  transform="translate(-788.000000, -188.000000)">
                                                    <g id="Group-2" transform="translate(330.000000, 158.000000)">
                                                        <g id="Token" transform="translate(458.604839, 30.144000)">
                                                            <g id="Group">
                                                                <circle id="Oval-2-Copy-2" stroke="#FFFFFF" stroke-width="3" cx="31" cy="31" r="30"></circle>
                                                                <circle id="Oval-2" stroke="#808080" stroke-width="3" cx="31" cy="31" r="30"></circle>
                                                                <circle id="Oval-2-Copy" stroke="#808080" cx="31" cy="31" r="21.3823529"></circle>
                                                                <path d="M36.7185882,33.1882353 C36.7185882,31.1458824 35.4250979,29.6481567 32.8381176,28.6950588 L30.9234118,28.0312941 C30.344745,27.7930197 29.915,27.559 29.6341765,27.3292353 C29.3533529,27.0994706 29.2129412,26.7973727 29.2129412,26.4229412 C29.2129412,25.9804315 29.387392,25.6528038 29.7362941,25.4400588 C30.0851962,25.2273139 30.5234509,25.1209412 31.0510588,25.1209412 C32.2254118,25.1209412 33.2040391,25.699608 33.9869412,26.8569412 L36.2845882,25.1209412 C35.4165882,23.5040786 34.1486273,22.5339609 32.4807059,22.2105882 L32.4807059,19.1725882 L29.4682353,19.1725882 L29.4682353,22.2616471 C28.3789803,22.5169412 27.5024706,23.0105097 26.8387059,23.7423529 C26.1749412,24.4741962 25.8430588,25.3592156 25.8430588,26.3974118 C25.8430588,28.422745 27.1110197,29.9034509 29.6469412,30.8395294 L31.3829412,31.4777647 C32.0637256,31.7500786 32.5615491,32.0096273 32.8764118,32.2564118 C33.1912744,32.5031962 33.3487059,32.8308235 33.3487059,33.2392941 C33.3487059,33.7328626 33.1444706,34.1072941 32.736,34.3625882 C32.3275294,34.6178824 31.7914118,34.7455294 31.1276471,34.7455294 C29.5448235,34.7455294 28.2598433,33.9711374 27.2727059,32.4223529 L24.9495294,34.1583529 C25.9366668,36.0305097 27.4429021,37.1793332 29.4682353,37.6048235 L29.4682353,40.7704706 L32.4807059,40.7704706 L32.4807059,37.6558824 C33.7401567,37.4516471 34.7613332,36.9538235 35.5442353,36.1624118 C36.3271374,35.371 36.7185882,34.379608 36.7185882,33.1882353 Z" id="$" fill="#808080"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </i>
                                    <?php
                                        if($coaches[$i]->coach_type_id == 1){
                                            echo $standard_coach_cost;
                                        } else if($coaches[$i]->coach_type_id == 2){
                                            echo $elite_coach_cost;
                                        }
                                    ?>
                                    <span class="trn" data-trn-key="tokens">Tokens</span>
                                </div>
                            </div>

                            <div class="profilecoach__timebook">
                                <ul class="accordion_book">
                                    <li class="accordion-item">
                                        <div class="accordion-thumb available-at click">
                                            <span class="trn" data-trn-key="availableat">Available At</span>
                                            <i class="fa fa-angle-down"></i>
                                        </div>

                                        <div class="accordion-panel">
                                            <div style="display:flex;flex-direction: column;margin:15px;">
                                                 <input type="text" class="datepicker__each trn" name="<?php echo($coaches[$i]->id);?>" placeholder="Date.." data-trn-holder="searchdate" readonly>
                                                 <div class="datepickerEach__here" style="position: absolute;margin-left: 98px;margin-top:30px;"></div>

                                                 <button class="weekly_schedule btn-green btn-small trn" value="<?php echo(@$coaches[$i]->id); ?>" data-trn-key="weeklysc">WEEKLY SCHEDULE</button>

                                                 <form class="pure-form">
                                                    <div class="list-schedule" style="color:#939393;height: 150px;margin-top:5px;">
                                                        <p class="txt text-cl-primary trn" data-trn-key="clickinthe">Click in the box for calendar or on Weekly Schedule to see your coach’s availability</p>
                                                        <div class="schedule-loading" style="display:none;">
                                                            <div class="loader" id="loader">
                                                                <span></span>
                                                                <span></span>
                                                                <span></span>
                                                            </div>
                                                        </div>
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
                        <?php } } ?>

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
            $(function(){
                $('#multi-book2').hide(); 
                $('#selector').change(function(){
                    if($('#selector').val() == 'multiple-book') {
                        $('#multi-book2').show(); 
                    } else {
                        $('#multi-book2').hide(); 
                    } 
                });
            });
        </script>
            <script>
                $("#datepicker").each(function() {
                    $(this).datepicker({
                        minDate: 1,
                        beforeShow:function(textbox, instance){
                            $('.datepicker__here').append($('#ui-datepicker-div'));
                            $('#ui-datepicker-div').hide();
                        }
                    });
                })

                $('.datepicker__each').each(function() {
                    $(this).datepicker({
                        minDate: 1,
                        beforeShow:function(textbox, instance){
                            $(this).next().append($('#ui-datepicker-div'));
                            $('#ui-datepicker-div').hide();
                        }
                    });
                });

                //DROPDOWN COUNTRY AND LANGUAGES BOOKING A COACH
                (function($, window, document, undefined) {

                    'use strict';

                    var $html = $('html');

                    $html.on('click.ui.dropdown', '.js-dropdown', function(e) {
                        e.preventDefault();
                        $(this).toggleClass('is-open');
                    });

                    $html.on('click.ui.dropdown', '.js-dropdown [data-dropdown-value]', function(e) {
                        e.preventDefault();
                        var $item = $(this);
                        var $dropdown = $item.parents('.js-dropdown');
                        $dropdown.find('.js-dropdown__input').val($item.data('dropdown-value'));
                        $dropdown.find('.js-dropdown__current').text($item.text());
                    });

                    $html.on('click.ui.dropdown', function(e) {
                        var $target = $(e.target);
                        if (!$target.parents().hasClass('js-dropdown')) {
                            $('.js-dropdown').removeClass('is-open');
                        }
                    });

                })(jQuery, window, document);
            </script>

            <script type="text/javascript">
                $('.datepicker__each').click(function() {
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

                $(".datepicker__each").each(function() {
                    $(this).on('change', function () {
                        var date = $(this).val();
                        var newdate = date.split('/');
                        var dateformat = newdate[2]+'-'+newdate[0]+'-'+newdate[1];
                        //alert(this.name);
                        var loadUrl = "<?php echo site_url('b2c/student/find_coaches/availability/spoken_language'); ?>" + "/" + this.name + "/" + dateformat;
                        var m = $('[id^=result_]').html($('[id^=result_]').val());
                        // alert(loadUrl);
                        if (dateformat != '') {
                            $(".schedule-loading").show();
                            $(".txt").hide();
                            $("#result_" + this.name).load(loadUrl, function () {
                                for(i=0; i<m.length; i++){
                                    $('#'+m[i].id).html($('#'+m[i].id).html().replace('/*',' '));
                                    $('#'+m[i].id).html($('#'+m[i].id).html().replace('*/',' '));
                                }
                                $(".schedule-loading").hide();
                                ChangeLanguages();
                            });
                        }

                    });
                })

                $(".weekly_schedule").each(function() {
                    $(this).click(function () {
                        //alert(this.name);
                        var loadUrl = "<?php echo site_url('b2c/student/find_coaches/schedule_detail'); ?>" + "/" + this.value;
                        var m = $('[id^=result_]').html($('[id^=result_]').val());
                        //alert(loadUrl);
                        if (this.value != '') {
                            $(".schedule-loading").show();
                            $(".txt").hide();
                            $("#result_" + this.value).load(loadUrl, function () {
                                for(i=0; i<m.length; i++){
                                    $('#'+m[i].id).html($('#'+m[i].id).html().replace('/*',' '));
                                    $('#'+m[i].id).html($('#'+m[i].id).html().replace('*/',' '));
                                }
                                $(".schedule-loading").hide();
                            });
                        }

                    });
                });
        </script>

        <script>
            $('.accordion-thumb').click(function() {
                $(this).next(".accordion-panel").slideToggle();
            });
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

        <script>
            $('.article-loop').paginate(6);
        </script>
