<?php

defined('ABSPATH') or die();

class AgeVerificationSimpleLib {
	
	public $VARS = [];
	public $request;
	public $SETTINGS = [];
	
	public function load_VARS__base() {
		
		// main
		
		$this->LIB = $this;
		$this->LIB->VARS['DS'] = DIRECTORY_SEPARATOR;
		$this->LIB->VARS['VERSION'] = '1.3.0';
		$this->LIB->VARS['name']['code'] = 'age_verification__simple';
		$this->LIB->VARS['name']['_code'] = '_'.$this->LIB->VARS['name']['code'];
		$this->LIB->VARS['name']['_code_'] = $this->LIB->VARS['name']['_code'].'_';
		$this->LIB->VARS['name']['code-'] = $this->LIB->VARS['name']['code'].'-';
		
		// path
		
		$this->LIB->VARS['path'] = [];
		$this->LIB->VARS['path']['plugin_dir'] = WP_PLUGIN_DIR.$this->LIB->VARS['DS'].$this->LIB->VARS['name']['code'].$this->LIB->VARS['DS'];
		
		// WP
		
		$this->LIB->VARS['WP']['_wpnonce-pre'] = $this->LIB->VARS["name"]["code"].'-nonce';
		$this->LIB->VARS['WP']['_wpnonce-key_name'] = '_wpnonce';
		$this->LIB->VARS['WP']['_wpnonce'] = wp_create_nonce($this->LIB->VARS['WP']['_wpnonce-pre']);
		
		// request
		
		$this->LIB->request = new stdClass;
		$this->LIB->request->post = [];
		$this->LIB->request->cookie = [];
		
		// cookie
		
		$this->LIB->VARS['cookie'] = [];
		$this->LIB->VARS['cookie']['popup_name'] = '_'.$this->LIB->VARS['name']['code'].'-popup';
		
		// is ajax // is xhr
		
		$this->LIB->VARS['is_xhr'] = $this->LIB->VARS['is_ajax'] = (isset($_SERVER['REQUEST_URI']) && stripos(sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])),'/admin-ajax.php')!==false);
		
		// return
		
		return $this->LIB->VARS;
		
	}
	public function load_VARS__other() {
		
		// links
		
		$this->LIB->VARS['links'] = [];
		$this->LIB->VARS['links']['admin_ajax_url'] = admin_url('admin-ajax.php');
		
		// other
		
		$this->LIB->VARS['id_rnd'] = substr(sha1(wp_rand()),32,64).''.time().''.substr(sha1(wp_rand()),32,64);
		
		return $this->LIB->VARS;
		
	}
	public function load_SETTINGS() {
		
		$this->LIB->SETTINGS = $this->settings_defaults();
		$this->LIB->SETTINGS['popup_description'] = $this->settings_defaults_description();
		
		return $this->LIB->SETTINGS;
		
	}
	
	function settings_defaults() {
		
		$res = array();
		
		$res = array(
			
			'module_status' => '1',
			'popup_settings' => array(
				
				'popup_text_color' => '#7b7b7b',
				'popup_outer_background' => 'rgba(9, 19, 27, 0.8)',
				'popup_background' => 'rgba(9, 19, 27, 1)',
				'popup_background_image' => '',
				'popup_background_image_blur_value' => '10px',
				'popup_width' => '400px',
				'popup_z_index' => 999999999,
				
				'page_block_scroll' => true,
				'page_blur' => true,
				'page_blur_performance' => false,
				'page_blur_value' => '10px',
			//	'position' => 'middle', // top // middle
				
				'cookies_time' => 43200, // 12h
				'cookies_time' => 3000, // dev
				
				'deny_redirect_url' => '',
				
			),
			'popup_description' => array(),
			'custom_css' => '',
			
		);
		
		return $res;
		
	}
	function settings_defaults_description() {
		
		$res = array();
		
		$res = array(
			
			'description' => '<h3 align="center"><font color="#cec6ce">Are you 18 or older ?</font></h3><div align="center" style="line-height: 1;">You must be 18 years of age or older</div><div align="center" style="line-height: 1;">to enter into the site.</div>',
			'description_deny' => '<h4 align="center"><font color="#cec6ce">You are not allowed to view the site.</font></h4><p align="center">Please, leave this page.<br></p>',
			'btn_apply' => 'Agree',
			'btn_deny' => 'Decline',
			'deny_redirect_url' => '',
			
		);
		
		return $res;
		
	}
	
	function process_POST() {
		
		// sanitize_vals
		
		// wp_verify_nonce already checked before call this function but check again to prevent "Plugin Check" errors
		
		if (!(isset($_POST[$this->LIB->VARS['WP']['_wpnonce-key_name']]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[$this->LIB->VARS['WP']['_wpnonce-key_name']])), $this->LIB->VARS['WP']['_wpnonce-pre']))) {return;}
		
		$tmp = [
			
			'action',
			'type',
			'_wpnonce',
			'id_rnd',
			
		];
		foreach ($tmp as $k_ => $l_) {
			if (isset($_POST[$l_])) { $this->LIB->request->post[$l_] = sanitize_text_field( wp_unslash ( $_POST[$l_] ) ); }
		}
		$_POST['process_POST'] = true;
		
	}
	function process_COOKIE() {
		
		if (empty($_COOKIE)) {return;}
		
		$tmp = [
			
			$this->LIB->VARS['cookie']['popup_name'],
			
		];
		foreach ($tmp as $k_ => $l_) {
			if (isset($_COOKIE[$l_])) { $this->LIB->request->cookie[$l_] = sanitize_text_field( wp_unslash ( $_COOKIE[$l_] ) ); }
		}
		
	}
	
	function COOKIE_reset() {
		
		setcookie($this->LIB->VARS['cookie']['popup_name'], "", time()-3600, COOKIEPATH, COOKIE_DOMAIN);
		
	}
	function COOKIE_set__popup_apply($time = 3600) {
		
		setcookie($this->LIB->VARS['cookie']['popup_name'], "1", time()+$time, COOKIEPATH, COOKIE_DOMAIN);
		
	}
	function COOKIE_del__popup_apply() {
		
		setcookie($this->LIB->VARS['cookie']['popup_name'], "", time()-3600, COOKIEPATH, COOKIE_DOMAIN);
		
	}
	
}

?>