
	<div class = "cbms_weeklypicks_header_wrapper">
		<div class = "cbms_weeklypicks_logo">
			<img src="<?php echo esc_url(CBMS_WEEKLY_PICKS_PLUGIN_DIR_LOGO); ?>" alt = "CBMS Weekly Picks" />
		</div>
	</div>


	<div class="wrap cbms_weeklypicks_adminwrapper">
	<?php
			if( isset( $_SESSION['status'] ) && !empty( $_SESSION['status'] ) )
			  {
	?>
				<br><div class = "status"><?php echo( $_SESSION['status'] );?></div>
	<?php		  
			  }
	?>	

