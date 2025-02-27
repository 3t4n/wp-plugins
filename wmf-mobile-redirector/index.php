<?php
/*
	Plugin Name: WMF Mobile Redirector
	Plugin URI: http://themeforest.net/user/Webbu
	Description: A mobile device redirection plugin by Webbu.
	Version: 1.2
	Author: Webbu
	Author URI: http://themeforest.net/user/Webbu
*/



define("WER_THEME_URL", plugin_dir_url( __FILE__ ));
define("WER_PLUGIN_CSS_URL",WER_THEME_URL."css/");
define("WER_PLUGIN_JS_URL",WER_THEME_URL."js/");
define("WER_PLUGIN_IMAGE_URL",WER_THEME_URL."images/");
define("WER_PLUGIN_LANG_URL",WER_THEME_URL."languages/");


include 'includes/options-page.php'; 
require_once 'includes/mobile-detect.php';

function wmf_remobile_translate() {
  load_plugin_textdomain( 'wmfrt2d', false, WER_PLUGIN_LANG_URL ); 
}
add_action('plugins_loaded', 'wmf_remobile_translate');

function wmf_redirector_action(){
	
	$options = get_option('wmf_reoptions'); 
	
	if(isset($options['tabletsite']) == NULL){$tabletsite = "";}else{$tabletsite = $options['tabletsite'];}
	if(isset($options['mobilesite']) == NULL){$mobilesite = "";}else{$mobilesite = $options['mobilesite'];}
	if(isset($options['mobileactive']) == NULL){$mobileactive = "false";}else{$mobileactive = $options['mobileactive'];}
	if(isset($options['tabletactive']) == NULL){$tabletactive = "false";}else{$tabletactive = $options['tabletactive'];}
	if(isset($options['backlink']) == NULL){$backlink = "false";}else{$backlink = $options['backlink'];}
	if(isset($options['onlyhome']) == NULL){$onlyhome = "false";}else{$onlyhome = $options['onlyhome'];}

	
	$wmf_mobileredirect = new WMF_Mobile_Detect();

	$process = true;

	if ($onlyhome == "true" && (!is_front_page() && !is_home())) {
		$process = false;
	}

	if ($onlyhome == "true" && (is_front_page() || is_home())) {
		$process = true;
	}

	if (isset($_GET["desktop"])) {
		if ($backlink == "true" && absint($_GET["desktop"]) == 1 ) {
			$process = false;
		}
	}
	

	if ($process) {
		if ($wmf_mobileredirect->isMobile() && !$wmf_mobileredirect->isTablet()) {
			$deviceType = 'phone';
		}else if($wmf_mobileredirect->isTablet()){
			$deviceType = 'tablet';
		}
		
		if($mobileactive == "true" && $deviceType == "phone"){
			header('Location: '.$mobilesite.'');
		}
		
		if($tabletactive == "true" && $deviceType == "tablet"){
			header('Location: '.$tabletsite);
		}
	}
}

if(!is_admin()){	
	add_action('wp', 'wmf_redirector_action');
}


function wmfr_enque()
{	
	wp_register_style('styles-re', WER_PLUGIN_CSS_URL . 'style.css', array(), '1.0', 'all');
	wp_enqueue_style('styles-re');	
}
add_action('admin_enqueue_scripts', 'wmfr_enque');