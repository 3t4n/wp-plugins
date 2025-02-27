<?php

namespace NMGR\Blocks;

use NMGR\Blocks\Block;

defined( 'ABSPATH' ) || exit;

class Wishlist extends Block {

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
		return \NMGR\Lib\Single::get_template( [ 'type' => $type ] );
	}

}
