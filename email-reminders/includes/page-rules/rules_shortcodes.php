<?php /**
 * @version 1.0
 * @description Rules
 * @category  Rules Shortcodes
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


	// <editor-fold     defaultstate="collapsed"                        desc=" == JS | CSS == "  >

	function oper_rules_register_scripts(){
			wp_register_script( 'oper-rules-shortcodes', 		plugins_url( 'rules_shortcodes.js',  __FILE__ ), array(), 0.1, true );
		//  wp_register_style(  'oper-rules-shortcodes-client', plugins_url( 'rules_shortcodes.css', __FILE__ ), array(), 0.1, 'all' );
	}

	function oper_rules_enqueue_scripts(){

		wp_enqueue_script(  'oper-rules-shortcodes' );
		wp_localize_script( 'oper-rules-shortcodes', 'oper_ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );		// Add ajax URL  to  the front-end side

		wp_enqueue_style(   'oper-rules-shortcodes-client' );
	}
	add_action( 'wp_enqueue_scripts', 'oper_rules_register_scripts' );
	add_action( 'wp_enqueue_scripts', 'oper_rules_enqueue_scripts' );

	// </editor-fold>


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FRONT-END  ( JavaScript ) shortcode execution   -  via page opening in Browser
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Run Rule shortcode in page with  JavaScript  - Run all items in Rule (no max count)
 *
 * @param array $attr           array(
										'is_silent' => false,	// Is show any text  in page,  after  shortcode execution
										'id'        => 1,		// int      <=  ID of Rule to  execute
									)
 *
 * @return false|string
 */
function oper_shortcode_rules__front_end( $attr ){

	$defaults = array(
		'is_silent'      => false,
		'id'             => 1
	);
	$params   = wp_parse_args( $attr, $defaults );

	//Esc ID	//FixIn: 2.0.5.1
	$params['id'] = intval($params['id']);

	ob_start();

	// On Page  JavaScript
	?>
	<script type="text/javascript">
		jQuery( document ).ready( function (){

			// Set Nonce for Ajax
			oper_rules__client.set_secure_param( 'nonce', '<?php echo wp_create_nonce( 'oper_rules_ajx' . '_opernonce' ); ?>' );
			oper_rules__client.set_secure_param( 'user_id', '<?php echo get_current_user_id(); ?>' );
			oper_rules__client.set_secure_param( 'locale', '<?php echo get_user_locale(); ?>' );

			oper_rules__ajx__front_end_run_rule( <?php echo $params['id']; ?> );
		} );
	</script><?php

	$return_content = ob_get_contents();
	ob_end_clean();

	return $return_content;
}
add_shortcode( 'email-reminders-rule-js', 'oper_shortcode_rules__front_end' );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CRON shortcode execution	(No JavaScript)
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Run Rule shortcode in page for CRON  - defining MAX COUNT of iterations
 * Example: [email-reminders-rule id=47 max_count=2000]
 *
 * @param array $attr           array(
										'is_silent' => false,	// Is show any text  in page,  after  shortcode execution
										'id'        => 1,		// int      <=  ID of Rule to  execute
										'max_count' => 1000		// Max number of contacts to process during shortcode execution, that fit to condition of rule,  starting from  last run of shortcode
									)
 *
 * @return false|string
 */
function oper_shortcode_rules__cron( $attr ){

	$defaults = array(
		'is_silent' => false,	// Is show any text  in page,  after  shortcode execution
		'id'        => 1,		// int      <=  ID of Rule to  execute
		'max_count' => 1000		// Max number of contacts to process during shortcode execution, that fit to condition of rule,  starting from  last run of shortcode
	);
	$params   = wp_parse_args( $attr, $defaults );

	ob_start();

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// CRON
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$_POST['action']   = 'OPER_RULES_RUN';
	$_POST['user_id']  = get_current_user_id();
	$_POST['nonce']    = wp_create_nonce( 'oper_rules_ajx' . '_opernonce' );
	$_POST['locale']   = get_user_locale();

	$_POST['is_cron']   = 1;
	$_POST['rules_id']  = intval( $params['id'] );
	$_POST['max_count'] = intval( $params['max_count'] );


	$rules_loading = new OPER_Rules_Run();
	$ajx_response  = $rules_loading->ajax_OPER_RULES_RUN();

	if ( ( ! empty( $ajx_response ) ) && ( empty( $params['is_silent'] ) ) ) {
		echo __( 'Finish checked at contact id', 'email-reminders' ) . ': ' . $ajx_response['last_contact_id'] . '<br/>';
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$return_content = ob_get_contents();
	ob_end_clean();

	return $return_content;
}
add_shortcode( 'email-reminders-rule', 'oper_shortcode_rules__cron' );