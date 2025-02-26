<?php

// Exit if accessed directly.

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class OPBW_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		OPBW
 * @subpackage	Classes/OPBW_Run
 * @author		WPOPAL
 * @since		1.0.0
 */
class OPBW_Run{

	/**
	 * Our OPBW_Run constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access	private
	 * @since	1.0.0
	 * @return	void
	 */
	private function add_hooks(){
	
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts_and_styles' ), 20 );		
	
	}

	/**
	 * Enqueue the backend related scripts and styles for this plugin.
	 * All of the added scripts andstyles will be available on every page within the backend.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function enqueue_backend_scripts_and_styles() {
		global $post_type_object, $typenow, $pagenow, $current_screen;
		
		wp_register_style( 'opbw-toast-notice', OPBW_PLUGIN_URL . 'assets/css/libs/jquery.toast.min.css', array(), OPBW_VERSION, 'all' );
		wp_register_style( 'opbw-sweetalert2', OPBW_PLUGIN_URL . 'assets/css/libs/sweetalert2.min.css', array(), OPBW_VERSION, 'all' );
		wp_register_style( 'opbw-flatpickr', OPBW_PLUGIN_URL . 'assets/css/libs/flatpickr.min.css', array(), OPBW_VERSION, 'all' );

		wp_register_style( 'opbw-backend-styles', OPBW_PLUGIN_URL . 'assets/css/backend-styles.css', array(
			'opbw-toast-notice',
			'opbw-sweetalert2',
			'opbw-flatpickr',
		), OPBW_VERSION, 'all' );
		
		$datas_localize = [
			'ajaxurl' 			=> admin_url( 'admin-ajax.php' ),
			'security_nonce'	=> wp_create_nonce( "opbw-nonce-ajax" ),
			'data' => [
				'placeholder' => WC()->plugin_path() . '/assets/images/placeholder-attachment.png',
			],
			'currency_format_num_decimals' => wc_get_price_decimals(),
			'currency_format_symbol'       => get_woocommerce_currency_symbol(),
			'currency_format_decimal_sep'  => esc_attr( wc_get_price_decimal_separator() ),
			'currency_format_thousand_sep' => esc_attr( wc_get_price_thousand_separator() ),
			'currency_format'              => esc_attr( str_replace( array( '%1$s', '%2$s' ), array( '%s', '%v' ), get_woocommerce_price_format() ) ),
			'translate' => [
				'placeholder' => [
					'text_val' => __('Value', 'opal-bulkedit-for-woocommerce'),
					'text_val_min' => __('Min value', 'opal-bulkedit-for-woocommerce'),
					'text_val_max' => __('Max value', 'opal-bulkedit-for-woocommerce'),
					'text_val_find' => __('Text to be Replaced', 'opal-bulkedit-for-woocommerce'),
					'text_val_replace' => __('Replace Text', 'opal-bulkedit-for-woocommerce'),
				],
				'round_none' => __('No Rounding', 'opal-bulkedit-for-woocommerce'),
				'round_up' => __('Round Up', 'opal-bulkedit-for-woocommerce'),
				'round_down' => __('Round Down', 'opal-bulkedit-for-woocommerce'),
				'no_change' => __('< No Change >', 'opal-bulkedit-for-woocommerce'),
				'media_update' => __('Update media', 'opal-bulkedit-for-woocommerce'),
				'choose_media' => __('Choose or Upload Media', 'opal-bulkedit-for-woocommerce'),
				'change_media' => __('Change Media', 'opal-bulkedit-for-woocommerce'),
				'remove_media' => __('Remove Media', 'opal-bulkedit-for-woocommerce'),
				'confirm_edit' => __('Are you sure?', 'opal-bulkedit-for-woocommerce'),
				'confirm_notice' => __('You can still undo edited products in the History Tab!', 'opal-bulkedit-for-woocommerce'),
				'confirm_notice_restore' => __('This action will overwrite all specified products.', 'opal-bulkedit-for-woocommerce'),
				'confirm_notice_delete' => __('This action will also delete the backup file!', 'opal-bulkedit-for-woocommerce'),
				'confirm_btn' => __('Yes, process now', 'opal-bulkedit-for-woocommerce'),
				'cancel_btn' => __('Cancel', 'opal-bulkedit-for-woocommerce'),
				'edit_success' => __('Editing complete!', 'opal-bulkedit-for-woocommerce'),
				'edit_success_step' => __('Visit the History tab to check for notifications during editing!', 'opal-bulkedit-for-woocommerce'),
			]
		];

		wp_register_script( 'opbw-toast-notice', OPBW_PLUGIN_URL . 'assets/js/libs/jquery.toast.min.js', array( 'jquery' ), OPBW_VERSION, true );
		wp_register_script( 'opbw-flatpickr', OPBW_PLUGIN_URL . 'assets/js/libs/flatpickr.min.js', array( 'jquery' ), OPBW_VERSION, true );
		wp_register_script( 'opbw-sweetalert2', OPBW_PLUGIN_URL . 'assets/js/libs/sweetalert2.all.min.js', array( 'jquery' ), OPBW_VERSION, true );
		wp_register_script( 'opbw-bulk-edit', OPBW_PLUGIN_URL . 'assets/js/bulk-edit.js', array( 
			'jquery', 
			'opbw-toast-notice', 
			'opbw-flatpickr', 
			'opbw-sweetalert2', 
			'jquery-tiptip', 
			'jquery-ui-datepicker' 
		), OPBW_VERSION, true );

		wp_register_script( 'opbw-history', OPBW_PLUGIN_URL . 'assets/js/history.js', array( 
			'jquery', 
			'opbw-toast-notice', 
			'opbw-sweetalert2' 
		), OPBW_VERSION, true );

		wp_localize_script( 'opbw-bulk-edit', 'opbw_script', apply_filters('opbw_data_localize', $datas_localize));
		wp_localize_script( 'opbw-history', 'opbw_script', apply_filters('opbw_data_localize', $datas_localize));
	}

	
	/**
	 * Enqueue the frontend related scripts and styles for this plugin.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function enqueue_frontend_scripts_and_styles() {

	}

}
