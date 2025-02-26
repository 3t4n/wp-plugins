<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.demotic.co.uk/
 * @since             1.0.0
 * @package           Advanced_Forms_Paypal_Payment_Buttons
 *
 * @wordpress-plugin
 * Plugin Name:       Advanced Forms PayPal Payment Buttons
 * Plugin URI:        https://www.demotic.co.uk/wordpress-plugins/advanced-forms-paypal-payment-buttons/
 * Description:       Create PayPal Payment Buttons with the power of Advanced Forms and Advanced Custom Fields.
 * Version:           1.0.0
 * Author:            Demotic Limited
 * Author URI:        https://www.demotic.co.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advanced-forms-paypal-payment-buttons
 * Domain Path:       /languages
 * 
 * Copyright (C) 2017 Demotic Limited
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-advanced-forms-paypal-payment-buttons-activator.php
 */
function activate_advanced_forms_paypal_payment_buttons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-forms-paypal-payment-buttons-activator.php';
	Advanced_Forms_Paypal_Payment_Buttons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-advanced-forms-paypal-payment-buttons-deactivator.php
 */
function deactivate_advanced_forms_paypal_payment_buttons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advanced-forms-paypal-payment-buttons-deactivator.php';
	Advanced_Forms_Paypal_Payment_Buttons_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_advanced_forms_paypal_payment_buttons' );
register_deactivation_hook( __FILE__, 'deactivate_advanced_forms_paypal_payment_buttons' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-advanced-forms-paypal-payment-buttons.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_advanced_forms_paypal_payment_buttons() {

	$plugin = new Advanced_Forms_Paypal_Payment_Buttons();
	$plugin->run();

}
run_advanced_forms_paypal_payment_buttons();
