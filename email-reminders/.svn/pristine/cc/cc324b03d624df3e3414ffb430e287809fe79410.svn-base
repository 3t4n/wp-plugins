<?php /**
 * @version 1.0
 * @description CRON- automate of actions.
 * @category    Schedule CRONs
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-04-06
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                                         // Exit if accessed directly


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CRON functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Hook function to execute after after clicking "Save changes" to  Enable Sending Reminders
 *
 */
function opera_reschedule_cron__for_reminders(){

	$cron_hook_name = 'opera_cron_hook__reminders_send';        // Its function name that  will  call in    do_action()

	$is_enabled = get_oper_option( 'opera_cron_reminders_enabled' );
	$is_enabled = ( empty( $is_enabled ) ) ? 'On' : $is_enabled;

	if ( 'On' != $is_enabled ) {                                                                        // Remove event

		$is_success = opera_cron__unschedule_cron( $cron_hook_name, array() );
	} else {                                                                                            // New Event

		$next_time  = date_i18n( 'Y-m-d H:i:s' );
		$recurrence = 'opera_cron_reminders_interval';

		$is_success = opera_cron__schedule_cron( $cron_hook_name, $next_time, $recurrence , array() );
	}
}
add_action( 'opera_cron_settings_saved', 'opera_reschedule_cron__for_reminders' );


/**
 * Define own Cron Times intervals
 *
 * @param $schedules
 *
 * @return mixed
 */
function opera_cron_add_reminders_schedule_times( $schedules ) {

	$recurrence_seconds = get_oper_option( 'opera_cron_reminders_interval' );		// 300 - its means 300 sec
	$recurrence_seconds = ( ! empty( $recurrence_seconds ) ) ? $recurrence_seconds : opera_get_default_options( 'opera_cron_reminders_interval' );

	$schedules[ 'opera_cron_reminders_interval' ] = array(
		'interval' => $recurrence_seconds,
		'display'  => __( 'Once every', 'email-reminders' ) . ' ' . opera_time_interval( $recurrence_seconds )
	);

	return $schedules;
}
add_filter( 'cron_schedules', 'opera_cron_add_reminders_schedule_times' );

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Shortcode real functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Our real function for executing on CRON hook run -- Send Reminders
 *
 */
function opera_cron__reminders_send_execute() {

	$args = array(
					  'is_silent' 	=> true         // Is show any  text  in page,  after  shortcode execution
					, 'status'      => 'init'       // 'init'   |   'sent'      <=  Status of Reminders
					, 'max_count'   => 50           // Max number of reminders to  send, during execution  of shortcode  - its reminder_id  in Database,  where to  start SELECT reminders
					, 'start_num'   => 0            // Start from N reminders to  send - shift
					, 'keyword'     => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico|Brazil'           <=  |   Work  as OR     - Find all  variants, like USA and Canada
					, 'not_keyword' => ''           //  ''      |   'United States'     |   'United States|Canada|Mexico|Brazil'           <=  |   Work  as AND    - Find variants,  that does not contain  USA and Canada
				);

	$max_count         = get_oper_option( 'opera_cron_reminders_check_num' );
	$args['max_count'] = ( ! empty( $max_count ) ) ? $max_count : $args['max_count'];

	oper_shortcode_reminders( $args );
}
add_action( 'opera_cron_hook__reminders_send', 'opera_cron__reminders_send_execute', 10, 0 );                           // Run function after action Cron Hook




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Filters -    RUN  in  oper_shortcode_reminders() function    in      CRON    or      SHORTCODE
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/**
 *  Filter Reminders - get only emails that FIT to advanced parameter (if exist), relative sending times and weekdays
 *
 * @param $item = Array (
							[0] => Array (
									[reminder_id] => 30
									[status] => init
									[run_date] => 2020-04-18 15:28:00
									[advanced] => Array (
															[time_from] => 17:00
															[time_to] => 24:00
															[send_week0] => Off
															[send_week1] => On
															[send_week2] => On
															[send_week3] => On
															[send_week4] => On
															[send_week5] => On
															[send_week6] => On
														)
									[action] => none
									[email_template] =>
									[contact_id] => 1000
									[rules_id] => 45
									[re_create_date] => 2020-04-18 15:00:19
									[_store] =>
 									...
								)
							[1] => Array( ...
							...
 *
 * @return array
 */
function opera_get_reminders_fit_to_send_time_arr( $reminders_arr ){

	$filtered_arr = array();

	foreach ( $reminders_arr as $reminder ) {

		if (
			 	( ! empty( $reminder['advanced'] ) )
			 && ( ! empty( $reminder['advanced']['time_from'] ) )
			 && ( ! empty( $reminder['advanced']['time_to'] ) )
		){
			$can_it_be_send = opera_is_reminder_can_be_send( $reminder['advanced'] );

			if ( $can_it_be_send ) {
				$filtered_arr[] = $reminder;
			}

		} else {
			// There is no Times to  send for such reminder,  so  we can  send it now
			$filtered_arr[] = $reminder;
		}
	}
	return $filtered_arr;
}
add_filter('opera_get_reminders_fit_to_send_time', 'opera_get_reminders_fit_to_send_time_arr', 10, 1 );


