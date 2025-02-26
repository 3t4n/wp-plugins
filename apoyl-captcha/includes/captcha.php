<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    APOYL_CAPTCHA
 * @subpackage APOYL_CAPTCHA/includes
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class APOYL_CAPTCHA {
	
	protected $loader;
	
	protected $plugin_name;
	
	protected $version;
	
	public function __construct() {
	    
		if ( defined( 'APOYL_CAPTCHA_VERSION' ) ) {
			$this->version = APOYL_CAPTCHA_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'apoyl-captcha';
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
		$this->loader = new Apoyl_Captcha_Loader();
	}
	
	private function set_locale() {
		$plugin_i18n = new Apoyl_Captcha_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	
	private function define_admin_hooks() {
		$plugin_admin = new Apoyl_Captcha_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action('admin_menu', $plugin_admin, 'menu');

		

		
	}

	private function define_public_hooks() {

    		$plugin_public = new Apoyl_Captcha_Public( $this->get_plugin_name(), $this->get_version() );
    		$this->loader->add_action('login_enqueue_scripts', $plugin_public, 'enqueue_styles');
     		
    		$this->loader->add_action( 'register_form',$plugin_public,'register');
    		$this->loader->add_action('wp_ajax_nopriv_apoyl_captcha_ajax', $plugin_public,'apoyl_captcha_ajax');
    

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