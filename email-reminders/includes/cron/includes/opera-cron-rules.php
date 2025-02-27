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
// General  WP CRON schedules
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Schedule     next   C R O N
 *
 * @param $cron_hook_name       'opera_cron_hook__rule_run' - hook name for     add_action( 'opera_cron_hook__rule_run', 'opera_cron__rule_run_execute', 10, 1 );
 * @param $next_time            'now' or any value that work  for strtotime(),  like '2020-03-30 11:01:00'
 * @param $recurrence           'opera_cron_rules_run_schedule'   - values defined in  'opera_cron_add_schedule_times' function
 * @param $arg_arr              array( $params['rules_id'] )        ||  array of other number of parameters that  will  be passed to  add_action( 'opera_cron_hook__rule_run', 'opera_cron__rule_run_execute', 10, NN );
 *
 * @return bool|false|int       $timestamp if already defined,  or true on first  success add  or false on error adding
 */
function opera_cron__schedule_cron( $cron_hook_name, $next_time, $recurrence, $arg_arr ){

	//Convert start time from local time to GMT since WP Cron sends based on GMT
	$local_time = date_i18n( 'Y-m-d H:i:s', strtotime( $next_time ) );                                                  // $local_time = date_i18n( 'Y-m-d H:i:s', strtotime( '2020-03-30 11:01:00' ) );
	$gmt_timestamp = strtotime( get_gmt_from_date( $local_time ) . ' GMT' );                                            // time()
							/*
							// $gmt_time = date( 'Y-m-d H:i:s', $gmt_timestamp );
							// $converted_to_local_time = get_date_from_gmt(  $gmt_time );
							// debuge( '$local_time,$gmt_time', $local_time, $gmt_time );

							//debuge(   get_date_from_gmt( date( 'Y-m-d H:i:s', $timestamp ) )   );
							*/

	// Check if the event is already scheduled
	$timestamp = wp_next_scheduled( $cron_hook_name, $arg_arr  );

	$is_success_scheduled = $timestamp;

	if( $is_success_scheduled == false ){   // If false then make NEW schedule since it hasn't been done previously

	    // Schedule the event for right now, then to repeat 'WITH SOME PERIOD' using the hook $cron_hook_name = 'opera_cron_hook__rule_run'

		$is_success_scheduled = wp_schedule_event(    $gmt_timestamp , $recurrence , $cron_hook_name , $arg_arr );
    }

	return $is_success_scheduled;
}


/**
 * Remove   C R O N   Schedule   for Rule Run
 *
 * @param $cron_hook_name       'opera_cron_hook__rule_run' - hook name for     add_action( 'opera_cron_hook__rule_run', 'opera_cron__rule_run_execute', 10, 1 );
 * @param $arg_arr              array( $params['rules_id'] )        ||  array of other number of parameters that  will  be passed to  add_action( 'opera_cron_hook__rule_run', 'opera_cron__rule_run_execute', 10, NN );
 *
 * @return int|false On success an integer indicating number of events unscheduled (0 indicates no
 *                   events were registered with the hook and arguments combination), false if
 *                   unscheduling one or more events fail.

 */
