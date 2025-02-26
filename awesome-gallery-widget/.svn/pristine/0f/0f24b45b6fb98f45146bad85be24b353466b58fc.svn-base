<?php
class AGWClass 
{
	function __construct(){
		add_action('admin_init', array(&$this,'agw_backend_scripts'));
		add_action('customize_controls_print_footer_scripts', array(&$this,'agw_backend_customize_scripts'));
		add_action('wp_enqueue_scripts', array(&$this,'agw_frontend_scripts'));
    }

	function agw_backend_scripts(){
		global $pagenow;
		if( is_admin() && $pagenow == 'widgets.php'){
			wp_enqueue_media();
			wp_enqueue_script('agw-admin-script', plugins_url('assets/js/agw_admin.js', __FILE__ ),'jquery', '1.0.0', TRUE);
			wp_enqueue_style('agw-admin-style',plugins_url('assets/css/agw_admin.css',__FILE__));
		}
	}
	
	function agw_backend_customize_scripts(){
		global $pagenow;
		if( is_admin() && $pagenow == 'customize.php' ){
			wp_enqueue_media();
			wp_enqueue_script('agw-admin-script', plugins_url('assets/js/agw_admin.js', __FILE__ ),'jquery', '1.0.0', TRUE);
			wp_enqueue_style('agw-admin-style',plugins_url('assets/css/agw_admin.css',__FILE__));
		}
	}
	
	function agw_frontend_scripts(){
		if(!is_admin()){
			wp_enqueue_media();
			wp_enqueue_script('agw-prettyPhoto-script', plugins_url('assets/js/jquery.prettyPhoto.js', __FILE__ ));
			wp_enqueue_script('agw-front-script', plugins_url('assets/js/agw_front.js', __FILE__ ) );
			wp_enqueue_style('agw-prettyPhoto-style',plugins_url('assets/css/prettyPhoto.css',__FILE__));
			wp_enqueue_style('agw-front-style',plugins_url('assets/css/agw_front.css',__FILE__));
		}
	}
}