<?php
if (!defined('ABSPATH'))
{
	exit;
}


function ecpt_rss_slider_testimonial_shortcode_free($atts)
{
	global $table_prefix,$wpdb,$post;

	$return_content = '';
	$return_content .= '<div class="text_slider_testimonial_panel">';

	if ((isset($atts)) && (is_array($atts)) && (count($atts) > 0))
	{
		if (isset($atts['url']))
		{
			// need support multi rss in array, check another shortcode,  improve it
			$feed_url = sanitize_text_field($atts['url']);
			if (!(empty($feed_url)))
			{
				include_once ( ABSPATH . WPINC . '/feed.php' );
				$rss = fetch_feed($feed_url);
				
				if ( ! is_wp_error($rss))
				{
					$rss_items = $rss->get_items();
					if (!(empty($rss_items)))
					{
						$rss_index_id = 1;
						// $return_content .= '<ul>';
						$return_content .= '<ul class="textslidercontent">';
						
						foreach ($rss_items as $single)
						{
							
							$text_slider_testimonial_default_how_to_bar_id = 'text_slider_testimonial_video_'. $rss_index_id;
							$text_slider_testimonial_how_to_bar_title = esc_sql(sanitize_text_field($single->get_title()));
							$text_slider_testimonial_how_to_bar_content = esc_sql(sanitize_text_field($single->get_description()));
							$rss_index_id = $rss_index_id + 1;
							$return_content .= '<li>';
							$return_content .= ecpt_text_slider_testimonial_frontend_panel ( $text_slider_testimonial_default_how_to_bar_id,$text_slider_testimonial_how_to_bar_title,$text_slider_testimonial_how_to_bar_content );
							$return_content .= '</li>';
						}
						$return_content .= '</ul>';
						//!!!start
						$return_content .= '<ul class="controls" id="customize-controls">';
						$return_content .= '<li class="prev">';
						$return_content .= '<img src="'.plugin_dir_url( __FILE__ ).'asset/images/angle-left.png" alt="">';
						$return_content .= '</li>';
						$return_content .= '<li class="next">';
						$return_content .= '<img src="'.plugin_dir_url( __FILE__ ).'asset/images/angle-right.png" alt="">';
						$return_content .= '</li>';
						$return_content .= '</ul>';
						$return_content .= '<div class="playbutton-wrapper">';
						$return_content .= '<button id="customize-toggle">Pause</button>';
						$return_content .= '</div>';
						//!!!end						
					}
				}
			}
		}
	
	}
	$return_content .= '</div>';


	return $return_content;

}

add_shortcode( 'feedsliders', 'ecpt_rss_slider_testimonial_shortcode_free' );



