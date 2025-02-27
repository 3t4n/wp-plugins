<?php
/**
 * Borica Helper Doc Comment
 *
 * PHP version 8
 *
 * @category Helper
 * @package  Borica_Woo_Payment_Gateway
 * @author   Ilko Ivanov <ilko.iv@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.borica.bg/
 */

/**
 * Borica_Helper Class Doc Comment
 *
 * Borica_Helper Class, helper functions
 *
 * @author   Ilko Ivanov <ilko.iv@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.borica.bg/
 */
class Borica_Helper {

	/**
	 * BORICA Test Mode Public Key
	 *
	 * This constant contains the public key used by the BORICA payment gateway in test mode.
	 * The public key is utilized for verifying the signatures of transactions when operating
	 * in a non-production environment. This ensures that the transaction data has not been tampered
	 * with and is coming from a legitimate source.
	 *
	 * Key Details:
	 * - **Test Environment:** The public key is specifically for use in the test environment and should
	 *   not be used for production transactions.
	 * - **PEM Format:** The key is stored in the PEM format, which is a base64 encoded form of the public key
	 *   data, wrapped with `BEGIN` and `END PUBLIC KEY` markers.
	 * - **Security:** The public key should be kept secure and should only be used within the appropriate
	 *   context to ensure the integrity of test transactions.
	 *
	 * Example Usage:
	 * - This key is used in methods that verify the authenticity of incoming BORICA test transactions,
	 *   ensuring that the data has not been altered in transit.
	 *
	 * @var string
	 */
	protected const BORICA_TEST_PUBLIC_KEY =
	'-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAya0nWBwWR19j/B8STchu
oADV295eP0nd0I3KWIeiiiPV4+xfzqOVguKOt086BrIRLAfTU46dURtwX3PaqiJw
fXa8lpr1kQWCqQH6q/nl6t9A5OOBWF34pFvxgRL64QaQgUTwP+l4sx4p6JFKV41y
itFrgnWaz9X/Y6SXGDTFKcRfDy1FrRTY6g+UTAJtPTUOA8yi53kSK2lO8P3+Bzr1
paBVLjvsSt+uj4Jbz1ssY2IeHqaZm3vW4he6A20Z/ZGE/n1+YQoEqP4NIXVAjrlJ
W+/Z5hvokGWEdf6Fmyz+gA3G+pgVIbiTovW2SgPBy0H6runURtYS6oM3FhPRGJ2Q
uQIDAQAB
-----END PUBLIC KEY-----';

	/**
	 * BORICA Production Mode Public Key
	 *
	 * This constant contains the public key used by the BORICA payment gateway in production mode.
	 * The public key is utilized for verifying the signatures of transactions when operating
	 * in a live, production environment. This ensures that the transaction data has not been tampered
	 * with and is coming from a legitimate source.
	 *
	 * Key Details:
	 * - **Production Environment:** The public key is specifically for use in the production environment and should
	 *   not be used for test transactions.
	 * - **PEM Format:** The key is stored in the PEM format, which is a base64 encoded form of the public key
	 *   data, wrapped with `BEGIN` and `END PUBLIC KEY` markers.
	 * - **Security:** The public key should be kept secure and handled with care, as it is critical for ensuring
	 *   the integrity and authenticity of live transaction data.
	 *
	 * Example Usage:
	 * - This key is used in methods that verify the authenticity of incoming BORICA production transactions,
	 *   ensuring that the data has not been altered in transit.
	 *
	 * @var string
	 */
	protected const BORICA_PRODUCTION_PUBLIC_KEY =
	'-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA8oqRwrBQKZdO+VPoDHFf
5giPRQkObyvXM8wDDm+kIPhC4gIR8Ch9sFZlQxa8ZE3cCDMsAviub6+RvTtkqy1p
C5abVJQhAIpmIX3NDf82+aD+kGuxIe6JpcFAfKhV0zEr5LzqDYNzhn2huDpv7W+Z
5zUjtwxP5Ob9/Lmw0ckF6XE3drzt0pK26p3ZKRicUh/cGBWQC7bGHpnSnNmvF5Fq
b6PLu6Gzq5RjtSnJG7q8T7DWL5iFVpSFMN0tLbfuCM0ZSc5xodrk84esRm36KMV+
lx3t6HQ1kvs7aQKbGq0TtBAbfQRlYBlgV2DamyOQfH6vMiD179bol4Ss0XvaYWzq
fwIDAQAB
-----END PUBLIC KEY-----';

