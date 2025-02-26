<?php
/*
Plugin Name: Adsense Extreme
Plugin URI: http://www.adsenseplugin.it/
Description: Adsense Extreme is a free plugin that automatically insert and optimize Google Adsense ads to your site for increase your profits. This plugin is compatible with the widget system too. Supported Language English, Italiano, Spanish.
Version: 1.1.4
Author: Mario Gentile
Author URI: https://plus.google.com/106933910975648282797/
*/
include_once('adsensextremeopt.php');
$aeopt = new aeopt();
include_once('adsensextremewidget.php');
function aeopt_menu()
{
	global $aeopt;
	if(function_exists('add_options_page'))
	{
		add_options_page('Adsense Extreme', 'Adsense Extreme', 'administrator', __FILE__ , array(&$aeopt, 'admin_menu'));
	}
}
function aeopt($type)
{
	global $aeopt;
	$code = $aeopt->generateAd($type);
	if($code)
	{
		echo(html_entity_decode($code));
	} else {
		echo('<!--adsense ad injection by Adsense Extreme (http://www.adsenseplugin.it/) failed - tried to add more than 3 ads per page -->');
	}
}
function ae_plugin_actions($links, $file)
{
	static $this_plugin;
	if(!$this_plugin) $this_plugin = plugin_basename(__FILE__);
	if($file == $this_plugin)
	{
		$settings_link = '<a href="options-general.php?page=adsense-extreme/adsensextreme.php">' . __('Settings') . '</a>';
		$links = array_merge(array($settings_link), $links);
	}
	return $links;
}
if(is_admin())
{
	add_action('admin_menu', 'aeopt_menu');
	add_action('admin_init', array($aeopt, 'aeopt_admin_init'));
	add_filter('plugin_action_links', 'ae_plugin_actions', 10, 2);
} else {
	add_filter('init', array($aeopt, 'aeopt_init'));
	add_action('wp_footer', array($aeopt, 'aeopt_debug'));
	add_filter('the_post', array($aeopt, 'post_aeopt'));
	add_action('loop_start', array($aeopt, 'init_count'));
	add_action('loop_end', array($aeopt, 'destroy_count'));
	add_filter('the_content', array($aeopt, 'adsenseoptimize'), 100);
}
add_action('widgets_init', 'ae_load_widgets');
function ae_load_widgets()
{
	register_widget('adsense_extreme_Widget');
}
?>