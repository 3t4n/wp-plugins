<?php 
/* 
Plugin Name: After content 
Description: Add more content after post content: related content, author info, post pagination, social sharing buttons, post meta, image, text
Version:1.5
Author: Genethick 
Author URI: http://www.codetocode-developments.com 
Plugin URI: http://www.codetocode-developments.com/wp-plugins/after-content-plugin-documentation/ 
License: GPLv2 
License URI: http://www.gnu.org/licenses/gpl-2.0.html 
*/
	 
// Script version, used to add version for scripts and styles 
define( 'AFC_VER', '1.5' ); 
// Define plugin URLs, for fast enqueuing scripts and styles 
if ( ! defined( 'AFC_URL' ) ) 
	define( 'AFC_URL', plugin_dir_url( __FILE__ ) ); 
// Plugin paths, for including files 
if ( ! defined( 'AFC_DIR' ) ) 
	define( 'AFC_DIR', plugin_dir_path( __FILE__ ) ); 
	
// Initialize Redux Framework 
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) { 
	require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ); 
} 
if ( !isset( $afc_opt ) && file_exists( dirname( __FILE__ ) . '/inc/plugin-options.php' ) ) { 
	require_once( dirname( __FILE__ ) . '/inc/plugin-options.php' ); 
}	 
if ( file_exists( AFC_DIR . '/inc/post-pagination.php' ) ) { 
	require_once AFC_DIR . 'inc/post-pagination.php'; 
} 
if ( file_exists( AFC_DIR . '/inc/related.php' ) ) { 
	include AFC_DIR . 'inc/related.php'; 
} 
if ( file_exists( AFC_DIR . '/inc/author.php' ) ) { 
	require_once AFC_DIR . 'inc/author.php'; 
} 
if ( file_exists( AFC_DIR . '/inc/social-profiles.php' ) ) { 
	require_once AFC_DIR . 'inc/social-profiles.php'; 
} 
if ( file_exists( AFC_DIR . '/inc/social-sharing.php' ) ) { 
	require_once AFC_DIR . 'inc/social-sharing.php'; 
} 
if ( file_exists( AFC_DIR . '/inc/post-meta.php' ) ) { 
	require_once AFC_DIR . 'inc/post-meta.php'; 
} 
if ( file_exists( AFC_DIR . '/inc/text.php' ) ) { 
	require_once AFC_DIR . 'inc/text.php'; 
} 
if ( file_exists( AFC_DIR . '/inc/img.php' ) ) { 
	require_once AFC_DIR . 'inc/img.php'; 
} 
if ( file_exists( AFC_DIR . '/inc/banner.php' ) ) { 
	require_once AFC_DIR . 'inc/banner.php'; 
} 


//add activated features after post content 
add_filter( 'the_content',  'afc_add_after_post', 2 );  
function afc_add_after_post ($content) { 
	 
	global $afc_opt; 
	 
	if ( $afc_opt['activate_pagination'] == '1' ) { 
		$content .= afc_post_pagination(); 
	}	 
	if ( $afc_opt['activate_related'] == '1' ) { 
		$content .= afc_related_content();	 
	} 
	if ( $afc_opt['activate_author'] == '1' ) { 
		$content .= afc_author_info(); 
	} 
	if ( $afc_opt['activate_social_buttons'] == '1' ) { 
		$content .= afc_social_sharing(); 
	} 
	if ( $afc_opt['activate_post_meta'] == '1' ) { 
		$content .= afc_post_meta(); 
	} 
	if ( $afc_opt['activate_text'] == '1') { 
		$content .= afc_text(); 
	} 
	if ( $afc_opt['activate_img'] == '1' ) { 
		$content .= afc_img(); 
	} 
	if ( $afc_opt['activate_banner'] == '1' ) { 
		$content .= afc_banner(); 
	} 
	return $content; 
} 
/* facebook */ 
function afc_facebook() { 
	wp_register_script( 'facebook',  AFC_URL . 'js/facebook.js' ); 
	wp_enqueue_script( 'facebook' ); 
} 
add_action( 'wp_enqueue_scripts', 'afc_facebook' );
 
/* twitter */ 
function afc_twitter() { 
	wp_register_script( 'twitter',  AFC_URL . 'js/twitter.js' ); 
	wp_enqueue_script( 'twitter' ); 
} 
add_action( 'wp_enqueue_scripts', 'afc_twitter' ); 

/* google plus */ 
function afc_google_plus() { 
	wp_register_script( 'google_plus',  AFC_URL . 'js/google-plus.js' ); 
	wp_enqueue_script( 'google_plus' ); 
} 
add_action( 'wp_enqueue_scripts', 'afc_google_plus' ); 

/* FONT AWESOME ICONS*/ 
function afc_font_awesome () { 
	wp_register_style( 'afc_font_awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css'); 
	wp_enqueue_style( 'afc_font_awesome' ); 
} 
add_action('wp_enqueue_scripts', 'afc_font_awesome'); 

/* THUMBNAILS SUPPORT AND SIZES */ 
if (!current_theme_supports('post-thumbnail')) { 
	add_theme_support( 'post-thumbnails' ); 
} 
add_image_size ('afc-200','200','150',true);
 
//add jquery 
add_action( 'wp_enqueue_scripts', 'afc_add_jquery' ); 
function afc_add_jquery() { 
	wp_enqueue_script( 'jquery' ); 
} 

//add styles 
add_action( 'wp_enqueue_scripts', 'afc_add_style' ); 
function afc_add_style() { 
	wp_register_style( 'after-content-css', AFC_URL . 'after-content.css' ); 
	wp_enqueue_style( 'after-content-css' ); 
} 

//add custom css 
add_action('wp_enqueue_scripts',  'add_afc_css' ); 
function add_afc_css () { 
	global $afc_opt; 
	if( !empty( $afc_opt['custom_css'] ) ) { 
		echo '<style type="text/css">' . $afc_opt['custom_css'] . '</style>'; 
	} 
}	  
?>