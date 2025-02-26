<?php
/*
Plugin Name: Autoofficе
Plugin URI: https://wordpress.org/plugins/autooffice/
Description: Плагин для интеграции рассылки с сервисом АвтоОфис. Позволяет встроить форму подписки на любую из рассылок АвтоОфис через shortcode или html-код. Поддерживает каналы рекламы. Для работы плагина требуется создать тематическую рассылку в магазине на сервисе АвтоОфис
Author: Autooffice
Version: 1.0.04
Author URI: https://profiles.wordpress.org/autooffice#content-plugins
*/

if (!session_id()) {
	session_start();
}

define('AOPF_AUTOOFFICE_DIR', plugin_dir_path(__FILE__));
define('AOPF_AUTOOFFICE_URL', plugin_dir_url(__FILE__));
define('AOPF_DEBUG', true);

require_once __DIR__ . '/autoload.php';

load_plugin_textdomain( 'autooffice', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

register_activation_hook(__FILE__, ['AutoofficeOptions', 'aopf_autooffice_install']);
register_uninstall_hook(__FILE__, ['AutoofficeOptions', 'aopf_autooffice_uninstall']);
register_deactivation_hook(__FILE__, ['AutoofficeOptions', 'aopf_autooffice_deactivation']);

function aopf_autooffice_load() {

	if (is_admin()) {

		AutoofficeOptions::aopf();
		
	} else {

		AutoofficeWork::aopf()->aopf_autooffice_wpForm();
	}
}

add_action('plugins_loaded', 'aopf_autooffice_load');

/* Widget */
add_action('widgets_init', function () {
	register_widget('AutoofficeWidget');
});
