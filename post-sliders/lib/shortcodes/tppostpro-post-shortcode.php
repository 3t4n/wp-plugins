<?php 

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


# shortocde
function tppostslider_pro_post_query($atts, $content = null){
	$atts = shortcode_atts(
		array(
			'id' => "",
			), $atts);
	global $post;
	
	$postid = $atts['id'];

	$tppostsliderpro_postoptions        = get_post_meta( $postid, 'tppostsliderpro_postoptions', true );
	$tppostsliderpro_ordercats          = get_post_meta( $postid, 'tppostsliderpro_ordercats', true );
	$tppostsliderpro_orders             = get_post_meta( $postid, 'tppostsliderpro_orders', true );
	$tppostsliderpro_styles             = get_post_meta( $postid, 'tppostsliderpro_styles', true );
	$tppostsliderpr_items               = get_post_meta( $postid, 'tppostsliderpr_items', true );
	$tppostsliderpro_autohidemode       = get_post_meta( $postid, 'tppostsliderpro_autohidemode', true );
	$tppostsliderpro_center_mode        = get_post_meta( $postid, 'tppostsliderpro_center_mode', true );
	$tppostsliderpr_itemsdesktop        = get_post_meta( $postid, 'tppostsliderpr_itemsdesktop', true );
	$tppostsliderpr_itemsdesktopsmall   = get_post_meta( $postid, 'tppostsliderpr_itemsdesktopsmall', true );
	$tppostsliderpr_itemsmobile         = get_post_meta( $postid, 'tppostsliderpr_itemsmobile', true) ; 
	$tppostsliderpr_loops               = get_post_meta( $postid, 'tppostsliderpr_loops', true );
	$tppostsliderpr_margin              = get_post_meta( $postid, 'tppostsliderpr_margin', true );
	$tppostsliderpro_autoplay           = get_post_meta( $postid, 'tppostsliderpro_autoplay', true );
	$tppostsliderpro_autoplay_speed     = get_post_meta( $postid, 'tppostsliderpro_autoplay_speed', true );
	$tppostsliderpro_autoplaytimeout    = get_post_meta( $postid, 'tppostsliderpro_autoplaytimeout', true );
	$tppostsliderpr_navigation          = get_post_meta( $postid, 'tppostsliderpr_navigation', true );
	$tppostsliderpr_navigation_position = get_post_meta( $postid, 'tppostsliderpr_navigation_position', true );
	$tppostsliderpr_stophover           = get_post_meta( $postid, 'tppostsliderpr_stophover', true );
	$tppostsliderpr_navtextcolors       = get_post_meta( $postid, 'tppostsliderpr_navtextcolors', true );
	$tppostsliderpr_navtextcolors_hover = get_post_meta( $postid, 'tppostsliderpr_navtextcolors_hover', true );
	$tppostsliderpr_navbgcolors         = get_post_meta( $postid, 'tppostsliderpr_navbgcolors', true );
	$tppostsliderpr_navbghovercolors    = get_post_meta( $postid, 'tppostsliderpr_navbghovercolors', true );
	$tppostsliderpr_nav_type            = get_post_meta( $postid, 'tppostsliderpr_nav_type', true );
	$tppostsliderpr_paginations         = get_post_meta( $postid, 'tppostsliderpr_paginations', true );
	$tppostsliderpr_paginationsposition = get_post_meta( $postid, 'tppostsliderpr_paginationsposition', true );
	$tppostsliderpr_paginations_color   = get_post_meta( $postid, 'tppostsliderpr_paginations_color', true );
	$tppostsliderpr_paginations_bgcolor = get_post_meta( $postid, 'tppostsliderpr_paginations_bgcolor', true );
	$tppostsliderpr_paginations_style   = get_post_meta( $postid, 'tppostsliderpr_paginations_style', true );
	$tppostsliderpro_hide_image         = get_post_meta( $postid, 'tppostsliderpro_hide_image', true );
	$tppostsliderpro_thumb_size         = get_post_meta( $postid, 'tppostsliderpro_thumb_size', true );
	$tppostsliderpro_image_height       = get_post_meta( $postid, 'tppostsliderpro_image_height', true );
		
	# Author Info
	$tppostsliderpro_hideauthors        = get_post_meta( $postid, 'tppostsliderpro_hideauthors', true );
	$tppostsliderpro_author_size        = get_post_meta( $postid, 'tppostsliderpro_author_size', true );
	$tppostsliderpro_author_color       = get_post_meta( $postid, 'tppostsliderpro_author_color', true );
	$tppostsliderpro_authorlink_color   = get_post_meta( $postid, 'tppostsliderpro_authorlink_color', true );
	
	# Excerpt color 
	$excerpt_lenght                     = get_post_meta( $postid, 'excerpt_lenght', true );
	$tppostsliderpro_excerpt_size       = get_post_meta( $postid, 'tppostsliderpro_excerpt_size', true );
	$tppostsliderpro_excerpt_colors     = get_post_meta( $postid, 'tppostsliderpro_excerpt_colors', true );
	$tppostsliderpro_excerpt_bgcolors   = get_post_meta( $postid, 'tppostsliderpro_excerpt_bgcolors', true );
	$btn_readmore                       = get_post_meta( $postid, 'btn_readmore', true );
	$tppostsliderpro_read_btn           = get_post_meta( $postid, 'tppostsliderpro_read_btn', true );
	$tppostsliderpro_read_alignment     = get_post_meta( $postid, 'tppostsliderpro_read_alignment', true );
	
	# Content
	$tppostsliderpro_content_colors     = get_post_meta( $postid, 'tppostsliderpro_content_colors', true );
	$tppostsliderpro_content_alignment  = get_post_meta( $postid, 'tppostsliderpro_content_alignment', true );
	$tppostsliderpro_content_fontsize   = get_post_meta( $postid, 'tppostsliderpro_content_fontsize', true );
	
	# bg color 
	$tppostsliderpro_bg_color           = get_post_meta( $postid, 'tppostsliderpro_bg_color', true );
	$tppostsliderpro_border_size        = get_post_meta( $postid, 'tppostsliderpro_border_size', true );
	$tppostsliderpro_border_colors      = get_post_meta( $postid, 'tppostsliderpro_border_colors', true );
	
	# Date & Time
	$tppostsliderpro_hidedate           = get_post_meta( $postid, 'tppostsliderpro_hidedate', true );
	$tppostsliderpro_date_size          = get_post_meta( $postid, 'tppostsliderpro_date_size', true );
	$tppostsliderpro_date_color         = get_post_meta( $postid, 'tppostsliderpro_date_color', true );
	$tppostsliderpro_date_bg         	= get_post_meta( $postid, 'tppostsliderpro_date_bg', true );
	
	# Comments
	$tppostsliderpro_hidecomments       = get_post_meta( $postid, 'tppostsliderpro_hidecomments', true );
	$tppostsliderpro_comments_size      = get_post_meta( $postid, 'tppostsliderpro_comments_size', true );
	$tppostsliderpro_comments_color     = get_post_meta( $postid, 'tppostsliderpro_comments_color', true );
	
	# Caption color settings
	$tppostsliderpro_titletext_color    = get_post_meta( $postid, 'tppostsliderpro_titletext_color', true );
	$tppostsliderpro_titlehover_color   = get_post_meta( $postid, 'tppostsliderpro_titlehover_color', true );
	$tppostsliderpro_titlefont_size     = get_post_meta( $postid, 'tppostsliderpro_titlefont_size', true );
	$tppostsliderpro_title_alignment    = get_post_meta( $postid, 'tppostsliderpro_title_alignment', true );
	
	# Categories
	$tppostsliderpro_hidecats           = get_post_meta( $postid, 'tppostsliderpro_hidecats', true );
	$tppostsliderpro_catbg_color        = get_post_meta( $postid, 'tppostsliderpro_catbg_color', true );
	$tppostsliderpro_cat_color          = get_post_meta( $postid, 'tppostsliderpro_cat_color', true );
	$tppostsliderpro_cat_hover_color    = get_post_meta( $postid, 'tppostsliderpro_cat_hover_color', true );
	$tppostsliderpro_cathoverbg_color   = get_post_meta( $postid, 'tppostsliderpro_cathoverbg_color', true );


	if( is_array( $tppostsliderpro_postoptions ) ){
		$tpostslider_cats =  array();
		$num = count( $tppostsliderpro_postoptions );
		for ( $j=0; $j<$num; $j++ ) {
			array_push( $tpostslider_cats, $tppostsliderpro_postoptions[$j] );
		}

		$args = array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => $tppostsliderpro_ordercats,
			'order'          => $tppostsliderpro_orders,
		    'tax_query' => [
		        'relation' => 'OR',
		        [
		            'taxonomy' => 'category',
		            'field' => 'id',
		            'terms' => $tpostslider_cats,
		        ],
		        // [
		        //     'taxonomy' => 'category',
		        //     'field' => 'id',
		        //     'operator' => 'NOT EXISTS',
		        // ],
		    ],
		);
	} else {
		$args = array(
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => $tppostsliderpro_ordercats,
			'order'          => $tppostsliderpro_orders,
		);
	}

	$query = new \WP_Query( $args );

	ob_start();
	switch ($tppostsliderpro_styles) {
	    case '1':
	    	include __DIR__ . '/themes/theme-1.php';
	    break;
	    case '2':
	        include __DIR__ . '/themes/theme-2.php';
	    break;
	    case '3':
	        include __DIR__ . '/themes/theme-3.php';
	    break;
	}
	return ob_get_clean();
}
add_shortcode('tppostpro', 'tppostslider_pro_post_query');