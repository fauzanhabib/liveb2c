<div class="heading text-cl-primary padding15">
	<h1 style="color:#49c5fe;font-size:1.2em;">Notifications</small></h1>
</div>

<div class="box seeAll__page">
	<?php
		if($data){
			foreach($data as $d){ 
			?>
			<div class="list-notification article-loop">
				<div class="text">
				<?php echo $d->description; ?>
				</div>
				<div class="time">
					<?php echo($received_time[$d->id]); ?>
				</div>
			</div>
			<?php } 
		} else {

			echo "<div class='padding15'><div class='no-result'>No Data</div></div>";

		}
	?>
</div>

<script>
    $('.article-loop').paginate(20);
</script>

