<?php
/*
 * Plugin Name: A Long Time Ago
 * Description: Turn your old and boring <em>"posted on 11/11/2011"</em> into cool <em>"posted a week ago"</em>!
 * Version: 0.1
 * Author: Slawek Amielucha
 * Author URI: http://amielucha.com/
 * Text Domain: long-time-ago
 * License: GPLv2 or later
 */

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, don\'t call me Daisy!';
	exit;
}

// needed for I18n
function long_time_ago_init() {
 
 // define plugin's Text domain:
 $domain = 'long-time-ago';

 $plugin_dir = basename(dirname(__FILE__));
 $locale = apply_filters('plugin_locale', get_locale(), $domain);

 load_textdomain($domain, WP_LANG_DIR.'/my-plugin/'.$domain.'-'.$locale.'.mo');
 load_plugin_textdomain( $domain, false, $plugin_dir );
}
add_action('plugins_loaded', 'long_time_ago_init');

/*
 *	Get Timestamp
 */
function get_time_ago() {

	$diff = time_ago_difference( get_the_time('U') );

	// If posted within last 15 minutes use a different format:
	if ( 15 * MINUTE_IN_SECONDS > $diff ) {
		$ago_string = __( 'just posted', 'long-time-ago' );
	// If posted yesterday
	} elseif ( $isYesterday = date('Ymd', get_the_time('U')) == date('Ymd', strtotime('yesterday')) ) {
		$ago_string = __( 'posted yesterday', 'long-time-ago' );
	// If posted within last week just give the day of the week:
	} elseif ( $diff < WEEK_IN_SECONDS && $diff >= DAY_IN_SECONDS ) {
		
		// Exception for Polish language
		if ( "pl_PL" === get_locale() ){ 
			$ago_string = exceptions_PL();
		} else {
			$ago_string = sprintf( __( 'posted on %1$s', 'long-time-ago' ),	esc_attr( get_the_time('l') )	);
		}

	} else {
		$ago_string = sprintf( __( 'posted %1$s ago', 'long-time-ago' ), esc_attr( human_time_diff( get_the_time('U') ) )	);
	}

	// return post's timestamp wrapped in ISO-formatted HTML5 <time> element
	$get_time_ago = '<time datetime="' . get_the_date( 'c' ) . '" title="' . get_the_date() . '" class="long-timestamp-ago">' . $ago_string . '</time>';

	return $get_time_ago;
}
add_shortcode('time_ago', 'get_time_ago');


/*
 *	Echo Timestamp
 */
function time_ago(){
	echo get_time_ago();
}

/*
 *	Modified human_time_diff() from wp-includes\formatting.php
 */
function time_ago_difference( $from, $to = '' ) {
	if ( empty( $to ) )
		$to = time();

	return $diff = (int) abs( $to - $from );
}

/*
 *	Polish grammar requires special treatment.
 */
function exceptions_PL () {
	switch (get_the_time('D')) {
		case "wt":
			return "Opublikowano we wtorek";
			break;
		case "śr":
			return "Opublikowano w środę";
			break;
		case "sob":
			return "Opublikowano w sobotę";
			break;
		case "nie":
			return "Opublikowano w niedzielę";
			break;
		default:
			return sprintf(	__( 'posted on %1$s', 'long-time-ago' ),	esc_attr( get_the_time('l') )	);
	}
}