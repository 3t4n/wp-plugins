<?php 
	use News_Element\Khobish_Helper;
	    $cat = explode(',' , Khobish_Helper::king_buildermeta_to_string($settings['terms']));
		$per_page = $settings['post_perpage']['size'];
		$template = 'magazine-megamenu/'.$settings['tmpl'].'';

        $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
        $imgf = $settings['imgf'];
 
        $excerptf = $settings['excerptf']['size'];

		$query_args = Khobish_Helper::query_arg($settings);
		$options = Khobish_Helper::filter_options ($template,$settings);
        $filters = Khobish_Helper::filter_nav_label($settings,$split='');

		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;
 
		echo '<div class="xl-mega-menu">';
		Khobish_Helper::xlmag_filter_nav($filters,$options,$cat);
			
			echo'<div class="xldmega-menu-1">';
			echo '<div class="khobish-ajax-wrap ne-d-flex ne-gutter ne-mobile-block">';
			require NEWS_ELM_PATH . 'includes/loops/magazine-megamenu/' . $settings['tmpl'] . '.php';
            echo '</div>';
  
			echo Khobish_Helper::xl_ajax_pagination($settings['pagination'],$post_count,$post_found);
			echo '</div>';
		  
		echo '</div></div>';?> 