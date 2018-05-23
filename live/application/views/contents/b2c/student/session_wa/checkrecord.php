<script>
  $(".header__desktop").hide();
  $(".header__mobile").hide();
  $(".main__sidebar").hide();
</script>
<style>
  .tooltip:after,
[data-tooltip]:after {width: 230px}
</style>
<div>
  <p><?php echo $note; ?></p>
  <?php if(@$downloadurl != NULL){ ?>
  <div style="margin-top: 20px;text-align: center;">
    <a href="<?php echo $downloadurl ?>" target="_blank" class="neobutton trn" style="margin-right: 10px;" data-trn-key="watchrecord">
      <!-- <div class="prelative tooltip-bottom" data-tooltip="Disable any download manager to watch"> -->
        Watch Recording
      <!-- </div> -->
    </a>
    <a href="<?php echo $downloadurl ?>" target="_blank" class="neobutton trn" download style="margin-left: 10px;" data-trn-key="downloadrecord">Download Recording</a>
    <?php }else{ }?>
  </div>
</div>
