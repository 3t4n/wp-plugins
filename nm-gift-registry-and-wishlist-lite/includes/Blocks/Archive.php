<?php

namespace NMGR\Blocks;

use NMGR\Blocks\Block;

defined( 'ABSPATH' ) || exit;

class Archive extends Block {

	public static function rest_response( $request ) {
		return rest_ensure_response( [
			'template' => self::template( null )
			] );
	}

	public static function template( $attributes ) {
		return \NMGR\Lib\Archive::get_template();
	}

}
