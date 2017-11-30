<?php
if(@$user_extract2){
    $student_name = $user_extract2->fullname;
    $std_id = $user_extract2->student_id;
  }else{
    $student_name = $user_extract->fullname;
    $std_id = $user_extract->student_id;
  }

  $std_img_pull = $this->db->select('profile_picture')
                ->from('user_profiles')
                ->where('user_id', $std_id)
                ->get()->result();
  // echo "<pre>";print_r($apiKey);
  // echo "<pre>";print_r($sessionId);
  // echo "<pre>";print_r($std_img_pull);exit();

?>
<script type="text/javascript" src="<?php echo base_url();?>assets/b2c/lib/jQuery/jquery-2.2.3.min.js"></script>
<script src='//static.opentok.com/v2/js/opentok.min.js'></script>
<script charset="utf-8">
    var apiKey = '<?php echo $apiKey ?>';
    var sessionId = '<?php echo $sessionId ?>';
    var token = '<?php echo $token ?>';
    var session = OT.initSession(apiKey, sessionId);
    var publisher;
    var checkcamera;
    //Self
        session.connect(token, function(error) {
            var publisherproperties = {insertMode: 'append',
                                  width: '100%',
                                  resolution: "320x240",
                                  frameRate:15,
                                  publishVideo: true,
                                  height: 150, name: "<?php echo $this->auth_manager->get_name();?>"};

            publisher = OT.initPublisher('myPublisherElementId',publisherproperties, function (error) {
              if (error) {
                // console.log(error);
                $("#camerablocked").removeClass("hidden");
              } else {
                checkcamera = 0;
              }
            });
            session.publish(publisher);

        });
    //Other
        session.on('streamCreated', function(event) {
            var subscriberProperties = {insertMode: 'append',
                                        width: '100%',
                                        resolution: "320x240",
                                        frameRate:15, name: "b"};
            subscriber = session.subscribe(event.stream,
            'subscriberContainer',
            subscriberProperties,
            function (error) {
              if (error) {
                console.log(error);
              } else {
                // console.log('Subscriber added.');
              }
            });
        });

    function toggleOff(){
      $("#videooff").hide();
      $("#videoon").removeClass("hidden");
      publisher.publishVideo(false);
    }
    function toggleOn(){
      $("#videooff").show();
      $("#videoon").addClass("hidden");
      publisher.publishVideo(true);
    }

    var connectionCount;
    session.on({
      connectionCreated: function (event) {
        connectionCount++;
        if (event.connection.connectionId != session.connection.connectionId) {
          // console.log('a');
          $("#waiting").hide();
          $("#heading1").hide();
          $("#heading2").hide();
          $("#connecting").hide();
          $("#disconnect").addClass("hidden");
        }
      },
      connectionDestroyed: function connectionDestroyedHandler(event) {
        connectionCount--;
          $("#heading2").show();
          $("#connecting").show();
          $("#disconnect").removeClass("hidden");
          $("#heading2").removeClass("hidden");
        console.log('A client disconnected.');
      }
    });
</script>
<script>
$(document).ready(function(){
   var countmsg;
   var checkmsg;

  function tampildata(){
     $.ajax({
      type:"POST",
      url:"<?php echo site_url('b2c/student/opentok/live/ambil_pesan');?>",
      success: function(data){
          //document.getElementById('chat_audio').play();
          $('#isi_chat').html(data);
          // console.log(data);
        }
     });
  }

   $(document).on('touchstart click', '#kirim', function () {
    //  console.log('a');
     var pesan = $('#pesan').val();
     var user  = '<?php echo $this->auth_manager->get_name();?>';
    //  console.log(user);
     var appointment_id = '<?php echo $appointment_id ?>';
     if (pesan == null || pesan == "") {
          alert("Oops, you can't send an empty chat");
          return false;
      }
      else{
       $.ajax({
        type:"POST",
        url:"<?php echo site_url('b2c/student/opentok/live/kirim_chat');?>",
        data: {'pesan':pesan,'user': user, 'appointment_id': appointment_id},
        success: function(data){
          $('#pesan').val('');
          $('#isi_chat').html(data);
        }
       });
      }
    });

    $('#pesan').keypress(function (e){
    if(e.keyCode == 13){
     var pesan = $('#pesan').val();
     var user = '<?php echo $this->auth_manager->get_name();?>';
     var appointment_id = '<?php echo $appointment_id ?>';
     if (pesan == null || pesan == "") {
          alert("Oops, you can't send an empty chat");
          return false;
      }
      else{
         $.ajax({
          type:"POST",
          url:"<?php echo site_url('b2c/student/opentok/live/kirim_chat');?>",
          data: {'pesan':pesan,'user': user, 'appointment_id': appointment_id},
          success: function(data){
            $('#pesan').val('');

            $('#isi_chat').html(data);
          }
         });
      }
    }
    });

    setInterval(
      function(){
        tampildata();
        if (countmsg !== checkmsg){
          document.getElementById('chat_audio').play();
          // console.log(countmsg);
          countmsg = checkmsg;
        }
      },1000);

  });
