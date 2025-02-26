<?php
	// Uninstall Simple Business Hours
	if(isset($_POST['removesbh']))
	{
		global $wpdb;
		//drop sbh_business_hours
		$sbh_business_hours_table = $wpdb->prefix . "sbh_business_hours";
		$sql1 = "DROP TABLE `$sbh_business_hours_table`";
		$wpdb->query($sql1);
		
		//drop sbh_business_holidays
		$sbh_holidays_table = $wpdb->prefix . "sbh_holidays";
		$sql2 = "DROP TABLE `$sbh_holidays_table`";
		$wpdb->query($sql2);
		
		//drop sbh_business_location
		$sbh_locations_table = $wpdb->prefix . "sbh_locations";
		$sql3 = "DROP TABLE `$sbh_locations_table`";
		$wpdb->query($sql3);
		
		// DEACTIVATE APPOINTMENT CALENDAR PLUGIN
		$plugin = "simple-business-hours/simple-business-hours.php";
		deactivate_plugins($plugin);
		?>
		<div class="alert" style="width:95%; margin-top:10px;">
			<p><strong><?php _e('Simple Business Hours plugin has been successfully removed. It can be re-activated from the ', 'SimpleBusinessHours'); ?><a href="plugins.php"><?php _e('Plugins Page', 'SimpleBusinessHours'); ?></a></strong>.</p>
		</div>
		<?php
		return;
	 }


if(isset($_GET['page']) == 'remove-plugin')
{?>
<div class="alert alert-error" style="width:95%;">
	<form method="post">
	<h3><?php _e('Remove Simple Business Hours Plugin', 'SimpleBusinessHours'); ?></h3>
	<p><?php _e('This operation wiil delete all Business Hours Plugin dataase & saved settings. If you continue, You will not be able to retrieve or restore your appointments entries.', 'SimpleBusinessHours'); ?></p>
	<p><button id="removesbh" type="submit" class="btn btn-danger" name="removesbh" value="" onclick="return confirm('<?php _e('Warning! Simple Business Hours plugin database & settings, including saved entries will be deleted. This cannot be undone. OK to delete, CANCEL to stop', 'SimpleBusinessHours'); ?>')" ><?php _e('REMOVE PLUGIN', 'SimpleBusinessHours'); ?></button></p>
	</form>
</div>
<?php }?>