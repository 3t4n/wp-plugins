<?php
/**
 * OPI Security Boost
 *
 * @link https://opi.org.pl
 *
 * @package WordPress
 * @subpackage OPI Security Boost pgp-key.txt
 *
 * @since 1.1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once dirname( dirname( __FILE__ ) ) . '/class-opi-security-boost.php';

class OPI_Security_Boost_PGP_Key_Txt extends OPI_Security_Boost {


	public function __construct() {
		parent::__construct();
		/**
		 * handle special requests
		 */
		add_action( 'parse_request', array( $this, 'parse_request' ) );
	}

	public function parse_request() {
		if (
			! isset( $_SERVER['REQUEST_URI'] ) ) {
			return;
		}
		$uri = remove_query_arg( array_keys( $_GET ), $_SERVER['REQUEST_URI'] );
		if ( '/pgp-key.txt' === $uri ) {
			header( 'Content-Type: text/text' );
			echo strip_tags( $this->options->get_option( 'pgpkeytxt' ) );
			exit;
		}
	}

}

