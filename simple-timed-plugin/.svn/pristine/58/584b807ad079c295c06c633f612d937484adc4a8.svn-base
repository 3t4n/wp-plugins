<?php
/*
Plugin Name: Timed Content
Plugin URI: https://wordpress.org/plugins/simple-timed-plugin/
Description: Force post or page content to appear or expire.
Version: 1.2.5
Author: David Artiss
Author URI: https://artiss.blog
Text Domain: simple-timed-plugin
*/

/**
* Timed Content
*
* Hide or show content, depending on current date and time
*
* @package	Artiss-Content-Reveal
*/

define( 'timed_content_version', '1.2.5' );

/**
* Add meta to plugin details
*
* Add options to plugin meta line
*
* @since	1.2
*
* @param	string  $links	Current links
* @param	string  $file	File in use
* @return   string			Links, now with settings added
*/

function timed_content_plugin_meta( $links, $file ) {

	if ( false !== strpos( $file, 'simple-timed-plugin.php' ) ) {
		$links = array_merge( $links, array( '<a href="https://wordpress.org/support/plugin/simple-timed-plugin">' . __( 'Support', 'simple-timed-plugin' ) . '</a>' ) );
		$links = array_merge( $links, array( '<a href="https://artiss.blog/donate">' . __( 'Donate', 'simple-timed-plugin' ) . '</a>' ) );
	}

	return $links;
}

add_filter( 'plugin_row_meta', 'timed_content_plugin_meta', 10, 2 );

/**
* Timed Content Shortcode
*
* Shortcode function to display or hide content
*
* @since	1.0
*
* @uses     calculate_timed_content		Decide whether to show content or not
*
* @param	$paras      string          Parameters
* @param    $content    string          Content between shortcode
* @return			    string          Content
*/

function timed_content_shortcode( $paras = '', $content = '' ) {

	extract( shortcode_atts( array( 'ondate' => '', 'ontime' => '', 'onday' => '', 'offdate' => '', 'offtime' => '', 'offday' => '' ), $paras ) );

	if ( calculate_timed_content( $ondate, $ontime, $onday, $offdate, $offtime, $offday ) ) {

		$content = "<!-- Timed Content v" . timed_content_version . " -->\n" . $content . "<!-- " . __( 'End of Timed Content', 'simple-timed-plugin' ) . " -->\n";
		return do_shortcode( $content );

	} else {

		return;
	}
}

add_shortcode( 'timed', 'timed_content_shortcode' );

/**
* Timed Content Function
*
* Function which will return true or false to caller, depending on whether conten should be shown or not
*
* @since	1.1
*
* @uses     timed_content_get_parameters    Get a parameter value from a string
* @uses     calculate_timed_content			Decide whether to show content or not
*
* @param	$paras      string          	Parameters
* @return			    string          	True or false
*/

function timed_content( $paras ) {

	$ondate = timed_content_get_parameters( $paras, 'ondate' );
	$ontime = timed_content_get_parameters( $paras, 'ontime' );
	$onday = timed_content_get_parameters( $paras, 'onday' );
	$offdate = timed_content_get_parameters( $paras, 'offdate' );
	$offtime = timed_content_get_parameters( $paras, 'offtime' );
	$offday = timed_content_get_parameters( $paras, 'offday' );

	return calculate_timed_content( $ondate, $ontime, $onday, $offdate, $offtime, $offday );
}

/**
* Timed Content Function
*
* Function which will return true or false to caller, depending on whether conten should be shown or not
*
* @deprecated       1.2         Use timed_content instead
*
* @uses		timed_content       Decide whether to show content or not
*
* @param    string  $paras      Parameters
* @return   string              True or false
*/

function simple_timed_content( $paras ) { return timed_content( $paras ); }

/**
* Calculate Timed Content
*
* Function to process supplied dates and time and decide if content should be shown
* Shouldn't be called directly, but instead by shortcode and function code
*
* @since	1.1
*
* @param	$ondate     string  Date to appear
* @param	$ontime     string  Time to appear
* @param	$onday      string  Day to appear
* @param	$offdate    string  Date to hide
* @param	$offtime    string  Time to hide
* @param	$offday     string  Day to hide
* @return			    string	True or false
*/

