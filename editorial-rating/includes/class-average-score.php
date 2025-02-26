<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://forhad.net/
 * @since      1.0.0
 *
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/includes
 * @author     Forhad Hossain <need@forhad.net>
 */
class WPAS_Editorial_Rating {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      WPAS_Editorial_Rating_Loader    $loader    Maintains and registers all hooks for the plugin.
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

		if ( defined( 'WPAS_Editorial_Rating_VERSION' ) ) {

			$this->version = WPAS_Editorial_Rating_VERSION;
		} else {

			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wpas_editorial_rating';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - WPAS_Editorial_Rating_Loader. Orchestrates the hooks of the plugin.
	 * - WPAS_Editorial_Rating_i18n. Defines internationalization functionality.
	 * - WPAS_Editorial_Rating_Admin. Defines all hooks for the admin area.
	 * - WPAS_Editorial_Rating_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-average-score-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-average-score-i18n.php';

		/**
		 * The class responsible for custom post type
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-average-score-cpt.php';

		/**
		 * The class responsible for license checking.
		 */
		if ( 'PRESTIGE' === WPASER_COPY ) {

			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-average-score-pro.php';
		}

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-average-score-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-average-score-public.php';

		/**
		 * The class responsible for output.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-average-score-public_display.php';

		/**
		 * The class responsible for output schema.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-average-score-public-schema.php';

		$this->loader = new WPAS_Editorial_Rating_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the WPAS_Editorial_Rating_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new WPAS_Editorial_Rating_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		if ( 'PRESTIGE' === WPASER_COPY ) {

			$plugin_admin_pro = new EditorialRatingPRO( $this->get_plugin_name(), $this->get_version() );
		}

		$plugin_admin = new WPAS_Editorial_Rating_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// Plugin admin custom post types.
		$plugin_admin_cpt = new WPAS_Editorial_Rating_CPT( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'init', $plugin_admin_cpt, 'wpas_post_type' );
		$this->loader->add_filter( 'post_updated_messages', $plugin_admin_cpt, 'wpas_updated_messages', 10, 2 );
		$this->loader->add_filter( 'enter_title_here', $plugin_admin_cpt, 'wpas_change_title_text' );
		$this->loader->add_action( 'manage_wpas_blocks_posts_custom_column', $plugin_admin_cpt, 'wpas_admin_field', 10, 2 );
		$this->loader->add_action( 'admin_menu', $plugin_admin_cpt, 'wpas_help_admin_submenu', 15 );
		$this->loader->add_filter( 'plugin_action_links', $plugin_admin_cpt, 'wpas_add_action_plugin', 10, 5 );
		$this->loader->add_action( 'activated_plugin', $plugin_admin_cpt, 'wpas_redirect_after_activation', 10, 2 );
		$this->loader->add_action( 'admin_notices', $plugin_admin_cpt, 'wpas_cpt_custom_header' );

		// CPT Column.
		$this->loader->add_filter( 'manage_wpas_review_posts_columns', $plugin_admin_cpt, 'wpas_admin_column' );
		$this->loader->add_action( 'manage_wpas_review_posts_custom_column', $plugin_admin_cpt, 'wpas_admin_field', 10, 2 );

		/**
		 * Custom Category Registration with Priority.
		 */
		function wpas_register_layout_category( $categories, $post ) {
			$new_category = array(
				'slug'  => 'er-block-cat',
				'title' => 'Editorial Rating',
				'icon'  => 'er-block-cat-icon',
			);

			// Set the priority by unshifting the new category to the beginning of the array.
			array_unshift( $categories, $new_category );

			return $categories;
		}
		if ( version_compare( get_bloginfo( 'version' ), '5.8', '>=' ) ) {
			add_filter( 'block_categories_all', 'wpas_register_layout_category', 10, 2 );
		} else {
			add_filter( 'block_categories', 'wpas_register_layout_category', 10, 2 );
		}

		/**
		 * Check the license key and make a notice in admin area.
		 */
		$has_wpas_license_key=get_option("EditorialRatingPRO_lic_Key","");
		if(empty($has_wpas_license_key) && 'PRESTIGE' === WPASER_COPY ){
			function wpas_license_notice() {
				?>
				<div class="wpas-license-notice notice error is-dismissible">
					<p><?php _e( 'Please active your license key for Editorial Rating PRO.<a href="' . get_site_url() . '/wp-admin/admin.php?page=wpas_license" class="button button-secondary" style="margin-left: 10px;">Activate License</a>', 'wpas_editorial_rating' ); ?></p>
				</div>
				<?php
			}
			function wpas_license_notice_hook() {
				add_action('admin_notices', 'wpas_license_notice');
			}
			add_action('admin_init', 'wpas_license_notice_hook');
		}

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		/**
		 * Get The Global Options.
		 */
		$wpas_block_opt_root             = get_option( '_wpas_global_options' );
		$wpas_block_missing_other_blocks = isset( $wpas_block_opt_root['wpas_block_missing_other_blocks'] ) ? $wpas_block_opt_root['wpas_block_missing_other_blocks'] : '';

		$plugin_public = new WPAS_Editorial_Rating_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_public, 'wpas_render_block_core' );
		if ( isset( $wpas_block_opt_root['wpas_block_missing_other_blocks'] ) && ! $wpas_block_missing_other_blocks ) {

			$this->loader->add_filter( 'allowed_block_types_all', $plugin_public, 'wpas_global_unset_blocks' );
		}

		// Plugin Shortcode.
		$plugin_shortcode = new WPAS_Editorial_Rating_Public_Display( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wpas_action_tag_for_shortcode', $plugin_shortcode, 'wpas_shortcode_execute' );
		add_shortcode( 'editorial-rating', array( $plugin_shortcode, 'wpas_shortcode_execute' ) );

		// Doing Ajax.
		$this->loader->add_action( 'wp_ajax_frhd_user_vote', $plugin_shortcode, 'frhd_user_vote' );
		$this->loader->add_action( 'wp_ajax_nopriv_frhd_user_vote', $plugin_shortcode, 'frhd_user_vote' );

		// Schema JSON.
		$plugin_schema = new WPAS_Editorial_Rating_Schema( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_head', $plugin_schema, 'wpas_enqueue_json_schema' );

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
	 * @return    WPAS_Editorial_Rating_Loader    Orchestrates the hooks of the plugin.
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
