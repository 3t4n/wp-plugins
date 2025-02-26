<?php
namespace NKS_Search\Shortcode;

/**
 * Namespace bootstrap
 *
 * @return void
 */
function bootstrap() {
	add_shortcode( 'nks', __NAMESPACE__ . '\\nk_search_shortcode' );
}

/**
 * nk_search_shortcode
 *
 * @param  mixed $atts
 * @return string
 */
function nk_search_shortcode( $atts ) {
	$atts     = shortcode_atts(
		array(
			'post_type'   => 'post',
			'placeholder' => 'Search',
			'count'       => 10,
			'class'       => 'search-auto-complete',
		),
		$atts,
		'nks' 
	);
	$home_url = esc_url( home_url( '/' ) );
	return "
	<form class='nks-form' action='{$home_url}'  autocomplete='off'>
		<div class='nks-loader'></div>
		<input type='text' class='nks-autocomplete {$atts['class']}' name='s' placeholder='{$atts['placeholder']}' post_type='{$atts['post_type']}' count='{$atts['count']}'>
		 <ul class='nks-suggestions'>
		</ul> 
	</form>";
}
