<style>
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

<div class="dashboard">
    <div class="dashboard__bxsummary">
        <div class="dashboard__bxsummary__bookingsummary">
        <h3 class="trn" data-trn-key="booksumary">Your Booking Summary</h3>
            <div class="bxcoachname">
                <label  class="trn" data-trn-key="coachname">Coach Name</label>
                <span><?php echo($data_coach[0]->fullname); ?></span>
            </div>
            <!-- <div class="bxcoachemail">
                <label>E-Mail</label>
                <span><?php echo($data_coach[0]->email); ?></span>
            </div> -->
            <div class="bxcoacdate">
                <label  class="trn" data-trn-key="datee">Date</label>
                <span><?php echo(date('l jS \of F Y', @$date)); ?></span>
            </div>
            <div class="bxcoachstart">
                <label  class="trn" data-trn-key="starttime">Start Time</label>
                <span><?php echo($start_time); ?></span>
            </div>
            <div class="bxcoachend">
                <label  class="trn" data-trn-key="endtinme">End Time</label>
                <span>
                    <?php
                    $currentDate = strtotime($end_time);
                    $futureDate = $currentDate-(60*5);
                    $endtime = date("H:i:s", $futureDate);

                    echo($endtime);
                    ?>
                </span>
            </div>
            <!-- <div class="bxcoactoken">
                <label>Token Cost</label>
                <span>
                    <?php
                    $partner_id = $this->auth_manager->partner_id($data_coach[0]->id);
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

                    $token = '';
                    if($data_coach[0]->coach_type_id == 1){
                        $token = $standard_coach_cost;
                    }else if($data_coach[0]->coach_type_id == 2){
                        $token = $elite_coach_cost;
                    }

                    echo($token);
                    ?>
                </span>
            </div> -->

            <div class="bxcoactoken" style="border-bottom: 1px solid #606983 !important;">
                <label>Booking Device/Browser</label>
                <span>
                  <?php echo $device_info; ?>
                </span>
                <!-- <span id="textBrowser"><?php
                    echo $user_device;
                    if ($user_device == "Mobile"){
                      echo " (".@$user_d_type.")";
                    }
                  ?></span>
                <input type="hidden" id="d_os" value="<?php echo $user_d_type; ?>"/>
                <input type="hidden" id="d_type" value="<?php echo $user_device; ?>"/>
                <input type="hidden" id="d_browser" value="1"/> -->
            </div>
            <!-- <div class="bxcoachend" style="border-bottom: none !important;display:none;" id="ch_browser">
                <label>Choose Browser:</label>
                <select class="choose_browser" id="sel_browser">
                  <option value="1">Choose Your Browser</option>
                  <option value="Chrome">Chrome</option>
                  <option value="Firefox">Firefox</option>
                  <option value="Safari">Safari</option>
                </select>
            </div> -->
            <div class="bxcoactoken box--warning">
                <label class="font--warning">Please use the same device when you do this booking on the live session</label>
            </div>

            <div class="bxbutton">
                <button type="submit" id="submit_summary" class="neobutton trigger__loader trn" data-trn-key="btndone"> Done</button>
                <button type="submit" id="cancel_summary" class="neobutton trn" data-trn-key="btncancel"> Cancel</button>
            </div>
        </div>
        <div class="page__loader">
            <div class="loader" id="loader">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span  class="trn" data-trn-key="proceesupdate">Processing your booking...</span>
        </div>
    </div>

</div>

