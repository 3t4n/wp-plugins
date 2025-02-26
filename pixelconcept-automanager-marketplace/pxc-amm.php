<?php
/*
Plugin Name: pixelconcept AUTOMANAGER Marketplace
Plugin URI: https://www.automanager.io/
Description: Integriert den pixelconcept AUTOMANAGER Marketplace in Ihrer WordPress Seite.
Version: 1.2.5.0
Author: pixelconcept GmbH
Author URI: https://www.pixelconcept.de/
Copyright: pixelconcept GmbH
Text Domain:  pxc_amm
Domain Path:  /languages
*/

if(!defined('ABSPATH')) exit; // Exit if accessed directly

require_once("metabox.php");

define('PXC_AMM_VERSION', '3');
define ('PXC_AMM_PLUGIN_VERSION', '1.2.5.0');

define('PXC_AMM_PLUGIN_DIR', str_replace("\\",'/',dirname(__FILE__)));
define('PXC_AMM_PLUGIN_URL', plugins_url('/', __FILE__));

define('PXC_AMM_NEEDLES', array("pixelconcept-fahrzeugboerse", "pxc-amm"));

function pxc_amm_load_textdomain() {
	load_plugin_textdomain('pxc_amm', false, basename(PXC_AMM_PLUGIN_DIR) . '/languages'); 
}

if (is_admin())
{
	require_once(PXC_AMM_PLUGIN_DIR . '/pxc-amm-settings.php');
}

foreach (PXC_AMM_NEEDLES as $needle) {
	add_shortcode($needle, 'pxc_amm_short_code');
}

add_action('plugins_loaded', 'pxc_amm_load_textdomain');

function pxc_amm_getsettings()
{
    $result = array(
		"apikey" => get_option('pxc_amm_apikey'),
		"apiurl" => 'https://api.pixel-base.de/marketplace/v3-11365/',
		"url-terms" => @json_decode(get_option('pxc_amm_url_terms')),
		"url-privacy" => @json_decode(get_option('pxc_amm_url_privacy')),
		"url-imprint" => @json_decode(get_option('pxc_amm_url_imprint')),
        "plugin-version" => PXC_AMM_PLUGIN_VERSION
	);
	
    return $result;
}

function pxc_amm_short_code() 
{
	$snippet = '';

	if (is_singular('page')) 
	{
		$settings = pxc_amm_getsettings();

		if ($settings['apikey']) {
			wp_enqueue_script('pxc-amm-loader', 'https://cdn.dein.auto/pxc-amm/loader.nocache', array(), true, false);
			$snippet = pxc_amm_get_snippet($settings);
		}
	}
	else 
	{
		$snippet = '[' . PXC_AMM_NEEDLES[0] . ']';
	}

	return $snippet;
}

function pxc_amm_get_snippet($settings)
{
	$attributes = pxc_amm_get_snippet_attributes($settings);
	$snippet = '<div id="am-marketplace"' . $attributes . '></div>';

	return $snippet;
}

function pxc_amm_get_snippet_attributes($settings)
{
	$attributes = ' api-key="' . $settings['apikey'] . '"';
	
	$attributes .= pxc_amm_get_snippet_pagelink_attribute($settings['url-terms'], 'urls-terms');
	$attributes .= pxc_amm_get_snippet_pagelink_attribute($settings['url-privacy'], 'urls-privacy');
	$attributes .= pxc_amm_get_snippet_pagelink_attribute($settings['url-imprint'], 'urls-imprint');

    $attributes .= ' plugin-version="' . $settings['plugin-version'] . '"';

	return $attributes;
}


function pxc_amm_get_snippet_pagelink_attribute($value, $key)
{
	if ($value) {

		$v1 = new stdClass();

		foreach ($value as $k => $v) {
			$k1 = str_replace('-', '_', $k);
			if (is_numeric($v)) {
				$v1->$k1 = get_page_link($v);
			} else {
				$v1->$k1 = $v;
			}
		}
	
		return ' ' . $key . '=\'' . @json_encode($v1, JSON_UNESCAPED_SLASHES) . '\'';
	}

	return '';
}

require_once(PXC_AMM_PLUGIN_DIR . '/pxc-amm-client.php');

require_once(PXC_AMM_PLUGIN_DIR . '/pxc-amm-sitemap.php');
require_once(PXC_AMM_PLUGIN_DIR . '/pxc-amm-sitemap.google-xml-sitemaps.php');
require_once(PXC_AMM_PLUGIN_DIR . '/pxc-amm-sitemap.yoast.php');
