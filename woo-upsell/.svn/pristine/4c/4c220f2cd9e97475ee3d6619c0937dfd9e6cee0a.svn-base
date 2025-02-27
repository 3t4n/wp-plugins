<?php
/**
 * Plugin Name: UpSell for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/woo-upsell
 * Version: 1.1.0
 * Description: This plugin allows you to add UpSell's products to the cart directly from single product page. Using add to cart buttons or checkboxes. When using button - you can add a UpSell product directly to the cart without leaving the main product. When using checkboxes, the UpSells products is addded to the cart same time as the main product.
 * Author: nordiccustommade
 * Author URI: https://nordiccustommade.dk/
 * Requires at least: 5.0.0
 * Tested up to: 6.3.1
 * Text Domain: woo-upsell
 * Domain Path: /lang/
 * 
 * WC requires at least: 7.0.0
 * WC tested up to: 8.2.0
 * 
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
?>
<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	if ( !defined('NCMWCP1802_PATH') ) {
		define('NCMWCP1802_PATH', plugin_dir_path( __FILE__ ));
	}
	if ( !defined('NCMWCP1802_URL') ) {
		define('NCMWCP1802_URL', plugin_dir_url( __FILE__ ));
	}
	if ( !defined('NCMWCP1802_BASENAME') ) {
		define('NCMWCP1802_BASENAME', plugin_basename(__FILE__));
	}

	
	add_action( 'before_woocommerce_init', function() {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
		}
	} );

	function ncmwcp1802_load_plugin_textdomain() {
		load_plugin_textdomain( 'woo-upsell', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
	}
	add_action( 'plugins_loaded', 'ncmwcp1802_load_plugin_textdomain' );

	function wpse_load_plugin_css() {
		if ( is_product() ) {
			wp_enqueue_style( 'ncmwcp1802_style', NCMWCP1802_URL . 'css/style.css' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );

	require_once NCMWCP1802_PATH.'admin/woo-upsell-admin.php';


	if ( class_exists( 'ncmwcp1802_woocommerce_upsell_settings' ) ) {
		NEW ncmwcp1802_woocommerce_upsell_settings();
	}

	//Select the upsell style
	if ( get_option( 'ncmwcp1802_upsell_settings_type' ) == "checkbox" OR !get_option( 'ncmwcp1802_upsell_settings_type' ) ) {

		require_once NCMWCP1802_PATH.'includes/checkbox/checkbox-style.php';
		if ( class_exists( 'ncmwcp1802_upsell_style_checkbox' ) ) {
			NEW ncmwcp1802_upsell_style_checkbox();
		}
		/* add upsell products to single page before add to cart */
		add_action( 'woocommerce_before_add_to_cart_button', 'ncmwcp1802_add_upsell_to_single_product_page', 5 );

	} elseif ( get_option( 'ncmwcp1802_upsell_settings_type' ) == "button" ) {

		require_once NCMWCP1802_PATH.'includes/button/button-style.php';
		if ( class_exists( 'ncmwcp1802_upsell_style_button' ) ) {
			NEW ncmwcp1802_upsell_style_button();
		}
		/* add upsell products to single page after add to cart */
		add_action( 'woocommerce_after_add_to_cart_quantity', 'ncmwcp1802_add_upsell_to_single_product_page', 5 );

	}
}


function ncmwcp1802_check_products_exists ( $products_id = false ) {
	$value = false;
	$key = false;

	if ( is_array( $products_id ) ) {
		foreach ($products_id as $key => $value) {

			$value = absint( $value );
			$key = sanitize_key( $key );

			if ( !wc_get_product( $value ) ) {
				unset( $products_id[$key] );
			}
		}
	}

	return $products_id;

}


function ncmwcp1802_get_upsell_title () {
	$upsell_title = false;

	if ( $get_upsell_title = get_option( 'ncmwcp1802_upsell_settings_title' ) ) {
		$upsell_title = esc_html( $get_upsell_title );
	} else {
		$upsell_title = esc_html( __( 'We recommend', 'woo-upsell' ) );
	}

	return $upsell_title;

}

