<div class="dashboard__menutab boxsessions__today">
  <div class="notimezone">
      <div class="danger__notif text--center">Your timezone hasn't been saved since your last login</div>
      <div class="notimezone__box">
        <p>Our system detects that this is your current time information:</p>
        <p id="tz_display"></p>
        <form action="<?php echo(site_url('b2c/student/dashboard/update_tz/'));?>" method="POST">
          <input type="hidden" id="min_raw" name="min_raw" value=""/>
          <button type="submit" class="neobutton__small next">Save</button>
        </form>
      </div>
  </div>
</div>

<script>
  var d = new Date();
  var n = d.getTimezoneOffset();
  $('#tz_display').text(d);
  $('#min_raw').val(n);
</script>
