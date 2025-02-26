<?php
class Mollie_EDD_Helper_Data
{
	/**
	 * Transient prefix. We can not use plugin slug because this
	 * will generate to long keys for the wp_options table.
	 *
	 * @var string
	 */
	const TRANSIENT_PREFIX = 'mollie-edd-';

	/**
	 * @var \Mollie\Api\Resources\Method[]|\Mollie\Api\Resources\MethodCollection|array
	 */
	protected static $regular_api_methods = array();

	/**
	 * @var \Mollie\Api\Resources\Method[]|\Mollie\Api\Resources\MethodCollection|array
	 */
	protected static $recurring_api_methods = array();

	/**
	 * @var \Mollie\Api\Resources\MethodCollection[]
	 */
	protected static $method_issuers;

	public function __construct ()
	{
	}

	/**
	 * Get current locale
	 *
	 * @return string
	 */
	protected function getCurrentLocale ()
	{
		return apply_filters('wpml_current_language', get_locale());
	}

	/**
	 * @param string $transient
	 * @return string
	 */
	public function getTransientId ($transient)
	{
		global $wp_version;

		/*
		 * WordPress will save two options to wp_options table:
		 * 1. _transient_<transient_id>
		 * 2. _transient_timeout_<transient_id>
		 */
		$transient_id       = self::TRANSIENT_PREFIX . $transient;
		$option_name        = '_transient_timeout_' . $transient_id;
		$option_name_length = strlen($option_name);

		$max_option_name_length = 191;

		/**
		 * Prior to WordPress version 4.4.0, the maximum length for wp_options.option_name is 64 characters.
		 * @see https://core.trac.wordpress.org/changeset/34030
		 */
		if ($wp_version < '4.4.0') {
			$max_option_name_length = 64;
		}

		if ($option_name_length > $max_option_name_length)
		{
			edd_mollie_debug_log(__METHOD__ . " : Transient id $transient_id is to long. Option name $option_name ($option_name_length) will be to long for database column wp_options.option_name which is varchar($max_option_name_length).");
		}

		return $transient_id;
	}

	/**
	 * Get EDD Order
	 *
	 * @param int $order_id Payment ID
	 * @return EDD_Payment|bool
	 */
	public function getEddOrder ( $order_id )
	{
		if ( is_object( $order_id ) && is_a( $order_id, 'EDD_Payment' ) ) {
			return $order_id;
		} elseif ( is_numeric( $order_id ) ) {
			return new \EDD_Payment( absint( $order_id ) );
		} else {
			return false;
		}
	}

	/**
	 * @param EDD_Payment $order
	 * @return string
	 */
	public function getOrderStatus ( $order )
	{
		return $order->status;
	}

	/**
	 * Check if a order has a status
	 *
	 * @param string|string[] $status
	 * @return bool
	 */
	public function hasOrderStatus (WC_Order $order, $status)
	{
		if (method_exists($order, 'has_status'))
		{
			/**
			 * @since WooCommerce 2.2
			 */
			return $order->has_status($status);
		}

		if (!is_array($status))
		{
			$status = array($status);
		}

		return in_array($this->getOrderStatus($order), $status);
	}

	/**
	 * Get payment gateway class by order data.
	 *
	 * @param int|EDD_Payment $order
	 * @return WC_Payment_Gateway|bool
	 */
	public function getEddPaymentGatewayByOrder ($order)
	{
		return EDD_Mollie()->get_gateway( $order->gateway );
	}

	/**
	 * Called when page 'WooCommerce -> Checkout -> Checkout Options' is saved
	 *
	 * @see \Mollie_EDD_Plugin::init
	 */
	public function deleteTransients ()
	{
		edd_mollie_debug_log(__METHOD__ . ': Mollie settings saved, delete transients');

		$transient_names = array(
			'api_methods_test',
			'api_methods_live',
			'api_issuers_test',
			'api_issuers_live',
			'ideal_issuers_test',
			'ideal_issuers_live',
			'kbc_issuers_test',
			'kbc_issuers_live',
			'giftcard_issuers_test',
			'giftcard_issuers_live',
		);

		$languages   = array_keys(apply_filters('wpml_active_languages', array()));
		$languages[] = $this->getCurrentLocale();

		foreach ($transient_names as $transient_name)
		{
			foreach ($languages as $language)
			{
				delete_transient($this->getTransientId($transient_name . "_$language"));
			}
		}
	}

