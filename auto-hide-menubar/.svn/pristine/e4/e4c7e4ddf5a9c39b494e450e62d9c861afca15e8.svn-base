<?php

class Punkfish_AutoHide_Menubar {

	//Namespace
	public $ns = 'punkfish_autohide_menubar_';

	private $rootPath;
	private $pluginFile;
	private $pluginName;

	//Options
	public $options = array();
	
	//Configs
	public $config = array();

	//Constructor
	public function Punkfish_AutoHide_Menubar($rootPath,$pluginFile,$pluginName,$options=array()) {
		$this->rootPath = $rootPath;
		$this->pluginFile = $pluginFile;
		$this->pluginName = $pluginName;

		$this->options = $options;

		//Load Configs
		$this->loadConfig();

		//Start Hooks
		if(is_admin()) {
			add_action('admin_menu',array($this,'addMenus'));
		}
		if($this->config['jquery']) { add_action('wp_head',array($this,'loadjQuery')); }
		if($this->config['enable']) { add_action('wp_head',array($this,'addScript')); }
	}

	public function registerSettings() {
		register_setting($this->options['default'],$this->ns.'enable');
		register_setting($this->options['default'],$this->ns.'jquery');
	}

	public function loadConfig() {
		//General Settings
		$this->config['enable'] = get_option($this->ns.'enable');
		$this->config['jquery'] = get_option($this->ns.'jquery');
	}

	public function addMenus() {
		add_submenu_page('themes.php',$this->pluginName,$this->pluginName,'administrator',$this->pluginFile,array($this,'pageSettingsDefault'));
		add_action('admin_init',array($this,'registerSettings'));
	}

	public function pageSettingsDefault() {
		include($this->rootPath.'/page/settings-default.php');
	}

	public function loadjQuery() {
		echo <<<EOD
<script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
EOD;
	}

	public function addScript() {
		echo <<<EOD
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	var wpadminbar = $('#wpadminbar');
	var doc = $(this);
	wpadminbar.hide();
	doc.mousemove(function(e) {
		if(e.pageY<=wpadminbar.height()) {
			if(wpadminbar.css('display')!='block') { wpadminbar.show(); }
		}
		else {
			if(wpadminbar.css('display')=='block' && !$('li',wpadminbar).hasClass('hover')) { wpadminbar.hide(); }
		}
	});
});
</script>
EOD;
	}

}

?>