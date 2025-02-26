<?php 


if( !class_exists('WS_AliDo_Settings') ):

class WS_AliDo_Settings{
	var $prefix = 'ws_alido_';
	var $menu = array('title'=>'支付宝快捷捐赠控制面板','label'=>'AlipayDonate');
	
	function __construct(){
		$this->WS_AliDo_Settings();
	}	

	
	function WS_AliDo_Settings(){
		$this->do_actions();			
	}
	
	function do_actions(){
		
		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'admin_menu', array( $this, 'menu' ) );
	}
	
	function admin_init(){
		$this->registerStyles();
	}
	
	function registerStyles(){
		//js
		wp_register_script('ws_alido_settings_js', WS_ALIDO_JS_URL.'/settings.js', array('jquery'));
		//css
		wp_register_style('ws_alido_settings_css', WS_ALIDO_CSS_URL . '/settings.css' );
	}
	
	function printStylesSettings(){
		//js
		//wp_enqueue_script('jquery' );	
		wp_enqueue_script('ws_alido_settings_js');	
		//css
		wp_enqueue_style('ws_alido_settings_css');
	}
	
	function menu(){
		$page = add_options_page($this->menu['title'],$this->menu['label'],
		'manage_options', $this->prefix . 'settings_page', array( $this, 'menu_page' ) );
		
		add_action('admin_print_styles-' . $page, array( $this, 'printStylesSettings' )  );
	}
	
	function menu_page(){
		include_once 'tpl.settings.php';
	}
}

endif;


$ws_alido_actions = new WS_AliDo_Settings();
?>