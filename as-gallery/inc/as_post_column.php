<?php



if (!function_exists('as_gallery_columns_head')) {
	function as_gallery_columns_head($columns) {	
	    $columns['as_shortcode'] = __( 'Shortcode', 'anu' );
	    return $columns;
	}
add_filter( 'manage_asgallery_posts_columns', 'as_gallery_columns_head' );
}

if (!function_exists('as_gallery_columns')) {
	function as_gallery_columns( $column, $post_id ) {
	    switch ( $column ) {

	        case 'as_shortcode' :
	            echo '<strong style="padding: 10px 0;float: left;">[as_gallery id="'.$post_id.'"]</strong>';
	            break;
	        default:

	    }
	}
add_action( 'manage_asgallery_posts_custom_column' , 'as_gallery_columns', 10, 2 );
}


