<?php

add_shortcode( 'APPOINTPRESS', 'appointpress_shortcode' );

function appointpress_shortcode()
{
	$ApAccDetails = unserialize(get_option('appointpress_account_details'));
	if($ApAccDetails['appointpress_status'] == 'invalid' || $ApAccDetails['appointpress_status'] == '')
	{
		?><div class="alert-appointpress alert-appointpress-danger">
			<strong><?php _e('Error! Invalid AppointPress Account Details.','appointpress'); ?><br>
			<?php _e('SignUp For Free AppointPress Account','appointpress'); ?>
			<a href="http://appointpress.com/pricing/" title="<?php _e('Signup For New Appointpress Account','appointpress'); ?>" target="_blank"><?php _e('HERE','appointpress'); ?></a></strong>
		</div>
		<?php
	}
	else if($ApAccDetails['appointpress_business_url'] != '')
	{
		?>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script>
		jQuery(document).ready(function() {
			jQuery('#Firstappointpress-modal').hide();
			
			jQuery('#scheduleapp').click(function() {
				jQuery('#Firstappointpress-modal').show();
			});
			
			jQuery('#close').click(function() {
				jQuery('#Firstappointpress-modal').hide();
			});
			
		});
		</script>
		<?php 
			if($ApAccDetails['appointpress_booking_button_color'] == '')
			{
				$ApAccDetails['appointpress_booking_button_color'] = 'appointpress_btn-primary';
			}
		?>
		<br>
		<div align="center" style="padding-bottom:20px;">
			<button name="scheduleapp" id="scheduleapp"  class="appointpress_btn <?php echo $ApAccDetails['appointpress_booking_button_color']; ?> <?php echo $ApAccDetails['appointpress_booking_button_size']; ?>" type="button" >
				<strong><?php 
						if($ApAccDetails['appointpress_booking_button_text'] != '')
						{ echo $ApAccDetails['appointpress_booking_button_text']; }
						else
						{ _e('Schedule New Appointment', 'appointPress'); }
				 ?></strong>
			</button>
		</div>
		
		<div class="appointpress-modal" id="Firstappointpress-modal" style="display:none; z-index:9999; left: 30%;">
			<div class="appointpress-modal-info">
				<div style="float:right; margin-top:15px; margin-right:20px;">
					<a id="close"><i class="icon-appointpress-remove"></i></a>
				</div>
				<div class="alert-appointpress alert-appointpress-info">
					<h4><?php _e('AppointPress', 'appointPress'); ?></h4>
				</div>
			</div>
			
			<div class="appointpress-modal-body" style="z-index:9999; margin-top:-10px; width:97%; height:100%;">
				<iframe style="border:0px;" width="100%" height="420px" src="<?php echo $ApAccDetails['appointpress_business_url']; ?>"></iframe>
			</div>
		</div>
		<?php
	}
}
?>
