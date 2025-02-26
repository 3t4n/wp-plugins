<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Scripts Class
 *
 * Handles adding scripts functionality to the admin pages
 * as well as the front pages.
 *
 * @package Audio Text Convert
 * @since 1.0
 */

class Aud_txt_Scripts {

	//class constructor
	function __construct()
	{
		
	}
	
	/**
	 * Enqueue Scripts on Admin Side
	 * 
	 * @package Audio Text Convert
	 * @since 1.0
	 */
	public function aud_txt_admin_scripts($hook){
		if($hook == 'toplevel_page_audio-text') {
			wp_register_style('aud-txt-style',  AUD_TXT_INC_URL . '/css/aud-txt.css', array(), '', false);
	   		wp_enqueue_style('aud-txt-style'); 

			wp_register_script('aud-txt-script', AUD_TXT_INC_URL . '/js/aud-txt.js', array(), time(), true);
	   		wp_enqueue_script('aud-txt-script');

	   		wp_localize_script('aud-txt-script', 'aud_txt_ajax', array('ajax_url' => admin_url('admin-ajax.php') ));
	   	}
	
	}

	/**
	 * Enqueue Scripts on Front Side
	 * 
	 * @package Audio Text Convert
	 * @since 1.0
	 */
	public function aud_txt_front_scripts($hook){
		
		wp_register_style('aud-front-style',  AUD_TXT_INC_URL . '/css/aud-txt-front.css', array(), '', false);
   		wp_enqueue_style('aud-front-style'); 


   		wp_register_style('aud-bootstrap',  AUD_TXT_INC_URL . '/css/bootstrap.min.css', array(), '', false);
   		wp_enqueue_style('aud-bootstrap'); 

   		wp_register_script('aud-popper',  AUD_TXT_INC_URL . '/js/popper.min.js',array(), time(), true);
   		wp_enqueue_script('aud-popper'); 

   		wp_register_script('aud-bootstrap-min',  AUD_TXT_INC_URL . '/js/bootstrap.min.js',array(), time(), true);
   		wp_enqueue_script('aud-bootstrap-min');

   		wp_register_script('aud-slim',  AUD_TXT_INC_URL . '/js/aud-slim.js',array(), time(), true);
   		wp_enqueue_script('aud-slim');


   	

		wp_register_script('aud-front-script', AUD_TXT_INC_URL . '/js/aud-txt-front.js', array(), time(), true);
   		wp_enqueue_script('aud-front-script');	   	
	
	}
	
	/**
	 * Adding Hooks
	 *
	 * Adding hooks for the styles and scripts.
	 *
	 * @package Audio Text Convert
	 * @since 1.0
	 */
	function add_hooks(){
		
		//add admin scripts
		add_action('admin_enqueue_scripts', array($this, 'aud_txt_admin_scripts'));

		//add front scripts
		add_action('wp_enqueue_scripts', array($this, 'aud_txt_front_scripts'));
	}
}
?>