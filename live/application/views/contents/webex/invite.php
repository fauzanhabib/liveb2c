<div>
    <form name="invite" METHOD="POST" id ="form_auto_invite" action="https://apidemoeu.webex.com/apidemoeu/m.php">
        <input type="hidden" name="MK" value="<?php echo @$appointment[0]->webex_meeting_number?>">
        <input type="hidden" name="EM" value="<?php echo @$appointment[0]->student_email?>">
        <input type="hidden" name="FN" value="<?php echo @$appointment[0]->student_name?>">
        <input type="hidden" name="EI" value="1">
        <input type="hidden" name="AT" value="AA">
        <input type="hidden" name="BU" value="<?php echo site_url()?>/webex/invite/<?php echo @$host_id;?>/<?php echo @$appointment[0]->id?>">
    </form>
</div>

<script type="text/javascript">
    document.getElementById("form_auto_invite").submit();
</script>