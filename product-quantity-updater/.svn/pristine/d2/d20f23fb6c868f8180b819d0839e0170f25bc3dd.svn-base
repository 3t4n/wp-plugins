<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://technifyguru.com/
 * @since      1.0.0
 *
 * @package    Tgqb
 * @subpackage Tgqb/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tgqb
 * @subpackage Tgqb/public
 * @author     Technify Guru <contact@technifyguru.com>
 */
class Tgqb_Public {

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
		 * defined in Tgqb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tgqb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tgqb-public.css', array(), $this->version, 'all' );
		
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
		 * defined in Tgqb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tgqb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$options = get_option('tgqb_settings');
        // Load script on product page only 
		if ( (is_product () && isset($options['tgqb_field_product_page']) && $options['tgqb_field_product_page'] == 1)) {
		    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tgqb-product-page.js', array( 'jquery' ), $this->version, false );
		}

        // Load script on cart page only 
		if ( (is_cart () && isset($options['tgqb_field_cart_page']) && $options['tgqb_field_cart_page'] == 1)) {
		    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tgqb-cart-page.js', array( 'jquery' ), $this->version, false );
		}

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tgqb-public.js', array( 'jquery' ), $this->version, false );

	}
	
    /* Show Minus Button */
	function wooqb_display_quantity_minus() {
		$show_button = false;
		$options = get_option('tgqb_settings');
		
		if ( is_product () && isset($options['tgqb_field_product_page']) && $options['tgqb_field_product_page'] == 1 ) {
			global $product;
			
			$show_button = true;
			
			if (($product->get_manage_stock() && $product->get_stock_quantity() == 1 )) {
				$show_button = false;
			}
			if ($product->is_sold_individually()) {
				$show_button = false;
			}
		}

		if ( is_cart() && isset($options['tgqb_field_cart_page']) && $options['tgqb_field_cart_page'] == 1) {

			$show_button = true;

			$cart = WC()->cart;

			// Loop over $cart items
			if (!empty ($cart)) {
				foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
					$product = $cart_item['data'];
					if (($product->get_manage_stock() && $product->get_stock_quantity() == 1 )) {
						$show_button = false;
					}
					if ($product->is_sold_individually()) {
						$show_button = false;
					}
				}
			}
		}

		if ($show_button === true) {
			echo '<button type="button" class="tgqb-qty-updater minus" >-</button>';
		}
	}
	
	/* Show Plus Button */
	function wooqb_display_quantity_plus() {
		$show_button = false;
		$options = get_option('tgqb_settings');
		if ( is_product () && isset($options['tgqb_field_product_page']) && $options['tgqb_field_product_page'] == 1 ) {
			global $product;
			
			$show_button = true;				
			
			if (($product->get_manage_stock() && $product->get_stock_quantity() == 1 )) {
				$show_button = false;
			}
			if ($product->is_sold_individually()) {
				$show_button = false;
			}
		}

		if ( is_cart() && isset($options['tgqb_field_cart_page']) && $options['tgqb_field_cart_page'] == 1) {
			
			$show_button = true;				
			
			$cart = WC()->cart;

			// Loop over $cart items
			if (!empty ($cart)) {
				foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
					$product = $cart_item['data'];
					if (($product->get_manage_stock() && $product->get_stock_quantity() == 1 )) {
						$show_button = false;
					}
					if ($product->is_sold_individually()) {
						$show_button = false;
					}
				}
			}
		}

		if ($show_button === true) {
			echo '<button type="button" class="tgqb-qty-updater plus" >+</button>';
		}
	}
	
	/* Add CSS to hide Update Cart button */
	function wooqb_hide_update_cart_button() {
		$options = get_option ('tgqb_settings');
		if ( is_cart() && isset($options['tgqb_field_update_cart']) && $options['tgqb_field_update_cart'] == 1 ) {
			?>
			<style id="hide-update-cart-allscreens">
				button[name=update_cart] {
					display: none !important;
				}
			</style>
			<?php
		}
	}

	/**
	 * Hook the css styling for right button 
	 *
	 * @since    1.0.0
	 */
	public function wooqb_right_button_styles () {
		$this->wooqb_button_styles ('rb');
	}
	
	/**
	 * Hook the css styling for left button 
	 *
	 * @since    1.0.0
	 */
	public function wooqb_left_button_styles () {
		$this->wooqb_button_styles ('lb');
	}

	
	/**
	 * Function for CSS styling of buttons
	 *
	 * @since    1.0.0
	 */
	private function wooqb_button_styles ($button='lb') {
		$options = get_option('tgqb_styling');
		if ($button == 'rb') {
			$class = 'plus';
		} else {
			$class = 'minus';
		}
		?>
		<style>
		    /* Left button styling */
		    button.tgqb-qty-updater.<?php echo $class; ?> {
        		<?php 
        		if (isset($options['tgqb_field_'.$button.'_padding_top']) && $options['tgqb_field_'.$button.'_padding_top'] != '') { 
    		        echo 'padding-top:'.$options['tgqb_field_'.$button.'_padding_top'].'px;';
        		}
        		if (isset($options['tgqb_field_'.$button.'_padding_right']) && $options['tgqb_field_'.$button.'_padding_right'] != '') {
    		        echo 'padding-right:'. $options['tgqb_field_'.$button.'_padding_right'].'px;';
        		}
        		if (isset($options['tgqb_field_'.$button.'_padding_bottom']) && $options['tgqb_field_'.$button.'_padding_bottom'] != '') {
    		        echo 'padding-bottom:'. $options['tgqb_field_'.$button.'_padding_bottom'].'px;';
        		}
        		if (isset($options['tgqb_field_'.$button.'_padding_left']) && $options['tgqb_field_'.$button.'_padding_left'] != '') {
    		        echo 'padding-left:'.$options['tgqb_field_'.$button.'_padding_left'].'px;';
        		}
        		?>

        		<?php 
        		/* Left button margin */
        		if (isset($options['tgqb_field_'.$button.'_margin_top']) && $options['tgqb_field_'.$button.'_margin_top'] != '') { 
    		        echo 'margin-top:'.$options['tgqb_field_'.$button.'_margin_top'].'px;';
        		}
        		if (isset($options['tgqb_field_'.$button.'_margin_right']) && $options['tgqb_field_'.$button.'_margin_right'] != '') {
    		        echo 'margin-right:'. $options['tgqb_field_'.$button.'_margin_right'].'px;';
        		}
        		if (isset($options['tgqb_field_'.$button.'_margin_bottom']) && $options['tgqb_field_'.$button.'_margin_bottom'] != '') {
    		        echo 'margin-bottom:'. $options['tgqb_field_'.$button.'_margin_bottom'].'px;';
        		}
        		if (isset($options['tgqb_field_'.$button.'_margin_left']) && $options['tgqb_field_'.$button.'_margin_left'] != '') {
    		        echo 'margin-left:'.$options['tgqb_field_'.$button.'_margin_left'].'px;';
        		}
        		?>
                
                <?php
        		/* Left button border style */
        		if (isset($options['tgqb_field_'.$button.'_border_style']) && $options['tgqb_field_'.$button.'_border_style'] != '') {
    		        echo 'border-style:'.$options['tgqb_field_'.$button.'_border_style'].';';
        		}
                ?>

                <?php
        		/* Left button border color */
        		if (isset($options['tgqb_field_'.$button.'_border_color']) && $options['tgqb_field_'.$button.'_border_color'] != '') {
    		        echo 'border-color:'.$options['tgqb_field_'.$button.'_border_color'].';';
        		}
                ?>
                
        		<?php 
        		/* Left button border width */
        		if (isset($options['tgqb_field_'.$button.'_border_style']) && 
					($options['tgqb_field_'.$button.'_border_style'] != 'none' ||
					$options['tgqb_field_'.$button.'_border_style'] != 'hidden')
						  ) {
            		if (isset($options['tgqb_field_'.$button.'_border_top']) && $options['tgqb_field_'.$button.'_border_top'] != '') { 
        		        echo 'border-top-width:'.$options['tgqb_field_'.$button.'_border_top'].'px;';
            		}
            		if (isset($options['tgqb_field_'.$button.'_border_right']) && $options['tgqb_field_'.$button.'_border_right'] != '') {
        		        echo 'border-right-width:'. $options['tgqb_field_'.$button.'_border_right'].'px;';
            		}
            		if (isset($options['tgqb_field_'.$button.'_border_bottom']) && $options['tgqb_field_'.$button.'_border_bottom'] != '') {
        		        echo 'border-bottom-width:'. $options['tgqb_field_'.$button.'_border_bottom'].'px;';
            		}
            		if (isset($options['tgqb_field_'.$button.'_border_left']) && $options['tgqb_field_'.$button.'_border_left'] != '') {
        		        echo 'border-left-width:'.$options['tgqb_field_'.$button.'_border_left'].'px;';
            		}
        		}
        		?>

        		<?php 
        		/* Left button border-radius */
        		if (isset($options['tgqb_field_'.$button.'_border_radius_top']) && $options['tgqb_field_'.$button.'_border_radius_top'] != '') { 
    		        echo 'border-top-left-radius:'.$options['tgqb_field_'.$button.'_border_radius_top'].'px;';
        		}
        		if (isset($options['tgqb_field_'.$button.'_border_radius_right']) && $options['tgqb_field_'.$button.'_border_radius_right'] != '') {
    		        echo 'border-top-right-radius:'. $options['tgqb_field_'.$button.'_border_radius_right'].'px;';
        		}
        		if (isset($options['tgqb_field_'.$button.'_border_radius_bottom']) && $options['tgqb_field_'.$button.'_border_radius_bottom'] != '') {
    		        echo 'border-bottom-right-radius:'. $options['tgqb_field_'.$button.'_border_radius_bottom'].'px;';
        		}
        		if (isset($options['tgqb_field_'.$button.'_border_radius_left']) && $options['tgqb_field_'.$button.'_border_radius_left'] != '') {
    		        echo 'border-bottom-left-radius:'.$options['tgqb_field_'.$button.'_border_radius_left'].'px;';
        		}
        		?>

        		<?php 
        		/* Left button normal color */
        		if (isset($options['tgqb_field_'.$button.'_bg_color_n']) && $options['tgqb_field_'.$button.'_bg_color_n'] != '') { 
    		        echo 'background-color:'.$options['tgqb_field_'.$button.'_bg_color_n'].';';
        		}
        		if (isset($options['tgqb_field_'.$button.'_text_color_n']) && $options['tgqb_field_'.$button.'_text_color_n'] != '') { 
    		        echo 'color:'.$options['tgqb_field_'.$button.'_text_color_n'].';';
        		}
        		?>
		    }
		    
		    button.tgqb-qty-updater.<?php echo $class; ?>:hover {
		        <?php
		        /* Left button hover color */
        		if (isset($options['tgqb_field_'.$button.'_bg_color_h']) && $options['tgqb_field_'.$button.'_bg_color_h'] != '') { 
    		        echo 'background-color:'.$options['tgqb_field_'.$button.'_bg_color_h'].';';
        		}
        		if (isset($options['tgqb_field_'.$button.'_text_color_h']) && $options['tgqb_field_'.$button.'_text_color_h'] != '') { 
    		        echo 'color:'.$options['tgqb_field_'.$button.'_text_color_h'].';';
        		}
        		?>
		    }
		</style>
		<?php
	}

}