	/**
	 * Get Mollie payment from cache or load from Mollie
	 * Skip cache by setting $use_cache to false
	 *
	 * @param string $payment_id
	 * @param bool   $test_mode (default: false)
	 * @param bool   $use_cache (default: true)
	 * @return Mollie\Api\Resources\Payment|null
	 */
	public function getPayment ($payment_id, $test_mode = false, $use_cache = true)
	{
		try
		{

			$payment = EDD_Mollie_Helper()->api->getApiClient($test_mode)->payments->get($payment_id);

			return $payment;
		}
		catch ( \Mollie\Api\Exceptions\ApiException $e )
		{
			edd_mollie_debug_log(__FUNCTION__ . ": Could not load payment $payment_id (" . ($test_mode ? 'test' : 'live') . "): " . $e->getMessage() . ' (' . get_class($e) . ')');
		}

		return NULL;
	}


	/**
	 * @param bool $test_mode
	 * @param bool $use_cache
	 *
	 * @return array|mixed|\Mollie\Api\Resources\Method[]|\Mollie\Api\Resources\MethodCollection
	 */
	public function getAllPaymentMethods( $test_mode = false, $use_cache = true ) {

		$result                  = $this->getRegularPaymentMethods( $test_mode, $use_cache );
		$recurringPaymentMethods = $this->getRecurringPaymentMethods( $test_mode, $use_cache );

		foreach ( $recurringPaymentMethods as $recurringItem ) {
			$notFound = true;
			foreach ( $result as $item ) {
				if ( $item['id'] == $recurringItem['id'] ) {
					$notFound = false;
					break;
				}
			}
			if ( $notFound ) {
				$result[] = $recurringItem;
			}
		}

		return $result;
	}

	/**
	 * @param bool $test_mode
	 * @param bool $use_cache
	 *
	 * @return array|mixed|\Mollie\Api\Resources\Method[]|\Mollie\Api\Resources\MethodCollection
	 */
	public function getRegularPaymentMethods( $test_mode = false, $use_cache = true ) {
		// Already initialized
		if ( $use_cache && ! empty( self::$regular_api_methods ) ) {
			return self::$regular_api_methods;
		}

		self::$regular_api_methods = $this->getApiPaymentMethods( $test_mode, $use_cache );

		return self::$regular_api_methods;
	}


	public function getRecurringPaymentMethods( $test_mode = false, $use_cache = true ) {
		// Already initialized
		if ( $use_cache && ! empty( self::$recurring_api_methods ) ) {
			return self::$recurring_api_methods;
		}

		self::$recurring_api_methods = $this->getApiPaymentMethods( $test_mode, $use_cache, array ( 'sequenceType' => 'recurring' ) );

		return self::$recurring_api_methods;
	}

	public function getApiPaymentMethods( $test_mode = false, $use_cache = true, $filters = array () ) {

		$methods = false;

		$filters_key = $filters;
		$filters_key['mode'] = ( $test_mode ? 'test' : 'live' );
		$filters_key['api'] = 'methods';

		try {

			$transient_id = $this->getTransientId( md5(http_build_query($filters_key))  );

			if ($use_cache) {
				// When no cache exists $methods will be `false`
				$methods = unserialize( get_transient( $transient_id ) );
			}

			// No cache exists, call the API and cache the result
			if ( $methods === false ) {

				// Remove existing expired transients
				delete_transient( $transient_id );

				$filters['resource'] = 'orders';
				$filters['includeWallets'] = 'applepay';

				$methods = EDD_Mollie_Helper()->api->getApiClient( $test_mode )->methods->all( $filters );

				$methods_cleaned = array();

				foreach ( $methods as $method ) {
					$public_properties = get_object_vars( $method ); // get only the public properties of the object
					$methods_cleaned[] = $public_properties;
				}

				// $methods_cleaned is empty array when the API doesn't return any methods, cache the empty array
				$methods = $methods_cleaned;

				// Set new transients (as cache)
				try {
					set_transient( $transient_id, serialize( $methods ), MINUTE_IN_SECONDS * 5 );
				}
				catch ( Exception $e ) {
					edd_mollie_debug_log( __FUNCTION__ . ": No caching because serialization failed." );
				}
			}

			return $methods;
		}
		catch ( \Mollie\Api\Exceptions\ApiException $e ) {
			edd_mollie_debug_log( __FUNCTION__ . ": Could not load Mollie methods (" . ( $test_mode ? 'test' : 'live' ) . "): " . $e->getMessage() . ' (' . get_class( $e ) . ')' );

			return array();
		}
	}

