<?php 

add_action( 'init', 'fpfbip_post_type' );
add_action('admin_menu', 'fpfbip_custom_menu_pages');

function fpfbip_post_type() {
	$labels = array(
		'name'               => _x( 'Facebook Fan Page', 'add page', 'fpfbip-textdomain' ),
		'singular_name'      => _x( 'Facebook Fan Page', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Facebook Fan Page (Free)', 'admin menu', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New Page', 'Page', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Page', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Facebook Fan Page', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Facebook Fan Page', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Facebook Fan Page', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Facebook Fan Pages', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Facebook Fan Pages', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Facebook Fan Page:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Fan Pages found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Fan Pages found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Add Facebook Fan Pages into posts and pages.' ),
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'fpfbip_facebook_feed' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'menu_icon'			 => 'dashicons-facebook',
		'supports'           => array( 'title', 'custom_fields' )
	);

	register_post_type( 'fpfbip_facebook_feed', $args );
}

function fpfbip_custom_menu_pages() {

add_submenu_page(
    'edit.php?post_type=fpfbip_facebook_feed',
    'Support',
    'Support',
    'manage_options',
    'tfba_form_support',
    'fpfbip_support_page' );

}


function fpfbip_support_page(){
    include_once( 'fpfbip-support-page.php' );
}



add_action('edit_form_after_title', 'fpfbip_settings_page');

function fpfbip_settings_page(){
 $scr = get_current_screen();
    
    if( $scr-> post_type !== 'fpfbip_facebook_feed' )
        return;

    include_once('fpfbip-settings-page.php');


}


add_action('load-post-new.php', 'fpbip_limit_cpt' );

function fpbip_limit_cpt()
{
global $typenow;

if( 'fpfbip_facebook_feed' !== $typenow )
return;

$total = get_posts( array( 
'post_type' => 'fpfbip_facebook_feed', 
'numberposts' => -1, 
'post_status' => 'publish,future,draft' 
));

if( $total && count( $total ) >= 3 )
wp_die(
'<p style="text-align:center;font-weight:bold;">Sorry, Creation of maximum number of Facebook Feeds reached, Please <a href="https://www.arrowplugins.com/facebook-fanpage" target="_blank">Buy Premium Version</a> to create more Facebook Feeds With Awesome Features</p>', 
'Maximum reached',  
array( 
'response' => 500, 
'back_link' => true 
)
);  
}