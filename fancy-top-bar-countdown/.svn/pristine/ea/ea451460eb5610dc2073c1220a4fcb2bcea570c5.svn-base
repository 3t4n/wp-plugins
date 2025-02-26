<?php

/**
 * Class NN Quickview
 *
 * @return void
 * @author 99plugins
 **/

class NN_Count_Down {

	private static $instance;

	/**
	 * Instance
	 *
	 * @return void
	 * @author 99plugins
	 **/
	public static function get_instance() {

		if ( ! self::$instance ) {
			self::$instance = new self();
			self::$instance->init();
		}

	}

	/**
	 * Initialize
	 *
	 * @return void
	 * @author 99plugins
	 **/
	private function init() {

		add_action( 'wp_enqueue_scripts', array( $this, 'load_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_admin_scripts' ) );

		$this->load_data();
		$this->load_framework();
		$this->load_libraries();
		$this->load_files();
	}

	function load_data() {
		require_once NN_COUNT_DOWN_DIR . 'includes/data.php';
	}

	function load_framework() {
		if ( ! class_exists( 'CMB2_Bootstrap_212' ) ) {
			require_once NN_COUNT_DOWN_DIR . '/includes/framework/init.php';
		}
	}

	function load_libraries() {
		require_once NN_COUNT_DOWN_DIR . '/includes/libraries/aqua-resizer.php';
	}

	function load_files() {
		require_once NN_COUNT_DOWN_DIR . 'includes/functions.php';
		require_once NN_COUNT_DOWN_DIR . 'includes/admin-menus.php';
		require_once NN_COUNT_DOWN_DIR . 'includes/scripts.php';

		require_once NN_COUNT_DOWN_DIR . 'includes/class-nn-settings-options.php';
		require_once NN_COUNT_DOWN_DIR . 'includes/hooks.php';
		require_once NN_COUNT_DOWN_DIR . 'includes/widget-nn-count-down.php';
		require_once NN_COUNT_DOWN_DIR . 'includes/shortcode-nn-count-down.php';

	}

	/**
	 * Enqueue Styles and Scripts needed
	 *
	 * @return void
	 * @author 99plugins
	 **/
	function load_scripts() {
		wp_enqueue_script( 'nn-cd-plugin', NN_COUNT_DOWN_ASSETS_URI . 'js/plugins.min.js', array( 'jquery' ), NN_COUNT_DOWN_VERSION, true );
		wp_enqueue_script( 'nn-cd-coundown-plugin', NN_COUNT_DOWN_ASSETS_URI . 'js/jquery.plugin.js', array( 'jquery' ), NN_COUNT_DOWN_VERSION, true );
		wp_enqueue_script( 'nn-cd-countdown', NN_COUNT_DOWN_ASSETS_URI . 'js/jquery.countdown.js', array( 'jquery' ), NN_COUNT_DOWN_VERSION, true );
		wp_enqueue_script( 'nn-cd-slick-countdown', NN_COUNT_DOWN_ASSETS_URI . 'js/slick.min.js', array( 'jquery' ), NN_COUNT_DOWN_VERSION, true );
		wp_enqueue_script( 'nn-cd-countdown-apps', NN_COUNT_DOWN_ASSETS_URI . 'js/app.js', array( 'jquery' ), NN_COUNT_DOWN_VERSION, true );
		wp_enqueue_script( 'nn-cd-mb-ytplayer', NN_COUNT_DOWN_ASSETS_URI . 'js/jquery.mb.YTPlayer.js', array( 'jquery' ), NN_COUNT_DOWN_VERSION, true );
		wp_enqueue_style( 'nn-cd-magnific-popup', NN_COUNT_DOWN_ASSETS_URI . 'css/libraries.min.css' );
		wp_enqueue_style( 'nn-cd-font-awesome', NN_COUNT_DOWN_ASSETS_URI . 'css/font-awesome.min.css' );
		wp_enqueue_style( 'nn-cd-animate', NN_COUNT_DOWN_ASSETS_URI . 'css/animate.css' );
		wp_enqueue_style( 'nn-cd-style', NN_COUNT_DOWN_ASSETS_URI . 'css/style.css' );
	}

	function load_admin_scripts() {
		wp_enqueue_script( 'nn-cd-chosen', NN_COUNT_DOWN_ASSETS_URI . 'js/admin/jquery.chosen.js', array( 'jquery' ), NN_COUNT_DOWN_VERSION, true );
		wp_enqueue_script( 'nn-cd-admin-apps', NN_COUNT_DOWN_ASSETS_URI . 'js/admin/admin-app.js', array( 'jquery' ), NN_COUNT_DOWN_VERSION, true );
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style( 'nn-cd-chosen', NN_COUNT_DOWN_ASSETS_URI . 'css/admin/chosen.css' );
		wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
	}

}