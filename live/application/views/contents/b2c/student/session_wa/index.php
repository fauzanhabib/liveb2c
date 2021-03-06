<script>
  $(".header__desktop").hide();
  $(".header__mobile").hide();
  $(".main__sidebar").hide();
</script>
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
    }
</style>

    <!-- back button -->
    <div class="header__wa">
        <div class="backBtn">
            <a href="<?php echo site_url('b2c/student/dashboard_wa'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg>
                back
            </a>
        </div>
    </div>
    <!-- back button end -->

    <?php if(count($data)!=0){ ?>
        <div class="dashboard__notif success__notif">
            <?php if(count($data)==1){ ?>
            <span>You Have <?php echo count($data); ?> Session Left For Today</span>
            <?php }else{ ?>
            <span>You Have <?php echo count($data); ?> Sessions Left For Today</span>
            <?php } ?>
            <i class="fa fa-times"></i>
        </div>
    <?php } ?>
    <div class="dashboard">
        <div class="dashboard__menubookingcoachresult">
            <a href="<?php echo site_url('b2c/student/find_coaches_wa/single_date'); ?>">
                <div class="bookkacoach trn" data-trn-key="bookcoach">Book a Coach</div>
            </a>
            <a href="<?php echo site_url('b2c/student/session_wa'); ?>">
                <div class="session activediv" data-trn-key="session">Session</div>
            </a>
            <a href="<?php echo site_url('b2c/student/token_wa'); ?>">
                <div class="token trn" data-trn-key="tokens">Token</div>
            </a>
            <a href="<?php echo site_url('b2c/student/help_wa'); ?>">
                <div class="help trn" data-trn-key="help">Help</div>
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
                        <span class="time"><?php echo(date('H:i',strtotime($d->start_time)));?> - <?php echo(date('H:i',strtotime($d->end_time)));?> <?php echo "(UTC ".$gmt_val.")"?></span>

                        <div class="boxinfo activesession">
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
                                    $defaultend  = strtotime($h->end_time);
                                    $endsession = $defaultend-(5*60);
                                    $hourattend  = date("H:i", $endsession);
                                    echo $hourattend;
                                ?>
                                <?php
                                    echo "(UTC ".$gmt_val.")"
                                ?>
                            </span>
                            <form name="sessiondone" target="_blank" action="<?php echo(site_url('b2c/student/opentok/checkrecord/'));?>" method="post">
                                <input type="hidden" name="sessionid" value="<?php echo @$h->session; ?>">
                                <input type="submit" class="recorded_session_download" value="Recorded Session">
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
                                                    <label>Date Of Birth </label>
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

<script type="text/javascript">

    // $(document).on('click', '.viewcoaches', function() {
        // console.log('a');
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
                var gender = data[0].gender;
                // var timezone = data[0].timezone;
                var profile_picture = data[0].profile_picture;

                $('.namecoaches').text(name);
                // $('.emailcoach').text(email);
                $('.birthdatecoaches').text(birthdate);
                $('.spoken_languagecoaches').text(spoken_language);
                $('.gendercoaches').text(gender);
                // $('.timezonecoach').text(': '+timezone);
                $('.profile_picturecoaches').attr('src','<?php echo base_url();?>'+profile_picture);

            }
        })
    });

</script>

 <script>
    $('.article-loop').paginate(6);
</script>
