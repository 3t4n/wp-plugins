<?php

namespace NMGR\Blocks;

defined( 'ABSPATH' ) || exit;

abstract class Block {

	public static function run() {
		if ( is_nmgr_enabled( 'gift-registry' ) || is_nmgr_enabled( 'wishlist' ) ) {
			add_action( 'init', [ static::class, 'register_blocks' ] );
			add_action( 'rest_api_init', [ static::class, 'register_rest_routes' ] );
			add_action( 'block_categories_all', [ static::class, 'register_block_category' ] );
		}
	}

	abstract public static function template( $attributes );

	abstract public static function rest_response( $request );

	public static function type() {
		// Return class name e.g. 'block';
		return strtolower( ltrim( str_replace( __NAMESPACE__, '', static::class ), '\\' ) );
	}

	public static function register_block_category( $categories ) {
		array_push(
			$categories,
			array(
				'slug' => 'nm-gift-registry',
				'title' => nmgr()->is_pro ?
					__( 'NM Gift Registry and Wishlist', 'nm-gift-registry' ) :
					__( 'NM Gift Registry and Wishlist', 'nm-gift-registry-lite' ),
				'icon' => 'heart',
			)
		);
		return $categories;
	}

	public static function register_blocks() {
		$args = static::metadata();
		// Set the render callback here rather than with block.json and render.php for better code organisation.
		$args[ 'render_callback' ] = [ static::class, 'render_callback' ];
		register_block_type( nmgr()->path . 'assets/blocks/' . static::type(), $args );
	}

	public static function render_callback( $attributes ) {
		return '<div ' . get_block_wrapper_attributes() . '>' . static::template( $attributes ) . '</div>';
	}

	public static function metadata() {
		return [];
	}

	public static function register_rest_routes() {
		register_rest_route( 'nm_gift_registry/v1', '/' . static::type(), array(
			'callback' => [ static::class, 'rest_response' ],
			'methods' => 'POST',
			'permission_callback' => '__return_true',
		) );
	}

	public static function settings_text() {
		return nmgr()->is_pro ? __( 'Settings', 'nm-gift-registry' ) : __( 'Settings', 'nm-gift-registry-lite' );
	}

}