function opera_cron__unschedule_cron( $cron_hook_name, $arg_arr ){

	$result_count = wp_clear_scheduled_hook(  $cron_hook_name, $arg_arr );

	return $result_count;
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Cron Times Intervals
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Save schedule interval for new rule configuration.
 *
 * @param string $cron_name     'opera_cron_hook__rule_run' || 'opera_cron_hook__rule_reset'
 * @param int $rules_id
 * @param int $recurrence_seconds
 */
function opera_cron_add_recurrence( $cron_name, $rules_id , $recurrence_seconds ){

	$my_schedules = get_oper_option( $cron_name );
	if ( empty( $my_schedules ) ) {
		$my_schedules = array();
	} else {
		$my_schedules = maybe_unserialize( $my_schedules );
	}

	$my_schedules[ $rules_id ] = $recurrence_seconds;

	update_oper_option( $cron_name, $my_schedules );
}


/**
 * Remove schedule interval for new rule configuration.
 *
 * @param string $cron_name     'opera_cron_hook__rule_run' || 'opera_cron_hook__rule_reset'
 * @param int $rules_id
 */
function opera_cron_remove_recurrence( $cron_name, $rules_id ){

	$my_schedules = get_oper_option( $cron_name );
	if ( ! empty( $my_schedules ) ) {
		$my_schedules = maybe_unserialize( $my_schedules );
	} else {
		$my_schedules = array();
	}

	if ( isset($my_schedules[ $rules_id ]) ){
		unset( $my_schedules[ $rules_id ] );
	}

	update_oper_option( $cron_name, $my_schedules );
}


/**
 * Define own Cron Times intervals
 *
 * @param $schedules
 *
 * @return mixed
 */
function opera_cron_add_schedule_times( $schedules ) {

	$cron_names = array( 'opera_cron_hook__rule_run', 'opera_cron_hook__rule_reset' );

	foreach ( $cron_names as $cron_name ) {

		$my_schedules = get_oper_option( $cron_name );
		if ( ! empty( $my_schedules ) ) {

			$my_schedules = maybe_unserialize( $my_schedules );
			if ( ! empty( $my_schedules ) ) {

				foreach ( $my_schedules as $rules_id => $recurrence_seconds ) {

					$schedules[ $cron_name . $rules_id ] = array(
						'interval' => $recurrence_seconds,
						'display'  => __( 'Once every', 'email-reminders' ) . ' ' . opera_time_interval( $recurrence_seconds )
					);
				}
			}
		}
	}
	return $schedules;

}
add_filter( 'cron_schedules', 'opera_cron_add_schedule_times' );



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Hooks Order: 'opera_remove_cron_rule_run' -> 'opera_reschedule_cron__after_rule_save'


/**
 * Hook function to execute after Add | Edit rule -  after clicking "Save changes"
 *
 * @param $rules_id
 */
function opera_reschedule_cron__after_rule_save( $rules_id ){

	$data_arr = oper_rule_get_data_arr( $rules_id );

	if (
		    ( ! empty( $data_arr ) )
		 && ( ! empty( $data_arr[0]['advanced'] ) )
	){

		$cron_names = array( 'opera_cron_hook__rule_run', 'opera_cron_hook__rule_reset' );

		foreach ( $cron_names as $cron_name ) {

			$small_name = str_replace( 'opera_cron_hook__', '', $cron_name);                                            // 'opera_cron_hook__rule_run'   -> 'rule_run'

			/**
				[advanced] => Array(
		                            [rule_run] => Array(
		                                    [enable] => On
		                                    [next_time] => 2020-04-05 13:53
		                                    [recurrence] => opera_cron_rules_run_schedule
		                                    [max_contacts] => 20
		                                )
		                            [rule_reset] => Array(
		                                    [enable] => On
		                                    [next_time] => 2020-04-06 09:53
		                                    [recurrence] => 300
		                                    [contact_id] => 0
		                                )
			 */

			if ( ! empty( $data_arr[0]['advanced'][ $small_name ] ) ) {

				$params = $data_arr[0]['advanced'][ $small_name ];

				if ( 'On' != $params['enable'] ) {                                                                      // Remove event
					opera_cron_remove_recurrence( $cron_name, $rules_id );
					$is_success = opera_cron__unschedule_cron( $cron_name, array( $rules_id ) );
				} else {                                                                                                // New Event
					opera_cron_add_recurrence( $cron_name, $rules_id , $params['recurrence'] );
					$is_success = opera_cron__schedule_cron(   $cron_name, $params['next_time'], $cron_name . $rules_id , array( $rules_id ) );
				}
			}
		}
	}
}
add_action( 'opera_reschedule_cron__after_rule_save', 'opera_reschedule_cron__after_rule_save' );                       // Run: after   Add | Edit rule -  after saving to DB,


/**
 * Hook function to execute after "rule in DB" was  Insert | Update | Delete -  after saving to DB
 *
 * @param $rules_id
 */
function opera_unschedule_cron__after_rule__update_del( $rules_id ){

	opera_cron__unschedule_cron( 'opera_cron_hook__rule_run',   array( $rules_id ) );
	opera_cron__unschedule_cron( 'opera_cron_hook__rule_reset', array( $rules_id ) );
}
add_action( 'opera_remove_cron_rule',   'opera_unschedule_cron__after_rule__update_del', 10, 1 );                       // Run: after Rules in DB:      Insert | Update | Delete


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Shortcode real functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Our real function for executing on CRON hook run -- Rule RUN
 *
 * @param int $rules_id
 */
function opera_cron__rule_run_execute( $rules_id ) {

	$data_arr = oper_rule_get_data_arr( $rules_id );
	/**
	 * 	$data_arr =Array (
				            [0] => Array (
						                    [rules_id] => 49
						                    [last_check_contact_id] => 3001
						                    [status] =>
						                    [last_run_date] => 2020-04-14 15:30:41
						                    [expire_after] => 0
											[rule] => Array (
									                            [email_template] => updates_expired_6_months
									                            [conditions] => Array (
									                                    [0] => Array (
									                                            [if] => __default__|_date
									                                            [sign] => =
									                                            [value] => TODAY - 6 MONTHS - 1 DAY
									                                        )
									                                )
									                        )
										    [advanced] =>Array(
							                                    [rule_run] => Array(
												                                    [enable] => On
												                                    [next_time] => 2020-04-12 12:37
												                                    [recurrence] => 5
												                                    [max_contacts] => 3000
												                                    [time_from] => 13:00
												                                    [time_to] => 15:00
												                                    [send_week0] => On
												                                    [send_week1] => Off
												                                    [send_week2] => Off
												                                    [send_week3] => Off
												                                    [send_week4] => Off
												                                    [send_week5] => Off
												                                    [send_week6] => On
												                                )
																[rule_reset] => Array (
												                                    [enable] => On
												                                    [next_time] => 2020-04-06 09:53
												                                    [recurrence] => 300
												                                    [contact_id] => 1
											                                )
						                                    )
						                    [ru_create_date] => 2020-03-19 09:56:28
						                    [ru_edit_date] => 2020-04-14 15:30:41
						                )
	*/

	$max_count = 1000;
	$args = array(
			'is_silent' => true,	            // Is show any text  in page,  after  shortcode execution
			'id'        => $rules_id,		    // int      <=  ID of Rule to  execute
			'max_count' => 1000		    // Max number of contacts to process during shortcode execution, that fit to condition of rule,  starting from last run of shortcode
	);

	if (
			( ! empty( $data_arr ) )
	     && ( ! empty( $data_arr[0]['advanced'] ) )
	     && ( ! empty( $data_arr[0]['advanced']['rule_run'] ) )
	){

		if ( ! empty( $data_arr[0]['advanced']['rule_run']['max_contacts'] ) ) {
			$args['max_count'] = intval( $data_arr[0]['advanced']['rule_run']['max_contacts'] );
		}
	}


	oper_shortcode_rules__cron( $args );
}
add_action( 'opera_cron_hook__rule_run', 'opera_cron__rule_run_execute', 10, 1 );                                       // Run function after action Cron Hook



/**
 * Our real function for executing on CRON hook run -- Rule RESET
 *
 * @param int $rules_id
 */
function opera_cron__rule_reset_execute( $rules_id ) {

	$data_arr = oper_rule_get_data_arr( $rules_id );

	if (
			( ! empty( $data_arr ) )
	     && ( ! empty( $data_arr[0]['advanced'] ) )
	     && ( ! empty( $data_arr[0]['advanced']['rule_reset'] ) )
	     && ( ! empty( $data_arr[0]['advanced']['rule_reset']['contact_id'] ) )
	) {
		$contact_id = intval( $data_arr[0]['advanced']['rule_reset']['contact_id'] );
	} else {
		$contact_id = 0;
	}

	$rules_run = new OPER_Rules_Run();
	$rules_run->update__last_processed_contact_id__in_rule( $rules_id, $contact_id );
}
add_action( 'opera_cron_hook__rule_reset', 'opera_cron__rule_reset_execute', 10, 1 );                                   // Run function after action Cron Hook