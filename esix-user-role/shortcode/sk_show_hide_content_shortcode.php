<?php
add_shortcode( 'ESIX_HIDE', 'eurm_hide_conten_for_user_role' );
if(!function_exists('eurm_hide_conten_for_user_role'))
{
	function eurm_hide_conten_for_user_role( $atts,$content ) {
		$atts = shortcode_atts( array(
			'view' => '',
		), $atts, 'ESIX_HIDE' );
		
		if(is_user_logged_in())
		{
			
				return $content ;
			
		}else
		{
			// 
		}
	 
	 }
}
?>