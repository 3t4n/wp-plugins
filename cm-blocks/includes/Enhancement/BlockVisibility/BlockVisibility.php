<?php

namespace Codemanas\CmBlocks\Enhancement\BlockVisibility;

class BlockVisibility {
	private static ?BlockVisibility $_instance = null;

	public static function get_instance(): ?BlockVisibility {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_filter( 'render_block', [ $this, 'block_render' ], 10, 2 );
		MediaQuery::get_instance();
		UserRoles::get_instance();
	}

	public function block_render( $block_content, $block ) {
		$attrs = $block['attrs'] ?? null;

		//bail early
		if ( ! isset( $attrs ) ) {
			return $block_content;
		}

		// Check if the 'cmblocksVisibility' attribute exists and is an array
		if ( isset( $attrs['cmblocksVisibility'] ) && is_array( $attrs['cmblocksVisibility'] ) ) {
			$cmblocksVisibility = $attrs['cmblocksVisibility'];
			$block_content = apply_filters('cmblocks_visibility_render_block_content', $block_content, $cmblocksVisibility, $block);
		}

		//let's start with media screens
		return $block_content;
	}
}