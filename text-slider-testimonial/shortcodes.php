<?php
if (!defined('ABSPATH'))
{
	exit;
}


function ecpt_post_slider_testimonial_shortcode_free($atts)
{
	global $table_prefix,$wpdb,$post;


	$return_content = '';
	$return_content .= '<div class="text_slider_testimonial_panel">';

	$post_type = 'post';
	//$post_type_cat = 'text_slider_categories';

	$sql = $wpdb->prepare( "SELECT ID, post_title, post_content FROM $wpdb->posts WHERE post_type=%s AND post_status='publish' order by post_date ASC",$post_type);

	$results = $wpdb->get_results( $sql );
	$original_post = $post;
	if ((!(empty($results))) && (is_array($results)) && (count($results) >0))
	{
		//$return_content .= '<ul>';
		$return_content .= '<ul class="textslidercontent">';
		
		foreach ($results as $single)
		{
			$text_slider_testimonial_default_how_to_bar_id = 'text_slider_testimonial_video_'. $single->ID;
			$text_slider_testimonial_how_to_bar_title = $single->post_title;
			//$text_slider_testimonial_how_to_bar_content = $single->post_content;
			$postExcerptSelect = '';
			$postExcerptSelect = get_option("postExcerptSelect");
			//$text_slider_testimonial_how_to_bar_content = get_the_excerpt($single->ID);
			
			if (empty($postExcerptSelect))
			{
				$postExcerptSelect = 'postexcerpt';
			}
			
			if ($postExcerptSelect == 'postexcerpt')
			{
				$original_post = $post; 
				$post = get_post($single->ID);
				//$text_slider_testimonial_how_to_bar_content = get_the_excerpt($single->ID);
				$text_slider_testimonial_how_to_bar_content = wp_trim_excerpt($single->post_content);
				$post = $original_post;
			}
			
			if ($postExcerptSelect == 'postcontent')
			{
				$text_slider_testimonial_how_to_bar_content = $single->post_content;
			}
			
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

	$return_content .= '</div>';


	return $return_content;

}

add_shortcode( 'postsliders', 'ecpt_post_slider_testimonial_shortcode_free' );



