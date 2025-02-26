<?php 
/*
Plugin Name: Ajax - Simple Contact Form
Plugin URI: http://www.pranms.com/ajax-simple-contact-form/
Description: This is a simple and customizable wordpress ajax contact form.
Author: Mamunur Rashid
Version: 1.0
Author URI: https://profiles.wordpress.org/mamunitiw/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// blocking direct access
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

do_action( 'plugins_loaded', 'ajax_simple_contact_form_load', 25 );

if ( !function_exists( 'ajax_simple_contact_form_load' ) ) {
	function ajax_simple_contact_form_load() {
		load_plugin_textdomain( 'ajax_simple_contact_form', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		new ajax_simple_contact_form();
	}
}

if ( !class_exists('ajax_simple_contact_form', false) ) {
	class ajax_simple_contact_form {
		
		/**
		 * @TODO Add class constructor description.
		 */
		public function __construct() {
			// Register style sheet.
			add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_styles' ) );
			// Register script.
			add_action( 'wp_enqueue_scripts', array( $this, 'register_plugin_scripts' ) );
			// ajax for logged in users
			add_action( 'wp_ajax_ajax_action', array( $this, 'ajax_form_action' ) ); 
			// ajax for not logged in users
			add_action( 'wp_ajax_nopriv_ajax_action', array( $this, 'ajax_form_action') ); 
		}


		/**
		 * Register and enqueue style sheet.
		 */
		public function register_plugin_styles() {
			wp_register_style( 'main-style', plugins_url( 'ajax-simplecontact-form/css/style.css' ) );
			wp_enqueue_style( 'main-style' );

		}


		/**
		 * Register and enqueue script.
		 */
		public function register_plugin_scripts() {
			wp_register_script( 'ajax-script', plugins_url( 'ajax-simplecontact-form/js/script.js' ), array('jquery'), 1.0 );
    		wp_enqueue_script( 'ajax-script' );
    		wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
		}


		/**
		 * Contact form html code.
		 */
		public function contact_form() {
			require plugin_dir_path( __FILE__ ) . 'includes/form.php';
		}

				
		/**
		 * Ajax Form action
		 */
		public function ajax_form_action() { 
			if (isset($_POST)) {
			
			// unserialize the data
			parse_str($_POST["data"], $_POST);
			
			// server side validation
	        if (!$_POST['name']) {
	            $errNotice = '<p class="error">Please enter your name</p>';
	        } else 
	            $errNotice = '';
	        
	        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	            $errNotice .= '<p class="error">Please enter a valid email address</p>';
	        } else 
	            $errNotice = '';
	        
	        if (!$_POST['message']) {
	            $errNotice .= '<p class="error">Please enter your message</p>';
	        } else 
	            $errNotice = '';

			// send email
			if (!$errNotice) { 
				$name = $_POST["name"];
				$email_from = $_POST["email"];
				$message = $_POST["message"];
				 
				// receiving email address
				$email_to = "example@host.com";
				$subject = "New Message Received";
				
				// prepare email body
				$message_body = "From: $name\n E-Mail: $email_from\n Message:\n $message";

				$success = mail($email_to, $subject, $message_body, "From:".$email_from);
				 
				// redirect to success page
				if ($success) {
				   echo "Message sent successfully";
				} else {
				    echo "Failded to send message";
				}
				
				// stop executing script
				die(); 
			} else {
				echo $errNotice; 
				
				// stop executing script
				die();
			}

			} // end if 
		}
		
	}

}

// shortcode: [ajax_contact_form]
$new_form  = new ajax_simple_contact_form();
add_shortcode( 'ajax_contact_form', array( $new_form, 'contact_form') );