</script>
<script>
function makeFullScreen(divId){
    document.getElementById("fullarea").webkitRequestFullScreen() //example for Chrome
    var element = document.getElementById("fullarea");
    var fullScreenFunction = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen || element.oRequestFullScreen;

    if (fullScreenFunction) {
        fullScreenFunction.apply(element);
    } else {
        alert("don't know the prefix for this browser");
    }
}
</script>
<style>
.custMargin{
  margin-top: 475px !important;
}
#myPublisherElementId{
  border: solid 1px;
  left: 87%;
  top: 50%;
  height: 150px;
  position: absolute;
  z-index: 1;
  width: 150px;
}
#subscriberContainer{
  height: 500px;
}
.OT_subscriber{
  height: 100% !important;
}
#pesan{
  width: 86%;
  border-bottom: solid 1px #4f5d84;
  padding: 0px;
  margin: 0px 0px;
  border: none;
  height: 30px;
  margin-left: 5px;
  font-size: 14px;
  background: none;
  color: white;
}
.sendbtn{
  min-width: 10%;
  width: 10%;
  float: right;
  height: 17px;
  padding: 5px;
  margin-top: 0px;
  border-radius: 0px;
  font-size: 14px;
}
.chatlist{
  padding-left: 10px;
  padding-right: 10px;
  border-radius: 5px;
  margin-top: 10px;
  max-height: 260px;
  overflow: auto;
}
.width100perc{
  width: 100% !important;
}
.hidden{
  display: none !important;
}
.fs-icon{
  cursor: pointer;
  opacity: 0.2;
  transition: opacity 1s;
  /*display: none;*/
}
.fs-icon:hover{
  opacity: 1;
}
.insideElement{
  opacity: 0;
}
.boxsession__livestue:hover .insideElement, .subscriber:hover .insideElement{
opacity: 1 !important;
}
.dashboard__notif{
  margin-left: 0% !important;
}
</style>
<section class="main__content">
  <div class="dashboard__notif success__notif width100perc" id="heading1">
    Waiting for <?php echo ' '.$student_name.' '; ?> to join the session. Remain in the session until the end in order to receive a refund of your tokens.
  </div>
  <div class="dashboard__notif error__notif width100perc hidden" id="camerablocked">
    Your browser is blocking your camera, please enable it and then reload the page.
  </div>
    <div class="boxsession">
        <div>

          <h3>Remaining Time: <span id="countdown" class="timer"></span></h3>
        </div>
        <div class="boxsession__livestue" id='fullarea'>
          <div class="subscriber" id="subscriberContainer"></div>
          <div class='insideElement'>
            <div class="publisher" id="myPublisherElementId"></div>
            <button onclick="makeFullScreen(fullarea)" style="background:none;border:none;">
              <img class="fs-icon" src="<?php echo base_url();?>assets/icon/expand2x.png"></img>
            </button>
            <button id="videooff" class="pure-button btn-small btn-green w3-animate-opacity" onclick="javascript:toggleOff();" data-tooltip="Click to Turn Off Your Camera">Camera is On</button>
            <button id="videoon" class="pure-button btn-small btn-red w3-animate-opacity hidden" onclick="javascript:toggleOn();" data-tooltip="Click to Turn On Your Camera">Camera is Off</button>
          </div>
        </div>
        <div class="boxsession__livecomponentstue">
            <div class="study__dashboard__top">
                <!-- top point graph -->
                <div class="progress__point__top">
                    <div class="stuepicture">
                        <img src="<?php echo base_url().'/'.$std_img_pull[0]->profile_picture; ?>" alt="">
                    </div>

                    <h5>Points</h5>
                    <div class="graph__wrap">
                        <div class="bar__graph">
                            <?php
                            $bar_now = ( $gwp->data[0]->points_goal == 0 ? 0 : $gwp->data[0]->points / $gwp->data[0]->points_goal);
                            $bar_w1  = ( $gwp->data[1]->points_goal == 0 ? 0 : $gwp->data[1]->points / $gwp->data[1]->points_goal);
                            $bar_w2  = ( $gwp->data[2]->points_goal == 0 ? 0 : $gwp->data[2]->points / $gwp->data[2]->points_goal);
                            $bar_w3  = ( $gwp->data[3]->points_goal == 0 ? 0 : $gwp->data[3]->points / $gwp->data[3]->points_goal);
                            ?>
                            <ul class="graph b2">
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $bar_now; ?>">
                            <span class="graph__legend">Now</span>
                                <label><?php echo $gwp->data[0]->points;?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $bar_w1; ?>">
                            <span class="graph__legend">w 1</span>
                                <label><?php echo $gwp->data[1]->points;?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $bar_w2; ?>">
                            <span class="graph__legend">w 2</span>
                                <label><?php echo $gwp->data[2]->points;?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $bar_w3; ?>">
                            <span class="graph__legend">w 3</span>
                                <label><?php echo $gwp->data[3]->points;?></label>
                                </li>
                                </span>
                                <div class="v__bar">
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end top point graph -->
                <div class="chatstudent">
                  <div>
                    <input placeholder="Please write here..." type="text" id="pesan" class="form-control" style="border-bottom: solid 1px #4f5d84;">
                    <input type="hidden" id="user" class="form-control" value="<?php echo $this->auth_manager->get_name();?>">
                    <audio id="chat_audio" src="<?php echo base_url();?>assets/sound/chat.mp3" preload="auto"></audio>
                    <input type="submit" value="Send" id="kirim" class="neobutton sendbtn">
                    <!-- <button type="submit" class="neobutton ">Search Coach</button> -->
                  </div>
                  <div class="chatlist">
                      <ul id="isi_chat" style="list-style-type:none;padding-left: 0px;"> <ul>
                  </div>
                </div>
            </div>
            <div class="study__dashboard__bottom">
                <!-- achievement goal step -->
                <div class="progress__step">
                    <div class="donut__progress">
                        <div class="outter--circle circle" data-thickness="15" data-size="140">
                            <div class="inner--circle circle" data-thickness="15" data-size="110">
                                <!-- <svg id="donut_devider" class="devider-five hide">
                                    <g class="progress_border" stroke="#222a42" stroke-width="4" fill="none">
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(60 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(120 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(180 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(240 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(300 70 70)" />
                                    </g>
                                    <circle class="progress_border" fill="#3e4d79" cx="70" cy="70" r="40" />
                                </svg> -->
                                <svg id="donut_devider" class="devider-six hide">
                                    <g class="progress_border" stroke="#222a42" stroke-width="4" fill="none">
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(52 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(104 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(156 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(212 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(264 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(316 70 70)" />
                                    </g>
                                    <circle class="progress_border" fill="#3e4d79" cx="70" cy="70" r="40" />
                                </svg>
                                <svg id="donut_devider" class="devider-seven">
                                    <g class="progress_border" stroke="#222a42" stroke-width="4" fill="none">
                                        <line x1="70" y1="70" x2="70" y2="15" transform="rotate(45 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="15" transform="rotate(90 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="15" transform="rotate(135 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="15" transform="rotate(180 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="15" transform="rotate(225 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="15" transform="rotate(270 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="15" transform="rotate(315 70 70)" />
                                    </g>
                                    <circle class="progress_border" fill="#3e4d79" cx="70" cy="70" r="40" />
                                </svg>
                                <div class="donut__progress__info">
                                    <div class="point__progress__info"><?php echo $gsp->data->certification_level;?></div>
                                </div>
                            </div>
                        </div>
                        <div class="progress__info__label"><?php echo $gsp->data->total_points_until_today;?></div>
                    </div>
                    <div class="progress__achievement">
                        <div class="study__progress__achievement">
                            <!-- <div class="bullet__achievement <?php echo $mt_color['mt1']; ?>"></div>
                            <div class="bullet__achievement <?php echo $mt_color['mt2']; ?>"></div>
                            <div class="bullet__achievement <?php echo $mt_color['mt3']; ?>"></div>
                            <div class="bullet__achievement <?php echo $mt_color['mt4']; ?>"></div>
                            <div class="bullet__achievement <?php echo $mt_color['mt5']; ?>"></div>
                            <div class="bullet__achievement <?php echo $mt_color['mt6']; ?>"></div> -->


                            <!-- =======edited by rendy bustari========== -->
                            <?php
                            for($l=1;$l<=$max_buletan_student;$l++){ ?>
                              <div class="bullet__achievement <?php echo @$mt['mt'.$l];?>"></div>
                            <?php
                              }
                            ?>


                            <!-- ========================================= -->

                            <div class="achievement__point__info">
                                <h5><?php echo $gsp->data->study->points_until_today;?></h5>
                                <h3>Study</h3>
                            </div>
                        </div>
                        <div class="coach__progress__achievement">
                            <!-- <div class="bullet__achievement bg-green-gradient"></div>
                            <div class="bullet__achievement bg-green-gradient"></div>
                            <div class="bullet__achievement bg-green-gradient"></div>
                            <div class="bullet__achievement bg-green-gradient"></div>
                            <div class="bullet__achievement bg-red-gradient"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div> -->


                            <!-- =========edited by rendy bustar============== -->
                            <?php
                            for($i=1;$i<=$max_buletan;$i++){ ?>
                              <div class="bullet__achievement <?php echo @$coach_color['cc'.$i];?>"></div>
                            <?php
                              }
                            ?>
                            <!-- ================================ -->

                            <div class="achievement__point__info">
                                <h5><?php echo $gsp->data->coach->points_until_today;?></h5>
                                <h3>Coach</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end achievement goal step -->
                <!-- comprehension graph -->
                <div class="study__progress__graph">
                    <h5>Comprehension</h5>
                    <div class="graph__wrap">
                        <div class="bar__graph">
                            <ul class="graph b2">
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $gwp->data[0]->comprehension_grammar;?>" style="width: 80%; background: linear-gradient(-136deg, rgb(73, 197, 254) 0%, rgb(121, 231, 68) 92%);">
                            <span class="graph__legend">Now</span>
                                <label><?php echo strtok($gwp->data[0]->comprehension_grammar, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $gwp->data[1]->comprehension_grammar;?>" style="width: 4%;">
                            <span class="graph__legend">w 1</span>
                                <label><?php echo strtok($gwp->data[1]->comprehension_grammar, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $gwp->data[2]->comprehension_grammar;?>" style="width: 60%;">
                            <span class="graph__legend">w 2</span>
                                <label><?php echo strtok($gwp->data[2]->comprehension_grammar, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $gwp->data[3]->comprehension_grammar;?>" style="width: 68%;">
                            <span class="graph__legend">w 3</span>
                                <label><?php echo strtok($gwp->data[3]->comprehension_grammar, '.');?></label>
                                </li>
                                </span>
                                <div class="v__bar">
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end comprehension graph -->
                <!-- pronunciation graph -->
                <!-- end pronunciation graph -->
                <!-- daily progress donut graph -->
                <div class="progress__step">
                    <h5>Progress to goals</h5>
                    <div class="donut__progress">
                        <div class="step--circle circle" data-thickness="15" data-size="150">
                            <svg>
                                <path stroke-linecap="round" id="arc1" fill="none" stroke="transparent" stroke-width="10" />
                            </svg>
                            <svg>
                                <path stroke-linecap="round" id="arc2" fill="none" stroke="#fafafa" stroke-width="20" />
                            </svg>
                            <div class="step__progress__info">
                                <div class="step__info__label"><?php echo @$gsp->data->total_points_until_today;?></div>
                            </div>
                        </div>
                    </div>
                    <h5><font><?php echo (($gsp->data->total_points_to_pass - $gsp->data->total_points_until_today)*-1);?></font> points left</h5>
                </div>
                <!-- end daily progress donut graph -->
            </div>
            <div class="study__dashboard__bottom">
                <!-- pronunciation graph -->
                <div class="study__progress__graph">
                    <h5>Pronunciation</h5>
                    <div class="graph__wrap">
                        <div class="bar__graph">
                            <ul class="graph b2">
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $gwp->data[0]->pronunciation;?>" style="width: 20%;">
                            <span class="graph__legend">Now</span>
                                <label><?php echo strtok($gwp->data[0]->pronunciation, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $gwp->data[1]->pronunciation;?>" style="width: 8%;">
                            <span class="graph__legend">w 1</span>
                                <label><?php echo strtok($gwp->data[1]->pronunciation, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $gwp->data[2]->pronunciation;?>" style="width: 72%;">
                            <span class="graph__legend">w 2</span>
                                <label><?php echo strtok($gwp->data[2]->pronunciation, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php echo $gwp->data[3]->pronunciation;?>" style="width: 68%;">
                            <span class="graph__legend">w 3</span>
                                <label><?php echo strtok($gwp->data[3]->pronunciation, '.');?></label>
                                </li>
                                </span>
                                <div class="v__bar">
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                    <div class="v__line"></div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End pronunciation graph -->
                <!-- listening graph -->
                <div class="study__progress__graph">
                  <h5>Listening</h5>
                  <div class="graph__wrap">
                      <div class="bar__graph">
                        <ul class="graph b2">
                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="<?php echo $gwp->data[0]->listening;?>">
                                <span class="graph__legend">Now</span>
                              <label><?php echo strtok($gwp->data[0]->listening, '.');?></label>
                              </li>
                            </span>

                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="<?php echo $gwp->data[1]->listening;?>">
                                <span class="graph__legend">w 1</span>
                              <label><?php echo strtok($gwp->data[1]->listening, '.');?></label>
                              </li>
                            </span>

                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="<?php echo $gwp->data[2]->listening;?>">
                                <span class="graph__legend">w 2</span>
                              <label><?php echo strtok($gwp->data[2]->listening, '.');?></label>
                              </li>
                            </span>

                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="<?php echo $gwp->data[3]->listening;?>">
                                <span class="graph__legend">w 3</span>
                              <label><?php echo strtok($gwp->data[3]->listening, '.');?></label>
                              </li>
                            </span>

                            <div class="v__bar">
                              <div class="v__line"></div>
                              <div class="v__line"></div>
                              <div class="v__line"></div>
                              <div class="v__line"></div>
                              <div class="v__line"></div>
                            </div>
                        </ul>
                      </div>
                  </div>
                </div>
                <!-- End listening graph -->
                <!-- speaking graph -->
                <div class="study__progress__graph">
                  <h5>Speaking</h5>
                  <div class="graph__wrap">
                      <div class="bar__graph">
                        <ul class="graph b2">
                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="
                              <?php if(strtok($gwp->data[0]->speaking, '.') > 125){
                                  echo '125';
                                }else{
                                strtok($gwp->data[0]->speaking, '.');
                              };?>">
                                <span class="graph__legend">Now</span>
                              <label>
                              <?php echo strtok($gwp->data[0]->speaking, '.');?></label>
                              </li>
                            </span>

                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="
                              <?php if(strtok($gwp->data[1]->speaking, '.') > 125){
                                  echo '125';
                                }else{
                                strtok($gwp->data[1]->speaking, '.');
                              };?>">
                                <span class="graph__legend">w 1</span>
                              <label>
                              <?php echo strtok($gwp->data[1]->speaking, '.');?></label>
                              </li>
                            </span>

                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="
                              <?php if(strtok($gwp->data[2]->speaking, '.') > 125){
                                  echo '125';
                                }else{
                                strtok($gwp->data[2]->speaking, '.');
                              };?>">
                                <span class="graph__legend">w 2</span>
                              <label>
                              <?php echo strtok($gwp->data[2]->speaking, '.');?></label>
                              </li>
                            </span>

                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="
                              <?php if(strtok($gwp->data[3]->speaking, '.') > 125){
                                  echo '125';
                                }else{
                                strtok($gwp->data[3]->speaking, '.');
                              };?>">
                                <span class="graph__legend">w 3</span>
                              <label>
                              <?php echo strtok($gwp->data[3]->speaking, '.');?></label>
                              </li>
                            </span>

                            <div class="v__bar">
                              <div class="v__line"></div>
                              <div class="v__line"></div>
                              <div class="v__line"></div>
                              <div class="v__line"></div>
                              <div class="v__line"></div>
                            </div>
                        </ul>
                      </div>
                  </div>
                </div>
                <?php $appoint_id = $appointment_id; ?>
                <form name ="leaving" action="<?php echo(site_url('b2c/student/opentok/leavesession/'));?>" method="post">
                    <input type="hidden" name="appoint_id" value="<?php echo $appoint_id ?>">
                    <input type="submit" value="Leave Session" class="pure-button btn-small btn-red hidden">
                </form>
                <!-- End speaking graph -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?php echo base_url();?>assets/b2c/js/circle-progress.js"></script>
<script>
// lingkaran bulat pertama

  var innerupcoach   = '<?php echo $gsp->data->coach->points_until_today;?>';
  var innerdowncoach = '<?php echo $gsp->data->coach->points_to_pass;?>';
  var innerperccoach = innerupcoach / innerdowncoach;

var outter = $('.outter--circle.circle');
outter.circleProgress({
    startAngle: -Math.PI / 2,
    value: innerperccoach,
    lineCap: 'round',
    fill: { gradient: ['green', 'yellow'] }
});

var innerup   = '<?php echo $gsp->data->study->points_until_today;?>';
var innerdown = '<?php echo $gsp->data->total_points_to_pass;?>';
var innerperc = innerup / innerdown;

var inner = $('.inner--circle.circle');
inner.circleProgress({
    startAngle: -Math.PI / 2,
    value: innerperc,
    lineCap: 'round',
    fill: { gradient: ['#49c0fe', '#4b80fc'] }
});

// daily step progress
var step = $('.step--circle.circle');

    var stepVal = '<?php echo $gsp->data->percentage_points;?>';

    var titikVal = '<?php echo $gsp->data->percentage_days;?>';

    var newstepVal = stepVal/100;
    var newtitikVal = titikVal/100;

// var stepVal = 0.6 // circle step value
step.circleProgress({
    startAngle: -Math.PI / 2,
    value: newstepVal,
    lineCap: 'round',
    fill: { gradient: ['#5f6b8e', '#bcc2d3'] }
});
// circle step value condition to meet the goal
if (newstepVal >= newtitikVal) {
    step.circleProgress({
        fill: { gradient: ['green', 'yellow'] }
    });
}

// Source https://jsbin.com/yaqaxotete/edit?html,css,js,output
function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
    var angleInRadians = (angleInDegrees + 90);
    var dailyGoal = (angleInRadians + 360 / 100 * titikVal) * Math.PI / 180.0; //where to put the goal value
    return {
        x: centerX + (radius * Math.cos(dailyGoal)),
        y: centerY + (radius * Math.sin(dailyGoal))
    };
}

function describeArc(x, y, radius, startAngle, endAngle) {
    var start = polarToCartesian(x, y, radius, endAngle);
    var end = polarToCartesian(x, y, radius, startAngle);
    var arcSweep = endAngle - startAngle <= 180 ? "0" : "1";
    var d = [
        "M", start.x, start.y,
        "A", radius, radius, 0, arcSweep, 0, end.x, end.y
    ].join(" ");
    return d;
}

window.onload = function() {
    document.getElementById("arc1").setAttribute("d", describeArc(80, 80, 67, 180, 539));
    document.getElementById("arc2").setAttribute("d", describeArc(80, 80, 67, 180, 180));

};
</script>
<script>
var upgradeTime = '<?php echo $total_sec ?>';
var seconds = upgradeTime;
function timer() {
    var days        = Math.floor(seconds/24/60/60);
    var hoursLeft   = Math.floor((seconds) - (days*86400));
    var hours       = Math.floor(hoursLeft/3600);
    var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
    var minutes     = Math.floor(minutesLeft/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;
    }
    document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Completed";
    }else if ( seconds==300 ){
        $("#sessionalert").removeClass("hidden");
        seconds--;
    }else {
        seconds--;
    }
}
var countdownTimer = setInterval('timer()', 1000);
</script>
<script type="text/javascript">
  var secfromdb  = '<?php echo $total_sec ?>';
  var milisecond = secfromdb * 1000;
  window.setTimeout(function() {
    alert(" Your session has ended ");
    window.onbeforeunload = null;
    document.forms['leaving'].submit();
}, milisecond);
</script>

<script>
function checkShare() {
  if ($(".OT_fit-mode-contain")[0]){
    $(".boxsession__livecomponentstue").addClass("custMargin")
    // console.log($(".boxsession__livecomponentstue"));
  } else {
    $(".boxsession__livecomponentstue").removeClass("custMargin")
  }
}
setInterval('checkShare()', 1000);
</script>
