<?php 
/*
Plugin Name: Admin IP
Plugin URI: http://adresseip.vpndock.com/plugin-adresse-ip-admin-wordpress/
Description: Simply display your IP address (and hostname) on the WordPress dashboard admin panel.
Author: VPN Dock
Version: 1.0.001
Author URI: http://vpndock.com/
License: GPL2
*/

 
if(is_admin())
	{	
		function admin_ip_dashboard_widget_function()
		{
			// admin ip
			$admin_ip = $_SERVER['REMOTE_ADDR'];
			if(!$admin_ip)
				$admin_ip = 'unknown';
			
			// admin hostname
			$admin_hostname = @gethostbyaddr($admin_ip);
			if(!$admin_hostname OR $admin_hostname == $admin_ip)
				$admin_hostname = 'unknown';
			
			// display
			echo '<div style="display:table; width: 100%;">';
			
			echo '<div style="display:table-cell;"><big><strong>'.$admin_ip.'</strong></big></div>';
			
			if($admin_hostname != 'unknown')
				echo '<div style="display:table-cell; text-align: right;"><small>('.__('hostname', 'admin-ip').' : '.$admin_hostname.')</small></div>';
			
			echo "</div>\n";
		}
		
		
		// add FAQ link on plugin page
		function admin_ip_faq_link($links)
		{ 
			$faq_link = '<a href="http://wordpress.org/plugins/admin-ip/faq/" target="_blank">FAQ</a>'; 
			//array_unshift($links, $faq_link);
			array_push($links, $faq_link); 
			return $links; 
		}
		
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", 'admin_ip_faq_link' );
		
		
		// function dashboard widget
		function admin_ip_add_dashboard_widgets()
		{
			wp_add_dashboard_widget('admin_ip_dashboard_widget', __('Your IP Address', 'admin-ip'), 'admin_ip_dashboard_widget_function');
		}
		
		// function load translation file
		function admin_ip_load_translation_file()
		{
			$plugin_path = basename(dirname(__FILE__)).'/lang/';
			load_plugin_textdomain( 'admin-ip', false, $plugin_path );
		}
		
		
		add_action('wp_dashboard_setup', 'admin_ip_add_dashboard_widgets' );
		add_action('init', 'admin_ip_load_translation_file');
	}

