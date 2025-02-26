<?php
/*
 * @link http://www.girltm.com      
 * @since      1.0.0
 * @package    APOYL_AICOMMENTS
 * @subpackage APOYL_AICOMMENTS/includes
 * @author     凹凸曼 <3201361925@qq.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class APOYL_AICOMMENTS {
	
	protected $loader;
	
	protected $plugin_name;
	
	protected $version;
	
	public function __construct() {
	    
		if ( defined( 'APOYL_AICOMMENTS_VERSION' ) ) {
			$this->version = APOYL_AICOMMENTS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'apoyl-aicomments';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();

	}
	
	private function load_dependencies() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/loader.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/i18n.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.php';
	

		$this->loader = new Apoyl_Aicomments_Loader();
	}
	
	private function set_locale() {
		$plugin_i18n = new Apoyl_Aicomments_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	
	private function define_admin_hooks() {
		$plugin_admin = new Apoyl_Aicomments_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action('admin_menu', $plugin_admin, 'menu');
        $this->loader->add_action('publish_post', $plugin_admin, 'publish_post_btn');
	
	}
	public function run() {
		$this->loader->run();
	}
	
	public function get_plugin_name() {
		return $this->plugin_name;
	}
	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}
}
?>