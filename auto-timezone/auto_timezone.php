<?php
/*
Plugin Name: Auto-TimeZone
Plugin URI: http://www.smithwickdesign.com
Version: 1.2
Author: Kevin Smithwick
Author URI: http://www.smithwickdesign.com
Description: Auto-Timezone uses MaxMind's free GeoLiteCity.dat database to determine the visitor's country and region. Based on that information, it then determines and automatically sets the timezone using date_default_timezone_set
*/

// Hook muplugins_loaded so auto_timezone is executed after active plugins and pluggable functions are loaded
add_action('plugins_loaded', 'auto_timezone_exec');


/**
 * auto_timezone exec function - executed after active plugins and pluggable functions are loaded
 *
 */
function auto_timezone_exec() {
	if (!session_id()) { session_start(); }
	
	include_once(dirname(__FILE__) . "/classes/geoipcity.inc");
	include_once(dirname(__FILE__) . "/classes/geoipregionvars.php");
	include_once(dirname(__FILE__) . "/classes/timezone.php");
	
	// Pull geolocation data from MaxMind's database by remote IP address
	$gi = geoip_open(dirname(__FILE__) . "/GeoLiteCity.dat", GEOIP_STANDARD);
	$record = geoip_record_by_addr($gi, $_SERVER['REMOTE_ADDR']);
	geoip_close($gi);
	
	// Determine the timezone based on user's country code and region
	$time_zone = get_time_zone($record->country_code, ($record->region!='') ? $record->region : 0);	
	
	// No timezone was found, default to the wordpress setting
	if (trim($time_zone) == '') { $time_zone = get_option('timezone_string'); }
	
	// Store the current timezone in session incase you want to use it later
	$_SESSION['auto_timezone'] = $time_zone;

	// Set the session timezone
	date_default_timezone_set($time_zone);	
}
?>