Cannot Access Right Now<br>
<button class="neobutton next" id='refreshdata'>Refresh</button>
<script>
$(document).on('click', '#refreshdata', function() {
  window.location.href="<?php echo site_url().'/b2c/student/study_dashboard'; ?>"
});
</script>
