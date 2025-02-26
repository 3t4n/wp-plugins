<?php
/**
 * Plugin Name: Age Validation Per Product for WooCommerce
 * Plugin URI: https://socialmind.gr/services/web-development/plugins-for-wordpress-woocommerce/woocommerce-age-validation-per-product/
 * Description: Validates customer's date of birth at checkout based on per-product age validation settings.
 * Version: 1.0
 * Author: Angelos Synadakis by Social Mind
 * Author URI: https://socialmind.gr
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: age-validation-per-product-for-woocommerce
 * Domain Path: /languages
 * Requires PHP: 7.0
 * Requires at least: 5.0
 * Tested up to: 6.7
 * Requires Plugins: woocommerce
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

// Check if WooCommerce is installed and active
add_action('plugins_loaded', 'socialmind_wc_age_validation_check_woocommerce', 10);
function socialmind_wc_age_validation_check_woocommerce() {
	if (!class_exists('WooCommerce')) {
		add_action('admin_notices', 'socialmind_wc_age_validation_missing_wc_notice');
		return;
	}

	// Load plugin functionality
	socialmind_wc_age_validation_init();
}

// Display admin notice if WooCommerce is not active
function socialmind_wc_age_validation_missing_wc_notice() {
	?>
	<div class="notice notice-error">
		<p><?php esc_html_e('WooCommerce Age Validation Per Product requires WooCommerce to be installed and active. Please install and activate WooCommerce.', 'age-validation-per-product-for-woocommerce'); ?></p>
	</div>
	<?php
}

//Initialize all plugin functionality.
function socialmind_wc_age_validation_init() {
	//0a. Enqueue datepicker scripts/styles in the admin (for product fields)
	add_action( 'admin_enqueue_scripts', 'socialmind_wc_age_validation_admin_scripts' );
	function socialmind_wc_age_validation_admin_scripts() {
		// (A) Enqueue your jQuery UI scripts, etc. as you do now:
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_style( 'jquery-ui-css', plugin_dir_url( __FILE__ ) . 'assets/css/jquery-ui.css', [], '1.12.1' );

		// (B) Attach datepicker on these fields (already in your code)
		wp_add_inline_script(
			'jquery-ui-datepicker',
			'jQuery(function($){
				$(".wc-age-validation-datepicker").datepicker({
					dateFormat: "dd-mm-yy",
					changeMonth: true,
					changeYear: true,
					yearRange: "-100:+0"
				});
			});'
		);

		// (C) Real-time sync of global <-> variation fields:
		wp_add_inline_script(
			'jquery-ui-datepicker', 
			'jQuery(function($){

				// On variations loaded, we set up our sync
				$(document).on("woocommerce_variations_loaded", function() {
					syncVariationDobFields();
				});

				// Also run when the page is first ready (in case variations are already visible)
				syncVariationDobFields();

				// Bind to changes in global fields
				$("#_dob_validation_global_from, #_dob_validation_global_to").on("change keyup", function() {
					syncVariationDobFields();
				});

				// This function checks the global fields and updates variation fields accordingly
				function syncVariationDobFields() {
					var globalFrom = $("#_dob_validation_global_from").val().trim(),
						globalTo   = $("#_dob_validation_global_to").val().trim();

					var haveGlobalFrom = globalFrom !== "";
					var haveGlobalTo   = globalTo   !== "";

					// Variation fields
					var $variationMins = $(".js-variation-dob-min");
					var $variationMaxs = $(".js-variation-dob-max");

					if ( haveGlobalFrom || haveGlobalTo ) {
						// If either global field is non-empty, we copy them into every variation & disable
						$variationMins.val(globalFrom).prop("disabled", true);
						$variationMaxs.val(globalTo).prop("disabled", true);
					} else {
						// If both global fields are empty, we RE-enable variation fields
						$variationMins.prop("disabled", false);
						$variationMaxs.prop("disabled", false);

					}
				}

			});'
		);
	}

	
	//0b. Enqueue datepicker scripts/styles on the frontend checkout
	add_action( 'wp_enqueue_scripts', 'socialmind_wc_age_validation_frontend_scripts' );
	function socialmind_wc_age_validation_frontend_scripts() {
		// Only enqueue on Checkout page
		if ( function_exists('is_checkout') && is_checkout() ) {
			wp_enqueue_script( 'jquery-ui-datepicker' );
			wp_enqueue_style( 'jquery-ui-css', plugin_dir_url( __FILE__ ) . 'assets/css/jquery-ui.css', array(), '1.12.1' );

			// Inline script for dd-mm-yy datepicker on the checkout DOB field
			wp_add_inline_script(
				'jquery-ui-datepicker',
				'jQuery(function($){ 
					$("#billing_date_of_birth").datepicker({
						dateFormat: "dd-mm-yy",
						changeMonth: true,
						changeYear: true,
						yearRange: "-120:+0"
					});
				});'
			);
		}
	}
	
	//0c. Better Error Messages or Inline Validation (Client-Side)
	add_action( 'wp_enqueue_scripts', 'socialmind_wc_age_validation_frontend_inline_validation' );
	function socialmind_wc_age_validation_frontend_inline_validation() {
		// Only enqueue on the Checkout page
		if ( function_exists('is_checkout') && is_checkout() ) {
			wp_add_inline_script(
				'jquery-ui-datepicker', // or any other handle that is definitely enqueued on checkout
				'
					jQuery(function($){
						var $dobField = $("#billing_date_of_birth");

						// For a quick pattern check: dd-mm-yyyy
						var datePattern = /^(\d{1,2})-(\d{1,2})-(\d{4})$/;

						$dobField.on("change keyup blur", function() {
							var val = $(this).val().trim();

							// If not empty AND doesn\'t match dd-mm-yyyy
							if (val.length > 0 && ! datePattern.test(val)) {
								// Highlight the field in red
								$(this).css("border-color", "red");

								// Show an inline error message if not already present
								if (! $("#dob-error-msg").length) {
									$(this).after(
										\'<span id="dob-error-msg" style="color:red; font-size:0.9em; display:block;">' . esc_js(__('Please enter a valid date in dd-mm-yyyy format.', 'age-validation-per-product-for-woocommerce')) . '</span>\'
									);
								}
							} else {
								// Valid or empty => remove highlight and any existing error
								$(this).css("border-color", "");
								$("#dob-error-msg").remove();
							}
						});
					});
					'
			);
		}
	}

	//1. Add custom fields to Simple Products.
	add_action( 'woocommerce_product_options_general_product_data', 'socialmind_wc_age_validation_add_simple_product_fields' );
	function socialmind_wc_age_validation_add_simple_product_fields() {
		global $product_object;
		if ( $product_object && $product_object->get_type() != 'variable' ) {
			echo '<div class="options_group">';
			// Minimum DOB
			woocommerce_wp_text_input(
				array(
					'id'          => '_dob_validation_from',
					'label'       => __('DOB Minimum (DD-MM-YYYY)', 'age-validation-per-product-for-woocommerce'),
					'placeholder' => '31-12-2010',
					'desc_tip'    => true,
					'description' => __('Earliest allowed date of birth for purchase.', 'age-validation-per-product-for-woocommerce'),
					'class'       => 'wc-age-validation-datepicker', // for the datepicker
				)
			);
			// Maximum DOB
			woocommerce_wp_text_input(
				array(
					'id'          => '_dob_validation_to',
					'label'       => __('DOB Maximum (DD-MM-YYYY)', 'age-validation-per-product-for-woocommerce'),
					'placeholder' => '31-12-2010',
					'desc_tip'    => true,
					'description' => __('Latest allowed date of birth for purchase.', 'age-validation-per-product-for-woocommerce'),
					'class'       => 'wc-age-validation-datepicker', // for the datepicker
				)
			);
			echo '</div>';
		}
    }
	
	add_action( 'woocommerce_process_product_meta', 'socialmind_wc_age_validation_save_simple_product_fields' );
	function socialmind_wc_age_validation_save_simple_product_fields( $post_id ) {	
		// Capability
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		// Nonce check - typically you see this in official WC code
		check_admin_referer( 'woocommerce_save_data', 'woocommerce_meta_nonce' );
	
		$dob_validation_from = isset($_POST['_dob_validation_from']) ? sanitize_text_field( wp_unslash( $_POST['_dob_validation_from'] ) ) : '';
		$dob_validation_to   = isset($_POST['_dob_validation_to'])   ? sanitize_text_field( wp_unslash( $_POST['_dob_validation_to'] ) )   : '';

		update_post_meta( $post_id, '_dob_validation_from', $dob_validation_from );
		update_post_meta( $post_id, '_dob_validation_to',   $dob_validation_to );
	}

	//2. Add Global Custom Fields to Variable Products
	add_action( 'woocommerce_product_options_general_product_data', 'socialmind_wc_age_validation_add_global_variable_fields' );
	function socialmind_wc_age_validation_add_global_variable_fields() {
		global $post, $product_object;

		// Only show if product type is variable
		if ( $product_object && $product_object->get_type() === 'variable' ) {
			//Check if at least one variation has data
			$any_variation_has_data = false;

			// Get all variations (if you prefer, you could use a direct SQL or postmeta query)
			$variations = wc_get_products( array(
				'parent' => $post->ID,
				'type'   => 'variation',
				'limit'  => -1,
			) );
			foreach ( $variations as $variation ) {
				$var_id  = $variation->get_id();
				$var_from = get_post_meta( $var_id, '_dob_validation_from', true );
				$var_to   = get_post_meta( $var_id, '_dob_validation_to', true );
				if ( ! empty($var_from) || ! empty($var_to) ) {
					$any_variation_has_data = true;
					break;
				}
			}

			echo '<div class="options_group">';
			echo '<h3>' . esc_html_e('Global DOB Restrictions', 'age-validation-per-product-for-woocommerce') . '</h3>';

			// If at least one variation has data, we disable these fields
			$disable_global_fields = $any_variation_has_data ? true : false;

			// The "disabled" attribute, if needed
			$custom_attrs = $disable_global_fields ? array( 'disabled' => 'disabled' ) : array();

			woocommerce_wp_text_input(
				array(
					'id'         		=> '_dob_validation_global_from',
					'label'       		=> __('Global DOB Minimum (DD-MM-YYYY)', 'age-validation-per-product-for-woocommerce'),
					'placeholder' 		=> '31-12-2010',
					'desc_tip'    		=> true,
					'description' 		=> __('Earliest allowed date of birth for all variations.', 'age-validation-per-product-for-woocommerce'),
					'class'       		=> 'wc-age-validation-datepicker', // for the datepicker
					'custom_attributes' => $custom_attrs,
				)
			);

			woocommerce_wp_text_input(
				array(
					'id'          		=> '_dob_validation_global_to',
					'label'       		=> __('Global DOB Maximum (DD-MM-YYYY)', 'age-validation-per-product-for-woocommerce'),
					'placeholder' 		=> '31-12-2010',
					'desc_tip'    		=> true,
					'description'		=> __('Latest allowed date of birth for all variations.', 'age-validation-per-product-for-woocommerce'),
					'class'      		=> 'wc-age-validation-datepicker', // for the datepicker
					'custom_attributes' => $custom_attrs,
				)
			);
			
			// If disabled, display a little message
			if ( $disable_global_fields ) {
				echo '<p style="font-style:italic; color:#555;">';
				echo esc_html__( 'These global DOB fields are disabled because at least one variation has its own DOB restrictions. Clear or remove those variation-level restrictions, then reload this page, to enable global DOB fields.', 'age-validation-per-product-for-woocommerce' );
				echo '</p>';
			}

			echo '</div>';
		}
	}

	add_action( 'woocommerce_process_product_meta_variable', 'socialmind_wc_age_validation_save_global_variable_fields' );
	function socialmind_wc_age_validation_save_global_variable_fields( $post_id ) {
		
		// 1) Capability check
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// 2) Nonce check (WooCommerce uses "woocommerce_save_data" and "woocommerce_meta_nonce" in the product edit form)
		check_admin_referer( 'woocommerce_save_data', 'woocommerce_meta_nonce' );
		
		// 3) Unslash & sanitize	
		$dob_validation_global_from = isset($_POST['_dob_validation_global_from']) ? sanitize_text_field( wp_unslash ( $_POST['_dob_validation_global_from'] ) ) : '';
		$dob_validation_global_to   = isset($_POST['_dob_validation_global_to'])   ? sanitize_text_field( wp_unslash ( $_POST['_dob_validation_global_to'] ) )   : '';

		update_post_meta( $post_id, '_dob_validation_global_from', $dob_validation_global_from );
		update_post_meta( $post_id, '_dob_validation_global_to',   $dob_validation_global_to );
	}
	
	//3. Add Fields to Each Variation (pre-filled if global fields exist).
	add_action( 'woocommerce_product_after_variable_attributes', 'socialmind_wc_age_validation_add_variation_fields', 10, 3 );
	function socialmind_wc_age_validation_add_variation_fields( $loop, $variation_data, $variation ) {
		$global_from = get_post_meta( $variation->product_id, '_dob_validation_global_from', true );
		$global_to   = get_post_meta( $variation->product_id, '_dob_validation_global_to', true );

		$variation_from = get_post_meta( $variation->ID, '_dob_validation_from', true );
		$variation_to   = get_post_meta( $variation->ID, '_dob_validation_to', true );

		// If global is set, we disable the variation fields
		$disabled = ( ! empty($global_from ) || ! empty($global_to ) ) ? true : false;

		// If disabled is true, we prefill from global if set
		$variation_from = ( $disabled && ! empty($global_from) ) ? $global_from : $variation_from;
		$variation_to   = ( $disabled && ! empty($global_to) )   ? $global_to   : $variation_to;

		// Variation FROM
		woocommerce_wp_text_input( array(
			'id'                => "_dob_validation_from_{$loop}",
			'name'              => "_dob_validation_from[{$variation->ID}]",
			'value'             => $variation_from,
			'label'             => __('Variation DOB Minimum (DD-MM-YYYY)', 'age-validation-per-product-for-woocommerce'),
			'desc_tip'          => true,
			'description'       => __('Earliest allowed date of birth for this variation.', 'age-validation-per-product-for-woocommerce'),
			'class'             => 'wc-age-validation-datepicker js-variation-dob-min',
			'custom_attributes' => $disabled ? array('disabled' => 'disabled') : array(),
		) );

		// Variation TO
		woocommerce_wp_text_input( array(
			'id'                => "_dob_validation_to_{$loop}",
			'name'              => "_dob_validation_to[{$variation->ID}]",
			'value'             => $variation_to,
			'label'             => __('Variation DOB Maximum (DD-MM-YYYY)', 'age-validation-per-product-for-woocommerce'),
			'desc_tip'          => true,
			'description'       => __('Latest allowed date of birth for this variation.', 'age-validation-per-product-for-woocommerce'),
			'class'             => 'wc-age-validation-datepicker js-variation-dob-max',
			'custom_attributes' => $disabled ? array('disabled' => 'disabled') : array(),
		) );
	}

	add_action( 'woocommerce_save_product_variation', 'socialmind_wc_age_validation_save_variation_fields', 10, 2 );
	function socialmind_wc_age_validation_save_variation_fields( $variation_id, $i ) {
		$parent_product_id = wp_get_post_parent_id( $variation_id );
		$global_from = get_post_meta( $parent_product_id, '_dob_validation_global_from', true );
		$global_to   = get_post_meta( $parent_product_id, '_dob_validation_global_to', true );
		
		// 1) Capability check
		if ( ! current_user_can( 'edit_post', $variation_id ) ) {
			return;
		}

		// 2) Nonce check
		check_admin_referer( 'woocommerce_save_data', 'woocommerce_meta_nonce' );

		// Only save variation-level fields if global fields are empty
		if ( empty( $global_from ) && empty( $global_to ) ) {
			$variation_from = isset( $_POST['_dob_validation_from'][ $variation_id ] ) 
				? sanitize_text_field( wp_unslash ( $_POST['_dob_validation_from'][ $variation_id ] ) )
				: '';
			$variation_to = isset( $_POST['_dob_validation_to'][ $variation_id ] ) 
				? sanitize_text_field( wp_unslash ( $_POST['_dob_validation_to'][ $variation_id ] ) )
				: '';

			update_post_meta( $variation_id, '_dob_validation_from', $variation_from );
			update_post_meta( $variation_id, '_dob_validation_to',   $variation_to );
		}
	}

	//4. Add Date of Birth Field to Checkout (with datepicker)
	add_filter('woocommerce_checkout_fields', 'socialmind_wc_age_validation_maybe_add_checkout_field');
	function socialmind_wc_age_validation_maybe_add_checkout_field($fields) {

		// Safety check in case the cart doesn’t exist (e.g., on the admin side).
		if ( ! WC()->cart ) {
			return $fields;
		}

		$dob_needed = false;

		foreach (WC()->cart->get_cart() as $cart_item) {
			$product_id   = $cart_item['product_id'];
			$variation_id = $cart_item['variation_id'];

			// 1. Check Variation-level restrictions
			if ($variation_id) {
				// Variation-level from/to
				$variation_from = get_post_meta($variation_id, '_dob_validation_from', true);
				$variation_to   = get_post_meta($variation_id, '_dob_validation_to', true);

				if (!empty($variation_from) || !empty($variation_to)) {
					$dob_needed = true;
					break;
				}

				// If variation-level is empty, check global fields on the parent variable product
				$global_from = get_post_meta($product_id, '_dob_validation_global_from', true);
				$global_to   = get_post_meta($product_id, '_dob_validation_global_to', true);

				if (!empty($global_from) || !empty($global_to)) {
					$dob_needed = true;
					break;
				}

			} else {
				// 2. Simple product from/to
				$from = get_post_meta($product_id, '_dob_validation_from', true);
				$to   = get_post_meta($product_id, '_dob_validation_to', true);

				if (!empty($from) || !empty($to)) {
					$dob_needed = true;
					break;
				}
			}
		}

		// Only if at least one product requires DOB
		if ($dob_needed) {
			$fields['billing']['billing_date_of_birth'] = array(
				'type'        => 'text',
				'label'       => __('Date of Birth', 'age-validation-per-product-for-woocommerce'),
				'placeholder' => __('dd-mm-yyyy', 'age-validation-per-product-for-woocommerce'),
				'required'    => true,
				'class'       => array('form-row-wide'),
			);
		}

		return $fields;
	}

	// Show the DOB in the admin order page
	add_action( 'woocommerce_admin_order_data_after_billing_address', 'socialmind_wc_age_validation_display_admin_order_meta', 10, 1 );
	function socialmind_wc_age_validation_display_admin_order_meta( $order ) {
		$dob = get_post_meta( $order->get_id(), '_billing_date_of_birth', true );
		if ( $dob ) {
			echo '<p><strong>' . esc_html_e('Date of Birth', 'age-validation-per-product-for-woocommerce') . ':</strong> ' . esc_html( $dob ) . '</p>';
		}
	}

	add_action( 'woocommerce_checkout_update_order_meta', 'socialmind_wc_age_validation_save_billing_dob' );
	function socialmind_wc_age_validation_save_billing_dob( $order_id ) {
		// Nonce check. Usually WooCommerce does it for you, but let's be explicit:
		if ( ! isset( $_POST['woocommerce-process-checkout-nonce'] )
			 || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['woocommerce-process-checkout-nonce'] ) ), 'woocommerce-process_checkout' ) ) {
			// If the nonce fails, maybe just return or handle error
			return;
		}

		if ( ! empty($_POST['billing_date_of_birth']) ) {
			update_post_meta( $order_id, '_billing_date_of_birth', sanitize_text_field( wp_unslash ($_POST['billing_date_of_birth'])) );
		}
	}
	
	//5. Validate User’s Date of Birth Against Cart Products.
	add_action( 'woocommerce_checkout_process', 'socialmind_wc_age_validation_check_dob_restrictions' );
	function socialmind_wc_age_validation_check_dob_restrictions() {
		
		// This is optional. Usually WC does it before calling hooks.
		if ( ! isset( $_POST['woocommerce-process-checkout-nonce'] ) 
			 || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['woocommerce-process-checkout-nonce'] ) ), 'woocommerce-process_checkout' ) ) {
			// Nonce failed => block or do something
			return;
		}

		if ( empty($_POST['billing_date_of_birth']) ) {
			if ( isset( $_POST['billing_date_of_birth'] ) ) { //If the field isn't there, there's no requirement
				wc_add_notice( __('Please enter your Date of Birth.', 'age-validation-per-product-for-woocommerce'), 'error' );
				return;
			}
		}

		$user_dob_str = sanitize_text_field( wp_unslash ( $_POST['billing_date_of_birth'] ));

		// Convert dd-mm-yyyy to timestamp
		$user_dob_timestamp = socialmind_wc_age_validation_parse_dmy_to_timestamp( $user_dob_str );
		if ( ! $user_dob_timestamp ) {
			if ( isset( $_POST['billing_date_of_birth'] ) ) { //If the field isn't there, there's no requirement
				wc_add_notice( __('Invalid Date of Birth format. Please use dd-mm-yyyy.', 'age-validation-per-product-for-woocommerce'), 'error' );
				return;
			}
		}

		// Loop through cart items
		foreach ( WC()->cart->get_cart() as $cart_item ) {
			$product_id   = $cart_item['product_id'];
			$variation_id = $cart_item['variation_id'];

			if ( $variation_id ) {
				// Variation-level data
				$variation_from = get_post_meta( $variation_id, '_dob_validation_from', true );
				$variation_to   = get_post_meta( $variation_id, '_dob_validation_to', true );

				// If no variation-level data, check the parent product’s global fields
				if ( empty($variation_from) && empty($variation_to) ) {
					$variation_from = get_post_meta( $product_id, '_dob_validation_global_from', true );
					$variation_to   = get_post_meta( $product_id, '_dob_validation_global_to', true );
				}

				if ( ! socialmind_wc_age_validation_is_valid_dob( $user_dob_timestamp, $variation_from, $variation_to ) ) {
					wc_add_notice(
						sprintf(
							__('You are not allowed to purchase the variation "%s" due to DOB restrictions.', 'age-validation-per-product-for-woocommerce'),
							get_the_title($variation_id)
						),
						'error'
					);
				}

			} else {
				// Simple product
				$from = get_post_meta( $product_id, '_dob_validation_from', true );
				$to   = get_post_meta( $product_id, '_dob_validation_to', true );

				if ( ! socialmind_wc_age_validation_is_valid_dob( $user_dob_timestamp, $from, $to ) ) {
					wc_add_notice(
						sprintf(
							__('You are not allowed to purchase "%s" due to DOB restrictions.', 'age-validation-per-product-for-woocommerce'),
							get_the_title($product_id)
						),
						'error'
					);
				}
			}
		}
	}
	
	// 6a. Add a notice on the single product page if this product has any DOB restriction.
	add_action( 'woocommerce_single_product_summary', 'socialmind_wc_age_validation_show_restriction_notice', 20 );
	function socialmind_wc_age_validation_show_restriction_notice() {
		global $product;

		if ( ! $product ) {
			return;
		}

		$product_id = $product->get_id();

		// Use our helper function
		if ( socialmind_wc_age_validation_has_dob_restrictions( $product_id ) ) {
			echo '<p class="dob-restriction-notice" style="color: #c00; font-weight: bold;">';
			esc_html_e( 'This product (or its variations) is age-restricted. You must provide a valid date of birth at checkout.', 'age-validation-per-product-for-woocommerce' );
			echo '</p>';
		}
	}
	
	//6b. Notices in the Cart
	add_filter('woocommerce_cart_item_name', 'socialmind_wc_age_validation_cart_item_name_notice', 10, 3);
	function socialmind_wc_age_validation_cart_item_name_notice( $product_name, $cart_item, $cart_item_key ) {
		$product_id   = $cart_item['product_id'];
		$variation_id = isset($cart_item['variation_id']) ? $cart_item['variation_id'] : 0;

		if ( socialmind_wc_age_validation_has_dob_restrictions( $product_id, $variation_id ) ) {
			// Append a small message
			$product_name .= '<div class="dob-restriction-cart" style="color:red; font-size:0.9em;">';
			$product_name .= esc_html__( 'Requires valid DOB at checkout', 'age-validation-per-product-for-woocommerce' );
			$product_name .= '</div>';
		}

		return $product_name;
	}
	
	//Helper: Parse dd-mm-yyyy string into a timestamp
	if ( ! function_exists( 'socialmind_wc_age_validation_parse_dmy_to_timestamp' ) ) {
		function socialmind_wc_age_validation_parse_dmy_to_timestamp( $dmy_string ) {
			$parts = explode('-', $dmy_string);
			if ( count($parts) !== 3 ) {
				return false; 
			}
			list($day, $month, $year) = $parts;

			// Basic sanity checks
			if ( ! checkdate( (int)$month, (int)$day, (int)$year ) ) {
				return false;
			}
			return strtotime( "$year-$month-$day" );
		}
	}

	//Helper function to check if a given DOB is within the set range.
	if ( ! function_exists( 'socialmind_wc_age_validation_is_valid_dob' ) ) {
		function socialmind_wc_age_validation_is_valid_dob( $user_dob_timestamp, $from_date_str, $to_date_str ) {
			// If no restrictions, allow
			if ( empty($from_date_str) && empty($to_date_str) ) {
				return true;
			}

			$from_ts = $from_date_str ? socialmind_wc_age_validation_parse_dmy_to_timestamp( $from_date_str ) : false;
			$to_ts   = $to_date_str   ? socialmind_wc_age_validation_parse_dmy_to_timestamp( $to_date_str )   : false;

			// Both exist
			if ( $from_ts && $to_ts ) {
				return ( $user_dob_timestamp >= $from_ts && $user_dob_timestamp <= $to_ts );
			}

			// Only from_date is set
			if ( $from_ts && ! $to_ts ) {
				return ( $user_dob_timestamp >= $from_ts );
			}

			// Only to_date is set
			if ( ! $from_ts && $to_ts ) {
				return ( $user_dob_timestamp <= $to_ts );
			}

			// Default allow
			return true;
		}
	}
	
	//Check if the given product/variation has any DOB restriction.
	function socialmind_wc_age_validation_has_dob_restrictions( $product_id, $variation_id = 0 ) {

		// If we have a variation ID
		if ( $variation_id ) {
			// 1) Check variation-level from/to
			$variation_from = get_post_meta( $variation_id, '_dob_validation_from', true );
			$variation_to   = get_post_meta( $variation_id, '_dob_validation_to', true );

			// If either is non-empty, we have a restriction
			if ( ! empty( $variation_from ) || ! empty( $variation_to ) ) {
				return true;
			}

			// If variation-level is empty, check parent's global fields
			$global_from = get_post_meta( $product_id, '_dob_validation_global_from', true );
			$global_to   = get_post_meta( $product_id, '_dob_validation_global_to', true );

			if ( ! empty( $global_from ) || ! empty( $global_to ) ) {
				return true;
			}

			// No restriction found
			return false;
		}

		// If it's not a variation (could be a simple or variable product)
		$product = wc_get_product( $product_id );
		if ( ! $product ) {
			return false;
		}

		// If it's "simple" or any non-variable type
		if ( $product->is_type('simple') ) {
			$from = get_post_meta( $product_id, '_dob_validation_from', true );
			$to   = get_post_meta( $product_id, '_dob_validation_to',   true );
			if ( ! empty($from) || ! empty($to) ) {
				return true;
			}
			return false;
		}

		// If it's "variable"
		if ( $product->is_type('variable') ) {
			// 1) Check global fields
			$global_from = get_post_meta( $product_id, '_dob_validation_global_from', true );
			$global_to   = get_post_meta( $product_id, '_dob_validation_global_to',   true );
			if ( ! empty($global_from) || ! empty($global_to) ) {
				return true;
			}

			// 2) Check each variation
			$variations = $product->get_children(); // array of variation IDs
			foreach ( $variations as $var_id ) {
				$var_from = get_post_meta( $var_id, '_dob_validation_from', true );
				$var_to   = get_post_meta( $var_id, '_dob_validation_to',   true );
				if ( ! empty($var_from) || ! empty($var_to) ) {
					return true;
				}
			}

			// If no global or variation-level restriction
			return false;
		}

		// default fallback
		return false;
	}

}