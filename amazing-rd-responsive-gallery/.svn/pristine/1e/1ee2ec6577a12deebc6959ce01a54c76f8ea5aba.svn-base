<?php
/*
Plugin Name: Amazing RD Responsive Gallery
Plugin URI: https://wordpress.org/plugins/amazing-rd-responsive-gallery/
Description: Amazing RD Gallery is an impressive, lightweight, responsive Image Gird Gallery plugin For your Wordpress site. Fully responsive, Great LightBox Effects, Great animation and different hover effects for Gallery Item and much more...
Author: codecans
Author URI: http://codecans.com/
Version: 2.0.0
*/
//Loading CSS
function rd_img_gallery_css() {
	wp_enqueue_style('imgrid', plugins_url( '/css/imgrid.css' , __FILE__ ) );
	wp_enqueue_style('hover', plugins_url( '/css/hover.css' , __FILE__ ) );
	
	wp_enqueue_script ('jquery');
	wp_enqueue_script('imagesloaded', plugins_url( '/js/imagesloaded.pkgd.js' , __FILE__ ) );
	wp_enqueue_script('velocity', plugins_url( '/js/velocity.min.js' , __FILE__ ) );
	wp_enqueue_script('imgrid_jss', plugins_url( '/js/imgrid.js' , __FILE__ ) );
	wp_enqueue_script('velocity_jsss', plugins_url( '/js/velocity.ui.min.js' , __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'rd_img_gallery_css' );

// added widgets
add_filter('widget_text', 'do_shortcode');

// Added Admin Font Awesome
function amaz_gallery_admin_enqueue_add_init() {
    if ( is_admin() ) {
		wp_enqueue_style( 'amaz_gallery_master_font_fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', __FILE__ );
    }
}
add_action( 'admin_enqueue_scripts', 'amaz_gallery_admin_enqueue_add_init' );

// VAF Framework Loading
if(!class_exists('VP_rdGalleryAutoLoader')){
defined( 'VP_RDGALLERY_VERSION' ) or define( 'VP_RDGALLERY_VERSION', '2.0' );
defined( 'VP_RDGALLERY_URL' )     or define( 'VP_RDGALLERY_URL', plugin_dir_url( __FILE__ ) );
defined( 'VP_RDGALLERY_DIR' )     or define( 'VP_RDGALLERY_DIR', plugin_dir_path( __FILE__ ) );
defined( 'VP_RDGALLERY_FILE' )    or define( 'VP_RDGALLERY_FILE', __FILE__ );

// Lood Bootstrap framework
require 'lib/bootstrap.php';
}

// Register Custom Post
function rd_gallery_cpost(){
	register_post_type('rdgallery', array(
	'labels' => array(
			'name' => __( 'RD Gallery' ),
			'singular_name' => __( 'Amazing RD Gallery' ),
			'add_new_item' => __( 'Add New Item' )
	),
	'public' => true,
	'supports' => array('title'),
	'has_archive' => true,
	'rewrite' => array('slug' => 'rd-gallery'),
	'menu_icon' => '',
	'menu_position' => 20,
	));
}
add_action('init','rd_gallery_cpost');

// Register Custom Texonomy 
function rdgallery_custom_post_tex() {
	register_taxonomy(
		'rdgallery_cat',  
		'rdgallery',
		array(
			'hierarchical'          => true,
			'label'                         => 'RD Gallery Category',
			'query_var'             => true,
			'show_admin_column'             => true,
			'rewrite'                       => array(
				'slug'                  => 'she-category',
				'with_front'    => true
				)
			)
	);
}
add_action( 'init', 'rdgallery_custom_post_tex'); 

// Load Option Framework Main Metaboxes 
new VP_Metabox(array
(
	'id'          => 'rdgallery-meta',
	'types'       => array('rdgallery'),
	'title'       => __('Amazing RD Gallery ', 'vp_textdomain'),
	'priority'    => 'high',
	'template' => VP_RDGALLERY_DIR . '/admin/metabox/custom-rd-meta.php'
));

//Include Custom Data Sources
require_once 'admin/metabox/pick_data_eff.php';

// Load Option Framework Right Side Metaboxes 
new VP_Metabox(array
(
	'id'          => 'rdgallery-side-meta',
	'types'       => array('rdgallery'),
	'title'       => __('RD Gallery Shortcode Here', 'vp_textdomain'),
	'priority'    => 'high',
	'context'     => 'side',
	'template' => VP_RDGALLERY_DIR . '/admin/metabox/rightside.php'
));

// custom post icon
require_once 'admin/metabox/customicon.php';

// all style shortcodes
require_once(VP_RDGALLERY_DIR . 'admin/rdgallery_shortcode.php');
?>