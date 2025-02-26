<?php
/**
 * EasyCard Pay Buttons
 * Plugin Name: EasyCard Pay Buttons
 * Description: Generate EasyCard Pay Buttons
 * Version: 1.0.0
 * Author: 10Bit
 * Author URI: http://www.10bit.co.il
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include '10bit-general-options.php';
include '10bit-easycard-paybuttons-options.php';

add_action( 'admin_menu', 'register_10bit_menu_page' );
if (!function_exists('register_10bit_menu_page')) {
	function register_10bit_menu_page(){
		add_menu_page( 'General', '10Bit', 'manage_options', '10bit', 'general_10bit_options', plugins_url( '10bit-paybuttons-easycard/images/10bit16x16.png' ), 6 ); 
		add_submenu_page('10bit', 'General', 'General', 'manage_options', '10bit' );
	}
}


add_action( 'admin_menu', 'register_10bit_submenu_easycard_pay_buttons' );
if (!function_exists('register_10bit_submenu_easycard_pay_buttons')) {
	function register_10bit_submenu_easycard_pay_buttons(){
		add_submenu_page( '10bit', __('EasyCard Pay Buttons','10bit-paybuttons-easycard'), __('EasyCard Pay Buttons','10bit-paybuttons-easycard'), 'manage_options', '10bit_easycard_pay_buttons', 'easycard_pay_buttons_options' );
	}
}

if (!function_exists('general_10bit_options')) {
	function general_10bit_options(){
		}
}


add_action( 'plugins_loaded', 'paybuttons_easycard_init' );
function paybuttons_easycard_init() {

	
	
	load_plugin_textdomain( '10bit-paybuttons-easycard', false, dirname( plugin_basename( __FILE__ ) ). '/languages/' );
	DEFINE ('PAYBUTTON_EASYCARD_PLUGIN_DIR', plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) . '/' );
	DEFINE ('PAYBUTTON_EASYCARD_GATEWAY_URL', 'https://secure.e-c.co.il/easycard/createform.asp');

	// [easycard_pay_button value="123" item_name="My Item" button_class="my-class"]
	function easycard_pay_button_func( $atts ) {
		
		$paybutton_easycard_args = array(
				'ClientID'			=> 	get_option('easycard_pay_buttons_client_id'),
				'ECPwd'				=> 	get_option('easycard_pay_buttons_password'),
				'Sum'				=> 	$atts['value'],
				'MType'		 		=>1, // ש"ח
				'MaxPayments'		=> 	get_option('easycard_pay_buttons_maxPayments'),
				'StateData'			=> $atts['item_name'],
		);
		if (get_option('easycard_pay_buttons_maxPayments')>1){
			$paybutton_easycard_args['MinPayments']=1	;
		}


		//$paybutton_easycard_args_array = array();
		foreach($paybutton_easycard_args as $key => $value){
		  $paybutton_easycard_args_array[] = "<input type='hidden' name='$key' value='$value'/>";
		}
		$result= '<form action="'.PAYBUTTON_EASYCARD_GATEWAY_URL.'" method="get" id="easycard_payment_form">'
				.implode('', $paybutton_easycard_args_array) . '
			<input type="submit" class="'. $atts['button_class'].'" id="submit_easycard_payment_form" value="'.$atts['button_text'].'" /> 
			</form>';
		return $result;
		
	}
	add_shortcode( 'easycard_pay_button', 'easycard_pay_button_func' );
}
?>