	/**
	 * Generates a digital signature for a BORICA authorization request.
	 *
	 * This method creates a digital signature for the authorization request to the BORICA payment gateway.
	 * The signature ensures the integrity and authenticity of the request data, and is generated using the
	 * appropriate private key based on the current environment (test or production).
	 *
	 * Key functionality:
	 * - **Environment Detection:** Determines whether the gateway is operating in test mode or production mode,
	 *   and selects the corresponding private key and password for signing the request.
	 * - **Currency Handling:** Selects the appropriate private key and password based on the transaction currency
	 *   (BGN or EUR).
	 * - **Data String Construction:** Constructs a data string from the provided parameters, including the terminal ID,
	 *   transaction type, amount, currency, order ID, timestamp, and nonce, concatenated in a specific format required by BORICA.
	 * - **Digital Signature:** Uses OpenSSL to generate a SHA-256 digital signature of the data string, which is then
	 *   encoded in hexadecimal format and converted to uppercase for use in the BORICA request.
	 * - **Error Handling:** Catches and handles any exceptions that occur during the signing process, returning the error
	 *   message if the signing fails.
	 *
	 * @param string $borica_terminal  The BORICA terminal ID.
	 * @param string $borica_trtype    The transaction type.
	 * @param string $borica_amount    The transaction amount.
	 * @param string $borica_currency  The currency code (e.g., BGN, EUR).
	 * @param string $borica_order     The order ID.
	 * @param string $borica_timestamp The timestamp of the transaction.
	 * @param string $borica_nonce     A unique nonce for the transaction.
	 *
	 * @return array An array containing the generated signature (`pSign`) and any error message (`boricaError`).
	 *               - `'pSign' => string`: The generated digital signature in hexadecimal format.
	 *               - `'boricaError' => string`: An error message if the signing process fails, or an empty string if successful.
	 */
	public function sign_authorization(
		string $borica_terminal,
		string $borica_trtype,
		string $borica_amount,
		string $borica_currency,
		string $borica_order,
		string $borica_timestamp,
		string $borica_nonce
	): array {
		$result                     = array();
		$borica_testmode            = (int) get_option( 'borica_testmode' );
		$borica_test_key            = '';
		$borica_production_key      = '';
		$borica_test_password       = '';
		$borica_production_password = '';
		$current_currency_code      = get_woocommerce_currency();
		if ( 'BGN' === $current_currency_code ) {
			$borica_test_key            = (string) get_option( 'borica_test_key_bgn' );
			$borica_production_key      = (string) get_option( 'borica_production_key_bgn' );
			$borica_test_password       = (string) get_option( 'borica_test_password_bgn' );
			$borica_production_password = (string) get_option( 'borica_production_password_bgn' );
		}
		if ( 'EUR' === $current_currency_code ) {
			$borica_test_key            = (string) get_option( 'borica_test_key_eur' );
			$borica_production_key      = (string) get_option( 'borica_production_key_eur' );
			$borica_test_password       = (string) get_option( 'borica_test_password_eur' );
			$borica_production_password = (string) get_option( 'borica_production_password_eur' );
		}
		if ( 1 === $borica_testmode ) {
			$priv_key          = $borica_test_key;
			$priv_key_password = $borica_test_password;
		} else {
			$priv_key          = $borica_production_key;
			$priv_key_password = $borica_production_password;
		}
		$data =
			strlen( $borica_terminal ) . $borica_terminal .
			strlen( $borica_trtype ) . $borica_trtype .
			strlen( $borica_amount ) . $borica_amount .
			strlen( $borica_currency ) . $borica_currency .
			strlen( $borica_order ) . $borica_order .
			strlen( $borica_timestamp ) . $borica_timestamp .
			strlen( $borica_nonce ) . $borica_nonce .
			'-';
		try {
			$pkeyid = openssl_get_privatekey( $priv_key, $priv_key_password );
			openssl_sign( $data, $signature, $pkeyid, OPENSSL_ALGO_SHA256 );
			$result['boricaError'] = '';
			$result['pSign']       = strtoupper( bin2hex( $signature ) );
		} catch ( \Exception $e ) {
			$result['boricaError'] = $e->getMessage();
			$result['pSign']       = '';
		}
		return $result;
	}

