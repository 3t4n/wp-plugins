<?php

namespace Codemanas\CmBlocks;

use Codemanas\CmBlocks\Helper;


class BlockRender {
	private static $_instance = null;

	public static function get_instance() {
		return ( self::$_instance == null ) ? self::$_instance = new self() : self::$_instance;
	}

	private function __construct() {
		add_filter( 'render_block_core/template-part', array( $this, 'edit_header_template' ), 10, 2 );
	}

	public function edit_header_template( $block_content, $source_block ) {
		$post_slug = 'cm_blocks_setting_header_sticky';
		$slug      = $source_block['attrs']['slug'];
		$theme     = $source_block['attrs']['theme'];
		$post_id   = Helper::get_template_part_id( $slug, $theme );

		if ( $post_id ) {
			$enable_sticky_header = get_post_meta( $post_id, $post_slug, true );
			if ( $enable_sticky_header ) {
				$block_content = '<div class="cm-sticky-header">' . $block_content . '</div>';
			}
		}


		return $block_content;
	}

}