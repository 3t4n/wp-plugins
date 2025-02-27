<?php
/**
 * Plugin Name: LH Private Content Login
 * Plugin URI: https://lhero.org/portfolio/lh-private-content-login/
 * Description: This plugin redirects non-logged users to the login page when they follow a link to a post, page, or cpt restricted by post status.
 * Author: Peter Shaw
 * Author URI: https://shawfactor.com
 * Text Domain: lh-private-content-login
 * Version: 1.05
 * License: GPLv2
*/

if (!class_exists('LH_Private_content_login_plugin')) {

class LH_Private_content_login_plugin {
    
    private static $instance;
    
    static function return_plugin_namespace(){
    
        return 'lh_private_content_login';
    
    }
    
    static function return_plugin_text_domain(){

        return 'lh-private-content-login';

    }
    
    static function plugin_name(){
        
        return 'LH Private Content Login';
        
    }


    
    static function curpageurl() {
        
    	$pageURL = 'http';
    
    	if ((isset($_SERVER["HTTPS"])) && ($_SERVER["HTTPS"] == "on")){
    	    
    		$pageURL .= "s";
    		
        }
    
    	$pageURL .= "://";
    
    	if (($_SERVER["SERVER_PORT"] != "80") and ($_SERVER["SERVER_PORT"] != "443")){
    	    
    		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    		
    
    	} else {
    	    
    		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    
    	}
    
    	return $pageURL;
    	
    }

    static function return_applicable_post_statuses(){
        
        $statuses = array('private','inherit');    
            
        return apply_filters(self::return_plugin_namespace().'_return_applicable_post_statuses', $statuses);   
            
    }


    public function redirect_to_login() {

        global $wp_query,$wpdb;
  
        if (is_404()) {

            if (!is_user_logged_in()){
    
                $row = $wpdb->get_row($wp_query->request);

                $statuses = self::return_applicable_post_statuses();

                $location = add_query_arg( self::return_plugin_namespace().'-login_required', 'true', wp_login_url(self::curpageurl()));
                
                if (!empty($_GET['attachment_id']) && is_numeric($_GET['attachment_id'])){
                    
                    $attachment_post = get_post($_GET['attachment_id']);
                    
                }
                

                if (!empty($row->post_status) && in_array($row->post_status, $statuses)) {

                    wp_safe_redirect($location, 302, self::plugin_name()); exit;

                    //this is hacky (apprently is_preview doesn't work in this case)

                } elseif (!empty($attachment_post->post_status) && in_array($attachment_post->post_status, $statuses)) {
                
                    wp_safe_redirect($location, 302, self::plugin_name()); exit;
                
                } elseif (isset($_GET['preview'])){

                    wp_safe_redirect($location, 302, self::plugin_name()); exit;

                }

            }
            
        }

    }


    public function display_login_message($message){
    
        if (!empty($_GET[self::return_plugin_namespace().'-login_required']) && ($_GET[self::return_plugin_namespace().'-login_required'] == 'true')){
            
            $message = apply_filters(self::return_plugin_namespace().'_display_login_message', '<p>'.__('This content is private you will need to login and have appropriate access.', self::return_plugin_text_domain()).'</p>');
      
        }
    
        return $message;   
    
    }

    public function plugin_init(){
        
        //load translations
        load_plugin_textdomain( self::return_plugin_text_domain(), false, basename( dirname( __FILE__ ) ) . '/languages' ); 
        
        //potentially redirect visitors to login if the page/post/cps is private
        add_action('template_redirect', array($this,'redirect_to_login'), 15);
        
        //display a message explaining the need to login
        add_filter( 'login_message', array($this,'display_login_message'),10,1);    
            
    }



    /**
     * Gets an instance of our plugin.
     *
     * using the singleton pattern
     */
    public static function get_instance(){
        if (null === self::$instance) {
            self::$instance = new self();
        }
 
        return self::$instance;
    }


    public function __construct() {
    
        //run whatever on plugins_loaded
        add_action( 'plugins_loaded', array($this,'plugin_init'));
    
    }


}

$lh_private_content_login_instance = LH_Private_content_login_plugin::get_instance();;

}

?>