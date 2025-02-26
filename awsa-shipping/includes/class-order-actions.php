<?php
/**
 * Class AWSA_Shipping_Order_Actions
 *
 * @version           1.0.0
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 * @package           AWSA_IR_Post
 */

namespace AWSA_Shipping;

use AWSA_Core\Post_Actions\Post_Actions_Addon;

/**
 * Class AWSA_Shipping_Order_Actions
 *
 * @version 1.0.0
 */
class Order_Actions extends Post_Actions_Addon {

	/**
	 * Get Actions
	 *
	 * @param array $action_groups
	 * @param int   $post_id
	 *
	 * @return array
	 */
	public static function get_actions( array $action_groups, int $post_id ): array {

		$parcel_code = awsa_shipping_get_parcel_code( $post_id );
		// if parcel_code
		$action_groups['shipping']['title'] = __( 'Shipping', 'awsa-shipping' );

		// in 2
		if ( !empty( $parcel_code ) ) {
			$action_groups['shipping']['actions']['set-parcel-code'] = __( 'Change parcel code', 'awsa-shipping' );
		} else {
			$action_groups['shipping']['actions']['set-parcel-code'] = __(
				'Manually enter the parcel code',
				'awsa-shipping'
			);
		}

		return $action_groups;
	}

	/**
	 * Can Run Action
	 *
	 * @param bool   $can
	 * @param string $action_key_key
	 * @param int    $post_id
	 *
	 * @return boolean
	 */
	public static function can_run_action( bool $can, string $action_key_key, int $post_id ): bool {

		switch ( $action_key_key ) {
			case 'set-parcel-code':
				$can = true;
				break;
		}

		return $can;
	}

	/**
	 * Display Actions Properties
	 *
	 * @param string $action
	 * @param string $name
	 * @param int    $post_id
	 *
	 * @return void
	 */
	public static function actions_properties( string $action, string $name, int $post_id ): void {

		$parcel_code = awsa_shipping_get_parcel_code( $post_id );
		switch ( $action ) {
			case 'set-parcel-code':
				echo '<input data-id="parcel_code" type="text" name="' . esc_attr(
						$name
					) . '[parcel_code]" value="' . esc_attr( $parcel_code ) . '" placeholder="' . __(
					     'Parcel code',
					     'awsa-shipping'
				     ) . '" style="width: 100%" />';
				break;
		}
	}

	/**
	 * Ajax Process
	 *
	 * @param array  $r
	 * @param string $action
	 * @param array  $data
	 * @param int    $post_id
	 *
	 * @return array
	 */
	public static function ajax_process( array $r, string $action, array $data, int $post_id ): array {

		$parcel_code        = awsa_shipping_get_parcel_code( $post_id );
		$reload_parcel_info = false;

		switch ( $action ) {
			case 'set-parcel-code':
				if ( self::can_run_action( false, $action, $post_id ) ) {
					$old_parcel_code = $parcel_code;
					$new_parcel_code = $data['parcel_code'];

					awsa_shipping_update_parcel_code( $post_id, $new_parcel_code, $old_parcel_code );

					$r['success']            = true;
					$r['success_messages'][] = __( 'Parcel code changed.', 'awsa-shipping' );
					$reload_parcel_info      = true;
				} else {
					$r['error_messages'][] = __( 'Unable to change parcel code.', 'awsa-shipping' );
				}
				break;
		}

		if ( $reload_parcel_info ) {
			$r['h_target'] = '#awsa-post-info-box .inside';
			ob_start();
			self::info_meta_box( $post_id );
			$r['html'] = ob_get_clean();
		}

		return $r;
	}

	/**
	 * Display Parcel Info in Metabox Report
	 *
	 * @param WP_POST|int $post
	 *
	 * @return void
	 */
	public static function info_meta_box( $post ): void {

		$order_id    = is_a( $post, 'WP_Post' ) ? $post->ID : $post;
		$parcel_code = awsa_shipping_get_parcel_code( $order_id );

		include AWSA_SHIPPING_TEMPLATES . 'parcel-info-meta-box-template.php';
	}

}