function calculate_timed_content( $ondate = '', $ontime = '', $onday = '', $offdate = '', $offtime = '', $offday = '' ) {

	// Get current date and time information

	$local_time = strtotime( current_time( 'mysql' ) );
	$current_date = date( 'Ymd', $local_time );
	$current_time = date( 'His', $local_time );
	$current_day = date( 'N', $local_time );

	if ( '' != $ondate ) { $ontrigger = 'date'; } else { $ontrigger = 'day'; }
	if ( '' != $offdate ) { $offtrigger = 'date'; } else { $offtrigger = 'day'; }

	// If ondate or offdate specified, blank out their day equivalent (can't specify both)

	if ( '' != $ondate ) { $onday = ''; }
	if ( '' != $offdate ) { $offday = ''; }

	// Set the default days

	if ( ( '' == $onday ) && ( '' == $offday ) ) { $onday = $current_day; $offday = $current_day; }
	if ( ( '' == $onday ) && ( '' != $offday ) ) { $onday = $offday; }
	if ( ( '' != $onday ) && ( '' == $offday ) ) { $offday = $onday; }

	// Set the default dates

	if ( '' == $ondate ) {
		if ( '' == $offdate ) {
			$ondate = $current_date;
			$offdate = $current_date;
		} else {
			if ( $offdate < $current_date ) {
				$ondate = $offdate;
			} else {
				$ondate = $current_date;
			}
		}
	}
	if ( '' == $offdate ) { $offdate = $current_date; }

	// Set the default times

	if ( '' == $ontime ) { $ontime = '0000'; }
	if ( '' == $offtime ) { $offtime = '2359'; }

	// Work out if the days have been reached

	if ( ( '' != $onday ) or ( '' != $offday ) ) {
		$dayon = false;
		if ( $offday < $onday ) {
			if ( ( $current_day >= $onday ) or ( $current_day <= $offday ) )  { $dayon = true; }
		} else {
			if ( ( $current_day >= $onday ) && ( $current_day <= $offday ) ) { $dayon=true; }
		}
	} else {
		$dayon = true;
	}

	// Work out if the date has been reached

	if ( ( $current_date < $ondate ) or ( $current_date > $offdate ) ) { $dateon = false; } else { $dateon = true; }

	// Work out if the time has been reached

	$timeon = true;
	if ( ( 'date' == $ontrigger ) && ( $ondate == $current_date ) && ( $current_time < $ontime . '00' ) ) { $timeon = false; }
	if ( ( 'day' == $ontrigger ) && ( $onday == $current_day ) && ( $current_time < $ontime . '00' ) ) { $timeon = false; }
	if ( ( 'date' == $offtrigger ) && ( $offdate == $current_date ) && ( $current_time > $offtime . '59' ) ) { $timeon = false; }
	if ( ( 'day' == $offtrigger ) && ( $offday == $current_day ) && ( $current_time > $offtime . '59' ) ) { $timeon = false; }

	// If all conditions are met, return true

	if ( ( $timeon ) && ( $dayon ) && ( $dateon ) ) {
		return true;
	} else {
		return false;
	}
}

/**
* Extract Parameters (1.1)
*
* Function to extract parameters from an input string
*
* @since	1.1
*
* @param	$input	string	Input string
* @param	$para	string	Parameter to find
* @return			string	Parameter value
*/

function timed_content_get_parameters( $input, $para, $divider = '=', $seperator = '&' ) {

	$start = strpos( strtolower( $input ), $para . $divider);
	$content = '';
	if ( false !== $start ) {
		$start = $start + strlen( $para ) + 1;
		$end = strpos( strtolower( $input ), $seperator, $start );
		if ( false !== $end ) { $end = $end - 1; } else { $end = strlen( $input ); }
		$content = substr( $input, $start, $end - $start + 1 );
	}
	return $content;
}
?>