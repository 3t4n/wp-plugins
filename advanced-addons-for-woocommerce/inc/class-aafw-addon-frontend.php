<?php
/**
 * Handles frontend functionalities.
 *
 * Handles all frontend functionalities, including rendering addons on the product page and adding custom price based on selected addons.
 *
 * @package advanced-addons-for-woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Frontend Class.
 */
class AAFW_Addon_Frontend {

	/**
	 * Constructor.
	 */
	public function __construct() {
		if ( 'yes' === get_option( 'enable_addons_globally', 'yes' ) ) {
			add_shortcode( 'aafw_product_addons', array( $this, 'aafw_render_product_addons_shortcode' ) );
			add_action( 'woocommerce_single_product_summary', array( $this, 'aafw_display_addons_on_product_page' ), 25 );
			add_action( 'wp_enqueue_scripts', array( $this, 'aafw_enqueue_frontend_assets' ) );
			add_action( 'woocommerce_before_add_to_cart_button', array( $this, 'aafw_render_addons_input' ), 25 );
			add_filter( 'woocommerce_add_cart_item_data', array( $this, 'aafw_woocommerce_add_cart_item_data' ), 10, 3 );
			add_filter( 'woocommerce_get_item_data', array( $this, 'aafw_woocommerce_get_item_data' ), 10, 2 );
			add_action( 'woocommerce_add_order_item_meta', array( $this, 'aafw_woocommerce_add_order_item_meta' ), 10, 2 );
			add_action( 'woocommerce_after_order_itemmeta', array( $this, 'aafw_display_selected_addons_in_order_meta' ), 10, 3 );
			add_action( 'woocommerce_before_calculate_totals', array( $this, 'aafw_add_custom_price' ), 999 );
			add_filter( 'woocommerce_add_to_cart_validation', array( $this, 'aafw_validate_addons_selection' ), 10, 3 );
		}
	}

	/**
	 * Enqueue styles for frontend display.
	 */
	public function aafw_enqueue_frontend_assets() {
		if ( is_product() ) {
			wp_enqueue_style(
				'woocommerce-addon-frontend',
				plugins_url( '../dist/frontend-styles.min.css', __FILE__ ),
				array(),
				'1.0.0'
			);
			wp_enqueue_script(
				'woocommerce-addon-frontend',
				plugins_url( '../dist/frontend-scripts.min.js', __FILE__ ),
				array( 'jquery' ),
				'1.0.0',
				true
			);
		}
	}

