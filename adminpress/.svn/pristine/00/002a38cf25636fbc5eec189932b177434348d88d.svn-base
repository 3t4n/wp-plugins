<?php
/*
Plugin Name: Adminpress - WordPress Admin Theme
Plugin URI: http://bappi-d-great.com
Description: The best admin theme for wordpress
Version: 1.3
Author: bappi.d.great
Author URI: http://bappi-d-great.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if( ! class_exists( 'AdminPress' ) ) {
	
	/*
	 * Main class of the plugin
	 */
	class AdminPress{
		
		
		/*
		 * Variable of parent class
		 */
		public $plugin_url;
	    public $plugin_dir;
		public $version;
		public $options;
		public $modules_dir;
		
		
		/*
		 * Constructor
		 * 
		 * Most of the hooks are called here
		 */
		public function __construct() {
			
			$this->plugin_dir = WP_PLUGIN_DIR . '/adminpress/';
	        $this->plugin_url = plugins_url( '/', __FILE__ );
			$this->version = '0.1';
			$this->modules_dir = $this->plugin_dir . 'modules';
			$this->options = $this->get_settings();
			
			register_activation_hook( __FILE__, array( $this, 'menu_tables_install' ) );
			//add_action( 'init', array( $this, 'admp_load_textdomain' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'adminpress_admin_theme_style' ) );
			add_action( 'login_enqueue_scripts', array( $this, 'adminpress_admin_theme_style' ) );
			add_action( 'login_head', array( $this, 'login_internal_style' ) );
			add_action( 'admin_head', array( $this, 'admin_internal_style' ) );
			add_action( 'admin_menu', array( $this, 'register_adminpress_page' ) );
			add_action( 'admin_notices', array( $this, 'adminpress_admin_notice' ) );
			add_action( 'admin_footer', array( $this, 'quick_link' ) );
			
		}
		
		
		/*
		 * 
		 */
		 public function menu_tables_install() {
		 	do_action( 'plg_tables_installed' );
		 }
		 
		  
		
		/*
		 * Attaching language file with the plugin
		 */
		public function admp_load_textdomain() {
			load_plugin_textdomain( 'admp', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
		}
		
		
		/*
		 * Adding stylesheet and script in the plugin
		 */
		public function adminpress_admin_theme_style() {
		 	wp_enqueue_media();
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'adminpress-admin-theme', $this->plugin_url . 'assets/css/adminpress.css', false, $this->version );
			wp_enqueue_style( 'adminpress-font-awesome', $this->plugin_url . 'assets/css/font-awesome.min.css', false, $this->version );
			wp_register_script( 'adminpress-js', $this->plugin_url . 'assets/js/adminpress.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-sortable' ), $this->version );
			wp_localize_script( 'adminpress-js', 'data', array(
				'media_box_title' => __( 'Custom Image', 'admp' ),
				'media_btn_txt' => __( 'Upload Image', 'admp' )
			) );
			wp_enqueue_script( 'adminpress-js' );
		 }
		
		
		/*
		 * Get stored data
		 */
		public function get_settings() {
			return get_option( 'admp' );
		}
		
		
		/*
		 * Include dynamic style for admin page
		 */
		public function admin_internal_style() {
			include $this->plugin_dir . 'includes/admin-internal.php';
		}
		
		
		/*
		 * Include dynamic style for login page
		 */		
		public function login_internal_style() {
			include $this->plugin_dir . 'includes/login-internal.php';
		}
		
		
		/*
		 * Registering admin menu for the plugin
		 */
		public function register_adminpress_page() {
			add_menu_page( 'Adminpress', 'Adminpress', 'manage_options', 'adminpress', array( $this, 'admin_settings_page' ) );
		}
		
		
		/*
		 * Main form
		 */ 
		public function admin_settings_page() {
			
			if( isset( $_POST['adminpress_option'] ) || isset( $_REQUEST['adminpress_nonce_field'] ) ){
				if ( ! check_admin_referer( 'adminpress_nonce_action', 'adminpress_nonce_field' )){echo 100;
					if( ! wp_verify_nonce( $_REQUEST['adminpress_nonce_field'], 'adminpress_nonce_action' ) ) echo 100;
		            	return;
					return;
		        }
				
				if( isset( $_POST['admp'] ) ){
					$d = apply_filters( 'submitted_data', $_POST );
					$admp = $d['admp'];
				}
				else
					$admp = array();
				
				if( count( $admp ) > 0 )
					update_option( 'admp', $admp );
				
				do_action( 'save_adminpress_data', $_POST, $_REQUEST );
			
				wp_redirect( admin_url( 'admin.php?page=adminpress&&done_action=saved' ) );
				exit;
				
			}
			
			
			$form = '';
			?>
			<form action="<?php echo admin_url( 'admin.php?page=adminpress&noheader=true' ) ?>" method="post" class="adminpress_form">
				<?php wp_nonce_field('adminpress_nonce_action','adminpress_nonce_field'); ?>
				<div class="wrap adminpress_form">
					<h2><?php _e( 'Adminpress Settings', 'admp' ); ?></h2>
					<div class="admp_content metabox-holder">
						<?php
						echo apply_filters( 'adminpress_form', $form );
						?>
						<input class="button button-primary" type="submit" name="adminpress_option" value="<?php _e( 'Save Settings', 'admp' ) ?>" />
					</div>
				</div>
			</form>
			<?php
		}
		
		
		/*
		 * Notices for the plugin
		 */ 
		public function adminpress_admin_notice() {
			if( isset( $_REQUEST['done_action'] ) ){
				switch( $_REQUEST['done_action'] ) {
					case 'saved':
						?>
						<div class="updated">
					        <p><?php _e( 'Settings Saved!', 'admp' ); ?></p>
					    </div>
						<?php
						break;
				}
			}
		}
		
		public function quick_link() {
			?>
			<div class="qlinks">
						<a title="Quick Panel" href="#"><i class="fa fa-cogs"></i></a>
					</div>
					<div class="qlinks_box">
						<h4 class="title"><?php _e( 'Quick Links', 'admp' ) ?></h4>
						<div class="qlinks_contact">
							<h4><?php _e( 'Add New', 'admp' ) ?></h4>
							<ul>
								<li><a href="<?php echo admin_url( 'post-new.php' ) ?>"><i class="fa fa-file-text-o"></i></a></li>
								<li><a href="<?php echo admin_url( 'post-new.php?post_type=page' ); ?>"><i class="fa fa-file"></i></a></li>
								<li><a href="<?php echo admin_url( 'media-new.php' ); ?>"><i class="fa fa-picture-o"></i></a></li>
								<li><a href="<?php echo admin_url( 'plugin-install.php' ); ?>"><i class="fa fa-plug"></i></a></li>
								<li><a href="<?php echo admin_url( 'user-new.php' ); ?>"><i class="fa fa-user"></i></a></li>
								<li><a href="<?php echo admin_url( 'theme-install.php' ); ?>"><i class="fa fa-folder-o"></i></a></li>
							</ul>
							<h4><?php _e( 'Elements', 'admp' ) ?></h4>
							<ul>
								<li><a href="<?php echo admin_url( 'themes.php' ) ?>"><i class="fa fa-image"></i></a></li>
								<li><a href="<?php echo admin_url( 'widgets.php' ) ?>"><i class="fa fa-list-alt"></i></a></li>
								<li><a href="<?php echo admin_url( 'nav-menus.php' ) ?>"><i class="fa fa-th-list"></i></a></li>
								<li><a href="<?php echo admin_url( 'theme-editor.php' ) ?>"><i class="fa fa-edit"></i></a></li>
								<li><a href="<?php echo admin_url( 'customize.php' ) ?>"><i class="fa fa-credit-card"></i></a></li>
							</ul>
							<h4><?php _e( 'Manage', 'admp' ) ?></h4>
							<ul>
								<li><a href="<?php echo admin_url( 'options-general.php' ) ?>"><i class="fa fa-cog"></i></a></li>
								<li><a href="<?php echo admin_url( 'options-permalink.php' ) ?>"><i class="fa fa-link"></i></a></li>
								<li><a href="<?php echo admin_url( 'plugins.php' ) ?>"><i class="fa fa-puzzle-piece"></i></a></li>
								<li><a href="<?php echo admin_url( 'users.php' ) ?>"><i class="fa fa-users"></i></a></li>
							</ul>
							<button class="close_box button button-primary"><?php _e( 'Close', 'admp' ) ?></button>
						</div>
					</div>
			<?php
		}
		
		
		/*
		 * Function to change hexa color code to rgb mode
		 */ 
		public function hex2rgb($hex) {
		  	$hex = str_replace("#", "", $hex);
		
		  	if(strlen($hex) == 3) {
		    	$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		    	$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		    	$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		 	} else {
		    	$r = hexdec(substr($hex,0,2));
		    	$g = hexdec(substr($hex,2,2));
		    	$b = hexdec(substr($hex,4,2));
		   	}
		   	$rgb = array($r, $g, $b);
		   	return implode(",", $rgb); // returns the rgb values separated by commas
		   	//return $rgb; // returns an array with the rgb values
		 }
		
	}

	
	/*
	 * Function to find the end string
	 * 
	 * @param: String to be tested
	 * @param: the sliced string
	 * 
	 * @return: true/false
	 */
	function endswith($string, $test) {
	    $strlen = strlen($string);
	    $testlen = strlen($test);
	    if ($testlen > $strlen) return false;
	    return substr_compare($string, $test, $strlen - $testlen, $testlen) === 0;
	}
	
	// Creating instance
	$adminPress = new AdminPress();
	
	// Adding modules
	$modules = scandir( $adminPress->modules_dir );
	foreach( $modules as $module ){
		if( $module != '.' && $module != '..' && strpos($module, "class.") === 0 && endswith( $module, '.php' ) ){
			include $adminPress->plugin_dir . 'modules/' . $module;
		}
	}
	
}

function admp_load_textdomain() {
		load_plugin_textdomain( 'admp', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
	}

add_action( 'init', 'admp_load_textdomain' );
