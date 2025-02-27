<?php

/**
 * @package 
 */
// Compatibility Check
function catcbll_check_woocommerce_plugin()
{
	if (!class_exists('WooCommerce')) {
		return __('Please install and activate WooCommerce plugin first.', 'catcbll');
	}

	if (version_compare(wc()->version, CATCBLL_MINIMUM_WOOCOMMERCE_VERSION, '<=')) {
		// Translators: %s is the minimum required version of WooCommerce
		return sprintf(
			__(
				"Please update your WooCommerce plugin. It's outdated. %s or latest required", 
				'catcbll'
			), 
			esc_html(CATCBLL_MINIMUM_WOOCOMMERCE_VERSION) // Escape the version number
		);
	}

	return false;
}


// Plugin Die Message
function catcbll_plugin_die_message($message)
{
	// Translators: This message is displayed when the plugin cannot activate.
	return '<p>' .
		esc_html($message) // Escape the message to prevent XSS
		. '</p> <a href="' . esc_url(admin_url('plugins.php')) . '">' . esc_html('Go back', 'catcbll') . '</a>'; // Escape the URL and link text
}
