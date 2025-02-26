<?php
class FSSC_ViewCart_Widget extends WP_Widget {
	function __construct() {
		parent::WP_Widget( 'FSSC_ViewCart_Widget', 'View Cart', array( 'description' => 'Display products in your shopping cart.' ) );
	}

	function widget( $args, $instance ) {
		global $wpdb,$fscartconfig,$FSSCPages,$fscartstyle;
		extract( $args );
		if ($instance['fsscwvchide'] == 'Yes' && $wpdb->get_var("SELECT COUNT(basket_id) FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."' ORDER BY products_price") == 0) {
			// HIDE
		} else {			
			$title = apply_filters( 'widget_title', $instance['fsscwvctitle'] );
			echo $before_widget;
			if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } 
			
			$ShopButtonStyle = ' style=""';
			if ($fscartstyle['ViewCartShopButtonColor'] != '') { $ShopButtonStyle = substr($ShopButtonStyle, 0, -1).'color: #'.$fscartstyle['ViewCartShopButtonColor'].';"'; }
			if ($fscartstyle['ViewCartShopButtonSize'] != '') { $ShopButtonStyle = substr($ShopButtonStyle, 0, -1).'font-size: 11px;"'; }
			if ($fscartstyle['ViewCartShopButtonBGColor'] != '') { $ShopButtonStyle = substr($ShopButtonStyle, 0, -1).'background-color: #'.$fscartstyle['ViewCartShopButtonBGColor'].';"'; }
			if ($fscartstyle['ViewCartShopButtonRadius'] != '') { $ShopButtonStyle = substr($ShopButtonStyle, 0, -1).'border-radius: '.$fscartstyle['ViewCartShopButtonRadius'].'px;"'; }
			if ($fscartstyle['ViewCartShopButtonBorder'] != '') { $ShopButtonStyle = substr($ShopButtonStyle, 0, -1).'border: 1px solid #'.$fscartstyle['ViewCartShopButtonBorder'].';"'; }
			if ($ShopButtonStyle == ' style=""') { $ShopButtonStyle = ''; }
			
			$CheckoutButtonStyle = ' style=""';
			if ($fscartstyle['ViewCartCheckoutButtonColor'] != '') { $CheckoutButtonStyle = substr($CheckoutButtonStyle, 0, -1).'color: #'.$fscartstyle['ViewCartCheckoutButtonColor'].';"'; }
			if ($fscartstyle['ViewCartCheckoutButtonSize'] != '') { $CheckoutButtonStyle = substr($CheckoutButtonStyle, 0, -1).'font-size: 11px;"'; }
			if ($fscartstyle['ViewCartCheckoutButtonBGColor'] != '') { $CheckoutButtonStyle = substr($CheckoutButtonStyle, 0, -1).'background-color: #'.$fscartstyle['ViewCartCheckoutButtonBGColor'].';"'; }
			if ($fscartstyle['ViewCartCheckoutButtonRadius'] != '') { $CheckoutButtonStyle = substr($CheckoutButtonStyle, 0, -1).'border-radius: '.$fscartstyle['ViewCartCheckoutButtonRadius'].'px;"'; }
			if ($fscartstyle['ViewCartCheckoutButtonBorder'] != '') { $CheckoutButtonStyle = substr($CheckoutButtonStyle, 0, -1).'border: 1px solid #'.$fscartstyle['ViewCartCheckoutButtonBorder'].';"'; }
			if ($CheckoutButtonStyle == ' style=""') { $CheckoutButtonStyle = ''; }
			
			// **** CART ****
			echo '<div id="fssc-vc-widget">';
			$VCCartItems = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."fssc_users_basket WHERE users_code = '".$_SESSION['users_code']."' ORDER BY products_price");
			if (count($VCCartItems ) > 0) {
				$VCCTotal = 0;			
				foreach ($VCCartItems as $VCCartItems) {
					$ProductInfo = $wpdb->get_row("SELECT products_id, products_name, products_weight FROM ".$wpdb->prefix."fssc_products WHERE products_id = ".$VCCartItems->products_id);
					echo '<div id="fssc-vc-list"><p><div id="fssc-vc-qty">'.$VCCartItems->products_quantity.'</div>'.$ProductInfo->products_name.'</p></div>';
					$VCCSubTotal = $VCCartItems->products_quantity * $VCCartItems->products_price;	
					$VCCTotal = $VCCTotal + $VCCSubTotal;		
				}	
				echo '<hr>';
				echo 'Subtotal: $'.number_format($VCCTotal,2);
				echo '<p><br /></p>';
				if ($fscartconfig['EnableSSL'] == 1) {
					$CheckoutLink = str_replace("http://", "https://", get_option('home'));
				} else {
					$CheckoutLink = get_option('home');
				}
				if($fscartconfig['Shipping Type'] == 'FedEx') {
					$CheckoutLink = str_replace("https://", "http://", $CheckoutLink).'/'.$FSSCPages['ViewCartURL'].'/';
				} else {
					$CheckoutLink = $CheckoutLink.'/'.$FSSCPages['CheckoutURL'].'/';
				}
				echo '<div id="fssc-vc-control">';
				echo '<a href="'.get_option('home').'/'.$FSSCPages['ViewCartURL'].'/" class="fsscgradient fsscbutton fssclink" '.$ShopButtonStyle.'><span>View Cart</span></a>';
				echo ' ';
				echo '<a href="'.$CheckoutLink.'" class="fsscgradient fsscbutton fssclink" '.$CheckoutButtonStyle.'><span>Checkout</span></a>';
				echo '</div>';
			} else {
				echo '<p>0 items in your cart.</p>';
			}
			if ($fscartconfig['EnableSSL'] == 1) {
				$LockLink = str_replace("http://", "https://", get_option('home'));
				echo '<div style="text-align: center; padding-top: 10px;"><img src="'.$LockLink.'/wp-content/plugins/fs-shopping-cart/images/lock.gif"></div>';
			}
			echo '</div>';

			echo $after_widget;
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['fsscwvctitle'] = strip_tags($new_instance['fsscwvctitle']);
		$instance['fsscwvchide'] = strip_tags($new_instance['fsscwvchide']);
		return $instance;
	}

	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'fsscwvctitle' ] );
			$hidecities = esc_attr( $instance[ 'fsscwvchide' ] );
		}
		else {
			$title = __( 'Your Shopping Cart', 'text_domain' );
			$hidecitieschecked = '';
		}
		
		$hidecitieschecked = ''; if ($hidecities == 'Yes') { $hidecitieschecked = 'checked'; }
		?>
		<p>
		<label for="<?php echo $this->get_field_id('fsscwvctitle'); ?>"><?php _e('Title:'); ?></label><input class="widefat" id="<?php echo $this->get_field_id('fsscwvctitle'); ?>" name="<?php echo $this->get_field_name('fsscwvctitle'); ?>" type="text" value="<?php echo $title; ?>" /><br />
		<label for="<?php echo $this->get_field_id('fsscwvchide'); ?>"><?php _e('Hide Shopping Cart When Empty:'); ?></label><input id="<?php echo $this->get_field_id('fsscwvchide'); ?>" name="<?php echo $this->get_field_name('fsscwvchide'); ?>" type="checkbox" value="Yes" <?php echo $hidecitieschecked; ?> /><br />
		</p>
		<?php 
	}

} 

add_action( 'widgets_init', create_function( '', 'register_widget("FSSC_ViewCart_Widget");' ) );

?>