<script>
// var detect_browser;
// // Opera 8.0+
// var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
//
// // Firefox 1.0+
// var isFirefox = typeof InstallTrigger !== 'undefined';
//
// // Safari 3.0+ "[object HTMLElementConstructor]"
// var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) { return p.toString() === "[object SafariRemoteNotification]"; })(!window['safari'] || (typeof safari !== 'undefined' && safari.pushNotification));
//
// // Internet Explorer 6-11
// var isIE = /*@cc_on!@*/false || !!document.documentMode;
//
// // Edge 20+
// var isEdge = !isIE && !!window.StyleMedia;
//
// // Chrome 1+
// var isChrome = !!window.chrome && !!window.chrome.webstore;
//
// // Blink engine detection
// var isBlink = (isChrome || isOpera) && !!window.CSS;
// // detect_browser
// if(isOpera === true){
//   detect_browser = 'Opera';
//   // console.log(detect_browser)
// }
// if(isIE === true){
//   detect_browser = 'Internet Explorer';
//   // console.log(detect_browser)
// }
// if(isSafari === true){
//   detect_browser = 'Safari';
//   // console.log(detect_browser)
// }
// if(isChrome === true){
//   detect_browser = 'Chrome';
//   // console.log(detect_browser)
// }
// if(isFirefox === true){
//   detect_browser = 'Firefox';
//   // console.log(detect_browser)
// }
//
// if(detect_browser == null){
//   detect_browser = '';
//   // console.log(detect_browser)
// }
//
// // detect_browser = '';
// // console.log(navigator.sayswho);
//
// if(!detect_browser){
//   $('#ch_browser').show();
//
//   $('#sel_browser').change(function(){
//     detect_browser = $(this).val();
//     textContent = '<?php
//         echo $user_device;
//         if ($user_device == "Mobile"){
//           echo " (".@$user_d_type.")";
//         }
//       ?>';
//
//     // $('#textBrowser').html(new_content);
//     $("#d_browser").val(detect_browser);
//
//     if(detect_browser == '1'){
//       detect_browser = '';
//     }
//
//     new_content = textContent+' / '+detect_browser
//
//     document.getElementById("textBrowser").innerHTML = new_content;
//   })
// }else{
//
//   document.getElementById("textBrowser").innerHTML += ' / '+detect_browser;
//   $("#d_browser").val(detect_browser);
// }

</script>

<script>
    $(document).on('touchstart click', '#submit_summary', function () {
      // browser_type = $("#d_browser").val();
      // device_type  = $("#d_type").val();
      // device_os    = $("#d_os").val();
      //
      // if(!device_os){
      //   device_os = "none";
      // }
      // if(!device_type){
      //   device_type = "none";
      // }
      // if(!browser_type){
      //   browser_type = "none";
      // }
      //
      // if(browser_type == '1'){
      //   alert("Please choose your browser");
      //   return false;
      // }
      //
      // href = "<?php echo $search_by == 'single_date' ? site_url('b2c/student/manage_appointments/book_single_coach/' . $data_coach[0]->id . '/' . $date . '/' . $start_time . '/' . $end_time) : site_url('b2c/student/manage_appointments/booking/' . $data_coach[0]->id . '/' . $date . '/' . $start_time . '/' . $end_time); ?>"
      //
      // href += '/'+browser_type+'/'+device_type+'/'+device_os;
      //
      // console.log(href);

        $('.page__loader').addClass('flex');


        setTimeout(function () {
           location.href = "<?php echo $search_by == 'single_date' ? site_url('b2c/student/manage_appointments/book_single_coach/' . $data_coach[0]->id . '/' . $date . '/' . $start_time . '/' . $end_time) : site_url('b2c/student/manage_appointments/booking/' . $data_coach[0]->id . '/' . $date . '/' . $start_time . '/' . $end_time); ?>";
        }, 1000); //will call the function after 2 secs.

        $.ajax({
            type:"POST",
            url:"<?php echo site_url('b2c/student/manage_appointments/email_reschedule');?>",
            data: {
                'appointment_id': '<?php echo $appointment_id; ?>',
                'old_coach_name': '<?php echo $old_coach_name; ?>',
                'old_coach_email': '<?php echo $old_coach_email; ?>',
                'old_date': '<?php echo $old_date; ?>',
                'old_start_time': '<?php echo $old_start_time; ?>',
                'old_end_time': '<?php echo $old_end_time; ?>',
                'old_coach_gmt': '<?php echo $old_coach_gmt; ?>',
                'coach_id': '<?php echo $data_coach[0]->id; ?>',
                'coach_email': '<?php echo $data_coach[0]->email; ?>',
                'coach_name': '<?php echo $data_coach[0]->fullname; ?>',
                'date_': '<?php echo $date;?>',
                'start_time_': '<?php echo $start_time;?>',
                'end_time_': '<?php echo $end_time;?>',
            }
        });
    });

    $(document).on('touchstart click', '#cancel_summary', function () {
        location.href = "<?php echo $search_by == 'single_date' ? site_url('b2c/student/session') : site_url('b2c/student/session'); ?>";
    });
</script>
