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
<script src="<?php echo base_url();?>assets/b2c/js/agora.js"></script>

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
     $('#pesan').val('');
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
     $('#pesan').val('');
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

@media only screen and (max-width: 568px) {
  #myPublisherElementId {
    width: 100px;
    top: 20%;
    right: 6%;
    left: auto;
  }
}
</style>
<style>
.localAgora{
  position: absolute;
  z-index: 10;
  width: 200px;
  height: 200px;
  right: 5px;
  bottom: 5px;
}
</style>
<section class="main__content">
  <div class="dashboard__notif success__notif width100perc" id="heading1">
    Waiting for <?php echo ' '.$student_name.' '; ?> to join the session. Remain in the session until the end in order to receive a refund of your tokens.
  </div>
  <div class="dashboard__notif error__notif width100perc hidden" id="camerablocked">
    Your browser is blocking your camera, please enable it and then reload the page.
  </div>

  <div id="div_device" class="panel panel-default" style="display:none;">
    <div class="select">
    <label for="audioSource">Audio source: </label><select id="audioSource"></select>
    </div>
    <div class="select">
    <label for="videoSource">Video source: </label><select id="videoSource"></select>
    </div>
    <input id="channel" type="text" value="1000" size="4"></input>
    <input id="video" type="checkbox" checked></input>
  </div>

    <div class="boxsession">
        <div>

          <h3>Remaining Time: <span id="countdown" class="timer"></span></h3>
        </div>
        <div class="boxsession__livestue" id='fullarea'>
          <!-- <div class="subscriber" id="subscriber_agora"></div>
          <div class='insideElement'>
            <div class="publisher" id="publisher_agora"></div>
            <button onclick="makeFullScreen(fullarea)" style="background:none;border:none;">
              <img class="fs-icon" src="<?php echo base_url();?>assets/icon/expand2x.png"></img>
            </button>
            <button id="videooff" class="pure-button btn-small btn-green w3-animate-opacity" onclick="javascript:toggleOff();" data-tooltip="Click to Turn Off Your Camera">Camera is On</button>
            <button id="videoon" class="pure-button btn-small btn-red w3-animate-opacity hidden" onclick="javascript:toggleOn();" data-tooltip="Click to Turn On Your Camera">Camera is Off</button>
          </div> -->
          <div id="video" style="margin:0 auto; position: relative;">
              <div id="agora_local" class="localAgora"></div>
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
                              <div class="bullet__achievement <?php echo @$mt_color['mt'.$l];?>"></div>
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
                            <li class="graph__bar__each" data-value="<?php if($gwp->data[0]->comprehension_grammar >125){echo "125";}else{echo $gwp->data[0]->comprehension_grammar;}?>" style="width: 80%; background: linear-gradient(-136deg, rgb(73, 197, 254) 0%, rgb(121, 231, 68) 92%);">
                            <span class="graph__legend">Now</span>
                                <label><?php echo strtok($gwp->data[0]->comprehension_grammar, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php if($gwp->data[1]->comprehension_grammar >125){echo "125";}else{echo $gwp->data[1]->comprehension_grammar;}?>" style="width: 4%;">
                            <span class="graph__legend">w 1</span>
                                <label><?php echo strtok($gwp->data[1]->comprehension_grammar, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php if($gwp->data[2]->comprehension_grammar >125){echo "125";}else{echo $gwp->data[2]->comprehension_grammar;}?>" style="width: 60%;">
                            <span class="graph__legend">w 2</span>
                                <label><?php echo strtok($gwp->data[2]->comprehension_grammar, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php if($gwp->data[3]->comprehension_grammar >125){echo "125";}else{echo $gwp->data[3]->comprehension_grammar;}?>" style="width: 68%;">
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
                            <div class="step__progress__info" style="top: 0px !important;left: 0px !important;">
                                <!-- <div class="step__info__label"><?php echo @$gsp->data->total_points_until_today;?></div> -->
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                           viewBox="0 0 61.8 61.8" style="enable-background:new 0 0 61.8 61.8;" xml:space="preserve">
                                  <style type="text/css">
                                      .st0{fill:#49C5FE;}
                                      .st1{fill:#49C5FE;stroke:#49C5FE;stroke-miterlimit:10;}
                                  </style>
                                  <title>icHelp</title>
                                  <desc>Created with Sketch.</desc>
                                  <title>icHelp</title>
                                  <desc>Created with Sketch.</desc>
                                  <g>
                                      <g>
                                          <g>
                                              <g>
                                                  <path class="st0" d="M37.1,27.9c-0.7,0-1.2-0.6-1.2-1.3v-1.1c0-0.7,0.6-1.3,1.2-1.3h7.3c0.7,0,1.2,0.6,1.2,1.3v1.1
                                                      c0,0.7-0.6,1.3-1.2,1.3H37.1z M37.1,24.9c-0.3,0-0.5,0.3-0.5,0.6v1.1c0,0.3,0.2,0.6,0.5,0.6h7.3c0.3,0,0.5-0.3,0.5-0.6v-1.1
                                                      c0-0.3-0.2-0.6-0.5-0.6H37.1z"/>
                                                  <path class="st0" d="M44.4,24.3c0.6,0,1.1,0.6,1.1,1.2v1.1c0,0.7-0.5,1.2-1.1,1.2h-7.3c-0.6,0-1.1-0.6-1.1-1.2v-1.1
                                                      c0-0.7,0.5-1.2,1.1-1.2H44.4 M37.1,27.3h7.3c0.3,0,0.6-0.3,0.6-0.7v-1.1c0-0.4-0.3-0.7-0.6-0.7h-7.3c-0.3,0-0.6,0.3-0.6,0.7v1.1
                                                      C36.4,27,36.7,27.3,37.1,27.3 M44.4,24.1h-7.3c-0.7,0-1.3,0.6-1.3,1.4v1.1c0,0.8,0.6,1.4,1.3,1.4h7.3c0.7,0,1.3-0.6,1.3-1.4
                                                      v-1.1C45.7,24.7,45.1,24.1,44.4,24.1L44.4,24.1z M37.1,27.1c-0.2,0-0.4-0.2-0.4-0.5v-1.1c0-0.3,0.2-0.5,0.4-0.5h7.3
                                                      c0.2,0,0.4,0.2,0.4,0.5v1.1c0,0.3-0.2,0.5-0.4,0.5H37.1L37.1,27.1z"/>
                                              </g>
                                          </g>
                                          <g>
                                              <g>
                                                  <path class="st0" d="M37.1,32.2c-0.7,0-1.2-0.6-1.2-1.3v-1.1c0-0.7,0.6-1.3,1.2-1.3h8.7c0.7,0,1.2,0.6,1.2,1.3v1.1
                                                      c0,0.7-0.6,1.3-1.2,1.3H37.1z M37.1,29.2c-0.3,0-0.5,0.3-0.5,0.6v1.1c0,0.3,0.2,0.6,0.5,0.6h8.7c0.3,0,0.5-0.3,0.5-0.6v-1.1
                                                      c0-0.3-0.2-0.6-0.5-0.6H37.1z"/>
                                                  <path class="st0" d="M45.8,28.6c0.6,0,1.1,0.6,1.1,1.2v1.1c0,0.7-0.5,1.2-1.1,1.2h-8.7c-0.6,0-1.1-0.6-1.1-1.2v-1.1
                                                      c0-0.7,0.5-1.2,1.1-1.2H45.8 M37.1,31.6h8.7c0.3,0,0.6-0.3,0.6-0.7v-1.1c0-0.4-0.3-0.7-0.6-0.7h-8.7c-0.3,0-0.6,0.3-0.6,0.7v1.1
                                                      C36.5,31.3,36.8,31.6,37.1,31.6 M45.8,28.4h-8.7c-0.7,0-1.3,0.6-1.3,1.4v1.1c0,0.8,0.6,1.4,1.3,1.4h8.7c0.7,0,1.3-0.6,1.3-1.4
                                                      v-1.1C47.1,29,46.5,28.4,45.8,28.4L45.8,28.4z M37.1,31.4c-0.2,0-0.4-0.2-0.4-0.5v-1.1c0-0.3,0.2-0.5,0.4-0.5h8.7
                                                      c0.2,0,0.4,0.2,0.4,0.5v1.1c0,0.3-0.2,0.5-0.4,0.5H37.1L37.1,31.4z"/>
                                              </g>
                                          </g>
                                          <g>
                                              <g>
                                                  <path class="st0" d="M37.1,36.5c-0.7,0-1.2-0.6-1.2-1.3v-1.1c0-0.7,0.6-1.3,1.2-1.3h7.3c0.7,0,1.2,0.6,1.2,1.3v1.1
                                                      c0,0.7-0.6,1.3-1.2,1.3H37.1z M37.1,33.5c-0.3,0-0.5,0.3-0.5,0.6v1.1c0,0.3,0.2,0.6,0.5,0.6h7.3c0.3,0,0.5-0.3,0.5-0.6v-1.1
                                                      c0-0.3-0.2-0.6-0.5-0.6H37.1z"/>
                                                  <path class="st0" d="M44.4,32.8c0.6,0,1.1,0.6,1.1,1.2v1.1c0,0.7-0.5,1.2-1.1,1.2h-7.3c-0.6,0-1.1-0.6-1.1-1.2v-1.1
                                                      c0-0.7,0.5-1.2,1.1-1.2H44.4 M37.1,35.8h7.3c0.3,0,0.6-0.3,0.6-0.7v-1.1c0-0.4-0.3-0.7-0.6-0.7h-7.3c-0.3,0-0.6,0.3-0.6,0.7v1.1
                                                      C36.4,35.5,36.7,35.8,37.1,35.8 M44.4,32.6h-7.3c-0.7,0-1.3,0.6-1.3,1.4v1.1c0,0.8,0.6,1.4,1.3,1.4h7.3c0.7,0,1.3-0.6,1.3-1.4
                                                      v-1.1C45.7,33.3,45.1,32.6,44.4,32.6L44.4,32.6z M37.1,35.6c-0.2,0-0.4-0.2-0.4-0.5v-1.1c0-0.3,0.2-0.5,0.4-0.5h7.3
                                                      c0.2,0,0.4,0.2,0.4,0.5v1.1c0,0.3-0.2,0.5-0.4,0.5H37.1L37.1,35.6z"/>
                                              </g>
                                          </g>
                                          <g>
                                              <g>
                                                  <path class="st0" d="M37.3,40.7c-0.7,0-1.2-0.6-1.2-1.3v-1.1c0-0.7,0.6-1.3,1.2-1.3h4.2c0.7,0,1.2,0.6,1.2,1.3v1.1
                                                      c0,0.7-0.6,1.3-1.2,1.3H37.3z M37.3,37.7c-0.3,0-0.5,0.3-0.5,0.6v1.1c0,0.3,0.2,0.6,0.5,0.6h4.2c0.3,0,0.5-0.3,0.5-0.6v-1.1
                                                      c0-0.3-0.2-0.6-0.5-0.6H37.3z"/>
                                                  <path class="st0" d="M41.4,37.1c0.6,0,1.1,0.6,1.1,1.2v1.1c0,0.7-0.5,1.2-1.1,1.2h-4.2c-0.6,0-1.1-0.6-1.1-1.2v-1.1
                                                      c0-0.7,0.5-1.2,1.1-1.2H41.4 M37.3,40.1h4.2c0.3,0,0.6-0.3,0.6-0.7v-1.1c0-0.4-0.3-0.7-0.6-0.7h-4.2c-0.3,0-0.6,0.3-0.6,0.7v1.1
                                                      C36.6,39.8,36.9,40.1,37.3,40.1 M41.4,36.9h-4.2c-0.7,0-1.3,0.6-1.3,1.4v1.1c0,0.8,0.6,1.4,1.3,1.4h4.2c0.7,0,1.3-0.6,1.3-1.4
                                                      v-1.1C42.8,37.5,42.2,36.9,41.4,36.9L41.4,36.9z M37.3,39.9c-0.2,0-0.4-0.2-0.4-0.5v-1.1c0-0.3,0.2-0.5,0.4-0.5h4.2
                                                      c0.2,0,0.4,0.2,0.4,0.5v1.1c0,0.3-0.2,0.5-0.4,0.5H37.3L37.3,39.9z"/>
                                              </g>
                                          </g>
                                          <g>
                                              <g>
                                                  <path class="st0" d="M30.5,41.1c-2.3,0-4.3-0.6-5.7-1.1c-1.1-0.4-1.9-1.7-1.9-3.1v-8.3c0-1.2,0.7-2.2,1.7-2.7
                                                      c2.1-0.9,2.6-3.7,2.6-4.6c0-1.9,0.4-3.3,1.2-4c0.4-0.4,0.9-0.6,1.5-0.6c0.2,0,0.4,0,0.5,0.1c0.5,0.1,0.9,0.4,1.2,1
                                                      c1.1,1.9,0.4,5.9,0.2,7.3h3.2c0.2,0,0.3,0.2,0.3,0.4s-0.2,0.4-0.3,0.4h-3.6c-0.1,0-0.2-0.1-0.3-0.1c-0.1-0.1-0.1-0.2-0.1-0.3
                                                      c0-0.1,1.1-5.3,0-7.2c-0.2-0.4-0.5-0.6-0.8-0.6c-0.1,0-0.3,0-0.4,0c-0.4,0-0.7,0.1-1,0.4c-0.6,0.6-0.9,1.8-0.9,3.5
                                                      c0,1.1-0.5,4.3-3,5.3c-0.7,0.3-1.2,1.1-1.2,2v8.3c0,1.1,0.6,2,1.5,2.4c1.3,0.5,3.2,1.1,5.4,1.1c1.6,0,3-0.3,4.3-0.9
                                                      c0,0,0.1,0,0.1,0c0.1,0,0.3,0.1,0.3,0.2c0.1,0.2,0,0.4-0.2,0.5C33.7,40.8,32.1,41.1,30.5,41.1z"/>
                                                  <path class="st0" d="M29.8,16.7c0.2,0,0.3,0,0.5,0.1c0.5,0.1,0.9,0.4,1.2,0.9c1.1,1.9,0.4,6.1,0.2,7.4h3.3
                                                      c0.1,0,0.2,0.1,0.2,0.3c0,0.2-0.1,0.3-0.2,0.3h-3.6c-0.1,0-0.1,0-0.2-0.1c0-0.1-0.1-0.2,0-0.2c0-0.1,1.1-5.3,0-7.3
                                                      c-0.2-0.4-0.5-0.6-0.9-0.7c-0.1,0-0.3,0-0.4,0c-0.4,0-0.8,0.1-1.1,0.4c-0.6,0.6-1,1.8-1,3.5c0,1.1-0.5,4.2-2.9,5.3
                                                      c-0.8,0.3-1.3,1.1-1.3,2.1v8.3c0,1.1,0.6,2.1,1.5,2.5c1.3,0.5,3.3,1.1,5.5,1.1c1.4,0,2.9-0.2,4.4-0.9c0,0,0.1,0,0.1,0
                                                      c0.1,0,0.2,0.1,0.2,0.2c0.1,0.1,0,0.3-0.1,0.4c-1.5,0.7-3.1,1-4.6,1c-2.3,0-4.3-0.6-5.6-1.1c-1.1-0.4-1.9-1.6-1.9-3v-8.3
                                                      c0-1.1,0.6-2.2,1.6-2.6c2.1-0.9,2.6-3.8,2.6-4.7c0-1.9,0.4-3.3,1.1-4C28.8,16.9,29.2,16.7,29.8,16.7 M29.8,16.5
                                                      c-0.6,0-1.1,0.2-1.5,0.6c-0.8,0.8-1.2,2.2-1.2,4.1c0,0.9-0.5,3.7-2.5,4.6c-1,0.5-1.7,1.5-1.7,2.8v8.3c0,1.4,0.8,2.7,2,3.2
                                                      c1.3,0.5,3.4,1.1,5.7,1.1c1.7,0,3.2-0.3,4.7-1c0.2-0.1,0.3-0.4,0.2-0.6c-0.1-0.2-0.2-0.3-0.4-0.3c-0.1,0-0.1,0-0.2,0
                                                      c-1.3,0.6-2.7,0.9-4.3,0.9c-2.2,0-4.1-0.6-5.4-1.1c-0.8-0.3-1.4-1.2-1.4-2.3v-8.3c0-0.8,0.5-1.6,1.2-1.9
                                                      c2.5-1.1,3.1-4.3,3.1-5.4c0-1.7,0.3-2.8,0.9-3.4c0.3-0.3,0.6-0.4,0.9-0.4c0.1,0,0.3,0,0.4,0c0.3,0.1,0.5,0.3,0.7,0.6
                                                      c1.1,1.9,0,7.1,0,7.2c0,0.1,0,0.3,0.1,0.4c0.1,0.1,0.2,0.2,0.4,0.2h3.6c0.2,0,0.4-0.2,0.4-0.5c0-0.3-0.2-0.5-0.4-0.5h-3
                                                      c0.3-1.5,0.8-5.4-0.2-7.3c-0.3-0.6-0.8-0.9-1.3-1C30.1,16.5,29.9,16.5,29.8,16.5L29.8,16.5z"/>
                                              </g>
                                          </g>
                                          <g>
                                              <g>
                                                  <path class="st0" d="M17.7,40.6c-0.8,0-1.5-0.7-1.5-1.6v-11c0-0.9,0.7-1.6,1.5-1.6h2.9c0.8,0,1.5,0.7,1.5,1.6v11
                                                      c0,0.9-0.7,1.6-1.5,1.6H17.7z M17.7,27c-0.5,0-0.9,0.4-0.9,0.9v11c0,0.5,0.4,0.9,0.9,0.9h2.9c0.5,0,0.9-0.4,0.9-0.9v-11
                                                      c0-0.5-0.4-0.9-0.9-0.9H17.7z"/>
                                                  <path class="st0" d="M20.7,26.3c0.8,0,1.4,0.7,1.4,1.5v11c0,0.9-0.6,1.5-1.4,1.5h-2.9c-0.8,0-1.4-0.7-1.4-1.5v-11
                                                      c0-0.9,0.6-1.5,1.4-1.5H20.7 M17.7,39.9h2.9c0.5,0,1-0.5,1-1v-11c0-0.6-0.4-1-1-1h-2.9c-0.5,0-1,0.5-1,1v11
                                                      C16.8,39.5,17.2,39.9,17.7,39.9 M20.7,26.2h-2.9c-0.9,0-1.6,0.8-1.6,1.7v11c0,1,0.7,1.7,1.6,1.7h2.9c0.9,0,1.6-0.8,1.6-1.7v-11
                                                      C22.3,26.9,21.6,26.2,20.7,26.2L20.7,26.2z M17.7,39.7c-0.4,0-0.8-0.4-0.8-0.8v-11c0-0.5,0.3-0.8,0.8-0.8h2.9
                                                      c0.4,0,0.8,0.4,0.8,0.8v11c0,0.5-0.3,0.8-0.8,0.8H17.7L17.7,39.7z"/>
                                              </g>
                                          </g>
                                      </g>
                                  </g>
                              </svg>
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
                            <li class="graph__bar__each" data-value="<?php if($gwp->data[0]->pronunciation >125){echo "125";}else{echo $gwp->data[0]->pronunciation;}?>" style="width: 20%;">
                            <span class="graph__legend">Now</span>
                                <label><?php echo strtok($gwp->data[0]->pronunciation, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php if($gwp->data[1]->pronunciation >125){echo "125";}else{echo $gwp->data[1]->pronunciation;}?>" style="width: 8%;">
                            <span class="graph__legend">w 1</span>
                                <label><?php echo strtok($gwp->data[1]->pronunciation, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php if($gwp->data[2]->pronunciation >125){echo "125";}else{echo $gwp->data[2]->pronunciation;}?>" style="width: 72%;">
                            <span class="graph__legend">w 2</span>
                                <label><?php echo strtok($gwp->data[2]->pronunciation, '.');?></label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="<?php if($gwp->data[3]->pronunciation >125){echo "125";}else{echo $gwp->data[3]->pronunciation;}?>" style="width: 68%;">
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
                              <li class="graph__bar__each" data-value="<?php if($gwp->data[0]->listening >125){echo "125";}else{echo $gwp->data[0]->listening;}?>">
                                <span class="graph__legend">Now</span>
                              <label><?php echo strtok($gwp->data[0]->listening, '.');?></label>
                              </li>
                            </span>

                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="<?php if($gwp->data[1]->listening >125){echo "125";}else{echo $gwp->data[1]->listening;}?>">
                                <span class="graph__legend">w 1</span>
                              <label><?php echo strtok($gwp->data[1]->listening, '.');?></label>
                              </li>
                            </span>

                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="<?php if($gwp->data[2]->listening >125){echo "125";}else{echo $gwp->data[2]->listening;}?>">
                                <span class="graph__legend">w 2</span>
                              <label><?php echo strtok($gwp->data[2]->listening, '.');?></label>
                              </li>
                            </span>

                            <span class="graph__bar__cont">
                              <li class="graph__bar__each" data-value="<?php if($gwp->data[3]->listening >125){echo "125";}else{echo $gwp->data[3]->listening;}?>">
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

<script language="javascript">

  if(!AgoraRTC.checkSystemRequirements()) {
    alert("browser is no support webRTC");
  }

  /* select Log type */
  // AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.NONE);
  // AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.ERROR);
  // AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.WARNING);
  // AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.INFO);
  // AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.DEBUG);

  /* simulated data to proof setLogLevel() */
  // AgoraRTC.Logger.error('this is error');
  // AgoraRTC.Logger.warning('this is warning');
  // AgoraRTC.Logger.info('this is info');
  // AgoraRTC.Logger.debug('this is debug');

  var client, localStream, camera, microphone;

  var audioSelect = document.querySelector('select#audioSource');
  var videoSelect = document.querySelector('select#videoSource');

  // function join() {
    var app_id = 'ddb77ae4ffb344949b1f95a34b7f9ae0';
    // document.getElementById("join").disabled = true;
    document.getElementById("video").disabled = true;
    var channel_key  = null;
    var channel_name = "<?php echo $sessionId; ?>";
    // console.log("Ch Name = " + channel_name);
    // console.log("Init AgoraRTC client with vendor key: " + app_id);
    client = AgoraRTC.createClient({mode: 'interop'});
    client.init(app_id, function () {
      // console.log("AgoraRTC client initialized");
      client.join(channel_key, channel_name, null, function(uid) {
        // console.log("User " + channel_key + " join channel successfully");
        // console.log("=====================================");
        // console.log("Channel Key = " + channel_key);
        // console.log("Channel Value = " + channel.value);
        // console.log("UID = " + uid);
        // console.log("Ch Name = " + channel_name);
        // console.log("=====================================");

        if (document.getElementById("video").checked) {
          camera = videoSource.value;
          microphone = audioSource.value;
          localStream = AgoraRTC.createStream({streamID: uid, audio: true, cameraId: camera, microphoneId: microphone, video: document.getElementById("video").checked, screen: false});
          //localStream = AgoraRTC.createStream({streamID: uid, audio: false, cameraId: camera, microphoneId: microphone, video: false, screen: true, extensionId: 'minllpmhdgpndnkomcoccfekfegnlikg'});
          if (document.getElementById("video").checked) {
            localStream.setVideoProfile('240P');

          }

          // The user has granted access to the camera and mic.
          localStream.on("accessAllowed", function() {
            // console.log("accessAllowed");
          });

          // The user has denied access to the camera and mic.
          localStream.on("accessDenied", function() {
            // console.log("accessDenied");
          });

          localStream.init(function() {
            // console.log("getUserMedia successfully");
            localStream.play('agora_local');

            client.publish(localStream, function (err) {
              // console.log("Publish local stream error: " + err);
            });

            client.on('stream-published', function (evt) {
              // console.log("Publish local stream successfully");
            });
          }, function (err) {
            // console.log("getUserMedia failed", err);
          });
        }
      }, function(err) {
        // console.log("Join channel failed", err);
      });
    }, function (err) {
      // console.log("AgoraRTC client init failed", err);
    });

    channelKey = "";
    client.on('error', function(err) {
      // console.log("Got error msg:", err.reason);
      if (err.reason === 'DYNAMIC_KEY_TIMEOUT') {
        client.renewChannelKey(channelKey, function(){
          // console.log("Renew channel key successfully");
        }, function(err){
          // console.log("Renew channel key failed: ", err);
        });
      }
    });


    client.on('stream-added', function (evt) {
      var stream = evt.stream;
      // console.log("New stream added: " + stream.getId());
      // console.log("Subscribe ", stream);
      client.subscribe(stream, function (err) {
        // console.log("Subscribe stream failed", err);
      });
    });

    client.on('stream-subscribed', function (evt) {
      var stream = evt.stream;
      // console.log("Subscribe remote stream successfully: " + stream.getId());
      if ($('div#video #agora_remote'+stream.getId()).length === 0) {
        $('div#video').append('<div id="agora_remote'+stream.getId()+'" style="width:100%;height:330px;"></div>');
        // $('video#video'+stream.getId()).addClass('subscriber_video');
        // $('video#video'+stream.getId()).hide();
        // var video = document.getElementsByTagName("video")[0];
        console.log(video);
      }
      stream.play('agora_remote' + stream.getId());
    });

    client.on('stream-removed', function (evt) {
      var stream = evt.stream;
      stream.stop();
      $('#agora_remote' + stream.getId()).remove();
      // console.log("Remote stream is removed " + stream.getId());
    });

    client.on('peer-leave', function (evt) {
      var stream = evt.stream;
      if (stream) {
        stream.stop();
        $('#agora_remote' + stream.getId()).remove();
        // console.log(evt.uid + " leaved from this channel");
      }
    });
  // }

  function leave() {
    document.getElementById("leave").disabled = true;
    client.leave(function () {
      // console.log("Leavel channel successfully");
    }, function (err) {
      // console.log("Leave channel failed");
    });
  }

  function publish() {
    document.getElementById("publish").disabled = true;
    document.getElementById("unpublish").disabled = false;
    client.publish(localStream, function (err) {
      // console.log("Publish local stream error: " + err);
    });
  }

  function unpublish() {
    document.getElementById("publish").disabled = false;
    document.getElementById("unpublish").disabled = true;
    client.unpublish(localStream, function (err) {
      // console.log("Unpublish local stream failed" + err);
    });
  }

  function getDevices() {
    AgoraRTC.getDevices(function (devices) {
      for (var i = 0; i !== devices.length; ++i) {
        var device = devices[i];
        var option = document.createElement('option');
        option.value = device.deviceId;
        if (device.kind === 'audioinput') {
          option.text = device.label || 'microphone ' + (audioSelect.length + 1);
          audioSelect.appendChild(option);
        } else if (device.kind === 'videoinput') {
          option.text = device.label || 'camera ' + (videoSelect.length + 1);
          videoSelect.appendChild(option);
        } else {
          // console.log('Some other kind of source/device: ', device);
        }
      }
    });
  }

  //audioSelect.onchange = getDevices;
  //videoSelect.onchange = getDevices;
  getDevices();
</script>
<script>
  var appointment_id = "<?php echo $appointment_id; ?>";
  $.post("<?php echo site_url('opentok/live/store_session');?>", { 'appointment_id': appointment_id },function(data) {
    stat_first = data;
    // console.log("==============================");
    console.log(stat_first);
    if (stat_first == 1) {
      closetab();
    }
  });
  var appointment_id = "<?php echo $appointment_id; ?>";
  var stat_check;

  var checksess = setInterval(function() {
    $.post("<?php echo site_url('opentok/live/check_sess');?>", { 'appointment_id': appointment_id },function(data) {
      stat_check = data;
      console.log("==============================");
      console.log(stat_check);
      if (stat_check == 0 || stat_check == '') {
        closetab();
      }
    });
  }, 5000);
  function closetab() {
      clearInterval(checksess);
      window.onbeforeunload = null;
      alert("You're trying to open Live Session in multiple tabs/windows. This page will be closed.");
      window.location.href = "<?php echo site_url('opentok/multiple'); ?>";
    }
</script>
