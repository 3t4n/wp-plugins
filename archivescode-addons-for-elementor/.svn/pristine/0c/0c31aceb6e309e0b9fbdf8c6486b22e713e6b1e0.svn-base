<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class AFE_Admin {
	private $_widget;
	private $_action;
	private $_afe_widget;
	private $_plugin_data = array();

	public function __construct() {

		//call afe-admin-notice
		require_once AFE_PLUGIN_DIR . 'includes/afe-widget.php';
		$this->_afe_widget = new AFE_Widget;

		// Initialize plugin data
		if( !function_exists( 'get_plugin_data' ) ){
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$this->_plugin_data = get_plugin_data(__FILE__);

		$this->_action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : false;
		$this->_widget = isset($_GET['widget']) ? sanitize_text_field($_GET['widget']) : false;

        $this->includes();
        $this->init_hooks();
    }

    public function includes(){}
    public function init_hooks(){
    	$this->_afe_widget->load_widgets(true);
    	add_action( 'admin_init', array( $this, 'admin_init' ) );
    	add_action('admin_menu', array($this, 'add_plugin_admin_menu'));
    }

    public function add_plugin_admin_menu() {

        add_menu_page(
            'AFE Addons Elementor',
            __('AFE Addons Elementor', AFE_SLUG),
            'manage_options',
            AFE_SLUG,
            array($this, 'display_settings_page'),
            AFE_PLUGIN_URL . 'admin/assets/images/icon.png'
        );
    }
    public function display_settings_page() {
        require_once('views/admin-header.php');
        require_once('views/settings.php');
        require_once('views/admin-footer.php');
    }

	/**
	 * Run on admin_init action
	 */
	public function admin_init(){
		$nonce = isset($_REQUEST['_wpnonce']) ? $_REQUEST['_wpnonce'] : false;

		switch ($this->_action) {

			case 'activate_widget':
					if( wp_verify_nonce( $nonce, 'activate_widget' ) && $this->_widget ) {
						$this->_afe_widget->activate_widget($this->_widget);
					}else{
						wp_die( __('Invalid request!', AFE_SLUG) );
					}
				break;

			case 'deactivate_widget':
					if( wp_verify_nonce( $nonce, 'deactivate_widget' ) && $this->_widget ) {
						$this->_afe_widget->deactivate_widget($this->_widget);
					}else{
						wp_die( __('Invalid request!', AFE_SLUG) );
					}
				break;
			
			default:
				# code...
				break;
		}

	}

}
new AFE_Admin;