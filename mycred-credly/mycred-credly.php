<?php
/**
 * Plugin Name: myCred Credly
 * Description: myCred Credly that allow admin to integrate Credly Badge Builder to create professional looking badge using Credly API, Also user can view his badges and  share his on his credly account.
 * Version: 2.1.1
 * Tags: myCred, credly, myCred credly, badges
 * Author Email: support@mycred.me
 * Author: myCRED
 * Author URI: http://mycred.me
 * Requires at least: WP 4.8
 * Tested up to: WP 6.7.1
 * Text Domain: mycred_credly
 * Domain Path: /lang
 * License: Copyrighted
 */

if ( ! class_exists( 'MyCRED_Credly' ) ) :
	final class MyCRED_Credly {

		// Plugin Version
		public $version             = '2.1.1';

		// Instnace
		protected static $_instance = null;

		public $credly_admin_notice = '';

		/**
		 * Setup Instance
		 * @since 1.1.2
		 * @version 1.0
		 */
		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * Not allowed
		 * @since 1.1.2
		 * @version 1.0
		 */
		public function __clone() {
 _doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '1.1.2' ); }

		/**
		 * Not allowed
		 * @since 1.1.2
		 * @version 1.0
		 */
		public function __wakeup() {
 _doing_it_wrong( __FUNCTION__, 'Cheatin&#8217; huh?', '1.1.2' ); }

		/**
		 * Define
		 * @since 1.1.2
		 * @version 1.0
		 */
		private function define( $name, $value, $definable = true ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			} elseif ( ! $definable && defined( $name ) ) {
				_doing_it_wrong( 'MyCRED_Credly->define()', 'Could not define: ' . esc_html( $name ) . ' as it is already defined somewhere else!', '1.1.2' );
			}
		}

		/**
		 * Require File
		 * @since 1.1.2
		 * @version 1.0
		 */
		public function file( $required_file ) {
			if ( file_exists( $required_file ) ) {
				require_once $required_file;
			} else {
_doing_it_wrong( 'MyCRED_Credly->file()', 'Requested file ' . esc_html( $required_file ) . ' not found.', '1.1.2' );
			}
		}

		/**
		 * Construct
		 * @since 1.0
		 * @version 1.0
		 */
		public function __construct() {

			$this->define_constants();
			add_action( 'mycred_init', array( $this, 'load_modules' ), 10, 1 );
			register_activation_hook(__FILE__, array( $this, 'on_activation') );
			add_action('admin_notices', array( $this, 'display_activation_notice') );

		}

		
	    public function on_activation() {
	        // Set a transient to display the activation notice
	        set_transient('mycred_credly_activation_notice', true, 5);
	    }

	    /**
	     * Display admin notice for activation
	     * @since 1.0.4
	     * @version 1.0
	     */
	    public function display_activation_notice() {
	        // Check if the transient is set
	        if (get_transient('mycred_credly_activation_notice')) {
	            echo '<div class="notice notice-error is-dismissible">';
	            echo wp_kses_post(
	                __('<p><strong>myCred Credly</strong> is depreciating from here and it will not be updated from now on. You can access <strong>myCred credly</strong> along with all the future updates on the <strong>myCred Toolkit</strong>.</p>', 'mycred_credly')
	            );
	            echo '</div>';

	            // Delete the transient to prevent repeated notices
	            delete_transient('mycred_credly_activation_notice');
	            deactivate_plugins(__FILE__);
	        }
	    }



		/**
		 * Define Constants
		 * @since 1.1.2
		 * @version 1.0
		 */
		private function define_constants() {

			$this->define( 'MYCRED_CREDLY_VERSION', '1.2.1' );
			$this->define( 'MYCRED_CREDLY_SLUG', 'mycred-credly' );
			$this->define( 'MYCRED_CREDLY', __FILE__ );
			$this->define( 'MYCRED_CREDLY_ROOT', plugin_dir_path( MYCRED_CREDLY ) );
			$this->define( 'MYCRED_CREDLY_INC', MYCRED_CREDLY_ROOT . 'includes/' );
			$this->define( 'MYCRED_CREDLY_ASSETS', plugin_dir_url( MYCRED_CREDLY ) . 'assets/' );
		}

		/**
		 * Load Module
		 * @since 1.1.2
		 * @version 1.0
		 */
		public function load_modules() {

			$this->load_plugin_textdomain();

			if ( class_exists( 'myCRED_Addons_Module' ) ) {
				$mycred_modules = new myCRED_Addons_Module();
				if ( $mycred_modules->is_active( 'badges' ) ) {

					add_action( 'admin_enqueue_scripts', array( $this, 'load_assets' ) );
					add_action( 'wp_enqueue_scripts', array( $this, 'wp_load_assets' ) );

					$this->file( MYCRED_CREDLY_INC . 'mycred-credly-settings.php' );

					$this->file( MYCRED_CREDLY_INC . 'mycred-credly-badge.php' );
				} else {
					$this->mycred_credly_set_admin_notices( __('myCred Credly requires myCred Badges Addon to be activatd', 'mycred_credly') );
				}
			}
		}

		public function wp_load_assets() {
			wp_register_style( 'style-mycred-credly', MYCRED_CREDLY_ASSETS . 'css/style.css' ); 
		}

		/**
		 * Load Assets
		 * @since 1.1.2
		 * @version 1.0
		 */
		public function load_assets() {

			$screen = get_current_screen();
			if ( $screen->id == MYCRED_BADGE_KEY ) {
add_thickbox();
			}
			
			wp_register_style( 'style-mycred-credly', MYCRED_CREDLY_ASSETS . 'css/style.css' );
			wp_enqueue_style( 'style-mycred-credly' );
			wp_enqueue_script( 'script-mycred-credly', MYCRED_CREDLY_ASSETS . 'js/script.js', array( 'jquery', 'jquery-ui-autocomplete' ) );
			wp_localize_script( 'script-mycred-credly', 'mycred_credly', array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'nonce'   => wp_create_nonce('mycred_nounce_credly_badge_list'),
				'loading' => MYCRED_CREDLY_ASSETS . 'images/loading.gif'
			));
		}

		/**
		 * Load Translation
		 * @since 1.0
		 * @version 1.0
		 */
		public function load_plugin_textdomain() {
			// Load Translation
			$locale = apply_filters( 'plugin_locale', get_locale(), 'mycred_credly' );
			load_textdomain( 'mycred_credly', WP_LANG_DIR . "/mycred-credly/mycred_credly-$locale.mo" );
			load_plugin_textdomain( 'mycred_credly', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
		}
		
		public function mycred_credly_set_admin_notices( $msg ) {
			$this->credly_admin_notice = $msg;
			add_action( 'admin_notices', array( $this, 'mycred_credly_admin_notice' ) );
		}

		public function mycred_credly_admin_notice() {
			$class = 'notice notice-error';
			printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $this->credly_admin_notice ) );
		}
	}

	MyCRED_Credly::instance();
endif;
