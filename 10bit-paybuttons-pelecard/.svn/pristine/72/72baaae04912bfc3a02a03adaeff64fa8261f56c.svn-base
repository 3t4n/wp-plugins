<?php
/**
 * Pelecard Pay Buttons
 * Plugin Name: Pelecard Pay Buttons
 * Description: Generate Pelecard Pay Buttons
 * Version: 1.0.0
 * Author: 10Bit
 * Author URI: http://www.10bit.co.il
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include '10bit-pelecard-paybuttons-options.php';
include '10bit-general-options.php';

add_action( 'admin_menu', 'register_10bit_menu_page' );
if (!function_exists('register_10bit_menu_page')) {
	function register_10bit_menu_page(){
		add_menu_page( 'General', '10Bit', 'manage_options', '10bit', 'general_10bit_options', plugins_url( '10bit-paybuttons-pelecard/images/10bit16x16.png' ), 6 ); 
		add_submenu_page('10bit', 'General', 'General', 'manage_options', '10bit' );
	}
}


add_action( 'admin_menu', 'register_10bit_submenu_pelecard_pay_buttons' );
if (!function_exists('register_10bit_submenu_pelecard_pay_buttons')) {
	function register_10bit_submenu_pelecard_pay_buttons(){
		add_submenu_page( '10bit', __('pelecard Pay Buttons','10bit-paybuttons-pelecard'), __('pelecard Pay Buttons','10bit-paybuttons-pelecard'), 'manage_options', '10bit_pelecard_pay_buttons', 'pelecard_pay_buttons_options' );
	}
}

if (!function_exists('general_10bit_options')) {
	function general_10bit_options(){
		}
}


add_action( 'plugins_loaded', 'paybuttons_pelecard_init' );

function paybuttons_pelecard_init() {

	load_plugin_textdomain( '10bit-paybuttons-pelecard', false, dirname( plugin_basename( __FILE__ ) ). '/languages/' );
	DEFINE ('PAYBUTTON_PELECARD_PLUGIN_DIR', plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) . '/' );
	DEFINE ('PAYBUTTON_PELECARD_GATEWAY_URL', 'https://gateway.pelecard.biz/');


	// [pelecard_pay_button value="123" item_name="My Item" button_class="my-class" button_text="Pay Now" header_text="Secured Payment" bottom_text="My store name"]
	function pelecard_pay_button_func( $atts ) {
		
		//$pelecard_pay_Buttons_headText=get_option('pelecard_pay_Buttons_headText');
		//$pelecard_pay_Buttons_bottomText=get_option('pelecard_pay_Buttons_bottomText');
		
		$paybutton_pelecard_args = array(
				
				'termNo'            => 	get_option( 'pelecard_pay_Buttons_termNo' ),
				'username'		=> 	get_option( 'pelecard_pay_Buttons_username' ),
				'password'			=> 	get_option( 'pelecard_pay_Buttons_password' ),
				'maxPayments' 		=> 	get_option( 'pelecard_pay_Buttons_max_Payments') ,
				'logo' 				=> 	get_option( 'pelecard_pay_Buttons_logo' ),
				'smallLogo' 		=> 	get_option( 'pelecard_pay_Buttons_smallLogo' ),
				'hidePciDssLogo' 	=> 	get_option( 'pelecard_pay_Buttons_hidePciDssLogo' )=='on'?'True':'False',
				'hidePelecardLogo' 	=>	get_option( 'pelecard_pay_Buttons_hidePelecardLogo' )=='on'?'True':'False',
				'styleSheetAddress'	=> 	get_option( 'pelecard_pay_Buttons_css' ),
				'total'             =>	$atts['value']*100,
				'parmx'             =>	$atts['item_name'],
				'goodUrl'           =>  get_option( 'pelecard_pay_Buttons_success_url' ),
				'errorUrl'          => 	get_option( 'pelecard_pay_Buttons_error_url' ),
				'currency' 			=> 	get_option( 'pelecard_pay_Buttons_currency' ),
				'minPaymentsNo'     => 	'',
				
				
				'Background'		=>	get_option( 'pelecard_pay_Buttons_Background' ),
		);


		foreach($paybutton_pelecard_args as $key => $value){
		  $paybutton_pelecard_args_array[] = "<input type='hidden' name='$key' value='$value'/>"; 
		}
		$result= '<form action="'.PAYBUTTON_PELECARD_GATEWAY_URL.'" method="post" id="pelecard_payment_form">'
				.implode('', $paybutton_pelecard_args_array) . '
			<input type="submit" class="'. $atts['button_class'].'" id="submit_pelecard_payment_form" value="'.$atts['button_text'].'" /> 
			</form>';
		return $result;
		
	}
	add_shortcode( 'pelecard_pay_button', 'pelecard_pay_button_func' );
}

?>