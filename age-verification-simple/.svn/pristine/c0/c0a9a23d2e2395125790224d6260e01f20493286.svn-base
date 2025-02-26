<?php

defined('ABSPATH') or die();

class AgeVerificationSimpleController {
	
	// --------------------------------
	// VARS
	
	private $initiated = false;
	private $LIB;
	
	// --------------------------------
	// INIT
	
	function init() {
		
	//	wp_die('STOP'); // for dev tests
		
		if ($this->initiated) {return;} $this->initiated = true;
		
		// load base vars only
		
		$this->LIB = new AgeVerificationSimpleLib();
		$this->LIB->load_VARS__base();
		
		// !!!
		// PROTECTION
		// stops this script if _POST exists and is not addressed to this plugin or to the xhr_get() function
		// process_POST() (sanitize) inside xhr_get()
		
		if (!empty($_POST) && isset($_POST[$this->LIB->VARS['WP']['_wpnonce-key_name']]) && !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[$this->LIB->VARS['WP']['_wpnonce-key_name']])), $this->LIB->VARS['WP']['_wpnonce-pre']) && !isset($_POST['action']) && $_POST['action']!=='xhr_get') {return;}
		
	//	$this->LIB->COOKIE_reset(); // for dev tests
		$this->LIB->process_COOKIE();
		
		// !!!
		// stops this script if popup passed successfully
		
		if (isset($this->LIB->request->cookie[$this->LIB->VARS['cookie']['popup_name']]) && $this->LIB->request->cookie[$this->LIB->VARS['cookie']['popup_name']] && !$this->LIB->VARS['is_xhr']) {return;}
		
		// load next
		
		$this->LIB->load_VARS__other();
		$this->LIB->load_SETTINGS();
		
		$this->wp_register_scripts();
		
	//	echo("\n<pre><b>".__METHOD__."::".__LINE__."\n<u>".'VARS'."</u></b>\n");print_r($this->LIB->VARS);echo("</pre>\n\n");
		
	}
	
	// --------------------------------
	// WP register scripts
	
	function wp_register_scripts() {
		
		// site inject
		
		add_action( 'wp_body_open', array($this, 'inject') );
		
		// site inject // css // js
		
		if (!(isset($this->LIB->request->cookie[$this->LIB->VARS['cookie']['popup_name']]) && $this->LIB->request->cookie[$this->LIB->VARS['cookie']['popup_name']])) {
			add_action( 'wp_enqueue_scripts', array($this, 'wp_get_inline_style') );
		}
		
		// ajax // xhr
		
		add_action( 'wp_ajax_nopriv_xhr_get', array($this, 'xhr_get') );
		add_action( 'wp_ajax_xhr_get', array($this, 'xhr_get') );
		
	}
	function wp_get_inline_style() {
		
		$res = "";
		
		ob_start();
			
			$data['SETTINGS'] = $this->LIB->SETTINGS;
			$data['VARS'] = $this->LIB->VARS;
			foreach ($data as $k_ => $l_) { $$k_ = $l_; }
			
			require_once($this->LIB->VARS['path']['plugin_dir'].'assets/inline/css.php');
			$res = ob_get_contents();
			
		ob_end_clean();
		
		if (!empty($res)) {
			
			wp_register_style('_'.$this->LIB->VARS["name"]["code"].'-style', false, array(), 1);
			wp_enqueue_style('_'.$this->LIB->VARS["name"]["code"].'-style');
			wp_add_inline_style('_'.$this->LIB->VARS["name"]["code"].'-style', $res);
			
		}
		
	}
	
	// --------------------------------
	// PAGES // ACTIONS
	
	function xhr_get() {
		
	//	wp_die('STOP'); // for dev tests
		
	//	check_ajax_referer($this->LIB->VARS['WP']["_wpnonce-pre"], $this->LIB->VARS['WP']["_wpnonce-key_name"]);
		
		if (!(isset($_POST[$this->LIB->VARS['WP']['_wpnonce-key_name']]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[$this->LIB->VARS['WP']['_wpnonce-key_name']])), $this->LIB->VARS['WP']['_wpnonce-pre']))) {wp_die('0');}
		
		$res = [];
	//	$data = false;
		
		// process
		
		$this->LIB->process_POST();
		
		$type = isset($this->LIB->request->post['type'])?$this->LIB->request->post['type']:false;
		
		// type filter by key
		
		switch ($type) {
			
			// DEFAULT
			
			default:
			case 'false':
			case false:
				
				wp_die('0');
				
			break;
			
			case 'popup_apply':
			case 'popup_deny':
				
				if (!method_exists($this, $type)) {wp_die('0');}
				$res = $this->$type();
				
			break;
			
		}
		
		// here can be more processes ($data) before return result
		
		// result
		
	//	echo("\n<pre><b>".__METHOD__."::".__LINE__."\n<u>".'res'."</u></b>\n");print_r($res);echo("</pre>\n\n");
		echo wp_json_encode($res, true);
		wp_die();
		
	}
	
	function inject() {
		
		if (isset($this->LIB->request->cookie[$this->LIB->VARS['cookie']['popup_name']]) && $this->LIB->request->cookie[$this->LIB->VARS['cookie']['popup_name']]) {return;}
		
		$data = array();
		$data['SETTINGS'] = $this->LIB->SETTINGS;
		$data['VARS'] = $this->LIB->VARS;
		foreach ($data as $k_ => $l_) { $$k_ = $l_; }
		
		ob_start();
			
			require_once($this->LIB->VARS['path']['plugin_dir'] . 'tpl/popup.php');
			$data_inject = ob_get_contents();
			$data_inject = base64_encode($data_inject);
			
		ob_end_clean();
		
		ob_start();
			
			require_once($this->LIB->VARS['path']['plugin_dir'] . 'assets/inline/js.php');
			$data_js = ob_get_contents();
			
		ob_end_clean();
		
		require_once($this->LIB->VARS['path']['plugin_dir'] . 'tpl/popup_inject.php');
		
	}
	function popup_apply() {
		
		$res = array();
		
		$res['status'] = true;
		
		$this->LIB->VARS['id_rnd'] = 0;
		if (isset($this->LIB->request->post['id_rnd'])) {
			$this->LIB->VARS['id_rnd'] = $this->LIB->request->post['id_rnd'];
		}
		
		$this->LIB->COOKIE_set__popup_apply($this->LIB->SETTINGS['popup_settings']['cookies_time']);
		
		return $res;
		
	}
	function popup_deny() {
		
		$res = array();
		
		$res['status'] = true;
		$res['data'] = '';
	//	$res['is_redirect'] = false;
	//	$res['deny_redirect_url'] = '';
		
		$data = array();
		
		$this->LIB->COOKIE_del__popup_apply();
		
		$this->LIB->VARS['id_rnd'] = 0;
		if (isset($this->LIB->request->post['id_rnd'])) {
			$this->LIB->VARS['id_rnd'] = $this->LIB->request->post['id_rnd'];
		}
		
		$data['SETTINGS'] = $this->LIB->SETTINGS;
		$data['VARS'] = $this->LIB->VARS;
		
		foreach ($data as $k_ => $l_) { $$k_ = $l_; }
		
		if (isset($this->LIB->SETTINGS['popup_description']['deny_redirect_url']) && !empty(trim($this->LIB->SETTINGS['popup_description']['deny_redirect_url']))) {
			
			$res['is_redirect'] = true;
			$res['deny_redirect_url'] = $this->LIB->SETTINGS['popup_description']['deny_redirect_url'];
			
		}
		else
		{
			
			ob_start();
			require_once($this->LIB->VARS['path']['plugin_dir'] . 'tpl/popup_deny.php');
			$data_inject = ob_get_contents();
			ob_end_clean();
			
			$res['data'] = $data_inject;
			
		}
		
		return $res;
		
	}
	
}

?>