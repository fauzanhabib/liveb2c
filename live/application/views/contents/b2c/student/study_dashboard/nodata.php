Cannot Access Right Now<br>
<button class="neobutton next" id='refreshdata'>Refresh</button>
<div class="page__loader">
    <div class="loader" id="loader">
        <span></span>
        <span></span>
        <span></span>
    </div>
    Updating your study dashboard...
</div>

<script>
$('.page__loader').css('display', 'flex');
$.ajax({
 type:"POST",
 url:"<?php echo site_url('b2c/student/dashboard/update_studyprog');?>",
 success: function(data){
    $('.page__loader').hide();
     //document.getElementById('chat_audio').play();
    //  $('#isi_chat').html(data);
     console.log(data);
   }
});
</script>
<script>
$(document).on('click', '#refreshdata', function() {
  window.location.href="<?php echo site_url().'/b2c/student/study_dashboard'; ?>"
});
</script>
