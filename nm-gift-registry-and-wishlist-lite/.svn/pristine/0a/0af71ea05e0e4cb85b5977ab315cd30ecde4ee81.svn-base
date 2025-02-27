<?php

namespace NMGR\Blocks;

use NMGR\Blocks\Block;

defined( 'ABSPATH' ) || exit;

class Cart extends Block {

	public static function metadata() {
		return [
			'attributes' => [
				'wishlistType' => [
					'type' => 'string',
					'default' => 'gift-registry',
				]
			],
		];
	}

	public static function rest_response( $request ) {
		$requested_type = ( string ) ($request[ 'wishlistType' ] ?? 'gift-registry');
		$other_type = 'gift-registry' === $requested_type ? 'wishlist' : 'gift-registry';
		$type = is_nmgr_enabled( $requested_type ) ? $requested_type : $other_type;
		$show_settings = is_nmgr_enabled( $requested_type ) && is_nmgr_enabled( $other_type );
		$texts = [
			'settings' => self::settings_text(),
			'wishlist_type' => nmgr()->is_pro ?
			__( 'Wishlist type', 'nm-gift-registry' ) :
			__( 'Wishlist type', 'nm-gift-registry-lite' ),
			'gift_registry' => nmgr_get_type_title( 'c', false, 'gift-registry' ),
			'wishlist' => nmgr_get_type_title( 'c', false, 'wishlist' ),
		];

		return rest_ensure_response( [
			'show_settings' => $show_settings,
			'text' => $texts,
			'template' => self::template( $request->get_params() )
			] );
	}

	public static function template( $attributes ) {
		$type = $attributes[ 'wishlistType' ];
		$quantity = 0;
		$url = nmgr_get_url( $type, 'home' );
		$title = sprintf(
			/* translators %s: wishlist type title */
			nmgr()->is_pro ? __( 'View your %s items', 'nm-gift-registry' ) : __( 'View your %s items', 'nm-gift-registry-lite' ),
			nmgr_get_type_title( '', false, $type )
		);

		if ( !is_nmgr_user( $type ) ) {
			$url = add_query_arg( array(
				'nmgr-notice' => 'login-to-access',
				'nmgr-redirect' => $_SERVER[ 'REQUEST_URI' ],
				'nmgr-type' => $type,
				), wc_get_page_permalink( 'myaccount' ) );
		}

		foreach ( nmgr_get_user_wishlist_ids( '', $type ) as $wishlist_id ) {
			$wishlist = nmgr()->wishlist();
			$wishlist->set_id( $wishlist_id );
			$quantity = $quantity + ( int ) $wishlist->get_items_quantity_count();
		}

		$svg = array(
			'icon' => 1 > ( int ) $quantity ? 'heart-empty' : 'heart',
			'size' => 2,
			'sprite' => false,
			'fill' => 'currentColor',
		);

		ob_start();
		?>
		<a href="<?php echo esc_url( $url ); ?>"
			 title="<?php echo esc_attr( $title ); ?>"
			 data-type="<?php echo esc_attr( $type ); ?>"
			 style="text-decoration:none;"
			 class="nmgr-cart nmgr-tip">
		<?php echo wp_kses( nmgr_get_svg( $svg ), nmgr_allowed_post_tags() ); ?>
			<span class="count"><?php echo absint( $quantity ); ?></span>
		</a>
				 <?php
				 return ob_get_clean();
			 }

		 }
