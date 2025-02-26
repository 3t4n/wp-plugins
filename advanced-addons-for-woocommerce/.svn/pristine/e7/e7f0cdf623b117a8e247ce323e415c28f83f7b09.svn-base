<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'wp_ajax_save_product_addons', 'aafw_save_product_addons' );
add_action( 'wp_ajax_nopriv_save_product_addons', 'aafw_save_product_addons' );

/**
 * Handle saving product addons.
 *
 * @return void
 */
function aafw_save_product_addons() {
	// Check if the request is valid.
	if ( ! isset( $_REQUEST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_key( $_REQUEST['nonce'] ) ), 'woocommerce_addon_nonce' ) ) {
		wp_send_json_error( array( 'message' => 'Invalid nonce.' ) );
	}
	// Ensure the current user has permission to edit products.
	if ( ! current_user_can( 'edit_products' ) )  {
		wp_send_json_error( array( 'message' => 'You do not have permission to edit products.' ) );
	}

	$product_id = isset( $_REQUEST['product_id'] ) ? intval( $_REQUEST['product_id'] ) : null;
	$addons     = isset( $_REQUEST['addons'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['addons'] ) ) : '';
	$addons     = json_decode( stripslashes( $addons ), true );

	// Ensure the product ID and addons data are provided.
	if ( ! $product_id || empty( $addons ) ) {
		wp_send_json_error( array( 'message' => 'Product ID and addons data are required.' ) );
	}

	/**
	 * Recursive function to sanitize addons.
	 *
	 * @param array $addon The addon or child item to sanitize.
	 * @return array Sanitized addon.
	 */
	function sanitize_addon( $addon ) {
		return array(
			'id'       => sanitize_text_field( $addon['id'] ),
			'name'     => sanitize_text_field( $addon['name'] ),
			'type'     => sanitize_text_field( $addon['type'] ),
			'price'    => isset( $addon['price'] ) ? floatval( $addon['price'] ) : 0,
			'parentId' => isset( $addon['parentId'] ) ? sanitize_text_field( $addon['parentId'] ) : null,
			'children' => isset( $addon['children'] ) ? array_map( 'sanitize_addon', $addon['children'] ) : array(),
			'subItems' => isset( $addon['subItems'] ) ? array_map(
				function( $sub_item ) use ( $addon ) {
					return array(
						'id'    => sanitize_text_field( $sub_item['id'] ),
						'value' => 'image' === $addon['type'] && isset( $sub_item['value']['id'] ) ? intval( $sub_item['value']['id'] ) : sanitize_text_field( $sub_item['value'] ),
						'price' => isset( $sub_item['price'] ) ? floatval( $sub_item['price'] ) : 0,
					);
				},
				$addon['subItems']
			) : array(),
		);
	}

	// Sanitize and prepare the addons data for saving.
	$sanitized_addons = array_map( 'sanitize_addon', $addons );

	// Save the sanitized addons as post meta.
	update_post_meta( $product_id, '_product_addons', $sanitized_addons );

	// Send a success response.
	wp_send_json_success( array( 'message' => 'Product addons saved successfully.' ) );
}

/**
 * Retrieve product addons.
 *
 * @return void
 */
function aafw_get_product_addons() {
	// Check if the request is valid.
	if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['nonce'] ) ), 'woocommerce_addon_nonce' ) ) {
		wp_send_json_error( array( 'message' => 'Invalid nonce.' ) );
	}

	// Ensure the current user has permission to edit products.
	if ( ! current_user_can( 'edit_products' ) ) {
		wp_send_json_error( array( 'message' => 'You do not have permission to perform this action.' ) );
	}

	// Get the product ID from the request.
	$product_id = isset( $_POST['product_id'] ) ? intval( wp_unslash( $_POST['product_id'] ) ) : null;

	if ( ! $product_id ) {
		wp_send_json_error( array( 'message' => 'Product ID is missing.' ) );
	}

	// Retrieve the addons from post meta.
	$addons = get_post_meta( $product_id, '_product_addons', true );
	if ( empty( $addons ) || ! is_array( $addons ) ) {
		wp_send_json_error( array( 'message' => 'Empty addons.' ) );
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
		$addons = array();
	}

	// Send the addons as JSON response.
	wp_send_json_success( array( 'addons' => $addons ) );
}

// Hook the function to handle the AJAX request.
add_action( 'wp_ajax_get_product_addons', 'aafw_get_product_addons' );
add_action( 'wp_ajax_nopriv_get_product_addons', 'aafw_get_product_addons' );
