<?php
/**
 * 
 * Plugin Main Class
 * 
 * @package ShopCred Pro
 */

namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin Main Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Base {

    /**
     * Instance
     *
     * @since 1.0.0
     *
     * @access private
     * @static
     *
     * @var Base The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Plugin version
     *
     * @var string
     */
    private $version = '1.0.0';
    	
	/**
	 * Plugin base name
	 *
	 * @var string
	 */
	public $plugin_name = null;

    /**
     * Holder for base plugin URL
     *
     * @since  1.0.0
     * @access private
     * @var    string
     */
    private $plugin_url = null;

    /**
     * Holder for base plugin path
     *
     * @since  1.0.0
     * @access private
     * @var    string
     */
    private $plugin_path = null;

	/**
	 * Components
	 */
	public $framework;

    /**
     * Constructor
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function __construct() {

        $this->plugin_name = 'shopcred/shopcred.php';

        // Load framework
		add_action( 'plugins_loaded', array( $this, 'framework_loader' ), -20 );

        // Internationalize the text strings used.
        add_action( 'init', array( $this, 'i18n' ), -999 );

        // Load files.
        add_action( 'init', array( $this, 'init' ), -999 );
       
        if ( is_admin() ) {
            // Shopcred Dashboard Init
            add_action( 'init', array( $this, 'dashboard_init' ), -999 );
            // Admin Init
            add_action( 'init', array( $this, 'admin_init' ), -999 );
        }
    
    }


    /**
	 * Load framework modules
	 *
	 * @return [type] [description]
	 */
	public function framework_loader() {

		// require_once SPC_ADMIN . 'loader.php';
		require $this->plugin_admin_path( 'loader.php' );

		$this->framework = new \ShopCred_CX_Loader(
			array(
		
				$this->plugin_admin_path( 'vue-ui/cherry-x-vue-ui.php' ),
				$this->plugin_admin_path( 'shopcred-dashboard/shopcred-dashboard.php' ),
			
			)
		);
		
	}

    /**
     * Returns plugin version
     * 
     * @since  1.0.0
     * @return string
     */
    public function get_version() {
        return $this->version;
    }

    /**
     * Loads the translation files.
     *
     * @since  1.0.0
     * @access public
     */
    public function i18n() {
        load_plugin_textdomain( 'shopcred', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
    }

    /**
     * Manually init required modules
     */
    public function init() {
        // Load required files
        $this->load_files();

    }

    /**
     * Load required files.
     * 
     * @since  1.0.0
     * @access public
     */
    public function load_files() {

        // Load necessary files.
        require $this->plugin_path('includes/class-helper.php');
        require $this->plugin_path('includes/class-block-data.php');

        require $this->plugin_path('includes/class-defaults.php');
        require $this->plugin_path('includes/class-generate-css.php');
        require $this->plugin_path('includes/class-dynamic-css.php');
        require $this->plugin_path('includes/class-enqueue-css.php');
        require $this->plugin_path('includes/class-blocks-manager.php');
        require $this->plugin_path('includes/class-global-attributes.php');
        require $this->plugin_path('includes/class-rest.php');

        require_once base_init()->plugin_admin_path( 'settings-config.php' );
        
        require $this->plugin_path('includes/class-enqueue.php');
        require $this->plugin_path('includes/class-render-blocks.php');
        require $this->plugin_path('includes/class-woo-quickview.php');

        require $this->plugin_admin_path( 'rest-api/rest-api.php');

        if ( !is_plugin_active( SPC_PLUGIN_PRO_FOLDER_NAME_TYPE1.'/shopcred-pro.php' ) ) {
            require $this->plugin_path('includes/builder/class-builder-admin.php');
            
        }
        if ( class_exists( 'woocommerce' ) && !is_plugin_active( SPC_PLUGIN_PRO_FOLDER_NAME_TYPE1.'/shopcred-pro.php' ) ) {
            include $this->plugin_path('includes/builder/woo-builder-init.php');
        }

    }

    /**
     * Returns path to file or dir inside plugin folder
     *
     * @param string $path Path inside plugin dir.
     *
     * @return string
     */
    public function plugin_path( $path = null ) {

        if ( ! $this->plugin_path ) {
            $this->plugin_path = trailingslashit( plugin_dir_path( SPC_FILE ) );
        }

        return $this->plugin_path . $path;

    }

    /**
     * Returns path to file or dir inside plugin admin folder
     *
     * @param string $path Path inside plugin dir.
     *
     * @return string
     */
    public function plugin_admin_path( $path = null ) {

        if ( ! defined('SPC_ADMIN')) {
            return;
        }
        return SPC_ADMIN . $path;

    }

    /**
     * Returns url to file or dir inside plugin folder
     *
     * @param string $path Path inside plugin dir.
     *
     * @return string
     */
    public function plugin_url( $path = null ) {

        if ( ! $this->plugin_url ) {
            $this->plugin_url = trailingslashit( plugin_dir_url( SPC_FILE ) );
        }

        return $this->plugin_url . $path;

    }

    /**
     * Returns url to file or dir inside plugin admin folder
     *
     * @param string $path Path inside plugin dir.
     *
     * @return string
     */
    public function plugin_admin_url( $path = null ) {

        if ( ! defined('SPC_ADMIN_URL')) {
            return;
        }

        return SPC_ADMIN_URL . $path;

    }
    
    /**
     * Get the template path.
     *
     * @return string
     */
    public function template_path() {
        return apply_filters( 'shopcred/template-path', 'shopcred/' );
    }

    /**
     * Returns path to template file.
     *
     * @return string|bool
     */
    public function get_template( $name = null ) {

        $template = locate_template( $this->template_path() . $name );

        if ( ! $template ) {
            $template = $this->plugin_path( 'includes/templates/' . $name );
        }

        if ( file_exists( $template ) ) {
            return $template;
        } else {
            return false;
        }

    }

    /**
     * Init Admin
     */
    public function admin_init() {
        require $this->plugin_admin_path('class-dashboard-settings.php');
    }

 	/**
	 * Init the ShopcredDashboard module
	 *
	 * @return void
	 */
	public function dashboard_init() {

        $shopcred_dashboard_module_data = $this->framework->get_included_module_data( 'shopcred-dashboard.php' );

        $shopcred_dashboard = \ShopCred\Dashboard::get_instance();

        $shopcred_dashboard->init( array(
            'path'           => $shopcred_dashboard_module_data['path'],
            'url'            => $shopcred_dashboard_module_data['url'],
            'cx_ui_instance' => array( $this, 'shopcred_dashboard_ui_instance_init' ),
            'plugin_data'    => array(
                'slug'    => 'shopcred',
                'file'    => 'shopcred/shopcred.php',
                'version' => $this->get_version(),
                'plugin_links' => array(
                    array(
                        'label'  => esc_html__( 'Settings', 'shopcred' ),
                        'url'    => add_query_arg( array( 'page' => 'shopcred' ), admin_url( 'admin.php' ) ),
                        'target' => 'self',
                    ),
                ),
            ),
        ) );
		
	}

    /**
	 * Get Vue UI Instance for ShopcredDashboard module
	 *
	 * @return CX_Vue_UI
	 */
	public function shopcred_dashboard_ui_instance_init() {
		$cx_ui_module_data = $this->framework->get_included_module_data( 'cherry-x-vue-ui.php' );

		return new \CX_Vue_UI( $cx_ui_module_data );
	}

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     *
     * @access public
     * @static
     *
     * @return Base An instance of the class.
     */
    public static function get_instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }
}

if ( ! function_exists( 'base_init' ) ) {

	/**
	 * Returns instance of the plugin class.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	function base_init() {
		return Base::get_instance();
	}

}

base_init();
