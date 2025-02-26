<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Wssf_FeedTw {

	function __construct(){

		$this->_init();
		$this->_hooks();
		$this->_filters();

	}

	function _init(){
		

	}

	function _hooks(){
		
		add_action( 'init', array( $this, 'wssf_register_feed_post_type' ) );
		
		add_action( 'admin_enqueue_scripts', array( $this, 'wssf_admin_scripts' ));

		add_action('edit_form_after_title' ,array( $this, 'wssf_custom_UI_without_metabox' ));
	}

	function _filters(){

	}




function wssf_register_feed_post_type() {

	$labels = array(
		'name'                => __( 'Twitter Feeds', 'wssf-feed-cpt' ),
		'singular_name'       => __( 'Twitter Feed', 'wssf-feed-cpt' ),
		'add_new'             => _x( 'Add New Twitter Feed', 'wssf-feed-cpt', 'wssf-feed-cpt' ),
		'add_new_item'        => __( 'Add New Twitter Feed', 'wssf-feed-cpt' ),
		'edit_item'           => __( 'Edit Twitter Feed', 'wssf-feed-cpt' ),
		'new_item'            => __( 'New Twitter Feed', 'wssf-feed-cpt' ),
		'view_item'           => __( 'View Twitter Feed', 'wssf-feed-cpt' ),
		'search_items'        => __( 'Search Twitter Feeds', 'wssf-feed-cpt' ),
		'not_found'           => __( 'No Twitter Feeds found', 'wssf-feed-cpt' ),
		'not_found_in_trash'  => __( 'No Twitter Feeds found in Trash', 'wssf-feed-cpt' ),
		'parent_item_colon'   => __( 'Parent Twitter Feed:', 'wssf-feed-cpt' ),
		'menu_name'           => __( 'Twitter Feeds', 'wssf-feed-cpt' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => false,
		'description'         => 'Add Twitter Feeds',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => null,
		'menu_icon'           => plugins_url( '/images/twitter-menu-icon.png', __FILE__),
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title'
			)
	);

	register_post_type( 'wssf_tw_feed', $args );
}



function wssf_admin_scripts( ) {

	$screen_id = get_current_screen();
	
	if ($screen_id->post_type !== 'wssf_tw_feed') return;

    wp_enqueue_script( 'wp-color-picker'  );
    wp_enqueue_style( 'wp-color-picker' );
  
    wp_enqueue_script( 'wp-color-picker-script', plugins_url('/js/wspcolorpicker.js',__FILE__), array( 'wp-color-picker' ), false, true );
}

function wssf_custom_UI_without_metabox($post){
	global $post;

	$screen_id = get_current_screen();
	
	if ($screen_id->post_type === 'wssf_tw_feed') {
		
		$plugin_dir_wssf = plugin_dir_path(__FILE__);
		
		include ($plugin_dir_wssf.'wssf_add_feed_page.php');
	
	}
	
}


} //class ends