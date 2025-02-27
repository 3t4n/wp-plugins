<?php /**
 * @version 1.0
 * @description Listing
 * @category  Contacts Listings
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-02-10
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

class OPER_Listing {

	/**
	 * Define HOOKs for loading CSS and  JavaScript files
	 */
	public function init_load_css_js() {
		// JS & CSS
		add_action( 'oper_enqueue_js_files',  array( $this, 'js_load_files' ),     50  );
		add_action( 'oper_enqueue_css_files', array( $this, 'enqueue_css_files' ), 50  );
	}

	/** JSS */
	public function js_load_files( $where_to_load ) {

		$in_footer = true;

		if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

			wp_enqueue_script( 'oper-listing_class', trailingslashit( plugins_url( '', __FILE__ ) ) . 'o-listing.js'         /* oper_plugin_url( '/_out/js/codemirror.js' ) */
												   , array( 'oper-global-vars' ), '1.1', $in_footer );
			/**
			wp_localize_script( 'oper-global-vars', 'oper_live_request_obj'
								, array(
										'contacts'  => '',
										'reminders' => ''
									)
			);
		 	*/
		}
	}

	/** CSS */
	public function enqueue_css_files( $where_to_load ) {

		if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

			wp_enqueue_style( 'oper-listing_class', trailingslashit( plugins_url( '', __FILE__ ) ) . 'o-listing.css', array(), OPER_VERSION_NUM );
		}
	}

	// </editor-fold>

}

/**
 * Just for loading CSS and  JavaScript files
 */
 if ( true ) {
	$js_css_loading = new OPER_Listing;
	$js_css_loading->init_load_css_js();
 }

