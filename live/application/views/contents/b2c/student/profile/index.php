<style>
*:focus {
   outline: 0;
 }
.div_upd{
  margin-top:0px !important;border-top:0px !important;
}
.switchText1{
  width: 80%;
  min-height: 19px;
}
.grayed{
  color:#606983;
}
.btn_save{
  cursor: pointer;
}
.btn_cancel{
  cursor: pointer;
  margin-left: 5px;
}
.notifSuccess{
  position: fixed;
  background-color: rgba(38, 178, 161, 0.7) !important;
  z-index: 2;
  width: 30%;
  transform: translateX(-50%);
  left: 50%;
}
.notifFailed{
  position: fixed;
  background-color: rgba(165, 56, 83, 0.75) !important;
  z-index: 2;
  width: 30%;
}
.conv_lang{
  max-height: 20px;
    overflow: auto;
}
.dropGender{
  border: solid 1px #606983;
  color: white;
  width: 50%;
  background: none;
  letter-spacing: 1px;
  font-size: 11px;
  border-radius: 5px;
  -moz-appearance: none;
}
.optGender{
  color: black;
}
.profile__additional__language .language-dropdown .lang-flag{
   width:252px;
}
.language-dropdown .lang-flag .flag, .language-dropdown .lang-list .lang .flag{
  display:none;
}
.bxarrow .arrow{
  left:86px;
}
.profile__additional__language .language-dropdown ul li{
  width:252px;
}
.lang-flag .title1{
  width: 57% !important;
}
.lang .title2{
  width: 57% !important;
}
.GridFlex{
  display:flex;
  flex-wrap:wrap;
  justify-content: center;
}
 .header__profile {
    -webkit-box-flex: 1.1;
    -ms-flex: 1.1;
    flex: 1.1;
  }

