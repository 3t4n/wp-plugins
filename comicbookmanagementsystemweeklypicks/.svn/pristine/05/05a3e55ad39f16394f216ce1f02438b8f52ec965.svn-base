<?php
	global $wpdb;
	$table_name = $wpdb->prefix . 'cbms_weekly_picks';
	
	$picks = $wpdb->get_results( 
		"SELECT * 
		FROM " . $table_name
	);
	
	$pick_count = count( $picks );
	$i = 0;
	if( $pick_count > 0 )
	  {
?>
		<div id = "cbms_weekly_picks_holder">
			
			<div id = "cbms_weekly_picks_tag">
				<div id = "cbms_weekly_picks_tag_holder">
					<div id = "this">this</div>
					<div id = "weeks">weeks</div>
					<div id = "picks">picks</div>
				</div>
			</div>
			<div id = "cbms_weekly_picks">
				<div id = "cbms_weeklypick_1"></div>
				<div id = "cbms_weeklypick_2"></div>
				<div id = "cbms_weeklypick_3"></div>
				<div id = "cbms_weeklypick_4"></div>
				<div id = "cbms_weeklypick_5"></div>
				<div id = "cbms_weeklypick_6"></div>
				<div id = "cbms_weeklypick_7"></div>			
<?php	  
			foreach( $picks as $weeklypick )
			{
			   $id = $weeklypick->id;
			   $img = $weeklypick->img;
?>		

				<div id = "cbms_weekly_pick_<?php echo($id);?>"><img src = "<?php echo (CBMS_WEEKLY_PICKS_COVERS . $id . $img) ?>" alt = "CBMS Weekly Pick <?php echo($id);?>"/></div>
<?php
			}
?>		
			</div>
		</div>
<?php
	  }
?>	