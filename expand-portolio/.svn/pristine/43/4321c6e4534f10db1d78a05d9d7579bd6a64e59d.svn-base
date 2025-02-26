<?php
/*
Plugin Name: Expand Portfolio
Plugin URI: http://www.h2cweb.net/wordpress-expand-portfolio-plugin
Description: Expand Portfolio plugin for wordpress.
Author: Md. Liton Arefin
Author URI: http://www.h2cweb.net
Version: 1.0

 * FancyBox is Copyright (c) 2008 - 2010 Janis Skarnelis
 * *Creative Commons 2.5
 * http://creativecommons.org/licenses/by/2.5/
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html

*/
define('h2cweb_DIR', dirname(plugin_basename(__FILE__)));
define('h2cweb_URL', plugins_url('',__FILE__));
$exp = get_option('h2cweb_settings');

register_activation_hook(__FILE__, 'h2cweb_activate');
function h2cweb_activate() {
	$table = 'ep_comment';
	$sql = "CREATE TABLE `".$table."` (
	`ID` BIGINT NOT NULL AUTO_INCREMENT ,
	`post_id` BIGINT NOT NULL ,
	`author` TEXT NOT NULL ,
	`email` TEXT NOT NULL ,
	`url` TEXT NOT NULL ,
	`content` LONGTEXT NOT NULL ,
	PRIMARY KEY ( `ID` )
	) ENGINE = MYISAM ;";
	createTable($table, $sql);
}
function createTable($theTable, $sql){
    global $wpdb;
    if($wpdb->get_var("show tables like '". $theTable . "'") != $theTable) {
        $wpdb->query($sql);
    }
}
add_action( 'init' , 'h2cweb_init' );
function h2cweb_init() {
	load_plugin_textdomain( 'h2cweb', false, dirname(plugin_basename(__FILE__ ))."/languages" );
}

add_action('admin_head', 'h2cweb_admin_head');
function h2cweb_admin_head() {?>
	<script>
	function emtc(md) {
		var xd = md-1;
		jQuery('#emtb'+xd).hide();
		jQuery('#emtc'+md).show();
	}
	</script>
<?php
}
add_action( 'init', 'create_post_types_all' );
function create_post_types_all() {
	register_post_type('porftfolio',
		array(
			'labels' => array(
				'name' => __('Expand Portfolio', 'h2cweb'),
				'singular_name' => __('Portfolio', 'h2cweb'),
				'add_new' => __( 'Add New', 'h2cweb' ),
                'add_new_item' => __( 'Add New Portfolio', 'h2cweb' ),
				'edit_item' => __( 'Edit Portfolio', 'h2cweb' ),
				'new_item' => __( 'New Portfolio', 'h2cweb' ),
				'view_item' => __( 'View Portfolio', 'h2cweb' ),
				'all_items' => __( 'All Portfolios', 'h2cweb' ),
			),
			'public' => true,
			'supports' => array('title', 'editor', 'thumbnail'),
			'taxonomies' => array('porftfolio_category'),
			'menu_icon' =>plugins_url( 'images/16.png', __FILE__ ),
		)
	);
	$argsc = array('label' => 'Categories', 'hierarchical' => true);
	//$argst = array('label' => 'Tags', 'hierarchical' => false);
	register_taxonomy('porftfolio_category', 'porftfolio', $argsc);
	//register_taxonomy('porftfolio_tag', 'porftfolio', $argst);

}

add_action('wp_enqueue_scripts', 'h2cweb_scripts_method');
function h2cweb_scripts_method() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-form');
	wp_enqueue_script('h2cweb-ajax', h2cweb_URL . '/js/ajax.js');
	wp_enqueue_script('h2cweb-slide', h2cweb_URL . '/js/powerSlide.js');
	
	//Expand Portfolio Plugin CSS
	wp_enqueue_style( 'ps-css', h2cweb_URL . '/css/powerSlide.css');
	wp_enqueue_style( 'ps-theme', h2cweb_URL . '/css/powerSlide_theme.css');
	wp_enqueue_style( 'h2cweb-style', h2cweb_URL . '/style.css');
	wp_enqueue_style( 'h2cweb-cstyle', h2cweb_URL . '/style.php');

	
	//FacnyBox CSS
	wp_enqueue_style( 'fancy-css', h2cweb_URL . '/css/jquery.fancybox.css');
	wp_enqueue_style( 'fancy-button', h2cweb_URL . '/css/jquery.fancybox-buttons.css');
	

	//Fancybox Scripts
	wp_enqueue_script( 'jquery-min', h2cweb_URL . '/js/jquery-1.9.0.min.js');
	wp_enqueue_script( 'fancybox-js', h2cweb_URL . '/js/fancy-js.js');
	wp_enqueue_script( 'fancybox-mouse', h2cweb_URL . '/js/jquery.mousewheel-3.0.6.pack.js');
	wp_enqueue_script( 'fancybox-fancy', h2cweb_URL . '/js/jquery.fancybox.js');
	wp_enqueue_script( 'fancybox-fancy', h2cweb_URL . '/js/jquery.fancybox.pack.js');
	wp_enqueue_script( 'fancybox-btns', h2cweb_URL . '/js/jquery.fancybox-buttons.js');
	wp_enqueue_script( 'fancybox-media', h2cweb_URL . '/js/jquery.fancybox-media.js');
	
	
	
		
}
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	add_image_size( 'ep-thumb', $exp['poster']['width'], $exp['poster']['height'], true );
	add_image_size( 'ep-slide', $exp['slide']['width'], $exp['slide']['height'], true );
	add_image_size( 'ep-link', 450, 150, true );
}
add_action('wp_head', 'h2cweb_wp_head');
function h2cweb_wp_head() {
	global $exp;
		echo '<style>.powerSlide .wrapper {width:'.$exp['slide']['width'].'px;height:'.$exp['slide']['height'].'px;}</style>';
		echo "<script>function getLsrc(){return '".h2cweb_URL."/images/loadingAnimation.gif';}</script>";
		
		require_once(dirname(__FILE__) . '/style.php' );
}
add_action('wp_footer', 'h2cweb_wp_footer');
function h2cweb_wp_footer() {
	global $exp;
		echo '<div id="slider-wrap">';
		echo '<form action="'.h2cweb_URL.'/ajaxslider.php" id="slider-form" method="post"><input type="hidden" name="spid" value="" id="spid"></form>';
		echo '</div>';
		echo '<div id="slider"><img src="'.h2cweb_URL.'/images/loadingAnimation.gif"></div>';
}

function get_epcomments($id) {
	global $wpdb;
	$sql = "SELECT * FROM `ep_comment` WHERE `post_id`='$id' ORDER BY `ID` ASC;";
	$epcs = $wpdb->get_results($sql);
	return $epcs;
}
	require_once(dirname(__FILE__) . '/content.php' );
if (is_admin()) {
	require_once(dirname(__FILE__) . '/page.php' );
	require_once(dirname(__FILE__) . '/meta.php' );
}
?>