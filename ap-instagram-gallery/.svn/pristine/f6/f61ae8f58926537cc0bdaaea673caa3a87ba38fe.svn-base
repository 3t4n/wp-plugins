<?php
add_filter( 'manage_arrow_insta_gallery_posts_columns', 'igbap_custom_posts_columns' );

// Hook to custom data in Custom Columns
add_action( 'manage_arrow_insta_gallery_posts_custom_column' , 'igbap_custom_form_columns' , 10 , 2 );

function igbap_custom_posts_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Feed Title';
	$newColumns['shortcode'] = 'Shortcode';
	$newColumns['date'] = 'Date';
	$newColumns['author'] = 'Created by';
	return $newColumns;
}


function igbap_custom_form_columns( $column , $post_id ){
	switch( $column ){
		case 'shortcode' : 
		$igbap_cpt_generated_shortcode = get_post_meta($post_id, '_igbap_shortcode_value', true);
		echo '<span style="font-size:16px;font-weight:;display:inline-block;padding-top:7px;">'.$igbap_cpt_generated_shortcode.'</span><br/>';
		break;

	}

}
