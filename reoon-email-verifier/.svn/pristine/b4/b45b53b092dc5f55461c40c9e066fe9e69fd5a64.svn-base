<?php
/**
 * Plugin Name: Reoon Email Verifier
 * Plugin URI: https://www.reoon.com/email-verifier/
 * Description: This plugin verifies email addresses upon online form submission, safeguarding against invalid, temporary, disposable and harmful email addresses.
 * Version: 1.2.5
 * Author: Reoon Technology
 * Author URI: https://www.reoon.com/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: reoon-email-verifier
 */

namespace REOONENV;
require_once plugin_dir_path(__FILE__)."includes/util-class.php";
require_once plugin_dir_path(__FILE__)."includes/validator/gravity-forms-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/formiddable-forms-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/contact-form-7-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/wp-registration-form-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/wc-checkout-form-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/ninja-forms-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/elementor-forms-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/wp-forms-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/forminator-forms-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/fluent-forms-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/happy-forms-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/wp-commentform-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/mail-mint-form-validator.php";
require_once plugin_dir_path(__FILE__)."includes/validator/bestwebsoft-forms-validator.php";


require_once plugin_dir_path(__FILE__)."includes/views/admin/dashboard-view-class.php";
require_once plugin_dir_path(__FILE__)."includes/views/admin/settings-view-class.php";
require_once plugin_dir_path(__FILE__)."includes/views/admin/faq-view-class.php";
require_once plugin_dir_path(__FILE__)."includes/reoon-api.php";
require_once plugin_dir_path(__FILE__)."includes/ajax-class.php";

use REOONENV\util\Util;
use REOONENV\Validator\ContactForm7Validator;
use REOONENV\Validator\DiviContactFormValidator;
use REOONENV\Validator\ElementorFormValidator;
use REOONENV\Validator\FluentFormsValidator;
use REOONENV\Validator\GravityFormsValidator;
use REOONENV\Validator\FormiddableFormsValidator;
use REOONENV\Validator\ForminatorFormsValidator;
use REOONENV\Validator\HappyFormsValidator;
use REOONENV\Validator\BestWebsoftFormsValidator;
use REOONENV\Validator\MailMintFormsValidator;
use REOONENV\Validator\NinjaFormsValidator;
use REOONENV\Validator\WCCheckoutFormValidator;
use REOONENV\Validator\WPCommentFormValidator;
use REOONENV\Validator\WPFormsValidator;
use REOONENV\Validator\WPRegistrationFormValidator;
use REOONENV\Views\DashboardView;
use REOONENV\Views\FaqView;
use REOONENV\Views\SettignsView;

