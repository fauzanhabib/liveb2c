<style>
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
.iconEdit{
  float: right;
  margin-right: 10px;
}
</style>
<section class="main__content">
  <div class="dashboard__notif" id='successNotif' style="display:none !important;">
      <span id='textNotif'></span>
  </div>

	<div class="profile">
		<div class="profile__info">
			<div class="profile__info__picture">
				<img src="<?php echo base_url() . $data[0]->profile_picture;?>" alt="">
			</div>
			<div class="profile__info__name">
				<?php echo $data[0]->fullname;?>
			</div>
			<div class="profile__info__birth">
				<label>Date Of Birth </label>
				<span>
        <?php
        $newDate = date("d-M-Y", strtotime($data[0]->date_of_birth));
        echo $newDate;
        ?>
        </span>
			</div>
			<div class="profile__info__email">
				<label>	Email</label>
				<span><?php echo $data[0]->email;?></span>
			</div>
			<div class="profile__info__language">
				<label>Home Language </label>
				<span><?php echo $data[0]->spoken_language;?></span>
			</div>
			<div class="profile__info__gender">
				<label>Gender</label>
				<span><?php if($data[0]->gender){echo $data[0]->gender;}else{echo "string";}?></span>
			</div>
		</div>

		<div class="profile__password">
			<div class="profile__password__title">
				Change Password
			</div>
			<div class="profile__password__current">
				<label>Current Password</label>
				<input type="password" value="">
			</div>
			<div class="profile__password__new">
				<label>New Password</label>
				<input type="password" value="">
			</div>
			<div class="profile__password__confirm">
				<label>Confirm New Password</label>
				<input type="text">
			</div>
			<div class="profile__password__button">
				<button class="neobutton next">Save Change</button>
			</div>
		</div>

		<div class="profile__additional">
			<div class="profile__additional__title">
				Additional Info
			</div>
			<div class="profile__additional__token">
				<label>Token </label>
				<span><?php echo $data[0]->token_amount;?></span>
			</div>
			<div class="profile__additional__skype">
				<label>Phone </label>
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
			<div class="profile__additional__goal">
				<label>Certification Goal</label>
				<span><?php echo $data[0]->cert_studying;?></span>
			</div>
			<div class="profile__additional__like">
				<label>Likes</label>
				<span class="switchText"><?php if($data[0]->like){echo $data[0]->like;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__dislike">
				<label>Dislikes</label>
				<span class="switchText"><?php if($data[0]->dislike){echo $data[0]->like;}else{echo "<font class='grayed'>click to add</font>";}?><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>
			</div>
			<div class="profile__additional__timezone">
				<label>Time Zone</label>
				<span><?php echo $data[0]->timezone;?></span>
			</div>

		</div>

		<div class="profile__dynedpro">
			<div class="profile__dynedpro__title">
				DynEd Pro Info
			</div>
			<div class="profile__dynedpro__id">
				<label>DynEd PRO ID </label>
				<span class="switchText"><?php echo $data[0]->dyned_pro_id;?></span>
			</div>
			<div class="profile__dynedpro__server">
				<label>Server </label>
				<span><?php echo $server_dyned_pro[$data[0]->server_dyned_pro];?></span>
			</div>

		</div>
	</div>


</section>

<script>
var switchText = function () {
    elPrev  = $(this).prev().text();
    getval  = $(this).text();
    var deftext = 'click to add';
    if (getval == deftext) {
      getval = '';
    }

    $repthis = "<div class='div_upd'><input type='text' value='"+getval+"' class='switchText1'><i id='btn_upd_save' class='fa fa-check btn_save' aria-hidden=true'></i><i id='btn_upd_cancel' class='fa fa-times btn_cancel' aria-hidden='true'></i></div>";

    $(this).replaceWith($repthis);
    // console.log($(this));
    $('.switchText1').focus();
    $(document).on('click', '#btn_upd_save', function() {
      updatedVal = $(this).parent().find('input').val();
      if(updatedVal != '' && getval != updatedVal){
        // console.log('updatedVaaaal');
        var currParent = $(this).parent();
        $.ajax({
          type:"POST",
          url: "<?php echo site_url().'/b2c/student/profile/upd_text'; ?>",
          data: {'elPrev':elPrev,'updatedVal': updatedVal},
          success: function(data){
            $("#textNotif").text(data);
            $("#successNotif").show().delay(3000).fadeOut("slow");
    				// console.log(currParent);
            $repdef = "<span class='switchText'>"+updatedVal+"</span>";
            currParent.replaceWith($repdef);
          },
          error: function(data){
    				// console.log(data);
            return;
          }
         });
        //  console.log($(this).parent());
       }else if(getval == updatedVal && getval != ''){
        //  console.log('updatedVasafddsfl');
         $repdef = "<span class='switchText'>"+getval+"</span>";
         $(this).parent().replaceWith($repdef);
       }else if(getval == ''){
        //  console.log('updatedVasdasdasdasdsafddsfl');
         $repdef = "<span class='switchText'><font class='grayed'>click to add</font><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
         $(this).parent().replaceWith($repdef);
       }
    });
    $(document).on('click', '#btn_upd_cancel', function() {
      var editVal = getval;
      if (editVal == '') {
        $repdef = "<span class='switchText'><font class='grayed'>click to add</font><i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
      }else{
        $repdef = "<span class='switchText'>"+editVal+"<i class='fa fa-pencil-square-o iconEdit' aria-hidden='true'></i></span>";
      }
      var asdf = $(this);
      // console.log(asdf);
      $(this).parent().replaceWith($repdef);
    });
};
$(document).on("click",".switchText", switchText);
</script>
