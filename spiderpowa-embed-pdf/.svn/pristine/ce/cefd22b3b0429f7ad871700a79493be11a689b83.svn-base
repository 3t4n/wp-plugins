<?php
/*
Plugin Name: Spiderpowa Embed PDF
Description: When you insert a PDF from your Media library, it will be embbed into your page using your browser's pdf viewer.
Author: Jimmy Hu
Version: 1.0
*/

function spiderpowa_embedpdf($html, $post_id){
	$file = get_post($post_id);
	if ($file->post_mime_type == 'application/pdf') {
		$html = '[spiderpowa-pdf src="'.$file->guid.'"]'.$html;
	}
	return $html;
}
function spiderpowa_embedpdf_shortcode($attr){
	return '<embed src="'.$attr['src'].'" style=" height:480px; width:100%;"></embed>';
}
add_filter ( 'media_send_to_editor', 'spiderpowa_embedpdf', 30, 3);
add_shortcode( 'spiderpowa-pdf', 'spiderpowa_embedpdf_shortcode' );
