<?php

namespace Bayarcash\WooCommerce;

// Exit if accessed directly
defined('ABSPATH') || exit;

/**
 * Check for Bayarcash WooCommerce namespace and dependencies
 */
class DependencyChecker {
	/**
	 * Initialize the checker
	 */
	public function __construct() {
		add_action('admin_init', [$this, 'check_dependencies']);
	}

	/**
	 * Check if all required dependencies are available
	 */
	public function check_dependencies() {
		if (!$this->is_namespace_available()) {
			add_action('admin_notices', [$this, 'show_namespace_error']);
			add_action('admin_init', [$this, 'deactivate_plugin']);
		}
	}

	/**
	 * Check if the Bayarcash\WooCommerce namespace is available
	 *
	 * @return boolean
	 */
	private function is_namespace_available(): bool {
		return interface_exists('Bayarcash\\WooCommerce\\PaymentGatewayInterface')
		       || class_exists('Bayarcash\\WooCommerce\\Bayarcash');
	}

	/**
	 * Display admin error notice
	 */
	public function show_namespace_error() {
		$class = 'notice notice-error';
		$message = sprintf(
		/* translators: 1: Plugin name 2: Required namespace */
			__('Error: %1$s plugin requires the %2$s namespace to be properly installed. Please reinstall the plugin or contact support.', 'bayarcash-wc'),
			'<strong>Bayarcash WC</strong>',
			'<code>Bayarcash\\WooCommerce</code>'
		);

		printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), wp_kses_post($message));
	}

	/**
	 * Deactivate the plugin
	 */
	public function deactivate_plugin() {
		deactivate_plugins(plugin_basename(BAYARCASH_WC['FILE']));

		// If we're in the admin panel and activating the plugin, we need to hide the "Plugin activated" notice
		if (isset($_GET['activate'])) {
			unset($_GET['activate']);
		}
	}
}

// Initialize the checker
new DependencyChecker();