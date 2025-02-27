<?php
	use News_Element\Khobish_Helper;

        $cat = explode(',' , Khobish_Helper::king_buildermeta_to_string($settings['terms']));
		$template = 'backgroundgrid/'.$settings['tmpl'].'';
        $metaf = Khobish_Helper::king_buildermeta_to_string($settings['metaf']);
        $imgf = $settings['imgf'];
        $excerptf = $settings['excerptf']['size'];

        $query_args = Khobish_Helper::query_arg($settings);
		$options = Khobish_Helper::filter_options ($template,$settings);
		$filters = Khobish_Helper::filter_nav_label($settings);
		$wp_query = new WP_Query($query_args);
		$post_count = $wp_query->post_count;
		$post_found = $wp_query->found_posts;

		$post_array =['2','3','6','7','10','11','14','15','18','19','22','23','26','27','30','31'];

		Khobish_Helper::xlmag_filter_nav($filters,$options,$cat);
						
			echo'<div class="khobishbackgroundwrp">';
			
			echo '<div class="khobish-ajax-wrap ne-d-flex ne-gutter">';
            require NEWS_ELM_PATH . 'includes/loops/backgroundgrid/'. $settings['tmpl'] .'.php';

            echo '</div>';

			echo Khobish_Helper::xl_ajax_pagination($settings['pagination'],$post_count,$post_found);
			echo '</div>';	
		echo '</div>';?>
	
