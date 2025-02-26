<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wpgenie.org
 * @since      1.0.0
 *
 * @package    Wc_Atcbm
 * @subpackage Wc_Atcbm/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wc_Atcbm
 * @subpackage Wc_Atcbm/public
 * @author     Wpgenie <info@wpgenie.org>
 */
class Wc_Atcbm_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wc-atcbm-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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
		wp_register_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wc-atcbm-public.js', array( 'jquery' ), $this->version, false );

        wp_enqueue_script( 'wc-atcbm-jquery-plugin', plugin_dir_url( __FILE__ ).'js/jquery.plugin.min.js', array('jquery'), $this->version, false );

        wp_enqueue_script( 'wc-atcbm-countdown', plugin_dir_url( __FILE__ ).'js/jquery.countdown.min.js', array('jquery','wc-atcbm-jquery-plugin'), $this->version, false );

        wp_register_script('wc-atcbm-countdown-language', plugin_dir_url( __FILE__ ).'js/jquery.countdown.language.js', array('jquery','wc-atcbm-countdown'), $this->version, false );

        $language_data = array(
            'labels' =>array(
                            'Years' => __('Years', 'wc-atcbm'),
                            'Months' => __('Months', 'wc-atcbm'),
                            'Weeks' => __('Weeks', 'wc-atcbm'),
                            'Days' => __('Days', 'wc-atcbm'),
                            'Hours' => __('Hours', 'wc-atcbm'),
                            'Minutes' => __('Minutes', 'wc-atcbm'),
                            'Seconds' => __('Seconds', 'wc-atcbm'),
                            ),
            'labels1' => array(
                            'Year' => __('Year', 'wc-atcbm'),
                            'Month' => __('Month', 'wc-atcbm'),
                            'Week' => __('Week', 'wc-atcbm'),
                            'Day' => __('Day', 'wc-atcbm'),
                            'Hour' => __('Hour', 'wc-atcbm'),
                            'Minute' => __('Minute', 'wc-atcbm'),
                            'Second' => __('Second', 'wc-atcbm'),
                            ),
            'compactLabels' =>	array(
                            'y' => __('y', 'wc-atcbm'),
                            'm' => __('m', 'wc-atcbm'),
                            'w' => __('w', 'wc-atcbm'),
                            'd' => __('d', 'wc-atcbm'),
                            )
        );

        wp_localize_script( 'wc-atcbm-countdown-language', 'wc_lottery_language_data', $language_data);

        wp_enqueue_script(  'wc-atcbm-countdown-language');

        wp_enqueue_script(  $this->plugin_name );

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wc-atcbm-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Templating with plugin folder
	 *
	 * @param int $post_id the post (product) identifier
	 * @param stdClass $post the post (product)
	 *
	 */
	function woocommerce_locate_template($template, $template_name, $template_path) {

		if (!$template_path) {
			$template_path = WC()->template_url;
		}
		$plugin_path = plugin_dir_path( dirname( __FILE__ ) ) . 'public/templates/';
		
		$template_locate = locate_template(
			array(
				$template_path . $template_name,
				$template_name,
				)
			);

        // Modification: Get the template from this plugin, if it exists
		if (!$template_locate && file_exists($plugin_path . $template_name)) {

			return $plugin_path . $template_name;

		} else {

			return $template;

		}
	}

	
	/**
	 * Check if product is purchsable
	 * 
	 * @param  [bolean] $purchasable [description]
	 * @param  [object] $product        [description]
	 * @return [bolean]              [description]
	 */
	public function check_is_purchasable($purchasable, $product){


		$post_id = $product->get_parent_id() ? $product->get_parent_id() : $product->get_id();
		$wc_atcbm_disable_add_to_cart_button  =  get_post_meta($post_id ,'_wc_atcbm_disable_add_to_cart_button', true);
	
		
		if(!empty($wc_atcbm_disable_add_to_cart_button) && $wc_atcbm_disable_add_to_cart_button != 'no'){
			return false;
		}

		$wc_atcbm_button_dates_from = get_post_meta($post_id ,'_wc_atcbm_button_dates_from', true);
		$wc_atcbm_button_dates_to   = get_post_meta($post_id ,'_wc_atcbm_button_dates_to', true);
		
		
		if (!empty($wc_atcbm_button_dates_from) && empty($wc_atcbm_button_dates_to)){
			$date1 = new DateTime($wc_atcbm_button_dates_from);
			$date2 = new DateTime(current_time('mysql'));
			return ($date1 < $date2) ;
		}

		if (!empty($wc_atcbm_button_dates_to) && empty($wc_atcbm_button_dates_from) ){
			$date1 = new DateTime($wc_atcbm_button_dates_to);
			$date2 = new DateTime(current_time('mysql'));
			return $date1 > $date2 ;
		}
	
		if(!empty($wc_atcbm_button_dates_from) && !empty($wc_atcbm_button_dates_to)){
			$date1 = new DateTime($wc_atcbm_button_dates_from);
			$date2 = new DateTime(current_time('mysql'));
			$date3 = new DateTime($wc_atcbm_button_dates_to);

			return ($date1 < $date2 && $date2 < $date3) ;
		}


		return $purchasable;

	}

	/**
	 * Add available text to sigle product page
	 * 
	 * @return void
	 */
	public function add_available_text(){
		
		global $product;
		global $wc_atcbm_button_dates_to;
		global $wc_atcbm_button_dates_from;

		$post_id = $product->get_id();
		$wc_atcbm_disable_add_to_cart_button  =  get_post_meta($post_id ,'_wc_atcbm_disable_add_to_cart_button', true);
		
		if(!empty($wc_atcbm_disable_add_to_cart_button) && $wc_atcbm_disable_add_to_cart_button != 'no'){
			return false;
		}


		$wc_atcbm_button_dates_from = false;
		$wc_atcbm_button_dates_to   = false;

		if(get_option( 'wc-atcbm_show_from' , 'yes' ) == 'yes'){
			$wc_atcbm_button_dates_from = $this->check_date($product,'from');
		}

		if(get_option( 'wc-atcbm_show_to' , 'yes' ) == 'yes'){
			$wc_atcbm_button_dates_to = $this->check_date($product,'to');
		}

		if($wc_atcbm_button_dates_from != false OR $wc_atcbm_button_dates_to != false){
			wc_get_template('single-product/wc_atcbm_available_text.php');
			
		}
		

	}
	/**
	 * Add available text to sigle product page
	 * 
	 * @return void
	 */
	public function add_counter(){
		global $product;
		global $wc_atcbm_button_dates_to;
		global $wc_atcbm_button_dates_from;

		$post_id = $product->get_id();
		$wc_atcbm_disable_add_to_cart_button  =  get_post_meta($post_id ,'_wc_atcbm_disable_add_to_cart_button', true);
		
		if(!empty($wc_atcbm_disable_add_to_cart_button) && $wc_atcbm_disable_add_to_cart_button != 'no'){
			return false;
		}


		if(get_option( 'wc-atcbm_counter' , 'yes' ) == 'yes'){
			$wc_atcbm_button_dates_from = $this->check_date($product,'from');
			$wc_atcbm_button_dates_to = $this->check_date($product,'to');
			if($wc_atcbm_button_dates_to != false OR $wc_atcbm_button_dates_from != false){ 
				
				wc_get_template('single-product/wc_atcbm_counter.php');
			
			}
			
		}

	}

	function check_date($product, $type){
		if($type == 'from'){

			 $wc_atcbm_button_dates_from   = get_post_meta($product->get_id() ,'_wc_atcbm_button_dates_from', true);	
			if (!empty($wc_atcbm_button_dates_from)){
				$date1 = new DateTime($wc_atcbm_button_dates_from);
				$date2 = new DateTime(current_time('mysql'));

				if ($date1 < $date2) {
					$wc_atcbm_button_dates_from = false;
				} 
			}

			return $wc_atcbm_button_dates_from;

		}

		if($type == 'to'){
			$wc_atcbm_button_dates_to   = get_post_meta($product->get_id() ,'_wc_atcbm_button_dates_to', true);
			if (!empty($wc_atcbm_button_dates_to)){
				$date1 = new DateTime($wc_atcbm_button_dates_to);
				$date2 = new DateTime(current_time('mysql'));

				if ($date1 < $date2) {
					$wc_atcbm_button_dates_to = false;
				} 
			}

			return $wc_atcbm_button_dates_to;
		}


	}

	function hide_price($price, $product){
		
		if(!$product->is_purchasable() && get_post_meta($product->get_id() ,'_wc_atcbm_hide_price', true) == 'yes' ){

			return '';
		}

		return $price;

	}

	function hide_single_variation_button(){
		global $product;
		
		if($product->is_purchasable() == false){
			remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
			if(get_post_meta($product->get_id() ,'_wc_atcbm_hide_price', true) == 'yes' ){
				remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
			}
		}

	}

}
