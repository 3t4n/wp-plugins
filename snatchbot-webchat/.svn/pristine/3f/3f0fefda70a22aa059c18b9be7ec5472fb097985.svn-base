<?php 

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('SBW_Client') ) :
	
class SBW_Client {
	
	/**
	 * __construct
	 *
	 * Sets up the class functionality.
	 *
	 * @date	23/11/2019
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */
	 function __construct() {
		
		// Add hooks.
		add_action( 'wp_enqueue_scripts', array( $this, 'embed_code' ) );
	}
	
	/**
	 * embed_code
	 *
	 * Adds embed code to client site to bot deploying.
	 *
	 * @date	23/11/2019
	 * @since	1.0.0
	 *
	 * @param	void
	 * @return	void
	 */
	function embed_code(){

        global $wpdb; 
		$table = $wpdb->prefix . 'snatchbot_webchat';
		$assetsPath = sbw_get_paths();
    
		$wp_user = $wpdb->get_results( $wpdb->prepare("SELECT * FROM $table WHERE bot_id IS NOT NULL", NULL ) );
		$wp_esc_user = sbw_esc_checking_db($wp_user[0]);
        $bot_id = null;
        if (isset($wp_esc_user)) {
            $bot_id = $wp_esc_user->bot_id;
		}
    
        if (!empty($bot_id)) {
            wp_register_script('EmbedCode', 'https://account.snatchbot.me/script.js', '', '', false );
            wp_enqueue_script('SnatchEmbedCodeDeploy', $assetsPath['files']['embedCodeJS'], array('EmbedCode'), '', true );
            wp_localize_script( 'SnatchEmbedCodeDeploy' , 'snatchBot',
                array('botID' => $bot_id)
            );
        }
    
    }
}

// Instantiate.
sbw_new_instance('SBW_Client');

endif; // class_exists check
