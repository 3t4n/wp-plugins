<?php
/**
 * Plugin Name: AWEOS WP Lock
 * Plugin URI: https://aweos.de
 * Description: This Plugin displays a coming soon page in development mode
 * Version: 1.4.8
 * Author: AWEOS GmbH
 * Author URI: https://aweos.de
 * License: GPLv2
 */
 
defined('ABSPATH') || exit;

require_once(plugin_dir_path(__FILE__) . 'check-requirements.php');

if (!wplock_requirement_are_ok()) {
    return;
}

function loadAdminStyle() {
	wp_register_script('wplock-admin', plugins_url('', __FILE__) . '/js/admin.js', array('jquery'), '1.0.0', true);
	
	// AJAX-URL und Nonce für JavaScript bereitstellen
	wp_localize_script('wplock-admin', 'wplock_ajax', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('wplock_ajax_nonce')
	));
	
	wp_enqueue_script('wplock-admin');
}

function loadFrontendAndBackendStyle() {
	if (is_user_logged_in() && current_user_can('administrator')) {
		wp_register_style('wplock-backend', plugins_url('', __FILE__) . '/styles/backend-style.css');
		wp_enqueue_style('wplock-backend');
	}
}
add_action('admin_enqueue_scripts', 'loadAdminStyle');
add_action('wp_enqueue_scripts', 'loadFrontendAndBackendStyle');
add_action('admin_enqueue_scripts', 'loadFrontendAndBackendStyle');

class WpLock {
	public function hook() {
		require_once(plugin_dir_path(__FILE__) . 'includes/CsActivator.php');
		register_activation_hook(__FILE__, array('CsActivator', 'activate'));


		require_once(plugin_dir_path(__FILE__) . 'includes/FrontendMenu.php');
		add_action('admin_menu', array('FrontendMenu', 'create'));

		add_action('admin_post_update_wplock_settings', array('FrontendMenu', 'updateValues'));

		// NEW
		require_once(plugin_dir_path(__FILE__) . 'includes/Handler.php');
		$handler = new Handler(FrontendMenu::getOptions());
		
		// Handler-Aktion vor template_redirect ausführen, um Cache-Löschung zu ermöglichen
		add_action('init', array($handler, 'handle'));
		
		// WP Rocket Cache bei manuellen und automatischen Änderungen leeren
		add_action('wplock_status_changed', function() {
			if (function_exists('rocket_clean_domain')) {
				rocket_clean_domain();
			}
		});

		// Bestehende Cache-Löschung für manuelle Änderungen beibehalten
		add_action('admin_post_update_wplock_settings', function() {
			if (function_exists('rocket_clean_domain')) {
					rocket_clean_domain();
			}
		});

		require_once(plugin_dir_path(__FILE__) . 'includes/AdminBarMenu.php');
		$adminBarMenu = new AdminBarMenu($handler);
		add_action('admin_bar_menu', array($adminBarMenu, 'display'));

		if ($handler->isActive()) {
			remove_filter('template_redirect', 'redirect_canonical');
		}

		// NEU: Hook für den Status-Check
		add_action('wplock_check_status', array('Handler', 'checkStatus'));

		// NEU: Eigenes Cron-Intervall registrieren
		add_filter('cron_schedules', function($schedules) {
			$schedules['minute'] = array(
				'interval' => 60,
				'display' => 'Every Minute'
			);
			return $schedules;
		});

		// Cron-Event registrieren, falls es noch nicht existiert
		if (!wp_next_scheduled('wplock_check_status')) {
			wp_schedule_event(time(), 'minute', 'wplock_check_status');
		}

		// Hook für den Status-Check
		add_action('wplock_check_status', array('Handler', 'checkStatus'));

	}

}

$wpLock= new WpLock();
$wpLock->hook();
