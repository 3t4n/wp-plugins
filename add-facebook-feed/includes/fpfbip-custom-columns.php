<?php
add_filter( 'manage_fpfbip_facebook_feed_posts_columns', 'fpfbip_custom_posts_columns' );

// Hook to custom data in Custom Columns
add_action( 'manage_fpfbip_facebook_feed_posts_custom_column' , 'fpfbip_custom_form_columns' , 10 , 2 );

function fpfbip_custom_posts_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Feed Title';
	$newColumns['info'] = 'Feed Info';
	$newColumns['shortcode'] = 'Shortcode';
	$newColumns['date'] = 'Date';
	$newColumns['author'] = 'Created by';
	return $newColumns;
}


function fpfbip_custom_form_columns( $column , $post_id ){
	switch( $column ){
		case 'shortcode' : 
		$tfbip_cpt_generated_shortcode = get_post_meta($post_id, '_fpfbip_shortcode_value', true);
		echo '<span style="font-size:16px;font-weight:;display:inline-block;padding-top:7px;">'.$tfbip_cpt_generated_shortcode.'</span><br/>';
		break;

		case 'info' :
		$_fpfbip_display_style = get_post_meta($post_id, '_fpfbip_display_style', true);
		$_fpfbip_page_url = get_post_meta($post_id, '_fpfbip_page_url', true);
		
		
		$selected_feed_style ='';
		
		$selected_feed_from_value ='';



		if($_fpfbip_display_style == 'list'){
			$selected_feed_style = 'List';
		}else if($_fpfbip_display_style == 'double-list'){
			$selected_feed_style = 'Double List';
		}else if($_fpfbip_display_style == 'grid'){
			$selected_feed_style = 'Grid';
		}

		$selected_feed_from_value = $_fpfbip_page_url;

		
		echo '<span style="">Feed From: '.$selected_feed_from_value.'</span><br/>';
		echo '<span style="">Feed Style: '.$selected_feed_style.'</span><br/>';
		

		break;
	}

}
