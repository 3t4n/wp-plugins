<?php
	use News_Element\Khobish_Helper;
		$template = 'backgroundgrid/'.$settings['tmpl'].'';
        $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
        $imgf = $settings['imgf'];
        $excerptf = $settings['excerptf']['size'];
		$per_page = $settings['post_perpage']['size'];
		global $wp_query;
		$query_args = $wp_query->query_vars;
		if($per_page){
			$query_args['posts_per_page'] = $per_page;
		}

		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;

		$post_array =['2','3','6','7','10','11','14','15','18','19','22','23','26','27','30','31'];


						
			echo'<div class="khobishbackgroundwrp">';
			
			echo '<div class="khobish-ajax-wrap ne-d-flex ne-gutter">';
            require NEWS_ELM_PATH . 'includes/loops/backgroundgrid/'. $settings['tmpl'] .'.php';

            echo '</div>';

			echo Khobish_Helper::khobish_theme_pagination();
	
		echo '</div>';?>
	
