<?php

add_action( 'init', 'igbap_post_type' );
add_action('admin_menu', 'igbap_custom_menu_pages');

function igbap_post_type() {
    $labels = array(
        'name'               => _x( 'Instagram Gallery', 'post type general name' ),
        'singular_name'      => _x( 'Instagram Gallery', 'post type singular name' ),
        'menu_name'          => _x( 'Instagram Gallery', 'admin menu' ),
        'name_admin_bar'     => _x( 'Instagram Gallery', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'Form' ),
        'add_new_item'       => __( 'Add New Instagram Gallery' ),
        'new_item'           => __( 'New Instagram Gallery' ),
        'edit_item'          => __( 'Edit Instagram Gallery' ),
        'view_item'          => __( 'View Instagram Gallery' ),
        'all_items'          => __( 'All Instagram Galleries' ),
        'search_items'       => __( 'Search Instagram Galleries' ),
        'parent_item_colon'  => __( 'Parent Instagram Galleries:' ),
        'not_found'          => __( 'No Instagram Galleries found.' ),
        'not_found_in_trash' => __( 'No Instagram Galleries found in Trash.' )
        );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Add responsive instagram gallery into your post, page & widgets' ),
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array( 'slug' => 'arrow_instagram_gallery' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 25,
        'menu_icon'		 => 'dashicons-camera',
        'supports'           => array( 'title' , 'custom_fields')
        );

    register_post_type( 'arrow_insta_gallery', $args );
}

function igbap_custom_menu_pages() {

add_submenu_page(
    'edit.php?post_type=arrow_insta_gallery',
    'Support',
    'Support',
    'manage_options',
    'igbap_form_support',
    'igbap_support_page' );

}


function igbap_support_page(){
    include_once( 'igbap-support-page.php' );
}

function igbap_settings_after_title() {

    $scr = get_current_screen();
    
    if( $scr-> post_type !== 'arrow_insta_gallery' )
        return;

    include_once( 'igbap-settings-page.php' );
}

add_action( 'edit_form_after_title', 'igbap_settings_after_title' );
/*function admin_redirects() {
    global $pagenow;

    if($pagenow == 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'arrow_insta_gallery' ){
        if (isset($_GET['access_token'])) {
            
        wp_redirect(admin_url('/edit.php?post_type=arrow_insta_gallery&page=igbap_settings&access_token='.$_GET["access_token"], 'http'));
        exit;
    }
}
}

add_action('admin_init', 'admin_redirects');
*/
/*    if (isset($_GET['access_token'])) {
$url = urlencode(admin_url('edit.php?post_type=arrow_insta_gallery&page=igbap_settings&access_token').$_GET["access_token"]) ;
wp_redirect( $url ); exit;
}
*/

/*add_action('load-post-new.php', 'igbap_limit_cpt' );

function igbap_limit_cpt()
{
global $typenow;

if( 'arrow_insta_gallery' !== $typenow )
return;

$total = get_posts( array( 
'post_type' => 'arrow_insta_gallery', 
'numberposts' => -1, 
'post_status' => 'publish,future,draft' 
));

if( $total && count( $total ) >= 3 )
wp_die(
'<p style="text-align:center;font-weight:bold;">Sorry, Creation of maximum number of Twitter Feeds reached, Please <a href="https://www.arrowplugins.com/twitter-feed" target="_blank">Buy Premium Version</a> to create more Twitter Feeds With Awesome Features</p>', 
'Maximum reached',  
array( 
'response' => 500, 
'back_link' => true 
)
);  
}*/