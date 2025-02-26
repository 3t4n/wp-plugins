<?php
/*
Plugin Name: Advanced Facebook Page Promoter LightBox
Plugin Uri: http://infotheme.in/#contact
Version:2.0.1
Author: InfoTheme
Author uri: http://infotheme.in/
Description: Show a facebook page likebox in a popup, lightbox to promote your website's faceboook page, All your visitors can like your facebook page through your website. This plugin having a feature of responsive lightbox, means now your mobile user / visitors can like your page.
Tags: facebook lightbox, facebook likebox, fb page plugin, WordPress Plugin, facebook page plugin, facebook likebox promoter, facebook page promoter lightbox, facebook page promoter in mobile, responsive facebook page promoter lightbox, custom style facebook likebox, facebook page promote, facebook likebox popup, facebook page plugin popup, facebook likebox promotion, increase facebook likes, pages, category, posts, archive, homepage, plugin.
Text Domain: it_afbppl
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
?>
<?php

	/******************************************
	* BAckend / Plugin Settings Code Started
	*******************************************/
	
	// create plugin settings menu
	add_action('admin_menu', 'it_afbppl_create_menu');

	function it_afbppl_create_menu() {

		//create new options page
		add_options_page('Advanced Facebook Page Promoter Lightbox Settings', 'FB Lightbox Settings', 'manage_options', 'it_afbppl_settings', 'it_afbppl_settings_page');

		//call register settings function
		add_action( 'admin_init', 'register_it_afbppl_settings' );
	}

	function it_afbppl_admin_styles() {
		wp_register_style( 'afbppl_tabs_stylesheet', plugins_url( '/static/backend/tabs.css', __FILE__ ) );
		wp_register_style( 'afbppl_tabstyle_stylesheet', plugins_url( '/static/backend/tabstyles.css', __FILE__ ) );
		wp_register_script( 'afbppl_admin_script', plugins_url( '/static/backend/cbpFWTabs.js', __FILE__ ), array(), false, true);
		wp_enqueue_script( array('afbppl_admin_script'));
		wp_enqueue_style( array('afbppl_tabs_stylesheet','afbppl_tabstyle_stylesheet'));
		wp_enqueue_script('alpha-color-picker',
			plugins_url( '/static/backend/alpha-color-picker/alpha-color-picker.js', __FILE__ ),
			array( 'jquery', 'wp-color-picker' ),
			null,
			true
		);
		wp_enqueue_style(
			'alpha-color-picker',
			plugins_url( '/static/backend/alpha-color-picker/alpha-color-picker.css', __FILE__ ), // Update to where you put the file.
			array( 'wp-color-picker' ) // You must include these here.
		);
	}
		
add_action( 'admin_enqueue_scripts', 'it_afbppl_admin_styles' ); 
	function it_afbppl_frontend_styles() {	
			wp_enqueue_style( 'afbppl_frontend_style', plugins_url( '/static/frontend/afbppl-frontend.css', __FILE__ ), array(), false, false);
			wp_enqueue_script( 'afbppl_frontend_script', plugins_url( '/static/frontend/afbppl-frontend.js', __FILE__ ), array(), false, false);
			}
			
		add_action( 'wp_head', 'it_afbppl_frontend_styles' ); 

	function register_it_afbppl_settings() {
		//register settings
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_fburl' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_fbtab' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_title' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_appid' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_showIn' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_lb_delay' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_lb_in_day' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_lb_on_click' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_loggedin_user' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_fb_faces' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_fb_hide_cover' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_fb_sm_header' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_color_bglb' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_color_lb' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_color_bg' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_width_lb' );
		register_setting( 'it_afbppl-global-settings-group', 'it_afbppl_app_height_lb' );
	}


	function it_afbppl_settings_page() {
			include_once('admin/it_afbppl-admin-opt.php');
	}
	
	
	/******************************************
	* Backend / Plugin Settings Code END
	*******************************************/
	
	
	/***********************************************
	* Frontend / Plugin Frontend Functionality Code
	************************************************/
	function it_afbppl_frontend_imStandingOn()
	{
		if(is_home() || is_front_page())
		{
		$wpage_type='homepage';
		}elseif(is_archive())
		{
		$wpage_type='archive';
		}elseif(is_single() && !is_page()){
		$wpage_type='posts';
		}
		elseif(is_page()){
		$wpage_type='pages';
		}else{
		$wpage_type='none';
		}
		return $wpage_type;
	}
	
	function it_afbppl_frontend_html() {
			include_once('afbppl-lightbox-html.php');
	}
	
	add_action('wp_footer','it_afbppl_frontend_html');