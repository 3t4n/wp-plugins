<?php
/**
 * Admin Functions
 *
 * @version           1.0.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_Shipping
 */

/**
 * Display Admin Shipping Settings
 *
 * @return void
 */
function awsa_admin_shipping_settings() {

	\AWSA_Core\APIs\Settings\Settings_Page::instance()->display( 'awsa-shipping' );
}

function awsa_admin_shipping_tools() {

	include AWSA_SHIPPING_TEMPLATES . 'template-shipping-tools.php';
}

/**
 * Add columns to shop_order edit.php
 *
 * @hooked : 'manage_edit-shop_order_columns'
 *
 * @param array|null $columns
 *
 * @return array
 */
function awsa_shipping_manage_posts_columns( ?array $columns ): array {

	$columns['parcel_code'] = __( 'Parcel code', 'awsa-shipping' );

	return $columns;
}

/**
 * Display stuff_id or parcel_code
 *
 * @param string $column_name
 * @param int    $post_id
 *
 * @return void
 */
function awsa_shipping_display_parcel_code_column( string $column_name, int $post_id ): void {

	switch ( $column_name ) {
		case 'parcel_code':

			$post_type   = get_post_type( $post_id );
			$object_type = 'shop_order' === $post_type ? 'shop_order' : 'product';
			if ( 'shop_order' === $object_type ) {

				$parcel_code = awsa_shipping_get_parcel_code( $post_id );
				echo( !empty( $parcel_code ) ? $parcel_code : '-' );
			}

			break;
	}
}
