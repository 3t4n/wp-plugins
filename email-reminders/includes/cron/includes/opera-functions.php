<?php /**
 * @version 1.0
 * @description CRON
 * @category  CRON - automate of actions.
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// Support Functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Get Cron Event(s)  for specific rule
 *
 * @param int $rule_id
 * @param string $cron_hook
 *
 * @return array
 */
function opera_get_cron_event__for_rule( $rule_id, $cron_hook) {

	$all_my_events = opera_get_cron_events();

	$rule_events_arr = array();

	if ( ! is_wp_error( $all_my_events ) ) {
		foreach ( $all_my_events as $key => $event_arr ) {

			if (
				   ( $cron_hook === $event_arr->hook )
			    && ( array( $rule_id ) == $event_arr->args )
			){
				$rule_events_arr[ $key ] = $event_arr;
			}
		}
	}

	return $rule_events_arr;
}


/**
 * Returns array of Our cron events.
 *
 * @return array[] | WP_Error An array of cron event arrays, or a WP_Error object if there's an error or no events.
 */
function opera_get_cron_events() {

	$crons  = _get_cron_array();

	$events = array();

	if ( empty( $crons ) ) {
		return new WP_Error(
			'no_events',
			__( 'You currently have no scheduled cron events.', 'email-reminders' )
		);
	}

	$time_format = 'Y-m-d H:i:s';

	foreach ( $crons as $time => $cron ) {
		foreach ( $cron as $hook => $dings ) {
			foreach ( $dings as $sig => $data ) {

				// Get only scheduled events from  our plugin
				if ( 0 === strpos( $hook, 'opera_' ) ) {

					// This is a prime candidate for a Crontrol_Event class but I'm not bothering currently.
					$events["$hook-$sig-$time"] = (object) array(
						'hook'     => $hook,
						'time'     => $time,
						'sig'      => $sig,
						'args'     => $data['args'],
						'schedule' => $data['schedule'],
						'interval' => isset( $data['interval'] ) ? $data['interval'] : null,

						'cron_local_time' => esc_html( get_date_from_gmt( date( 'Y-m-d H:i:s', $time ), $time_format ) ),
						'cron_after_time' => esc_html( opera_time_since( time(), $time ) )

					);
				}
			}
		}
	}
	return $events;
}


/**
 * Pretty-prints the difference in two times.
 *
 * @param int $older_date Unix timestamp.
 * @param int $newer_date Unix timestamp.
 * @return string The pretty time_since value
 * @link http://binarybonsai.com/code/timesince.txt
 */
function opera_time_since( $older_date, $newer_date ) {
	return opera_time_interval( $newer_date - $older_date );
}


/**
 * Converts a period of time in seconds into a human-readable format representing the interval.
 *
 * Example:
 *
 *     echo opera_time_interval( 90 );
 *     // 1 minute 30 seconds
 *
 * @param  int $since A period of time in seconds.
 * @return string An interval represented as a string.
 */
