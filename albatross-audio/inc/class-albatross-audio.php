<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * The core plugin class
 *
 * @since      1.0.0
 * @package    Albatross_Audio
 * @subpackage Albatross_Audio/includes
 * @author     Bad Little Robot <beau@badlittlerobot.com>
 */
 

class Albatross_Audio {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Albatross_Audio_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'ALBATROSS_AUDIO_VERSION' ) ) {
			$this->version = ALBATROSS_AUDIO_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'albatross-audio';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Albatross_Audio_Loader. Orchestrates the hooks of the plugin.
	 * - Albatross_Audio_Admin. Defines all hooks for the admin area.
	 * - Albatross_Audio_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */

	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-albatross-audio-loader.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-albatross-audio-admin.php';
		
		/**
		 * The player shortcode class.
		 */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-albatross-audio-shortcode.php';
		
		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-albatross-audio-public.php';
        
        
		$this->loader = new Albatross_Audio_Loader();

	}



	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
        
		$plugin_admin = new ALBAAU_Albatross_Audio_Admin( $this->get_plugin_name(), $this->get_version() );

        // get options
        $albatross_audio_options = get_option( 'albatross_audio_plugin_settings' );
        
        // enqueue styles and scripts
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'albaau_albatross_audio_enqueue_admin_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'albaau_albatross_audio_enqueue_admin_scripts' );

        // albatross_audio
        $this->loader->add_action( 'init', $plugin_admin, 'albaau_albatross_audio' );
        $this->loader->add_action( 'init', $plugin_admin, 'albaau_albatross_audio_taxonomy', 0 );
        $this->loader->add_filter( 'manage_albatross-audio_posts_columns', $plugin_admin, 'albaau_albatross_audio_admin_columns' );
        $this->loader->add_action( 'manage_albatross-audio_posts_custom_column', $plugin_admin, 'albaau_albatross_audio_admin_columns_data', 10, 2);
        $this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'albaau_albatross_audio_songs_metabox' );
        
        // save metabox
        $this->loader->add_action( 'save_post', $plugin_admin, 'albaau_albatross_audio_save_metabox' );
        
        // show warning for invalid songs
        $this->loader->add_action('admin_notices', $plugin_admin, 'albaau_blr_display_song_file_warnings');
        
        // save things
		$this->loader->add_action('save_post', $plugin_admin, 'albaau_update_featured_image_from_song_thumbnail');
      
		// add featured image text
		$this->loader->add_filter('admin_post_thumbnail_html', $plugin_admin, 'albaau_modify_featured_image_text', 10, 2);
	
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new ALBAAU_Albatross_Audio_Public( $this->get_plugin_name(), $this->get_version() );

        // scripts
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'albaau_albatross_audio_enqueue_public_styles', 20 );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'albaau_albatross_audio_enqueue_public_scripts', 20 );
        
        // templates
        $this->loader->add_action( 'archive_template', $plugin_public, 'albaau_albatross_audio_archive_template' );
        $this->loader->add_action( 'single_template', $plugin_public, 'albaau_albatross_audio_single_template' );

		// Content top and bottom.
		$this->loader->add_action( 'albatross_audio_loop_begin', $plugin_public, 'albaau_albatross_audio_loop_begin_logic' );
		$this->loader->add_action( 'albatross_audio_loop_end', $plugin_public, 'blr_albatross_audio_loop_end_logic' );
		
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Albatross_Audio_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
