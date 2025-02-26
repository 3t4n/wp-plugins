<?php $Holidaytable = $wpdb->prefix . "sbh_holidays";
$AllHolidays = $wpdb->get_results("SELECT * FROM `$Holidaytable`"); 
if($TimeFormat == "h:i")
{
	$DisplayTimeFormat = "g:i A";
}
if($TimeFormat == "H:i")
{
	$DisplayTimeFormat = "G:i";
}?>
<form action="" method="post" name="Holiday-From" id="Holiday-From">
<table width="100%" class="table table-hover">
  <tr>
	<th scope="col"><button type="button" id="add-holiday" name="add-holiday" class="btn btn-primary"><?php _e('Add New - Holiday / TimeOff / Close' ,'SimpleBusinessHours'); ?></button></th>
	<th scope="col">&nbsp;</th>
	<th scope="col">&nbsp;</th>
	<th scope="col">&nbsp;</th>
	<th scope="col">&nbsp;</th>
	<th scope="col">&nbsp;</th>
  </tr>
  <tr>
	<th scope="col"><?php _e('Title' ,'SimpleBusinessHours'); ?></th>
	<th scope="col"><?php _e('Date' ,'SimpleBusinessHours'); ?></th>
	<th scope="col"><?php _e('Time' ,'SimpleBusinessHours'); ?></th>
	<th scope="col"><?php _e('Type' ,'SimpleBusinessHours'); ?></th>
	<th scope="col"><?php _e('Action' ,'SimpleBusinessHours'); ?></th>
	<th scope="col"><a href="#" rel="tooltip" title="<?php _e('Select All','SimpleBusinessHours'); ?>" >
<input type="checkbox" id="checkbox" name="checkbox[]" value="0" /></a></th>
  </tr>
  <?php if($AllHolidays)
  {
  	foreach($AllHolidays as $Holidays)
		{?>
  <tr>
	<td><?php echo ucwords($Holidays->title); ?></td>
	<td><?php echo date("jS", strtotime($Holidays->start_date))." - ".date("jS M, Y", strtotime($Holidays->end_date)); ?></td>
	<td><?php  if($Holidays->repeat == 'allday'){ echo _e('All Day' ,'SimpleBusinessHours'); } 
				else { echo date($DisplayTimeFormat, strtotime($Holidays->start_time))." To ".date($DisplayTimeFormat, strtotime($Holidays->end_time)); } ?></td>
	<td><?php if($Holidays->repeat == 'none') echo _e('None' ,'SimpleBusinessHours'); ?>
		<?php if($Holidays->repeat == 'allday') echo _e('All Day' ,'SimpleBusinessHours'); ?>
		<?php if($Holidays->repeat == 'daily') echo _e('Daily ' ,'SimpleBusinessHours'); ?>
		<?php if($Holidays->repeat == 'weekly') echo _e('Weekly' ,'SimpleBusinessHours'); ?>
		<?php if($Holidays->repeat == 'biweekly') echo _e('Bi Weekly' ,'SimpleBusinessHours'); ?>
		<?php if($Holidays->repeat == 'monthly') echo _e('Monthly' ,'SimpleBusinessHours'); ?>	</td>
	<td><a href="?page=spl-biz-hrs-dashboard&removeholiday=<?php echo $Holidays->id; ?>"><i class="icon-remove"></i></a></td>
	<td><a title="Select All" rel="tooltip" href="#"><input type="checkbox"  value="<?php echo $Holidays->id; ?>" id="checkbox[]" name="checkbox[]"></a></td>
  </tr>
  <?php }
  } ?>
  <tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><button name="deleteallholidays" class="btn btn-primary" type="submit" id="deleteallholidays" onclick="return confirm('<?php _e('Do you want to delete all selected holidays?','SimpleBusinessHours'); ?>')" ><?php _e('Delete','appointzilla'); ?></button></td>
  </tr>
</table>
</form>