@media only screen and (max-device-width: 768px) and (min-device-width: 320px){
  .mobile__menu {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
  }
}
</style>
  <div class="dashboard__notif notifSuccess" id='successNotif' style="display:none !important;">
      <span id='textNotif' class="GridFlex"></span>
  </div>
  <div class="dashboard__notif notifFailed" id='failedNotif' style="display:none !important;">
      <span id='textFail'></span>
  </div>

	<div class="profile">
		<div class="profile__info">
			<div class="profile__info__picture">
      <?php
        $check_url = base_url();
        // $check_url = "https://b2ctest.dyned.com/profile";
        if (strpos($check_url, 'b2ctest') !== false) {
          // echo 'true';exit();
      ?>
				<img src="<?php echo "https://b2ctest.dyned.com/image/" . $data[0]->profile_picture;?>" alt="">
      <?php } else {?>
        <img src="<?php echo getenv("PORTAL_PROFILE_PICT_URL").'/' . str_replace('uploads/images/','',$data[0]->profile_picture);?>" alt="">
      <?php } ?>
			</div>
			<div class="profile__info__name">
				<?php echo $data[0]->fullname;?>
			</div>
			<div class="profile__info__birth">
				<label class="trn" data-trn-key="birth" >Date of Birth</label>
				<span id="inputDate">
        <?php
        $newDate = date("d - M - Y", strtotime($data[0]->date_of_birth));
        echo $newDate;
        ?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i>
      </span>
      <div id="dateChangeCont" style="display:none;margin-top:0px;">
        <input type="text" id="datepicker" placeholder="" style="width: 80%;" readonly>
        <style>
            #ui-datepicker-div {
                top: 0px !important;
                left: 0px !important;
                width: 95%;
            }
        </style>
        <i id='btn_date_save' class='fa fa-check btn_save' aria-hidden='true'></i><i id='btn_date_cancel' class='fa fa-times btn_cancel' aria-hidden='true'></i>
      </div>
      <div class="datepicker__here"></div>
			</div>
			<div class="profile__info__email">
				<label class="trn" data-trn-key="email">	Email</label>
				<span><?php echo $data[0]->email;?></span>
			</div>
			<div class="profile__info__language">
				<label class="trn" data-trn-key="native">Native Language</label>
        <?php $langlist = str_replace("#", ", ", $data[0]->spoken_language); ?>
        <span class="conv_lang"><?php if(@$langlist){echo $langlist;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
        <div style="margin-top:0px !important" id='div_spoken'>
          <select class="lang_spoken" multiple="multiple" style="display:none;">
            <?php $lang_sel = 0; foreach($listspoke as $sel){ ?>
              <option value="<?php echo $sel; ?>"><?php echo $sel; ?></option>
            <?php $lang_sel++; } ?>
          </select>
          <i class='fa fa-check btn_save' aria-hidden='true' id='spoken_lang_save'></i><i class='fa fa-times btn_cancel' aria-hidden='true' id='spoken_lang_cancel'></i>
        </div>
			</div>
			<div class="profile__info__gender">
				<label class="trn" data-trn-key="gender">Gender</label>
				<span class="genderChange"><?php if($data[0]->gender){echo $data[0]->gender;}else{echo "";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
		</div>

		<div class="profile__password">
			<div class="profile__password__title trn" data-trn-key="changepass">
				Change Password
			</div>
			<div class="profile__password__current">
				<label class="trn" data-trn-key="currentpw">Current Password</label>
				<input type="password" value="" id='currpass' style="letter-spacing: 5px;">
			</div>
			<div class="profile__password__new">
				<label class="trn" data-trn-key="newpw">New Password</label>
				<input type="password" value="" id='newpass' style="letter-spacing: 5px;">
			</div>
			<div class="profile__password__confirm">
				<label class="trn" data-trn-key="confirmpw">Confirm New Password</label>
				<input type="password" id='confpass' style="letter-spacing: 5px;">
			</div>
			<div class="profile__password__button">
				<button class="neobutton next trn" id='savepass' data-trn-key="btnsave">Save Change</button>
			</div>
		</div>

		<div class="profile__additional">
			<div class="profile__additional__title trn"  data-trn-key="additional">
				Additional Info
			</div>
      <div class="profile__additional__goal">
				<label class="trn" data-trn-key="certification">Certification Goal</label>
        <label style="display:none;">Certification Goal</label>
				<span><?php echo $goal_name;?></span>
			</div>
			<div class="profile__additional__token">
				<label class="trn" data-trn-key="token">Token</label>
        <label style="display:none;">Token</label>
				<span><?php echo $data[0]->token_amount;?></span>
			</div>
			<div class="profile__additional__skype">
				<label class="trn" data-trn-key="phone">Phone</label>
        <label style="display:none;">Phone</label>
				<span><?php if($data[0]->phone){echo $data[0]->dial_code.' '.$data[0]->phone;}else{echo "<font class='grayed'>click to add</font>";}?></span>
			</div>
			<div class="profile__additional__city">
				<label class="trn" data-trn-key="city">City</label>
        <label style="display:none;">City</label>
				<span class="switchText"><?php if($data[0]->city){echo $data[0]->city;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__state">
				<label class="trn" data-trn-key="state">State/Province</label>
        <label style="display:none;">State/Province</label>
				<span class="switchText"><?php if($data[0]->state){echo $data[0]->state;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__address">
				<label class="trn" data-trn-key="address">Address</label>
        <label style="display:none;">Address</label>
				<span class="switchText"><?php if($data[0]->address){echo $data[0]->address;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__like">
				<label class="trn" data-trn-key="likes">Likes</label>
        <label style="display:none;">Likes</label>
				<span class="switchText"><?php if($data[0]->like){echo $data[0]->like;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__dislike">
				<label class="trn" data-trn-key="dislikes">Dislikes</label>
        <label style="display:none;">Dislikes</label>
				<span class="switchText"><?php if($data[0]->dislike){echo $data[0]->dislike;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__timezone">
				<label class="trn" data-trn-key="timezone">Time Zone</label>
        <label style="display:none;">Time Zone</label>
				<span><?php echo $data[0]->timezone;?></span>
			</div>
      <div class="profile__additional__language">
        <label class="trn" data-trn-key="language">Language</label>
        <div id="lang_selector" class="language-dropdown">
          <label for="toggle" class="lang-flag"  title="Click to select the language">
              <span class="title1"> Select </span>
              <span class="flag"></span>
              <div class="bxarrow" id="bxarrow">
                  <span class="arrow"></span>
              </div>
          </label>
          <ul  class="lang-list">
              <li class="lang lang-en" data-value="en" title="English">
                  <span class="title2">English</span>
                  <span class="flag"></span>
              </li>
              <li class="lang lang-id" data-value="id" title="Indonesia">
                  <span class="title2">Bahasa Indonesia</span>
                  <span class="flag"></span>
              </li>
              <li class="lang lang-es" data-value="es" title="Spanish">
                  <span class="title2">Spanish</span>
                  <span class="flag"></span>
              </li>
          </ul>
        </div>
      </div>
		</div>

		<!-- <div class="profile__dynedpro">
			<div class="profile__dynedpro__title">
				DynEd Pro Info
			</div>
			<div class="profile__dynedpro__id">
				<label>DynEd PRO ID</label>
				<span class="switchText"><?php echo $data[0]->dyned_pro_id;?></span>
			</div>
			<div class="profile__dynedpro__server">
				<label>Server</label>
				<span><?php echo $data[0]->server_dyned_pro;?></span>
			</div>

		</div> -->
	</div>


</section>

<script>
  var clicked = 0;
  var switchText = function () {
    if(clicked == '0'){
      clicked = 1;
      elPrev  = $(this).prev().text();
      getval  = $(this).text();
      var deftext = 'click to add';
      if (getval == deftext) {
        getval = '';
      }

      $repthis = "<div class='div_upd'><input type='text' value='"+getval+"' class='switchText1'><i id='btn_upd_save' class='fa fa-check btn_save' aria-hidden='true'></i><i id='btn_upd_cancel' class='fa fa-times btn_cancel' aria-hidden='true'></i></div>";

      $(this).replaceWith($repthis);
      // console.log($(this));
      $('.switchText1').focus();
      $(document).on('click', '#btn_upd_save', function() {
        updatedVal = $(this).parent().find('input').val();
        if(updatedVal != '' && getval != updatedVal){
          //check if input is only spaces
          if((jQuery.trim( updatedVal )).length==0){
            // alert('a');
            $("#textFail").html("<p class='trn' data-trn-key='canot'>Can not save only spaces</p>");
            $("#failedNotif").show().delay(2000).fadeOut("slow");
          }else{
            console.log(elPrev);
            var currParent = $(this).parent();
            $.ajax({
              type:"POST",
              url: "<?php echo site_url().'/b2c/student/profile/upd_text'; ?>",
              data: {'elPrev':elPrev,'updatedVal': updatedVal},
              success: function(data){
                var obj = JSON.parse(data);
                clicked = 0;
                $("#textNotif").html(obj[0].textUpd);
                $("#successNotif").show().delay(2000).fadeOut("slow");
                $repdef = "<span class='switchText'>"+updatedVal+"<i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
                currParent.replaceWith($repdef);
                ChangeLanguages();
              },
              error: function(data){
        				// console.log(data);
                return;
              }
             });
           }
         }else if(getval == updatedVal && getval != ''){
           clicked = 0;
           $repdef = "<span class='switchText'>"+getval+"<i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
           $(this).parent().replaceWith($repdef);
         }else if(getval == ''){
           clicked = 0;
           $repdef = "<span class='switchText'><font class='grayed'>click to add</font><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
           $(this).parent().replaceWith($repdef);
         }else if(updatedVal == ''){
          //  clicked = 0;
           $("#textFail").html("<p class='trn' data-trn-key='blank'>Can not save a blank input</p>");
           ChangeLanguages();
           $("#failedNotif").show().delay(2000).fadeOut("slow");
         }
      });

      $(document).on('click', '#btn_upd_cancel', function() {
        var editVal = getval;
        if (editVal == '') {
          clicked = 0;
          $repdef = "<span class='switchText'><font class='grayed'>click to add</font><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
        }else{
          clicked = 0;
          $repdef = "<span class='switchText'>"+editVal+"<i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
        }
        // console.log(asdf);
        $(this).parent().replaceWith($repdef);
      });
    }else{
      // alert('s');
    }
  };

  $(document).on("click",".switchText", switchText);

  $(document).on('click', '.genderChange', function() {

    genderVal = $(this).text();
    console.log(genderVal);
    if(genderVal == 'Male'){
      selectbox = $('<div class="genderCont"><select class="dropGender" style="width: 90%;"><option class="optGender trn" value="Male" data-trn-value="male">Male</option><option class="optGender trn" value="Female"  data-trn-value="female">Female</option></select><div style="display: inline;margin-right: 5px;float: right;"><i id="gender_cancel" class="fa fa-times btn_cancel" aria-hidden="true"></i></div></div>');
    }else{
      selectbox = $('<div class="genderCont"><select class="dropGender" style="width: 90%;"><option class="optGender trn" value="Male" data-trn-value="male">Male</option><option class="optGender trn" value="Female" selected  data-trn-value="female">Female</option></select><div style="display: inline;margin-right: 5px;float: right;"><i id="gender_cancel" class="fa fa-times btn_cancel" aria-hidden="true"></i></div></div>');
    }
    $(this).replaceWith(selectbox);
    $('.dropGender').focus();

    $(".dropGender").on('change', function() {
      elPrevGen     = 'Gender';
      updatedValGen = $(this).val();
      console.log(updatedValGen);
      $.ajax({
        type:"POST",
        url: "<?php echo site_url().'/b2c/student/profile/upd_text'; ?>",
        data: {'elPrev':elPrevGen,'updatedVal': updatedValGen},
        success: function(data){
          var obj = JSON.parse(data);
          $("#textNotif").html(obj[0].textUpd);
          $("#successNotif").show().delay(2000).fadeOut("slow");
          // console.log(data);
          // ChangeLanguages();
          $(".dropGender").blur(function(){
            genderSpan = "<span class='genderChange'>"+updatedValGen+"<i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
            $('.genderCont').replaceWith(genderSpan);
            
          });
          
        },
        error: function(data){
          // console.log(data);
          return;
        }
       });
       
    });
    // ChangeLanguages();
  });

  $(document).on('click', '#gender_cancel', function() {
    if(typeof updatedValGen == 'undefined'){
      cancelVal = genderVal;
    }else {
      cancelVal = genderVal;
    }
    genderSpan = "<span class='genderChange'>"+cancelVal+"<i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
    $('.genderCont').replaceWith(genderSpan);
  });
  </script>
  <script>
    var select_cont   = $('.lang_spoken').multipleSelect();
    $('#div_spoken').hide();
    $(document).on('click', '.conv_lang', function() {
      $('.conv_lang').hide();
      $('#div_spoken').show();
      var pull_lang     = $('.conv_lang').text();
      var selected_lang = pull_lang.split(", ");;
      // console.log(selected_lang);
      if(selected_lang == ''){
        select_cont.multipleSelect();
      }else{
        select_cont.multipleSelect("setSelects", selected_lang);
      }
    });
    $(document).on('click', '#spoken_lang_save', function() {
      var default_spoken  = $('.conv_lang').text();
      var selected_spoken = select_cont.multipleSelect("getSelects");
      var conv_selected   = selected_spoken.join(', ');

      console.log(conv_selected);
      if(default_spoken == conv_selected || conv_selected == ''){
        $('.conv_lang').show();
        $('#div_spoken').hide();
      }else{
        var changed_spoken = select_cont.multipleSelect("getSelects");
        var conv_changed   = selected_spoken.join('#');

        $.ajax({
          type:"POST",
          url: "<?php echo site_url().'/b2c/student/profile/upd_text'; ?>",
          data: {'elPrev':'spoken','updatedVal': conv_changed},
          success: function(data){
            $("#textNotif").html("<p class='trn' data-trn-key='nativeupdt'>Native Language updated</p>");
            ChangeLanguages();
            $("#successNotif").show().delay(2000).fadeOut("slow");
            $('.conv_lang').html(conv_selected+"<i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i>");
            $('.conv_lang').show();
            $('#div_spoken').hide();
          },
          error: function(data){
            // console.log(data);
            return;
          }
         });
      }
      // console.log(default_spoken);
      // console.log(conv_selected);
    });
    $(document).on('click', '#spoken_lang_cancel', function() {
      $('.conv_lang').show();
      $('#div_spoken').hide();
    });
</script>
<script>
$(document).on('click', '#inputDate', function() {
    currDate        = '<?php echo date("m/d/Y", strtotime($data[0]->date_of_birth)); ?>';
    placeholderDate = $(this).text();
    // console.log(currDate);
    $('#dateChangeCont').show();
    $('#datepicker').attr("placeholder", placeholderDate);
    $('#inputDate').hide();
    $("#datepicker").datepicker({
        beforeShow:function(textbox, instance){
            $('.datepicker__here').append($('#ui-datepicker-div'));
            $('#ui-datepicker-div').hide();
        },
        changeMonth: true,
        changeYear: true,
        yearRange: "1970:2012"
    });
    $(document).on('click', '#btn_date_save', function() {
      changed_date = $('#datepicker').val();
      if(changed_date == currDate || changed_date == ''){
        $('#dateChangeCont').hide();
        $('#inputDate').show();
      }else{

        $.ajax({
          type:"POST",
          url: "<?php echo site_url().'/b2c/student/profile/upd_text'; ?>",
          data: {'elPrev':'birthdate','updatedVal': changed_date},
          success: function(data){
            var obj = JSON.parse(data);
            // console.log(obj[0].textUpd);
            $("#textNotif").html(obj[0].textUpd);
            $("#successNotif").show().delay(2000).fadeOut("slow");
            $("#inputDate").html(obj[0].upd_date+"<i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i>");
            $('#dateChangeCont').hide();
            $('#inputDate').show();
            ChangeLanguages();
          },
          error: function(data){
            // console.log(data);
            return;
          }
         });

      }
    });
    $(document).on('click', '#btn_date_cancel', function() {
      $('#dateChangeCont').hide();
      $('#inputDate').show();
    });
});
</script>

<script>
//Save Password

$(document).on('click', '#savepass', function() {
  currpass = $('#currpass').val();
  newpass  = $('#newpass').val();
  confpass = $('#confpass').val();
  

  if(currpass == '' || newpass == '' || confpass == ''){
    $("#textFail").html("<p class='trn' data-trn-key='allfield'>All elds are required</p>");
    ChangeLanguages();
    $("#failedNotif").show().delay(2000).fadeOut("slow");
  }else if((jQuery.trim( currpass )).length==0 || (jQuery.trim( newpass )).length==0 || (jQuery.trim( confpass )).length==0){
    $("#textFail").html("<p class='trn' data-trn-key='canot'>Can not save only spaces</p>");
    ChangeLanguages();
    $("#failedNotif").show().delay(2000).fadeOut("slow");
  }else if((jQuery.trim( currpass )).length<8 || (jQuery.trim( newpass )).length<8 || (jQuery.trim( confpass )).length<8){
    $("#textFail").html("<p class='trn' data-trn-key='minimumpw'>Minimum password is 8 characters</p>");
    ChangeLanguages();
    $("#failedNotif").show().delay(2000).fadeOut("slow");
  }else if(newpass != confpass){
    $("#textFail").html("<p class='trn' data-trn-key='newpws'>New password did not match</p>");
    ChangeLanguages();
    $("#failedNotif").show().delay(2000).fadeOut("slow");
  }else{

    $.ajax({
      type:"POST",
      url: "<?php echo site_url().'/b2c/student/profile/upd_pass'; ?>",
      data: {'currpass':currpass, 'newpass': newpass, 'confpass': confpass},
      success: function(data){
        var obj = JSON.parse(data);
        // console.log(obj[0].newpass);
        // console.log(data);
        $("#"+obj[0].classtext).text(obj[0].textUpd);
        $("#"+obj[0].classcont).show().delay(2000).fadeOut("slow");
        $('#currpass').val("");
        $('#newpass').val("");
        $('#confpass').val("");
      },
      error: function(data){
        // console.log(data);
        return;
      }
     });

  }

  // console.log(newpass);
});
</script>


<script>
  $(document).ready(function() {

    $(".lang-flag").click(function() {
        $(".language-dropdown").toggleClass("open");
        $(".bxarrow").toggleClass("active");
    });
    $("ul.lang-list li").click(function(e) {

        $("ul.lang-list li").removeClass("selected");
        $(this).addClass("selected");
        if ($(this).hasClass('lang-en')) {
            $(".language-dropdown").find(".lang-flag").addClass("lang-en").removeClass("lang-es").removeClass("lang-id");
            $(".title1").html("<p>English</p>")
            langselect = "en";

            // $(".lang-en").attr("data-value", "en")
        } else if ($(this).hasClass('lang-id')) {
            $(".language-dropdown").find(".lang-flag").addClass("lang-id").removeClass("lang-es").removeClass("lang-en");
            $(".title1").html("<p>Bahasa Indonesia</p>")
            langselect = "id";
            // $(".lang-id").attr("data-value", "id")
        } else {
            $(".language-dropdown").find(".lang-flag").addClass("lang-es").removeClass("lang-en").removeClass("lang-id");
            $(".title1").html("<p>Spanish</p>")
            langselect = "es";
            // $(".lang-es").attr("data-value", "es")
        }
        $.ajax({
          type:"POST",
          url: "<?php echo site_url().'/b2c/student/language/update'; ?>",
          data: {'language':langselect},
         });
        $(".bxarrow").removeClass("active");
        $(".language-dropdown").removeClass("open");
        ChangeLanguages();
    });

    //FUNCTION CHECK TO ADD CLASS TO DROPDOWN LANGUAGE
    if (langselect == "en") {
            $(".language-dropdown").find(".lang-flag").addClass("lang-en").removeClass("lang-es").removeClass("lang-id");
            $(".lang-list").find(".lang-en").addClass("selected");
            $(".title1").html("<p>English</p>")
        } else if (langselect == "id") {
            $(".language-dropdown").find(".lang-flag").addClass("lang-id").removeClass("lang-es").removeClass("lang-en");
            $(".lang-list").find(".lang-id").addClass("selected");
            $(".title1").html("<p>Bahasa Indonesia</p>")
        } else {
            $(".language-dropdown").find(".lang-flag").addClass("lang-es").removeClass("lang-en").removeClass("lang-id");
            $(".lang-list").find(".lang-es").addClass("selected");
            $(".title1").html("<p>Spanish</p>")
        }

  });
</script>