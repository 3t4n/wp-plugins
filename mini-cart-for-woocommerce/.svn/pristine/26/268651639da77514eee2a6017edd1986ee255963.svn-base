<?php


/**
 *
 * This is used to define regiter activation/deactivation hooks, 
 * version of the plugin.
 *
 * @since      2.0.7
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/inc
 */

/**
 * The code that runs during plugin activation.
 * This action is documented in inc/class-mcfwc-activator.php
 */
function whmc_activate_light() {
	require_once WHMC_LIGHT_PATH . 'inc/class-whmc-light-activator.php';
	Mcfwc_Activator_Light::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in inc/class-mcfwc-deactivator.php
 */
function whmc_deactivate_light() {
	require_once WHMC_LIGHT_PATH . 'inc/class-whmc-light-deactivator.php';
	Mcfwc_Deactivator_Light::deactivate();
}

register_activation_hook( __FILE__, 'whmc_activate_light' );

register_deactivation_hook( __FILE__, 'whmc_deactivate_light' );