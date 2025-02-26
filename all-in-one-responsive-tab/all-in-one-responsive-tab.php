<?php
/*
Plugin Name: All In One Responsive TAB
Plugin URI: http://codecans.com/
Description: All In One Responsive TAB is a clean, responsive solution for creating beautiful tabbed navigation In your Wordpress Site. It has different layouts, auto-height, responsive design, Unlimited schemes, lots of customization options and can be easily integrated to any design.
Author: codecans
Author URI: http://codecans.com/
Version: 1.7.1
*/
//Loading CSS
function aio_restab_style() {
	wp_enqueue_style('aio-tabs', plugins_url( '/css/aio-tabs.css' , __FILE__ ) );
	wp_enqueue_style( 'font_awesome_called', esc_url_raw( 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' ), array(), null );
}
add_action( 'wp_enqueue_scripts', 'aio_restab_style' );

// Added Admin Font Awesome
function aio_responsivetab_admin_enqueue_add_init() {
    if ( is_admin() ) {
		wp_enqueue_style( 'aio_responsivetab_master_font_fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', __FILE__ );
    }
}
add_action( 'admin_enqueue_scripts', 'aio_responsivetab_admin_enqueue_add_init' );


// added widgets filters
add_filter('widget_text', 'do_shortcode');

// VAF Framework Loading
if(!class_exists('VP_aiotabAutoLoader')){
defined( 'VP_AIOTAB_VERSION' ) or define( 'VP_AIOTAB_VERSION', '2.0' );
defined( 'VP_AIOTAB_URL' )     or define( 'VP_AIOTAB_URL', plugin_dir_url( __FILE__ ) );
defined( 'VP_AIOTAB_DIR' )     or define( 'VP_AIOTAB_DIR', plugin_dir_path( __FILE__ ) );
defined( 'VP_AIOTAB_FILE' )    or define( 'VP_AIOTAB_FILE', __FILE__ );

// Looding Bootstrap framework
require 'lib/bootstrap.php';

//Include Custom Data Sources
require_once 'admin/metabox/pick_data_eff.php';
}
// Register Custom Post
function aio_restab_custom_post(){
	register_post_type('aio_tab', array(
	'labels' => array(
	'name' => __( 'Aio Res Tab' ),
	'singular_name' => __( 'Aio Res TABS' ),
	'add_new_item' => __( 'Add New TAB' )
	),
	'public' => true,
	'supports' => array('title'),
	'has_archive' => true,
	'rewrite' => array('slug' => 'aio_tab'),
	'menu_icon' => '',
	'menu_position' => 20,
	));
}
add_action('init','aio_restab_custom_post');

// Register Custom Texonomy 
function aio_responsive_tab_texonomi() {
	register_taxonomy(
		'aiotab_cat',  
		'aio_tab',
		array(
			'hierarchical'          => true,
			'label'                         => 'AIO Category',
			'query_var'             => true,
			'show_admin_column'             => true,
			'rewrite'                       => array(
				'slug'                  => 'aio-category',
				'with_front'    => true
				)
			)
	);
}
add_action( 'init', 'aio_responsive_tab_texonomi'); 

// custom post icon
require_once 'admin/metabox/customicon.php';

// Loading Option Framework Main Metaboxes 
new VP_Metabox(array
(
			'id'          => 'aio-meta',
			'types'       => array('aio_tab'),
			'title'       => __('All In One Responsive TAB', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_AIOTAB_DIR . '/admin/metabox/custom-meta.php'
));

// Loading Option Framework Right Side Metaboxes 
new VP_Metabox(array
(
			'id'          => 'aioside-meta',
			'types'       => array('aio_tab'),
			'title'       => __('AIO Shortcode Here', 'vp_textdomain'),
			'priority'    => 'high',
			'context'     => 'side',
			'template' => VP_AIOTAB_DIR . '/admin/metabox/rightside.php'
));

// all style shortcodes
require_once(VP_AIOTAB_DIR . 'admin/css3-shortcode.php');
?>