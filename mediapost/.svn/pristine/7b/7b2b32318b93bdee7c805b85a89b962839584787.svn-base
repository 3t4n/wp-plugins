<?php
defined( 'ABSPATH' ) or exit;

add_shortcode( "mpwp_form", "mpwpFormsGetFormContent" );

function mpwpFormsGetFormContent( $atts, $content = null ) {
	extract( 
		shortcode_atts(
			array(
				"id" => ''
			),
			$atts
		)
	);
	
	$post_status = get_post_status( $id );
	if ( FALSE !== $post_status && 'publish' == $post_status ){
		$form_html = mpwpFormsGetFormHTML( $id );
		return $form_html;
	}
}
?>