<div id="AddHolidayModal" style="display:none;">
	<div class="modal" id="myModal">
		<form action="" method="post" name="AddHolidayModal-From" id="AddHolidayModal-From">
			<div class="modal-header">
				<button type="button" id="close-modal" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<div><h4><?php _e('Add New - Holiday / TimeOff / Close','SimpleBusinessHours'); ?></h4></div>
			</div>
			
			<div class="modal-body">
				<table class="table" width="100%">
				  <tr>
					<th scope="row"><?php _e('Title','SimpleBusinessHours'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="title_h" id="title_h" type="text" style="height:30px;" /></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Repeat','SimpleBusinessHours'); ?></th>
					<td><strong>:</strong></td>
					<td><select id="repeat" name="repeat" onchange="Setrepeat()">
							<option value="none"><?php _e('None' ,'SimpleBusinessHours'); ?></option>
							<option value="allday"><?php _e('All Day' ,'SimpleBusinessHours'); ?></option>
							<option value="daily"><?php _e('Daily' ,'SimpleBusinessHours'); ?></option>
							<option value="weekly"><?php _e('Weekly' ,'SimpleBusinessHours'); ?></option>
							<option value="biweekly"><?php _e('Bi Weekly' ,'SimpleBusinessHours'); ?></option>
							<option value="monthly"><?php _e('Monthly' ,'SimpleBusinessHours'); ?></option>
						</select></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Start Date','SimpleBusinessHours'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="start_date_h" id="start_date_h" type="text" style="height:30px;" /></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('End Date','SimpleBusinessHours'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="end_date_h" id="end_date_h" type="text" style="height:30px;" /></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('Start Time','SimpleBusinessHours'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="start_time_h" id="start_time_h" type="text" style="height:30px;" /></td>
				  </tr>
				  <tr>
					<th scope="row"><?php _e('End Time','SimpleBusinessHours'); ?></th>
					<td><strong>:</strong></td>
					<td><input name="end_time_h" id="end_time_h" type="text" style="height:30px;" /></td>
				  </tr>
				  <tr>
					<th scope="row">&nbsp;</th>
					<td>&nbsp;</td>
					<td><button type="submit" id="add-new-holiday" name="add-new-holiday" class="btn btn-primary"><?php _e('Create' ,'SimpleBusinessHours'); ?></button></td>
				  </tr>
				</table>
			</div>
		</form>
	</div>
</div>
<?php //save holidays
if(isset($_POST['add-new-holiday']))
{
	$_SESSION['ActiveTab'] = "sbh-holiday";
	global $wpdb;
	$HolidaysTable = $wpdb->prefix . "sbh_holidays";
	$title     = $_POST['title_h'];
	$repeat    = $_POST['repeat'];
	$start_date = $_POST['start_date_h'];
	$end_date  = $_POST['end_date_h'];
	// conveting format for db
	$start_date = date("Y-m-d", strtotime($start_date));
	$end_date  = date("Y-m-d", strtotime($end_date));
	$start_time = $_POST['start_time_h'];
	$end_time  = $_POST['end_time_h'];
	$Holiday_sql = "INSERT INTO `$HolidaysTable` (`id`, `title`, `repeat`, `start_date`, `end_date`, `start_time`, `end_time`, `status`) VALUES (NULL, '$title', '$repeat', '$start_date', '$end_date', '$start_time', '$end_time', '');";
	if($wpdb->query($Holiday_sql))
	{
		echo "<script>alert('" . __('Holiday successfully created.' ,'SimpleBusinessHours') . "');</script>";
		echo "<script>location.href='?page=spl-biz-hrs-dashboard';</script>";
	}
}

//remove holiday
if(isset($_GET['removeholiday']))
{
	$_SESSION['ActiveTab'] = "sbh-holiday";
	$RemoveId = $_GET['removeholiday'];
	if($wpdb->query("DELETE FROM `$Holidaytable` WHERE `id` = '$RemoveId'"))
	{
		echo "<script>alert('" . __('Holiday successfully deleted.' ,'SimpleBusinessHours') . "');</script>";
		echo "<script>location.href='?page=spl-biz-hrs-dashboard';</script>";
	}
}

// remove all selected holidays
if(isset($_POST['deleteallholidays']))
{
	$_SESSION['ActiveTab'] = "sbh-holiday";
	if(count($_POST['checkbox']))
	{
		for($i=0;$i<=count($_POST['checkbox'])-1;$i++)
		{
			$RemoveId = $_POST['checkbox'][$i];
			$wpdb->query("DELETE FROM `$Holidaytable` WHERE `id` = '$RemoveId'");
		}
		echo "<script>alert('" . __('Selected holidays successfully deleted.' ,'SimpleBusinessHours') . "');</script>";
	}
	else
	{
		echo "<script>alert('".__('No holidays selected to delete.','SimpleBusinessHours')."')</script>";
	}
	echo "<script>location.href='?page=spl-biz-hrs-dashboard';</script>";
}
?>
<script>
function Setrepeat()
{
	var repeat = jQuery("#repeat").val();
	if(repeat == "allday"){ Disabletimes();	} else { Enabletimes();}
}
function Disabletimes()
{
	jQuery('#start_time_h').attr("disabled", true);
	jQuery('#end_time_h').attr("disabled", true);
}
function Enabletimes()
{
	jQuery('#start_time_h').attr("disabled", false);
	jQuery('#end_time_h').attr("disabled", false);
}
</script>