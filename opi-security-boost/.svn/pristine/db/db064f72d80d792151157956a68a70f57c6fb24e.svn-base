<?php
/**
 * OPI Security Boost
 *
 * @link https://opi.org.pl
 *
 * @package WordPress
 * @subpackage OPI Security Boost security.txt
 *
 * @since 1.1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once dirname( dirname( __FILE__ ) ) . '/class-opi-security-boost.php';

class OPI_Security_Boost_Security_Txt extends OPI_Security_Boost {


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
		if (
			'/.well-known/security.txt' === $uri
			|| '/security.txt' === $uri ) {
			header( 'Content-Type: text/text' );
			echo strip_tags( $this->options->get_option( 'securitytxt' ) );
			exit;
		}
	}

}

