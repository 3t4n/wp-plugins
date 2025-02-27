<?php

/**
 * Coupon plugin Setting Page
 *
 * Package  CouponPlugin\Custom\Admin
 * @since   1.0.0
 * @author  Coupon Plugin
 * @link    https://wpcouponplugin.com
 * @license GNU General Public License 2.0+
 */

namespace CouponPlugin\Custom\Admin;

add_action('admin_menu', __NAMESPACE__ . '\setting_page');
add_action('admin_init', __NAMESPACE__ . '\register_setting_option');

/**
 * Create Seeting Submenu Inside Coupon Post Type
 *
 * @since 1.0.0
 *
 * @return void
 */
function setting_page()
{
	add_submenu_page(
		'edit.php?post_type=coupon',
		__('Coupon Plugin Setting Page', COUPON_PLUGIN_TEXT_DOMAIN),
		__('Settings', COUPON_PLUGIN_TEXT_DOMAIN),
		'manage_options',
		'coupon-plugin-setting',
		__NAMESPACE__ . '\coupon_plugin_markup_page'
	);
	if (! function_exists('CouponPluginPro\coupon_plugin_pro_init')) {
		add_submenu_page(
			'edit.php?post_type=coupon',
			__('Go Pro', COUPON_PLUGIN_TEXT_DOMAIN),
			__('Go Pro  ➤', COUPON_PLUGIN_TEXT_DOMAIN),
			'manage_options',
			'edit.php?post_type=coupon&page=coupon-plugin-setting&tab=pro_settings'
		);
	}
}

/**
 * Create Setting Markup Page
 *
 * @since 1.0.0
 *
 *
 * @return void
 */
function coupon_plugin_markup_page()
{
	ob_start();
	include(COUPON_PLUGIN_PATH . 'src/custom/admin/view/setting-view.php');
	ob_get_flush();
}

/**
 * Create Option Name, Setting Sections, Setting Fields
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_setting_option()
{

	$confs = get_configuration();
	register_setting(
		'coupon-plugin-options',
		'coupon_plugin_settings',
		'coupon_plugin_validate'
	);
	foreach ($confs as $conf) {
		add_settings_section(
			"coupon-plugin-{$conf['id']}",
			"{$conf['title']}",
			'',
			'coupon-plugin-setting'
		);

		foreach ($conf['fields'] as $field) {
			add_settings_field(
				"coupon-plugin-field-{$field['name']}",
				"{$field['title']}",
				__NAMESPACE__ . '\callback',
				'coupon-plugin-setting',
				"coupon-plugin-{$conf['id']}",
				$field
			);
		}
	}
}

/**
 * Setting Field Callback
 *
 * @since 1.0.0
 *
 * @param array $field_type each field config array
 *
 * @return void
 */
function callback($field_type)
{
	setting_fields($field_type);
}

/**
 * Section & Field Configuration
 *
 * @since 1.0.0
 *
 * @return array configuration
 */
function get_configuration()
{
	$conf = array(
		array(
			'id'     => 'expiry-text',
			'title'  => __('Expiry Msgs', COUPON_PLUGIN_TEXT_DOMAIN),
			'fields' => array(
				array(
					'id'    => 'text',
					'name'  => 'expiry_msg',
					'title' => __('Enter The Expiry Msg To Display Before Expiry Date', COUPON_PLUGIN_TEXT_DOMAIN)
				),
				array(
					'id'    => 'text',
					'name'  => 'expiry_no_msg',
					'title' => __('Enter The Expiry Msg For The Coupon Which Has No Expiry Date', COUPON_PLUGIN_TEXT_DOMAIN)
				),
			),
		),
		array(
			'id'     => 'button-text',
			'title'  => __('Coupon/Deal Button', COUPON_PLUGIN_TEXT_DOMAIN),
			'fields' => array(
				array(
					'id'    => 'text',
					'name'  => 'coupon_hover_text',
					'title' => __('Enter Coupon Button Hover Text', COUPON_PLUGIN_TEXT_DOMAIN)
				),
				array(
					'id'    => 'text',
					'name'  => 'deal_hover_text',
					'title' => __('Enter Deal Button Hover Text', COUPON_PLUGIN_TEXT_DOMAIN)
				),
				array(
					'id'    => 'text',
					'name'  => 'deal_activated_text',
					'title' => __('Enter Deal Activated Text', COUPON_PLUGIN_TEXT_DOMAIN)
				),
			),
		),
		array(
			'id'     => 'button-color',
			'title'  => __('Coupon/Deal Button Color', COUPON_PLUGIN_TEXT_DOMAIN),
			'fields' => array(
				array(
					'id'    => 'color',
					'name'  => 'coupon_btn_color',
					'title' => __('Enter Coupon Button Color', COUPON_PLUGIN_TEXT_DOMAIN)
				),
				array(
					'id'    => 'color',
					'name'  => 'coupon_code_bg_color',
					'title' => __('Enter Coupon Code Background Color', COUPON_PLUGIN_TEXT_DOMAIN)
				),
				array(
					'id'    => 'color',
					'name'  => 'deal_button_color',
					'title' => __('Enter Deal Button Color', COUPON_PLUGIN_TEXT_DOMAIN)
				),
				array(
					'id'    => 'color',
					'name'  => 'deal_button_hover_color',
					'title' => __('Enter Deal Button Hover Color', COUPON_PLUGIN_TEXT_DOMAIN)
				),
				array(
					'id'    => 'color',
					'name'  => 'deal_activated_bg_color',
					'title' => __('Enter Deal Activated Background Color', COUPON_PLUGIN_TEXT_DOMAIN)
				),
			),
		),
	);

	return $conf;
}

/**
 * Custom Setting Section Markup
 *
 * @since 1.0.0
 *
 * @param string $page on which section will be seen
 *
 * @return void
 */
function custom_do_settings_sections($page)
{

	global $wp_settings_sections, $wp_settings_fields;

	if (! isset($wp_settings_sections[$page])) {
		return;
	}

	foreach ((array) $wp_settings_sections[$page] as $section) {
		if ($section['callback']) {
			call_user_func($section['callback'], $section);
		}
		if (
			! isset($wp_settings_fields)
			|| ! isset($wp_settings_fields[$page])
			|| ! isset($wp_settings_fields[$page][$section['id']])
		) {
			continue;
		}
		echo '<div class="settings-form-wrapper">';
		echo "<h3>{$section['title']}</h3>\n";
		custom_do_settings_fields($page, $section['id']);
		echo '</div>';
	}
}

/**
 * Callback for setting section
 *
 * @since 1.0.0
 *
 * @param string $page on which the field will be called
 * @param string $section under which the field will be called
 *
 * @return void
 */
function custom_do_settings_fields($page, $section)
{
	global $wp_settings_fields;
	if (
		! isset($wp_settings_fields) ||
		! isset($wp_settings_fields[$page]) ||
		! isset($wp_settings_fields[$page][$section])
	) {
		return;
	}
	foreach ((array) $wp_settings_fields[$page][$section] as $field) {
		echo '<div class="settings-form-row">';
		if (! empty($field['args']['label_for'])) {
			echo '<p><label for="' . $field['args']['label_for'] . '">' .
				$field['title'] . '</label><br />';
		} else {
			echo '<div class="cp-title">' . $field['title'] . '</div>';
		}
		echo '<div class="cp-fieldset">';
		call_user_func($field['callback'], $field['args']);
		echo '</div></div>';
	}
}
