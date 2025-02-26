<?php
/**
 * @author Drew Gourley
 * @copyright 2011
 * @description Use WordPress Shortcode API for more features
 * @Docs http://codex.wordpress.org/Shortcode_API
 */
class minecraft_block_shortcodes {
	var $count = 1;
	function minecraft_block_shortcodes() {
		add_shortcode( 'minecraft', array(&$this, 'shortcode_block') );	
	}
	function shortcode_block( $atts ) {
		global $minecraft_block;
		global $pdf_count;
		extract(shortcode_atts(array( 'texture' => false, 'id' => false, 'class' => false, 'url' => false ), $atts ));
		if (!$id) return;
		$out = minecraft_block_create($texture, $id, $class, $url, false);
		return $out;
	}
}
$minecraft_block_shortcodes = new minecraft_block_shortcodes;	
?>