<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'ncmwcp1802_upsell_style_checkbox' ) ) {
	class ncmwcp1802_upsell_style_checkbox {

		public function __construct () {
			add_action( "ncmwcp1802_upsell_style", array( $this, 'upsell_style_checkbox' ), 10, 2 );	        
            add_action( 'wp_enqueue_scripts', array( $this, 'checkbox_style_scripts' ) );
            
            /*Add selected upsells products to cart*/
            add_action( 'woocommerce_add_to_cart', array( $this, 'add_upsells_to_cart' ), 1, 6 );

            /*Add upsell_of extra key cart item key when cart is loaded from session*/
            add_filter( 'woocommerce_get_cart_item_from_session', array( $this, 'get_cart_items_from_session' ), 1, 3 );
		}

		public function upsell_style_checkbox ( $args ) {
		
			$upsell_id = absint( $args["upsell_id"] );
            $is_variation = wp_validate_boolean( $args["is_variation"] );

            if ( $is_variation ):
        
                echo '<input type="checkbox" name="upsellsV[]" id="upsellV_'.$upsell_id.'" value="'.$upsell_id.'" />';
                echo '<label>'.esc_html( __( 'Add to cart', 'woocommerce' ) ).'</label>';
        
            else:

                echo '<input type="checkbox" name="upsells[]" id="upsell_'.$upsell_id.'" value="'.$upsell_id.'" />';
                echo '<label>'.esc_html( __( 'Add to cart', 'woocommerce' ) ).'</label>';

            endif;
		
		}

		public function checkbox_style_scripts() {
			if ( is_product() ) {
				wp_enqueue_script( 'upsell_script_checkbox', NCMWCP1802_URL.'/includes/checkbox/checkbox.js', array ( 'jquery' ), "1.0.0", true);
			}
        }
        
        public function add_upsells_to_cart( $cart_item_key ) {
            global $woocommerce;

            $upsells = false; //checkbox
            $upsellsSV = false; //selectbox
            $upsellsV = false; //checkbox

            // Prevent loop
            if ( array_key_exists( 'upsells', $_POST ) ) {
                $upsells = array_filter( $_POST['upsells'], 'ctype_digit' ); //checkbox array
                unset( $_POST['upsells'] );
            }

            if ( array_key_exists( 'upsellsSV', $_POST ) ) {
                $upsellsSV = array_filter( $_POST['upsellsSV'], 'ctype_digit' ); //selectbox array
                unset( $_POST['upsellsSV'] );
            }

            if ( array_key_exists( 'upsellsV', $_POST ) ) {
                $upsellsV = array_filter( $_POST['upsellsV'], 'ctype_digit' ); //checkbox array
                unset( $_POST['upsellsV'] );
            }

            // Append each upsells to product in cart
            if ( $upsells ) {
                foreach( $upsells as $upsell_id ) {
                    $upsell_id = absint( $upsell_id );
                    // Add upsell into cart and set upsell_of as extra key with parent product item id
                    $woocommerce->cart->add_to_cart( $upsell_id, 1, '', '', array( 'upsell_of' => $cart_item_key ) );
                }
            }

            if ( $upsellsSV && $upsellsV ) {
                foreach( $upsellsSV as $upsell_id ) {

                    if ( in_array( $upsell_id, $upsellsV ) ) {
                        $upsell_id = absint( $upsell_id );
            
                        // Add upsell into cart and set upsell_of as extra key with parent product item id
                        $woocommerce->cart->add_to_cart( $upsell_id, 1, '', '', array( 'upsell_of' => $cart_item_key ) );
                    }

                }
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
