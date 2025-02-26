<?php
/**
 * Plugin Name:       Headless WordPress
 * Plugin URI:        headless-wp
 * Description:       Use WordPress as a headless CMS. Integrate any frontend environment using WP REST APIs or create Custom APIs.
 * Version:           1.0.3
 * Author:            miniOrange
 * Author URI:        https://miniorange.com
 * License:           MIT/Expat
 * License URI:       https://docs.miniorange.com/mit-license
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'HEADLESS_SITE_VERSION', '1.0.3' );

require plugin_dir_path( __FILE__ ) . 'includes/class-headless-site.php';

function mo_headless_run_headless_site() {

	$plugin = new Mo_Headless_Site();
	$plugin->run();

}
mo_headless_run_headless_site();

add_action('rest_api_init', function () {

	$GetVar = get_option('CUSTOM_API_WP_LIST');

	if( !empty($GetVar) ) {
		foreach ($GetVar as $ApiName => $value) {
			$namespace = 'mo/v1';
			$route = '';
			if ($value['SelectedCondtion'] == 'no condition') {
				$route = $ApiName;
			} else {
				$route = $ApiName . '/(?P<id>[A-Za-z0-9]+)';
			}
			register_rest_route($namespace, $route, array(
				'methods'  => 'GET',
				'callback' => 'mo_headless_get_result',
				'args' => $value,
	            'permission_callback' =>'__return_true'
			));
		}
	}
});

function mo_headless_get_result($request)
{

	global $wpdb;


	$need =  $request->get_attributes();


	$GetQuery1 = $need['args']['query'];
	$SelectedCondtion = $need['args']['SelectedCondtion'];
	if (($SelectedCondtion == 'no condition')) {

		$myrows = $wpdb->get_results("{$GetQuery1}");
		return $myrows;
	} else {
		$Spliting = explode($SelectedCondtion, $GetQuery1);
		$MainQuery = $Spliting[0];
		$type = gettype($request['id']);
		if ($type == "string" && 'Like' == $SelectedCondtion) {
			$param = '"%' . $request['id'] . '%"';
		}
		elseif($type == "string")
			$param = '"' . $request['id'] . '"';

		if ($type == "integer") {
			$param = $request['id'];
		}

		if ('&amp;gt;' == $SelectedCondtion)
			$SelectedCondtion = '>';
		if ('less than' == $SelectedCondtion)
			$SelectedCondtion = '<';
		$SelectedCondtion = $SelectedCondtion.' ';
		
		$myrows = $wpdb->get_results("{$MainQuery} {$SelectedCondtion} {$param}");

		return $myrows;
	}
}

require "class-customer.php";

class mo_headless {
	function __construct() {
		add_action( 'admin_init',  array( $this, 'mo_headless_save_settings' ) );
		add_action( 'init', array( $this, 'mo_headless_show_403_message') );
	}

	function mo_headless_save_settings() {
		if (current_user_can('administrator')) {
			if (isset($_POST["SubmitForm1"])) {
				if (isset($_POST['SubmitUser1']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['SubmitUser1'])), 'CheckNonce1')) {
					$data1 = array(
						"ApiName" => sanitize_text_field($_POST['api_name_initial']),
						"MethodName" => sanitize_text_field($_POST['method_name_initial']),
						"TableName" => sanitize_text_field($_POST['table_name_initial'])
					);
					update_option('mo_custom_api_form1', $data1);
				}
			} else if (isset($_POST["SendResult"])) {
				if (isset($_POST['SubmitUser']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['SubmitUser'])), 'CheckNonce')) {

					$data = array(
						"status" => "yes",
						"ApiName" => sanitize_text_field($_POST["ApiName"]),
						"TableName" => isset($_POST['select-table']) ? sanitize_text_field($_POST['select-table']) : '',	
						"MethodName" => isset($_POST['MethodName']) ? sanitize_text_field($_POST['MethodName']) : '',
						"SelectedColumn" => sanitize_text_field($_POST["Selectedcolumn11"]),
						"ConditionColumn" => sanitize_text_field($_POST["OnColumn"]),
						"SelectedCondtion" => sanitize_text_field($_POST["ColumnCondition"]),
						"SelectedParameter" => sanitize_text_field($_POST["ColumnParam"]),
						"query" => sanitize_text_field($_POST["QueryVal"])
					);

					update_option('mo_custom_api_form', $data);
				}
			} else if( isset( $_POST['option'] ) and sanitize_text_field($_POST['option']) == "mo_headless_contact_us_query_option" && isset($_REQUEST['mo_headless_contact_us_query_form_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_headless_contact_us_query_form_fields'])), 'mo_headless_contact_us_query_form') ) {

				$email = sanitize_email($_POST['mo_headless_contact_us_email']);
				$phone = sanitize_text_field($_POST['mo_headless_contact_us_phone']);
				$query = sanitize_textarea_field($_POST['mo_headless_contact_us_query']);
				$customer = new Mo_Headless_Customer();
				if ( $this->mo_headless_check_empty_or_null( $email ) || $this->mo_headless_check_empty_or_null( $query ) ) {
					update_option('mo_headless_message', 'Please fill up Email and Query fields to submit your query.');
					mo_api_auth_show_error_message();
				} else {
					$submited = $customer->submit_contact_us( $email, $phone, $query );
					if ( $submited == false ) {
						update_option('mo_headless_message', 'Your query could not be submitted. Please try again.');
						$this->mo_headless_show_error_message();
						return;
					} else {
						update_option('mo_headless_message', 'Thanks for getting in touch! We shall get back to you shortly.');
						$this->mo_headless_show_success_message();
						return;
					}
				}
			} else if ( isset( $_POST['option'] ) and sanitize_text_field($_POST['option']) == "mo_disable_wp_frontend" && isset($_REQUEST['mo_headless_frontend_settings_form_fields']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_REQUEST['mo_headless_frontend_settings_form_fields'])), 'mo_headless_frontend_settings_form') ) {
				if(!isset($_POST['mo_enable_headless'])) {
					update_option('mo_enable_headless', 'off');
				} else {
					update_option('mo_enable_headless', 'on');
				}
				update_option('mo_headless_message', 'Settings saved successfully');
				$this->mo_headless_show_success_message();
			}
		}
	}

	function mo_headless_show_403_message() {
		$current_url = $this->get_current_url();
		if( get_option('mo_enable_headless') === "on" && strpos($current_url, '/wp-json') === false && strpos($current_url, 'wp-login.php') === false && !is_user_logged_in() ) {
			http_response_code(403); ?>
			<h1 style="padding: 20px">Unauthorized</h1>
		<?php
		exit();
		}
	}

	function get_current_url() {
		return ( isset( $_SERVER['HTTPS'] ) ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	}

	function mo_headless_check_empty_or_null( $value ) {
		if( ! isset( $value ) || empty( $value ) ) {
			return true;
		}
		return false;
	}

	function mo_headless_success_message() {
		$class = "error";
		$message = get_option('mo_headless_message');
		echo "<div class='" . $class . "'> <p>" . $message . "</p></div>";
	}

	function mo_headless_error_message() {
		$class = "updated";
		$message = get_option('mo_headless_message');
		echo "<div class='" . $class . "'><p>" . $message . "</p></div>";
	}

	function mo_headless_show_success_message() {
		remove_action( 'admin_notices', array( $this, 'mo_headless_success_message') );
		add_action( 'admin_notices', array( $this, 'mo_headless_error_message') );
	}

	function mo_headless_show_error_message() {
		remove_action( 'admin_notices', array( $this, 'mo_headless_error_message') );
		add_action( 'admin_notices', array( $this, 'mo_headless_success_message') );
	}
}

new mo_headless();