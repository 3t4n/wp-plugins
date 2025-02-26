<?php
/**
 * Create Permalink Setting.
 *
 * @package     portfolio-cpt
 * @copyright   Copyright (c) 2018, Danny Cooper
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Main Portfolio_CPT_Permalink Class
 *
 * @since 1.0.0
 */
class Portfolio_CPT_Permalink {

	/**
	 * Initialize class.
	 */
	public function __construct() {
		$this->init();
		$this->settings_save();
	}

	/**
	 * Call register fields.
	 */
	public function init() {
		add_filter( 'admin_init', array( &$this, 'register_fields' ) );
	}

	/**
	 * Add setting to permalinks page.
	 */
	public function register_fields() {
		register_setting( 'permalink', 'portfolio_cpt_slug', 'esc_attr' );
		add_settings_field( 'portfolio_cpt_slug_setting', '<label for="portfolio_cpt_slug">' . __( 'Portfolio', 'portfolio-cpt' ) . '</label>', array( &$this, 'fields_html' ), 'permalink', 'optional' );
	}

	/**
	 * HTML for permalink setting.
	 */
	public function fields_html() {
		$value = get_option( 'portfolio_cpt_slug' );
		wp_nonce_field( 'portfolio-cpt', 'portfolio_cpt_slug_nonce' );
		echo '<input type="text" class="regular-text code" id="portfolio_cpt_slug" name="portfolio_cpt_slug" placeholder="kb" value="' . esc_attr( $value ) . '" />';
	}

	/**
	 * Save permalink settings.
	 */
	public function settings_save() {

		if ( ! is_admin() ) {
			return;
		}

		// We need to save the options ourselves; settings api does not trigger save for the permalinks page.
		if ( isset( $_POST['permalink_structure'] ) ||
			isset( $_POST['category_base'] ) &&
			isset( $_POST['portfolio_cpt_slug'] ) &&
			wp_verify_nonce( wp_unslash( $_POST['portfolio_cpt_slug_nonce'] ), 'portfolio-cpt' ) ) { // WPCS: input var ok, sanitization ok.
				$portfolio_cpt_slug = sanitize_title( wp_unslash( $_POST['portfolio_cpt_slug'] ) );
				update_option( 'portfolio_cpt_slug', $portfolio_cpt_slug );
		}
	}
}


$portfolio_cpt_slug = new Portfolio_CPT_Permalink();
