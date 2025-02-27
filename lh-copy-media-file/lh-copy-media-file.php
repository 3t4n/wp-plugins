<?php
/**
 * Plugin Name: LH Copy Media File
 * Plugin URI: https://lhero.org/portfolio/lh-copy-media-file/
 * Description: Allows a admin users to create a copy of any media file without the need to download and upload the original so that they can edit the new copy without changing the original.
 * Author: Peter Shaw
 * Author URI: https://shawfactor.com/
 * Version: 1.11
 * Text Domain: lh-copy-media-file
 * Domain Path: /languages
 * License:           GNU General Public License v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 4.1
*/


if (!class_exists('LH_copy_media_file_plugin')) {


class LH_copy_media_file_plugin {
    
    private static $instance;

    static function return_plugin_namespace(){

        return 'lh_copy_media_file';

    }
    
    static function return_plugin_text_domain(){

        return 'lh-copy-media-file';

    }
    
    
    
    

    public function media_row_action($actions, $post){
        
        $url = wp_strip_all_tags(add_query_arg( 'lh-copy-media-file-hander-postid', $post->ID));
        $url = add_query_arg( self::return_plugin_namespace().'-nonce', wp_create_nonce(self::return_plugin_namespace().'-nonce'), $url);
 
        $actions['lh_copy_media_file_link'] = '<a href="'.
esc_url( $url ).'" title="'.__('create a new copy of this file', self::return_plugin_text_domain()).'" class="lh_copy_media_file_link">' . __('Copy File', self::return_plugin_text_domain()) . '</a>';
        
        return $actions;
        
    }

    //Perform the duplicating action
    public function duplicate_file_v2() {
	
	    global $pagenow;
	
        //Check to make sure we're on the right page and performing the right action
        if( 'upload.php' != $pagenow ){
	
	        return false;

        }
        
        if ( empty( $_GET[ 'lh-copy-media-file-hander-postid' ] ) ){

             return false;
		
        }
        
        if (!current_user_can('upload_files')){
            
            return false;
            
        }
        
        if (empty($_GET[self::return_plugin_namespace().'-nonce'])){
            
            return false;
            
        }
        
        if (!wp_verify_nonce( $_GET[self::return_plugin_namespace().'-nonce'], self::return_plugin_namespace().'-nonce')) {
                
        		return false;
        		
        }

        $post_id = (int) $_GET[ 'lh-copy-media-file-hander-postid' ];
	
        if ( empty( $post_id ) ){

		    return false;
                
        }
        
        

        $url = wp_get_attachment_url($post_id);
        $post_data = get_post($post_id);
        
        if (empty($post_data)){
            
            return false;
            
        }
        
        
        $desc = "Copy of ".$post_data->post_title;

        if (!class_exists('LH_copy_from_url_class')) {

            include_once("includes/lh-copy-from-url-class.php");
                    
        }

        $attachment_id = LH_copy_from_url_class::save_external_file($url,0, $desc);
                
        if ( is_wp_error( $attachment_id ) ) {
                    
            $error_string = $attachment_id->get_error_message();
            echo '<div id="message" class="error"><p>' . esc_html($error_string). '</p></div>';
            die;
                    
        } else {
	
            //Redirect to the edit page for that file
            wp_safe_redirect( admin_url( 'post.php?post='.$attachment_id.'&action=edit') );
            exit();
                    
        }
        
    }

    public function plugin_init(){

        load_plugin_textdomain( self::return_plugin_text_domain(), false, basename( dirname( __FILE__ ) ) . '/languages' ); 

        add_filter('media_row_actions', array($this,"media_row_action"), 10, 2);
        add_action( 'admin_init', array($this,"duplicate_file_v2") );
        
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

    function __construct() {

        //run whatever on plugins loaded (currently just translations)
        add_action( 'plugins_loaded', array($this,'plugin_init'));

    }

}

$lh_copy_media_file_instance = LH_copy_media_file_plugin::get_instance();

}


?>