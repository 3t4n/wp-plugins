<?php
@session_start();
global $wpdb;
if(isset($_SESSION['ActiveTab'])) { $ActiveTab = $_SESSION['ActiveTab']; } else { $ActiveTab = "sbh-hrs"; }
$Settings = get_option('sbh_settings_array');
$DateFormat = "d-m-Y";
if($Settings)
{
	if($Settings['time_format'] == '12')
	{
		$TimeFormat = "h:i";
	}
	
	if($Settings['time_format'] == '24')
	{
		$TimeFormat = "H:i";
	}
}
?>
<style type='text/css'> .error{ color:#FF0000; }</style>
<div class="bs-docs-example">
	<ul class="nav nav-tabs" id="myTab">
	  <li class="<?php if($ActiveTab == "sbh-hrs") echo "active"; ?>"><a data-toggle="tab" href="page=spl-biz-hrs-dashboard#sbh-hrs"><strong><?php _e('Business Hours' ,'SimpleBusinessHours'); ?></strong></a></li><!--tab-1-->
	  <li class="<?php if($ActiveTab == "sbh-settings") echo "active"; ?>"><a data-toggle="tab" href="page=spl-biz-hrs-dashboard#sbh-settings"><strong><?php _e('Settings' ,'SimpleBusinessHours'); ?></strong></a></li><!--tab-2-->
	  <!--<li class="<?php if($ActiveTab == "sbh-holiday") echo "active"; ?>"><a data-toggle="tab" href="#sbh-holiday"><strong><?php _e('Holiday / TimeOff / Close' ,'SimpleBusinessHours'); ?></strong></a></li>--><!--tab-3-->
	  <!--<li class="<?php if($ActiveTab == "sbh-location") echo "active"; ?>"><a data-toggle="tab" href="#sbh-location"><strong><?php _e('Locations' ,'SimpleBusinessHours'); ?></strong></a></li>--><!--tab-4-->
	  <li class="<?php if($ActiveTab == "sbh-help") echo "active"; ?>"><a data-toggle="tab" href="page=spl-biz-hrs-dashboard#sbh-help"><strong><?php _e('Help & Support' ,'SimpleBusinessHours'); ?></strong></a></li><!--tab-5-->
	</ul>
			
	<div class="tab-content" id="myTabContent">

	  
	  <!--tab-1-->
	  <div id="sbh-hrs" class="tab-pane fade <?php if($ActiveTab == "sbh-hrs") echo "in active"; ?>">
		<?php include('sbh-business-hours.php'); ?>
	  </div>
	  
	  
	  <!--tab-2-->
	  <div id="sbh-settings" class="tab-pane fade <?php if($ActiveTab == "sbh-settings") echo "in active"; ?>">
		<?php include('sbh-settings.php'); ?>
	  </div>
	  
	  
	  <!--tab-3-->
	  <div id="sbh-holiday" class="tab-pane fade <?php if($ActiveTab == "sbh-holiday") echo "in active"; ?>">
	  	<?php //include('sbh-holidays.php'); ?>
	  </div>
	  
	  
	   <!--tab-4-->
	  <div id="sbh-location" class="tab-pane fade <?php if($ActiveTab == "sbh-location") echo "in active"; ?>">
		<?php //include('sbh-locations.php'); ?>	
	  </div>
	  
	  
	  <!--tab-5-->
	  <div id="sbh-help" class="tab-pane fade <?php if($ActiveTab == "sbh-help") echo "in active"; ?>">
		<?php include('sbh-help-support.php'); ?>
	  </div>
	  
<?php if($TimeFormat == 'h:i') { $TimePickerFormat = 'hh:mm TT'; $Tflag = 'true'; } 
if($TimeFormat == 'H:i') { $TimePickerFormat = 'hh:mm'; $Tflag = 'false'; }  ?>
<script type="text/javascript">
	jQuery(document).ready(function () {
	
		//show holiday modal
		jQuery('#add-holiday').click(function(){
			jQuery('#AddHolidayModal').show();
		});
		
		//show location modal
		jQuery('#add-location').click(function(){
			jQuery('#AddLocationModal').show();
		});
		
		//hide holiday modal
		jQuery('#close-modal').click(function(){
			jQuery('#AddHolidayModal').hide();
			
		});
		//hide location modal
		jQuery('#close-modal2').click(function(){
			jQuery('#AddLocationModal').hide();
			
		});
		
		<!---load date and time picker--->
		jQuery('#start_time_h').timepicker({
			ampm: <?php echo $Tflag; ?>, //put T/F without quote
			timeFormat: '<?php echo $TimePickerFormat; ?>',
			stepMinute: 5,
		});
			
		jQuery('#end_time_h').timepicker({
			ampm: <?php echo $Tflag; ?>,
			timeFormat: '<?php echo $TimePickerFormat; ?>',
			stepMinute: 5,
		});
			
		jQuery('#start_date_h').datepicker({
			minDate: 0,
			dateFormat: 'dd-mm-yy',
		});
			
		jQuery('#end_date_h').datepicker({
			dateFormat: 'dd-mm-yy',
			minDate: 0,
		});
			
		jQuery('#event_date').datepicker({
			dateFormat: 'dd-mm-yy',
			minDate: 0,
		});
		
		<!--holiday validation-->
		jQuery('#add-new-holiday').click(function() {
			jQuery(".error").hide();
		
			//name
			var title_hVal = jQuery("#title_h").val();
			if(title_hVal == ''){
				jQuery("#title_h").after('<span class="error"><br><strong><?php _e('Title required.','SimpleBusinessHours'); ?></strong></span>');
				return false;
			}
			
			//start date
			var start_date_h = jQuery("#start_date_h").val();
			if(start_date_h == ''){
				jQuery("#start_date_h").after('<span class="error"><br><strong><?php _e('Start date required.','SimpleBusinessHours'); ?></strong></span>');
				return false;
			}
			
			//end date
			var end_date_h = jQuery("#end_date_h").val();
			if(end_date_h == ''){
				jQuery("#end_date_h").after('<span class="error"><br><strong><?php _e('End date required.','SimpleBusinessHours'); ?></strong></span>');
				return false;
			}
			
			var repeat = jQuery("#repeat").val();
			if(repeat != 'allday')
			{
				//start time
				var start_time_h = jQuery("#start_time_h").val();
				if(start_time_h == ''){
					jQuery("#start_time_h").after('<span class="error"><br><strong><?php _e('Start time required.','SimpleBusinessHours'); ?></strong></span>');
					return false;
				}
				
				//end time
				var end_time_h = jQuery("#end_time_h").val();
				if(end_time_h == ''){
					jQuery("#end_time_h").after('<span class="error"><br><strong><?php _e('End time required.','SimpleBusinessHours'); ?></strong></span>');
					return false;
				}
			}
		});
		
		<!--location validation-->
		jQuery('#add-new-location').click(function() {
			jQuery(".error").hide();
		
			//location name
			var location_l = jQuery("#location_l").val();
			if(location_l == ''){
				jQuery("#location_l").after('<span class="error"><br><strong><?php _e('Location name required.','SimpleBusinessHours'); ?></strong></span>');
				return false;
			}
			
		});
		
		//select all checkbox for multiple delete
		jQuery('#checkbox').click(function(){
			if(jQuery('#checkbox').is(':checked'))
			{
				jQuery(":checkbox").prop("checked", true);
			}
			else
			{
				jQuery(":checkbox").prop("checked", false);
			}
		});

	});
</script>
	</div><!--myTabContent-end-->
</div>