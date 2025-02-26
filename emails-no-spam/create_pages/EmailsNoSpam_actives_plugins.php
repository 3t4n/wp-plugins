<?php
/**
 * Detect plugin. For use on Front End only.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
 
// check for plugin using plugin name
if ( is_plugin_active( 'login-logout-shortcode-simple/login-logout-shortcode-simple.php' ) ) {
    //plugin is activated
	//echo "Plugin is activated.";
} 
else
{

	
					echo "<pre>Plugin Login Logout Shortcode Simple is not activated!</pre>";
					$url_plugin = admin_url().'plugin-install.php?tab=plugin-information&plugin=login-logout-shortcode-simple&TB_iframe=true&width=600&height=550';
					
					echo '<a href="'.$url_plugin.'" target="_blank">Login Logout Shortcode Simple</a> ';
					die();
}





// check for plugin using plugin name
if ( is_plugin_active( 'easy-wp-smtp/easy-wp-smtp.php' ) ) {
    //plugin is activated
	//echo "Plugin is activated.";
} 
else
{

	
					echo "<pre>Plugin Easy WP SMTP is not activated!</pre>";
					$url_plugin = admin_url().'plugin-install.php?tab=plugin-information&plugin=easy-wp-smtp&TB_iframe=true&width=600&height=550';
					
					echo '<a href="'.$url_plugin.'" target="_blank">Easy WP SMTP</a> ';
					die();
}


?>