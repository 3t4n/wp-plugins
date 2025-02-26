<?php

	if ( ! defined( 'ABSPATH' ) ) exit;

	add_action('admin_menu', 'appsaur_localization_menu');

	function appsaur_localization_menu(){ 
		add_menu_page('Appsaur Localization', 'Localization', 'administrator', 'appsaur-localization', 'appsaur_localization_plugin', 'dashicons-location-alt');
	}

