<?php
/*
 * @link        
 * @since      1.0.0
 * @package    APOYL_VIEWS
 * @subpackage APOYL_VIEWS/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
class APOYL_VIEWS {
	
	protected $loader;
	
	protected $plugin_name;
	
	protected $version;
	
	public function __construct() {
	    
		if ( defined( 'APOYL_VIEWS_VERSION' ) ) {
			$this->version = APOYL_VIEWS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'apoyl-views';
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
	

		$this->loader = new Apoyl_Views_Loader();
	}
	
	private function set_locale() {
		$plugin_i18n = new Apoyl_Views_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	
	private function define_admin_hooks() {
		$plugin_admin = new Apoyl_Views_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action('admin_menu', $plugin_admin, 'menu');
        $this->loader->add_action('manage_posts_columns', $plugin_admin, 'columns');
        $this->loader->add_action('manage_posts_custom_column', $plugin_admin, 'columns_value');
        $this->loader->add_action('save_post', $plugin_admin, 'my_first_save',10,3);
	}
    private function define_public_hooks() {
        $plugin_public = new Apoyl_Views_Public( $this->get_plugin_name(), $this->get_version());
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
        $this->loader->add_action('wp_head', $plugin_public, 'views_count');
        $this->loader->add_action('the_content', $plugin_public, 'display_count');
        $this->loader->add_action( 'wp_footer', $plugin_public, 'footer' );
        $this->loader->add_action('wp_ajax_apoyl_views_ajax', $plugin_public,'apoyl_views_ajax');
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