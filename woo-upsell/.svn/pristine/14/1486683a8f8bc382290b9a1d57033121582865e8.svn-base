<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'ncmwcp1802_upsell_style_button' ) ) {
	class ncmwcp1802_upsell_style_button {

		public function __construct () {
			add_action( "ncmwcp1802_upsell_style", array( $this, 'upsell_style_button' ), 10, 2 );	        
			add_action( 'wp_enqueue_scripts', array( $this, 'button_style_scripts' ) );

            /*Add upsell_of extra key cart item key when cart is loaded from session*/
            add_filter( 'woocommerce_get_cart_item_from_session', array( $this, 'get_cart_items_from_session' ), 1, 3 );

		}

		public function upsell_style_button ( $args ) {

			$upsell_id = absint( $args["upsell_id"] );
            $is_variation = wp_validate_boolean( $args["is_variation"] );

            if ( $is_variation ):

				echo '<button id="add_to_cart-'.$upsell_id.'" type="submit"
				data-quantity="1" data-org_id="'.$upsell_id.'" data-product_id="'.$upsell_id.'"
				class="button alt product_type_simple ajax_add_to_cart add_to_cart_button product_type_simple add_to_cart-disabled">'.esc_html( __('Add to cart','woocommerce') ).'</button>';

            else:
				echo '<button id="add_to_cart-'.$upsell_id.'" type="submit"
				data-quantity="1" data-org_id="'.$upsell_id.'" data-product_id="'.$upsell_id.'"
				class="button alt product_type_simple ajax_add_to_cart add_to_cart_button product_type_simple">'.esc_html( __('Add to cart','woocommerce') ).'</button>';
            endif;
		
		}

		public function button_style_scripts() {

			if ( is_product() ) {
				wp_enqueue_script( 'upsell_script_button', NCMWCP1802_URL.'/includes/button/button.js', array ( 'jquery' ), "1.0.0", true);
			}
		}

        public function get_cart_items_from_session( $item, $values, $key ) {
            if ( array_key_exists( 'upsell_of', $values ) ) {
                $item[ 'upsell_of' ] = sanitize_key( $values['upsell_of' ]);
            }
            return $item;
        }	
	
	}
}

?>