<?php
	use News_Element\Khobish_Helper;
		$per_page = $settings['post_perpage']['size'];
		$template = 'grid/'.$settings['tmpl'].'';

		$metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
		$imgf = $settings['imgf'];
		$excerptf = $settings['excerptf']['size'];

		global $wp_query;
		$query_args = $wp_query->query_vars;
		if($per_page){
			$query_args['posts_per_page'] = $per_page;
		}
		
		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;
		
    $class = $settings['tmpl']=='style_one' ? 'mason-on' : 'ne-d-flex ne-gutter';		
			echo'<div class="khbgrid">';
			
			echo '<div class="khobish-ajax-wrap '.$class.'">';
			if (in_array($settings['tmpl'], ['style_one', 'style_two'])) {
				require NEWS_ELM_PATH . 'includes/loops/grid/' . $settings['tmpl'] . '.php';
			}       
     	    echo '</div>';
			 echo Khobish_Helper::khobish_theme_pagination();
		  echo '</div>';
      ?>