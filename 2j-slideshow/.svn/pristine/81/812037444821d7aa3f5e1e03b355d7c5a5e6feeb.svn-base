<?php

class TwoJSlideshowSetup{

	public $api	= 'https://2joomla.net/setup/update.php';
	public $slug = '2j-slideshow';

	function __construct(){		
		add_action("init", array($this, 'init'));
	}

	public function init(){		
		if( !current_user_can('manage_options') ) return ;		
		if( !current_user_can('administrator') ) return ;	

		if( isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/wp-admin/plugins.php') !== false ){
			add_action('admin_footer',			array($this, 'popup') );
			add_action('admin_enqueue_scripts', array($this, 'includes') );
		}		
		add_action('wp_ajax_twoj_slideshow_setup',	array($this, 'twoj_slideshow_setup') );
	}

	
	public function includes(){
		
		wp_enqueue_script('twoj_slideshow_setup-js', plugin_dir_url( __FILE__ ) . 'js/setup.js', array('jquery'), false, true );		
		wp_enqueue_style('twoj_slideshow_setup-css', plugin_dir_url( __FILE__ ) . 'css/setup.css', false, '1.0', 'all');
		
		wp_localize_script('twoj_slideshow_setup-js', 'twoj_slideshow_setup',  array(
				'slug'		=> $this->slug,
				'skip'		=> __('Skip & Deactivate'),
				'submit'	=> __('Submit & Deactivate'),
				'ajax_nonce' =>  wp_create_nonce( 'twoj_setup_ajax_nonce' ),
		));
		
	}

	private function deactivate2JSlidehsow(){		
		$pluginName = '2jslideshow/2jslideshow.php';		
		if( is_plugin_active($pluginName) ){
			deactivate_plugins( $pluginName );
			return ;
		}

		$pluginName = '2j-slideshow/2jslideshow.php';
		if( is_plugin_active($pluginName) ){
			deactivate_plugins( $pluginName );
			return ;	
		}
	}
	
	public function twoj_slideshow_setup(){
		if( !current_user_can('manage_options') ) return ;		
		if( !current_user_can('administrator') ) return ;

		check_ajax_referer('twoj_setup_ajax_nonce');

		if( isset( $_POST['plugin'] ) ){
			$this->deactivate2JSlidehsow();
		}

		
		if( isset( $_POST['check'] ) ){
			$message = '';
			if( isset($_POST['twoj_slideshow_setup-msg-better-plugin']) && $_POST['twoj_slideshow_setup-msg-better-plugin'] )  $message .= 'Plugin:'.$_POST['twoj_slideshow_setup-msg-better-plugin'].'|';
			if( isset($_POST['twoj_slideshow_setup-msg-other']) && $_POST['twoj_slideshow_setup-msg-other'] )  $message .= 'Other:'.$_POST['twoj_slideshow_setup-msg-other'].'|';
			$this->remoteGet( $_POST['check'], $message );
		}
		
		wp_die();
	}

	private function remoteGet( $check, $msg = '' ){
		if(!is_callable('wp_remote_get')) return ;
		
		$args = array(
			'body' => array( 
				'check'=> $check, 
				'msg' => $msg 
			)
		);

		$response = wp_remote_get( $this->api, $args );
		/*var_dump($response);*/
		die();				
	}
	
	public function popup(){
		include_once dirname(__FILE__) . '/tpl/popup.php';
	}

}