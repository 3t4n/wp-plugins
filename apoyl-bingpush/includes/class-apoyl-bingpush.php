<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    Apoyl_Bingpush
 * @subpackage Apoyl_Bingpush/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Bingpush {
	
	protected $loader;
	
	protected $plugin_name;
	
	protected $version;
	
	public function __construct() {
	    
		if ( defined( 'APOYL_BINGPUSH_VERSION' ) ) {
			$this->version = APOYL_BINGPUSH_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'apoyl-bingpush';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}
	
	private function load_dependencies() {
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-apoyl-bingpush-loader.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-apoyl-bingpush-i18n.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-apoyl-bingpush-admin.php';
	
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-apoyl-bingpush-public.php';
		$this->loader = new Apoyl_Bingpush_Loader();
	}
	
	private function set_locale() {
		$plugin_i18n = new Apoyl_Bingpush_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	
	private function define_admin_hooks() {
		$plugin_admin = new Apoyl_Bingpush_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action('admin_menu', $plugin_admin, 'menu');
		$this->loader->add_action('save_post', $plugin_admin, 'push_btn');
		$this->loader->add_filter('plugin_action_links_'.APOYL_BINGPUSH_PLUGIN_FILE, $plugin_admin, 'links',10, 2);
		
	}

	private function define_public_hooks() {
	    $arr=get_option('apoyl-bingpush-settings');
	    if(isset($arr['site'])&&isset($arr['secret'])){
    		$plugin_public = new Apoyl_Bingpush_Public( $this->get_plugin_name(), $this->get_version() );
    		$this->loader->add_action('wp_enqueue_style', $plugin_public, 'enqueue_styles');
    	    $this->loader->add_action('the_content', $plugin_public, 'push_btn');
    		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
    		$this->loader->add_action( 'wp_footer', $plugin_public, 'footer' ); 
    		$this->loader->add_action('wp_ajax_apoyl_bingpush_ajaxpush', $plugin_public,'apoyl_bingpush_ajaxpush');
	    }
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