	/**
	 * Verifies the BORICA payment authorization response signature.
	 *
	 * This method checks the validity of the signature received in the response from BORICA to ensure that
	 * the response has not been tampered with and is authentic. It reconstructs the data string from the
	 * provided parameters and compares it with the signature using the appropriate public key.
	 *
	 * Key functionality:
	 * - **Environment Detection:** Determines whether the verification should use the test or production public key
	 *   based on the current environment settings.
	 * - **Data String Construction:** Builds the data string from the provided parameters, which includes
	 *   transaction details such as the action, response code, terminal ID, transaction type, amount, currency,
	 *   order ID, RRN, internal reference, PARes status, ECI, timestamp, and nonce.
	 * - **Signature Verification:** Uses OpenSSL to verify the reconstructed data string against the provided
	 *   signature using the BORICA public key.
	 * - **Error Handling:** Checks the result of the verification and returns `true` if the signature is valid,
	 *   or `false` if it is not valid or if an error occurs during the verification process.
	 *
	 * @param string $borica_p_sign       The signature to be verified.
	 * @param string $borica_action       The action performed.
	 * @param string $borica_rc           The response code.
	 * @param string $borica_approval     The approval code.
	 * @param string $borica_terminal     The BORICA terminal ID.
	 * @param string $borica_trtype       The transaction type.
	 * @param string $borica_amount       The transaction amount.
	 * @param string $borica_currency     The currency code (e.g., BGN, EUR).
	 * @param string $borica_order        The order ID.
	 * @param string $borica_rrn          The retrieval reference number.
	 * @param string $borica_int_ref      The internal reference number.
	 * @param string $borica_pares_status The PARes status.
	 * @param string $borica_eci          The electronic commerce indicator.
	 * @param string $borica_timestamp    The timestamp of the transaction.
	 * @param string $borica_nonce        A unique nonce for the transaction.
	 *
	 * @return bool Returns `true` if the signature is valid, `false` otherwise.
	 */
	public function check_authorization(
		string $borica_p_sign,
		string $borica_action,
		string $borica_rc,
		string $borica_approval,
		string $borica_terminal,
		string $borica_trtype,
		string $borica_amount,
		string $borica_currency,
		string $borica_order,
		string $borica_rrn,
		string $borica_int_ref,
		string $borica_pares_status,
		string $borica_eci,
		string $borica_timestamp,
		string $borica_nonce
	): bool {
		$borica_testmode = (int) get_option( 'borica_testmode' );
		if ( 1 === $borica_testmode ) {
			$pub_key = self::BORICA_TEST_PUBLIC_KEY;
		} else {
			$pub_key = self::BORICA_PRODUCTION_PUBLIC_KEY;
		}
		if ( '' !== $borica_action ) {
			$borica_action_data = mb_strlen( $borica_action ) . $borica_action;
		} else {
			$borica_action_data = '-';
		}
		if ( '' !== $borica_rc ) {
			$borica_rc_data = mb_strlen( $borica_rc ) . $borica_rc;
		} else {
			$borica_rc_data = '-';
		}
		if ( '' !== $borica_approval ) {
			$borica_approval_data = mb_strlen( $borica_approval ) . $borica_approval;
		} else {
			$borica_approval_data = '-';
		}
		if ( '' !== $borica_terminal ) {
			$borica_terminal_data = mb_strlen( $borica_terminal ) . $borica_terminal;
		} else {
			$borica_terminal_data = '-';
		}
		if ( '' !== $borica_trtype ) {
			$borica_trtype_data = mb_strlen( $borica_trtype ) . $borica_trtype;
		} else {
			$borica_trtype_data = '-';
		}
		if ( '' !== $borica_amount ) {
			$borica_amount_data = mb_strlen( $borica_amount ) . $borica_amount;
		} else {
			$borica_amount_data = '-';
		}
		if ( '' !== $borica_currency ) {
			$borica_currency_data = mb_strlen( $borica_currency ) . $borica_currency;
		} else {
			$borica_currency_data = '-';
		}
		if ( '' !== $borica_order ) {
			$borica_order_data = mb_strlen( $borica_order ) . $borica_order;
		} else {
			$borica_order_data = '-';
		}
		if ( '' !== $borica_rrn ) {
			$borica_rrn_data = mb_strlen( $borica_rrn ) . $borica_rrn;
		} else {
			$borica_rrn_data = '-';
		}
		if ( '' !== $borica_int_ref ) {
			$borica_int_ref_data = mb_strlen( $borica_int_ref ) . $borica_int_ref;
		} else {
			$borica_int_ref_data = '-';
		}
		if ( '' !== $borica_pares_status ) {
			$borica_pares_status_data = mb_strlen( $borica_pares_status ) . $borica_pares_status;
		} else {
			$borica_pares_status_data = '-';
		}
		if ( '' !== $borica_eci ) {
			$borica_eci_data = mb_strlen( $borica_eci ) . $borica_eci;
		} else {
			$borica_eci_data = '-';
		}
		if ( '' !== $borica_timestamp ) {
			$borica_timestamp_data = mb_strlen( $borica_timestamp ) . $borica_timestamp;
		} else {
			$borica_timestamp_data = '-';
		}
		if ( '' !== $borica_nonce ) {
			$borica_nonce_data = mb_strlen( $borica_nonce ) . $borica_nonce;
		} else {
			$borica_nonce_data = '-';
		}
		$borica_rfu_data = '-';
		$data            =
			$borica_action_data .
			$borica_rc_data .
			$borica_approval_data .
			$borica_terminal_data .
			$borica_trtype_data .
			$borica_amount_data .
			$borica_currency_data .
			$borica_order_data .
			$borica_rrn_data .
			$borica_int_ref_data .
			$borica_pares_status_data .
			$borica_eci_data .
			$borica_timestamp_data .
			$borica_nonce_data .
			$borica_rfu_data;

		$borica_p_sign_bin = hex2bin( $borica_p_sign );
		if ( false !== strpos( $pub_key, 'CERTIFICATE' ) ) {
			$pkeyid = openssl_get_publickey( $pub_key );
		} else {
			$pkeyid = $pub_key;
		}
		$result = openssl_verify( $data, $borica_p_sign_bin, $pkeyid, OPENSSL_ALGO_SHA256 );
		if ( 1 === $result ) {
			return true;
		} elseif ( 0 === $result ) {
			return false;
		} else {
			return false;
		}
		return false;
	}

