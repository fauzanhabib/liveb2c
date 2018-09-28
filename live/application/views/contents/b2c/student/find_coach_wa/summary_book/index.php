<script>
  $(".header__desktop").hide();
  $(".header__mobile").hide();
  $(".main__sidebar").hide();
</script>

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
                        <a href="<?php echo site_url('b2c/student/find_coaches_wa/single_date'); ?>">
                            <div class="bookkacoach activediv">Book a Coach</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/session_wa'); ?>">
                            <div class="session ">Session</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/token_wa'); ?>">
                            <div class="token">Token</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/help_wa'); ?>">
                            <div class="help ">Help</div>
                        </a>
                    </div>

                    <div class="dashboard__bxsummary">
                        <div class="dashboard__bxsummary__bookingsummary" style="width: 100%; !important;">
                            <h3>Your Booking Summary</h3>
                            <div class="bxcoachname">
                                <label>Coach Name</label>
                                <span><?php echo($data_coach[0]->fullname); ?></span>
                            </div>
                            <!-- <div class="bxcoachemail">
                                <label>E-Mail</label>
                                <span><?php echo($data_coach[0]->email); ?></span>
                            </div> -->
                             <div class="bxcoacdate">
                                <label>Date</label>
                                <span><?php echo(date('l jS \of F Y', @$date)); ?></span>
                            </div>
                            <div class="bxcoachstart">
                                <label>Start Time</label>
                                <span><?php echo($start_time); ?></span>
                            </div>
                            <div class="bxcoachend">
                                <label>End Time</label>
                                <span>
                                    <?php
                                        $currentDate = strtotime($end_time);
                                        $futureDate = $currentDate-(60*5);
                                        $endtime = date("H:i:s", $futureDate);

                                        echo($endtime);
                                    ?>
                                </span>
                            </div>
                            <div class="bxcoactoken">
                                <label>Token Cost</label>
                                <span>
                                    <?php
                                        $token = '';
                                        if($data_coach[0]->coach_type_id == 1){
                                            $token = $standard_coach_cost;
                                        }else if($data_coach[0]->coach_type_id == 2){
                                            $token = $elite_coach_cost;
                                        }

                                        echo($token);
                                    ?>
                                </span>
                            </div>

                            <div class="bxcoactoken" style="border-bottom: 1px solid #606983 !important;">
                                <label>Booking Device/Browser</label>
                                <span id="textBrowser">Mobile</span>
                                <input type="hidden" id="d_os" value="1"/>
                                <input type="hidden" id="d_type" value="Mobile"/>
                                <input type="hidden" id="d_browser" value="1"/>
                            </div>

                            <div class="bxcoachend" style="border-bottom: none !important;">
                                <label>Choose OS:</label>
                                <select class="choose_browser" id="sel_os">
                                  <option value="1">Choose Your OS</option>
                                  <option value="ios">iOS</option>
                                  <option value="android">Android</option>
                                </select>
                            </div>

                            <div class="bxcoactoken box--warning">
                                <label class="font--warning">Please use the same device when you do this booking on the live session</label>
                            </div>

                            <!-- <div class="bxcoachend" style="border-bottom: none !important;" id="ch_browser">
                                <label>Choose Browser:</label>
                                <select class="choose_browser" id="sel_browser">
                                  <option value="1">Choose Your Browser</option>
                                  <option value="Safari">Safari</option>
                                  <option value="Other">Other Browsers</option>
                                </select>
                            </div> -->

                            <div class="bxbutton">
                                <button type="submit" id="submit_summary" class="neobutton trigger__loader"> Done</button>
                                <button type="submit" id="cancel_summary" class="neobutton"> Cancel</button>
                            </div>
                        </div>
                        <div class="page__loader">
                            <div class="loader" id="loader">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            Processing your booking...
                        </div>
                    </div>

                </div>
            </section>

<script>
  $('#sel_os').change(function(){
    detect_os = $(this).val();
    $("#d_os").val(detect_os);

    textContent = 'Mobile';

    // $('#textBrowser').html(new_content);
    if(detect_os == 'ios'){
      detect_browser = 'Safari';
    }else{
      detect_browser = 'Other';
    }
    $("#d_browser").val(detect_browser);

    if(detect_browser == '1'){
      detect_browser = '';
    }

    new_content = textContent+' / '+detect_browser

    document.getElementById("textBrowser").innerHTML = new_content;
  })

  // $('#sel_browser').change(function(){
  //   detect_browser = $(this).val();
  //   textContent = 'Mobile';
  //
  //   // $('#textBrowser').html(new_content);
  //   $("#d_browser").val(detect_browser);
  //
  //   if(detect_browser == '1'){
  //     detect_browser = '';
  //   }
  //
  //   new_content = textContent+' / '+detect_browser
  //
  //   document.getElementById("textBrowser").innerHTML = new_content;
  // })
</script>

<script>
  $(document).on('touchstart click', '#submit_summary', function () {

      browser_type = $("#d_browser").val();
      device_type  = $("#d_type").val();
      device_os    = $("#d_os").val();

      if(!device_os){
        device_os = "none";
      }
      if(!device_type){
        device_type = "none";
      }
      if(!browser_type){
        browser_type = "none";
      }

      if(device_os == '1'){
        alert("Please choose your OS");
        return false;
      }

      if(browser_type == '1'){
        alert("Please choose your browser");
        return false;
      }

      href = "<?php echo $search_by == 'single_date' ? site_url('b2c/student/find_coaches_wa/book_single_coach/' . $data_coach[0]->id . '/' . $date . '/' . $start_time . '/' . $end_time.'/' . $token) : site_url('b2c/student/find_coaches_wa/booking/' . $data_coach[0]->id . '/' . $date . '/' . $start_time . '/' . $end_time.'/' . $token); ?>";

      href += '/'+browser_type+'/'+device_type+'/'+device_os;

      // console.log(href);
      $('.page__loader').addClass('flex');


      setTimeout(function () {
         location.href = href;
      }, 1000); //will call the function after 2 secs.
      // setTimeout(function () {
      //    location.href = "<?php echo $search_by == 'single_date' ? site_url('b2c/student/find_coaches_wa/book_single_coach/' . $data_coach[0]->id . '/' . $date . '/' . $start_time . '/' . $end_time.'/' . $token) : site_url('b2c/student/find_coaches_wa/booking/' . $data_coach[0]->id . '/' . $date . '/' . $start_time . '/' . $end_time.'/' . $token); ?>";
      // }, 1000); //will call the function after 2 secs.

      $.ajax({
          type:"POST",
          url:"<?php echo site_url('b2c/student/find_coaches_wa/email_booking');?>",
          data: {
              'coach_id': "<?php echo $data_coach[0]->id; ?>",
              'date_': "<?php echo $date;?>",
              'start_time_': "<?php echo $start_time;?>",
              'end_time_': "<?php echo $end_time;?>",
              'token': "<?php echo $token;?>"
          }
      });
  });

  $(document).on('touchstart click', '#cancel_summary', function () {
      location.href = "<?php echo $search_by == 'single_date' ? site_url('b2c/student/find_coaches_wa/book_by_single_date/'.date('Y-m-d', @$date)) : site_url('b2c/student/find_coaches_wa/search/' . $search_by); ?>";
  });
</script>

<script>
    // $('.trigger__loader').click(function() {
    //     $('.page__loader').css('display', 'flex');
    // })
</script>
