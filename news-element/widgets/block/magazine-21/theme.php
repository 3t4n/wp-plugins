<?php
	use News_Element\Khobish_Helper;
 
		$per_page = $settings['post_perpage']['size'];
		$template = 'magazine-21/'.$settings['tmpl'].''; 
    $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
    $metar = Khobish_Helper::king_buildermeta_to_string($settings['metar']);
    $imgf = $settings['imgf'];
    $imgr = $settings['imgr'];
    $excerptf = $settings['excerptf']['size'];
    $excerptr = $settings['excerptt']['size'];

	global $wp_query;
	$query_args = $wp_query->query_vars;
	if($per_page){
		$query_args['posts_per_page'] = $per_page;
	}		
		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;
						
		echo'<div class="khbmag21">';
		echo '<div class="khobish-ajax-wrap ne-d-flex ne-gutter ne-mobile-block">';
      	require NEWS_ELM_PATH . 'includes/loops/magazine-21/'. $settings['tmpl'] .'.php';
      	echo '</div>';
		echo Khobish_Helper::khobish_theme_pagination();
		echo '</div>';?>	
