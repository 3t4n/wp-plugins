<?
/*
Plugin Name: Custom WPML Admin Menu (Unofficial Addon)
Plugin URI: http://www.clubdesign.at
Description: Replaces the default WPML Language Select in the Admin with a better one in the Admin Bar. Only makes sense if you are annoyed from the original Admin Language Switcher. This plugin is tested with the most recent versions of WPML.
Version: 0.6
Author: Marcus Pohorely
Author URI: http://www.clubdesign.at
*/

if (!defined('WPCWAM_PLUGIN_DIR')) define( 'WPCWAM_PLUGIN_DIR', dirname(__FILE__) );
if (!defined('WPCWAM_OPTIONS_NAME') ) define('WPCWAM_OPTIONS_NAME', 'wpcwam_options');


class WPCWAM {
	
	public $version = '0.6';

	public $version_field_name = 'wpcwam_version';
	public $options_field_name = WPCWAM_OPTIONS_NAME;

	public $pluginurl;
	private $updateurl;
	public $options;


	protected $gettext_domain = 'custom-wmpl-admin-menu';

	public function __construct() {

		load_plugin_textdomain( 'custom-wmpl-admin-menu', false, '/custom-wmpl-admin-menu/localization' );

		$this->pluginurl 				= plugins_url('', __FILE__);

		$this->get_options();
				
        register_activation_hook(  __FILE__, array( &$this, 'activate_plugin' ) );
        register_deactivation_hook( __FILE__, array( &$this,'deactive_plugin' ) );
		
		//action hooks
		add_action( 'admin_init', array( &$this, 'admin_init' ) );
		add_action( 'admin_enqueue_scripts', array( &$this, 'register_admin_scripts' ) );
		add_action( 'plugins_loaded', array( &$this,'check_version' ) );



		add_action('admin_bar_menu', array( &$this, 'admin_bar_menu' ), 35);

  	}

  	public function activate_plugin() {

		if(version_compare(PHP_VERSION, '5.2.0', '<')) { 
		  deactivate_plugins(plugin_basename(__FILE__)); // Deactivate plugin
		  wp_die("Sorry, but you can't run this plugin, it requires PHP 5.2 or higher."); 
		  return; 
		}
		
		$this->install();

	}

	public function deactive_plugin() {
			
		delete_option( $this->version_field_name );
			
	}

	public function admin_init() {
	}


	public function get_options() {
		
		if ( !$options = get_option( WPCWAM_OPTIONS_NAME ) ) {
			$options = array();
			update_option( WPCWAM_OPTIONS_NAME, $options);
		}
		$this->options = $options;

	}

	public function save_options() {

		return update_option( WPCWAM_OPTIONS_NAME, $this->options );

	}

	public function check_version() {
		
		if( get_option($this->version_field_name) != $this->version)
		    $this->upgrade();

	}

	public function register_admin_scripts() {
		
		wp_enqueue_style( 'wpcwam_admin_styles', $this->pluginurl . '/custom-wpml-admin-menu.css' );

	}

	public function admin_bar_menu() {
		global $wp_admin_bar;

		if( is_admin() ) {

			$html .= $this->get_include( WPCWAM_PLUGIN_DIR . '/custom-wpml-admin-js.php' );
			
			$wp_admin_bar->add_menu( array(
				'id' 		=> 'custom-wpml-menu',
				'parent' 	=> 'top-secondary',
				'title' 	=> '',
				'meta'		=> array(
											'html' => $html
										 )
			));

		}
	}

	private function get_include( $filename ) {

	    if( is_file( $filename ) ) {
	        ob_start();
	        include $filename;
	        $contents = ob_get_contents();
	        ob_end_clean();
	        return $contents;
	    }
	    return false;
	}

	public function install() {
	  

		add_option($this->version_field_name, $this->version);
	
    }

    private function upgrade() {

    }


}
$WPCWAM = new WPCWAM();


?>