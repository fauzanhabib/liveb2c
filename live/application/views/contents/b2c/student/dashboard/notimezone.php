<div class="dashboard__menutab">
  <div class="todaysessions">
      <span>Your timezone hasn't been saved since your last login</span>
      <div class="boxinfo activesession">
          <div class="playsession">
            <p>Our system detects that this is your current time information:</p>
            <p id="tz_display"></p>
            <form action="<?php echo(site_url('b2c/student/dashboard/update_tz/'));?>" method="POST">
              <input type="hidden" id="min_raw" name="min_raw" value=""/>
              <button type="submit" class="neobutton next">Save</button>
            </form>
          </div>
      </div>
  </div>
</div>

<script>
  var d = new Date();
  var n = d.getTimezoneOffset();
  $('#tz_display').text(d);
  $('#min_raw').val(n);
</script>
