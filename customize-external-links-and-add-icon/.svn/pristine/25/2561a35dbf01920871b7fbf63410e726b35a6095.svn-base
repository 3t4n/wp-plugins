<?php

function cuexlinks_load_plugin_textdomain()
{
	load_plugin_textdomain('customize-external-links', FALSE, basename(dirname(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'cuexlinks_load_plugin_textdomain');

if (!defined('ABSPATH')) die('-1');


function cuexlinks_install()
{
	//add_option('cuexlinks_exclude_domains', '');

	$arr = array(
		"chkIconSize" => "1", 
		"chkNoFollow" => "1", 
		"chkNoReferrer" => "1", 
		"chkNoOpener" => "1", 
		"chkNewWindow" => "1", // neu
		"chkNoFollowImage" => "1", 
		"option_iconType" => "None", 
		"text_area_exclude" => "");
	update_option('plugin_options', $arr);
}
register_activation_hook(__FILE__, 'cuexlinks_install');

function cuexlinks_uninstall()
{
	$options = get_option('plugin_options');
	$keep = $options['text_area_exclude'];
	//delete_option('cuexlinks_apply_to_menu');
}
register_deactivation_hook(__FILE__, 'cuexlinks_uninstall');

function cuexlinks_plugin_action_links($links, $file)
{
	if ($file == plugin_basename(dirname(__FILE__) . '/customize-external-links.php')) {
		$links[] = '<a href="' . admin_url('options-general.php?page=cuexlinks_option_page') . '">' . __('Settings', 'customize-external-links') . '</a>';
		$links[] = '<a href="https://wordpress.org/support/plugin/customize-external-links-and-add-icon/reviews/?rate=5#new-post">' . __('Rate Plugin', 'customize-external-links') . '</a>'; 
	}
	return $links;
}
add_filter('plugin_action_links', 'cuexlinks_plugin_action_links', 10, 2);


function cuexlinks_admin_style()
{
	global $pluginsURI;
	wp_register_style('cuexlinks_admin_css', plugins_url('customize-external-links-and-add-icon/css/admin-style.css'));
	wp_enqueue_style('cuexlinks_admin_css');
}
add_action('admin_enqueue_scripts', 'cuexlinks_admin_style');

function cuexlinks_fontawesome_admin()
{
	wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v6.7.1/css/all.css');
}

add_action('admin_init', 'cuexlinks_fontawesome_admin');

add_action('admin_init', 'cuexlinks_init_fn');


function cuexlinks_plugin_menu()
{
	add_options_page('Customize External link', 'Customize External links', 'manage_options', 'cuexlinks_option_page', 'cuexlinks_option_page_fn');
}
add_action('admin_menu', 'cuexlinks_plugin_menu');

function cuexlinks_option_page_fn()
{
	include_once('customize-external-links-form.php');
}

// check if wp_head contains already font awesome
function cuexlinks_check_for_fawesome($list)
{
	foreach ($list as $l) {
		if (strstr($l, "awesome")) {
			return $list;
		}
	}

	return $list;
}

add_filter('print_styles_array', 'cuexlinks_check_for_fawesome');
add_filter('print_script_array', 'cuexlinks_check_for_fawesome');

$options = get_option('plugin_options');

// Check if $options is an array and if the 'option_iconType' key exists
if (is_array($options) && isset($options['option_iconType'])) {
    // Use strpos safely since we now know 'option_iconType' exists
    if (strpos($options['option_iconType'], 'external') !== false) {
        add_action('wp_enqueue_scripts', 'cuexlinks_add_fawesome');
    }
} else {
    // Handle the case where the option is missing, for example, by logging or setting default values.
    // You could set a default empty array to prevent further issues:
    $options = array();
}


function cuexlinks_add_fawesome()
{
	wp_enqueue_style('font-awesome-free', '//use.fontawesome.com/releases/v6.6.0/css/all.css');
}