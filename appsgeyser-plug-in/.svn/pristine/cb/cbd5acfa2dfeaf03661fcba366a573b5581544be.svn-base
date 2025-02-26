<?php
	if (!session_id())
		session_start();
/*
	Plugin Name: AppsGeyser Plugin
	Plugin URI: http://appsgeyser.com
	Description: Use AppsGeyser Plugin to convert your blog to native Android app. Make your blog easy to read on mobile devices. Submit your app to Android Market and increase your audience.
	Version: 1.0.0
	Author: Besttoolbars
	Author URI: http://appsgeyser.com
*/
	// TODO: need to past license here
	// refactoring needed
	
	if (!function_exists(get_bloginfo()))
		require_once(ABSPATH . "/wp-includes/general-template.php");
	
	if (!function_exists(get_allowed_themes)) {
		require_once(ABSPATH . "/wp-admin/includes/theme.php");
		
		if (!isThemeAvailable())
			add_action("admin_notices", "appsgeyser_plugin_themes_notices");
	}
        
        function isThemeAvailable() {
            return (get_theme("WordPress Mobile (base)") != null || get_theme("Carrington Mobile") != null ||
                    is_dir(ABSPATH . "/wp-content/plugins/wptouch") || is_dir(ABSPATH . "/wp-content/plugins/wordpress-mobile-pack"));
        }
	
	function appsgeyser_plugin_themes_notices() {
?>
		<div id="message" class="error upgraded">
			<strong> Appsgeyser Plugin </strong> require one of the following themes has been installed:
			
			<p>
				<ul>
					<li><a href = "http://wordpress.org/extend/plugins/wptouch/"> WPtouch plugin </a></li>
					<li><a href = "http://wordpress.org/extend/plugins/wordpress-mobile-pack/"> WordPress Mobile Pack </a></li>
					<li><a href = "http://crowdfavorite.com/wordpress/themes/carrington-mobile/"> Carrington Mobile </a></li>
				</ul>
			</p>
		</div>
<?php
	}
	
	include_once("plugin-class.php");
		
	$appsgeyserPlugin = new AppsgeyserPlugin();
		
	add_action("admin_menu", array(&$appsgeyserPlugin, "addPluginPage"));
	
	$path_to_php_file = "appsgeyser-plugin/wp-appsgeyser-plugin.php";
	
	add_action("deactivate_" . $path_to_php_file, array(&$appsgeysePlugin, "deactivate"));
	add_action("activate_" . $path_to_php_file, array(&$appsgeyserPlugin, "activate"));
	
	if ((isset($_REQUEST["appsgeyserMobile"]) || $_SESSION["appsgeyserMobile"])) {
		$_SESSION["appsgeyserMobile"] = true;
		
		$appsgeyserPlugin->setupTemplate();
		
		if ($appsgeyserPlugin->areThemesReady()) {
			add_filter("template", array(&$appsgeyserPlugin, "getTemplate"), 11);
			add_filter("stylesheet", array(&$appsgeyserPlugin, "getTemplate"), 11);
			add_filter("theme_root", array(&$appsgeyserPlugin, "getThemeRoot"), 11);
			add_filter("theme_root_uri", array(&$appsgeyserPlugin, "getThemeUri"), 11);
		}
	}
?>