function ncmwcp1802_get_upsell_subtitle () {
	$upsell_subtitle = false;

	if ( $get_upsell_subtitle = get_option( 'ncmwcp1802_upsell_settings_subtitle' ) ) {
		$upsell_subtitle = esc_html( $get_upsell_subtitle );
	}

	return $upsell_subtitle;
}

/* add upsell products to single page with checkbox or button callback function */
function ncmwcp1802_add_upsell_to_single_product_page() {
	global $product, $woocommerce;

	$upsells = ncmwcp1802_check_products_exists( $product->get_upsell_ids() );
	$upsell_p = false;
	$upsell_pv = false;
	$is_variation = false;
	$style_type = "";

	if ( get_option( 'ncmwcp1802_upsell_settings_type' ) == "checkbox" OR !get_option( 'ncmwcp1802_upsell_settings_type' ) ) {
		$style_type = "checkbox";
	} else {
		$style_type = "button";
	}

	?>
	<?php if ( is_array( $upsells ) && !empty( $upsells ) ): ?>
	<div class="ncmwcp1802_product_upsells product_upsells style-<?php echo $style_type; ?>">

		<!-- <h3>Disse produkter anbefales sammen med</h3> -->
		<h3><?php echo ncmwcp1802_get_upsell_title(); ?></h3>
		
		<?php if ( ncmwcp1802_get_upsell_subtitle() ) : ?>
			<h4><?php echo ncmwcp1802_get_upsell_subtitle(); ?></h4>
		<?php endif; ?>

		<ul>
			<?php foreach ($upsells as $key => $value): ?>
				<?php
				$upsell_id = absint( $value );
				$upsell_p = wc_get_product( $upsell_id );
				$upsell_url = esc_url( get_permalink ($upsell_id ) );
				?>
				<?php if (  $upsell_p->get_type() == "simple" || $upsell_p->get_type() == "variation" || $upsell_p->get_type() == "variable" ): ?>
					<li>
						<span class="upsell_<?php echo $upsell_id; ?>">
							<div class="columns column-1">
								<?php if ( $upsell_p->get_image() ):  ?>
			                    	<a href="<?php echo $upsell_url; ?>"><?php echo $upsell_p->get_image(); ?></a>
								<?php endif; ?>
							</div>

							<div class="columns column-2">

								<span class="title">
									<a href="<?php echo $upsell_url; ?>"><?php echo $upsell_p->get_name(); ?></a>
								</span>

								<?php if( $upsell_p->get_type() == "variable" ): ?>

									<?php if ( $upsell_p->get_available_variations() ): ?>
										<?php $is_variation = true; ?>

										<select name="upsellsSV[]" class="select-variation" id="upsell_<?php echo $upsell_id; ?>">
											<option value="" data-upsellid="<?php echo $upsell_id; ?>"><?php esc_html( _e( 'Choose an option', 'woocommerce' ) ); ?></option>

											<?php foreach ( $upsell_p->get_available_variations() as $key_v => $value_v ): ?>
												<?php $upsell_pv = wc_get_product( $value_v['variation_id'] ); ?>

													<option value="<?php echo $value_v['variation_id']; ?>" data-upsellid="<?php echo $upsell_id; ?>" data-price='<?php echo $upsell_pv->get_price_html(); ?>'><?php echo $upsell_pv->get_attribute_summary(); ?></option>

											<?php endforeach; ?>

										</select>

									<?php endif; ?>

								<?php endif; ?>

								<span class="price-box">
									<span id="price-<?php echo $upsell_id; ?>" class="product-price" data-oprice='<?php echo $upsell_p->get_price_html(); ?>' data-upsellid="<?php echo $upsell_id; ?>"><?php echo $upsell_p->get_price_html(); ?></span>
								</span>

								<span class="select-box">

								<?php
									$args["upsell_id"] = absint( $upsell_id );
									$args["is_variation"] = wp_validate_boolean( $is_variation );
								?>

								<?php do_action( "ncmwcp1802_upsell_style", $args ); ?>

								</span>

							</div>


						</span>

					</li>
				<?php endif; ?>

			<?php endforeach; ?>
		</ul>

	</div>
	<?php endif; ?>
	<?php
}

?>
