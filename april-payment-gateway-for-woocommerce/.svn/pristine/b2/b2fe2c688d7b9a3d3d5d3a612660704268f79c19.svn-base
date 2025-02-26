<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * April Apple Pay Domain Association Class.
 */

class April_Apple_Pay_Domain_Association {

		const DOMAIN_ASSOCIATION_FILE_NAME = 'apple-developer-merchantid-domain-association';
		const DOMAIN_ASSOCIATION_FILE_DIR  = '.well-known';

		public function __construct() {
				add_action( 'init', [ $this, 'add_domain_association_rewrite_rule' ] );
				add_filter( 'query_vars', [ $this, 'whitelist_domain_association_query_param' ], 5, 1 );
				add_action( 'parse_request', [ $this, 'parse_domain_association_request' ], 5, 1 );
		}

		/**
		 * Adds a rewrite rule for serving the domain association file from the proper location.
		 */
		public function add_domain_association_rewrite_rule() {
				$regex    = '^\\' . self::DOMAIN_ASSOCIATION_FILE_DIR . '\/' . self::DOMAIN_ASSOCIATION_FILE_NAME . '$';
				$redirect = 'index.php?' . self::DOMAIN_ASSOCIATION_FILE_NAME . '=1';

				add_rewrite_rule( $regex, $redirect, 'top' );
		}

		/**
		 * Add to the list of publicly allowed query variables.
		 *
		 * @param  array $query_vars - provided public query vars.
		 * @return array Updated public query vars.
		 */
		public function whitelist_domain_association_query_param( $query_vars ) {
				$query_vars[] = self::DOMAIN_ASSOCIATION_FILE_NAME;
				return $query_vars;
		}

		/**
		 * Serve domain association file when proper query param is provided.
		 *
		 * @param WP WordPress environment object.
		 */
		public function parse_domain_association_request( $wp ) {
				if (
					! isset( $wp->query_vars[ self::DOMAIN_ASSOCIATION_FILE_NAME ] ) ||
					'1' !== $wp->query_vars[ self::DOMAIN_ASSOCIATION_FILE_NAME ]
				) {
					return;
				}

				$path = APRIL_PLUGIN_PATH . '/' . self::DOMAIN_ASSOCIATION_FILE_NAME;
				header( 'Content-Type: text/plain;charset=utf-8' );
				echo esc_html( file_get_contents( $path ) );
				exit;
		}
}

new April_Apple_Pay_Domain_Association();
