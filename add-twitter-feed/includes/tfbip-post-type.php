<?php 

add_action( 'init', 'tfbip_post_type' );
add_action('admin_menu', 'tfbip_custom_menu_pages');


function tfbip_post_type() {
	$labels = array(
		'name'               => _x( 'Twitter Feeds', 'add feeds', 'tfbip-textdomain' ),
		'singular_name'      => _x( 'Twitter Feed', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Twitter Feeds (Free)', 'admin menu', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New Feed', 'feed', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Feed', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Twitter Feed', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Twitter Feed', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Twitter Feed', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Twitter Feeds', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Twitter Feeds', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Twitter Feed:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Feeds found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Feeds found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Add Twitter feeds to your posts and pages.' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'tfbip_twitter_feed' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 25,
		'menu_icon'			 => 'dashicons-twitter',
		'supports'           => array( 'title', 'custom_fields' )
	);

	register_post_type( 'tfbip_twitter_feed', $args );
}

function tfbip_custom_menu_pages() {

add_submenu_page(
    'edit.php?post_type=tfbip_twitter_feed',
    'Support',
    'Support',
    'manage_options',
    'tfba_form_support',
    'tfbip_support_page' );

}


function tfbip_support_page(){
    include_once( 'tfbip-support-page.php' );
}




add_action('edit_form_after_title', 'tfbip_settings_page');

function tfbip_settings_page(){
 $scr = get_current_screen();
    
    if( $scr-> post_type !== 'tfbip_twitter_feed' )
        return;

	include_once('tfbip-settings-page.php');
}


add_action('load-post-new.php', 'tfbip_limit_cpt' );

function tfbip_limit_cpt()
{
global $typenow;

if( 'tfbip_twitter_feed' !== $typenow )
return;

$total = get_posts( array( 
'post_type' => 'tfbip_twitter_feed', 
'numberposts' => -1, 
'post_status' => 'publish,future,draft' 
));

if( $total && count( $total ) >= 3 )
wp_die(
'<p style="text-align:center;font-weight:bold;">Sorry, Creation of maximum number of Twitter Feeds reached, Please <a href="" target="_blank">Buy Premium Version</a> to create more Twitter Feeds With Awesome Features</p>', 
'Maximum reached',  
array( 
'response' => 500, 
'back_link' => true 
)
);  
}