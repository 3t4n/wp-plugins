<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagic\Frontend\Interceptor;

use WPDesk\ShopMagic\Admin\Settings\GeneralSettings;
use WPDesk\ShopMagic\Components\HookProvider\Conditional;
use WPDesk\ShopMagic\Components\HookProvider\HookProvider;
use WPDesk\ShopMagic\Customer\CustomerProvider;
use WPDesk\ShopMagic\Customer\Guest\Guest;
use WPDesk\ShopMagic\Customer\Guest\GuestManager;
use WPDesk\ShopMagic\Helper\PluginBag;
use WPDesk\ShopMagic\Helper\WordPressPluggableHelper;

final class PreSubmitData implements HookProvider, Conditional {

	/** @var string */
	private const SHOPMAGIC_PRESUBMIT = 'shopmagic-presubmit';

	private CustomerProvider $customer_interceptor;

	private CustomerSessionTracker $tracker;

	private PluginBag $plugin_bag;

	private GuestManager $guest_manager;

	public function __construct(
		CustomerProvider $customer_interceptor,
		PluginBag $plugin_bag,
		CustomerSessionTracker $tracker,
		GuestManager $guest_manager
	) {
		$this->customer_interceptor = $customer_interceptor;
		$this->plugin_bag           = $plugin_bag;
		$this->tracker              = $tracker;
		$this->guest_manager        = $guest_manager;
	}

	public static function is_needed(): bool {
		return WordPressPluggableHelper::is_plugin_active( 'woocommerce/woocommerce.php' ) &&
				! is_user_logged_in() &&
				filter_var(
					GeneralSettings::get_option( 'enable_pre_submit', true ),
					\FILTER_VALIDATE_BOOLEAN
				);
	}

	public function hooks(): void {
		add_action(
			'wp_enqueue_scripts',
			function (): void {
				if ( ! is_checkout() ) {
					return;
				}

				wp_register_script(
					self::SHOPMAGIC_PRESUBMIT,
					$this->plugin_bag->get_assets_url() . '/js/presubmit.js',
					[ 'jquery' ],
					SHOPMAGIC_VERSION,
					true
				);
				wp_localize_script(
					self::SHOPMAGIC_PRESUBMIT,
					'shopmagic_presubmit_params',
					$this->get_js_params()
				);
				wp_enqueue_script( self::SHOPMAGIC_PRESUBMIT );
			}
		);
		add_action(
			'wp_ajax_nopriv_capture_email_url',
			[ $this, 'ajax_capture_email' ]
		);
		add_action(
			'wp_ajax_nopriv_capture_checkout_field_url',
			[ $this, 'ajax_capture_checkout_field' ]
		);
	}

	/**
	 * @return array{email_capture_selectors: mixed[], checkout_capture_selectors: mixed[],
	 *                                        capture_email_url: mixed, capture_checkout_field_url:
	 *                                        mixed}
	 */
	private function get_js_params(): array {
		$params                               = [];
		$params['email_capture_selectors']    = $this->get_email_capture_selectors();
		$params['checkout_capture_selectors'] = $this->get_checkout_capture_fields();
		$params['capture_email_url']          = add_query_arg(
			[ 'action' => 'capture_email_url' ],
			admin_url( 'admin-ajax.php' )
		);
		$params['capture_checkout_field_url'] = add_query_arg(
			[ 'action' => 'capture_checkout_field_url' ],
			admin_url( 'admin-ajax.php' )
		);

		return $params;
	}

	/**
	 * @return mixed[]
	 */
	public function get_email_capture_selectors(): array {
		return apply_filters(
			'shopmagic/core/presubmit/guest_capture_fields',
			[
				'.woocommerce-checkout [type="email"]',
				'#billing_email',
				'.automatewoo-capture-guest-email',
				'input[name="billing_email"]',
				'.wc-block-components-address-form__email input',
			]
		);
	}

	/** @return string[] */
	public function get_checkout_capture_fields(): array {
		return apply_filters(
			'shopmagic/core/presubmit/checkout_capture_fields',
			[
				'billing_first_name',
				'billing_last_name',
				'first_name',
				'last_name',
				'billing_company',
				'billing_phone',
				'billing_country',
				'billing_address_1',
				'billing_address_2',
				'billing_city',
				'billing_state',
				'billing_postcode',
				'company',
				'phone',
				'country',
				'address_1',
				'address_2',
				'city',
				'state',
				'postcode',
			]
		);
	}

	public function ajax_capture_email(): void {
		if ( ! isset( $_REQUEST['email'], $_REQUEST['checkout_fields'] ) ) {
			wp_send_json_error();
		}

		$email           = sanitize_email( wp_unslash( $_REQUEST['email'] ) );
		$checkout_fields = wp_unslash( $_REQUEST['checkout_fields'] );

		$this->tracker->set_user_email( $email );

		if ( \is_array( $checkout_fields ) ) {
			foreach ( $checkout_fields as $field_name => $field_value ) {
				if ( ! $this->is_checkout_capture_field( $field_name ) || empty( $field_value ) ) {
					continue; // IMPORTANT don't save the field if it is empty.
				}

				$field_name = $this->normalize_field_name_key( $field_name );

				$this->tracker->set_meta(
					sanitize_key( $field_name ),
					sanitize_text_field( $field_value )
				);
			}
		} else {
			$location = wc_get_customer_default_location();
			if ( $location['country'] ) {
				$this->tracker->set_meta( 'billing_country', $location['country'] );
			}
		}

		$customer = $this->customer_interceptor->get_customer();

		if ( $customer instanceof Guest ) {
			$this->guest_manager->save( $customer );
		}

		wp_send_json_success();
	}

	private function is_checkout_capture_field( string $field_name ): bool {
		return \in_array( $field_name, $this->get_checkout_capture_fields(), true );
	}

	/**
	 * For guest customer some fields were usually saved without typical WooCommerce `billing_`
	 * prefix, and failing to hold on to that may lead in unexpected minor bugs, like disability to
	 * use `customer.first_name` placeholder in other places. Make sure, when intercepting customer
	 * from presubmit data that we don't use the `billing_` prefix.
	 *
	 * This really is only for guest customers, as users who are logged in are not intercepted by
	 * this script.
	 */
	private function normalize_field_name_key( string $field_name ): string {
		switch ( $field_name ) {
			case 'billing_first_name':
				return 'first_name';
			case 'billing_last_name':
				return 'last_name';
			case 'first_name':
			case 'last_name':
				return $field_name;
			default:
				return 'billing_' . str_replace( 'billing_', '', $field_name );
		}
	}

	/**
	 * Capture an additional field from the checkout page
	 */
	public function ajax_capture_checkout_field(): void {
		if ( ! isset( $_REQUEST['field_name'], $_REQUEST['field_value'] ) ) {
			wp_send_json_error();
		}

		if ( ! $this->customer_interceptor->is_customer_provided() ) {
			wp_send_json_success();
		}

		$field_name  = sanitize_key( $_REQUEST['field_name'] );
		$field_value = sanitize_text_field( wp_unslash( $_REQUEST['field_value'] ) );

		$field_name = $this->normalize_field_name_key( $field_name );

		if ( $this->is_checkout_capture_field( $field_name ) ) {
			$this->tracker->set_meta( $field_name, $field_value );
		}

		$customer = $this->customer_interceptor->get_customer();

		if ( $customer instanceof Guest ) {
			$this->guest_manager->save( $customer );
		}

		wp_send_json_success();
	}
}
