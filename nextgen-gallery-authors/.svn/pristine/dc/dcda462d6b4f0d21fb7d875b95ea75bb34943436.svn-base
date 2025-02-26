<?php
if (is_admin()){	

}else{	

	// FUNC: add author filtering _________________________________________________________________________________________________

		function rcwd_nggauthors_filter($galleries){
			$authid 		= (int)get_query_var('authid');
			$auth_gallery	= array();
			if( $authid != '' and $authid != 0 ){
				foreach($galleries as $key => $value){
					if($value->author == $authid) $auth_gallery[$key] = $value;
				}
				$galleries = $auth_gallery;
			}
			return $galleries;
		}
		add_filter('ngg_album_galleries_before_paging', 'rcwd_nggauthors_filter');	
		
	// FUNC: add info to gallery object ______________________________________________________________________________________________
	
		function rcwd_nggauthors_add_info_to_gallery_object($gallery){
			$ngg_options				= get_option('ngg_options');
			$slug						= $ngg_options['permalinkSlug'];
			$authid 					= get_query_var('authid');
			$permalink_structure		= get_option('permalink_structure');
			$page_id					= get_the_ID();
			if(!empty($permalink_structure)){
				$author_galleries 		= get_permalink($page_id).$slug.'/auth-'.$gallery->author.'/';
			}else{
				$author_galleries 		=	 '?p='.$page_id.'&authid='.$authid;
			}
			$gallery->author_galleries	= $author_galleries;
			return $gallery;
		}
		add_filter('ngg_album_galleryobject', 'rcwd_nggauthors_add_info_to_gallery_object', 10, 2);
			
}

// FUNC: set query vars for new permalink rules ___________________________________________________________________________________

	function rcwd_nggauthors_set_query_vars($query_vars){
		$query_vars[] = 'authid';
		return $query_vars;
	}
	add_filter('query_vars', 'rcwd_nggauthors_set_query_vars');	

// FUNC: add new permalink rules ___________________________________________________________________________________

	function rcwd_nggauthors_add_rules($rules){
		$newrules 																= array();
		$newrules['(.+?)/nggallery/auth-([0-9]+)/?$'] 							= 'index.php?pagename=$matches[1]&authid=$matches[2]';
		$newrules['(.+?)/nggallery/([^/]+)/([^/]+)/comment-page-([0-9]+)/?$'] 	= 'index.php?pagename=$matches[1]&album=$matches[2]&gallery=$matches[3]&cpage=$matches[4]';
		$rules 																	= $newrules + $rules;
		return $newrules + $rules;
	}
	add_filter( 'rewrite_rules_array','rcwd_nggauthors_add_rules' );

// FUNC: flush rules ___________________________________________________________________________________
	
	function rcwd_nggauthors_flush_rules(){
		$rules = get_option('rewrite_rules');
		if ( ! isset( $rules['(.+?)/nggallery/auth-([0-9]+)/?$'] ) ){
			global $wp_rewrite;
			$wp_rewrite->flush_rules();
		}
	}
	add_action( 'wp_loaded','rcwd_nggauthors_flush_rules' );	
	
?>