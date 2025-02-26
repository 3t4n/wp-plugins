<?php
/**
 * Runs on Uninstall of [Your Package Name]
 *
 * @package   Maha Salat Times
 * @author    Qamar Ramzan
 * @license   GPLv2 or later
 * @link      http://www.qamarramzan.com/
 */

// Check that we should be doing this
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit; // Exit if accessed directly
}




// Delete Options

$options = array(

    'salat_method',
    'salat_juristic',
    'salat_longitude',
    'salat_latitude',
    'salat_timezone',
    'salat_timeformat',
    'salat_highlatsmethod',


    'fajr_rename',
    'zuhur_rename',
    'asr_rename',
    'maghrib_rename',
    'isha_rename',
    'jumah_rename',
    'sunrise_rename',


    'fajr_jamat',
    'zuhur_jamat',
    'asr_jamat',
    'maghrib_jamat',
    'isha_jamat',
    'jumah_jamat',


    'salat_blurb'
);

foreach ( $options as $option ) {
	delete_option( $option );
}