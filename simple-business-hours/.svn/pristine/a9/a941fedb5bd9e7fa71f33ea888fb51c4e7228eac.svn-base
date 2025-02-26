<?php // loading settings
if(!isset($Settings['business_start_day'])) { $Settings['business_start_day'] = 1; }
if(!isset($Settings['display_settings'])) { $Settings['display_settings'] = 'vertical'; }
if(!isset($Settings['time_format'])) { $Settings['time_format'] = 12; $TimeFormat = "h:i"; }
if(!isset($Settings['default_business_lcation'])) { $Settings['default_business_lcation'] = 1; }
?>
<form id="save-settings-form" name="save-settings-form" method="post" action="">
	<table width="100%" class="table table-hover">
		<tr>
			<td width="19%"><?php _e('Business Start Day' ,'SimpleBusinessHours'); ?></td>
			<td width="5%"><strong>:</strong></td>
			<td width="76%">
				<select id="business_start_day" name="business_start_day">
					<option value="1" <?php if($Settings['business_start_day'] == 1) echo "selected='selected'"; ?>><?php _e('Monday' ,'SimpleBusinessHours'); ?></option>
					<option value="2" <?php if($Settings['business_start_day'] == 2) echo "selected='selected'"; ?>><?php _e('Tuesday' ,'SimpleBusinessHours'); ?></option>
					<option value="3" <?php if($Settings['business_start_day'] == 3) echo "selected='selected'"; ?>><?php _e('Wednesday' ,'SimpleBusinessHours'); ?></option>
					<option value="4" <?php if($Settings['business_start_day'] == 4) echo "selected='selected'"; ?>><?php _e('Thursday' ,'SimpleBusinessHours'); ?></option>
					<option value="5" <?php if($Settings['business_start_day'] == 5) echo "selected='selected'"; ?>><?php _e('Friday' ,'SimpleBusinessHours'); ?></option>
					<option value="6" <?php if($Settings['business_start_day'] == 6) echo "selected='selected'"; ?>><?php _e('Saturday' ,'SimpleBusinessHours'); ?></option>
					<option value="7" <?php if($Settings['business_start_day'] == 7) echo "selected='selected'"; ?>><?php _e('Sunday' ,'SimpleBusinessHours'); ?></option>
				</select>				</td>
		</tr>
		<!--<tr>
			<td><?php //_e('Day & Time Dispaly Style' ,'SimpleBusinessHours'); ?></td>
			<td><strong>:</strong></td>
			<td>
				<select id="display_settings" name="display_settings">
					<option value="vertical" <?php //if($Settings['display_settings'] == 'vertical') echo "selected='selected'"; ?>>Vertical</option>
					<option value="horizontal" <?php //if($Settings['display_settings'] == 'horizontal') echo "selected='selected'"; ?>>Horizontal</option>
				</select>				</td>
		</tr>-->
		<!--<tr>
			<td><?php //_e('Show Day As' ,'SimpleBusinessHours'); ?></td>
			<td><strong>:</strong></td>
			<td>
				<select id="day_name_as" name="day_name_as">
					<option value="short" <?php //if($Settings['day_name_as'] == 'short') echo "selected='selected'"; ?>><?php //_e("Short Name (Mon)" ,'SimpleBusinessHours'); ?></option>
					<option value="full" <?php //if($Settings['day_name_as'] == 'full') echo "selected='selected'"; ?>><?php //_e("Full Name (Monday)" ,'SimpleBusinessHours'); ?></option>
				</select>				</td>
		</tr>-->
		<tr>
			<td><?php _e('Time Format' ,'SimpleBusinessHours'); ?></td>
			<td><strong>:</strong></td>
			<td>
				<select id="time_format" name="time_format">
					<option value="12" <?php if($Settings['time_format'] == 12) echo "selected='selected'"; ?>><?php _e('12 Hours' ,'SimpleBusinessHours'); ?></option>
					<option value="24" <?php if($Settings['time_format'] == 24) echo "selected='selected'"; ?>><?php _e('24 Hours' ,'SimpleBusinessHours'); ?></option>
				</select>				</td>
		</tr>
		<!--<tr>
			<td><?php //_e('Default Business Location' ,'SimpleBusinessHours'); ?></td>
			<td><strong>:</strong></td>
			<td>
				<select id="default_business_lcation" name="default_business_lcation">
					<option value="1" <?php //if($Settings['default_business_lcation'] == 1) echo "selected='selected'"; ?>><?php //_e('Loc 1' ,'SimpleBusinessHours'); ?></option>
					<option value="2" <?php //if($Settings['default_business_lcation'] == 2) echo "selected='selected'"; ?>><?php //_e('Loc 2' ,'SimpleBusinessHours'); ?></option>
				</select>				</td>
		</tr>-->
		<tr>
			<td></td>
			<td></td>
			<td><button type="submit" id="save-settings" name="save-settings" class="btn btn-primary"><?php _e('Save Settings' ,'SimpleBusinessHours'); ?></button></td>
		</tr>
	</table>
</form>
<?php // save n update settings
if(isset($_POST['save-settings']))
{
	$_SESSION['ActiveTab'] = "sbh-settings";
	$BusinessStartDay = $_POST['business_start_day'];
	$DisplaySettings = 'vertical'; //$_POST['display_settings'];
	$DayNameAs = 'short'; // $_POST['day_name_as'];
	$TimeFormat = $_POST['time_format'];
	$DefaultBusinessLocation = '1'; //$_POST['default_business_lcation'];
	$sbh_settings_array = array(
		'business_start_day' => $BusinessStartDay,
		'display_settings' => $DisplaySettings,
		'day_name_as' => $DayNameAs,
		'time_format' => $TimeFormat,
		'default_business_lcation' => $DefaultBusinessLocation,
	);
	if(update_option('sbh_settings_array', $sbh_settings_array)){
		echo "<script>alert('" . __('Settings successfully saved.' ,'SimpleBusinessHours') . "');</script>";
		echo "<script>location.href='?page=spl-biz-hrs-dashboard';</script>";
	}
	else{
		echo "<script>alert('" . __('No updates made.' ,'SimpleBusinessHours') . "');</script>";
	}
}?>