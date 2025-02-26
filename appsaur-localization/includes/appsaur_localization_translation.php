<?php	

	if ( ! defined( 'ABSPATH' ) ) exit;

	add_action('plugins_loaded', 'appsaur_localization_translation');
	
	function appsaur_localization_translation(){
		load_plugin_textdomain( 'appsaur-localization', false, APPSAUR_LOCALIZATION_TRANSLATION_DIR  );

	}
