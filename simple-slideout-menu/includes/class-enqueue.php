<?php 
namespace simsm;

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists('simsm\Enqueue')){

	class Enqueue {


		function __construct(){


			add_action( 'wp_enqueue_scripts', array( $this, 'frontend_assets' ) );

		}


		function frontend_assets(){

			wp_enqueue_style( 'dashicons' );

			wp_enqueue_style( 'simple-slideout-menu_styles', SIMSM_URL.'assets/css/simple.slideout-menu.min.css' );

			wp_enqueue_script( 'jquery' );

			wp_enqueue_script( 'simple-slideout-menu_scripts', SIMSM_URL.'assets/js/simple-slideout-menu.min.js', array( 'jquery' ),'1.0',true );

		}

	}

}