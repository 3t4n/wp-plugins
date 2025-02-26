<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('click_n_chat_activate')) {
	class click_n_chat_activate {
	   function click_n_chat_install() {
			update_option('click_n_chat_is_active', '0');
	   }
	   
	   function click_n_chat_uninstall() {
			global $wpdb;
			$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}cnc_social_user_schedule");
        	$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}cnc_social_users");
			$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}cnc_auto_reply");
			$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}cnc_leads");
			$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}cnc_leads_chat");
			delete_option('click_n_chat_setting_popup');
			delete_option('click_n_chat_greetings_message');
			delete_option('click_n_chat_is_enable');
			delete_option('click_n_chat_is_active');
			delete_option('click_n_chat_limit');
			delete_option('click_n_chat_purchase_code');
			delete_option('click_n_chat_setting_woocommerce');
			delete_option('click_n_chat_setting_chatgpt');
			delete_option('click_n_chat_setting_analytics');
			delete_option('click_n_chat_time_zone');
	   }
	}
	
	new click_n_chat_activate();
}