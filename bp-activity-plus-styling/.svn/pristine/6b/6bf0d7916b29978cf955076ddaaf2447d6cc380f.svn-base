<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class BAPSAFrontEndMain
{

	/*
	* Registration of styles and scenarios
	*/
	public function register()
	{

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

	}

		public function enqueue()
		{

			wp_enqueue_style( 'bapsa_font_awesome', BAPSA_PLUGIN_URL . 'assets/font-awesome-4.6.3/css/font-awesome.min.css' );

			wp_enqueue_style( 'bapsa_style', BAPSA_PLUGIN_URL . 'includes/frontend/assets/css/bapsa_style.css', array( 'bapsa_font_awesome', 'thickbox' ), BAPSA_PLUGIN_VERSION, 'all' );

			wp_enqueue_script( 'bapsa_script', BAPSA_PLUGIN_URL . 'includes/frontend/assets/js/bapsa_script.js', array( 'jquery', 'thickbox' ), BAPSA_PLUGIN_VERSION, false );

		}

}

/*
* Initialize
*/
$initialize_class = new BAPSAFrontEndMain();

/*
* Apply scripts and styles
*/
$initialize_class->register();