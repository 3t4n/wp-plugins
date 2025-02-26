<?php
/*
Plugin Name: exclusive hover effects
Plugin URI: http://wpcops.com/
Description: exclucsive hover effects have a lot's of effects for image,button and other.you can use this effects anywhere in your website which will look beautiful.You can easily add hover effects using an image & embed them in separate page post or widgets. 
Author: Prince Chowdhury
Author URI: http://demo.wpcops.com/
Version: 2.2.1
*/

//Loading CSS
function exclusive_hover_effects_enqueue_screepts() {
   
	wp_enqueue_script('jquery');
	wp_enqueue_style('extracss', plugins_url( '/css/extra.css' , __FILE__ ) );
	wp_enqueue_style('effcts12pri2010_css', plugins_url( '/css/style3.css' , __FILE__ ) );
	wp_enqueue_style('effcts12pri2010_css1', plugins_url( '/css/style4.css' , __FILE__ ) );
	wp_enqueue_style('effcts12pri2010_css1', plugins_url( '/css/normalizes.css' , __FILE__ ) );
	wp_enqueue_style('maineffcts12_csscommon', plugins_url( '/css/style_common.css' , __FILE__ ) );
	wp_enqueue_style('maineffcts123_csscommon', plugins_url( '/css/font-awesome.min.css' , __FILE__ ) );
	wp_enqueue_script('scrdddipt1effcts12', plugins_url( '/js/jquery.reveal.js' , __FILE__ ) );
	wp_enqueue_script('scrdddipt1effcts12', plugins_url( '/js/js/modernizr-2.8.3.min.js' , __FILE__ ) );
	wp_enqueue_script('scrdddipt1effcts12mainsaasdsad', plugins_url( '/js/hover_pack.js' , __FILE__ ) );

}

add_action( 'wp_enqueue_scripts', 'exclusive_hover_effects_enqueue_screepts' );


function exclusive_hover_effects_enqueue_screeptsjs() {
    

	wp_enqueue_script('scrdddipt1effcts12', plugins_url( '/js/jquery.reveal.js' , __FILE__ ) );
	wp_enqueue_script('scrdddipt1effcts12', plugins_url( '/js/modernizr-2.8.3.min.js' , __FILE__ ) );
	wp_enqueue_script('scrdddipt1effcts12', plugins_url( '/js/jquery-migrate-1.2.1.min.js' , __FILE__ ) );

}

add_action( 'wp_footer', 'exclusive_hover_effects_enqueue_screeptsjs' );




// Loading VafPress Framework
if(!class_exists('VP_osteffectsAutoLoader')){
// Setup Contants
defined( 'VP_EFFECTS_VERSION' ) or define( 'VP_EFFECTS_VERSION', '2.0' );
defined( 'VP_EFFECTS_URL' )     or define( 'VP_EFFECTS_URL', plugin_dir_url( __FILE__ ) );
defined( 'VP_EFFECTS_DIR' )     or define( 'VP_EFFECTS_DIR', plugin_dir_path( __FILE__ ) );
defined( 'VP_EFFECTS_FILE' )    or define( 'VP_EFFECTS_FILE', __FILE__ );

// Lood Bootstrap
require 'framework/bootstrap.php';

}


// add Google Web font
$font_face = vp_option('logo_font_face');
$font_weight = vp_option('vp_get_gwf_weight');
$font_style = vp_option('logo_font_style');
VP_Site_GoogleWebFont::instance()->add($font_face, $font_weight, $font_style);
// embed font function
function mytheme_embed_fonts()
{
// you can directly enqueue and register
VP_Site_GoogleWebFont::instance()->register_and_enqueue();
// or register and get the handler to be used as dependency
VP_Site_GoogleWebFont::instance()->register();
wp_register_style('mystyle', 'path_to_style.css', VP_Site_GoogleWebFont::instance()->get_names());
wp_enqueue_style('mystyle');
}
add_action('wp_enqueue_scripts', 'mytheme_embed_fonts');



// Registering Custom Post
add_action( 'init', 'effects_custom_post_type' );
function effects_custom_post_type() {
	register_post_type( 'exclusiveffects',
		array(
			'labels' => array(
				'name' => __( 'exeffects' ),
				'singular_name' => __( 'exeffects' ),
				'add_new_item' => __( 'Add New exeffects' )
			),
			'public' => true,
			'supports' => array('title'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'exeffects'),
			'menu_icon' => 'dashicons-format-image',
			'menu_position' => 20,
		)
	);
	
}

// Registering Custom post's category
add_action( 'init', 'effects_custom_post_type_taxonomy'); 
function effects_custom_post_type_taxonomy() {
	register_taxonomy(
		'exclusiveffects_cat',  
		'exclusiveffects',
		array(
			'hierarchical'          => true,
			'label'                         => 'exeffects Category',
			'query_var'             => true,
			'show_admin_column'             => true,
			'rewrite'                       => array(
				'slug'                  => 'he-category',
				'with_front'    => true
				)
			)
	);
}


require 'effects-pro-admin/icon.php';

// Loading Metaboxes 

new VP_Metabox(array
(
			'id'          => 'infosmeta',
			'types'       => array('exclusiveffects'),
			'title'       => __('Hover Image, Title, Description ', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_EFFECTS_DIR . '/effects-pro-admin/metabox/main.php'
));
new VP_Metabox(array
(
			'id'          => 'effectsmeta',
			'types'       => array('exclusiveffects'),
			'title'       => __('Hover Effects Setting', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_EFFECTS_DIR . '/effects-pro-admin/metabox/settipspages.php'
));


// Load Metaboxes 
/*
new VP_Metabox(array
(
			'id'          => 'effects-infos',
			'types'       => array('exclusiveffects'),
			'title'       => __('Effects Information ', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_EFFECTS_DIR . '/effects-pro-admin/metabox/main.php'
));


new VP_Metabox(array
(
			'id'          => 'effectssetting-infos',
			'types'       => array('exclusiveffects'),
			'title'       => __('Responsive Hover Effects Setting', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_EFFECTS_DIR . '/effects-pro-admin/metabox/settipspages.php'
));

*/

//Loading Shortcode
require_once(VP_EFFECTS_DIR . 'effects-pro-admin/shortcode.php');


//Shortcode Generator 
    function acb_init_shortcodegenerator()
    {
    // Built path to shortcode generator template array file
    //$sg_path = VP_TEAM_DIR() . '/admin/shortcode.php';
    // Initialize the ShortcodeGenerator's object
    $tmpl_sg = array(
    'name' => 'sg_1',
    'template' => VP_EFFECTS_DIR . '/effects-pro-admin/shortcode_generator.php',
    'modal_title' => __( 'ex effects Shortcode', 'vp_textdomain'),
    'button_title' => __( 'ex effects Shortcode', 'vp_textdomain'),
    'types' => array( 'post', 'page' ),
    'main_image' => VP_EFFECTS_URL . '/img/coupon.png',
    'sprite_image' => VP_EFFECTS_URL . '/img/coupon.png',
    //'included_pages' => array( 'appearance_page_vpt_option' ),
    );
    
	$sg = new VP_ShortcodeGenerator($tmpl_sg);
    
	}
	
    // the safest hook to use, since Vafpress Framework may exists in Theme or Plugin
    add_action( 'after_setup_theme', 'acb_init_shortcodegenerator' )


?>