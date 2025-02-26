<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Instagram Feed  Shortcode
 *
 * @access    public
 * @since     3.0
 *
 * @return    Create Fontend  Output
 */
add_shortcode('IFG', 'wp_instagram_feed_shortcode');
function wp_instagram_feed_shortcode($atts) {
	ob_start();
	
	//js
	wp_enqueue_script('jquery');
	
	// awp custom bootstrap css
	wp_enqueue_style('ifgp-bootstrap-css', IFGP_PLUGIN_URL . 'css/ifgp-bootstrap-frontend.css' );
	wp_enqueue_style('ifgp-alw-style-css', IFGP_PLUGIN_URL . 'css/alw-style.css' );
	wp_enqueue_style('ifgp-shortcode-css', IFGP_PLUGIN_URL . 'css/ifgp-shortcode.css' );
	wp_enqueue_style('ifgp-main-css', IFGP_PLUGIN_URL . 'css/main.css' );
	
	//Access Token
	if(isset($atts['instagram_acces_token'])) $instagram_acces_token = $atts['instagram_acces_token']; else $instagram_acces_token = "";
	if(isset($atts['insta_image_limit'])) $insta_image_limit = $atts['insta_image_limit']; else $insta_image_limit = "";
	if($insta_image_limit > 50) $insta_image_limit = 50;

	$instagram_data_decode = wp_remote_get("https://graph.instagram.com/me/media?fields=id,media_type,permalink,thumbnail_url,timestamp,media_url,caption,username,children{media_url}&access_token=$instagram_acces_token&limit=$insta_image_limit");
	$instagram_response = $instagram_data_decode['response']['code'];
	$instagram_data = json_decode($instagram_data_decode['body'], true);
	
	//Gallery
	if(isset($atts['insta_layout'])) $insta_layout = $atts['insta_layout']; else $insta_layout = "insta_layout_grid";
	if(isset($atts['insta_grid_row_l'])) $insta_grid_row_l = $atts['insta_grid_row_l']; else $insta_grid_row_l = "";
	if(isset($atts['insta_grid_columns_l'])) $insta_grid_columns_l = $atts['insta_grid_columns_l']; else $insta_grid_columns_l = "";
	if(isset($atts['insta_icon_image'])) $insta_icon_image = $atts['insta_icon_image']; else $insta_icon_image = "";
	if(isset($atts['insta_image_spacing'])) $insta_image_spacing = $atts['insta_image_spacing']; else $insta_image_spacing = "";
	if($insta_image_spacing > 20) $insta_image_spacing = 20;
	if(isset($atts['insta_caption_image'])) $insta_caption_image = $atts['insta_caption_image']; else $insta_caption_image = "";
	if(isset($atts['insta_link_redirection'])) $insta_link_redirection = $atts['insta_link_redirection']; else $insta_link_redirection = "";
	if(isset($atts['insta_lightbox'])) $insta_lightbox = $atts['insta_lightbox']; else $insta_lightbox = "";
	if(isset($atts['insta_lightbox_color'])) $insta_lightbox_color = $atts['insta_lightbox_color']; else $insta_lightbox_color = "";
	
	if($insta_layout == 'insta_layout_grid') {
		require('layout/instagram-grid-layout-shortcode.php');
	}
	
	//Include code file
	return ob_get_clean();
}
?>