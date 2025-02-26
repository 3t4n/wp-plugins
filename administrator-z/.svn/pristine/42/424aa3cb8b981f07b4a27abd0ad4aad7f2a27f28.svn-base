<?php
/**
=========== DEVELOPING ===========
=========== Only use for copy paste ===========
 */
// support cart item meta -> order item meta,
// also email item meta. 
// maybe add input to add to cart form

namespace Adminz\Helper;
class WoocommerceOrderItem {

	public $item_label;
	public $item_key;
	public $validate_text;

	function __construct() {

	}

	function setup( $args = [] ) {
		foreach ( (array) $args as $key => $value ) {
			if ( property_exists( $this, $key ) ) {
				$this->$key = $value;
			}
		}
	}

	function init() {
		$this->woocommerce_order_item_display_meta_key();
		$this->woocommerce_add_cart_item_data();
		$this->woocommerce_get_item_data();
		$this->woocommerce_checkout_create_order_line_item();
		$this->woocommerce_email_order_meta();
	}

	function init_cart_field() {
		$this->woocommerce_before_add_to_cart_button();
	}

	// you can code this action for your custom
	function woocommerce_before_add_to_cart_button() {
        // get form add to cart to loop item
		// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_add_to_cart', 19 );

        // create field on single product
		add_action( 'woocommerce_before_add_to_cart_button', function () {
			?>
			<div class="">
				<label for="<?= esc_attr( $this->item_key ); ?>">
					<?= esc_attr( $this->item_label ) ?>
				</label>
				<input type="text" id="<?= esc_attr( $this->item_key ); ?>" name="<?= esc_attr( $this->item_key ); ?>"
					placeholder="<?= esc_attr( $this->item_label ) ?>" value="<?= esc_attr( $_POST[ $this->item_key ] ?? '' ) ?>"
					maxlength="15">
			</div>
			<?php
		} );


		add_action( 'woocommerce_add_to_cart_validation', function ($result, $product_id, $quantity) {
			$validate_text = $this->item_label . " is required!";
			if ( $this->validate_text ) {
				$validate_text = $this->validate_text;
			}

			if ( empty( $_REQUEST[ $this->item_key ] ) ) {
				wc_add_notice( $validate_text, 'error' );
				return false;
			}
			return $result;
		}, 10, 3 );
	}

	function woocommerce_order_item_display_meta_key() {

		add_filter( 'woocommerce_order_item_display_meta_key', function ($display_key, $meta, $item) {
			if ( $meta->key === $this->item_key ) {
				$display_key = $this->item_label;
			}
			return $display_key;
		}, 10, 3 );

		add_filter( 'woocommerce_order_item_display_meta_value', function ($value, $meta, $item) {
			if ( $meta->key === $this->item_key ) {
				return apply_filters(
					'_woocommerce_order_item_display_meta_value',
					$value,
					$this->item_key
				);
			}
			return $value;
		}, 10, 3 );
	}

	function woocommerce_add_cart_item_data() {
		add_filter( 'woocommerce_add_cart_item_data', function ($cart_item_data) {
			if ( !empty( $_POST[ $this->item_key ] ) ) {
				$cart_item_data[ $this->item_key ] = sanitize_text_field( $_POST[ $this->item_key ] );
			}
			return $cart_item_data;

		}, 10, 1 );
	}

	function woocommerce_get_item_data() {
		add_filter( 'woocommerce_get_item_data', function ($item_data, $cart_item) {
			if ( !empty( $cart_item[ $this->item_key ] ) ) {
				$item_data[] = array(
					'key'     => $this->item_label,
					'value'   => $cart_item[ $this->item_key ],
					'display' => apply_filters(
						'_woocommerce_order_item_display_meta_value',
						$cart_item[ $this->item_key ],
						$this->item_key
					),
				);
			}
			return $item_data;
		}, 10, 2 );
	}

	function woocommerce_checkout_create_order_line_item() {
		add_action( 'woocommerce_checkout_create_order_line_item', function ($item, $cart_item_key, $values, $order) {
			if ( !empty( $values[ $this->item_key ] ) ) {
				$item->add_meta_data(
					$this->item_key,
					$values[ $this->item_key ]
				);
			}

		}, 10, 4 );
	}

	function woocommerce_email_order_meta() {

		add_action( 'woocommerce_email_order_meta', function ($order) {
			if ( $value = $order->get_meta( $this->item_key ) ) {
				echo $value;
			}
		}, 10, 1 );

		add_filter( 'woocommerce_email_order_meta_fields', function ($fields, $sent_to_admin, $order) {
			if ( $value = $order->get_meta( $this->item_key ) ) {
				$fields[ $this->item_key ] = array(
					'label' => $this->item_label,
					'value' => $value,
				);
			}
			return $fields;
		}, 10, 3 );
	}
}



// $a = new \Adminz\Helper\WoocommerceOrderItem;
// $a->setup(
// 	[ 
// 		'filter_hook_name' => 'product_version',
// 		'item_label'       => 'Product version',
// 		'item_key'         => 'product_version',
// 	]
// );
// $a->init();
// $a->init_cart_field();