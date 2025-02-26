<?php

/**
 * Fired during plugin activation
 *
 * @link       https://grittechnologies.com
 * @since      1.0.0
 *
 * @package    Grit_Taxonomy_Filter
 * @subpackage Grit_Taxonomy_Filter/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Grit_Taxonomy_Filter
 * @subpackage Grit_Taxonomy_Filter/includes
 * @author     Mrityunjay Kumar <miishraa@rediffmail.com>
 */
class Grit_Taxonomy_Filter_Activator {

	/**
	 * Activates Plugin
	 *
	 * Plugin is activated only if it meets minimum requirement of php 5.6, else deactivate function is called.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$min_php = '5.6.0';

		// Check PHP Version and deactivate & die if it doesn't meet minimum requirements.
		if ( version_compare( PHP_VERSION, $min_php, '<' ) ) {
					deactivate_plugins( plugin_basename( __FILE__ ) );
			wp_die( 'This plugin requires a minmum PHP Version of ' . $min_php );
		}

	}
	}
