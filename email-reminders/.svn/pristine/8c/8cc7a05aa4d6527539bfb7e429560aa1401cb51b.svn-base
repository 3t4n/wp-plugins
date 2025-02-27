<?php /**
 * @version 1.0
 * @description CRON
 * @category  CRON - Views and Filters
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CRON - Listing - View in  Reminders
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Actions for showing View --------------------------------------------------------------------------------------------

/**
 * Template View of CRON   L A B E L S   for Reminders Item in  Reminders listing page
 */
function opera_show_cron_times_in_reminders_listing_template(){

	/**
		advanced: {
					send_week0: "On"
					send_week1: "Off"
					send_week2: "Off"
					send_week3: "Off"
					send_week4: "Off"
					send_week5: "Off"
					send_week6: "On"
					time_from: "13:00"
					time_to: "15:00"
	 */
    ?>
	<div class="opera_reminders_top_data_line">
		<# if (  ( undefined != data['advanced'] ) ) {

			<?php // Time to Send ----------------------------------------------------------------------------------- ?>
			if ( undefined != data['advanced']['time_from'] )  { #>
				{{{ my_content_data( {  "key": '<?php _e('Time to send', 'email-reminders'); ?>',
										"value": data['advanced']['time_from'] + ' - ' + data['advanced']['time_to'],
										"keyword": data['__search_request_keyword__'] } )
				}}}
			<# }

			<?php // Week days to Send ------------------------------------------------------------------------------ ?>
			var sending_weekdays = '';
			<?php
			$week_days = array(
								  _x( 'Su', 'Sunday', 'email-reminders' )
								, _x( 'Mo', 'Monday', 'email-reminders' )
								, _x( 'Tu', 'Tuesday', 'email-reminders' )
								, _x( 'We', 'Wednesday', 'email-reminders' )
								, _x( 'Th', 'Thursday', 'email-reminders' )
								, _x( 'Fr', 'Friday', 'email-reminders' )
								, _x( 'Sa', 'Saturday', 'email-reminders' )
						);
			foreach ( $week_days as $day_num => $day_title ) {
				?>
					if ( ( undefined != data['advanced']['send_week<?php echo $day_num; ?>'] )  &&  ( 'On' == data['advanced']['send_week<?php echo $day_num; ?>'] )  ){
						sending_weekdays +=  '<?php echo $day_title ?>, ';
					}
				<?php
			}
			?>
			sending_weekdays = sending_weekdays.substr( 0, ( sending_weekdays.length - 2 ) );
			if ( '' != sending_weekdays ) { #>
				{{{ my_content_data( {  "key": '<?php _e('Weekdays to send', 'email-reminders'); ?>',
										"value": sending_weekdays,
										"keyword": data['__search_request_keyword__'] } )
				}}}
			<# } #>
			<?php
			$reminders_events = opera_get_cron_event__for_reminder();
			if ( empty( $reminders_events ) ) {
				?>
				<span class="oper_small_label_group"><span class="oper_label oper_label_cron_reset"><?php _e('Cron disabled', 'email-reminders'); ?></span></span>
				<?php
			} else {
				?>
				<#
					var time_to_send_seconds =	opera_get_next_time_to_send(
																	   <?php echo  strtotime( date_i18n( 'Y-m-d H:i:s' ) ); 	// Timestamp - Local Time in seconds since 1970 ?>
																	, data['advanced'] 									<?php 	// Conditions:: [send_week0:"On",.. time_from: "13:00", time_to: "15:00" ]?>
																);

					var time_to_send = opera_get_days_hours_minutes_from_seconds( time_to_send_seconds );	// [ d, h, m, s]
					var time_to_send_title = '';

					if ( 0 == time_to_send_seconds ) {
						time_to_send_title += '<?php _e( 'now', 'email-reminders' ); ?>';
					} else {
						if ( time_to_send[0] > 0 ) {
							time_to_send_title += time_to_send[0] + ' <?php _e( 'day(s)', 'email-reminders' ); ?> ';
						}
						if ( time_to_send[1] > 0 ) {
							time_to_send_title += time_to_send[1] + ' <?php _e( 'hour(s)', 'email-reminders' ); ?> ';
						}
						if ( time_to_send[2] > 0 ) {
							time_to_send_title += time_to_send[2] + ' <?php _e( 'minute(s)', 'email-reminders' ); ?> ';
						}
						if ( time_to_send[3] > 0 ) {
							time_to_send_title += time_to_send[3] + ' <?php _e( 'second(s)', 'email-reminders' ); ?> ';
						}
					}

				#>
				<span class="oper_small_label_group"><strong><?php _e('Cron will send in', 'email-reminders'); ?></strong>: <span class="oper_label oper_label_cron_run">{{time_to_send_title}}</span></span>
				<?php /* ?>
				{{{ my_content_data( {  "key": '<?php _e('Cron will send', 'email-reminders'); ?>',
										"value": time_to_send_title ,
										"keyword": data['__search_request_keyword__'] } )
				}}}
				<?php */ ?>
			<?php
			}
			?>
		<# } #>
	</div>
	<hr/>
    <?php
}
add_action('opera_show_cron_times_in_reminders_listing_template', 'opera_show_cron_times_in_reminders_listing_template');


/**
 * Show container in Head of Reminders page - its will  show when next  CRON for sending emails will  execute and how many  emails can be sent.
 */
function opera_reminders_cron_view(){

	// Get scheduled events
	$reminders_events = opera_get_cron_event__for_reminder();
	/**
	 * $reminders_events = Array (
									[0] => Array
										(
											[opera_cron_hook__reminders_send-40cd750bba9870f18aada2478b24840a-1587300548] => stdClass Object
												(
													[hook] => opera_cron_hook__reminders_send
													[time] => 1587300548
													[sig] => 40cd750bba9870f18aada2478b24840a
													[args] => Array()
													[schedule] => opera_cron_reminders_interval
													[interval] => 60
													[cron_local_time] => 2020-04-19 15:49:08
													[cron_after_time] => 3 seconds
												)
										)
	  								...
	 */

	$item = array();
	if ( empty( $reminders_events ) ) {
		// No events,  yet
	} else {

		foreach ( $reminders_events as $key => $event ) {

			$item[ $event->hook ] = array(
				'cron_local_time' => $event->cron_local_time,
				'cron_after_time' => $event->cron_after_time
			);
		}
	}
	/**
	 *  $item =  Array (
						[opera_cron_hook__reminders_send] => Array (
																	[cron_local_time] => 2020-04-19 15:49:08
																	[cron_after_time] => 3 seconds
																)
				)

	 */

    ?>
	<div id="opera_reminders__cron__container" class="opera_reminders__cron__container"></div>
    <script type="text/javascript">
		<?php // Templates Section  ?>
		/**
		 * Show Add New Rule section
		 *
		 * @param json_param_obj		- JSON object
		 */
		function oper_reminders__cron__show( json_param_obj ){

		//console.log( 'json_param_obj' , json_param_obj );

			var opera_reminders__cron__template = wp.template( 'opera_reminders__cron__template' );

			jQuery( '.opera_reminders__cron__container' ).html( opera_reminders__cron__template( json_param_obj ) );
		}

		<?php // End Templates Section  ?>
        </script>
		<script type="text/javascript">
			jQuery( document ).ready( function (){

				oper_reminders__cron__show( <?php

								echo wp_json_encode(
													array(
																'cron_local_time' => $item['opera_cron_hook__reminders_send']['cron_local_time'],
																'cron_after_time' => $item['opera_cron_hook__reminders_send']['cron_after_time']
													) );
										?>  );
			} );
		</script>
    <?php
}
add_action( 'oper_reminders_listing_container_start', 'opera_reminders_cron_view');


/**
 * Template 					--  Add New Rule section  --
 * inserted at footer of page
 *
 * @param $page string
 */
function opera_reminders__in_page_templates( $page ) {

	if ( 'oper-reminders' === $page ) {

		?><script type="text/html" id="tmpl-opera_reminders__cron__template">
				<?php /* ?>
				<# _.each( data.rules_int, function ( p_val, p_key, p_data ) { #>

					Rules {{p_key}}: <span class="oper_label">{{p_val}}</span><br/>

				<# }); #>
				<?php */ ?>
				<?php
				$reminders_events = opera_get_cron_event__for_reminder();
				if ( empty( $reminders_events ) ) {
					?>
					<span class="oper_small_label_group">
						<span class="oper_label oper_label_cron_reset">
							<a href="<?php echo  esc_url(  oper_get_settings_url() . '&tab=oper-rules-automate' ); ?>"><?php
								_e('Automate emails sending (CRON) disabled', 'email-reminders');
							?></a>
						</span>
					</span>
					<?php
				} else {
					?><span  class="oper_small_label_group"><strong><?php printf( __('Automate %s emails sending at','email-reminders'), '<span style="color: #808c9f;font-size: 1em;background: #e4e4e4;padding: 0 3px 1px;border-radius: 2px;">' . get_oper_option( 'opera_cron_reminders_check_num' ) . '</span>' ); ?></strong>: <span class="oper_label"><a href="<?php echo  esc_url(  oper_get_settings_url() . '&tab=oper-rules-automate' ); ?>">{{data.cron_local_time}} ({{{data.cron_after_time}}})</a></span></span><?php
					/* ?><span  class="oper_small_label_group"><strong><?php _e('Emails to send','email-reminders'); ?></strong>: <span class="oper_label"><?php echo get_oper_option( 'opera_cron_reminders_check_num' ); ?></span></span><?php */
				}
				?>
		</script><?php
	}
}
add_action( 'oper_hook_settings_page_footer', 'opera_reminders__in_page_templates' );



/**
 * Get Cron Event(s)  for Reminders
 *
 * @param string $cron_hook		default value = 'opera_cron_hook__reminders_send'
 *
 * @return array
 */
function opera_get_cron_event__for_reminder( $cron_hook = 'opera_cron_hook__reminders_send' ) {

	$all_my_events = opera_get_cron_events();

	$rule_events_arr = array();

	if ( ! is_wp_error( $all_my_events ) ) {
		foreach ( $all_my_events as $key => $event_arr ) {

			if (
				   ( $cron_hook === $event_arr->hook )
			){
				$rule_events_arr[ $key ] = $event_arr;
			}
		}
	}

	return $rule_events_arr;
}