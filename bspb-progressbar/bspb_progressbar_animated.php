<?php
/*
Plugin Name: BSPB Progress Bar
Description: BSPB Progress Bar.
Version: 1.0.0
Author: Pierre Gagliardi
Author URI: http://http://www.pierregagliardi.com//
Plugin URI: http://http://www.pierregagliardi.com//plugins/bspb-plugin/
License: MIT License
License URI: http://opensource.org/licenses/MIT
Text Domain: bspb-plugin
Domain Path: /languages

BSPB Plugin
Copyright (C) 2013-2016, Digital Factory - info@digitalfactory.pl

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
// exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;

define( 'BSPB_URL', plugins_url( '', __FILE__ ) );
define( 'BSPB_PATH', plugin_dir_path( __FILE__ ) );
define( 'BSPB_REL_PATH', dirname( plugin_basename( __FILE__ ) ) . '/' );
define('BSPB_PROGRESSBAR_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define( 'DYNAMICSCRIPTVERSION', '0.1.0' );
define( 'DYNAMICCSS_VERSION', '0.1.0' );
//$handle, $src = false, $deps = array(), $ver = false, $media = 'all';

include_once( BSPB_PATH . 'includes/class-frontend.php' );
include_once( BSPB_PATH . 'includes/class-settings.php' );

//if(!class_exists('BSPB_Plugin'))
//{
	class BSPB_Plugin
	{

		public $defaults = array(
		'settings'		 => array(
			'script'							=> 'horizontal',
			'transparent_background'			=> true,
			'background_color'		 			=> '#ffffff',
			'bar_color'		 					=> '#edb315',
			'opacity_bar'						=> true,
			'overlay_opacity_bar'				=> 25,
			'show_title'				=> true,
			'show_value'				=> true,
			'update_version'					=> 0,
			'update_notice'						=> true
		),
		'animation'		 => array(
			'opacity_bar_angles'		=> '90',
			'animate_opacity_bar'			=> false,
			'animate_opacity_bar_speeds'	=> 'normal',
			'draw_on_scroll'				=> false,
			'draw_on_scroll_selector'		=> 'myDiv',
			'draw_on_scroll_animation_speeds'				=> 'normal',
			//'conditional_loading'			=> false,
			'update_version'				=> 0,
			'update_notice'					=> true
		),
		'configuration'	 => array(
			'horizontal'	 => array(
				'show_title'				=> true,
				'show_value'				=> true,
				'title_position'			=> 'top-left',
				'value_position'			=> 'top-right',
				'margin_type_text'			=> 'margin',
				'value_margin_text'			=> 0,
				'margin_type_value'			=> 'margin',
				'value_margin_value'		=> 0,
				'text_color'		 		=> '#ffffff',
				'bar_width'					=> 50,
				'bar_height'				=> 50,
				'theme'						=> 'pp_default',
			),
			'vertical'		 => array(
				'bar_width'					=> 100,
				'bar_height'				=> 50,
				'show_title'				=> true,
				'show_value'				=> true,
				'title_position'			=> 'top-left',
				'value_position'			=> 'top-right',
				'margin_type_text'			=> 'margin',
				'value_margin_text'			=> 0,
				'margin_type_value'			=> 'margin',
				'value_margin_value'		=> 0,
				'text_color'		 		=> '#ffffff'
			),
			'circular'		 => array(
				'not_avalaible'				=> 'Avalaible in future release!',
				'show_title'				=> true,
				'show_value'				=> true,
				'title_position'			=> 'top-left',
				'value_position'			=> 'top-right',
				'margin_type_text'			=> 'margin',
				'value_margin_text'			=> 20,
				'margin_type_value'			=> 'margin',
				'value_margin_value'			=> 20,
				'text_color'		 		=> '#ffffff',
				'bar_width'					=> 50,
				'bar_height'					=> 50,
				'theme'						=> 'pp_default',
			),
			'logo'		 => array(
				'not_avalaible'				=> 'Avalaible in future release!',
				'show_title'				=> true,
				'show_value'				=> true,
				'title_position'			=> 'top-left',
				'value_position'			=> 'top-right',
				'margin_type_text'			=> 'margin',
				'value_margin_text'			=> 20,
				'margin_type_value'			=> 'margin',
				'value_margin_value'			=> 20,
				'text_color'		 		=> '#ffffff',
				'bar_width'					=> 50,
				'bar_height'					=> 50,
				'theme'						=> 'pp_default',
			),
			'font-awesome'		 => array(
				'not_avalaible'				=> 'Avalaible in future release!',
				'show_title'				=> true,
				'show_value'				=> true,
				'title_position'			=> 'top-left',
				'value_position'			=> 'top-right',
				'margin_type_text'			=> 'margin',
				'value_margin_text'			=> 20,
				'margin_type_value'			=> 'margin',
				'value_margin_value'			=> 20,
				'text_color'		 		=> '#ffffff',
				'bar_width'					=> 50,
				'bar_height'					=> 50,
				'theme'						=> 'pp_default',
			),
		),
		'version'		 => '1.0.0'
	);

	public $options = array();
	private $notices = array();
	private static $_instance;

	private function __clone() {}
	private function __wakeup() {}

	/**
	 * Main BSPB_Plugin instance.
	 */
	public static function instance() {
		if ( self::$_instance === null ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}



		public function __construct() {
		register_activation_hook( __FILE__, array( $this, 'activate_multisite' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate_multisite' ) );

		// change from older versions
		$db_version = get_option( 'bspb_plugin_version' );

		if ( version_compare( ( $db_version === false ? '1.0.0' : $db_version ), '1.0.5', '<' ) ) {
			if ( ($array = get_option( 'bspb_settings' )) !== false ) {
				update_option( 'bspb_plugin_settings', $array );
				delete_option( 'bspb_settings' );
			}

			if ( ($array = get_option( 'bspb_configuration' )) !== false ) {
				update_option( 'bspb_plugin_configuration', $array );
				delete_option( 'bspb_configuration' );
			}

			if ( ($array = get_option( 'bspb_animation' )) !== false ) {
				update_option( 'bspb_plugin_animation', $array );
				delete_option( 'bspb_animation' );
			}
		}

		// update plugin version
		update_option( 'bspb_plugin_version', $this->defaults['version'], '', 'no' );

		$this->options['settings'] = array_merge( $this->defaults['settings'], ( ($array = get_option( 'bspb_plugin_settings' ) ) === false ? array() : $array ) );

		$this->options['animation'] = array_merge( $this->defaults['animation'], ( ($array = get_option( 'bspb_plugin_animation' ) ) === false ? array() : $array ) );

		// for multi arrays we have to merge them separately
		$db_conf_opts = ( ( $base = get_option( 'bspb_plugin_configuration' ) ) === false ? array() : $base );

		foreach ( $this->defaults['configuration'] as $script => $settings ) {
			$this->options['configuration'][$script] = array_merge( $settings, (isset( $db_conf_opts[$script] ) ? $db_conf_opts[$script] : array() ) );
		}

		// actions
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'front_scripts_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts_styles' ) );
		add_action( 'wp_ajax_dynamic_css', array( $this, 'dynamic_css' ));
		add_action( 'wp_ajax_nopriv_dynamic_css', array( $this, 'dynamic_css' ));
		add_action( 'wp_enqueue_scripts', array( $this, 'dynamic_css_enqueue' )); //wp_enqueue_scripts = load on front-end
				add_action( 'admin_print_scripts', array( $this, 'admin_inline_js' ), 999 );
		// filters
		add_filter( 'plugin_action_links', array( $this, 'plugin_settings_link' ), 10, 2 );
	}

			/**
	 * Single site activation function
	 */
	public function activate_single() {
		add_option( 'bspb_plugin_settings', $this->defaults['settings'], '', 'no' );
		add_option( 'bspb_plugin_configuration', $this->defaults['configuration'], '', 'no' );
		add_option( 'bspb_plugin_animation', $this->defaults['animation'], '', 'no' );
		add_option( 'bspb_plugin_version', $this->defaults['version'], '', 'no' );
	}

	/**
	 * Single site deactivation function
	 */
	public function deactivate_single( $multi = false ) {
		if ( $multi === true ) {
			$options = get_option( 'bspb_plugin_settings' );
			$check = $options['deactivation_delete'];
		} else
			$check = $this->options['settings']['deactivation_delete'];

		if ( $check === true ) {
			delete_option( 'bspb_plugin_settings' );
			delete_option( 'bspb_plugin_configuration' );
			delete_option( 'bspb_plugin_animation' );
			delete_option( 'bspb_plugin_version' );
		}
	}

	/**
	 * Activation function
	 */
	public function activate_multisite( $networkwide ) {
		if ( is_multisite() && $networkwide ) {
			global $wpdb;

			$activated_blogs = array();
			$current_blog_id = $wpdb->blogid;
			$blogs_ids = $wpdb->get_col( $wpdb->prepare( 'SELECT blog_id FROM ' . $wpdb->blogs, '' ) );

			foreach ( $blogs_ids as $blog_id ) {
				switch_to_blog( $blog_id );
				$this->activate_single();
				$activated_blogs[] = (int) $blog_id;
			}

			switch_to_blog( $current_blog_id );
			update_site_option( 'bspb_plugin_activated_blogs', $activated_blogs, array() );
		} else
			$this->activate_single();
	}

	/**
	 * Dectivation function
	 */
	public function deactivate_multisite( $networkwide ) {
		if ( is_multisite() && $networkwide ) {
			global $wpdb;

			$current_blog_id = $wpdb->blogid;
			$blogs_ids = $wpdb->get_col( $wpdb->prepare( 'SELECT blog_id FROM ' . $wpdb->blogs, '' ) );

			if ( ($activated_blogs = get_site_option( 'bspb_plugin_activated_blogs', false, false )) === false )
				$activated_blogs = array();

			foreach ( $blogs_ids as $blog_id ) {
				switch_to_blog( $blog_id );
				$this->deactivate_single( true );

				if ( in_array( (int) $blog_id, $activated_blogs, true ) )
					unset( $activated_blogs[array_search( $blog_id, $activated_blogs )] );
			}

			switch_to_blog( $current_blog_id );
			update_site_option( 'bspb_plugin_activated_blogs', $activated_blogs );
		} else
			$this->deactivate_single();
	}


	/**
	 * Load textdomain
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'bspb-plugin', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}


	/**
	 * Print admin scripts.
	 */
	public function admin_inline_js() {
		if ( ! current_user_can( 'install_plugins' ) )
			return;
		?>
		<script type="text/javascript">
			( function ( $ ) {
				$( document ).ready( function () {
					// save dismiss state
					$( '.bspb-notice.is-dismissible' ).on( 'click', '.notice-dismiss', function ( e ) {
						e.preventDefault();

						$.post( ajaxurl, {
							action: 'bspb-hide-notice',
							url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
							rl_nonce: '<?php echo wp_create_nonce( 'bspb_action' ); ?>'
						} );

					} );
				} );
			} )( jQuery );
		</script>
		<?php
	}

	/**
	 * Add links to Settings page
	 */
	public function plugin_settings_link( $links, $file ) {
		if ( ! is_admin() || ! current_user_can( apply_filters( 'bspb_plugin_settings_capability', 'manage_options' ) ) )
			return $links;

		static $plugin;

		$plugin = plugin_basename( __FILE__ );

		if ( $file == $plugin ) {
			$settings_link = sprintf( '<a href="%s">%s</a>', admin_url( 'options-general.php' ) . '?page=bspb-plugin', __( 'Settings', 'bspb-plugin' ) );
			array_unshift( $links, $settings_link );
		}

		return $links;
	}



	/**
	 * Enqueue admin scripts and styles
	 */
	public function admin_scripts_styles( $page ) {
		if ( $page === 'settings_page_bspb-plugin' ) {

			wp_register_script(
				'bspb-plugin-admin', plugins_url( 'js/admin.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), $this->defaults['version']
			);
			wp_enqueue_script( 'bspb-plugin-admin' );

			wp_localize_script(
				'bspb-plugin-admin', 'bspbArgs', array(
				'resetSettingsToDefaults'	 => __( 'Are you sure you want to reset these settings to defaults?', 'bspb-plugin' ),
				'resetScriptToDefaults'		 => __( 'Are you sure you want to reset this script settings to defaults?', 'bspb-plugin' ),
				)
			);

			wp_enqueue_style( 'wp-color-picker' );

			wp_register_style(
				'bspb-plugin-admin', plugins_url( 'css/admin.css', __FILE__ ), array(), $this->defaults['version']
			);
			wp_enqueue_style( 'bspb-plugin-admin' );
		}
	}




	public function dynamic_css_enqueue() {
		//echo 'ouiiiiii';
    wp_enqueue_style( 'dynamic-flags', admin_url( 'admin-ajax.php' ).'?action=dynamic_css&_wpnonce=' . wp_create_nonce( 'dynamic-css-nonce' ), false,  DYNAMICCSS_VERSION );
}

	public function dynamic_css() { // Don't wrap function dynamic_css() in if(!is_admin()){ , the call from admin-ajax.php will be from admin

		//echo 'noooooonnn';
    $nonce = $_REQUEST['_wpnonce'];
    if ( ! wp_verify_nonce( $nonce, 'dynamic-css-nonce' ) ) {
        die( 'invalid nonce' );
    } else {
        /**
         * NOTE: Using require or include to call an URL ,created by plugins_url() or get_template_directory(), can create the following error:
         *       Warning: require(): http:// wrapper is disabled in the server configuration by allow_url_include=0
         *       Warning: require(http://domain/path/flags/css.php): failed to open stream: no suitable wrapper could be found
         *       Fatal error: require(): Failed opening required 'http://domain/path/css.php'
         */
        //require dirname( __FILE__ ) .'/css/custom-css.php'; //use echo, printf etc in css.php and write to standard out.
        require(BSPB_PATH  .'css/custom-css.php');
    }
    exit;
}



		/**
	 * Enqueue frontend scripts and styles
	 */
	public function front_scripts_styles() {


   $handle = 'waypoints';
   $list = 'enqueued';
    // if (wp_script_is( $handle, $list )) {
	//     var_dump('loaded');
    //   return;
    // } else {

	//     wp_register_script('waypoints',  'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js', array(), '4.0.0', true );
	//     wp_enqueue_script( 'waypoints' );
      // wp_register_script( 'fluidVids.js', plugin_dir_url(__FILE__).'js/fluidvids.min.js');
       //wp_enqueue_script( 'fluidVids.js' );
    // }

    wp_enqueue_script('bspb-progressbar-waypoints-script', BSPB_PROGRESSBAR_PLUGIN_PATH.'js/lib/jquery.waypoints.min.js', array('jquery'));
	wp_enqueue_script('bspb-progressbar-bootstrap-script', BSPB_PROGRESSBAR_PLUGIN_PATH.'js/lib/bootstrap.min.js', array('jquery'));


	wp_enqueue_style('bspb-progressbar-bootstrap-style', BSPB_PROGRESSBAR_PLUGIN_PATH.'css/custom.bootstrap.css');
	//wp_enqueue_style('bspb-progressbar-plugin-style', BSPB_PROGRESSBAR_PLUGIN_PATH.'css/bspb-progressbar.css');


			//add_action('wp_ajax_dynamic_css', array( $this, 'dynaminc_css' ));
			add_action('wp_ajax_nopriv_dynamic_css', array( $this, 'dynaminc_css' ) );

//wp_register_script( 'responsive-lightbox', plugins_url( 'js/front.js', __FILE__ ), array( 'jquery' ), $this->defaults['version'], ( $this->options['settings']['loading_place'] === 'header' ? false : true ) );


				wp_register_script(
				'bspb-plugin-front', plugins_url( 'js/front.js', __FILE__ ), array( 'jquery' ), $this->defaults['version'], ( $this->options['settings']['loading_place'] === 'header' ? false : true ) );

$settings = BSPB_Plugin()->options['settings'];
$animation = BSPB_Plugin()->options['animation'];
//echo 'oui';
	$type = $settings['script'];
	$draw_on_scroll_selector = $animation['draw_on_scroll_selector'];
	$draw_on_scroll = $animation['draw_on_scroll'];
	$draw_on_scroll_animation_speeds = $animation['draw_on_scroll_animation_speeds'];

	if($draw_on_scroll_animation_speeds =='slow'){$draw_on_scroll_animation_speeds_miliseconds = 6000; }
if($draw_on_scroll_animation_speeds =='normal'){$draw_on_scroll_animation_speeds_miliseconds = 4000; }
if($draw_on_scroll_animation_speeds =='fast'){$draw_on_scroll_animation_speeds_miliseconds = 2000; }
	  //$draw_on_scroll_id = $options_general['draw_on_scroll_id'];
	 // echo $draw_on_scroll_id;
	  $enable_title = $options_text['enable_title'];
    //$current_type = get_option( 'setting_type' );
    //$options['height'];
    //echo $current_type;
    $current_value = array( 'type' => $type, 'drawOnScroll' => $draw_on_scroll, 'ScrollSelector' => $draw_on_scroll_selector, 'drawOnScrollSpeed' => $draw_on_scroll_animation_speeds_miliseconds );
    wp_localize_script( 'bspb-plugin-front', 'current_value', $current_value );

    // The script can be enqueued now or later.
    wp_enqueue_script( 'bspb-plugin-front' );



			wp_enqueue_style( 'wp-color-picker' );

			wp_register_style(
				'bspb-plugin-front', plugins_url( 'css/bsbpanimated.css', __FILE__ ), array(), $this->defaults['version']
			);
			wp_enqueue_style( 'bspb-plugin-front' );


	}

} // END class BSPB_Plugin





/**
 * Initialise BSPB_Plugin.
 */
function BSPB_Plugin() {
	static $instance;

	// first call to instance() initializes the plugin
	if ( $instance === null || ! ($instance instanceof BSPB_Plugin) ) {
		$instance = BSPB_Plugin::instance();
	}

	return $instance;
}

$bspb_plugin = BSPB_Plugin();