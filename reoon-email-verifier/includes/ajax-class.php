<?php

namespace REOONENV\ajax;

use REOONENV\api\ReoonApi;

class ReoonAjax
{

    public function __construct()
    {        
        add_action( 'wp_ajax_validate_reoon_api', array($this,'validate_reoon_api' ));
        add_action( 'wp_ajax_nopriv_validate_reoon_api', array($this,'validate_reoon_api' ));


        add_action( 'wp_ajax_validate_reoon_email', array($this,'validate_reoon_email' ));
        add_action( 'wp_ajax_nopriv_validate_reoon_email', array($this,'validate_reoon_email' ));


        add_action('wp_ajax_reoon_remove_api_key', array($this,'reoon_remove_api_key'));        
    }


    public function reoon_remove_api_key() {
        
            
        $options = get_option("reoonev-settings" );
        if ( isset( $options['reoon_api_key'] ) ) {
            unset( $options['reoon_api_key'] );
            //update_option( 'reoonev-settings', serialize( $options ) );            
            
            delete_option('reoonev-settings');
            add_option( 'reoonev-settings',  $options  );
        }
            
        wp_send_json_success();
        
    }

    public function validate_reoon_email()
    {
        if ( isset( $_POST["email"] ) ) {
            $email = sanitize_email( $_POST["email"] );
    
            // Validate email format
            if ( ! is_email( $email ) ) {
                wp_send_json( "Invalid email format" );
                die();
            }
    
            $api = new ReoonApi();
            $result = $api->ValidateEmail_plugin_settings( $email );
                    
            if ( $result !== false ) {
                wp_send_json( "Email validation is successful. Email status is: <b>" . esc_html( $result ) . "</b>" );
            } else {
                wp_send_json( "Email validation is unsuccessful" );
            }
        } else {
            wp_send_json( "Email parameter is missing" );
        }
    
        die();  
    }
    
public function validate_reoon_api(){

    

    $api_key = $_POST["api_key"];
    $api = new ReoonApi();
    $result = $api->GetAccountInfo($api_key);

    update_option("reoon_api_key",$api_key);
    
    var_dump($result);
     // your code
     wp_die();
}
    


}

$reon_ajax = new ReoonAjax();
