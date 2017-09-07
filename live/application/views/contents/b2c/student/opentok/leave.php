<script type="text/javascript">
$(document).ready(function(){
  $('#ratecoach').click(function(){
   var star = $('input:radio[name=star]:checked').val();
   var coach_id = '<?php echo $user->coach_id; ?>';
   var appointment_id = '<?php echo $appointment_id ?>';
    if ( !$('#star-1').is(':checked') && !$('#star-2').is(':checked') && !$('#star-3').is(':checked') &&
        !$('#star-4').is(':checked') && !$('#star-5').is(':checked') )
        {
        alert("Zero star? We don't have it.");
        return false;
        }
    else{
        $.ajax({
          type:"POST",
          url:"<?php echo site_url('b2c/student/opentok/leavesession/rate_coach');?>",
          data: {
            'star' : star,
            'coach_id' : coach_id,
            'appointment_id': appointment_id
            },
          success: function(data){
            window.onbeforeunload = null;
            alert('Rating: ' + star + ' out of 5');
            // window.location.href = "<?php echo site_url('student/dashboard');?>";
          }
         });
        }
  });

  $('.exitbtn').click(function(){
    var coach_id = '<?php echo $user->coach_id; ?>';
    var appointment_id = '<?php echo $appointment_id ?>';
    $.ajax({
      type:"POST",
      url:"<?php echo site_url('b2c/student/opentok/leavesession/check_rate');?>",
      data: {
        'coach_id' : coach_id,
        'appointment_id': appointment_id
        },
      success: function(data){
        if(data != "exit"){
          alert(data);
        }else if(data = "exit"){
          window.location.href = "<?php echo site_url('b2c/student/dashboard');?>";
        }
      }
    });
  });
});
</script>
<section class="main__content">
    <div class="bxleavesessionstue">
        <h2>Session Summaries</h2>
        <div class="bxleavesessionstue__statussession">
            <p>Your Session With <span>Fajarudin </span> has Ended</p>
        </div>
        <div class="bxleavesessionstue__statustime">
            <table>
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>START TIME</th>
                        <th>END TIME</th>
                        <th>COACH</th>
                        <th>YOU JOINED AT</th>
                        <th>YOUR COACH JOINED AT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>September 04, 2017</td>
                        <?php

                          $id = $this->auth_manager->userid();
                          // $utz = $this->db->select('user_timezone')
                          //         ->from('user_profiles')
                          //         ->where('user_id', $id)
                          //         ->get()->result();
                          // $idutz = $utz[0]->user_timezone;
                          $tz = $this->db->select('*')
                                  ->from('user_timezones')
                                  ->where('user_id', $id)
                                  ->get()->result();

                          $minutes = $tz[0]->minutes_val;
                          //User Hour
                          date_default_timezone_set('UTC');
                          $date     = @$user->start_time;
                          $default  = strtotime($date);
                          $usertime = $default+(60*$minutes);
                          $start  = date("H:i:s", $usertime);

                          $date2     = @$user->end_time;
                          $default2  = strtotime($date2);
                          $usertime2 = $default2+(60*$minutes)-300;
                          $end  = date("H:i:s", $usertime2);
                         // print_r($end);
                         //  exit();
                        ?>
                        <td><?php echo @$start;?></td>
                        <td><?php echo @$end;?></td>
                        <td><?php echo @$user->fullname; ?></td>
                        <td>
                          <?php
                            if(@$user->cch_attend == NULL){
                              @$cch_att_conv = "Coach didn't attend the session.";
                            }else{
                              $date3     = @$user->cch_attend;
                              $default3  = strtotime($date3);
                              $usertime3 = $default3+(60*$minutes);
                              $cch_att_conv = date("H:i:s", $usertime3);
                            }

                            if(@$user->std_attend == NULL){
                              @$std_att_conv = "Student didn't attend the session.";
                            }else{
                              $date4     = @$user->std_attend;
                              $default4  = strtotime($date4);
                              $usertime4 = $default4+(60*$minutes);
                              $std_att_conv = date("H:i:s", $usertime4);
                            }

                            if($role=='CCH'){
                              echo @$cch_att_conv;
                            }else if($role=='STD'){
                              echo @$std_att_conv;
                            }
                          ?>
                        </td>
                        <td>
                          <?php
                            if($role=='STD'){
                              echo @$cch_att_conv;
                            }else if($role=='CCH'){
                              echo @$std_att_conv;
                            }
                          ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="bxleavesessionstue__ratecoach">
            <table>
                <thead>
                    <tr>
                        <th>Rate Your Coach</th>

                        <th>Coach Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="stars">
                                <input class="star star-5" id="star-5" value="5" type="radio" name="star" />
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" value="4" type="radio" name="star" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" value="3" type="radio" name="star" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" value="2" type="radio" name="star" />
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" value="1" type="radio" name="star" />
                                <label class="star star-1" for="star-1"></label>
                            </div>

                              <button class="neobutton" id="ratecoach">Rate</button>
                        </td>

                        <td>
                            <?php echo @$user->fullname; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bxleavesessionstue__note">
            <p><b>IMPORTANT NOTES:</b></p>
            <p>Download the recorded session in Session History.</p>
            <p>Recording will be ready in 2 minutes.</p>
            <p>Recording is available for 72 hours after end of session.</p>

             <button class="neobutton exitbtn">Exit</button>
        </div>
    </div>
</section>
