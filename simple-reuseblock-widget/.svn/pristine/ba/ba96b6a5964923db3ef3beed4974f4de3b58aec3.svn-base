<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * 再利用ブロック呼び出しショートコード
 * https://mono96.jp/wordpress/know-how-wordpress/42678/
 */
add_shortcode(
	'srbw_reuseblock',
	function ( $atts ) {
		$atts = shortcode_atts(
			array(
				'id' => null,
			),
			$atts
		);
		ob_start();
		if ( ! $atts['id'] ) {
			return;
		}

		$reuse_block = get_post( $atts['id'] );
		echo do_shortcode( wp_kses_post( $reuse_block->post_content ) ); // apply_shortcodes() do_shortcodeに変わる新しい関数。将来的に切り替え!
	}
);
