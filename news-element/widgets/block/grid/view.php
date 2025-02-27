<?php
	use News_Element\Khobish_Helper;

		$cat = explode(',' , Khobish_Helper::king_buildermeta_to_string($settings['terms']));
		$per_page = $settings['post_perpage']['size'];
		$template = 'grid/'.$settings['tmpl'].'';

		$metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
		$imgf = $settings['imgf'];
		$excerptf = $settings['excerptf']['size'];

		$options = Khobish_Helper::filter_options ($template,$settings);
		$filters = Khobish_Helper::filter_nav_label($settings);
		$query_args = Khobish_Helper::query_arg($settings);
		
		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;
		
    $class = $settings['tmpl']=='style_one' ? 'mason-on' : 'ne-d-flex ne-gutter';

		Khobish_Helper::xlmag_filter_nav($filters,$options,$cat);		
			echo'<div class="khbgrid">';
			
			echo '<div class="khobish-ajax-wrap '.$class.'">';
			if (in_array($settings['tmpl'], ['style_one', 'style_two'])) {
				require NEWS_ELM_PATH . 'includes/loops/grid/' . $settings['tmpl'] . '.php';
			}       
     	    echo '</div>';
			echo Khobish_Helper::xl_ajax_pagination($settings['pagination'],$post_count,$post_found);
			echo '</div>';
		  echo '</div>';
      ?>