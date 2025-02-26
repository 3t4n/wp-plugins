<?php
		
if (get_option('pymseoDisablePageCategory333')) {?>
<script>console.log("%cPASA -> pymSEO -> Lazy Load Vanilla v.12: %cCargado ",'color: #104E8B;font-weight:bold','color:green;font-weight:bold');</script>
	<?php
	
	add_filter('request', 'rudr_change_term_request', 1, 1 );
echo get_option('pymseoDisablePageCategory') . "ooooooooooooooooooooooooooooooo";
	
	function rudr_change_term_request($query){

		$tax_name = 'category'; // specify you taxonomy name here, it can be also 'category' or 'post_tag'

		// Request for child terms differs, we should make an additional check
		if( $query['attachment'] ) :
			$include_children = true;
			$name = $query['attachment'];
		else:
			$include_children = false;
			$name = $query['name'];
		endif;


		$term = get_term_by('slug', $name, $tax_name); // get the current term to make sure it exists

		if (isset($name) && $term && !is_wp_error($term)): // check it here

			if( $include_children ) {
				unset($query['attachment']);
				$parent = $term->parent;
				while( $parent ) {
					$parent_term = get_term( $parent, $tax_name);
					$name = $parent_term->slug . '/' . $name;
					$parent = $parent_term->parent;
				}
			} else {
				unset($query['name']);
			}

			switch( $tax_name ):
				case 'category':{
					$query['category_name'] = $name; // for categories
					break;
				}
				case 'post_tag':{
					$query['tag'] = $name; // for post tags
					break;
				}
				default:{
					$query[$tax_name] = $name; // for another taxonomies
					break;
				}
			endswitch;

		endif;

		return $query;

	}


	add_filter( 'term_link', 'rudr_term_permalink', 10, 3 );

	function rudr_term_permalink( $url, $term, $taxonomy ){

		$taxonomy_name = 'category'; // your taxonomy name here
		$taxonomy_slug = 'category'; // the taxonomy slug can be different with the taxonomy name (like 'post_tag' and 'tag' )

		// exit the function if taxonomy slug is not in URL
		if ( strpos($url, $taxonomy_slug) === FALSE || $taxonomy != $taxonomy_name ) return $url;

		$url = str_replace('/' . $taxonomy_slug, '', $url);

		return $url;
	}
}
	

if (get_option('pymseoDisablePageCategory33')) {
	add_action( 'init', 'cameronjonesweb_unregister_categories' );
	add_filter( 'get_the_categories', '__return_false' );
	add_filter( 'the_category', '__return_false' );
	add_filter( 'wp_get_object_terms', 'cameronjonesweb_hide_categories_front_end', 10, 4 );
	add_action( 'pre_get_posts', 'cameronjonesweb_404_category_archives' );
	/**
	 * Removes categories from blog posts
	 */
	function cameronjonesweb_unregister_categories() {
		unregister_taxonomy_for_object_type( 'category', 'post' );
	}
	/**
	 * Removes categories from the front end
	 */
	function cameronjonesweb_hide_categories_front_end( $terms, $object_ids, $taxonomies, $args ) {
		if( in_array( 'category', $taxonomies ) ) {
			$terms = false;
		}
		return $terms;
	}
	/**
	 * Remove category pages
	 */
	function cameronjonesweb_404_category_archives( $query ) {
		if( $query->is_main_query() && $query->is_category() ) {
			$query->set_404();
			status_header( 404 );
		}
	}
}








//function fun_pymseo_cdn_reeemplaze( $content ) {
//
 //    $content = $content . '<p class="signature">' .
//                           '<span class="author-name">Father Vito Cornelius, PhD.</span>' .
 //                          '<span class="degree">Extraterrestrial lifeforms expert</span>' .
 //                          '</p>';
//
 //    return $content;

//}
//add_filter('the_content', 'fun_pymseo_cdn_reeemplaze', 10, 1 );






// MINIMIZAR
//if (get_option('pymseoDisableComentsHtml')) {
//	function sanitize_output($buffer) {
//		require_once('/plugins/minify/lib/Minify/HTML.php');
//		require_once('/plugins/minify/lib/Minify/CSS.php');
//		require_once('/plugins/minify/lib/JSMin.php');
//		$buffer = Minify_HTML::minify($buffer, array(
//			'cssMinifier' => array('Minify_CSS', 'minify'),
//			'jsMinifier' => array('JSMin', 'minify')
//		));
//		return $buffer;
//	}
//	ob_start('sanitize_output');
//}

// Eliminar comentarios del HTML
//if (get_option('pymseoDisableComentsHtml')) {
//	if ( ! is_admin() ) {
//		function fun_pymseo_eliminar_comentarios_html($content) {
//			//$content = preg_replace('/<!--(.|\s)*?-->/', '', $content);
//			$content = preg_replace('/Establecer una rutina/', '---', $content);
//			
//			return $content;
//		}
//		add_filter('wp_header', 'fun_pymseo_eliminar_comentarios_html');
//		add_filter('the_content', 'fun_pymseo_eliminar_comentarios_html');
//		add_filter('wp_footer', 'fun_pymseo_eliminar_comentarios_html');
//		
//	} 
//}















// MOVE js Footer
if (get_option('pymseoMoveScriptsFooter')) {
	function fun_pymseo_move_scripts_from_head_to_footer() {
		remove_action( 'wp_head', 'wp_print_scripts' );
		remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
		remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );

		add_action( 'wp_footer', 'wp_print_scripts', 5);
		add_action( 'wp_footer', 'wp_enqueue_scripts', 5);
		add_action( 'wp_footer', 'wp_print_head_scripts', 5);
	}
	add_action('wp_enqueue_scripts', 'fun_pymseo_move_scripts_from_head_to_footer');
}

// Activar el CDN
if (get_option('pymseoCDNEnable')) {
	
	//$excludes = get_option('pymseoCDNExclusions')
	//$includes = get_option('pymseoCDNIncludedDirectories')
    function fun_pymseo_CDN() {
        // check if origin equals cdn url
	
		if (get_option('home') == get_option('pymseoCDNHosts')) {
            return;
        }

        $excludes = array_map('trim', explode(',', ''));
        $rewriter = new CDN_Enabler_Rewriter(
            get_option('home'),
			get_option('pymseoCDNHosts'),
			'wp-content',
            $excludes,
            '.php',
            1,
            0
        );
        ob_start(array(&$rewriter, 'rewrite'));
    }

	add_action('template_redirect', 'fun_pymseo_CDN');
}
?>