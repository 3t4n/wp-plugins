<?php
if( !class_exists('kwm_info_basic') ){

	class kwm_info_basic{
		function __construct(){
			add_action( 'admin_menu', array($this, 'register_menu_kwm_info_basic') );
		}

		
		function register_menu_kwm_info_basic(){
			add_menu_page( 'KWM Info Basic', 'kwm info basic', 'manage_options', 'kwm-info-basic', array($this, 'kwm_admin_controller'), '' , 6 ); 
			add_action('admin_print_scripts', array($this, 'scripts_admin_kwm_info_basic'));
			add_action('admin_print_styles', array($this, 'style_admin_kwm_info_basic'));
		}

		function scripts_admin_kwm_info_basic(){
			wp_enqueue_script('admin-script', KWM_PLUGIN_URL . '/admin/js/kwm-info-basic.js');
		}

		function style_admin_kwm_info_basic(){
			wp_enqueue_style('admin-style', KWM_PLUGIN_URL . '/admin/css/kwm-info-basic.css');
		}

		function kwm_admin_controller(){
			include('admin/sistem-controller.php');
		}
	}

	function kwm_display_fucntion(){
		global $kwm;		
		if(!isset($kwm)){
			$kwm = new kwm_info_basic();
		}
		return $kwm;
	}

	kwm_display_fucntion();

	//Funções do plugin
	function get_kwm_all_infos($fields = ''){
		$returnKwm = get_option('kwm_info_basic');
		
		if($fields != ''){
			$returnKwm = $returnKwm[$fields];	
		}

		return $returnKwm;
	}

	include('frontend/telephones.php');
	include('frontend/mobile.php');
	include('frontend/address.php');
	include('frontend/social-network.php');

	add_shortcode( 'get_kwm_telephones', 'get_kwm_telephones' );
	add_shortcode( 'get_kwm_mobile_phones', 'get_kwm_mobile_phones' );
	add_shortcode( 'get_kwm_address_one', 'get_kwm_address_one' );
	
}
?>