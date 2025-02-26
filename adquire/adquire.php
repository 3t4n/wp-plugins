<?php

/*
Plugin Name: AdQuire
Description: Allows WordPress webpage owners to set up AdQuire easily. To get started: 1) Click the 'Activate' link; 2) Click the AdQuire tab.
Version:     1.4
Author:      Permission Data
Author URI:  http://www.permissiondata.com
*/

/**
 * Prefixes:
 * adqwp - AdQuire WordPress
 * adq - AdQuire
 */
$adqwp_options = get_option('adqwp_settings');

/**
 * Includes
 */
include('includes/scripts.php');
include('includes/admin-page.php');
include('includes/embed-adquire.php');