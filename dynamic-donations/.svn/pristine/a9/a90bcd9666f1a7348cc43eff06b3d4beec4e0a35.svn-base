<?php

class DyDo {

	/**
	 * The single instance of the class.
	 *
	 * @var object | self
	 */
	protected static $instance = null;

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	protected function __construct() {
	}

	/**
	 * Get class instance.
	 *
	 * @return object | self
	 */
	final public static function getInstance() {
		if ( is_null( static::$instance ) ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Init Plugin
	 */
	public function init() {
		$this->load_dependencies();

		new DyDo_Admin();
		new DyDo_Admin_Ajax();
		new DyDo_Public();
		new DyDo_Public_Ajax();
		new DyDo_Woocommerce();
        new DyDo_v1_Api();
	}

	/**
	 * Load dependencies
	 */
	private function load_dependencies() {
		// error_log(print_r(serialize(get_option('dydo_options')),true));
		$dependencies = array(
			// Abstracts
			'/abstracts/abstract-dydo-enqueues.php',

			// Enqueues
			'/enqueues/class-dydo-enqueues-scripts.php',
			'/enqueues/class-dydo-enqueues-styles.php',
			'/enqueues/class-dydo-enqueues.php',

			// DB
			'/db/class-dydo-db.php',
			'/db/funcs-dydo-db.php',

			// Auth
			'/auth/class-dydo-auth.php',

			// Payments
			'/payments/interface-dydo-onetime-payment.php',
			'/payments/interface-dydo-recurring-payment.php',

			'/payments/abstract-dydo-stripe-payment.php',

			'/payments/class-dydo-stripe-payment.php',
			'/payments/class-dydo-stripe-onetime-payment.php',
			'/payments/class-dydo-stripe-recurring-payment.php',

			'/payments/class-dydo-payment.php',

			// Stripe
			'/payments/stripe/api/class-dydo-stripe-api-connect.php',
			'/payments/stripe/api/class-dydo-stripe-api-customers.php',
			'/payments/stripe/api/class-dydo-stripe-api-paymentmethods.php',
			'/payments/stripe/api/class-dydo-stripe-api-plans.php',
			'/payments/stripe/api/class-dydo-stripe-api-products.php',
			'/payments/stripe/api/class-dydo-stripe-api-resources.php',
			'/payments/stripe/api/class-dydo-stripe-api-subscriptions.php',
			'/payments/stripe/api/class-dydo-stripe-api-invoices.php',
			'/payments/stripe/api/class-dydo-stripe-api-prices.php',
			'/payments/stripe/api/class-dydo-stripe-api-webhooks.php',
			'/payments/class-dydo-stripe-webhooks-management.php',



			'/payments/stripe/implements/class-dydo-stripe-implement-customers.php',
			'/payments/stripe/implements/class-dydo-stripe-implement-paymentmethods.php',
			'/payments/stripe/implements/class-dydo-stripe-implement-plans.php',
			'/payments/stripe/implements/class-dydo-stripe-implement-products.php',
			'/payments/stripe/implements/class-dydo-stripe-implement-resources.php',
			'/payments/stripe/implements/class-dydo-stripe-implement-subscriptions.php',
			'/payments/stripe/implements/class-dydo-stripe-implement-invoices.php',
			'/payments/stripe/implements/class-dydo-stripe-implement-prices.php',
			'/payments/stripe/implements/class-dydo-stripe-implement-webhooks.php',

			'/woocommerce/class-dydo-woocommerce.php',

			// Admin
			'/admin/class-dydo-admin.php',
			'/admin/class-dydo-admin-ajax.php',

			// Public
			'/public/class-dydo-public.php',
			'/public/class-dydo-public-ajax.php',

			// Root
			'/funcs-dydo-helpers.php',
			'/supported-currencies.php',

			// api
			'/wp_api/class-dydo-v1-api.php',
		);

		foreach ( $dependencies as $dependency ) {
			require_once DYDO_INCLUDES_PATH . "{$dependency}";
		}
	}

	/**
	 * Prevent cloning.
	 */
	private function __clone() {
	}

	/**
	 * Prevent unserializing.
	 */
	private function __walkup() {
	}
}