/**
 * Check if reminder can be send depend from  conditions and TODAY time
 *
 * @param $condition_arr		= Array (
											[time_from] => 17:00
											[time_to]   => 24:00
											[send_week0] => Off
											[send_week1] => On
											[send_week2] => On
											[send_week3] => On
											[send_week4] => On
											[send_week5] => On
											[send_week6] => On
										)
 *
 * @return bool
 */
function opera_is_reminder_can_be_send( $condition_arr ){

	$local_ts = strtotime( date_i18n( 'Y-m-d H:i:s' ) ); 	// Timestamp - Local Time in seconds since 1970


	////////////////////////////////////////////////////////////////////////
	$time_from = explode( ':', $condition_arr[ 'time_from' ] );
	$time_from[0] = intval( $time_from[0] );
	$time_from[1] = intval( $time_from[1] );

	$time_to = explode( ':', $condition_arr[ 'time_to' ] );
	$time_to[0] = intval( $time_to[0] );
	$time_to[1] = intval( $time_to[1] );
	if ( ( 24 == $time_to[0] ) && ( 0 == $time_to[1] ) ){
		$time_to = array( 23, 59 );
	}
	////////////////////////////////////////////////////////////////////////

	$current_weekday = date_i18n( 'w' );			//	0 (for Sunday) through 6 (for Saturday)

	$closest = array();
	$closest['min_diff'] = 8 * ( 24 * 60 * 60 );    // 8 days

	// Its array of start/ end times  for Next week starting from  today.
	$next_week = array();

	for( $day_shift = 0; $day_shift < 7; $day_shift++) {

		if  (
			   ( ! empty( $condition_arr[ 'send_week' . $current_weekday ] ) )
			&& ( 'On' == $condition_arr[ 'send_week' . $current_weekday ] )
		){

			$next_week[ $current_weekday ] = array();

			$check_date = strtotime( '+ ' . $day_shift . ' day', $local_ts );

			// Set Start hours
			$check_date_ts = gmmktime( $time_from[0], $time_from[1], 0
									,  date_i18n( 'n',  $check_date)
									,  date_i18n( 'j',  $check_date)
									,  date_i18n( 'Y',  $check_date)
						);
			$next_week[ $current_weekday ][] = $check_date_ts - $local_ts;

			// Set End hours
			$check_date_ts = gmmktime( $time_to[0], $time_to[1], 0
									,  date_i18n( 'n',  $check_date)
									,  date_i18n( 'j',  $check_date)
									,  date_i18n( 'Y',  $check_date)
						);
			$next_week[ $current_weekday ][] = $check_date_ts - $local_ts;

			// If start time less than now time (its negative value,
			// and END time is higher than now time,  its positive value,
			// -- its means that  we can  send it NOW
			if (
					(  $next_week[ $current_weekday ][0]  < 0 )
				&&  (  $next_week[ $current_weekday ][1]  > 0 )
			){
				//return 'now';
				return true;
			}

			// Get closest timestamp
			if (  $next_week[ $current_weekday ][0] < $closest['min_diff'] ) {

				$closest['min_diff'] = $next_week[ $current_weekday ][0];

				$closest['week_day'] =  $current_weekday;

				$check_date_ts = gmmktime( $time_from[0], $time_from[1], 0
										,  date_i18n( 'n',  $check_date)
										,  date_i18n( 'j',  $check_date)
										,  date_i18n( 'Y',  $check_date)
							);


				$closest['timestamp'] 	=  $check_date_ts;
				$closest['date'] 		= date_i18n( 'Y-m-d H:i:s', $check_date_ts );
				$closest['diff_in_sec'] = $check_date_ts - $local_ts;
				$closest['diff_in_h'] 	= opera_get_days_hours_minutes_from_seconds( $closest['diff_in_sec'] );
			}
		}

		$current_weekday++;
		if ( $current_weekday > 6 ){
			$current_weekday = 0;
		}

	}

//debuge( $closest, $condition_arr , $next_week );

	return false;
}


/**
 * Get array of Days, Hours, Minutes, Seconds, based on  seconds value
 * @param int seconds
 * @returns array(
					'd' => $days,
					'h' => $hours,
					'm' => $minutes,
					's' => $rest_seconds
				);
 */
function opera_get_days_hours_minutes_from_seconds( $seconds ){

	$days 			= intval( floor( $seconds / ( 60 * 60 * 24 ) ) );
	$hours 			= intval( floor( ( $seconds - ( $days * 60 * 60 * 24 ) ) / ( 60 * 60 ) ) );
	$minutes 		= intval( floor( ( $seconds - ( $days * 60 * 60 * 24 ) - ( $hours * 60 * 60 ) ) / ( 60 ) ) );
	$rest_seconds 	= intval( floor( ( $seconds - ( $days * 60 * 60 * 24 ) - ( $hours * 60 * 60 ) - ( $minutes * 60 ) ) ) );

	return array(
					'd' => $days,
					'h' => $hours,
					'm' => $minutes,
					's' => $rest_seconds
				);
}