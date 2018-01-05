<style type="text/css">
    .refbtn{

    }
    .refbtn:hover{
        cursor: pointer;
        text-decoration: underline;
    }
</style>

    <?php if(count($data)!=0){ ?>
        <div class="dashboard__notif success__notif">
            <?php if(count($data)==1){ ?>
            <span>You Have <?php echo count($data); ?> Session For Today</span>
            <?php }else{ ?>
            <span>You Have <?php echo count($data); ?> Sessions For Today</span>
            <?php } ?>
            <i class="fa fa-times"></i>
        </div>
    <?php } ?>
    <div class="dashboard">
        <div class="dashboard__menu">
            <a href="<?php echo site_url('b2c/student/find_coaches/single_date'); ?>">
                <div class="booking">
                    <svg width="54px" height="65px" viewBox="0 0 54 65" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 45.1 (43504) - http://www.bohemiancoding.com/sketch -->
                        <title>icBookCoach</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="WebView-NeoLive" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                            <g id="9.Dashboard" transform="translate(-391.000000, -187.000000)" stroke="#49C5FE">
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
                    <i><?php echo count($data)?></i>
                    <svg width="54px" height="63px" viewBox="0 0 54 63" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 45.1 (43504) - http://www.bohemiancoding.com/sketch -->
                        <title>ic_Sessions</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="WebView-NeoLive" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="9.Dashboard" transform="translate(-594.000000, -188.000000)" stroke="#49C5FE" stroke-width="2">
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
                            <g id="9.Dashboard" transform="translate(-788.000000, -188.000000)">
                                <g id="Group-2" transform="translate(330.000000, 158.000000)">
                                    <g id="Token" transform="translate(458.604839, 30.144000)">
                                        <g id="Group">
                                            <circle id="Oval-2-Copy-2" stroke="#FFFFFF" stroke-width="2" cx="31" cy="31" r="30"></circle>
                                            <circle id="Oval-2" stroke="#49C5FE" stroke-width="2" cx="31" cy="31" r="30"></circle>
                                            <circle id="Oval-2-Copy" stroke="#49C5FE" cx="31" cy="31" r="21.3823529"></circle>
                                            <path d="M36.7185882,33.1882353 C36.7185882,31.1458824 35.4250979,29.6481567 32.8381176,28.6950588 L30.9234118,28.0312941 C30.344745,27.7930197 29.915,27.559 29.6341765,27.3292353 C29.3533529,27.0994706 29.2129412,26.7973727 29.2129412,26.4229412 C29.2129412,25.9804315 29.387392,25.6528038 29.7362941,25.4400588 C30.0851962,25.2273139 30.5234509,25.1209412 31.0510588,25.1209412 C32.2254118,25.1209412 33.2040391,25.699608 33.9869412,26.8569412 L36.2845882,25.1209412 C35.4165882,23.5040786 34.1486273,22.5339609 32.4807059,22.2105882 L32.4807059,19.1725882 L29.4682353,19.1725882 L29.4682353,22.2616471 C28.3789803,22.5169412 27.5024706,23.0105097 26.8387059,23.7423529 C26.1749412,24.4741962 25.8430588,25.3592156 25.8430588,26.3974118 C25.8430588,28.422745 27.1110197,29.9034509 29.6469412,30.8395294 L31.3829412,31.4777647 C32.0637256,31.7500786 32.5615491,32.0096273 32.8764118,32.2564118 C33.1912744,32.5031962 33.3487059,32.8308235 33.3487059,33.2392941 C33.3487059,33.7328626 33.1444706,34.1072941 32.736,34.3625882 C32.3275294,34.6178824 31.7914118,34.7455294 31.1276471,34.7455294 C29.5448235,34.7455294 28.2598433,33.9711374 27.2727059,32.4223529 L24.9495294,34.1583529 C25.9366668,36.0305097 27.4429021,37.1793332 29.4682353,37.6048235 L29.4682353,40.7704706 L32.4807059,40.7704706 L32.4807059,37.6558824 C33.7401567,37.4516471 34.7613332,36.9538235 35.5442353,36.1624118 C36.3271374,35.371 36.7185882,34.379608 36.7185882,33.1882353 Z" id="$" fill="#49C5FE"></path>
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
                        <g id="WebView-NeoLive" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="9.Dashboard" transform="translate(-999.000000, -190.000000)">
                                <g id="Group-2" transform="translate(330.000000, 158.000000)">
                                    <g id="icHelp" transform="translate(664.945601, 32.201352)">
                                        <g id="Group" stroke-width="1" fill-rule="evenodd" transform="translate(3.857143, 0.000000)">
                                            <rect id="Rectangle-2-Copy" stroke="#49C5FE" stroke-width="2" x="1.64285714" y="1" width="43" height="52.1207762" rx="4"></rect>
                                            <text id="?" font-family="CeraGR-Medium" font-size="24" font-weight="500" line-spacing="20" fill="#49C5FE">
                                                <tspan x="18.2857143" y="27">?</tspan>
                                            </text>
                                        </g>
                                        <path d="M16.0714286,38.5714286 L37.9285714,38.5714286" id="Line" stroke="#49C5FE" stroke-width="2" stroke-linecap="square"></path>
                                        <path d="M16.0714286,45 L37.9285714,45" id="Line-Copy" stroke="#49C5FE" stroke-width="2" stroke-linecap="square"></path>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span>Help</span>
                </div>
            </a>
        </div>

        <div class="dashboard__menutab">
            <div class="tabsessions">
                <ul class="tabs">
                    <li class="tab-link current" data-tab="tab-1">Today Session</li>
                    <li class="tab-link" data-tab="tab-2">Upcoming Session</li>
                </ul>
            </div>
            <div class="boxsessions">
                <?php if($wm != NULL && strtotime($countdown) <= strtotime($nowc) && $nowh <= $hourend && $nowh >= $hourstart){ ?>
                    <?php if(@$statuscheck == 0){ ?>
                                <div class="boxsessions__today tab-content current" id="tab-1">
                                    <div class="todaysessions">
                                        <span class="date">You Have a Live Session</span>
                                            <div class="boxinfo activesession">
                                                <div class="playsession">
                                                    <form name ="livesession" action="<?php echo $url_session;?>" method="post">
                                                        <input type="hidden" name="appoint_id" value="<?php echo $wm_id ?>">
                                                            <button type="submit" class="fa fa-play"></button>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        <?php }else if(@$statuscheck == 1){ ?>
                                <div class="boxsessions__today tab-content current" id="tab-1">
                                    <div class="todaysessions">
                                        <span class="date">You Have Opened Live Session</span>
                                        <span id="clearlive" class="date refbtn">Not Yet Open? Click Here</span>
                                    </div>
                                </div>
                    <?php } ?>

                <?php }else if($wm == NULL){ ?>
                    <div class="boxsessions__today tab-content current" id="tab-1">
                        <div class="todaysessions">
                            <span class="date">You Have No Sessions Today</span>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="boxsessions__today tab-content current" id="tab-1">
                    <?php $checkdt=1; foreach($data as $d){ ?>
                    <div class="todaysessions">
                        <span class="date"><?php echo date('D, j F  Y', strtotime($d->date)); ?></span>
                        <span class="time">
                        <?php if($checkdt==1){ ?>
                        <div id="clockdiv" class="datetime">
                            <span class="hours"></span>
                            <font>:</font>
                            <span class="minutes"></span>
                            <font>:</font>
                            <span class="seconds"></span>
                            <span>-</span>
                            <span class="smalltext">Until Next Session</span>
                        </div>
                        <?php } ?>
                        </span>
                        <div id="todaysess" class="boxinfo">
                            <div class="playsession" id="nosess">
                                <i class="fa fa-play"></i>
                            </div>
                            <div class="playsession hide" id="sess">
                                <form name ="livesession" action="<?php echo $url_session;?>" method="post">
                                    <input type="hidden" name="appoint_id2" id="get_id_ajax" value="">
                                    <button type="submit" class="fa fa-play"></button>
                                </form>
                            </div>
                            <div class="coachinfo trigger viewcoach" idcoach="<?php echo $d->coach_id;?>">
                                Coach Info
                            </div>
                            <!-- MODAL -->
                            <div class="modal-wrapper">
                                <div class="modal">
                                    <a class="btn-close"></a>
                                    <div class="content">
                                        <div class="profile__info">
                                            <div class="profile__info__picture">
                                                <img src="" alt="" class="profile_picturecoach">
                                            </div>
                                            <div class="profile__info__name">
                                                <span class="namecoach"></span>
                                            </div>
                                            <!-- <div class="profile__info__birth">
                                                <label>Date Of Birth </label>
                                                <span class="birthdatecoach"></span>
                                            </div> -->
                                            <div class="profile__info__language">
                                                <label>Native Language </label>
                                                <span class="spoken_languagecoach"></span>
                                            </div>
                                            <div class="profile__info__gender">
                                                <label>Gender</label>
                                                <span class="gendercoach"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $checkdt++; } ?>
                </div>
                <?php } ?>

                <div class="boxsessions__upcoming tab-content" id="tab-2">
                    <?php foreach($dataupcoming as $d){ ?>
                    <div class="todaysessions">
                        <span class="date"><?php echo date('D, j F  Y', strtotime($d->date)); ?></span>
                        <span class="time"><?php echo(date('H:i',strtotime($d->start_time)));?> - <?php echo(date('H:i',strtotime($d->end_time)));?> <?php echo "(UTC ".$gmt_val.")"?></span>

                        <div class="boxinfo activesession">
                            <div class="coachinfo trigger viewcoach" idcoach="<?php echo $d->coach_id;?>">
                                Coach Info
                            </div>
                            <!-- MODAL -->
                            <div class="modal-wrapper">
                                <div class="modal">
                                    <a class="btn-close"></a>
                                    <div class="content">
                                        <div class="profile__info">
                                            <div class="profile__info__picture">
                                                <img src="" alt="" class="profile_picturecoach">
                                            </div>
                                            <div class="profile__info__name">
                                                <span class="namecoach"></span>
                                            </div>
                                            <!-- <div class="profile__info__birth">
                                                <label>Date Of Birth </label>
                                                <span class="birthdatecoach"></span>
                                            </div> -->
                                            <div class="profile__info__language">
                                                <label>Native Language </label>
                                                <span class="spoken_languagecoach"></span>
                                            </div>
                                            <div class="profile__info__gender">
                                                <label>Gender</label>
                                                <span class="gendercoach"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
</section>

<div class="page__loader">
    <div class="loader" id="loader">
        <span></span>
        <span></span>
        <span></span>
    </div>
    Updating your study dashboard...
</div>

<script>
    var userid = "<?php echo $userid; ?>";
    $("#clearlive").click(function() {
        $.post("<?php echo site_url('b2c/student/dashboard/clear_live');?>", { 'id': userid },function(data) {
            window.location.href = "<?php echo site_url('b2c/student/dashboard'); ?>";
        });
    });
</script>

<script>
var sp_date = "<?php echo $last_upd_date; ?>";
var sp_time = "<?php echo $last_upd_time; ?>";

var now_date = "<?php echo $nowd; ?>";
var now_time = "<?php echo $hour_start_db; ?>";

var err_gcp = "<?php echo $err_gcp;?>";
var err_gsp = "<?php echo $err_gsp;?>";
var err_gwp = "<?php echo $err_gwp;?>";

var sp_difftime_updated = "<?php echo $sp_difftime_updated; ?>";
// console.log(err_gcp);
if(now_date > sp_date || err_gcp.indexOf("Invalid")>=0 || err_gsp.indexOf("Invalid")>=0 || err_gwp.indexOf("Invalid")>=0){
  // alert(sp_difftime_updated);
  $('.page__loader').css('display', 'flex');
  update_study();
}else if(now_date == sp_date){
  if(sp_difftime_updated > 03){
    // alert(sp_difftime_updated);
    $('.page__loader').css('display', 'flex');
    update_study();
  }
}

function update_study(){
  $.ajax({
   type:"POST",
   url:"<?php echo site_url('b2c/student/dashboard/update_studyprog');?>",
   success: function(data){
      $('.page__loader').hide();
       //document.getElementById('chat_audio').play();
      //  $('#isi_chat').html(data);
       console.log(data);
     }
  });
}
</script>

<script type="text/javascript">


$(".viewcoach").click(function() {
    var coach_id = $(this).attr('idcoach');
    $.ajax({
        url: "<?php echo site_url('b2c/student/dashboard/coach_detail');?>",
            type: 'POST',
            dataType: 'json',
            data: {coach_id : coach_id},
            success: function(data) {
                var name = data[0].name;
                var email = data[0].email;
                var birthdate = data[0].birthdate;
                var spoken_language = data[0].spoken_language;
                var gender = data[0].gender;
                // var timezone = data[0].timezone;
                var profile_picture = data[0].profile_picture;

                $('.namecoach').text(name);
                // $('.emailcoach').text(email);
                $('.birthdatecoach').text(birthdate);
                $('.spoken_languagecoach').text(spoken_language);
                $('.gendercoach').text(gender);
                // $('.timezonecoach').text(': '+timezone);
                $('.profile_picturecoach').attr('src','<?php echo base_url();?>'+profile_picture);

            }
    });
});

</script>

<script type="text/javascript">
    // var deadline = '2016-08-25 18:20:00';

    var end = '<?php echo $hourend; ?>';
    var deadline = '<?php echo $countdown; ?>';

    function time_remaining(endtime){
        // var t = Date.parse(endtime) - Date.parse(new Date());
        // var t = Date.parse(endtime) - Date.parse("<?php echo $nowc ?>");
        var first = endtime.replace("-","/");
        var datetime = first.replace("-","/");
        var year = new Date(datetime).getFullYear();
        var day = new Date(datetime).getDate();
        if(day<=9 && day>0) {
            day = "0" + day;
        }else{
            day = day;
        }
        var month = new Date(datetime).getMonth()+1;
        var hours = new Date(datetime).getHours();
        if(hours<=9 && hours>=0) {
            hours = "0" + hours;
        }else{
            hours = hours;
        }
        var minutes = new Date(datetime).getMinutes();
        if(minutes<=9 && minutes>=0) {
            minutes = "0" + minutes;
        }else{
            minutes = minutes;
        }
        var seconds = new Date(datetime).getSeconds();
        if(seconds<=9 && seconds>=0) {
            seconds = "0" + seconds;
        }else{
            seconds = seconds;
        }
        var realendtime = month + "/" + day + "/" + year + " " + hours + ":" + minutes + ":" + seconds;
        var t = Date.parse(realendtime) - Date.parse(new Date());
        var seconds = Math.floor( (t/1000) % 60 );
        var minutes = Math.floor( (t/1000/60) % 60 );
        var hours = Math.floor( (t/(1000*60*60)) % 24 );
        return {'total':t, 'hours':hours, 'minutes':minutes, 'seconds':seconds};

    }
    function run_clock(id,endtime){
        var clock = document.getElementById(id);

        // get spans where our clock numbers are held
        var hours_span = clock.querySelector('.hours');
        var minutes_span = clock.querySelector('.minutes');
        var seconds_span = clock.querySelector('.seconds');

        function update_clock(){
            var trigdate = new Date;

            var trig_s = trigdate.getSeconds();
            var sn = trig_s.toString().length;
            if (sn == 1){
                trig_s = '0'+trig_s;
            }

            var trig_m = trigdate.getMinutes();
            var mn = trig_m.toString().length;
            if (mn == 1){
                trig_m = '0'+trig_m;
            }

            var trig_h = trigdate.getHours();
            var hn = trig_h.toString().length;
            if (hn == 1){
                trig_h = '0'+trig_h;
            }

            var now = trig_h+':'+trig_m+':'+trig_s;

            var t = time_remaining(endtime);

            // update the numbers in each part of the clock
            hours_span.innerHTML = ('0' + t.hours).slice(-2);
            minutes_span.innerHTML = ('0' + t.minutes).slice(-2);
            seconds_span.innerHTML = ('0' + t.seconds).slice(-2);

            // console.log(now);
            // console.log(end);
            if(t.total<=0){
                if (now < end){
                    clearInterval(timeinterval);
                    $("#clockdiv").hide();
                    $("#nosess").hide();
                    $("#sess").removeClass("hide");
                    $("#todaysess").addClass("activesession");
                    $.get("<?php echo site_url('b2c/student/dashboard/get_id');?>",function(data) {
                        var val_id = data;
                        // console.log(val_id);
                        document.getElementById('get_id_ajax').value = val_id;
                        // alert(document.getElementById("get_id_ajax").value);
                        // $("#clockdiv").show();
                        // $("#clockarea").show();
                        $("#sess").show();
                    });
                }
                else if(now > end){
                    // console.log(now);
                    // console.log(end);
                    $("#clockdiv").show();
                    $("#clockarea").show();
                    $("#sess").hide();
                }
            }
        }
        update_clock();
        var timeinterval = setInterval(update_clock,1000);
    }
    run_clock('clockdiv',deadline);
</script>
