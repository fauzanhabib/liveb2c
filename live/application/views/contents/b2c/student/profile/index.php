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
</style>
  <div class="dashboard__notif notifSuccess" id='successNotif' style="display:none !important;">
      <span id='textNotif'></span>
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
        <img src="<?php echo getenv("PORTAL_PROFILE_PICT_URL").'/' . $data[0]->profile_picture;?>" alt="">
      <?php } ?>
			</div>
			<div class="profile__info__name">
				<?php echo $data[0]->fullname;?>
			</div>
			<div class="profile__info__birth">
				<label>Date of Birth</label>
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
				<label>	Email</label>
				<span><?php echo $data[0]->email;?></span>
			</div>
			<div class="profile__info__language">
				<label>Native Language</label>
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
				<label>Gender</label>
				<span class="genderChange"><?php if($data[0]->gender){echo $data[0]->gender;}else{echo "";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
		</div>

		<div class="profile__password">
			<div class="profile__password__title">
				Change Password
			</div>
			<div class="profile__password__current">
				<label>Current Password</label>
				<input type="password" value="" id='currpass' style="letter-spacing: 5px;">
			</div>
			<div class="profile__password__new">
				<label>New Password</label>
				<input type="password" value="" id='newpass' style="letter-spacing: 5px;">
			</div>
			<div class="profile__password__confirm">
				<label>Confirm New Password</label>
				<input type="password" id='confpass' style="letter-spacing: 5px;">
			</div>
			<div class="profile__password__button">
				<button class="neobutton next" id='savepass'>Save Change</button>
			</div>
		</div>

		<div class="profile__additional">
			<div class="profile__additional__title">
				Additional Info
			</div>
      <div class="profile__additional__goal">
				<label>Certification Goal</label>
				<span><?php echo $goal_name;?></span>
			</div>
			<div class="profile__additional__token">
				<label>Token</label>
				<span><?php echo $data[0]->token_amount;?></span>
			</div>
			<div class="profile__additional__skype">
				<label>Phone</label>
				<span><?php if($data[0]->phone){echo $data[0]->dial_code.' '.$data[0]->phone;}else{echo "<font class='grayed'>click to add</font>";}?></span>
			</div>
			<div class="profile__additional__city">
				<label>City</label>
				<span class="switchText"><?php if($data[0]->city){echo $data[0]->city;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__state">
				<label>State/Province</label>
				<span class="switchText"><?php if($data[0]->state){echo $data[0]->state;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__address">
				<label>Address</label>
				<span class="switchText"><?php if($data[0]->address){echo $data[0]->address;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__like">
				<label>Likes</label>
				<span class="switchText"><?php if($data[0]->like){echo $data[0]->like;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__dislike">
				<label>Dislikes</label>
				<span class="switchText"><?php if($data[0]->dislike){echo $data[0]->dislike;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__timezone">
				<label>Time Zone</label>
				<span><?php echo $data[0]->timezone;?></span>
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
            $("#textFail").text('Can not save only spaces');
            $("#failedNotif").show().delay(2000).fadeOut("slow");
          }else{
            var currParent = $(this).parent();
            $.ajax({
              type:"POST",
              url: "<?php echo site_url().'/b2c/student/profile/upd_text'; ?>",
              data: {'elPrev':elPrev,'updatedVal': updatedVal},
              success: function(data){
                var obj = JSON.parse(data);
                clicked = 0;
                $("#textNotif").text(obj[0].textUpd);
                $("#successNotif").show().delay(2000).fadeOut("slow");
                $repdef = "<span class='switchText'>"+updatedVal+"<i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
                currParent.replaceWith($repdef);
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
           $("#textFail").text('Can not save a blank input');
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
    // console.log(genderVal);
    if(genderVal == 'Male'){
      selectbox = $('<div class="genderCont"><select class="dropGender" style="width: 90%;"><option class="optGender" value="Male">Male</option><option class="optGender" value="Female">Female</option></select><div style="display: inline;margin-right: 5px;float: right;"><i id="gender_cancel" class="fa fa-times btn_cancel" aria-hidden="true"></i></div></div>');
    }else{
      selectbox = $('<div class="genderCont"><select class="dropGender" style="width: 90%;"><option class="optGender" value="Male">Male</option><option class="optGender" value="Female" selected>Female</option></select><div style="display: inline;margin-right: 5px;float: right;"><i id="gender_cancel" class="fa fa-times btn_cancel" aria-hidden="true"></i></div></div>');
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
          $("#textNotif").text(obj[0].textUpd);
          $("#successNotif").show().delay(2000).fadeOut("slow");
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
            $("#textNotif").text('Native Language updated');
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
            $("#textNotif").text(obj[0].textUpd);
            $("#successNotif").show().delay(2000).fadeOut("slow");
            $("#inputDate").html(obj[0].upd_date+"<i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i>");
            $('#dateChangeCont').hide();
            $('#inputDate').show();
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
    $("#textFail").text('All fields are required');
    $("#failedNotif").show().delay(2000).fadeOut("slow");
  }else if((jQuery.trim( currpass )).length==0 || (jQuery.trim( newpass )).length==0 || (jQuery.trim( confpass )).length==0){
    $("#textFail").text('Can not save only spaces');
    $("#failedNotif").show().delay(2000).fadeOut("slow");
  }else if((jQuery.trim( currpass )).length<8 || (jQuery.trim( newpass )).length<8 || (jQuery.trim( confpass )).length<8){
    $("#textFail").text('Minimum password is 8 characters');
    $("#failedNotif").show().delay(2000).fadeOut("slow");
  }else if(newpass != confpass){
    $("#textFail").text('New password did not match');
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
