                <style>
                        .pagination-items{
                            width: 100%;
                            display: -webkit-box;
                            display: -ms-flexbox;
                            display: flex;
                            -ms-flex-wrap: wrap;
                            flex-wrap: wrap;
                            
                        }

                        .dashboard__resultbook .boxprofilecoach {
                            margin: 20px 33px 20px 20px !important;
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
                            <div class="bookkacoach activediv">Book a Coach</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/session'); ?>">
                            <div class="session ">Session</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/token'); ?>">
                            <div class="token">Token</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/help'); ?>">
                            <div class="help">Help</div>
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
                       
                        <?php foreach ($data as $d) { ?>
                        <div class="boxprofilecoach article-loop">
                            <div class="profilecoach">
                                <div class="profilecoach__picture">
                                    <img src="<?php echo base_url().$d['profile_picture'];?>" alt="">
                                </div>
                                <div class="profilecoach__name">
                                    <?php echo($d['fullname']); ?>
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
                                                $id = $d['coach_id'];

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
                                    <i class="fa fa-map-marker"> </i><?php echo($d['country']); ?>
                                </div>

                                <div class="profilecoach__token">
                                    <i class="fa fa-google-wallet"> </i> 
                                    <?php 
                                        if($d['coach_type_id'] == 1){
                                            echo $standard_coach_cost;
                                        } else if($d['coach_type_id'] == 2){
                                            echo $elite_coach_cost; 
                                        }
                                    ?> 
                                    Tokens
                                </div>
                            </div>

                            <div class="profilecoach__timebook">
                                    <ul class="accordion_book">
                                        <li class="accordion-item">
                                            <div class="accordion-thumb available-at">
                                                <span>Available At</span>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                            <div class="accordion-panel">
                                            <?php foreach ($d['availability'] as $av) { ?>
                                                <div class="booking">
                                                    <?php
                                                    $get_endtime = date('H:i:s',strtotime(@$av['end_time']));

                                                        // $date = date("Y-m-d H:i:s");
                                                        $time = strtotime($get_endtime);
                                                        $time = $time - (5 * 60);
                                                        $endtime = date("H:i", $time);

                                                        // xxxxxxxxxxxx
                                                        $CheckInX = explode("-", $date);
                                                        $CheckOutX =  explode("-", date('Y-m-d'));
                                                        $date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
                                                        $date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
                                                        $interval =($date2 - $date1)/(3600*24);
                                                            
                                                        // xxxxxxxxxxxx
                                                        $new_gmt_val_user = $gmt_val_user*1;
                                                        @date_default_timezone_set('Etc/GMT'.$gmt_val_user*(-1));      
                                                        $adate = $date;
                                                        $bdate = date('Y-m-d');
                                                         // echo $adate." + ".$bdate;
                                                        // exit();
                                                        $res = (int)$gmt_val_user;
                                                        if($adate < $bdate){

                                                            @date_default_timezone_set('Etc/GMT+0');
                                                            $dt = date('H:i:s');
                                                            $default_dt  = strtotime($dt);
                                                            $usertime = $default_dt+(60*$gmt_user);
                                                            $hour = date("H:i:s", $usertime);

                                                            $selesai=date('H:i:s',strtotime(@$av['start_time']));
                                                            $mulai=$hour;
                                                            list($jam,$menit,$detik)=explode(':',$mulai);
                                                            $buatWaktuMulai=mktime($jam,$menit,$detik,1,1,1);

                                                            list($jam,$menit,$detik)=explode(':',$selesai);
                                                            $buatWaktuSelesai=mktime($jam,$menit,$detik,1,1,1);
                                                            $selisihDetik=$buatWaktuSelesai-$buatWaktuMulai;
                                                                    
                                                                    if($selisihDetik > 3599){ ?>
                                                                                <i><?php echo(date('H:i',strtotime(@$av['start_time'])));?> - <?php echo $endtime; ?></i>
                                                                                <a href="<?php echo site_url('b2c/student/find_coaches/summary_book/single_date/' . $d['coach_id'] . '/' . strtotime(@$adate) . '/' . $av['start_time'] . '/' . $av['end_time']); ?>">Book Now</a>
                                                                                <?php }

                                                            }else if (($adate == $bdate) && ($res > 0 )){  
                                                                @date_default_timezone_set('Etc/GMT+0');
                                                                    $dt = date('H:i:s');
                                                                    $default_dt  = strtotime($dt);
                                                                    $usertime = $default_dt+(60*$gmt_user);
                                                                    $hour = date("H:i:s", $usertime);

                                                                    $selesai=date('H:i:s',strtotime(@$av['start_time']));
                                                                    $mulai=$hour;
                                                                    list($jam,$menit,$detik)=explode(':',$mulai);
                                                                    $buatWaktuMulai=mktime($jam,$menit,$detik,1,1,1);

                                                                    list($jam,$menit,$detik)=explode(':',$selesai);
                                                                    $buatWaktuSelesai=mktime($jam,$menit,$detik,1,1,1);
                                                                    $selisihDetik=$buatWaktuSelesai-$buatWaktuMulai;
                                                                    
                                                                            if($selisihDetik > 3599){

                                                                                ?>
                                                                                <i><?php echo(date('H:i',strtotime(@$av['start_time'])));?> - <?php echo $endtime; ?></i>
                                                                                <a href="<?php echo site_url('b2c/student/find_coaches/summary_book/single_date/' . $d['coach_id'] . '/' . strtotime(@$adate) . '/' . $av['start_time'] . '/' . $av['end_time']); ?>">Book Now</a>
                                                                                <?php }

                                                            }else if (($adate == $bdate) && ($res < 0 )){  
                                                                @date_default_timezone_set('Etc/GMT+0');
                                                                    $dt = date('H:i:s');
                                                                    $default_dt  = strtotime($dt);
                                                                    $usertime = $default_dt+(60*$gmt_user);
                                                                    $hour = date("H:i:s", $usertime);

                                                                    $selesai=date('H:i:s',strtotime(@$av['start_time']));
                                                                    $mulai=$hour;
                                                                    list($jam,$menit,$detik)=explode(':',$mulai);
                                                                    $buatWaktuMulai=mktime($jam,$menit,$detik,1,1,1);

                                                                    list($jam,$menit,$detik)=explode(':',$selesai);
                                                                    $buatWaktuSelesai=mktime($jam,$menit,$detik,1,1,1);
                                                                    $selisihDetik=$buatWaktuSelesai-$buatWaktuMulai;
                                                                    
                                                                            if($selisihDetik > 3599){

                                                                                ?>
                                                                                <i><?php echo(date('H:i',strtotime(@$av['start_time'])));?> - <?php echo $endtime; ?></i>
                                                                                <a href="<?php echo site_url('b2c/student/find_coaches/summary_book/single_date/' . $d['coach_id'] . '/' . strtotime(@$adate) . '/' . $av['start_time'] . '/' . $av['end_time']); ?>">Book Now</a>
                                                                                <?php }
                                                            }else {  
                                                            @date_default_timezone_set('Etc/GMT+0');
                                                                    ?>
                                                                    <i><?php echo(date('H:i',strtotime(@$av['start_time'])));?> - <?php echo $endtime; ?></i>
                                                                    <a href="<?php echo site_url('b2c/student/find_coaches/summary_book/single_date/' . $d['coach_id'] . '/' . strtotime(@$adate) . '/' . $av['start_time'] . '/' . $av['end_time']); ?>">Book Now</a>
                                                        <?php } ?>
                                                </div>
                                            <?php } ?>
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
            });
        </script>

        <script type="text/javascript">

            // $(".available-at").click(function () {
            //     //alert(this.name);
            //     var avail = $(".available").val();
            //     var loadUrl = "<?php echo site_url('b2c/student/find_coaches/schedule_detail'); ?>" + "/" + avail;
            //     var m = $('[id^=result_]').html($('[id^=result_]').val());
            //     console.log(m);
            //     //alert(loadUrl);
            //     if (this.value != '') {
            //         $("#schedule-loading").show();
            //         $(".txt").hide();
            //         $("#result_" + avail).load(loadUrl, function () {
            //             for(i=0; i<m.length; i++){
            //                 $('#'+m[i].id).html($('#'+m[i].id).html().replace('/*',' '));
            //                 $('#'+m[i].id).html($('#'+m[i].id).html().replace('*/',' '));
            //             }
            //             $("#schedule-loading").hide();
            //         });
            //     }

            // });

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