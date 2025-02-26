<?php
/**
 * Dashboard Settings Page
 */
 namespace ShopCred;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ShopCred_Dashboard {

	/**
	 * Components
	 */
	public $framework;
	
	/**
	 * Plugin base name
	 *
	 * @var string
	 */
	public $plugin_name = null;

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	private $version = '1.0.0';

	/**
	 * Holder for base plugin path
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    string
	 */
	private $plugin_path = null;

	/**
	 * Shopcred menu page slug
	 *
	 * @var string
	 */
	public $admin_page = 'shopcred';

	/**
	 * Constructor of the class
	 * @param
	 * @return void
	 * @since 1.0.0
	 */
	public function __construct() {

		$this->plugin_name = plugin_basename( __FILE__ );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

		//Init Setting Pages
		require base_init()->plugin_admin_path('setting-pages.php');
		new Admin_Setting_Pages();
		
	}
	
	/**
	 * Loading required scripts
	 * @param
	 * @return void
	 * @since 1.0.0
	 */	
	public function enqueue_admin_scripts( $hook ) {

		$module_data = base_init()->framework->get_included_module_data( 'cherry-x-vue-ui.php' );
		$ui          = new \CX_Vue_UI( $module_data );

		$ui->enqueue_assets();

        wp_enqueue_style( 'spc-notice-css', base_init()->plugin_url( 'admin/assets/css/admin-notice.css' ) );

		if( isset( $hook ) && $hook == 'toplevel_page_spc-settings' ) {
			wp_enqueue_style( 'spc-admin-css', base_init()->plugin_admin_url( 'assets/css/admin-style.css' ) );
			wp_enqueue_script( 'spc-admin-js', base_init()->plugin_admin_url( 'assets/js/admin-script.js' ), array( 'jquery' ), SPC_VER, true );
		}

		wp_localize_script(
			'spc-admin-js',
			'spc_admin_object',
			[
				'spc_site_url' => site_url(),
			]
		);

	}

	/**
	 * Register module assets
	 *
	 * @return [type] [description]
	 */
	public function assets() {

		$this->enqueue_module_assets();

		add_filter( 'shopcred-dashboard/js-page-config', array( $this, 'page_config' ), 10, 3 );

		add_filter( 'shopcred-dashboard/js-page-templates', array( $this, 'page_templates' ), 10, 3 );
	}


	/**
	 * Returns plugin version
	 *
	 * @return string
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Returns path to file or dir inside plugin folder
	 *
	 * @param  string $path Path inside plugin dir.
	 * @return string
	 */
	public function plugin_path( $path = null ) {

		if ( ! $this->plugin_path ) {
			$this->plugin_path = trailingslashit( plugin_dir_path( __FILE__ ) );
		}

		return $this->plugin_path . $path;
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
			$template = $this->plugin_path( 'templates/' . $name );
		}

		if ( file_exists( $template ) ) {
			return $template;
		} else {
			return false;
		}
	}


}

new ShopCred_Dashboard();