Class ReoonEmailVerifier{

    public function __construct()
    {
        // Register the Reoon Email Verifier menu
        add_action( 'admin_menu', array($this,'reoonev_menu' ));
        add_action( 'admin_init', array($this,'reoonev_settings_init' ));               
        add_action( 'admin_enqueue_scripts', array($this,'enqueue_admin_scripts' ));


        add_action( 'plugins_loaded', array($this,'plugins_loaded_action' ));

        register_activation_hook(__FILE__, array($this, 'reoonev_activation'));


		
        add_filter( 'plugin_action_links_reoon-email-verifier/reoon-email-verifier.php', array($this,'add_settings_link'), 9999, 2 );

        
    }


    public function add_settings_link( $links, $file ) {
        // Check if the plugin being processed is the one we want to add a settings link for.
        if ( $file == 'reoon-email-verifier/reoon-email-verifier.php' ) {
            // Add the settings link to the array of links.
            $settings_link = '<a href="' . admin_url( 'admin.php?page=reoonev-settings' ) . '">Settings</a>';
            array_push( $links, $settings_link );
        }
        return $links;
    }


    public function reoonev_activation()
	{
		// Set default values for the plugin settings
		$default_settings = array(        
			'validation_mode'=>'quick',
			'allow_role_email'=>1,
			'allow_catch_all'=>1,
			'allow_unknown'=>1,

			'gravity_form'       => 1,
			'formiddable_form'   => 1,
			'contact_form_7'     => 1,
			'wp_registration'    => 1,
			'checkout_form'      => 1,
			'ninja_forms'        => 1,
			'elementor_forms'    => 1,
			'wp_forms'           => 1,
			'fluent_forms'       => 1,
			'forminator_forms'   => 1,
			'happyforms'=>1,
			'mailmint_form'=>1,
			'wordpress_comment_form'=>1,
			'best_websoft_forms'=>1,
			'timeout'=>10,
			'custom_error_message'=>'This email address is not allowed'
		);

		// Check if any of the settings are not set
		$settings = get_option('reoonev-settings', array());        
		foreach ($default_settings as $key => $value) {
			if (!isset($settings[$key])) {
				$settings[$key] = $value;
			}
		}

		// Save the default settings
		update_option('reoonev-settings', $settings);
	}

    function plugins_loaded_action()
    {

        if (!function_exists('is_plugin_active')) {
            include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }
        
        if ( class_exists( 'GFForms' ) && Util::get_reoon_option("gravity_form")==1) {
            $gf_validator = new GravityFormsValidator();        
            add_filter( 'gform_validation', array($gf_validator,'reoonev_validate_emails' ));    
        }

        if(class_exists("FrmForm") && Util::get_reoon_option("formiddable_form")==1)
        {
            $formidable_validator = new FormiddableFormsValidator();
            add_filter('frm_validate_field_entry', array($formidable_validator,'reoonev_validate_emails'),10, 3);
        }

        if(function_exists("wpcf7") && Util::get_reoon_option("contact_form_7")==1)
        {
            
            $cf7_validator = new ContactForm7Validator();
            
            add_filter( 'wpcf7_validate_email*', array($cf7_validator,'reoonev_validate_emails'), 20, 2);
        }

        $wp_registration = new WPRegistrationFormValidator();
        add_filter( 'registration_errors', array($wp_registration,'reoonev_validate_emails' ),10, 3);


        if(class_exists('WooCommerce')  && Util::get_reoon_option("checkout_form")==1)
        {
            $wc_checkout = new WCCheckoutFormValidator();
            add_action( 'woocommerce_checkout_process', array($wc_checkout,'reoonev_validate_emails' ));
        }

        if(class_exists("Ninja_Forms")  && Util::get_reoon_option("ninja_forms")==1)
        {
            $ninja_forms = new NinjaFormsValidator();
            add_filter( 'ninja_forms_submit_data', array($ninja_forms,'reoonev_validate_emails' ));
        }

        if(is_plugin_active( 'elementor/elementor.php' )  && Util::get_reoon_option("elementor_forms")==1)
        {
            $elementor_forms = new ElementorFormValidator();
            add_action( 'elementor_pro/forms/validation/email', array($elementor_forms,'reoonev_validate_emails' ),10, 3);
        }


        if(function_exists('wpforms') && Util::get_reoon_option("wp_forms")==1)
        {            
            $wpforms = new WPFormsValidator();
            add_action( 'wpforms_process_validate_email', array($wpforms,'reoonev_validate_emails' ), 10, 3);
        }
        
        if(function_exists( 'wpFluentForm' )  && Util::get_reoon_option("fluent_forms")==1)
        {            
            $fluentForms = new FluentFormsValidator();
            add_filter( 'fluentform/validate_input_item_input_email', array($fluentForms,'reoonev_validate_emails' ), 10, 5);
        }

        if(class_exists('Forminator_Addon_Loader') && Util::get_reoon_option("forminator_forms")==1)
        {            
            $forminatorForms = new ForminatorFormsValidator();
            add_filter( 'forminator_custom_form_submit_errors', array($forminatorForms,'reoonev_validate_emails' ), 10, 3);
        }

        if( is_plugin_active( 'happyforms/happyforms.php' ) && Util::get_reoon_option("happyforms")==1) {
            $happyforms = new HappyFormsValidator();            
            add_filter( 'happyforms_validate_part_submission', array($happyforms,'reoonev_validate_emails'), 10, 4 );
          }
          
          if ( is_plugin_active('contact-form-plugin/contact_form.php') && Util::get_reoon_option("best_websoft_forms")==1) {                
            $bestWebsoftFormsValidator = new BestWebsoftFormsValidator();          
            add_filter( 'cntctfrm_check_form', array($bestWebsoftFormsValidator,'reoonev_validate_emails'), 10 );
          }

          if ( Util::get_reoon_option("wordpress_comment_form")==1) {
            $wordpress_comment_form = new WPCommentFormValidator();
            add_filter( 'preprocess_comment', array($wordpress_comment_form,'reoonev_validate_emails'), 10, 1 );
          }

          if( is_plugin_active( 'mail-mint/mail-mint.php' ) && Util::get_reoon_option("mailmint_form")==1) {
            $mailMintFormsValidator = new MailMintFormsValidator();            
            add_action( 'mailmint_before_form_submit', array($mailMintFormsValidator,'reoonev_validate_emails'), 10, 2 );
          }
          
    }


	function reoonev_menu() {

		$dashboard_view = new DashboardView();
		$settings_view = new SettignsView();
		$faq_view = new FaqView();

		add_menu_page( 'Reoon Email Verifier', 'Reoon Email Verifier', 'manage_options', 'reoon-email-verifier', array($dashboard_view,'reoonev_dashboard' ), 'dashicons-email', 56 );
		add_submenu_page( 'reoon-email-verifier', 'Dashboard', 'Dashboard', 'manage_options', 'reoon-email-verifier', array($dashboard_view,'reoonev_dashboard' ));
		add_submenu_page( 'reoon-email-verifier', 'Settings', 'Settings', 'manage_options', 'reoonev-settings', array($settings_view,'reoonev_settings' ));
		add_submenu_page( 'reoon-email-verifier', 'FAQ', 'FAQ', 'manage_options', 'reoonevfaq', array($faq_view,'reoonev_faq' ));
	}





	// Register the plugin's settings
	function reoonev_settings_init() {
		register_setting( 'reoonev-settings', 'reoonev-settings', array($this,'sanitization_callback') );    
	}


	function sanitization_callback( $obj ) {

		if(!isset($obj["reoon_api_key"]) || $obj["reoon_api_key"]=="")
		{
			//if no api, i.e. user has not added a key
			$obj["reoon_api_key"] = Util::get_reoon_option("reoon_api_key");
		}


		return $obj;
		// if ( empty( $obj ) ) {
		//     add_settings_error( 'api_key', 'api_key_error', 'Please enter a valid API key', 'error' );
		//     return '';
		// } else {
		//     // Perform additional validation or API key verification here
		//     return $obj;
		// }
	}


	public function enqueue_admin_scripts($hook)
	{
		if ('reoon-email-verifier_page_reoonev-settings' == $hook || $hook == "toplevel_page_reoon-email-verifier" || $hook == "reoon-email-verifier_page_reoonevfaq") {
			// Define the path to the script and style for easier reference
			$script_path = plugin_dir_path( __FILE__ ) . 'assets/js/admin-script.js';
			$style_path = plugin_dir_path( __FILE__ ) . 'assets/css/admin-style.css';

			// Enqueue the script with dynamic versioning based on file modification time
			wp_enqueue_script('reoon-admin-js', plugin_dir_url( __FILE__ ) . 'assets/js/admin-script.js', array('jquery'), filemtime($script_path), true);
			wp_localize_script('reoon-admin-js', 'reoon_obj', array('ajaxurl' => admin_url('admin-ajax.php')));

			// Enqueue the style with dynamic versioning based on file modification time
			wp_enqueue_style('reoon-admin-css', plugin_dir_url( __FILE__ ) . 'assets/css/admin-style.css', array(), filemtime($style_path));
		}
	}



}

new ReoonEmailVerifier();
