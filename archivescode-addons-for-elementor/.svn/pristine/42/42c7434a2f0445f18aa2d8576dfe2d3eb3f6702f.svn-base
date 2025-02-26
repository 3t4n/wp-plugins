<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class AFE_Widget {
	const widgets_dir = 'widgets';
	private $_notices = array();

	public $_widgets_activated = array();
	public $_widgets_installed = array();

	private $_afe_notice;

	private $_plugin_data = array();

	public function __construct() {
		//call afe-admin-notice
		require_once AFE_PLUGIN_DIR . 'includes/afe-notices.php';
		$this->_afe_notice = new AFE_Notice;
		// Initialize plugin data
		if( !function_exists( 'get_plugin_data' ) ){
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$this->_plugin_data = get_plugin_data(__FILE__);
   }

    public function display_settings_page() {
        require_once('views/admin-header.php');
        require_once('views/settings.php');
        require_once('views/admin-footer.php');
    }

    /**
	 * Check if widget is activated
	 */
	public function is_widget_active($widget){
		return isset( $this->_widgets_activated[$widget] );
	}

	/**
	 * Save all activated widgets data to database
	 */
	public function save_activated_widgets(){
		return update_option( 'afe_widgets', $this->_widgets_activated );
	}

	/**
	 * Delete all activated widgets data from database
	 */
	public function delete_activated_widgets(){
		return delete_option( 'afe_widgets' );
	}

	/**
	 * Load widgets
	 */
	public function load_widgets( $run = false ){

		$this->_widgets_activated = get_option( 'afe_widgets', array() );

		foreach(glob($this->get_widget_dir()."/*.php") as $widget_file){
			$widget_name = basename($widget_file, ".php");
			$file_data = get_file_data($widget_file, $this->get_widget_data());
			if(!empty($file_data['name'])){
				$this->_widgets_installed[$widget_name] = array(
					'data' => $file_data,
					'file' => basename($widget_file)
				);
			}
		}

	}

	/**
	 * Flush activated widgets data
	 */
	public function flush_widgets(){
		foreach ($this->_widgets_activated as $key => $widget) {
			if(isset($this->_widgets_installed[$key]) && $this->is_widget_exists($key, $widget['file'])){
				$this->_widgets_activated[$key] = $this->_widgets_installed[$key];
			}else{
				unset($this->_widgets_activated[$key]);
				$this->_afe_notice->add_admin_notice('error', sprintf(__('The widget %s has been deactivated due to an error: widget file does not exist.', AFE_SLUG), $widget['data']['name']));
				$this->_afe_notice->admin_notices();
			}
		}
		$this->save_activated_widgets();
	}

	/**
	 * Check if widget file is exists
	 */
	public function is_widget_exists($dir, $file){
		return file_exists( $this->get_widget_path( $dir, $file ) );
	}

	/**
	 * Activate widget
	 */
	public function activate_widget( $widget ){
		if(!$this->is_widget_active( $widget )){
			$this->_widgets_activated[$widget] = $this->_widgets_installed[$widget];
			$this->save_activated_widgets();
			$this->_afe_notice->add_admin_notice('updated', __('widget activated.', AFE_SLUG));
			$this->_afe_notice->admin_notices();
			do_action('afe_widget_activated', $widget, $this->_widgets_activated[$widget]);
			return true;
		}else{
			return false;
		}
	}

	/**
	 * Deactivate widget
	 */
	public function deactivate_widget( $widget ){
		if($this->is_widget_active( $widget )){
			do_action('afe_widget_deactivated', $widget, $this->_widgets_activated[$widget]);
			unset($this->_widgets_activated[$widget]);
			$this->save_activated_widgets();
			$this->_afe_notice->add_admin_notice('updated', __('widget deactivated.', AFE_SLUG));
			$this->_afe_notice->admin_notices();
			return true;
		}else{
			return false;
		}
	}

	/**
	 * Get widgets base directory
	 */
	public function get_widget_dir(){
		return AFE_PLUGIN_DIR . DIRECTORY_SEPARATOR . self::widgets_dir . DIRECTORY_SEPARATOR;	
	}

	/**
	 * Get widget file path
	 */
	public function get_widget_path( $dir, $file ){
		return $this->get_widget_dir() . $dir . DIRECTORY_SEPARATOR . $file;	
	}

	/**
	 * Get widgets header data
	 */
	public function get_widget_data(){
		return array(
			'name' => 'AFE Widget',
			'description' => 'Description', 
			'version' => 'Version',
			'author_name' => 'Author Name',
			'author_url' => 'Author URL'
		);
	}
}
