<?php
	require( CBMS_WEEKLY_PICKS_PLUGIN_DIR . '/includes/cbms_weeklypicks_header.php' );	
	
	if( isset( $weeklypicks['update'] ) )
	  {			
	  
?>
		<h2 class = "weeklypicks_header">Update Weekly Picks</h2>
		<form class = "cbms_wp_form" method="POST" enctype="multipart/form-data">
			<input type="hidden" id="id" name="id" value="<?php echo( $weeklypicks['update']['id']); ?>">
			<h3> Weekly Pick <?php echo( $weeklypicks['update']['id']); ?></h3>
			
			<div class = "cbms_weekly_picks_edit_labels">Current Cover:</div>
			<div class = "cbms_weekly_picks_edit_inputs">
				<img src="<?php echo CBMS_WEEKLY_PICKS_COVERS . htmlspecialchars( $weeklypicks['update']['id'] . htmlspecialchars( $weeklypicks['update']['img'] ) ) ?>" alt="CBMS Weekly Picks" />
			</div>			
			<br><br><br><br>
			<div class = "cbms_weekly_picks_edit_labels">New Cover:</div>
			<input class = "cbms_weekly_picks_edit_inputs" type="file" name="imagefile" id = "imagefile" placeholder="Choose an image to upload" required />		
			<br><br><br><br><br>

			<input class = "cbms_weekly_picks_adminbuttons" type="submit" name="update_picks" value="Update Weekly Picks">
		</form>				
<?php	  
	  }
	else
	  {
?>
		<h2 class = "weeklypicks_header">Add Weekly Picks</h2>
		<form class = "cbms_wp_form" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="title" value="" />
			<div class = "cbms_weekly_picks_labels">Weekly Pick 1:</div>
			<input class = "cbms_weekly_picks_inputs" type="file" name="weeklypick_1" id = "weeklypick_1" placeholder="Choose an image to upload" required />
			<br><hr>
			<div class = "cbms_weekly_picks_labels">Weekly Pick 2:</div>
			<input class = "cbms_weekly_picks_inputs" type="file" name="weeklypick_2" id = "weeklypick_2" placeholder="Choose an image to upload" required />		
			<br><hr>
			<div class = "cbms_weekly_picks_labels">Weekly Pick 3:</div>
			<input class = "cbms_weekly_picks_inputs" type="file" name="weeklypick_3" id = "weeklypick_3" placeholder="Choose an image to upload" required />		
			<br><hr>
			<div class = "cbms_weekly_picks_labels">Weekly Pick 4:</div>
			<input class = "cbms_weekly_picks_inputs" type="file" name="weeklypick_4" id = "weeklypick_4" placeholder="Choose an image to upload" required />		
			<br><hr>
			<div class = "cbms_weekly_picks_labels">Weekly Pick 5:</div>
			<input class = "cbms_weekly_picks_inputs" type="file" name="weeklypick_5" id = "weeklypick_5" placeholder="Choose an image to upload" required />		
			<br><hr>
			<div class = "cbms_weekly_picks_labels">Weekly Pick 6:</div>
			<input class = "cbms_weekly_picks_inputs" type="file" name="weeklypick_6" id = "weeklypick_6" placeholder="Choose an image to upload" required />
			<br><hr>
			<div class = "cbms_weekly_picks_labels">Weekly Pick 7:</div>
			<input class = "cbms_weekly_picks_inputs" type="file" name="weeklypick_7" id = "weeklypick_7" placeholder="Choose an image to upload" required />			
			<br><br><br>
			
			<input class = "cbms_weekly_picks_adminbuttons" type="submit" name="add_picks" value="Add Weekly Picks">
		</form>		
		
<?php
	}
?>	
	<br><br><br>
	<a class = "cbms_weekly_picks_adminbuttons" href="<?php CBMS_WEEKLY_PICKS_PLUGIN_DIR ?>?page=cbms_weekly_picks_admin&action">Main Menu</a>  

<?php	
	require( CBMS_WEEKLY_PICKS_PLUGIN_DIR . '/includes/cbms_weeklypicks_footer.php' );	
?>			