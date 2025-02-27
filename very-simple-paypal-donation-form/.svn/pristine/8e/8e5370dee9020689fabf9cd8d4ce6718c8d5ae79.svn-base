<?php
/**
 * The VSDonationForm is a class that manages all functions having to do with
 * creating the Very Simple PayPal Donation Form
 *
 * @package	VSDonationForm
 *
 * @since	1.0
 */

class VSDonationForm {

	/* -------------------------------------------------------------------------- *
	 * Actions & Hooks
	 * -------------------------------------------------------------------------- */

	function __construct() {
		// Add the shortcode to show the form
		add_shortcode('vsdf_donation_form', array($this, 'donation_form_html'));
		// Enqueue style and script
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue') );
		// Add a page to the admin menu
		add_action('admin_menu', array($this, 'menu_page'));
		// Add a link to the Settings from the main Plugins screen
		add_filter( 'plugin_action_links_'.VSDF_BASENAME, array($this, 'plugin_action_links') );
		// Add styles to back-end
		add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue' ));
	}

	/* -------------------------------------------------------------------------- *
	 * Public Callback Functions
	 * -------------------------------------------------------------------------- */

	function donation_form_html() {
		ob_start();
		include(VSDF_PLUGINPATH.'views/donationform.php');
		$html = ob_get_clean();
		ob_flush();
		return $html;
	}

	function enqueue() {
		wp_enqueue_style( 'mpdf', VSDF_PLUGINDIR.'/assets/style.css' );
		wp_enqueue_script( 'mpdf', VSDF_PLUGINDIR.'/assets/functions.js', array('jquery'), '1.0.0', true );
	}

	function menu_page() {
	 	add_options_page('Donation Form', 'Donation Form', 'manage_options', 'vsdf_settings', array($this, 'get_settings_html') );
	}

	function get_settings_html() {
		require_once VSDF_PLUGINPATH.'views/settings.php';
	}

	function plugin_action_links( $links ) {
	   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=vsdf_settings') ) .'">Settings</a>';
	   return $links;
	}

	function admin_enqueue() {
		wp_enqueue_style(
			'wccnyrg-admin',
			VSDF_PLUGINDIR . 'assets/admin.css',
			array(),
			NULL,
			FALSE
		);
	}

	/* -------------------------------------------------------------------------- *
	 * General Public Functions
	 * -------------------------------------------------------------------------- */

	function get_options() {
		$defaults = array(
			'paypal_email' => '',
			'the_currency' => 'USD',
			'the_currency_symbol' => '$',
			'the_amounts' => '5, 25, 50, 100',
			'default_checked_amount' => '25',
			'other_amount' => '20',
			'button_text' => 'Continue to PayPal',
			'thanks_page' => get_option('page_on_front'),
			'css' => '',
			'recurring' => 'Yes'
		);

		// Establish defaults for the first time the plugin is used
		$options = get_option( 'vsdf_settings', $defaults);

		// If any of the options is blank, fill it in with the default
		foreach (array_keys($defaults) as $key) {
			if (empty($options[$key])) {
				$options[$key] = $defaults[$key];
			}
		}
		return $options;
	}

	function get_amounts($in) {
		return preg_split('/\,[ ]*/', $in);
	}

}
