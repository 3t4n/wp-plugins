<?php

/**
 * The Disable Automatic Background Updates Plugin
 *
 * Disable all automatic background updates.
 *
 * @package Disable_Automatic_Background_Updates
 * @subpackage Main
 */

/**
 * Plugin Name: Disable Automatic Background Updates
 * Plugin URI:  https://milandinic.com/wordpress/plugins/disable-automatic-background-updates/
 * Description: Disable all automatic background updates.
 * Author:      Milan Dinić
 * Author URI:  https://milandinic.com/
 * Version:     1.0
 * Text Domain: disable-automatic-background-updates
 * Domain Path: /languages/
 * License:     GPL
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

// Faux line: load_plugin_textdomain( 'disable-automatic-background-updates', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

// Disable all automatic background updates
add_filter( 'automatic_updater_disabled',    '__return_true'  );

// Disable core automatic background updates
add_filter( 'auto_update_core',              '__return_false' );

// Disable plugins automatic background updates
add_filter( 'auto_update_plugin',            '__return_false' );

// Disable themes automatic background updates
add_filter( 'auto_update_theme',             '__return_false' );

// Disable translations automatic background updates
add_filter( 'auto_update_translation',       '__return_false' );

// Disable core automatic background updates for development versions
add_filter( 'allow_dev_auto_core_updates',   '__return_false' );

// Disable core automatic background updates for minor versions
add_filter( 'allow_minor_auto_core_updates', '__return_false' );

// Disable core automatic background updates for major versions
add_filter( 'allow_major_auto_core_updates', '__return_false' );
