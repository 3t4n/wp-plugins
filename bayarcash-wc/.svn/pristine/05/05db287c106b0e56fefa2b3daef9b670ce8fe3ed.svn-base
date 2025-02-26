<?php
namespace Bayarcash\WooCommerce\Blocks;

use Automattic\WooCommerce\Blocks\Integrations\IntegrationInterface;

defined('ABSPATH') || exit;

define( 'BAYARCASH_BLOCK_VERSION', '1.0.0' );


class CheckoutFeesBlocksIntegration implements IntegrationInterface {
	/**
	 * The name of the integration.
	 *
	 * @return string
	 */
	public function get_name(): string {
		return 'bayarcash-checkout-fees';
	}

	/**
	 * Initialize the integration.
	 */
	public function initialize() {
		$this->register_block_frontend_scripts();
	}

	/**
	 * Returns an array of script handles to enqueue in the frontend context.
	 *
	 * @return string[]
	 */
	public function get_script_handles(): array {
		return array('checkout-block-frontend');
	}

	/**
	 * Returns an array of script handles to enqueue in the editor context.
	 *
	 * @return string[]
	 */
	public function get_editor_script_handles(): array {
		return array();
	}

	/**
	 * An array of key, value pairs of data made available to the block on the client side.
	 *
	 * @return array
	 */
	public function get_script_data(): array {
		return array();
	}

	/**
	 * Register scripts for frontend block.
	 */
	private function register_block_frontend_scripts() {
		wp_register_script(
			'checkout-block-frontend',
			BAYARCASH_WC['URL'] . 'includes/admin/js/blocks/checkout-fees.js',
			array(),
			BAYARCASH_BLOCK_VERSION,
			true
		);
	}
}