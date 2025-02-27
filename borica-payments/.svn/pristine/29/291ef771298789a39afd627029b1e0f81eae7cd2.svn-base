<?php
/**
 * Adds the admin menu for Borica Payments plugin.
 *
 * This file contains the code responsible for adding a custom admin menu to the WordPress dashboard,
 * specific to the Borica Payments plugin.
 *
 * @package Borica_Woo_Payment_Gateway
 */

/** Function to add the admin menu. */
function borica_admin_actions() {
	add_options_page(
		__( 'BORICA - Payment by Credit/Debit Card', 'borica' ),
		__( 'BORICA - Payment by Credit/Debit Card', 'borica' ),
		'manage_options',
		'borica-options',
		'borica_admin_options'
	);
}

/**
 * Adds a "Settings" link to the plugin action links on the Plugins page.
 *
 * This function appends a "Settings" link to the list of action links displayed
 * on the Plugins page for the current plugin. The link redirects to the plugin's
 * settings page under the WordPress settings menu.
 *
 * @param array $links An array of existing action links for the plugin.
 *
 * @return array Modified array of action links, including the "Settings" link.
 */
function borica_add_settings_link($links) {
	$settings_link = '<a href="options-general.php?page=borica-options">'.__( 'Settings', 'borica' ).'</a>';
	array_push($links, $settings_link);

	return $links;
}
