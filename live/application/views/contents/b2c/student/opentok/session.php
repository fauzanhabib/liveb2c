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
                                  height: 150, name: "a"};

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
                                        frameRate:15,
                                        height: '100%', name: "b"};
            var subscriber = session.subscribe(event.stream,
            'subscriberContainer',
            subscriberProperties,
            function (error) {
              if (error) {
                console.log(error);
              } else {
                console.log('Subscriber added.');
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

     $('#kirim').click(function(){
       var pesan = $('#pesan').val();
       var user  = '<?php echo $this->auth_manager->get_name();?>';
       console.log(user);
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
<style>
#myPublisherElementId{
  border: solid 1px;
  left: 87%;
  top: 37%;
  height: 150px;
  position: absolute;
  z-index: 1;
  width: 150px;
}
#subscriberContainer{
  height: 400px;
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
</style>
<section class="main__content">
    <div class="boxsession">
        <div class="boxsession__livestue">
          <div class="subscriber" id="subscriberContainer"><div class="publisher" id="myPublisherElementId"></div></div>
        </div>
        <div class="boxsession__livecomponentstue">
            <div class="study__dashboard__top">
                <!-- top point graph -->
                <div class="progress__point__top">
                    <h5>Points</h5>
                    <div class="graph__wrap">
                        <div class="bar__graph">
                            <ul class="graph b2">
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="25">
                            <span class="graph__legend">Now</span>
                                <label>1700</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="100">
                            <span class="graph__legend">w 1</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="55">
                            <span class="graph__legend">w 2</span>
                                <label>2100</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="85">
                            <span class="graph__legend">w 3</span>
                                <label>1900</label>
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
                                <svg id="donut_devider" class="devider-five hide">
                                    <g class="progress_border" stroke="#222a42" stroke-width="4" fill="none">
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(60 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(120 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(180 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(240 70 70)" />
                                        <line x1="70" y1="70" x2="70" y2="14" transform="rotate(300 70 70)" />
                                    </g>
                                    <circle class="progress_border" fill="#3e4d79" cx="70" cy="70" r="40" />
                                </svg>
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
                                    <div class="point__progress__info">A1</div>
                                </div>
                            </div>
                        </div>
                        <div class="progress__info__label">20.096</div>
                    </div>
                    <div class="progress__achievement">
                        <div class="study__progress__achievement">
                            <div class="bullet__achievement bg-blue-gradient"></div>
                            <div class="bullet__achievement bg-blue-gradient"></div>
                            <div class="bullet__achievement bg-blue-gradient"></div>
                            <div class="bullet__achievement bg-red-gradient"></div>
                            <div class="bullet__achievement"></div>
                            <div class="bullet__achievement"></div>
                            <div class="achievement__point__info">
                                <h5>29 K</h5>
                                <h3>Study</h3>
                            </div>
                        </div>
                        <div class="coach__progress__achievement">
                            <div class="bullet__achievement bg-green-gradient"></div>
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
                            <div class="bullet__achievement"></div>
                            <div class="achievement__point__info">
                                <h5>27 K</h5>
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
                            <li class="graph__bar__each" data-value="100" style="width: 80%; background: linear-gradient(-136deg, rgb(73, 197, 254) 0%, rgb(121, 231, 68) 92%);">
                            <span class="graph__legend">Now</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="5" style="width: 4%;">
                            <span class="graph__legend">w 1</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="75" style="width: 60%;">
                            <span class="graph__legend">w 2</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="85" style="width: 68%;">
                            <span class="graph__legend">w 3</span>
                                <label>2300</label>
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
                                <div class="step__info__label">4095</div>
                            </div>
                        </div>
                    </div>
                    <h5><font>120</font> points left</h5>
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
                            <li class="graph__bar__each" data-value="25" style="width: 20%;">
                            <span class="graph__legend">Now</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="10" style="width: 8%;">
                            <span class="graph__legend">w 1</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="90" style="width: 72%;">
                            <span class="graph__legend">w 2</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="85" style="width: 68%;">
                            <span class="graph__legend">w 3</span>
                                <label>2300</label>
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
                            <li class="graph__bar__each" data-value="25" style="width: 20%;">
                            <span class="graph__legend">Now</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="10" style="width: 8%;">
                            <span class="graph__legend">w 1</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="35" style="width: 28%;">
                            <span class="graph__legend">w 2</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="100" style="width: 80%; background: linear-gradient(-136deg, rgb(73, 197, 254) 0%, rgb(121, 231, 68) 92%);">
                            <span class="graph__legend">w 3</span>
                                <label>2300</label>
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
                            <li class="graph__bar__each" data-value="20" style="width: 16%;">
                            <span class="graph__legend">Now</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="40" style="width: 32%;">
                            <span class="graph__legend">w 1</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="95" style="width: 76%;">
                            <span class="graph__legend">w 2</span>
                                <label>2300</label>
                                </li>
                                </span>
                                <span class="graph__bar__cont">
                            <li class="graph__bar__each" data-value="125" style="width: 100%; background: linear-gradient(-136deg, rgb(73, 197, 254) 0%, rgb(121, 231, 68) 92%);">
                            <span class="graph__legend">w 3</span>
                                <label>2300</label>
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
                <!-- End speaking graph -->
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?php echo base_url();?>assets/b2c/js/circle-progress.js"></script>
<script>
var outter = $('.outter--circle.circle');
outter.circleProgress({
    startAngle: -Math.PI / 2,
    value: 0.9,
    lineCap: 'round',
    fill: { gradient: ['green', 'yellow'] }
});

var inner = $('.inner--circle.circle');
inner.circleProgress({
    startAngle: -Math.PI / 2,
    value: 0.6,
    lineCap: 'round',
    fill: { gradient: ['#49c0fe', '#4b80fc'] }
});

// daily step progress
var step = $('.step--circle.circle');
var stepVal = 0.6 // circle step value
step.circleProgress({
    startAngle: -Math.PI / 2,
    value: stepVal,
    lineCap: 'round',
    fill: { gradient: ['#5f6b8e', '#bcc2d3'] }
});
// circle step value condition to meet the goal
if (stepVal >= 0.4) {
    step.circleProgress({
        fill: { gradient: ['green', 'yellow'] }
    });
}

// Source https://jsbin.com/yaqaxotete/edit?html,css,js,output
function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
    var angleInRadians = (angleInDegrees + 90);
    var dailyGoal = (angleInRadians + 360 / 100 * 40) * Math.PI / 180.0; //where to put the goal value
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
