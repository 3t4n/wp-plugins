<?php 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
  Plugin Name: AP Contact Form
  Plugin URI:  accesspressthemes.com/wordpress-plugins/ap-contact-form
  Description: A simple contact form plugin by Accesspress
  Version:     1.0.8
  Author:      AccessPress Themes
  Author URI:  http://accesspressthemes.com
  License:     GPL2 or later
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages/
  Text Domain: ap-contact-form
 */

// Include File for Widget
include_once('inc/backend/widget.php');

// Create class AP_Contact_Form
  if(!class_exists('AP_Contact_Form')){
    class AP_Contact_Form{
        
        // Construtor to load all hooks
         function __construct(){
            $this->define_constants();
            add_action( 'init', array($this,'ap_init') );
            add_action('admin_enqueue_scripts',array($this,'register_backend_assets'));
            add_action('wp_enqueue_scripts',array($this,'register_frontend_assets'));
            add_action('admin_menu',array($this,'ap_menu')); 
            register_activation_hook(__FILE__, array($this, 'apcf_load_default_settings'));
            add_action('admin_post_ap_settings_save_action',array($this,'apcf_save_settings'));
            add_shortcode( 'ap_contact_form', array($this,'ap_shortcode') );
            add_action('wp_ajax_apcf_sendmail',array($this,'ap_form_submission'));
            add_action('wp_ajax_nopriv_apcf_sendmail',array($this,'ap_form_submission'));
            add_action( 'widgets_init',array($this, 'apcf_load_widget'));
            add_action('admin_post_apcf_restore_settings', array($this, 'apcf_restore_settings'));
        }

        // Register and load the widget
        function apcf_load_widget() {
          register_widget( 'apcf_widget' );
        }

        // Loads Default Settings
        function apcf_load_default_settings() {
            $default_settings = $this->get_default_settings();
            if (!get_option('ap_contact_form_settings')) {
                update_option('ap_contact_form_settings', $default_settings);
            }
        }

        // Restores Default Settings
        function apcf_restore_settings() {
            if (!empty($_GET) && wp_verify_nonce($_GET['_wpnonce'], 'apcf-restore-nonce')) {
                $default_settings = $this->get_default_settings();
                update_option('ap_contact_form_settings', $default_settings);
                wp_redirect(admin_url('admin.php?page=ap-contact-form&restore-message=1'));
            } else {
                die('No script kiddies please!');
            }
        }

        // Register Text Domain
        function ap_init(){
            load_plugin_textdomain( 'ap-contact-form', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
            
        }

        // Define Folder Paths
        function define_constants(){
            defined('APCF_CSS_DIR') or define('APCF_CSS_DIR',plugin_dir_url(__FILE__).'/css');
            defined('APCF_JS_DIR') or define('APCF_JS_DIR',plugin_dir_url(__FILE__).'/js');
            defined('APCF_IMG_DIR') or define('APCF_IMG_DIR',plugin_dir_url(__FILE__).'/images');
            defined('APCF_PATH') or define('APCF_PATH',plugin_dir_path(__FILE__));
            defined('APCF_VERSION') or define('APCF_VERSION','1.0.8');
        }

        // Register Backend resources (Enqueue scripts and style)
        function register_backend_assets(){
            wp_enqueue_style('ap-contact-backend-style',APCF_CSS_DIR.'/backend.css',array(),APCF_VERSION);
            wp_enqueue_style('ap-contact-backend-font-awesome-style',APCF_CSS_DIR.'/font-awesome.min.css',array(),APCF_VERSION);
            wp_enqueue_script('ap-contact-backend-script',APCF_JS_DIR.'/backend.js',array('jquery'),APCF_VERSION);
        }

        // Register Frontend resources (Enqueue scripts and style)
        function register_frontend_assets(){
            wp_enqueue_style('ap-contact-frontend-style',APCF_CSS_DIR.'/frontend.css',array(),APCF_VERSION);
            wp_enqueue_script('ap-contact-frontend-script',APCF_JS_DIR.'/frontend.js',array('jquery'),APCF_VERSION);

            //Localizing data for frontend ajax jquery
            wp_localize_script('ap-contact-frontend-script','apcf_js_obj',array(
                'ajax_url' => admin_url('admin-ajax.php'),
                '_wpnonce'=>wp_create_nonce('ap_form_nonce'),
              ));
        }
        
        // Registering Plugin access through Dashboard
        function ap_menu(){
            add_menu_page(
              __('AP Contact Form','ap-contact-form'),
              __('AP Contact Form','ap-contact-form'),
              'manage_options',
              'ap-contact-form',
              array($this,'ap_settings_page'),'dashicons-email'
            );
        }
 
        // Registering Plugin backend settings
        function ap_settings_page(){
            include(APCF_PATH.'/inc/backend/settings.php');
        }

        // Print function to Print Array
        function print_array($array){
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }


        // Saving backend settings
        function apcf_save_settings(){
          if(check_admin_referer('apcf_admin_option-update')){
           /// do your work
               if(isset($_POST['ap_settings_save_button'])){
                  $ap_contact_form_settings = array();
                  $ap_contact_form_settings['apcf-label-name'] = sanitize_text_field($_POST['apcf-label-name']);
                  $ap_contact_form_settings['apcf-display-name'] = (isset($_POST['apcf-display-name'])?1:0);
                  $ap_contact_form_settings['apcf-placeholder-name'] = (isset($_POST['apcf-placeholder-name'])?1:0);
                  $ap_contact_form_settings['apcf-required-name'] = (isset($_POST['apcf-required-name'])?1:0);
                  $ap_contact_form_settings['apcf-required-message-name'] = sanitize_text_field($_POST['apcf-required-message-name']);
                  

                  $ap_contact_form_settings['apcf-label-email'] = sanitize_text_field($_POST['apcf-label-email']);
                  $ap_contact_form_settings['apcf-display-email'] = (isset($_POST['apcf-display-email'])?1:0);
                  $ap_contact_form_settings['apcf-placeholder-email'] = (isset($_POST['apcf-placeholder-email'])?1:0);
                  $ap_contact_form_settings['apcf-required-email'] = (isset($_POST['apcf-required-email'])?1:0);
                  $ap_contact_form_settings['apcf-required-message-email'] = sanitize_text_field($_POST['apcf-required-message-email']);
                  

                  $ap_contact_form_settings['apcf-label-subject'] = sanitize_text_field($_POST['apcf-label-subject']);
                  $ap_contact_form_settings['apcf-display-subject'] = (isset($_POST['apcf-display-subject'])?1:0);
                  $ap_contact_form_settings['apcf-placeholder-subject'] = (isset($_POST['apcf-placeholder-subject'])?1:0);
                  $ap_contact_form_settings['apcf-required-subject'] = (isset($_POST['apcf-required-subject'])?1:0);
                  $ap_contact_form_settings['apcf-required-message-subject'] = sanitize_text_field($_POST['apcf-required-message-subject']);
                  

                  $ap_contact_form_settings['apcf-label-message'] = sanitize_text_field($_POST['apcf-label-message']);
                  $ap_contact_form_settings['apcf-display-message'] = (isset($_POST['apcf-display-message'])?1:0);
                  $ap_contact_form_settings['apcf-placeholder-message'] = (isset($_POST['apcf-placeholder-message'])?1:0);
                  $ap_contact_form_settings['apcf-required-message'] = (isset($_POST['apcf-required-message'])?1:0);
                  $ap_contact_form_settings['apcf-required-message-message'] = sanitize_text_field($_POST['apcf-required-message-message']);
                  
                  $ap_contact_form_settings['apcf-label-submit'] = sanitize_text_field($_POST['apcf-label-submit']);
                  $ap_contact_form_settings['apcf-display-submit'] = (isset($_POST['apcf-display-submit'])?1:0);

                  $ap_contact_form_settings['apcf-success-message'] = sanitize_text_field($_POST['apcf-success-message']);

                  $ap_contact_form_settings['apcf-display-box-shadow'] = (isset($_POST['apcf-display-box-shadow'])?1:0);

                  $ap_contact_form_settings['apcf-from-email'] = sanitize_email($_POST['apcf-from-email']);
                  $ap_contact_form_settings['apcf-from-name'] = sanitize_text_field($_POST['apcf-from-name']);
                  $ap_contact_form_settings['apcf-email-subject'] = sanitize_text_field($_POST['apcf-email-subject']);
                  $ap_contact_form_settings['apcf-email-message'] = wp_kses_post(htmlspecialchars_decode($_POST['apcf-email-message']));

                  $ap_contact_form_settings['apcf-display-captcha'] = (isset($_POST['apcf-display-captcha'])?1:0);
                  $ap_contact_form_settings['apcf-captcha-label'] = sanitize_text_field($_POST['apcf-captcha-label']);
                  $ap_contact_form_settings['apcf-captcha-site-key'] = filter_input( INPUT_POST, 'apcf-captcha-site-key' );
                  $ap_contact_form_settings['apcf-captcha-secret-key'] = filter_input( INPUT_POST, 'apcf-captcha-secret-key' );
                  $ap_contact_form_settings['apcf-captcha-error-message'] = sanitize_text_field($_POST['apcf-captcha-error-message']);

                  $check = update_option('ap_contact_form_settings',$ap_contact_form_settings);
                  wp_redirect(admin_url('admin.php?page=ap-contact-form&message=1'));
                  exit;
                }
          }
          else{
            /// throw an error
            die('No script kiddies please!');
          }
        }


        // Creating Short code
        function ap_shortcode(){
            $ap_contact_form_settings = get_option('ap_contact_form_settings');
            if(empty($ap_contact_form_settings)){
             $ap_contact_form_settings = $this->get_default_settings();   
            }
            ob_start();?>
            <div class="apcf-shortcode-wrapper">
              <?php
                include(APCF_PATH.'/inc/frontend/shortcode.php');
              ?>
            </div>
            <?php
                $form_html = ob_get_contents();
            ob_end_clean();
            return $form_html;
        }
        

        // Settings Default Values
        function get_default_settings(){
            $ap_contact_form_settings = array();
            $ap_contact_form_settings['apcf-label-name'] = __('Your Name','ap-contact-form');
            $ap_contact_form_settings['apcf-display-name'] = 1;
            $ap_contact_form_settings['apcf-placeholder-name'] = 0;
            $ap_contact_form_settings['apcf-required-name'] = 1;
            $ap_contact_form_settings['apcf-required-message-name'] = __('Name is a required field','ap-contact-form');
                
            $ap_contact_form_settings['apcf-label-email'] = __('Your Email','ap-contact-form');
            $ap_contact_form_settings['apcf-display-email'] = 1;
            $ap_contact_form_settings['apcf-placeholder-email'] = 0;
            $ap_contact_form_settings['apcf-required-email'] = 1;
            $ap_contact_form_settings['apcf-required-message-email'] = __('Email is a required field','ap-contact-form');
             
            $ap_contact_form_settings['apcf-label-subject'] = __('Subject','ap-contact-form');
            $ap_contact_form_settings['apcf-display-subject'] = 1;
            $ap_contact_form_settings['apcf-placeholder-subject'] = 0;
            $ap_contact_form_settings['apcf-required-subject'] = 1;
            $ap_contact_form_settings['apcf-required-message-subject'] = __('Subject is a required field','ap-contact-form');
        
            $ap_contact_form_settings['apcf-label-message'] = __('Message','ap-contact-form');
            $ap_contact_form_settings['apcf-display-message'] = 1;
            $ap_contact_form_settings['apcf-placeholder-message'] = 0;
            $ap_contact_form_settings['apcf-required-message'] = 1;
            $ap_contact_form_settings['apcf-required-message-message'] = __('Message is required','ap-contact-form');
                
            $ap_contact_form_settings['apcf-success-message'] = __('Form successfully sent!','ap-contact-form');

            $ap_contact_form_settings['apcf-display-box-shadow'] = 1;
                
            $ap_contact_form_settings['apcf-label-submit'] = __('Submit','ap-contact-form');
            $ap_contact_form_settings['apcf-display-submit'] = 1;

            $ap_contact_form_settings['apcf-display-captcha'] = 0;
            $ap_contact_form_settings['apcf-captcha-label'] = __('Captcha: Are you Human?','ap-contact-form');
            $ap_contact_form_settings['apcf-captcha-error-message'] = __('Captcha Error','ap-contact-form');

            $ap_contact_form_settings['apcf-from-email'] = get_option('admin_email');
            // Get current user info
            $current_user = wp_get_current_user();
            $ap_contact_form_settings['apcf-from-name'] = $current_user->display_name;
            $ap_contact_form_settings['apcf-email-subject'] = __('New Contact mail received','ap-contact-form');
            
            $ap_contact_form_settings['apcf-email-message'] = 
                __('Hello there, 

You have received an email from your site. 

Details below: 
Name: #name 
Email: #email 
Subject: #subject 
Message: #message 

Thank you!  ','ap-contact-form');
            return $ap_contact_form_settings;
        }

        //Form Submittion called from Ajax Handler
        function ap_form_submission(){
          $captcha = sanitize_text_field($_POST['captchaResponse'] );
          /*
            echo "<pre>";
              print_r($_POST);
             echo "</pre>";
          */

          if(check_ajax_referer('ap_form_nonce','_wpnonce')){
          //die('nonce valid');
            if(isset($_POST['name'])){
              //  $this->print_array($_POST);

              // Get values from Ajax Post
              $name = sanitize_text_field($_POST['name']);
              $email = sanitize_email($_POST['email']);
              $subject = sanitize_text_field($_POST['subject']);
              $message = sanitize_text_field($_POST['message']);
                 
              // Get values from backend settings
              $ap_contact_form_settings = get_option('ap_contact_form_settings');
              if(empty($ap_contact_form_settings)){
                $ap_contact_form_settings = $this->get_default_settings();   
              }
              // $this->print_array($ap_contact_form_settings);
              
              // String conversion #name, #email, #subject, #message
              $orginalstr = array("#name", "#email",'#subject', '#message');
              $replacestr   = array($name ,$email , $subject , $message);
              $email_message = str_replace($orginalstr, $replacestr, $ap_contact_form_settings['apcf-email-message']);
              $email_message = $this->sanitize_escaping_linebreaks($email_message);

              // Validation of Captcha
              $secret_key = $ap_contact_form_settings['apcf-captcha-secret-key'];
              $response = wp_remote_get( "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key . "&response=" . $captcha );
              $response = json_decode( $response['body'] );
              
              // Condition for when Captcha is Enabled.
              if($ap_contact_form_settings['apcf-display-captcha'] == 1){
                if ( $response->success == false ) {
                echo 'SPAM';
                } 
                else{
                  $to = $ap_contact_form_settings['apcf-from-email'];
                  $subject=(!empty($_POST['subject']))?$subject:$ap_contact_form_settings['apcf-email-subject'];
                  $header = array();
                  $headers[] = 'Content-Type: text/html; charset=UTF-8';
                  $headers[] = 'From:'.$_POST['name'].' '.'<'.$_POST['email'].'>';
                  $email_check = wp_mail($to,$subject,$email_message,$headers);

                  if($email_check){
                    echo "success";
                  }
                  else{
                    echo "error";
                  }
                  die();
                }
              }
              else{
                  $to = $ap_contact_form_settings['apcf-from-email'];
                  $subject = (!empty($_POST['subject']))?$subject:$ap_contact_form_settings['apcf-email-subject'];
                  $header = array();
                  $headers[] = 'Content-Type: text/html; charset=UTF-8';
                  $headers[] = 'From:'.$_POST['name'].' '.'<'.$_POST['email'].'>';
                  $email_check = wp_mail($to,$subject,$email_message,$headers);

                  if($email_check){
                    echo "success";
                  }
                  else{
                    echo "error";
                  }
                  die();
              }
              
            }
            else{
              die('post not submitted');
            }
          }
          else{
            die('nonce invalid');
          }
        }  

        // Creating format for textarea input
         function sanitize_escaping_linebreaks($text)
        {
            $text = implode( "<br \>",  explode( "\n", $text));
            return $text;
        } 
    }
    
    // Creating AP_Contact_Form class object
    $ap_contact_form_obj = new AP_Contact_Form();
 }
