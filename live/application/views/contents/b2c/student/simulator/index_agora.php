<html>
  <head>
    <title>Neo - Network Test</title>
    <script src="<?php echo base_url();?>assets/b2c/js/AgoraRTCSDK-2.2.0.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link href="<?php echo base_url();?>assets/simulator/styles.css" rel="stylesheet">
  </head>
  <body style="background:#2d3b5e;color:white;">
  <style>
    #agora_local{
      width: 80% !important;
      height: 100% !important;
      margin-top: 50px;
      float: none !important;
    }
    #notAllowed{
      padding: 10px 15px;
      background: #a74e4e;
      border-radius: 5px;
      letter-spacing: 1px;
      font-size: 12px;
    }
    #Allowed{
      padding: 10px 15px;
      background: #4ea78a;
      border-radius: 5px;
      letter-spacing: 1px;
      font-size: 12px;
    }
  </style>

  <div class="header_sim child-order" style="padding: 10px 20px;text-align: center;">
    <img src="<?php echo base_url().'/'.('assets/b2c/img/logo_newneo.svg'); ?>" style="width: 153px;height: 74;">
  </div>
  <div class="child-order" style="text-align: center;background: #1b2338;padding-top: 50px;">

    <div id="div_device" class="panel panel-default" style="margin-bottom: 40px;">
      <div class="select">
        <label for="audioSource">Audio source: </label><select id="audioSource"></select>
      </div>
      <div class="select">
        <label for="videoSource">Video source: </label><select id="videoSource"></select>
      </div>
    </div>

    <div id="div_join" class="panel panel-default">
      <div class="panel-body">
        <input id="appId" type="hidden" value="ddb77ae4ffb344949b1f95a34b7f9ae0" size="36"></input>
        <input id="channel" type="hidden" value="1000" size="4"></input>
        <input id="video" type="checkbox" checked style="display:none;"></input>
        <button id="join" class="btn btn-primary" onclick="join()" style="display:none;">Test</button>
        <!-- <button id="leave" class="btn btn-primary" onclick="leave()">Leave</button>
        <button id="publish" class="btn btn-primary" onclick="publish()">Publish</button>
        <button id="unpublish" class="btn btn-primary" onclick="unpublish()">Unpublish</button> -->
      </div>
    </div>

    <font id="notAllowed" style="display: none;">Your browser is blocking the camera. Please allow browser to access camera.</font>
    <font id="Allowed" style="display: none;">You're able to run the session</font>

    <div id="video" style="margin:0 auto;">
        <div id="agora_local" style="float:right;width:210px;height:147px;display:inline-block;"></div>
    </div>

  </div>

<script>
var modal = document.getElementById('myModal');
var btn   = document.getElementById("allowcamera");
var span  = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
  var objDiv = document.getElementById("resultvideo");
  objDiv.scrollTop = objDiv.scrollHeight;
</script>

<script>
  if(!AgoraRTC.checkSystemRequirements()) {
  alert("Your browser does not support WebRTC!");
  }
  checksystem = AgoraRTC.checkSystemRequirements();
  /* select Log type */
  // AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.NONE);
  // AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.ERROR);
  // AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.WARNING);
  // AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.INFO);
  // AgoraRTC.Logger.setLogLevel(AgoraRTC.Logger.DEBUG);
  /* simulated data to proof setLogLevel() */
  AgoraRTC.Logger.error('this is error');
  AgoraRTC.Logger.warning('this is warning');
  AgoraRTC.Logger.info('this is info');
  AgoraRTC.Logger.debug('this is debug');
  var client, localStream, camera, microphone;
  var audioSelect = document.querySelector('select#audioSource');
  var videoSelect = document.querySelector('select#videoSource');

  join();

  function join() {
    document.getElementById("join").disabled = true;
    document.getElementById("video").disabled = true;
    var channel_key = null;
    console.log("Init AgoraRTC client with App ID: " + appId.value);
    client = AgoraRTC.createClient({mode: 'interop'});
    client.init(appId.value, function () {
      console.log("AgoraRTC client initialized");
      client.join(channel_key, channel.value, null, function(uid) {
        console.log("User " + uid + " join channel successfully");
        if (document.getElementById("video").checked) {
          camera = videoSource.value;
          microphone = audioSource.value;
          localStream = AgoraRTC.createStream({streamID: uid, audio: true, cameraId: camera, microphoneId: microphone, video: document.getElementById("video").checked, screen: false});
          //localStream = AgoraRTC.createStream({streamID: uid, audio: false, cameraId: camera, microphoneId: microphone, video: false, screen: true, extensionId: 'minllpmhdgpndnkomcoccfekfegnlikg'});
          if (document.getElementById("video").checked) {
            localStream.setVideoProfile('720p_3');
          }
          // The user has granted access to the camera and mic.
          localStream.on("accessAllowed", function() {
            console.log("accessAllowed");
          });
          // The user has denied access to the camera and mic.
          localStream.on("accessDenied", function() {
            console.log("accessDenied");
          });
          localStream.init(function() {
            console.log("getUserMedia successfully");
            localStream.play('agora_local');
            client.publish(localStream, function (err) {
              console.log("Publish local stream error: " + err);
            });
            client.on('stream-published', function (evt) {
              console.log("Publish local stream successfully");
              $("#Allowed").show();
            });
          }, function (err) {
            console.log("getUserMedia failed", err);
            if(err.msg == "NotAllowedError"){
              $("#notAllowed").show();
            }else{}
          });
        }
      }, function(err) {
        console.log("Join channel failed", err);
      });
    }, function (err) {
      console.log("AgoraRTC client init failed", err);
    });
    channelKey = "";
    client.on('error', function(err) {
      console.log("Got error msg:", err.reason);
      if (err.reason === 'DYNAMIC_KEY_TIMEOUT') {
        client.renewChannelKey(channelKey, function(){
          console.log("Renew channel key successfully");
        }, function(err){
          console.log("Renew channel key failed: ", err);
        });
      }
    });
    client.on('stream-added', function (evt) {
      var stream = evt.stream;
      console.log("New stream added: " + stream.getId());
      console.log("Subscribe ", stream);
      client.subscribe(stream, function (err) {
        console.log("Subscribe stream failed", err);
      });
    });
    client.on('stream-subscribed', function (evt) {
      var stream = evt.stream;
      console.log("Subscribe remote stream successfully: " + stream.getId());
      if ($('div#video #agora_remote'+stream.getId()).length === 0) {
        $('div#video').append('<div id="agora_remote'+stream.getId()+'" style="float:left; width:810px;height:607px;display:inline-block;"></div>');
      }
      stream.play('agora_remote' + stream.getId());
    });
    client.on('stream-removed', function (evt) {
      var stream = evt.stream;
      stream.stop();
      $('#agora_remote' + stream.getId()).remove();
      console.log("Remote stream is removed " + stream.getId());
    });
    client.on('peer-leave', function (evt) {
      var stream = evt.stream;
      if (stream) {
        stream.stop();
        $('#agora_remote' + stream.getId()).remove();
        console.log(evt.uid + " leaved from this channel");
      }
    });
  }
  function leave() {
    document.getElementById("leave").disabled = true;
    client.leave(function () {
      console.log("Leavel channel successfully");
    }, function (err) {
      console.log("Leave channel failed");
    });
  }
  function publish() {
    document.getElementById("publish").disabled = true;
    document.getElementById("unpublish").disabled = false;
    client.publish(localStream, function (err) {
      console.log("Publish local stream error: " + err);
    });
  }
  function unpublish() {
    document.getElementById("publish").disabled = false;
    document.getElementById("unpublish").disabled = true;
    client.unpublish(localStream, function (err) {
      console.log("Unpublish local stream failed" + err);
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
          console.log('Some other kind of source/device: ', device);
        }
      }
    });
  }

  getDevices();