	/**
	 * Render addons using a shortcode.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string HTML content for addons.
	 */
	public function aafw_render_product_addons_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'product_id' => null,
			),
			$atts,
			'product_addons'
		);

		$product_id = intval( $atts['product_id'] );
		if ( ! $product_id ) {
			global $post;
			$product_id = $post->ID; // Default to current product ID.
		}

		return $this->aafw_get_addons_html( $product_id );
	}

	/**
	 * Display addons on the product page.
	 */
	public function aafw_display_addons_on_product_page() {
		global $post;

		echo wp_kses_post( $this->aafw_get_addons_html( $post->ID ) );
	}

	/**
	 * Retrieve product addons HTML.
	 *
	 * @param  mixed $product_id Product ID.
	 * @return string HTML content for addons.
	 */
	private function aafw_get_addons_html( $product_id ) {
		$addons = get_post_meta( $product_id, '_product_addons', true );
		if ( empty( $addons ) || ! is_array( $addons ) ) {
			return '';
		}
		$addons = array_map(
			function( $addon ) {
				if ( 'image' === $addon['type'] ) {
					$addon['subItems'] = array_map(
						function( $sub_item ) {
							if ( empty( $sub_item['value'] ) ) {
								$sub_item['value'] = array(
									'id'  => '',
									'url' => '',
								);
								return $sub_item;
							}
							$sub_item['value'] = array(
								'id'  => $sub_item['value'],
								'url' => wp_get_attachment_url( $sub_item['value'] ),
							);
							return $sub_item;
						},
						$addon['subItems']
					);
				}
				return $addon;
			},
			$addons
		);
		if ( empty( $addons ) || ! is_array( $addons ) ) {
			return '';
		}
		return $this->aafw_render_addons_recursive( $addons );
	}

	/**
	 * Render addons recursively.
	 *
	 * @param  mixed $addons Addons array.
	 * @return string HTML content for addons.
	 */
	private function aafw_render_addons_recursive( $addons ) {
		ob_start();
		$default_state           = get_option( 'default_addon_state', 'enabled' );
		$require_addon_selection = get_option( 'require_addon_selection', 'no' );
		?>
		<div class="addon-level product-addons" data-default-state="<?php echo esc_attr( $default_state ); ?>" data-required-addons="<?php echo esc_attr( $require_addon_selection ); ?>">
			<?php foreach ( $addons as $addon ) : ?>
				<div class="addon-parent" data-addon-id="<?php echo esc_attr( $addon['id'] ); ?>">
					<button class="addon-toggle">
						<?php echo esc_html( $addon['name'] ); ?>
					</button>
					<?php if ( ! empty( $addon['children'] ) ) : ?>
						<div class="addon-children hidden">
							<?php echo wp_kses_post( $this->aafw_render_addons_recursive( $addon['children'] ) ); ?>
						</div>
					<?php endif; ?>
					<div class="addon-subitems hidden">
						<?php if ( isset( $addon['subItems'] ) ) : ?>
							<?php foreach ( $addon['subItems'] as $sub_item ) : ?>
								<?php if ( 'text' === $addon['type'] ) : ?>
									<button
									class="subitem-button"
									data-price="<?php echo esc_attr( $addon['price'] + $sub_item['price'] ); ?>"
									data-subitemId="<?php echo esc_attr( $sub_item['id'] ); ?>"
									data-value="<?php echo esc_attr( $sub_item['value'] ); ?>"
									>
										<?php
										echo esc_html( $sub_item['value'] );
										?>
									</button>
								<?php elseif ( 'color' === $addon['type'] ) : ?>
									<div
									class="color-option"
									data-price="<?php echo esc_attr( $addon['price'] + $sub_item['price'] ); ?>"
									data-subitemId="<?php echo esc_attr( $sub_item['id'] ); ?>"
									data-value="<?php echo esc_attr( $sub_item['value'] ); ?>"
									>
										<span
											class="color-preview"
											style="background-color: <?php echo esc_attr( $sub_item['value'] ); ?>;"
											title="<?php echo esc_attr( $sub_item['value'] ); ?>"
										></span>
										<span class="color-label">
											<?php echo esc_html( $sub_item['value'] ); ?>
										</span>
									</div>
								<?php elseif ( 'radio' === $addon['type'] ) : ?>
									<button
									class="subitem-button"
									data-price="<?php echo esc_attr( $addon['price'] + $sub_item['price'] ); ?>"
									data-subitemId="<?php echo esc_attr( $sub_item['id'] ); ?>"
									data-value="<?php echo esc_attr( $sub_item['value'] ); ?>"
										>
										<?php
										echo esc_html( $sub_item['value'] );
										?>
									</button>
								<?php elseif ( 'image' === $addon['type'] ) : ?>
									<button
										class="subitem-image"
										data-price="<?php echo esc_attr( $addon['price'] + $sub_item['price'] ); ?>"
										data-subitemId="<?php echo esc_attr( $sub_item['id'] ); ?>"
										data-value="<?php echo esc_attr( $sub_item['value']['url'] ); ?>"
										style="background-image: url('<?php echo esc_url( $sub_item['value']['url'] ); ?>');"
									></button>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Render hidden input for selected addons.
	 *
	 * @return void
	 */
	public function aafw_render_addons_input() {
		?>
		<input type="hidden" name="selected_addons" value="">
		<?php
		wp_nonce_field( 'woocommerce_addon_nonce', 'woocommerce_addon_nonce' );
	}


	/**
	 * Add selected addons to cart item data.
	 *
	 * @param array $cart_item_data Cart item data.
	 * @param int   $product_id Product ID.
	 * @param int   $variation_id Variation ID.
	 * @return array Modified cart item data.
	 */
	public function aafw_woocommerce_add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
		if ( ! isset( $_POST['woocommerce_addon_nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_key( $_POST['woocommerce_addon_nonce'] ) ), 'woocommerce_addon_nonce' ) ) {
			return $cart_item_data;
		}
		if ( ! empty( $_POST['selected_addons'] ) ) {
			$cart_item_data['selected_addons'] = json_decode( sanitize_text_field( wp_unslash( $_POST['selected_addons'] ) ), true );
		}
		return $cart_item_data;
	}

	/**
	 * Display selected addons in cart.
	 *
	 * @param array $item_data Cart item data.
	 * @param array $cart_item Cart item.
	 * @return array Modified cart item data.
	 */
	public function aafw_woocommerce_get_item_data( $item_data, $cart_item ) {
		if ( ! empty( $cart_item['selected_addons'] ) ) {
			foreach ( $cart_item['selected_addons'] as $addon ) {
				$item_data[] = array(
					'name'  => $addon['title'],
					'value' => implode( ', ', array_column( $addon['subItems'], 'value' ) ),
				);
			}
		}
		return $item_data;
	}

	/**
	 * Save selected addons to order item meta.
	 *
	 * @param int   $item_id Order item ID.
	 * @param array $cart_item Cart item.
	 * @return void
	 */
	public function aafw_woocommerce_add_order_item_meta( $item_id, $cart_item ) {
		if ( ! empty( $cart_item['selected_addons'] ) ) {
			wc_add_order_item_meta( $item_id, 'selected_addons', $cart_item['selected_addons'] );
		}
	}

	/**
	 * Display selected addons in order meta on the admin side.
	 *
	 * @param int                   $item_id Order item ID.
	 * @param WC_Order_Item_Product $item Order item.
	 * @param WC_Order              $order Order object.
	 * @return void
	 */
	public function aafw_display_selected_addons_in_order_meta( $item_id, $item, $order ) {
		$selected_addons = wc_get_order_item_meta( $item_id, 'selected_addons', true );

		if ( ! empty( $selected_addons ) && is_array( $selected_addons ) ) {
			echo '<div class="view addons-meta">';
			echo '<strong>' . esc_html__( 'Selected Addons:', 'advanced-addons-for-woocommerce' ) . '</strong>';
			echo '<ul>';
			foreach ( $selected_addons as $addon ) {
				echo '<li>';
				echo '<strong>' . esc_html( $addon['title'] ) . ':</strong> ';
				echo esc_html( implode( ', ', array_column( $addon['subItems'], 'value' ) ) );
				echo '</li>';
			}
			echo '</ul>';
			echo '</div>';
		}
	}

	/**
	 * Add custom price based on selected addons.
	 *
	 * @param WC_Cart $cart Cart object.
	 * @return mixed
	 */
	public function aafw_add_custom_price( $cart ) {
		if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
			return;
		}
		if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 ) {
			return;
		}
		$enable_tax = get_option( 'enable_addon_tax', 'no' );
		$tax_class  = get_option( 'addon_tax_class', '' );
		foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
			$product_id = $cart_item['product_id'];
			$addons     = get_post_meta( $product_id, '_product_addons', true );
			if ( ! empty( $cart_item['selected_addons'] ) ) {
				$addon_total = 0;
				foreach ( $cart_item['selected_addons'] as $addon ) {
					$addon_total += array_sum( array_column( $addon['subItems'], 'price' ) );
				}
				if ( 'yes' === $enable_tax && $addon_total > 0 ) {
					$tax_rates    = WC_Tax::get_rates( $tax_class );
					$taxes        = WC_Tax::calc_tax( $addon_total, $tax_rates, true );
					$addon_total += array_sum( $taxes );
				}
				$cart_item['data']->set_price( $cart_item['data']->get_price() + $addon_total );
			}
		}

	}
	/**
	 * Validate addons selection before adding to cart.
	 *
	 * @param bool $passed Whether the product can be added to the cart.
	 * @param int  $product_id The product ID.
	 * @param int  $quantity The quantity being added to the cart.
	 * @return bool
	 */
	public function aafw_validate_addons_selection( $passed, $product_id, $quantity ) {
		if ( ! isset( $_POST['woocommerce_addon_nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_key( $_POST['woocommerce_addon_nonce'] ) ), 'woocommerce_addon_nonce' ) ) {
			return false;
		}
		$require_addon_selection = get_option( 'require_addon_selection', 'no' );
		if ( 'no' === $require_addon_selection ) {
			return $passed;
		}

		if ( empty( $_POST['selected_addons'] ) || ! is_array( json_decode( sanitize_text_field( wp_unslash( $_POST['selected_addons'] ) ), true ) ) ) {
			wc_add_notice( __( 'Please select an addon before adding this product to your cart.', 'advanced-addons-for-woocommerce' ), 'error' );
			return false;
		}

		return $passed;
	}
}
