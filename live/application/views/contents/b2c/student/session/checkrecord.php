<style>
  .tooltip:after,
[data-tooltip]:after {width: 230px}
</style>
<div>
  <p><?php echo $note; ?></p>
  <?php if(@$downloadurl != NULL){ ?>
  <div style="margin-top: 20px;text-align: center;">
    <a href="<?php echo $downloadurl ?>" target="_blank" class="neobutton" style="margin-right: 10px;">
      <!-- <div class="prelative tooltip-bottom" data-tooltip="Disable any download manager to watch"> -->
        Watch Recording
      <!-- </div> -->
    </a>
    <a href="<?php echo $downloadurl ?>" target="_blank" class="neobutton" download style="margin-left: 10px;">Download Recording</a>
    <?php }else{ }?>
  </div>
</div>
