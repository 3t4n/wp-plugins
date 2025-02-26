<?php
defined( 'ABSPATH' ) or die( 'Please don&rsquo;t call the plugin directly. Thanks :)' );

//Rewrite
//=================================================================================================
//Search results rewrite
if (!empty(rankology_fno_get_service('OptionPro')->getRewriteSearch())) {
	function rankology_search_url_rewrite() {
	 	if ( is_search() && ! empty( $_GET['s'] ) ) {
	 		wp_redirect( home_url( "/".rankology_fno_get_service('OptionPro')->getRewriteSearch()."/" ) . urlencode( get_query_var( 's' ) ) );
	 		exit();
	 	}
	}
	add_action( 'template_redirect', 'rankology_search_url_rewrite' );

	function rankology_rewrite_search_slug() {
	 	add_rewrite_rule(
                rankology_fno_get_service('OptionPro')->getRewriteSearch().'(/([^/]+))?(/([^/]+))?(/([^/]+))?/?',
	 			'index.php?s=$matches[2]&paged=$matches[6]',
	 			'top'
	 			);
	}
	add_action( 'init', 'rankology_rewrite_search_slug' );

	function rankology_rewrite_breadcrumbs($link, $search) {
		$link = home_url( "/".rankology_fno_get_service('OptionPro')->getRewriteSearch()."/" ) . urlencode( get_query_var( 's' ));
		return $link;
	}
	add_filter('search_link', 'rankology_rewrite_breadcrumbs', 10, 2);
}