	/**
	 * Generates a digital signature for a BORICA payment status check request.
	 *
	 * This method creates a digital signature for a payment status check request to the BORICA payment gateway.
	 * The signature ensures the integrity and authenticity of the request data and is generated using the
	 * appropriate private key based on the current environment (test or production) and the currency of the transaction.
	 *
	 * Key functionality:
	 * - **Environment and Currency Detection:** Determines whether the request is being made in test mode or production mode,
	 *   and selects the corresponding private key and password based on the transaction currency (BGN or EUR).
	 * - **Data String Construction:** Constructs a data string from the provided parameters, including the terminal ID,
	 *   transaction type, order ID, and nonce, concatenated in a specific format required by BORICA.
	 * - **Digital Signature:** Uses OpenSSL to generate a SHA-256 digital signature of the data string, which is then
	 *   encoded in hexadecimal format and converted to uppercase for use in the BORICA request.
	 * - **Error Handling:** Catches and handles any exceptions that occur during the signing process, returning the error
	 *   message if the signing fails.
	 *
	 * @param string $borica_terminal The BORICA terminal ID.
	 * @param string $borica_trtype   The transaction type.
	 * @param string $borica_order    The order ID.
	 * @param string $borica_nonce    A unique nonce for the transaction.
	 * @param string $borica_currency The currency code (e.g., BGN, EUR).
	 *
	 * @return array An array containing the generated signature (`pSign`) and any error message (`boricaError`).
	 *               - `'pSign' => string`: The generated digital signature in hexadecimal format.
	 *               - `'boricaError' => string`: An error message if the signing process fails, or an empty string if successful.
	 */
	public function sign_check_payment(
		string $borica_terminal,
		string $borica_trtype,
		string $borica_order,
		string $borica_nonce,
		string $borica_currency
	) {
		$result          = array();
		$borica_testmode = (int) get_option( 'borica_testmode' );
		if ( 'BGN' === $borica_currency ) {
			$borica_test_key            = (string) get_option( 'borica_test_key_bgn' );
			$borica_production_key      = (string) get_option( 'borica_production_key_bgn' );
			$borica_test_password       = (string) get_option( 'borica_test_password_bgn' );
			$borica_production_password = (string) get_option( 'borica_production_password_bgn' );
		}
		if ( 'EUR' === $borica_currency ) {
			$borica_test_key            = (string) get_option( 'borica_test_key_eur' );
			$borica_production_key      = (string) get_option( 'borica_production_key_eur' );
			$borica_test_password       = (string) get_option( 'borica_test_password_eur' );
			$borica_production_password = (string) get_option( 'borica_production_password_eur' );
		}
		if ( 1 === $borica_testmode ) {
			$priv_key          = $borica_test_key;
			$priv_key_password = $borica_test_password;
		} else {
			$priv_key          = $borica_production_key;
			$priv_key_password = $borica_production_password;
		}
		$data =
			strlen( $borica_terminal ) . $borica_terminal .
			strlen( $borica_trtype ) . $borica_trtype .
			strlen( $borica_order ) . $borica_order .
			strlen( $borica_nonce ) . $borica_nonce;
		try {
			$pkeyid = openssl_get_privatekey( $priv_key, $priv_key_password );
			openssl_sign( $data, $signature, $pkeyid, OPENSSL_ALGO_SHA256 );
			$result['boricaError'] = '';
			$result['pSign']       = strtoupper( bin2hex( $signature ) );
		} catch ( \Exception $e ) {
			$result['boricaError'] = $e->getMessage();
			$result['pSign']       = '';
		}
		return $result;
	}

