<?php

/*
-----------------------------------------------------------------------------------
The Video custom post type
-----------------------------------------------------------------------------------
*/

add_action( 'init', 'awetube_video_register' );
function awetube_video_register() {

	$labels = array(
		'name'               => _x( 'Video', 'Post Type General Name', 'awetube' ),
		'singular_name'      => _x( 'Video', 'Post Type Singular Name', 'awetube' ),
		'menu_name'          => esc_html__( 'Video', 'awetube' ),
		'parent_item_colon'  => esc_html__( 'Parent Video:', 'awetube' ),
		'all_items'          => esc_html__( 'All Video', 'awetube' ),
		'view_item'          => esc_html__( 'View Video', 'awetube' ),
		'add_new_item'       => esc_html__( 'Add New Video', 'awetube' ),
		'add_new'            => esc_html__( 'Add New', 'awetube' ),
		'edit_item'          => esc_html__( 'Edit Video', 'awetube' ),
		'update_item'        => esc_html__( 'Update Video', 'awetube' ),
		'search_items'       => esc_html__( 'Search Video', 'awetube' ),
		'not_found'          => esc_html__( 'Not found', 'awetube' ),
		'not_found_in_trash' => esc_html__( 'Not found in Trash', 'awetube' ),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'query_var'           => 'video',
		'capability_type'     => 'post',
		'menu_icon'           => 'dashicons-video-alt',
		'hierarchical'        => false,
		'rewrite'             => array( 'slug' => 'awetube-video' ),
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'author' ),
		'menu_position'       => 7,
		'exclude_from_search' => false,
		'map_meta_cap'        => true,
	);

	register_post_type( 'awetube-video', $args );
	
	register_taxonomy(
		'video-category',
		array( 'awetube-video' ),
		array(
			'hierarchical'   => true,
			'label'          => 'Video Categories',
			'singular_label' => 'Video Categories',
			'supports'       => array( 'thumbnail' ),
			'rewrite'        => true,
		)
	);

	register_taxonomy_for_object_type( 'video-category', 'awetube-video' );

	register_taxonomy(
		'video-tags',
		array( 'awetube-video' ),
		array(
			'hierarchical'   => true,
			'label'          => 'Video Tags',
			'singular_label' => 'Video Tags',
			'rewrite'        => true,
		)
	);

	register_taxonomy_for_object_type( 'video-tags', 'awetube-video' );

}

add_filter('single_template', 'awetube_single_video_template');
function awetube_single_video_template($single) {
    global $post;
    $single_style = carbon_get_theme_option( 'awetube_style_single' );
    // video
    if ( $post->post_type == 'awetube-video' ) {
		if( class_exists('Awetube_Pro') ) {
			if ( 'style1' === $single_style) {
				if ( file_exists( AWETUBE_PLUGIN_DIR . '/public/post-template/single-awetube-video-style.php' ) ) {
					return AWETUBE_PLUGIN_DIR . '/public/post-template/single-awetube-video-style.php';
				}
			} elseif ('style2' === $single_style) {
				if ( file_exists( AWETUBE_PRO_PLUGIN_DIR . '/post-templates/single-awetube-video-style2.php' ) ) {
					return AWETUBE_PRO_PLUGIN_DIR . '/post-templates/single-awetube-video-style2.php';
				}
			} elseif ('style3' === $single_style) {
				if ( file_exists( AWETUBE_PRO_PLUGIN_DIR . '/post-templates/single-awetube-video-style3.php' ) ) {
					return AWETUBE_PRO_PLUGIN_DIR . '/post-templates/single-awetube-video-style3.php';
				}
			} else {
				if ( file_exists( AWETUBE_PLUGIN_DIR . '/public/post-template/single-awetube-video-style.php' ) ) {
					return AWETUBE_PLUGIN_DIR . '/public/post-template/single-awetube-video-style.php';
				}
			}
		} else {
			if ( file_exists( AWETUBE_PLUGIN_DIR . '/public/post-template/single-awetube-video-style.php' ) ) {
				return AWETUBE_PLUGIN_DIR . '/public/post-template/single-awetube-video-style.php';
			}
		}
        
    }
}

function awetube_get_user_role($id) {
	$user = new WP_User($id);
	return array_shift($user->roles);
}

function awetube_pagination($pages = '', $range = 2)
{  
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}

	if(1 != $pages)
	{
		echo '<div class="navigation-paging home-page-nav pagination-num clearfix">';
			echo '<div class="container">';
				echo '<div class="row">';
				if( $paged < 2 ) {
					$class_dis = "disabled";
				}
				else {
					$class_dis = "enabled";
				}

				if( $paged >= $pages ) {
					$class_das = "disabled";
				}
				else {
					$class_das = "enabled";
				}
				echo '<a class="' . esc_attr( $class_dis ) . '" href="' . esc_url( get_pagenum_link( 1 ) ) . '">&lsaquo;&lsaquo;</a>';
				echo '<a class="' . esc_attr( $class_dis ) . '" href="' . esc_url( get_pagenum_link( $paged - 1 ) ) . '">&lsaquo;</a>';

				for ($i=1; $i <= $pages; $i++)
				{
					if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
					{
						echo (esc_html($paged) == esc_html($i))? "<span class='btn current'>" . esc_html( $i ) . "</span>":"";
					}
				}

				echo '<span class="index-of-page">' . esc_html__( ' of ', 'blutube' ) . ' ' . esc_html( $pages ) . '</span>';

				echo '<a class="' . esc_attr( $class_das ) . '" href="' . esc_url( get_pagenum_link($paged + 1) ) . '">&rsaquo;</a>';
				echo '<a class="' . esc_attr( $class_das ) . '" href="' . esc_url( get_pagenum_link($pages) ) . '">&rsaquo;&rsaquo;</a>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
}

function awetube_video_taxonomy_rewrite_fix($wp_rewrite) {
	$r = array();
	foreach($wp_rewrite->rules as $k=>$v){
		$r[$k] = str_replace('video-category=$matches[1]&paged=','video-category=$matches[1]&page=',$v);
	}
	$wp_rewrite->rules = $r;
}
add_filter('generate_rewrite_rules', 'awetube_video_taxonomy_rewrite_fix');