	/**
	 * @param bool $test_mode
	 * @param      $method
	 *
	 * @return mixed|\Mollie\Api\Resources\Method|null
	 */
	public function getPaymentMethod ($test_mode = false, $method = null)
	{
		$payment_methods = $this->getAllPaymentMethods($test_mode);

		foreach ($payment_methods as $payment_method)
		{
			if ($payment_method['id'] == $method)
			{
				return $payment_method;
			}
		}

		return null;
	}

	/**
	 * Get issuers for payment method (e.g. for iDEAL, KBC/CBC payment button, gift cards)
	 *
	 * @param bool        $test_mode (default: false)
	 * @param string|null $method
	 *
	 * @return array|\Mollie\Api\Resources\Method||\Mollie\Api\Resources\MethodCollection
	 */
	public function getMethodIssuers( $test_mode = false, $method = null ) {

		try {

			$transient_id = $this->getTransientId( $method . '_issuers_' . ( $test_mode ? 'test' : 'live' ) );

			// When no cache exists $cached_issuers will be `false`
			$issuers = unserialize( get_transient( $transient_id ) );

			if ( $issuers === false ) {

				// Remove existing expired transients
				delete_transient( $transient_id );

				$method  = EDD_Mollie_Helper()->api->getApiClient( $test_mode )->methods->get( "$method", array ( "include" => "issuers" ) );
				$issuers = $method->issuers;

				// Set new transients (as cache)
				try {
					set_transient( $transient_id, serialize( $issuers ), MINUTE_IN_SECONDS * 5 );
				}
				catch ( Exception $e ) {
					edd_mollie_debug_log( __FUNCTION__ . ": No caching because serialization failed." );
				}
			}

			return $issuers;

		}
		catch ( \Mollie\Api\Exceptions\ApiException $e ) {
			edd_mollie_debug_log( __FUNCTION__ . ": Could not load " . $method . " issuers (" . ( $test_mode ? 'test' : 'live' ) . "): " . $e->getMessage() . ' (' . get_class( $e ) . ')' );
		}

		return array ();
	}

	/**
	 * @param int         $user_id
	 * @param string|null $customer_id
	 *
	 * @return $this
	 */
	public function setUserMollieCustomerId( $user_id, $customer_id ) {
		if ( ! empty( $customer_id ) ) {
			try {
				$customer = new EDD_Customer( $user_id, $by_user_id = true );
				$customer->update_meta( '_mollie_customer_id', $customer_id );
				edd_mollie_debug_log( __FUNCTION__ . ": Stored Mollie customer ID " . $customer_id . " with user " . $user_id );
			}
			catch ( Exception $e ) {
				edd_mollie_debug_log( __FUNCTION__ . ": Couldn't load (and save) WooCommerce customer based on user ID " . $user_id );

			}
		}

		return $this;
	}

	/**
	 * @param $orderId
	 * @param $customer_id
	 * @return $this
	 */
	public function setUserMollieCustomerIdAtSubscription ($orderId, $customer_id)
	{
		if (!empty($customer_id))
		{
			if ( version_compare( WC_VERSION, '3.0', '<' ) ) {
				update_post_meta( $orderId, '_mollie_customer_id', $customer_id );
			} else {
				$order = $this->getWcOrder( $orderId );
				$order->update_meta_data( '_mollie_customer_id', $customer_id );
				$order->save();
			}
		}

		return $this;
	}