function opera_time_interval( $since ) {
	// Array of time period chunks.
	$chunks = array(
		/* translators: 1: The number of years in an interval of time. */
		array( 60 * 60 * 24 * 365, _n_noop( '%s year', '%s years', 'email-reminders' ) ),
		/* translators: 1: The number of months in an interval of time. */
		array( 60 * 60 * 24 * 30, _n_noop( '%s month', '%s months', 'email-reminders' ) ),
		/* translators: 1: The number of weeks in an interval of time. */
		array( 60 * 60 * 24 * 7, _n_noop( '%s week', '%s weeks', 'email-reminders' ) ),
		/* translators: 1: The number of days in an interval of time. */
		array( 60 * 60 * 24, _n_noop( '%s day', '%s days', 'email-reminders' ) ),
		/* translators: 1: The number of hours in an interval of time. */
		array( 60 * 60, _n_noop( '%s hour', '%s hours', 'email-reminders' ) ),
		/* translators: 1: The number of minutes in an interval of time. */
		array( 60, _n_noop( '%s minute', '%s minutes', 'email-reminders' ) ),
		/* translators: 1: The number of seconds in an interval of time. */
		array( 1, _n_noop( '%s second', '%s seconds', 'email-reminders' ) ),
	);

	if ( $since <= 0 ) {
		return __( 'now', 'email-reminders' );
	}

	/**
	 * We only want to output two chunks of time here, eg:
	 * x years, xx months
	 * x days, xx hours
	 * so there's only two bits of calculation below:
	 */
	$j = count( $chunks );

	// Step one: the first chunk.
	for ( $i = 0; $i < $j; $i++ ) {
		$seconds = $chunks[ $i ][0];
		$name = $chunks[ $i ][1];

		// Finding the biggest chunk (if the chunk fits, break).
		$count = floor( $since / $seconds );
		if ( $count ) {
			break;
		}
	}

	// Set output var.
	$output = sprintf( translate_nooped_plural( $name, $count, 'email-reminders' ), $count );

	// Step two: the second chunk.
	if ( $i + 1 < $j ) {
		$seconds2 = $chunks[ $i + 1 ][0];
		$name2 = $chunks[ $i + 1 ][1];
		$count2 = floor( ( $since - ( $seconds * $count ) ) / $seconds2 );
		if ( $count2 ) {
			// Add to output var.
			$output .= ' ' . sprintf( translate_nooped_plural( $name2, $count2, 'email-reminders' ), $count2 );
		}
	}

	return $output;
}


/**
 * Get the display name for the site's timezone.
 *
 * @return string The name and UTC offset for the site's timezone.
 */
function opera_get_timezone_name() {
	$timezone_string = get_option( 'timezone_string', '' );
	$gmt_offset      = get_option( 'gmt_offset', 0 );

	if ( $gmt_offset >= 0 ) {
		$gmt_offset = '+' . $gmt_offset;
	}

	if ( '' === $timezone_string ) {
		$name = sprintf( 'UTC%s', $gmt_offset );
	} else {
		$name = sprintf( '%s (UTC%s)', str_replace( '_', ' ', $timezone_string ), $gmt_offset );
	}

	return $name;
}


// <editor-fold     defaultstate="collapsed"                        desc=" ///  JS | CSS  /// "  >

function opera_js_load_files_rules(){

	$in_footer = true;

	if ( ( is_admin() ) ) {
		wp_enqueue_script( 'opera-cron', trailingslashit( plugins_url( '', __FILE__ ) ) . 'opera_cron.js' , array( 'oper-global-vars' ), '1.0', $in_footer );
	}
}
add_action('opera_js_load_files_rules', 'opera_js_load_files_rules');

function opera_enqueue_css_files_rules(){

	if ( ( is_admin() ) ) {
		wp_enqueue_style( 'opera-cron', trailingslashit( plugins_url( '', __FILE__ ) ) . 'opera_cron.css', array(), OPER_VERSION_NUM );
		wp_enqueue_style( 'oper-rules_modify', trailingslashit( plugins_url( '', OPER_FILE ) ) . 'includes/page-rules/rules_modify.css', array(), OPER_VERSION_NUM );
	}
}
add_action('opera_enqueue_css_files_rules', 'opera_enqueue_css_files_rules');

// </editor-fold>


/**
 * Disable WordPress CRON -- WP will not spawn Cron anymore. You have to set the Cron on your server
 */
function opera_block_cron_executions(){

	$server_cron_enabled = get_oper_option( 'opera_server_cron_enabled' );

	if ( 'On' == $server_cron_enabled ) {

		if ( ! defined( 'DISABLE_WP_CRON' ) ) {
			define( 'DISABLE_WP_CRON', true );
		}

		// just in case the constant is already set to true
		remove_action( 'init', 'wp_cron' );
	}
}
add_action( 'plugins_loaded', 'opera_block_cron_executions', 10, 1 );