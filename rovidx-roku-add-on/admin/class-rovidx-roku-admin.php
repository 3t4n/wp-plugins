<?php

// Working
function roRokuBasicMenu() { 
	add_submenu_page('rovidx-options', 'Roku VOD Lite', 'Roku VOD Lite', 'manage_options', 'roroku', 'rovidx_roku_addon_page');
}
add_action('admin_menu', 'roRokuBasicMenu');

function rovidx_register_roku_settings()
{
	register_setting('rovidx_settings_roku_group', 'rovidx_settings_roku', '');
}
add_action('admin_init', 'rovidx_register_roku_settings');