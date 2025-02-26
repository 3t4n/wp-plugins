<?php 
/* 
Plugin Name: WP Cyberimpact Subscribe
Plugin URI: http://www.cyberimpact.com/wordpress.php
Description: Cyberimpact plugin for easy integration of subscription services
Version: 1.0.5
Author: Cyberimpact
Author URI: http://www.cyberimpact.com 
License: GPL2
Text Domain: wp-cyber
Domain Path: /lang
*/
/*
Copyright Cyber (email : ) 
This program is free software; you can redistribute it and/or modify 
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation. 

This program is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of 
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the 
GNU General Public License for more details. 

You should have received a copy of the GNU General Public License 
along with this program; if not, write to the Free Software 
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA 
*/

// Translate the plugin
load_plugin_textdomain('wp-cyber', false, basename( dirname( __FILE__ ) ) . '/lang' );
 

if(!class_exists('WP_Cyber_Subscribe')) { 
    class WP_Cyber_Subscribe {
        const CYBER_OPTIN_SENT = "https://app.cyberimpact.com/config/register-form/message-optin-sent";
        const CYBER_ERROR = "https://app.cyberimpact.com/config/register-form/message-optin-error";
        const CYBER_OPTIN_CONFIRMATION = "https://app.cyberimpact.com/config/register-form/message-optin-confirm";
        const CYBER_API = "https://api.cyberimpact.com/";
        /** 
        * Construct the plugin object 
        */ 
        public function __construct() { 
            add_action('admin_init', array(&$this, 'admin_init')); 
            add_action('admin_menu', array(&$this, 'add_menu')); 
            add_shortcode('cyberimpact', array(&$this, 'do_shortcode'));
            // register actions 
        } // END public function __construct 
        
        /** 
        * Activate the plugin 
        */ 
        public static function activate() { 
            // Do nothing 
        } // END public static function activate 
        
        /** 
        * Deactivate the plugin 
        */ 
        public static function deactivate() { 
            // Do nothing 
        } // END public static function deactivate 
        
        /** 
        * hook into WP's admin_init action hook 
        */ 
        public function admin_init() { // Set up the settings for this plugin 
            $this->init_settings(); // Possibly do additional admin_init tasks 
        } // END public static function admin_init
        
        /** 
        * Initialize some custom settings 
        */ 
        public function init_settings() { // register the settings for this plugin 
            wp_register_script( 'cyber-admin-script', plugins_url( '/admin.js', __FILE__ ), array( 'jquery' ) );
            add_thickbox();
            register_setting('wp_cyber_setup', 'cyber_login', array(&$this, 'validate_login')); 
            // register_setting('wp_cyber_widget', 'cyber_widget'); 
            // register_setting('wp_cyber_widget', 'cyber_target_groups');


            register_setting('wp_cyber_widget_en', 'cyber_widget_en'); 
            register_setting('wp_cyber_widget_en', 'cyber_target_groups_en');
            register_setting('wp_cyber_widget_fr', 'cyber_widget_fr'); 
            register_setting('wp_cyber_widget_fr', 'cyber_target_groups_fr');



            register_setting('wp_cyber_form', 'cyber_display'); 
        } // END public function init_custom_settings() 
        
        
        /** 
        * add a menu 
        */ 
        public function add_menu() {
            add_menu_page('Cyber Impact Settings', __('Cyberimpact', 'wp-cyber'), 'manage_options', 'wp_cyber_subscribe',
                 array(&$this, 'cyber_settings_page'), '', 76 );

            add_submenu_page('wp_cyber_subscribe', 'Cyber Widget Options', __('English widget options', 'wp-cyber'), 'manage_options',
            'cyber_widget_options_page_en', array(&$this, 'cyber_widget_settings_page_en') );

            add_submenu_page('wp_cyber_subscribe', 'Cyber Widget Options', __('French widget options', 'wp-cyber'), 'manage_options',
            'cyber_widget_options_page_fr', array(&$this, 'cyber_widget_settings_page_fr') );



            add_submenu_page('wp_cyber_subscribe', 'Cyber Form Display Settings', __('Display Settings', 'wp-cyber'), 'manage_options',
            'cyber_display_settings_page', array(&$this, 'cyber_display_settings_page') );
//            
            add_action( "admin_enqueue_scripts", array(&$this,'cyber_admin_scripts') );
        } // END public function add_menu() 


        public function cyber_admin_scripts ($hook) {
            if( $hook == "cyberimpact_page_cyber_widget_options_page_fr" || $hook == "cyberimpact_page_cyber_target_groups_page_fr" || $hook == "cyberimpact_page_cyber_widget_options_page_en" || $hook == "cyberimpact_page_cyber_target_groups_page_en") {
                wp_enqueue_script('cyber-admin-script');
            }

        }        
        /** 
        * Menu Callback 
        */ 
        public function cyber_settings_page() { 
            if(!current_user_can('manage_options')) { 
                wp_die(__('You do not have sufficient permissions to access this page.')); 
            } 
            // Render the settings template 
            include(sprintf("%s/templates/settings.php", dirname(__FILE__))); 
        } // END public function cyber_settings_page()         





        //need to put another one for fr and en
        public function cyber_widget_settings_page_en() { 
            if(!current_user_can('manage_options')) { 
                wp_die(__('You do not have sufficient permissions to access this page.')); 
            } 
            // Render the settings template 
            include(sprintf("%s/templates/widget_settings_en.php", dirname(__FILE__))); 
        } // END public function cyber_widget_settings_page()  

        public function cyber_widget_settings_page_fr() { 
            if(!current_user_can('manage_options')) { 
                wp_die(__('You do not have sufficient permissions to access this page.')); 
            } 
            // Render the settings template 
            include(sprintf("%s/templates/widget_settings_fr.php", dirname(__FILE__))); 
        } // END public function cyber_widget_settings_page()       

        public function cyber_target_groups_page() { 
            if(!current_user_can('manage_options')) { 
                wp_die(__('You do not have sufficient permissions to access this page.')); 
            } 
            // Render the settings template 
            include(sprintf("%s/templates/target_groups.php", dirname(__FILE__))); 
        } // END public function cyber_widget_settings_page()         

        public function cyber_display_settings_page() { 
            if(!current_user_can('manage_options')) { 
                wp_die(__('You do not have sufficient permissions to access this page.')); 
            } 
            // Render the settings template 
            include(sprintf("%s/templates/display_settings.php", dirname(__FILE__))); 
        } // END public function cyber_widget_settings_page() 
        
        public function do_shortcode() {
            wp_register_style( 'cyber-style', plugins_url( '/style.css', __FILE__ ),null );

            $lan = substr(get_locale(), 0, 2);
            $lanSafe = array('fr','en');
            if(!in_array($lan, $lanSafe))
                $lan = 'en';
            
            $cyber_widget =  get_option('cyber_widget_'.$lan);
            $cyber_groups =  get_option('cyber_target_groups_'.$lan);


            $cyber_display =  get_option('cyber_display');
            
            $cb_saved_groups = explode("|*|", $cyber_groups['groups']);
            foreach($cb_saved_groups as $group) {
                $parts = explode("::", $group);
                if( count($parts) == 2) {
                    $cyber_saved_groups[$parts[0]] = $parts[1];
                }
            }                         
            $cyber_groups['groups'] = $cyber_saved_groups;
            if(!empty($_POST)) {
                if( wp_verify_nonce($_POST['cyber_check'],'cyber_subscribe'))
                    $input = $this->process_input($cyber_widget);
            }
                
            if( isset($cyber_widget['has_errors']) && $cyber_widget['has_errors'] || !isset($input))     
                $this->print_form($cyber_widget, $cyber_groups, (isset($input)?$input:null), $cyber_display);
            else {
                if(isset($input[0]->errors)) {
                    echo "<div class='cyber_errors'>";
                    foreach($input[0]->errors as $error) {
                        echo "<p>".$error->description."</p>";
                    }
                    echo "</div>";
                    $this->print_form($cyber_widget, $cyber_groups, $input[1], $cyber_display);
                } else {
                    echo __("Thank you for subscribing!", "wp-cyber");
                }
            }
        }
        private function sanitize($field, $pattern) {
            $field = 'cyber_' . $field;
            switch($pattern) {
                case 'email':
                    return sanitize_email($_POST[$field]);
                case 'date':
                    return date("Y-m-d", strtotime($_POST[$field]));
                default:
                    return $_POST[$field];
            }
        }
        private function process_input(&$cyber_widget) {
            
            //$allowed_fields = array(
            //    'firstname' => 'text',
            //    'lastname' => 'text',
            //    'email' => 'email',
            //    'gender' => 'text',
            //    'postal_code' => 'text',
            //    'language' => 'text',
            //    'note' => 'text',
            //    'birthdate' => 'date',
            //    'groups' => 'text'
            //);
            //$allowed_custom_fields = array(
            //    'custom_field_1' => 'text',
            //    'custom_field_2' => 'text',
            //    'custom_field_3' => 'text',
            //    'custom_field_4' => 'text',
            //    'custom_field_5' => 'text',
            //);

            $allowed_fields = array(
                'firstname' => 'text',
                'lastname' => 'text',
                'email' => 'email',
                'gender' => 'text',
                'postal_code' => 'text',
                'language' => 'text',
                'note' => 'text',
                'birthdate' => 'date',
                'groups' => 'text',
                'custom_field_1' => 'text',
                'custom_field_2' => 'text',
                'custom_field_3' => 'text',
                'custom_field_4' => 'text',
                'custom_field_5' => 'text',
            );

            $cyber_widget['has_errors'] = false;
            $cyber = array();
            $_POST = array_map('stripslashes_deep', $_POST);
            if(isset($_POST['groups_choice'])) {
                $_POST["cyber_groups"]=implode(',',$_POST['groups_choice']);
            }
                
            //foreach($allowed_fields as $field => $validation) {
            //}
            //foreach($allowed_custom_fields as $field => $validation) {  
            //}
            
            foreach($allowed_fields as $field => $validation) {
               
                if( in_array($field , array('email', 'groups','language','firstname','lastname','gender','postal_code','note','birthdate')) || isset($cyber_widget['use_'.$field])) {
                    if((isset($cyber_widget['mandatory_' . $field]) || in_array($field , array('email','language','groups'))) && !isset($_POST['cyber_'.$field]) || (isset($_POST['cyber_'.$field]) && $_POST['cyber_'.$field]=='')) {
                            $cyber_widget['error_on_' . $field] = true;
                            $cyber_widget['has_errors'] = true;
                    }
                      
                    if(isset($_POST['cyber_'.$field])) {
                        //test length 
                        if(strlen($_POST['cyber_'.$field])>255){
                            $cyber_widget['error_on_' . $field] = true;
                            $cyber_widget['has_errors'] = true;
                        } 
                        $cyber[$field] = $this->sanitize($field, $validation);   
                    }
                      
                }
            }
            if($cyber['email']=='' && isset($_POST['cyber_email'])) {
                $cyber['email']=$_POST['cyber_email'];
                $cyber_widget['error_on_email'] = true;
                $cyber_widget['has_errors'] = true;
            }
            $res = $cyber;
            if( ! $cyber_widget['has_errors']) 
                return array($this->cyber_api_post("/members/optins", $cyber),$res);
                //$res = $this->cyber_api_post("/members/optins", $cyber);                
            return $res;
            
        }
        
        private function print_form($cyber_widget, $cyber_groups, $input, $cyber_display){
            wp_enqueue_style('cyber-style');
            $style = "";
            if( isset($cyber_display['custom'])) {
                $style .= "color:#" . $cyber_display['textcolor'] . ";";
                $style .= "background-color:#" . $cyber_display['backgroundcolor'] . ";";
                $style .= "border:" . $cyber_display['borderwidth'] . "px solid #".$cyber_display['bordercolor'] . ";";
                
            }

            $return = "<form method='post' class='cyberimpact' id='cyberimpact' style='$style'>";

            // $lan = get_locale();
            //or get_bloginfo() 
            // $lanAvail = get_available_languages();
            // echo $lanAvail;


            $return .= wp_nonce_field('cyber_subscribe','cyber_check', true, false);
            if( isset($cyber_widget['header']) ) {
                $return .= $cyber_widget['header'];
            }
            $return .= "<table border='0' cellspacing='0' cellpaddig='0'>";
            $return .=  $this->print_field('cyber_email', $cyber_widget['email'], true, 'email', null, isset($cyber_widget['error_on_email'])?$cyber_widget['error_on_email']:false, $input['email']);
            $regular_fields = array('firstname' => array('text', null), 
                                    'lastname' => array('text', null), 
                                    'gender' => array('radio', array( 'm' => $cyber_widget['gender_m'], 'f' => $cyber_widget['gender_f'])),
                                    'birthdate' => array('date', null),
                                    'postal_code' => array('text', null),
                                    'note' => array('textarea', null));


            $custom_fields = array(                                    
                                    'custom_field_1' => array($cyber_widget['type_custom_field_1'],isset($cyber_widget['options_custom_field_1'])?explode("\n", $cyber_widget['options_custom_field_1']):null),
                                    'custom_field_2' => array($cyber_widget['type_custom_field_2'],isset($cyber_widget['options_custom_field_2'])?explode("\n", $cyber_widget['options_custom_field_2']):null),
                                    'custom_field_3' => array($cyber_widget['type_custom_field_3'],isset($cyber_widget['options_custom_field_3'])?explode("\n", $cyber_widget['options_custom_field_3']):null),
                                    'custom_field_4' => array($cyber_widget['type_custom_field_4'],isset($cyber_widget['options_custom_field_4'])?explode("\n", $cyber_widget['options_custom_field_4']):null),
                                    'custom_field_4' => array($cyber_widget['type_custom_field_4'],isset($cyber_widget['options_custom_field_4'])?explode("\n", $cyber_widget['options_custom_field_4']):null),
                                    //'poweredby' => array('link', null)
                                    );
            foreach($regular_fields as $field => $options) {
                if( isset($cyber_widget[$field]) && $cyber_widget[$field] != "") 
                   $return .=  $this->print_field('cyber_' . $field, //name
                                        $cyber_widget[$field], //label 
                                        isset($cyber_widget['mandatory_' . $field]),//mandatorycyber_usecyber_use
                                        $options[0], //type
                                        $options[1], //options
                                        isset($cyber_widget['error_on_' . $field])?$cyber_widget['error_on_' . $field]:false,
                                        $input[$field]
                                        );
            }
            foreach($custom_fields as $field => $options) {
                if( isset($cyber_widget['use_' . $field]) && $cyber_widget['use_' . $field]) 
                   $return .=  $this->print_field('cyber_' . $field, //name
                                        $cyber_widget[$field], //label 
                                        isset($cyber_widget['mandatory_' . $field]),//mandatorycyber_usecyber_use
                                        $options[0], //type
                                        $options[1], //options
                                        isset($cyber_widget['error_on_' . $field])?$cyber_widget['error_on_' . $field]:false,
                                        $input[$field]
                                        );
            }


            //generate group field
            if($cyber_groups['group_type'] == "dropdown"){
                $return .=  '<tr class="cyber_field"><td><label>'.$cyber_groups['label'].':</label></td>';
                $return .=  '<td><select name="groups_choice[]">';
                foreach ($cyber_groups['groups'] as $key => $value) {
                    $return .= '<option value="'.$key.'">'.$value.'</option>';
                }
                $return .='</select></td></tr>';
            }
            elseif($cyber_groups['group_type'] == "checkbox"){
                $return .=  '<tr class="cyber_field"><td><label>'.$cyber_groups['label'].':</label></td><td></td></tr>';
                foreach ($cyber_groups['groups'] as $key => $value) {
                    $return .= '<tr><td><input type="checkbox" name="groups_choice[]" value="'.$key.'" /><label>'.$value.'</label></td></tr>';
                }
                $return .='<br/>';
            }
            $sGroups = implode(',',array_keys($cyber_groups['groups']));
            $return .='<div><input type="hidden" name="cyber_groups" value="';
            $return .=($cyber_groups['group_type'] == 'Select' || $cyber_groups['group_type'] == 'Choisir')?$sGroups:'';
            $return .= '" /><input type="hidden" name="cyber_confirm_url" value="'.$cyber_widget['optin_confirmation'].'"/>';

            $return .='<input type="hidden" name="cyber_language" value="'.$cyber_widget['language'].'" /></div>';



            $return .=  $this->print_field('cyber_submit', $cyber_widget['submit'], false, 'submit',false,false,false);
            $return .= "</table>";
            $return .=  "</form>";
            echo $return;
        
        }

        private function print_field($name, $label, $mandatory, $type, $options, $has_error, $value) {
            $return = "";
            $return .= "<tr class='cyber_field";
            if(isset($mandatory) && $mandatory) $return .= " cyber_mandatory";
            if(isset($has_error) && $has_error) $return .= " cyber_error";
            $return .= "'>"; 
            if( isset($label) && $type != 'submit' && $type != 'checkbox')
                $return .= "<td><label for='$name'>$label</label></td>";
            else $return .= "<td></td>";
            $return .= "<td>";
            switch($type) {
                case 'text':
                    $return .= "<input type='text' name='$name' id='$name' value='$value' />";
                    break;
                case 'email':
                    $return .= "<input type='text' class='email' name='$name' id='$name' value='$value' />";
                    break;
                case 'date':
                    $return .= "<input type='text' class='date' name='$name' id='$name' value='$value' />";
                    break;
                case 'radio':
                    foreach($options as $key => $v) {
                        $return .= "<div class='cyber_radio_option'><input type='radio' name='$name' id='{$name}_{$key}' ".($value==$key?" checked ":"")."  value='$key'><label for='{$name}_{$key}'>$v</label></div>";
                    }
                    break;
                case 'checkbox':
                    $return .= "<div class='cyber_checkbox_option'><input type='checkbox' name='$name' id='$name' value='1'><label for='{$name}'>$label</label></div>";
                    break;
                case 'dropdown':
                    $return .= "<select name='$name' id='$name'>";
                    foreach($options as $key => $v) {
                        $return .= "<option value='$key'".($value == $key ? " selected":"").">$v</option>";
                    }
                    $return .= "</select>";
                    break;
                case 'textarea':
                    $return .= "<textarea name='$name' id='$name'>$value</textarea>";
                    break;
                case 'submit':
                    $return .= "<button name='$name' id='$name' >".$label."</button>";
                    break;
            }
            $return .= "</td></tr>";
            return $return;
        }
        /**
        * Functions to communicate with Cyber
        */
        
        public function validate_login($input) {
            $valid_options = array(); 
            $valid_options['user'] = sanitize_user($input['user']);
            $valid_options['pass'] = $input['pass'];
           if(! $this->cyber_getGroups('wp_cyber_setup', $valid_options) ) {
                add_settings_error(
                    'wp_cyber_setup',           // setting title
                    '1',            // error ID
                    __('Could not login to Cyber with the provided credentials', 'wp-cyber'),   // error message
                    'error'                        // type of message
                );        
            } else {
                $_SESSION['cyber_logged_in'] = true;
            }
            
            return $valid_options;
                    
        }
        
        /**
        * get the list of this user's groups
        * 
        */
        private function cyber_getGroups($calling_page, $login) {
            $res = $this->cyber_api_get("/groups", null, $login, $calling_page);
            return $res;
        }
        
        private function cyber_api_get($url, $headers, $login, $error_page = "wp_cyber_setup") {
            if($login) {
                $cyber_login =  $login;
            } else {
                $cyber_login =  get_option('cyber_login');    
            }
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, self::CYBER_API . $url);
            curl_setopt($ch, CURLOPT_USERPWD, $cyber_login['user'] . ":" . $cyber_login['pass']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
            if( is_array($headers))
                foreach( $headers as $header => $value) {
                      curl_setopt($ch, $header, $value);
                }
            $response = curl_exec($ch);
            curl_close($ch);
            $res = json_decode($response);
            if( isset($res->error) && $res->error == "Not authorized") {
                add_settings_error(
                    $error_page,           // setting title
                    '1',            // error ID
                    __('Could not login to Cyber with the provided credentials', 'wp-cyber'),   // error message
                    'error'                        // type of message
                );        
                return false;
            }
        
            return $res;
        }
        private function cyber_api_post($url, $values, $error_page = "wp_cyber_setup") { 
            $to_send = http_build_query($values);
            $cyber_login =  get_option('cyber_login');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, self::CYBER_API . $url);
            curl_setopt($ch, CURLOPT_USERPWD, $cyber_login['user'] . ":" . $cyber_login['pass']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_POST, count($values));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $to_send);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
            $response = curl_exec($ch);
            curl_close($ch);
            $res = json_decode($response);
            if( isset($res->error) && $res->error == "Not authorized") {
                add_settings_error(
                    $error_page,           // setting title
                    '1',            // error ID
                    __('Could not login to Cyber with the provided credentials', 'wp-cyber'),   // error message
                    'error'                        // type of message
                );        
                return false;
            }
            return $res;
        }
           
    } // END class WP_Cyber_Subscribe 
} // END if(!class_exists('WP_Cyber_Subscribe')) 

if(class_exists('WP_Cyber_Subscribe')) { // Installation and uninstallation hooks 

    register_activation_hook(__FILE__, array('WP_Cyber_Subscribe', 'activate')); 
    register_deactivation_hook(__FILE__, array('WP_Cyber_Subscribe', 'deactivate')); 
    // instantiate the plugin class 
    $wp_cyber_subscribe = new WP_Cyber_Subscribe(); 
    // Add a link to the settings page onto the plugin page 
    if(isset($wp_cyber_subscribe )) { 
        // Add the settings link to the plugins page 
        function cyber_settings_link($links) { 
            $settings_link = '<a href="options-general.php?page=wp_cyber_subscribe">Settings</a>'; 
            array_unshift($links, $settings_link); 
            return $links; 
        } 
        
        $plugin = plugin_basename(__FILE__); 
        add_filter("plugin_action_links_$plugin", 'cyber_settings_link'); 
    } 
}



