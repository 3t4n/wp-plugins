<?php
//###############################
//--> Remove Querystring ver js?ver=1.2
//###############################
if (get_option('pymseoRemoveQueryString')) {
	function fun_pymseo_remove_querystring_js_css( $src ) {
		if ( strpos( $src, 'ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}
	add_filter( 'style_loader_src', 'fun_pymseo_remove_querystring_js_css', 9999 );
	add_filter( 'script_loader_src', 'fun_pymseo_remove_querystring_js_css', 9999 );
}
?>