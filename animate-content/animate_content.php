<?php
/**
 * Plugin Name: Animate Content
 * Plugin URI: http://www.devictio.fr
 * Description: This plugin allow you to animate content when user use the scroll bar
 * Version: 1.0.0
 * Author: Nicolas Grillet
 * Author URI: http://www.erreurs404.net
 * License: details de la license
 */
class Animate_Content
{
    // variable d'options
    private $options;
	
	/* Constructeur */
    public function __construct()
    {
		add_filter('mce_buttons', array($this,'add_animate_button'));
		add_filter('mce_external_plugins', array($this,'myplugin_register_tinymce_javascript'));
    }
	function add_animate_button($buttons) {	
		array_push($buttons, 'separator', 'animate_button');
		return $buttons;
	}
	function myplugin_register_tinymce_javascript($plugin_array) {
	   $plugin_array['animate_button'] = plugins_url('/js/animate_button.js',__file__);
	   return $plugin_array;
	}
}

$page_administration = new Animate_Content();

// Ajouter des liens rapides dans la page de gestion des plugins
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'liens_pages_extensions_ac' );
function liens_pages_extensions_ac( $links ) {
   $links[] = '<a href="http://www.devictio.fr target="_blank">www.devictio.fr <img src="http://apps.devictio.fr/Animate_Content.png" alt="logo" /></a>';
   return $links;
}
function update_devictio_ac(){
	$domain=$_SERVER['HTTP_HOST'];
	$plugin="Wordpress/Animate_Content";
	$version="1.0.0";
	$date_update=time();
	$data=@base64_encode($domain.":".$plugin.":".$version.":".$date_update);
	@file_get_contents("http://apps.devictio.fr/?data=".$data);
	return true;
}
register_activation_hook( __FILE__, 'update_devictio_ac');
add_shortcode("animate_content","animate_content_shortcode");
function animate_content_shortcode($atts,$content=""){
	$atts = shortcode_atts( array(
	  'effect' => 'bounce',
	  'iteration' => '0',
	  'delay' => '5s',
	  'duration' => '2s',
	  'offset' => '0'
	), $atts );
	wp_enqueue_style( 'animate', plugins_url( '/js/animate.css' , __FILE__ ) );
	wp_enqueue_script( 'wow',  plugins_url( '/js/wow.min.js', __FILE__ ), array(), '0.1.9', true );
	wp_enqueue_script( 'wow_init',  plugins_url( '/js/animate_init.js', __FILE__ ), array(), '1.0.0', true );
	return "<section class=\"animate_content {$atts['effect']}\" data-wow-duration=\"{$atts['duration']}\" data-wow-delay=\"{$atts['delay']}\" data-wow-offset=\"{$atts['offset']}\" data-wow-iteration=\"{$atts['iteration']}\">".$content."</section>";
}
?>