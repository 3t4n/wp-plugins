<?php
/*
Plugin Name: Ajaxed Eegistration Page
Plugin URI: http://panateam.ir/plugins/
Description:In the name of Allah. this plugin let you to register in fast and easy way through ajax 
Version: 1.0
Author: panateam.ir
Author URI: http://panateam.ir/

*/

class pana_registeration_page{
	

	public function __construct()
	{
		global $pagenow;
		if ( is_admin() && isset( $_GET['activate'] ) && $pagenow == 'plugins.php' )
		{
			add_action('init', array('pana_registeration_page','pana_install_page'), 1);
		}
		add_shortcode('registeration_form', array('pana_registeration_page','pana_build_form'));
		add_action( 'login_form_register',  array('pana_registeration_page','pana_catch_register'));
		add_action('wp_enqueue_scripts',array('pana_registeration_page','pana_registeration_script'));
		add_action('wp_enqueue_scripts',array('pana_registeration_page','pana_registeration_style'));
		add_action('wp_ajax_pana_reg', array('pana_registeration_page','pana_reg_ajax'));
		add_action('wp_ajax_nopriv_pana_reg', array('pana_registeration_page','pana_reg_ajax')); // not really needed
		load_plugin_textdomain( 'pana_reg_localization', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
	}
	/*create a page after activation----------------------------------------------------------*/
	public function pana_install_page()
	{
		global $wpdb;
		
		$page_id = $wpdb->get_var("SELECT ID FROM " . $wpdb->posts . " WHERE post_name = 'registeration';");
	
		if (!$page_id) {
		
			$my_page = array(
				'post_status' => 'publish',
				'post_type' => 'page',
				'post_author' => 1,
				'post_name' => 'registeration',
				'post_title' => __('registeration page', 'pana_reg_localization'),
				'post_content' => '[registeration_form]'
			);
			$page_id = wp_insert_post($my_page);
			
		}

	}
	/*build the from and be shown through a shortcode---------------------------------------*/
	public function pana_build_form()
	{
		require_once('template/index.php');
	}
	/*redirect user to registeration page--------------------------------------------------*/
	public function pana_catch_register()
	{
		wp_redirect( home_url( '/registeration' ) );
    	exit(); 
	}
	/*adds plguin's script-----------------------------------------------------------------*/
	public function pana_registeration_script() 
	{
		wp_register_script( 'ajax-of-registeration', plugin_dir_url(__FILE__).'scripts/ajax.js' );
		wp_localize_script( 'ajax-of-registeration', 'panaregurl', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ),'PanaRegNonce' => wp_create_nonce( 'pana-registeration-nonce' ) ) );
		wp_enqueue_script( 'ajax-of-registeration' );
	}
	/*adds plguin's styles---------------------------------------------------------------*/
	public function pana_registeration_style() 
	{
		wp_register_style( 'style-of-registeration', plugin_dir_url(__FILE__).'styles/reg-page.css' );
		wp_register_style( 'style-of-registeration-rtl', plugin_dir_url(__FILE__).'styles/reg-page-rtl.css' );
		wp_enqueue_style( 'style-of-registeration' );
		if(is_rtl())
		{
			wp_enqueue_style( 'style-of-registeration-rtl' );
		}
	}
	public function pana_reg_ajax()
	{
		require_once('template/pana_reg_process.php');
		exit;
	}
	
}
/*create an instance-----------------------------------------------------------start---*/
new pana_registeration_page();
/*create an instance-----------------------------------------------------------end-----*/
?>