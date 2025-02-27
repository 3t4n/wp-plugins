<?php
/**
 * If direct access than exit the file.
 *
 * @package CALL_TO_ACTION
 */

if ( ! defined('ABSPATH') ) {
	exit;
}

// Make sure the same class is not loaded twice.
if ( ! class_exists('CTAGutenberg') ) {
	/**
	 * The class creates sub-menus
	 */
	class CTAGutenberg {

		/**
		 * Instance
		 *
		 * Holds a single instance of the `CTAGutenberg` class.
		 *
		 * @since 1.0.0
		 *
		 * @access private
		 * @static
		 *
		 * @var CTAGutenberg A single instance of the class.
		 */
		private static $instance = null;

		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @return CTAGutenberg An instance of the class.
		 * @since 1.0.0
		 *
		 * @access public
		 * @static
		 */
		public static function instance() {
			if ( is_null(self::$instance) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Clone
		 *
		 * Disable class cloning.
		 *
		 * @return void
		 * @since 1.0.0
		 *
		 * @access protected
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong(__FUNCTION__, esc_html__('Cheatin&#8217; huh?', 'cta-gutenberg'), '1.0.0');
		}

		/**
		 * Wakeup
		 *
		 * Disable unserializing the class.
		 *
		 * @return void
		 * @since 1.7.0
		 *
		 * @access protected
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong(__FUNCTION__, esc_html__('Cheatin&#8217; huh?', 'cta-gutenberg'), '1.0.0');
		}

		/**
		 * Constructor
		 *
		 * Initialize the CTAGutenberg plugins.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function __construct() {
			register_activation_hook(__FILE__, [ $this, 'cta_gutenberg_activate' ]);
			add_action('init', [ $this, 'i18n' ]);
			add_action('enqueue_block_editor_assets', [ $this, 'cta_gutenberg_gutenberg_blocks' ]);
			add_action('admin_enqueue_scripts', [ $this, 'cta_gutenberg_editor_assets' ]);
			add_action('wp_enqueue_scripts', [ $this, 'cta_gutenberg_assets' ]);
		}

		/**
		 * On activation hook
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function cta_gutenberg_activate() {
			update_option('cta_gutenberg_version', CTAGB_VERSION);
		}


		/**
		 * Load Textdomain
		 *
		 * Load plugin localization files.
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function i18n() {
			wp_set_script_translations( 'cta-gutenberg-block', 'cta-gutenberg', plugin_dir_path( __FILE__ ) . 'languages' );
		}

		/**
		 * Enqueue block script
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function cta_gutenberg_gutenberg_blocks() {
			wp_enqueue_script('cta-gutenberg-block', plugins_url('/blocks/dist/blocks.build.js', __FILE__), [ 'wp-blocks', 'wp-element', 'wp-editor', 'wp-i18n' ], filemtime(plugin_dir_path(__FILE__) . '/blocks/dist/blocks.build.js'),true);
			wp_localize_script('cta-gutenberg-block', 'cta_gutenberg_locate', [
				'plugin' => CTAGB_DIR_URL,
			]);
		}

		/**
		 * Enqueue editor assets
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function cta_gutenberg_editor_assets() {
			wp_enqueue_style('cta-gutenberg-editor-css', plugins_url('/blocks/dist/blocks.editor.build.css', __FILE__), [], filemtime(plugin_dir_path(__FILE__) . '/blocks/dist/blocks.editor.build.css'));
		}

		/**
		 * Enqueue frontend assets
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function cta_gutenberg_assets() {
			wp_enqueue_style('cta-gutenberg-font', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap', false,'1.0.0');
			wp_enqueue_style('cta-gutenberg-css', plugins_url('/blocks/dist/blocks.style.build.css', __FILE__), filemtime(plugin_dir_path(__FILE__) . '/blocks/dist/blocks.style.build.css'),'1.0.0');
		}
	}
}
