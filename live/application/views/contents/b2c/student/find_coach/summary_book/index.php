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
                        <a href="">
                            <div class="session ">Session</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/token'); ?>">
                            <div class="token">Token</div>
                        </a>
                        <a href="<?php echo site_url('b2c/student/help'); ?>">
                            <div class="help ">Help</div>
                        </a>
                    </div>

                    <div class="dashboard__bxsummary">
                        <div class="dashboard__bxsummary__bookingsummary">
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
                
            </script>

            <script>
                $(document).on('touchstart click', '#submit_summary', function () {
                    
                    $('.page__loader').addClass('flex');


                    setTimeout(function () {
                       location.href = "<?php echo $search_by == 'single_date' ? site_url('b2c/student/find_coaches/book_single_coach/' . $data_coach[0]->id . '/' . $date . '/' . $start_time . '/' . $end_time.'/' . $token) : site_url('b2c/student/find_coaches/booking/' . $data_coach[0]->id . '/' . $date . '/' . $start_time . '/' . $end_time.'/' . $token); ?>";
                    }, 1000); //will call the function after 2 secs.

                    $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('b2c/student/find_coaches/email_booking');?>",
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
                    location.href = "<?php echo $search_by == 'single_date' ? site_url('b2c/student/find_coaches/book_by_single_date/'.date('Y-m-d', @$date)) : site_url('b2c/student/find_coaches/search/' . $search_by); ?>";
                });                
            </script>


