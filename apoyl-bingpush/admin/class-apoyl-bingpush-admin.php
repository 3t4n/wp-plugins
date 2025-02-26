<?php
/*
 * @link       http://www.girltm.com/
 * @since      1.0.0
 * @package    Apoyl_Bingpush
 * @subpackage Apoyl_Bingpush/admin
 * @author     凹凸曼 <jar-c@163.com>
 *
 */
class Apoyl_Bingpush_Admin {

	
	private $plugin_name;

	
	private $version;

	
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		

	}
	
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/apoyl-bingpush-admin.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/apoyl-bingpush-admin.js', array( 'jquery' ), $this->version, false );

	}
	public function links($alinks){
	   
	 
	       $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=apoyl-bingpush-settings') ) .'">'.__('settingsname','apoyl-bingpush').'</a>';
           $alinks=array_merge($links,$alinks);
	
	    return $alinks;
	}
	public function menu(){
	    add_options_page(__('settings','apoyl-bingpush'),  __('settings','apoyl-bingpush'), 'manage_options','apoyl-bingpush-settings', array($this,'settings_page'));
	}
	public function settings_page(){
	    require_once plugin_dir_path(__FILE__).'partials/apoyl-bingpush-admin-display.php';
	}
	public function push_btn($post_ID)
	{
		global $wpdb;
		$arr = get_option('apoyl-bingpush-settings');
		$file=apoyl_bingpush_file('adminautopush');
		if($file){
			include $file;
		}
		
	}
}