	/**
	 * @param int  $user_id
	 * @param bool $test_mode
	 * @return null|string
	 */
	public function getUserMollieCustomerId ($user_id, $test_mode = FALSE)
	{
		// Guest users can't buy subscriptions and don't need a Mollie customer ID
		if (empty($user_id))
		{
			return NULL;
		}

		$customer = new EDD_Customer( $user_id, $by_user_id = true );
		$mollie_customer_id = $customer->get_meta( '_mollie_customer_id' );
		
		// If there is a Mollie Customer ID set, check that customer ID is valid for this API key
		if ( ! empty( $mollie_customer_id ) ) {

			try {
				EDD_Mollie_Helper()->api->getApiClient( $test_mode )->customers->get( $mollie_customer_id );
			}
			catch ( \Mollie\Api\Exceptions\ApiException $e ) {
				edd_mollie_debug_log( __FUNCTION__ . ": Mollie Customer ID ($mollie_customer_id) not valid for user $user_id on this API key, try to create a new one (" . ( $test_mode ? 'test' : 'live' ) . ")." );
				$mollie_customer_id = '';
			}
		}

		// If there is no Mollie Customer ID set, try to create a new Mollie Customer
		if (empty($mollie_customer_id))
		{
			try
			{
				$userdata = get_userdata($user_id);

				// Get the best name for use as Mollie Customer name
				$user_full_name = $customer->name;

				if ( strlen( trim( $user_full_name ) ) == null ) {
					$user_full_name = $userdata->display_name;
				}

				// Create the Mollie Customer
				$mollie_customer = EDD_Mollie_Helper()->api->getApiClient( $test_mode )->customers->create( array (
					'name'     => trim( $user_full_name ),
					'email'    => trim( $customer->email ),
					'metadata' => array (
						'user_id'     => $user_id,
						'customer_id' => $customer->id,
					),
				) );

				$this->setUserMollieCustomerId($user_id, $mollie_customer->id);

				$mollie_customer_id = $mollie_customer->id;

				edd_mollie_debug_log( __FUNCTION__ . ": Created a Mollie Customer ($mollie_customer_id) for WordPress user with ID $user_id (" . ( $test_mode ? 'test' : 'live' ) . ")." );

				return $mollie_customer_id;

			}
			catch ( \Mollie\Api\Exceptions\ApiException $e )
			{
				edd_mollie_debug_log( __FUNCTION__ . ": Could not create Mollie Customer for WordPress user with ID $user_id (" . ( $test_mode ? 'test' : 'live' ) . "): " . $e->getMessage() . ' (' . get_class( $e ) . ')' );
			}
		} else {
			edd_mollie_debug_log( __FUNCTION__ . ": Mollie Customer ID ($mollie_customer_id) found and valid for user $user_id on this API key. (" . ( $test_mode ? 'test' : 'live' ) . ")." );
		}

		return $mollie_customer_id;
	}

	/**
	 * Get active Mollie payment mode for order
	 *
	 * @param int $order_id
	 * @return string test or live
	 */
	public function getActiveMolliePaymentMode ($order_id)
	{
		$order = $this->getEddOrder( $order_id );
		$payment_mode = $order->get_meta( '_mollie_payment_mode' );

		if (empty($payment_mode)) {
			$payment_mode = EDD_Mollie_Helper()->settings->isTestModeEnabled() ? 'test' : 'live';
		}

		return $payment_mode;
	}

	/**
	 * Get the EDD currency for current order
	 *
	 * @param $order
	 *
	 * @return string $value
	 */
	public function getOrderCurrency( $order ) {
		return $order->currency;
	}

	/**
	 * Format currency value into Mollie API v2 format
	 *
	 * @param $value
	 *
	 * @return int $value
	 */
	public function formatCurrencyValue( $value, $currency ) {

		// Only the Japanese Yen has no decimals in the currency
		if ( $currency == "JPY" ) {
			$value = number_format( $value, 0, '.', '' );
		} else {
			$value = number_format( $value, 2, '.', '' );
		}

		return $value;
	}

}
