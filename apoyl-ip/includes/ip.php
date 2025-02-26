<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_IP
 * @subpackage APOYL_IP/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class APOYL_IP {
	
	protected $loader;
	
	protected $plugin_name;
	
	protected $version;
	
	public function __construct() {
	    
		if ( defined( 'APOYL_IP_VERSION' ) ) {
			$this->version = APOYL_IP_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'apoyl-ip';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}
	
	private function load_dependencies() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/loader.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/i18n.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/admin.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/public.php';
		$this->loader = new Apoyl_Ip_Loader();
	}
	
	private function set_locale() {
		$plugin_i18n = new Apoyl_Ip_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	
	private function define_admin_hooks() {
		$plugin_admin = new Apoyl_Ip_Admin( $this->get_plugin_name(), $this->get_version() );
			
		$this->loader->add_action('admin_menu', $plugin_admin, 'menu');
		$this->loader->add_action('save_post', $plugin_admin, 'save_ip');
		$this->loader->add_filter('plugin_action_links_'.APOYL_IP_PLUGIN_FILE, $plugin_admin, 'links',10, 2);
		

		
	}

	private function define_public_hooks() {

    		$plugin_public = new Apoyl_Ip_Public( $this->get_plugin_name(), $this->get_version() );
    		
    		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
    		$this->loader->add_action('the_author', $plugin_public, 'apoyl_ip_the_author');
    		$this->loader->add_action('get_comment_author', $plugin_public, 'apoyl_ip_get_comment_author');

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