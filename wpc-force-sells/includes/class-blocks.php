<?php
defined( 'ABSPATH' ) || exit;

use Automattic\WooCommerce\Blocks\Integrations\IntegrationInterface;

/**
 * Class for integrating with WooCommerce Blocks
 */
class WPCleverWoofs_Blocks_IntegrationInterface implements IntegrationInterface {
	/**
	 * The name of the integration.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'woofs-blocks';
	}

	/**
	 * When called invokes any initialization/setup for the integration.
	 */
	public function initialize() {
		wp_enqueue_style(
			'woofs-blocks',
			$this->get_url( 'blocks', 'css' ),
			[],
			WOOFS_VERSION
		);

		wp_register_script(
			'woofs-blocks',
			$this->get_url( 'blocks', 'js' ),
			[ 'wc-blocks-checkout' ],
			WOOFS_VERSION,
			true
		);

		wp_set_script_translations(
			'woofs-blocks',
			'wpc-force-sells',
			WOOFS_DIR . 'languages'
		);
	}

	/**
	 * Returns an array of script handles to enqueue in the frontend context.
	 *
	 * @return string[]
	 */
	public function get_script_handles() {
		return [ 'woofs-blocks' ];
	}

	/**
	 * Returns an array of script handles to enqueue in the editor context.
	 *
	 * @return string[]
	 */
	public function get_editor_script_handles() {
		return [];
	}

	/**
	 * An array of key, value pairs of data made available to the block on the client side.
	 *
	 * @return array
	 */
	public function get_script_data() {
		return [];
	}

	public function get_url( $file, $ext ) {
		return plugins_url( $this->get_path( $ext ) . $file . '.' . $ext, WOOFS_FILE );
	}

	protected function get_path( $ext ) {
		return 'css' === $ext ? 'assets/css/' : 'assets/js/';
	}
}

if ( ! class_exists( 'WPCleverWoofs_Blocks' ) ) {
	class WPCleverWoofs_Blocks {
		function __construct() {
			add_filter( 'rest_request_after_callbacks', [ $this, 'cart_item_data' ], 10, 3 );
			add_filter( 'woocommerce_hydration_request_after_callbacks', [ $this, 'cart_item_data' ], 10, 3 );
			add_action(
				'woocommerce_blocks_mini-cart_block_registration',
				function ( $integration_registry ) {
					$integration_registry->register( new WPCleverWoofs_Blocks_IntegrationInterface() );
				}
			);
			add_action(
				'woocommerce_blocks_cart_block_registration',
				function ( $integration_registry ) {
					$integration_registry->register( new WPCleverWoofs_Blocks_IntegrationInterface() );
				}
			);
			add_action(
				'woocommerce_blocks_checkout_block_registration',
				function ( $integration_registry ) {
					$integration_registry->register( new WPCleverWoofs_Blocks_IntegrationInterface() );
				}
			);
		}

		function cart_item_data( $response, $server, $request ) {
			if ( is_wp_error( $response ) ) {
				return $response;
			}

			if ( ! str_contains( $request->get_route(), 'wc/store' ) ) {
				return $response;
			}

			$data = $response->get_data();

			if ( empty( $data['items'] ) ) {
				return $response;
			}

			$cart_contents = WC()->cart->get_cart();
			$hide_linked   = WPCleverWoofs_Helper()->get_setting( 'hide_linked', 'no' ) !== 'no';

			foreach ( $data['items'] as &$item_data ) {
				$cart_item_key = $item_data['key'];
				$cart_item     = $cart_contents[ $cart_item_key ] ?? null;

				if ( ! empty( $cart_item['woofs_ids'] ) ) {
					$item_data['woofs_main'] = true;
				}

				if ( ! empty( $cart_item['woofs_parent_id'] ) ) {
					$item_data['woofs_linked']              = true;
					$item_data['quantity_limits']->editable = false;

					$linked_text       = WPCleverWoofs_Helper()->localization( 'linked', /* translators: product name */ esc_html__( '(linked to %s)', 'wpc-force-sells' ) );
					$item_data['name'] .= ' ' . apply_filters( 'woofs_item_associated', sprintf( $linked_text, esc_html( get_the_title( $cart_item['woofs_parent_id'] ) ) ), $cart_item );

					if ( $hide_linked ) {
						$item_data['woofs_hide_linked'] = true;
					}
				}
			}

			$response->set_data( $data );

			return $response;
		}
	}

	new WPCleverWoofs_Blocks();
}