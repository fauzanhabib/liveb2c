<style type="text/css">
    .refbtn{

    }
    .refbtn:hover{
        cursor: pointer;
        text-decoration: underline;
    }

    .pagination-items{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
                justify-content: space-between;
        width: 100%;
    }

    .addingparent{

        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-orient:horizontal;
        -webkit-box-direction:normal;
        -ms-flex-direction:row;
            flex-direction:row;
    }
    /*.header__profile {
        -webkit-box-flex: 1.1;
        -ms-flex: 1.1;
        flex: 1.1;
    }*/
    @media only screen and (max-device-width: 768px) and (min-device-width: 320px){
        .mobile__menu {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
        }
    }
</style>

    <?php if(count($data)!=0){ ?>
        <div class="dashboard__notif success__notif">
            <?php if(count($data)==1){ ?>
            <span class="trn" data-trn-key="youhave">You Have</span> <?php echo count($data); ?> <span  class="trn" data-trn-key="sessionleft">Session Left For Today</span>
            <?php }else{ ?>
                <span class="trn" data-trn-key="youhave">You Have</span> <?php echo count($data); ?>  <span  class="trn" data-trn-key="sessionleft">Sessions Left For Today</span>
            <?php } ?>
            <i class="fa fa-times"></i>
        </div>
    <?php } ?>
    <div class="dashboard">
        <div class="dashboard__menubookingcoachresult">
            <a href="<?php echo site_url('b2c/student/find_coaches/single_date'); ?>">
                <div class="bookkacoach trn"  data-trn-key="bookcoach">Book a Coach</div>
            </a>
            <a href="<?php echo site_url('b2c/student/session'); ?>">
                <div class="session trn activediv"  data-trn-key="session">Session</div>
            </a>
            <a href="<?php echo site_url('b2c/student/token'); ?>">
                <div class="token trn"  data-trn-key="tokens">Token</div>
            </a>
            <a href="<?php echo site_url('b2c/student/help'); ?>">
                <div class="help trn"  data-trn-key="help">Help</div>
            </a>
        </div>

        <div class="dashboard__menutab">
            <div class="tabsessions">
                <ul class="tabs">
                    <li class="tab-link trn current"  data-trn-key="upcomingsessin"  data-tab="tab-1">Upcoming Session</li>
                    <li class="tab-link trn"   data-trn-key="sesssionhistory" data-tab="tab-2">Session History</li>
                </ul>
            </div>
            <div class="boxsessions">
                <div class="boxsessions__today tab-content current" id="tab-1">
                    <?php foreach($dataupcoming as $d){ ?>
                    <div class="todaysessions">
                        <span class="date"><?php echo date('D, j F  Y', strtotime($d->date)); ?></span>
                        <span class="time">
                          <?php echo(date('H:i',strtotime($d->start_time)));?> -
                          <?php
                            if($d->end_time == '23:59:59'){
                              $mins = 4;
                            }else{
                              $mins = 5;
                            }
                            $get_endtime = date('H:i',strtotime($d->end_time));
                            echo(date('H:i',strtotime($get_endtime)-($mins*60)));
                          ?>
                          <?php echo "(UTC ".$gmt_val.")"?>
                        </span>

                        <div class="boxinfo activesession">
                            <?php
                              // jam sekarang
                                date_default_timezone_set('UTC');
                                $hours     = date('H:i:s');
                                $default_hours  = strtotime($hours);
                                $usertime_hours = $default_hours+(60*$minutes);
                                $hour_now = date("Y-m-d H:i:s", $usertime_hours);

                                $user_end_date = date('Y-m-d', strtotime($d->date));
                                $user_end_time = date('H:i:s',strtotime($d->start_time));
                                $user_time_final = $user_end_date." ".$user_end_time;
                              // =====

                                    // $date1 = date('Y-m-d H:i', strtotime($d->date));
                                    // $date2 = date('Y-m-d H:i');

                                $datetime1 = new DateTime($hour_now);
                                $datetime2 = new DateTime($user_time_final);
                                $difference = $datetime1->diff($datetime2);

                                $p1 = strtotime($hour_now);
                                $p2 = strtotime($user_time_final);

                                $h = abs($p2-$p1)/(60*60);

                                      // if(($difference->days > 0) && ($hour_now > date('H:i',strtotime($d->start_time))) ){
                                if($h > 24){
                                    $dat = date('Y-m-d', strtotime(@$d->date));
                                    $dat_now = date('Y-m-d');

                                    if($dat > $dat_now){

                                        $appointmen_id = $d->id;
                                        $sqla = $this->db->select('id')
                                        ->from('appointment_reschedules')
                                        ->where('appointment_id',$appointmen_id)
                                        ->get()->result();
                                        if(!$sqla){

                                    ?>
                                    <div class="coachinfo trigger trn  viewcoaches"  data-trn-key="reschedule">
                                        Reschedule
                                    </div>
                                    <div class="modal-wrapper reschedule">
                                        <div class="modal__signout">
                                            <div class="content">
                                                <div class="trn" data-trn-key="areyousure">Are you sure?</div>
                                                <div class="signout__content__confirmation reschedule__modal">
                                                    <span><a href="<?php echo(site_url('b2c/student/manage_appointments/reschedule/'.$d->id.'/'.$d->coach_id));?>", 'single', 'Reschedule', '', 'rescheduled');" class="trn" data-trn-key="yes">Yes</a></span>
                                                    <span><a class="span-close trn" data-trn-key="no">No</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }else{
                                    ?>
                                        <div class="coachinfo--disabled trn" data-trn-key="alreadyresche">Already Rescheduled</div>
                                    <?php } } ?>
                                    <?php } else {  ?>
                                        <!-- <div class="timeout__rescheduled tooltip">Reschedule
                                            <span class="tooltiptext">Available +24 hours before session</span>
                                        </div> -->
                                    <?php } ?>
                            <div class="coachinfo trigger viewcoaches trn" idcoaches="<?php echo $d->coach_id;?>" data-trn-key="coachinfo">
                                Coach Info
                            </div>
                            <!-- MODAL -->
                            <div class="modal-wrapper">
                                <div class="modal">
                                    <a class="btn-close"></a>
                                    <div class="content">
                                        <div class="profile__info">
                                            <div class="profile__info__picture">
                                                <img src="" alt="" class="profile_picturecoaches">
                                            </div>
                                            <div class="profile__info__name">
                                                <span class="namecoaches"></span>
                                            </div>
                                            <!-- <div class="profile__info__birth">
                                                <label>Date Of Birth </label>
                                                <span class="birthdatecoaches"></span>
                                            </div> -->
                                            <div class="profile__info__language">
                                                <label class="trn" data-trn-key="native" >Native Language </label>
                                                <span class="spoken_languagecoaches"></span>
                                            </div>
                                            <div class="profile__info__gender">
                                                <label class="trn" data-trn-key="gender" >Gender</label>
                                                <span class="gendercoaches"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <div class="boxsessions__upcoming tab-content" id="tab-2">
                    <div id="parent" class="addingparent">
                    <?php foreach($histories as $h){ ?>
                        <div class="todaysessions article-loop">
                            <span class="date"><?php echo date('M j Y', strtotime($h->date)); ?></span>
                            <span class="time">
                                <?php
                                    $defaultstart  = strtotime($h->start_time);
                                    $hourattstart  = date("H:i", $defaultstart);
                                    echo $hourattstart;
                                ?>
                                -
                                <?php
                                    if($h->end_time == '23:59:59'){
                                      $mins = 4;
                                    }else{
                                      $mins = 5;
                                    }
                                    $get_endtime = date('H:i',strtotime($h->end_time));

                                    $defaultend  = strtotime($get_endtime);
                                    $endsession = $defaultend-($mins*60);
                                    $hourattend  = date("H:i", $endsession);
                                    echo $hourattend;
                                ?>
                                <?php
                                    echo "(UTC ".$gmt_val.")"
                                ?>
                            </span>
                            <form name="sessiondone" target="_blank" action="<?php echo(site_url('b2c/student/opentok/checkrecord/'));?>" method="post">
                                <input type="hidden" name="sessionid" value="<?php echo @$h->session; ?>">
                                <input type="submit" class="recorded_session_download trn" value="Recorded Session" data-trn-value="recordedsesso">
                            </form>

                            <div class="boxinfo activesession">
                                <div class="coachinfo trigger viewcoaches trn" idcoaches="<?php echo $h->coach_id;?>" data-trn-key="coachinfo">
                                    Coach Info
                                </div>
                                <!-- MODAL -->
                                <div class="modal-wrapper">
                                    <div class="modal">
                                        <a class="btn-close"></a>
                                        <div class="content">
                                            <div class="profile__info">
                                                <div class="profile__info__picture">
                                                    <img src="" alt="" class="profile_picturecoaches">
                                                </div>
                                                <div class="profile__info__name">
                                                    <span class="namecoaches"></span>
                                                </div>
                                                <!-- <div class="profile__info__birth">
                                                    <label class="trn" data-trn-key="birth">Date Of Birth </label>
                                                    <span class="birthdatecoaches"></span>
                                                </div> -->
                                                <div class="profile__info__language">
                                                    <label class="trn" data-trn-key="native">Native Language </label>
                                                    <span class="spoken_languagecoaches"></span>
                                                </div>
                                                <div class="profile__info__gender">
                                                    <label class="trn" data-trn-key="gender">Gender</label>
                                                    <span class="gendercoaches"></span>
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
        </div>
    </div>
</section>
<?php
  $check_url = base_url();
  // $check_url = "https://liveb2ctest.dyned.com/profile";
  if (strpos($check_url, 'liveb2ctest') !== false) {
    $url = "https://52.77.200.151/liveb2itest/";
  }else{
    $url = "https://live.dyned.com/";
  }
?>
<input type="hidden" value="<?php echo $url?>" id="url_coachpic">
<script type="text/javascript">
    var url = $('#url_coachpic').val();
    // $(document).on('click', '.viewcoaches', function() {
    console.log(url);

    $(".viewcoaches").click(function() {
        var coach_id = $(this).attr('idcoaches');
        // console.log(coach_id);
        // $('.modalkedua').addClass('open');
        $.ajax({
            url: "<?php echo site_url('b2c/student/session/coach_detail');?>",
            type: 'POST',
            dataType: 'json',
            data: {coach_id : coach_id},
            success: function(data) {
                // console.log(data);
                var name = data[0].name;
                var email = data[0].email;
                var birthdate = data[0].birthdate;
                var spoken_language = data[0].spoken_language;
                var spoke = spoken_language.replace(/#/g , ", ");
                var gender = data[0].gender;
                // var timezone = data[0].timezone;
                var profile_picture = data[0].profile_picture;

                $('.namecoaches').text(name);
                // $('.emailcoach').text(email);
                $('.birthdatecoaches').text(birthdate);
                $('.spoken_languagecoaches').text(spoke);
                $('.gendercoaches').text(gender);
                // $('.timezonecoach').text(': '+timezone);
                $('.profile_picturecoaches').attr('src',url+profile_picture);

            }
        })
    });

</script>

 <script>
    $('.article-loop').paginate(6);
</script>