	/**
	 * Generates a digital signature for a BORICA payment drop (void) request.
	 *
	 * This method creates a digital signature for a payment drop (void) request to the BORICA payment gateway.
	 * The signature ensures the integrity and authenticity of the request data and is generated using the
	 * appropriate private key based on the current environment (test or production) and the currency of the transaction.
	 *
	 * Key functionality:
	 * - **Environment and Currency Detection:** Determines whether the request is being made in test mode or production mode,
	 *   and selects the corresponding private key and password based on the transaction currency (BGN or EUR).
	 * - **Data String Construction:** Constructs a data string from the provided parameters, including the terminal ID,
	 *   transaction type, amount, currency, order ID, timestamp, and nonce, concatenated in a specific format required by BORICA.
	 * - **Digital Signature:** Uses OpenSSL to generate a SHA-256 digital signature of the data string, which is then
	 *   encoded in hexadecimal format and converted to uppercase for use in the BORICA request.
	 * - **Error Handling:** Catches and handles any exceptions that occur during the signing process, returning the error
	 *   message if the signing fails.
	 *
	 * @param string $borica_terminal  The BORICA terminal ID.
	 * @param string $borica_trtype    The transaction type.
	 * @param string $borica_amount    The transaction amount.
	 * @param string $borica_currency  The currency code (e.g., BGN, EUR).
	 * @param string $borica_order     The order ID.
	 * @param string $borica_timestamp The timestamp of the transaction.
	 * @param string $borica_nonce     A unique nonce for the transaction.
	 *
	 * @return array An array containing the generated signature (`pSign`) and any error message (`boricaError`).
	 *               - `'pSign' => string`: The generated digital signature in hexadecimal format.
	 *               - `'boricaError' => string`: An error message if the signing process fails, or an empty string if successful.
	 */
	public function sign_drop_payment(
		string $borica_terminal,
		string $borica_trtype,
		string $borica_amount,
		string $borica_currency,
		string $borica_order,
		string $borica_timestamp,
		string $borica_nonce
	) {
		$result          = array();
		$borica_testmode = (int) get_option( 'borica_testmode' );
		if ( 'BGN' === $borica_currency ) {
			$borica_test_key            = (string) get_option( 'borica_test_key_bgn' );
			$borica_production_key      = (string) get_option( 'borica_production_key_bgn' );
			$borica_test_password       = (string) get_option( 'borica_test_password_bgn' );
			$borica_production_password = (string) get_option( 'borica_production_password_bgn' );
		}
		if ( 'EUR' === $borica_currency ) {
			$borica_test_key            = (string) get_option( 'borica_test_key_eur' );
			$borica_production_key      = (string) get_option( 'borica_production_key_eur' );
			$borica_test_password       = (string) get_option( 'borica_test_password_eur' );
			$borica_production_password = (string) get_option( 'borica_production_password_eur' );
		}
		if ( 1 === $borica_testmode ) {
			$priv_key          = $borica_test_key;
			$priv_key_password = $borica_test_password;
		} else {
			$priv_key          = $borica_production_key;
			$priv_key_password = $borica_production_password;
		}
		$data =
			strlen( $borica_terminal ) . $borica_terminal .
			strlen( $borica_trtype ) . $borica_trtype .
			strlen( $borica_amount ) . $borica_amount .
			strlen( $borica_currency ) . $borica_currency .
			strlen( $borica_order ) . $borica_order .
			strlen( $borica_timestamp ) . $borica_timestamp .
			strlen( $borica_nonce ) . $borica_nonce .
			'-';
		try {
			$pkeyid = openssl_get_privatekey( $priv_key, $priv_key_password );
			openssl_sign( $data, $signature, $pkeyid, OPENSSL_ALGO_SHA256 );
			$result['boricaError'] = '';
			$result['pSign']       = strtoupper( bin2hex( $signature ) );
		} catch ( \Exception $e ) {
			$result['boricaError'] = $e->getMessage();
			$result['pSign']       = '';
		}
		return $result;
	}

