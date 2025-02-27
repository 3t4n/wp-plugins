<?php

/*
Plugin Name: SuevaFree Essential Kit
Plugin URI: https://www.themeinprogress.com
Description: Enable all features of SuevaFree WordPress theme.
Version: 1.1.4
Author: ThemeinProgress
Author URI: https://www.themeinprogress.com
License: GPLv3
*/

require_once dirname(__FILE__) . '/functions.php';

if( !class_exists( 'suevafree_ek_init' ) ) {

	class suevafree_ek_init {

		/**
		* Constructor
		*/

		public function __construct(){

			add_filter('the_content', array(&$this,'clear_shortcodes'));
			add_action('plugins_loaded', array(&$this,'plugins_loaded'));
			add_action('wp_enqueue_scripts', array(&$this,'site_scripts') );
			add_action('widgets_init', array(&$this,'load_widgets') );
			add_action('admin_init', array(&$this, 'plugin_scripts'));
			add_action('customize_controls_enqueue_scripts', array(&$this, 'customize_scripts'));
			add_filter('plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'plugin_action_links' ), 10, 2 );

		}

		/**
		* Shortcodes
		*/

		public function clear_shortcodes($content) {

			$array = array (
				'<p>[' => '[',
				']</p>' => ']',
				']<br />' => ']'
			);

			$content = strtr($content, $array);

			return $content;

		}

		/**
		* Plugin widgets
		*/

		public function load_widgets() {

			register_widget( 'suevafree_cta_widget' );
			register_widget( 'suevafree_news_widget' );
			register_widget( 'suevafree_team_widget' );
			register_widget( 'suevafree_testimonial_widget' );
			register_widget( 'suevafree_services_widget' );
			register_widget( 'suevafree_count_widget' );
			register_widget( 'suevafree_contactform_widget' );

		}

		/**
		* Plugin setup
		*/

		public function plugins_loaded() {

			load_plugin_textdomain( 'suevafree-essential-kit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');

			suevafree_ek_require('core/includes/');
			suevafree_ek_require('core/cpt/');
			suevafree_ek_require('core/widgets/');
			suevafree_ek_require('core/shortcodes/');

			add_image_size( 'sueva_team', 350, 350, TRUE );
			add_image_size( 'sueva_testimonial', 150, 150, TRUE );

		}

		/**
		* Load scripts
		*/

		public function site_scripts() {


			wp_enqueue_script( 'jquery' );

			wp_enqueue_script( "jquery-ui-core", array('jquery'));
			wp_enqueue_script( "jquery-ui-tabs", array('jquery'));

			wp_enqueue_script( 'suevafree-scrollReveal',		plugins_url('/assets/js/suevafree-ek-scrollReveal.min.js', __FILE__ ), array("jquery"), '20160910', true );
			wp_enqueue_script( 'suevafree-ek-slick.min',		plugins_url('/assets/js/suevafree-ek-slick.min.js', __FILE__ ), array('jquery'), '20160910', true );
			wp_enqueue_script( 'suevafree-ek-jquery',		plugins_url('/assets/js/suevafree-ek-jquery.js', __FILE__ ), array('jquery'), '20160910', true );
			wp_enqueue_style ( 'suevafree-ek-slick',			plugins_url('/assets/css/suevafree-ek-slick.css', __FILE__ ), array(), null );
			wp_enqueue_style ( 'suevafree-ek-style',			plugins_url('/assets/css/suevafree-ek-style.css', __FILE__ ), array(), null );

		}

		/**
		 * Loads the admin scripts and styles
		 */

		public function plugin_scripts() {

			global $wp_version, $pagenow;

			$file_dir = plugins_url('/core/assets/', __FILE__ );

			if ( $pagenow == 'widgets.php' ) {

				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_style( 'suevafree_ek_style', $file_dir.'css/suevafree_ek_style.css', array(), null );

				wp_enqueue_media();
			 	wp_enqueue_script( 'suevafree_ek_script', $file_dir.'js/suevafree_ek_script.js',array('jquery','media-upload','thickbox','wp-color-picker'),'1.0',TRUE );

			}

			if ( is_plugin_active('sueva-essential-kit/init.php') )
				deactivate_plugins('sueva-essential-kit/init.php');

		}

		/**
		 * Loads the customize scripts and styles
		 */

		public function customize_scripts() {

			global $wp_version, $pagenow;

			$file_dir = plugins_url('/core/assets/', __FILE__ );

			if ( $pagenow == 'customize.php' ) {

				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_style( 'suevafree_ek_style', $file_dir.'css/suevafree_ek_style.css', array(), null );

				wp_enqueue_media();
				wp_enqueue_style( 'wp-color-picker' );

			 	wp_enqueue_script( 'suevafree_ek_customize', $file_dir.'js/suevafree_ek_customize.js',array('jquery','media-upload','thickbox','wp-color-picker'),'1.0',TRUE );

			 }

		}

		/**
		* Plugin settings link
		*/

		public function plugin_action_links( $links ) {

			$links[] = '<a href="'. esc_url('https://www.themeinprogress.com/sueva/?ref=2&campaign=suevafree-essential-kit') .'">' . esc_html__('Upgrade to the premium version of Sueva','suevafree-essential-kit') . '</a>';

			return $links;

		}

	}

	new suevafree_ek_init();

}

?>
