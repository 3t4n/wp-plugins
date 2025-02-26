<?php
/**
 * @package AgendaPanda
 */
/*
Plugin Name: Agenda Panda
Plugin URI: https://agendapanda.com/
Version: 1.0.1
Author: Agenda Panda
Author URI: https://agendapanda.com/
Description: Official WP plugin to provide integration with Agenda Panda. It allows you to integrate agenda, schedules for events, classes and workshops etc.
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/



class Agendapanda
{
	protected $apiUrl = "https://www.agendapanda.com/app/embed/wordpress/";
	
	public function __construct()
	{
		add_shortcode( "ap_preview", array($this, "shortcode"));
		add_action( 'wp_enqueue_scripts', array('Agendapanda','ap_scripts'));
	}
	public function ap_scripts() {
		//wp_enqueue_style( 'bootstrap',  plugin_dir_url( __FILE__ ) . 'css/bootstrap.css' );
	    wp_enqueue_style( 'jwidget',  plugin_dir_url( __FILE__ ) . 'css/jwidget.css' );
	    wp_enqueue_style( 'ap-preview',  plugin_dir_url( __FILE__ ) . 'css/preview-iso.css' );
	    wp_enqueue_script( 'jquery',  plugin_dir_url( __FILE__ ) . 'js/jquery.min.js' );
		wp_enqueue_script( 'bootstrap',  plugin_dir_url( __FILE__ ) . 'js/bootstrap.js' );
		wp_enqueue_script( 'jwidget',  plugin_dir_url( __FILE__ ) . 'js/jwidget.js' );
	}

	public function shortcode($atts)
	{
		/*extract(shortcode_atts(array(
			'colortheme' => 'yellowtheme'
	    ), $atts));
	    */
	    extract(shortcode_atts(array(
			'colortheme' => 'yellowtheme',
			'agenda_id' => 0
	    ), $atts, 'ap_preview'));

		$data = wp_remote_get($this->apiUrl.$agenda_id."/".$colortheme);		
		return $data['body'];
	}
	
}

$agendapanda = new Agendapanda();