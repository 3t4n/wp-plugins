<?php

/**
 * Plugin Name:   Estatik Calculator Widget
 * Plugin URI:    http://estatik.net
 * Version:       2.0.12
 * Description:   A simple mortgage calculator widget
 * Author:        Estatik
 * Author URI:    https://estatik.net
 * Text Domain:   estatik-mortgage-calculator
 * License:       GPL2
 * License URI:   http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:   /languages
 */

define( 'EMC_VER', '2.0.12' );
define( 'EMC_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'EMC_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'EMC_CURRENCY_POSITION_BEFORE', 'before' );
define( 'EMC_CURRENCY_POSITION_AFTER', 'after' );
define( 'EMC_AMORTIZATION_PERIOD_ANNUALLY', 'annually' );
define( 'EMC_AMORTIZATION_PERIOD_MONTHLY', 'monthly' );
define( 'EMC_POPUP_TYPE_GRAPH', 'graph' );
define( 'EMC_POPUP_TYPE_TEXT', 'text' );

require_once 'includes/functions.php';
require_once 'includes/admin/class-setting-field.php';
require_once 'includes/admin/class-mortgage-calculator-widget.php';

/**
 * Load plugin textdomain.
 *
 * @return void
 */
function emc_load_text_domain() {

	load_plugin_textdomain(
		'estatik-mortgage-calculator', false, basename( dirname( __FILE__ ) ) . '/languages'
	);
}
add_action( 'plugins_loaded', 'emc_load_text_domain' );

/**
 * Add options link in admin menu.
 *
 * @return void
 */
function emc_admin_options_menu() {

	add_options_page(
		__( 'Estatik Mortgage Calculator', 'estatik-mortgage-calculator' ),
		__( 'Estatik Mortgage Calculator', 'estatik-mortgage-calculator' ),
		'manage_options',
		'emc_options',
		'emc_admin_options_page'
	);
}
add_action( 'admin_menu', 'emc_admin_options_menu' );

/**
 * @param array $actions
 * @param string $plugin_file
 * @param array $plugin_data
 * @param $context
 * @return mixed
 */
function emc_plugin_action_links( $actions, $plugin_file, $plugin_data ) {
    if ( stristr( $plugin_file, 'estatik-calculator' ) && ! empty( $plugin_data['slug'] ) ) {
        $link = admin_url( 'options-general.php?page=emc_options' );
        $actions['settings'] = sprintf( '<a href="%s" id="settings-%s">%s</a>',
            $link, $plugin_data['slug'], __( 'Calculator settings', 'estatik-mortgage-calculator' ) );
    }
    return $actions;
}
add_filter( 'plugin_action_links', 'emc_plugin_action_links', 10, 3 );

add_shortcode( 'es_mortgage_calculator', 'emc_get_calculator_markup' );
add_shortcode( 'mortgage_calculator', 'emc_get_calculator_markup' );

/**
 * Activation hook.
 *
 * @return void
 */
function emc_activation_hook() {
	$old_options = get_option( 'estatik_calculator_settings' );
	$is_migrated = get_option( 'estatik_calculator_settings_migrated' );

	if ( $old_options && ! $is_migrated ) {
		$defined_options = emc_get_global_settings();

		if ( ! empty( $old_options ) && is_array( $old_options ) ) {

			foreach ( $old_options as $option => $value ) {
				$value = $value == 'on' ? 1 : $value;
				$value = $value == 'off' ? 0 : $value;
				$option = $option == 'select_popup' ? 'popup_type' : $option;
				$defined_options[ $option ] = $value;
			}

			$defined_options['number_format'] = ',.';

			update_option( 'emc_options', emc_clean( $defined_options ) );
		}

		update_option( 'estatik_calculator_settings_migrated', 1 );
	}
}
register_activation_hook( __FILE__, 'emc_activation_hook' );
