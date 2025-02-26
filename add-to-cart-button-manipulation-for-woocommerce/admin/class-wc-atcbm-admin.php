<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wpgenie.org
 * @since      1.0.0
 *
 * @package    Wc_Atcbm
 * @subpackage Wc_Atcbm/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wc_Atcbm
 * @subpackage Wc_Atcbm/admin
 * @author     Wpgenie <info@wpgenie.org>
 */
class Wc_Atcbm_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Add link to plugin page
     *
	 * @access public
	 * @param  array, string
	 * @return array
     *
	 */
	public function add_support_link($links, $file){
		if(!current_user_can('install_plugins')){
			return $links;
		}


		if($file == 'wc-atcbm/wc-atcbm.php'){
			$links[] = '<a href="http://wpgenie.org/woocommerce-lottery/documentation/" target="_blank">'.__('Docs', 'wc-atcbm').'</a>';
			$links[] = '<a href="http://codecanyon.net/user/wpgenie#contact" target="_blank">'.__('Support', 'wc-atcbm').'</a>';
			$links[] = '<a href="http://codecanyon.net/user/wpgenie/" target="_blank">'.__('More WooCommerce Extensions', 'wc-atcbm').'</a>';
		}
		return $links;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_Atcbm_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Atcbm_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wc-atcbm-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wc_Atcbm_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wc_Atcbm_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( $hook == 'post-new.php' || $hook == 'post.php' ) {

			if( 'product' == get_post_type() ){

				wp_enqueue_script(
					'timepicker-addon',
					plugin_dir_url( __FILE__ ) . '/js/jquery-ui-timepicker-addon.js',
					array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'),
					$this->version,
					true
				);

				wp_enqueue_style( 'jquery-ui-datepicker' );

				wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wc-atcbm-admin.js',array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker','timepicker-addon'), $this->version, false );
			}

		 }

	}

	/**
	 *  Add lottery setings tab to woocommerce setings page
	 *
	 * @access public
     *
	 */
	function atcbm_settings_class($settings){

				$settings[] = include(  plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wc-atcbm-settings.php' );
			 	return $settings;
	}

	/**
	 * Add options to product advanced options
	 *
	 * @since    1.0.0
	 */
	public function add_options_to_product() {

			global $post;

			echo '<div class="options_group wc_atcbm">';

			woocommerce_wp_checkbox( array( 'id' => '_wc_atcbm_disable_add_to_cart_button', 'label' => __( 'Disable Add To Cart Button', 'wc-atcbm' )));

			$button_dates_from 	= ( $date = get_post_meta( $post->ID, '_wc_atcbm_button_dates_from', true ) ) ?  $date  : '';
			$button_dates_to 	= ( $date = get_post_meta( $post->ID, '_wc_atcbm_button_dates_to', true ) ) ?  $date  : '';

			echo '	<p class="form-field lottery_dates_fields">
								<label for="_lottery_dates_from">' . __( 'Add to cart available from date', 'wc_lottery' ) . '</label>
								<input type="text" class="short datetimepicker" name="_wc_atcbm_button_dates_from" id="_wc_atcbm_button_dates_from" value="' . $button_dates_from . '" placeholder="' . _x( 'From&hellip;', 'placeholder', 'wc_lottery' )  . __('YYYY-MM-DD HH:MM').'"maxlength="16" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])[ ](0[0-9]|1[0-9]|2[0-4]):(0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9])" />
	             </p>
	             <p class="form-field lottery_dates_fields">
								<label for="_lottery_dates_to">' . __( 'Add to cart available to date', 'wc_lottery' ) . '</label>
								<input type="text" class="short datetimepicker" name="_wc_atcbm_button_dates_to" id="_wc_atcbm_button_dates_to" value="' . $button_dates_to . '" placeholder="' . _x( 'To&hellip;', 'placeholder', 'wc_lottery' ) . __('YYYY-MM-DD HH:MM').'" maxlength="16" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])[ ](0[0-9]|1[0-9]|2[0-4]):(0[0-9]|1[0-9]|2[0-9]|3[0-9]|4[0-9]|5[0-9])" />
							</p>';

			woocommerce_wp_checkbox( array( 'id' => '_wc_atcbm_hide_price', 'label' => __( 'Hide price when product is not purchasable.', 'wc-atcbm' )) );

			echo '</div>';

	}

	/**
	 * Saves the data entered into the product boxes, as post meta data
	 *
	 *
	 * @param int $post_id the post (product) identifier
	 * @param stdClass $post the post (product)
     *
	 */
	public function product_save_data($post_id, $post){

		if (isset($_POST['_wc_atcbm_disable_add_to_cart_button'] )){
			update_post_meta( $post_id, '_wc_atcbm_disable_add_to_cart_button', wc_clean( $_POST['_wc_atcbm_disable_add_to_cart_button'] ) );
		} else 	{
			update_post_meta( $post_id, '_wc_atcbm_disable_add_to_cart_button', 'no' );
		}

		if (isset($_POST['_wc_atcbm_hide_price'] )){
			update_post_meta( $post_id, '_wc_atcbm_hide_price', wc_clean( $_POST['_wc_atcbm_hide_price'] ) );
		} else 	{
			update_post_meta( $post_id, '_wc_atcbm_hide_price', 'no' );
		}

		if (isset($_POST['_wc_atcbm_button_dates_from'] )){
			update_post_meta( $post_id, '_wc_atcbm_button_dates_from', wc_clean( $_POST['_wc_atcbm_button_dates_from'] ) );
		} else 	{
			delete_post_meta( $post_id, '_wc_atcbm_button_dates_from');
		}

		if (isset($_POST['_wc_atcbm_button_dates_to'] )){
			update_post_meta( $post_id, '_wc_atcbm_button_dates_to', wc_clean( $_POST['_wc_atcbm_button_dates_to'] ) );
		} else 	{
			delete_post_meta( $post_id, '_wc_atcbm_button_dates_to');
		}

	}

}
