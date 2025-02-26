<?php

/**
 * @package  Arplay
 */

namespace IncArplay\Base;

class Enqueue extends BaseController
{

	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
	}
	
	function enqueue() {
		// enqueue all scripts
		wp_enqueue_script('media-upload');
		wp_enqueue_media();
        wp_enqueue_style( 'arplaystyle', $this->plugin_url . 'assets/css/arplaystyle.css' );
		wp_enqueue_script( 'arplayscript', $this->plugin_url . 'assets/js/arplayscript.js' );
	}

}