	/**
	 * Retrieves a BORICA order record based on the provided nonce.
	 *
	 * This method first attempts to retrieve the BORICA order details from the cache using a unique cache key
	 * based on the nonce. If the order details are not found in the cache, it queries the database for the order,
	 * caches the result, and then returns the data. The result is cached to improve performance and reduce database load.
	 *
	 * Key functionality:
	 * - **Caching:** Utilizes WordPress's object cache (`wp_cache_get` and `wp_cache_set`) to store and retrieve the BORICA order
	 *   details, minimizing direct database queries and improving performance.
	 * - **Database Query:** If the order details are not found in the cache, the method uses `$wpdb->prepare` and `$wpdb->get_row`
	 *   to safely execute a database query, retrieving the order details based on the provided nonce.
	 * - **Cache Storage:** The retrieved order details are cached with a 1-hour expiration time to optimize future retrievals.
	 * - **Return Format:** If a matching order is found, the method returns the order details as an associative array.
	 *   If no matching order is found, it returns an empty array.
	 *
	 * @param string $nonce The unique nonce associated with the BORICA order.
	 *
	 * @return array An associative array containing the BORICA order details if found, or an empty array if not found.
	 *               - The returned array contains all the columns from the `borica_orders` table for the matching record.
	 *               - If no matching record is found, an empty array is returned.
	 */
	public function get_borica_order( string $nonce ): array {
		global $wpdb;
		$table_name = $wpdb->prefix . 'borica_orders';
		$order      = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * FROM $table_name WHERE nonce = %s",
				$nonce
			),
			ARRAY_A
		);
		return $order ? $order : array();
	}

	/**
	 * Retrieves a BORICA order record based on the provided order ID.
	 *
	 * This method first attempts to retrieve the BORICA order details from the cache using a unique cache key
	 * based on the order ID. If the order details are not found in the cache, it queries the database for the order,
	 * caches the result, and then returns the data. The result is cached to improve performance and reduce database load.
	 *
	 * Key functionality:
	 * - **Caching:** Utilizes WordPress's object cache (`wp_cache_get` and `wp_cache_set`) to store and retrieve the BORICA order
	 *   details, minimizing direct database queries and improving performance.
	 * - **Database Query:** If the order details are not found in the cache, the method uses `$wpdb->prepare` and `$wpdb->get_row`
	 *   to safely execute a database query, retrieving the order details based on the provided `increment_id`.
	 * - **Cache Storage:** The retrieved order details are cached with a 1-hour expiration time to optimize future retrievals.
	 * - **Return Format:** If a matching order is found, the method returns the order details as an associative array.
	 *   If no matching order is found, it returns an empty array.
	 *
	 * @param string $id The unique increment ID associated with the BORICA order.
	 *
	 * @return array An associative array containing the BORICA order details if found, or an empty array if not found.
	 *               - The returned array contains all the columns from the `borica_orders` table for the matching record.
	 *               - If no matching record is found, an empty array is returned.
	 */
	public function get_borica_order_by_id( string $id ): array {
		global $wpdb;
		$table_name = $wpdb->prefix . 'borica_orders';
		$order      = $wpdb->get_row(
			$wpdb->prepare( "SELECT * FROM $table_name WHERE increment_id = %s", $id ),
			ARRAY_A
		);
		return $order ? $order : array();
	}

	/**
	 * Inserts a new BORICA order record into the database.
	 *
	 * This method is responsible for inserting a new record into the `borica_orders` table in the database.
	 * The method takes an associative array of data to be inserted and an array of corresponding data formats,
	 * ensuring that the data is properly sanitized and securely inserted into the database.
	 *
	 * Key functionality:
	 * - **Database Insertion:** Utilizes WordPress's `$wpdb->insert` method to insert a new record into the `borica_orders` table.
	 *   This method handles the SQL query construction and execution, ensuring that the data is securely inserted into the database.
	 * - **Table Name Handling:** The method dynamically determines the table name by prefixing it with the WordPress table prefix,
	 *   ensuring compatibility with different WordPress installations.
	 * - **Data and Format Handling:** The method accepts two arrays: one for the data to be inserted and one for the data types/formats.
	 *   This helps in ensuring that the data is properly formatted and sanitized before being inserted into the database.
	 *
	 * @param array $data   An associative array containing the column names as keys and the data to be inserted as values.
	 *                      Example: ['column_name1' => 'value1', 'column_name2' => 'value2', ...].
	 * @param array $params An array of data types corresponding to the data being inserted.
	 *                      This ensures that the data is safely and correctly formatted for the database.
	 *                      Example: ['%s', '%d', '%f', ...].
	 *
	 * @return void
	 */
	public function create_borica_order( array $data, array $params ): void {
		global $wpdb;
		$table_name = $wpdb->prefix . 'borica_orders';
		$wpdb->insert(
			$table_name,
			$data,
			$params
		);
	}

	/**
	 * Updates an existing BORICA order record in the database.
	 *
	 * This method is responsible for updating a record in the `borica_orders` table. It accepts an associative array
	 * of data to be updated and an array of corresponding parameters that define the conditions for the update.
	 * This method ensures that the data is properly sanitized and securely updated in the database.
	 *
	 * Key functionality:
	 * - **Database Update:** Utilizes WordPress's `$wpdb->update` method to update an existing record in the `borica_orders` table.
	 *   This method handles the SQL query construction and execution, ensuring that the data is securely updated in the database.
	 * - **Table Name Handling:** The method dynamically determines the table name by prefixing it with the WordPress table prefix,
	 *   ensuring compatibility with different WordPress installations.
	 * - **Data and Condition Handling:** The method accepts two arrays: one for the data to be updated and one for the conditions
	 *   that define which record(s) should be updated. This helps ensure that the correct record is updated securely.
	 *
	 * @param array $data   An associative array containing the column names as keys and the data to be updated as values.
	 *                      Example: ['column_name1' => 'new_value1', 'column_name2' => 'new_value2', ...].
	 * @param array $params An associative array containing the column names as keys and the conditions for updating the record(s).
	 *                      Example: ['column_name' => 'value', 'another_column' => 'another_value'].
	 *
	 * @return void
	 */
	public function update_borica_order( array $data, array $params ): void {
		global $wpdb;
		$table_name     = $wpdb->prefix . 'borica_orders';
		$borica_updated = $wpdb->update(
			$table_name,
			$data,
			$params
		);
		if ( false !== $borica_updated ) {
			$cache_key = 'borica_order_' . $params['nonce'];
			wp_cache_delete( $cache_key, 'borica_orders' );
			wp_cache_set( $cache_key, array_merge( $data, $params ), 'borica_orders', 3600 );
		}
	}

	/**
	 * Retrieves all BORICA log records from the database with caching.
	 *
	 * This method fetches all records from the `borica_logs` table in the database, using WordPress's caching
	 * mechanisms to avoid repeated database queries. If the logs are cached, the method returns the cached data.
	 * If not, it queries the database, decodes the base64-encoded log messages, stores the result in the cache,
	 * and returns the data.
	 *
	 * Key functionality:
	 * - **Caching:** Utilizes WordPress's object cache (`wp_cache_get` and `wp_cache_set`) to store and retrieve
	 *   log data, reducing the frequency of direct database queries and improving performance.
	 * - **Database Query:** If the logs are not found in the cache, the method uses `$wpdb->get_results`
	 *   to retrieve all log records from the `borica_logs` table.
	 * - **Base64 Decoding:** The log messages are stored in the database in a base64-encoded format for safe storage
	 *   and transmission. This method decodes these messages using `base64_decode` to return the original log message.
	 *   This use of `base64_decode` is strictly for benign reasons and is necessary to handle encoded log data.
	 * - **Return Format:** The method returns an array of associative arrays, each containing the `id`,
	 *   `created_at` timestamp, and decoded `message` for each log entry.
	 *
	 * @return array An array of associative arrays, each representing a BORICA log entry.
	 *               - Each entry contains the following keys:
	 *                 - 'id': The unique identifier of the log entry.
	 *                 - 'created_at': The timestamp when the log entry was created.
	 *                 - 'message': The log message, decoded from base64.
	 *               - If no log entries are found, an empty array is returned.
	 */
	public function get_borica_logs() {
		$result = array();
		global $wpdb;
		$table_name = $wpdb->prefix . 'borica_logs';
		$query      = "SELECT * FROM $table_name";
		$results    = $wpdb->get_results( $query );
		if ( ! empty( $results ) ) {
			foreach ( $results as $key => $value ) {
				$result[ $key ] = array(
					'id'         => $value->id,
					'created_at' => $value->created_at,
					'message'    => base64_decode( $value->message ),
				);
			}
		}
		return $result;
	}
}
