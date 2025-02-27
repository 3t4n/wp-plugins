<?php 

class WPTD_Image_Compare_Settings {
	
	private static $_instance = null;
	
	public function __construct() {

		//WPTD Image Compare admin menu
		add_action( 'admin_menu', array( $this, 'wptd_admin_menu' ) );
		
		//WPTD Image Compare admin scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'wptd_admin_scripts' ) );
		
		//Plugin Links
		add_filter( 'plugin_action_links', array( $this, 'wptd_imgc_plugin_action_links' ), 90, 2 );
				
	}
	
	public function wptd_admin_menu() {
		add_menu_page( 
			esc_html__( 'WPTD Image Compare', 'wptd-image-compare' ),
			esc_html__( 'WPTD Image Compare', 'wptd-image-compare' ),
			'manage_options',
			'wptd-image-compare', 
			array( $this, 'wptd_imgc_page' ),
			'dashicons-image-flip-horizontal',
			6
		);
	}
	
	public function wptd_admin_scripts(){
		if( isset( $_GET['page'] ) && $_GET['page'] == 'wptd-image-compare' ){
			wp_enqueue_style( 'wptd-image-compare-admin', WPTD_IMGC_URL . 'admin/assets/css/style.css', array(), '1.0.0', 'all' );
		}
	}
	
	public function wptd_imgc_page() {
		require_once ( WPTD_IMGC_DIR . 'admin/admin-page.php' );
	}
	
	public function wptd_imgc_plugin_action_links( $plugin_actions, $plugin_file ){		
		$new_actions = array(); 
		if( 'wptd-image-compare/wptd-image-compare.php' === $plugin_file ) {
			$new_actions = array( sprintf( __( '<a href="%s">Settings</a>', 'wptd-image-compare' ), esc_url( admin_url( 'admin.php?page=wptd-image-compare' ) ) ) );
		}
		return array_merge( $new_actions, $plugin_actions );
	}
	
	/**
	 * Creates and returns an instance of the class
	 * @since 1.0.0
	 * @access public
	 * return object
	 */
	public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

}
WPTD_Image_Compare_Settings::get_instance();