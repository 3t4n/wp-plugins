<?php
	require( CBMS_WEEKLY_PICKS_PLUGIN_DIR . '/includes/cbms_weeklypicks_header.php' );	
?>
	<hr>
	<h3>Current Weekly Picks</h3>
<?php	
	$results = array();
	$results['weeklypicks'] = cbms_weekly_picks::getList();
	if($results['weeklypicks'] != null)
	  {
	  	foreach( $results['weeklypicks'] as $picks ) 
		{
?>
			<div class = "cbms_weekly_pick">
				<div class = "cbms_weekly_pick_image">
					<img src = "<?php echo(CBMS_WEEKLY_PICKS_COVERS . $picks->id . $picks->img); ?>" alt = "Weekly Pick"/>
				</div>			
				<a class = "cbms_weekly_picks_adminbuttons" href="<?php CBMS_WEEKLY_PICKS_PLUGIN_DIR ?>?page=cbms_weekly_picks_admin&action=update_picks&amp;id=<?php echo( $picks->id );?>">Edit</a>						
			</div>
<?php	
		}
	  }
	else
	  {
?>
		<br>
		<div class = "nopicks">There are Currently No Weekly Picks</div>
		<br><br><br>
		<a class = "cbms_weekly_picks_adminbuttons" href="<?php CBMS_WEEKLY_PICKS_PLUGIN_DIR ?>?page=cbms_weekly_picks_admin&action=add_picks">Add Weekly Picks</a> 		
<?php	  
	  }	
?>


	
<?php	
	require( CBMS_WEEKLY_PICKS_PLUGIN_DIR . '/includes/cbms_weeklypicks_footer.php' );	
?>	