</script>

<script>
	function get_browser() {
	    var ua=navigator.userAgent,tem,M=ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
	    if(/trident/i.test(M[1])){
	        tem=/\brv[ :]+(\d+)/g.exec(ua) || [];
	        return {name:'IE',version:(tem[1]||'')};
	        }
	    if(M[1]==='Chrome'){
	        tem=ua.match(/\bOPR|Edge\/(\d+)/)
	        if(tem!=null)   {return {name:'Opera', version:tem[1]};}
	        }
	    M=M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
	    if((tem=ua.match(/version\/(\d+)/i))!=null) {M.splice(1,1,tem[1]);}
	    return {
	      name: M[0],
	      version: M[1]
	    };
	}

	var browser=get_browser();
	// console.log(browser);
	if(browser.name == "Chrome" || browser.name == "Firefox"){
		$('#browinfo').text(browser.name + ' v.' + browser.version);
		if(browser.name == "Chrome" && browser.version < 61){
			$('#browmess').append('Your Chrome browser is <font style="color:#ba3a3a;font-weight:600;">outdated</font>. Please update by clicking <a href="https://www.google.com/chrome/browser/desktop/index.html" style="text-decoration: underline;">this link</a> then run this page again after you have updated.');
		}else if(browser.name == "Chrome" && browser.version >= 61){
			$('#browmess').append('Your Chrome is able to run session <a style="color: #58ba84;">&#x2714;</a>');
		}else if(browser.name == "Firefox" && browser.version < 53){
			$('#browmess').append('Your Firefox browser is <font style="color:#ba3a3a;font-weight:600;">outdated</font>. Please update by clicking <a href="https://www.mozilla.org/en-US/firefox/new/" style="text-decoration: underline;">this link</a> then run this page again after you have updated.');
		}else if(browser.name == "Firefox" && browser.version >= 53){
			$('#browmess').append('Your Firefox is able to run session <a style="color: #58ba84;">&#x2714;</a>');
		}
	}else if(browser.name == "Safari"){
    $('#browinfo').text(browser.name + ' v.' + browser.version);
    if(browser.version < 11){
			$('#browmess').append('Your Safari browser is <font style="color:#ba3a3a;font-weight:600;">outdated</font>. Please update by clicking <a href="https://www.google.com/chrome/browser/desktop/index.html" style="text-decoration: underline;">this link</a> then run this page again after you have updated.');
		}else if(browser.version >= 11){
			$('#browmess').append('Your Safari is able to run session <a style="color: #58ba84;">&#x2714;</a>');
		}
  }else{
		$('#browinfo').text(browser.name + ' v.' + browser.version);
		$('#browmess').append('Your browser <font style="color:#ba3a3a;font-weight:600;">does NOT</font> support LIVE Session, please only use latest version of <a href="https://www.google.com/chrome/browser/desktop/index.html" style="text-decoration: underline;">Chrome</a> or <a href="https://www.mozilla.org/en-US/firefox/new/" style="text-decoration: underline;">Firefox</a>');
	}
</script>
</body>
</html>
