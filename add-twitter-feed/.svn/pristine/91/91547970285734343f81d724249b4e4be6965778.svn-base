<?php
add_filter( 'manage_tfbip_twitter_feed_posts_columns', 'tfbip_custom_posts_columns' );

// Hook to custom data in Custom Columns
add_action( 'manage_tfbip_twitter_feed_posts_custom_column' , 'tfbip_custom_form_columns' , 10 , 2 );

function tfbip_custom_posts_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Feed Title';
	$newColumns['info'] = 'Feed Info';
	$newColumns['shortcode'] = 'Shortcode';
	$newColumns['date'] = 'Date';
	$newColumns['author'] = 'Created by';
	return $newColumns;
}


function tfbip_custom_form_columns( $column , $post_id ){
	switch( $column ){
		case 'shortcode' : 
		$tfbip_cpt_generated_shortcode = get_post_meta($post_id, '_tfbip_shortcode_value', true);
		echo '<span style="font-size:16px;font-weight:;display:inline-block;padding-top:7px;">'.$tfbip_cpt_generated_shortcode.'</span><br/>';
		break;

		case 'info' :
		$_tfbip_select_style = get_post_meta($post_id, '_tfbip_select_style', true);
		$_tfbip_select_template = get_post_meta($post_id, '_tfbip_select_template', true);
		$_tfbip_select_feed_from = get_post_meta($post_id, '_tfbip_select_feed_from', true);
		$_tfbip_hashtag = get_post_meta($post_id, '_tfbip_hashtag', true);
		$_tfbip_username = get_post_meta($post_id, '_tfbip_username', true);
		$selected_feed_theme ='';
		$selected_feed_style ='';
		$selected_feed_from ='';
		$selected_feed_from_value ='';


		if($_tfbip_select_template == 'tfbip_template1'){
			$selected_feed_theme = 'Template 1';
		}else if($_tfbip_select_template == 'tfbip_template2'){
			$selected_feed_theme = 'Template 2';
		}else if($_tfbip_select_template == 'tfbip_template3'){
			$selected_feed_theme = 'Template 3';
		}else if($_tfbip_select_template == 'tfbip_template4'){
			$selected_feed_theme = 'Template 4';
		}else if($_tfbip_select_template == 'tfbip_template5'){
			$selected_feed_theme = 'Template 5';
		}else if($_tfbip_select_template == 'tfbip_template6'){
			$selected_feed_theme = 'Template 6';
		}else if($_tfbip_select_template == 'tfbip_template7'){
			$selected_feed_theme = 'Template 7';
		}else if($_tfbip_select_template == 'tfbip_template8'){
			$selected_feed_theme = 'Template 8';
		}

		if($_tfbip_select_style == 'vertical'){
			$selected_feed_style = 'Vertical';
		}else if($_tfbip_select_style == 'blog_style'){
			$selected_feed_style = 'Blog Style';
		}else if($_tfbip_select_style == 'masonry'){
			$selected_feed_style = 'Masonry';
		}

		if($_tfbip_select_feed_from == 'hashtag'){
			$selected_feed_from_value = $_tfbip_hashtag;
			$selected_feed_from = 'Hashtag';

		}else if($_tfbip_select_feed_from == 'username'){
			$selected_feed_from_value = $_tfbip_username;
			$selected_feed_from = 'Username';
		}

		echo '<span style="">Feed Style: '.$selected_feed_style.'</span><br/>';
		echo '<span style=";">Feed Theme: '.$selected_feed_theme.'</span><br/>';
		echo '<span style="">'.$selected_feed_from.': </span>';
		echo '<span style="">'.$selected_feed_from_value.'</span><br/>';
		

		break;
	}

}
