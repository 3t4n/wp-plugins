<?php
/*
Plugin Name: Jisbar
Plugin URI: http://www.jisbar.com
Description: Enables <a href="http://www.jisbar.com" target="_blank">Jisbar</a> for Wordpress.  This is the demo version.  You can get your own customized bar by visiting the site.  Then, you can use this plugin with your own unique bar ID. Click Jisbar Settings in the Plugins submenu to edit the Settings!
Version: 1.0
Author: Jisbar
Author URI: http://www.jisbar.com/
Copyright: Copyright Jisbar 2009
License: GPL (This plugin)
*/
if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');
function activate_jisbar() { add_option('web_property_id', '1256544769PlZDQJDfKb'); }
function deactive_jisbar() { delete_option('web_property_id'); }
function admin_init_jisbar() { register_setting('jisbar', 'web_property_id'); }
function admin_menu_jisbar() { add_submenu_page('plugins.php','Jisbar Settings', 'Jisbar Settings','manage_options', 'options_page_jisbar', 'options_page_jisbar'); }
function options_page_jisbar() { include(WP_PLUGIN_DIR.'/jisbar/options.php'); }
function jisbar() { 
?>
<script type="text/javascript" src="http://jisbar.com/nb/nbar.php?id=<?php echo get_option('web_property_id') ?>"></script>
<?php 
}
register_activation_hook(__FILE__, 'activate_jisbar'); register_deactivation_hook(__FILE__, 'deactive_jisbar');
if (is_admin()) { add_action('admin_init', 'admin_init_jisbar'); add_action('admin_menu', 'admin_menu_jisbar'); }
if (!is_admin()) { add_action('wp_footer', 'jisbar'); }
?>