<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.advancedcustomtypes.io
 * @since      1.0.0
 *
 * @package    ACT_Divi
 * @subpackage ACT_Divi/includes
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
 * @package    ACT_Divi
 * @subpackage ACT_Divi/includes
 * @author     Pablo Capello <hola@capellopablo.com>
 */
class ACT_Divi {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      ACT_Divi_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'ACTD_VERSION' ) ) {
			$this->version = ACTD_VERSION;
		} else {
			$this->version = '1.0.1';
		}
		$this->plugin_name = 'act-divi';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_cpt_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - ACT_Divi_Loader. Orchestrates the hooks of the plugin.
	 * - ACT_Divi_i18n. Defines internationalization functionality.
	 * - ACT_Divi_Admin. Defines all hooks for the admin area.
	 * - ACT_Divi_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-act-divi-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-act-divi-i18n.php';

        /**
         * The class responsible for manage custom post types
         */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-act-divi-types.php';

        /**
         * The class responsible for help Divi modules
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/modules/ACTModuleHelper.php';

        /**
         * The class responsible for manage custom taxonomies
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-act-divi-taxonomies.php';

        /**
         * Plugin functions
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/functions.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-act-divi-admin.php';

        /**
         * The class responsible for manage plugin settings
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-act-divi-settings.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-act-divi-public.php';





		$this->loader = new ACT_Divi_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the ACT_Divi_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new ACT_Divi_i18n();

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

		$plugin_admin = new ACT_Divi_Admin( $this->get_plugin_name(), $this->get_version() );
		$plugin_settings = new ACT_Divi_Settings( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );

		$this->loader->add_action( 'admin_init', $plugin_settings, 'actd_register_general_settings' );

        //Plugin Admin
        add_action( 'divi_extensions_init', array( $this, 'act_initialize_divi_extension' ) );

        //Plugin links
        add_filter( 'plugin_action_links', array( $this, 'act_add_action_plugin' ), 10, 5 );

        // ET scripts
		add_action( 'admin_enqueue_scripts', 'et_epanel_admin_scripts' );


	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new ACT_Divi_Public( $this->get_plugin_name(), $this->get_version() );

//		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
//		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to custom post types
	 * of the plugin.
	 *
	 * @since    1.0.1
	 * @access   private
	 */
	private function define_cpt_hooks() {
        $post_type_settings = get_option( 'actd-post-type-settings');

		$types = new ACT_Divi_Types();

        if (isset($post_type_settings['enable_movie']) && $post_type_settings['enable_movie'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_movie' );
        }
        if (isset($post_type_settings['enable_milestone']) && $post_type_settings['enable_milestone'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_milestone' );
        }
        if (isset($post_type_settings['enable_feature']) && $post_type_settings['enable_feature'] == 'on'){
            $this->loader->add_action( 'init', $types, 'register_cpt_feature' );
        }
        if (isset($post_type_settings['enable_location']) && $post_type_settings['enable_location'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_location' );
        }
        if (isset($post_type_settings['enable_shop']) && $post_type_settings['enable_shop'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_shop' );
        }
        if (isset($post_type_settings['enable_testimonial']) && $post_type_settings['enable_testimonial'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_testimonial' );
        }
        if (isset($post_type_settings['enable_listing']) && $post_type_settings['enable_listing'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_listing' );
        }
        if (isset($post_type_settings['enable_product']) && $post_type_settings['enable_product'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_product' );
        }
        if (isset($post_type_settings['enable_course']) && $post_type_settings['enable_course'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_course' );
        }
        if (isset($post_type_settings['enable_office']) && $post_type_settings['enable_office'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_office' );
        }
        if (isset($post_type_settings['enable_property']) && $post_type_settings['enable_property'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_property' );
        }
        if (isset($post_type_settings['enable_event']) && $post_type_settings['enable_event'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_event' );
        }
        if (isset($post_type_settings['enable_service']) && $post_type_settings['enable_service'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_service' );
        }
        if (isset($post_type_settings['enable_member']) && $post_type_settings['enable_member'] == 'on'){
		    $this->loader->add_action( 'init', $types, 'register_cpt_member' );
        }





		$taxes = new ACT_Divi_Taxonomies();

		$this->loader->add_action( 'init', $taxes, 'register_taxes_genre' );
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
	 * @return    ACT_Divi_Loader    Orchestrates the hooks of the plugin.
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



    /**
     * Creates the extension's main class instance.
     *
     * @since 1.0.0
     */
    public function act_initialize_divi_extension() {
        require_once plugin_dir_path( __FILE__ ) . 'AdvancedCustomTypesForDivi.php';
    }

    /**
     * Flush Rules for Divi Template.
     *
     * @since 1.0.0
     */
    public function act_flush_rewrite_rules() {
        if ( get_option( 'act_flush_rewrite_rules_flag' ) ) {
            flush_rewrite_rules();
            delete_option( 'act_flush_rewrite_rules_flag' );
        }
    }


    /**
     * Creates the plugin action links.
     *
     * @since 1.0.0
     */
    public function act_add_action_plugin( $actions, $plugin_file ) {
        static $plugin;

        if (!isset($plugin))
            $plugin = 'advanced-custom-types-divi/advanced-custom-types-divi.php';
        if ($plugin == $plugin_file) {
            $settings = array('settings' => '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=divi_supreme_settings') ) .'">' . __('Settings', 'act-divi') . '</a>');
            $license = array('license' => '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=act_license_page') ) .'">' . __('License', 'act-divi') . '</a>');

            $actions = array_merge($license, $actions);
            $actions = array_merge($settings, $actions);

        }
        return $actions;
    }


}
