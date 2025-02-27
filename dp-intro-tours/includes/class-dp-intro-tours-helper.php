<?php

use IntroToursDP\Wp\Acf;
use IntroToursDP\Wp\WpStd;

use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;
use IntroToursDP\Std\Core\Str;
use IntroToursDP\Std\Core\Path;
use IntroToursDP\Std\Html\Html;
use IntroToursDP\Std\Core\Color;
use IntroToursDP\Std\Html\Element;
use IntroToursDP\Wp\AdminNotice;
use IntroToursSabberworm\CSS\Parser;
use IntroToursSabberworm\CSS\RuleSet\DeclarationBlock;


define('DPIT_STEPS_URL_TYPE_UNIFIED', 'UNIFIED');
define('DPIT_STEPS_URL_TYPE_REL', 'REL');
define('DPIT_STEPS_URL_TYPE_ABS', 'ABS');

/**
 *
 * @link  https://deeppresentation.com
 * @since 1.0.0
 *
 * @package    Dp_Intro_Tours
 * @subpackage Dp_Intro_Tours/includes
 */

/**
 *
 *
 * @since      1.0.0
 * @package    Dp_Intro_Tours
 * @subpackage Dp_Intro_Tours/includes
 * @author     Tomas Groulik <tomas.groulik@gmail.com>
 */
class Dp_Intro_Tours_Helper
{

	public static function get_all_step_definitions()
	{

		// acf table config
		$selectPositionOptions = [];
		foreach (Dp_Intro_Tours_Helper::get_position_select_options() as $key => $value) {
			$selectPositionOptions[] = "{$key}:{$value}";
		}
		$highlightStyleOptions = [];
		foreach (Dp_Intro_Tours_Helper::get_highlight_select_options() as $key => $value) {
			$highlightStyleOptions[] = "{$key}:{$value}";
		}
		$mobile_breakpoint = Dp_Intro_Tours_Helper::get_mobile_breakpoint_val();
		$intro_label       = (DP_INTRO_TOURS_IS_PRO)
			? __('Content: text/html/short-code', 'dp-intro-tours')
			// translators: %s: link to PRO features page at deeppresentation.com
			: sprintf(__("Content: text/html<br> <a class='dpit-table-pro-link' href='%s' target='_blank'>[short-code PRO only]</a>", 'dp-intro-tours'), DP_INTRO_TOURS_PRODUCT_FEATURES_LINK_PRO);
		$intro_hint = (DP_INTRO_TOURS_IS_PRO)
			? __("Text, html code or WP short-code, that is shown in current tour's step.", 'dp-intro-tours')
			: __("Text or html code, that is shown in current tour's step. Short-code content is available in PRO version only.", 'dp-intro-tours');
		return [
			'element'             => [
				'title' => __('Target Selector', 'dp-intro-tours'),
				'hint'  => __("Defines target element for current step in form of css selector eg '.testimonial-box', '#section-1'. In case of selector for multiple elements, first is used.", 'dp-intro-tours'),
				'def'   => '',
				'type'  => 'text',
			],
			'intro'               => [
				'title' => $intro_label,
				'hint'  => $intro_hint,
				'def'   => '',
				'type'  => 'text_wp_edit',
			],
			'url'                 => [
				'title' => __('Page/Post/CPT URL', 'dp-intro-tours'),
				'hint'  => __('Relative URL of page, post or other custom post type, where specified target element is at. (Eg. "/" = root of your web). If required url is not listed in Insert/edit link tool, just type it manually as all CPTs are supported. In case of linking to extraneous web, use absolute url of course.', 'dp-intro-tours'),
				'def'   => '',
				'type'  => 'link',
				'hide'  => !DP_INTRO_TOURS_IS_PRO,
			],
			'position'            => [
				'title'   => __('Tooltip Position', 'dp-intro-tours'),
				'hint'    => __("Optionally you can alter tooltip position. However, this preference won't be in effect in all cases, as if there is no space enough for required positioning, algorithm choose position automatically.", 'dp-intro-tours'),
				'def'     => '',
				'type'    => 'select',
				'options' => $selectPositionOptions,
			],
			'highlight'           => [
				'title'   => __('Highlight Border', 'dp-intro-tours'),
				'hint'    => __('Optionally you can alter target highlight border style.', 'dp-intro-tours')
					. '<br> • ' . __('OFFSET: border is thicker and offset from the target', 'dp-intro-tours')
					. '<br> • ' . __('FULL: border is wider and glued directly to the target element', 'dp-intro-tours'),
				'def'     => '',
				'type'    => 'select',
				'options' => $highlightStyleOptions,
			],
			'enable_interaction'  => [
				'title' => __('Interaction', 'dp-intro-tours'),
				'hint'  => __('Enable/disable user interaction with the target element (Do not block clicks and other events except link clicks. By default, clicks on the link element are always blocked so as not to interrupt the tour.', 'dp-intro-tours'),
				'def'   => '0',
				'type'  => 'checkbox',
				'ext'   => [
					'iterate_after_click_stop_propagation' => [
						'def'   => '0',
						'title' => __('block clicks', 'dp-intro-tours'),
						'type'  => 'checkbox',
						'hint'  => __('When a tour is running, all clicks on the current target element other than for tour purposes will be blocked.', 'dp-intro-tours')
							. '<br>' . __('(However, this feature is not effective in 100% of cases, because the used WordPress template or other plugin may have registered the mouse down event earlier and the intro plugin will not have time to block it.)', 'dp-intro-tours'),
					],
					'iterate_after_click'                  => [
						'def'   => '0',
						'title' => __('click&rarr;next', 'dp-intro-tours'),
						'type'  => 'checkbox',
						'hint'  => __('After clicking on the target element, the tour moves to the next step.', 'dp-intro-tours'),
					],
					'iterate_after_click_delay_ms'         => [
						'def'   => 500,
						'title' => __('click&rarr;next delay[ms]', 'dp-intro-tours'),
						'type'  => 'number',
						'min'   => 0,
						'max'   => 60000,
						'step'  => 100,
						'hint'  => __('Delay the transition to the next step after clicking on the target element with enabled "click&rarr;next".', 'dp-intro-tours')
							. '<br>' . __('E.g. when a modal window opens after clicking a button with a delay (CSS animation etc.) and the target element of the next step is in that modal window.', 'dp-intro-tours'),
					],
					'open_target_link_clicks_in_new_tab'   => [
						'def'   => '0',
						'title' => __('link click&rarr;new tab', 'dp-intro-tours'),
						'type'  => 'checkbox',
						'hint'  => __('Link clicks within the target element are forced to open a new tab.', 'dp-intro-tours'),
					],
					'iterate_after_hover'                  => [
						'def'   => '0',
						'title' => __('hover&rarr;next', 'dp-intro-tours'),
						'type'  => 'checkbox',
						'hint'  => __('After hovering the mouse over the target element, the tour moves to the next step.', 'dp-intro-tours'),
					],
					'iterate_after_hover_delay_ms'         => [
						'def'   => 500,
						'title' => __('hover&rarr;next delay[ms]', 'dp-intro-tours'),
						'type'  => 'number',
						'min'   => 0,
						'max'   => 60000,
						'step'  => 100,
						'hint'  => __('Delay the transition to the next step after hovering over the target element with enabled "hover&rarr;next".', 'dp-intro-tours')
							. '<br>' . __('E.g. when a submenu is opened after hovering over a menu item with a delay (CSS animation, etc.) and the target element of the next step is in that submenu.', 'dp-intro-tours'),
					],
					'hide_next_btn'                        => [
						'def'   => '0',
						'title' => __('hide next', 'dp-intro-tours'),
						'type'  => 'checkbox',
						'hint'  => __('Disable the "next" button so the user must interact (click, hover) on the target element.', 'dp-intro-tours'),
					],
					'hide_overlay'                         => [
						'def'   => '0',
						'title' => __('hide overlay', 'dp-intro-tours'),
						'type'  => 'checkbox',
						'hint'  => __('The overlay will be hidden so the user can fully interact with whole page.', 'dp-intro-tours'),
					],
				],
			],
			'alt_mobile_selector' => [
				'title' => __('Mobile Target Selector', 'dp-intro-tours'),
				// translators: %d: screen width in pixels
				'hint'  => sprintf(__('Defines an alternative target element for mobile devices with a display width less than or equal to %d px. This only makes sense, if the target element in the mobile display differs from the standard target element or is part of mobile MENU. You can adjust the mobile screen width limit in the global settings of the plugin.', 'dp-intro-tours'), $mobile_breakpoint),
				'def'   => '',
				'type'  => 'text',
				'hide'  => !DP_INTRO_TOURS_IS_PRO,
			],
			'is_in_mobile_menu'   => [
				'title' => __('Is in Mob. MENU?', 'dp-intro-tours'),
				'hint'  => __('Check the box if the target element is in the main mobile menu. It allows to automatically open and close the mobile menu during the tour. It only takes effect if the Mobile Target Selector is set and the selectors for opening and closing the mobile menu are set on the global plugin options page.', 'dp-intro-tours'),
				'def'   => '0',
				'type'  => 'checkbox',
				'hide'  => !DP_INTRO_TOURS_IS_PRO,
			],
			'skip_on_mobile'      => [
				'title' => __('Skip on mobile', 'dp-intro-tours'),
				// translators: %d: screen width in pixels
				'hint'  => sprintf(__('To skip step on mobile phones with a screen width of less then or equal to %d pixels, check the box. You can adjust the mobile screen width limit in the global settings of the plugin.', 'dp-intro-tours'), $mobile_breakpoint),
				'def'   => '0',
				'type'  => 'checkbox',
				'hide'  => !DP_INTRO_TOURS_IS_PRO,
			],
			'skip_on_big_screen'  => [
				'title' => __('Skip on wide screens', 'dp-intro-tours'),
				// translators: %d: screen width in pixels
				'hint'  => sprintf(__('To skip step on devices with a screen larger than %d pixels, check the box. You can adjust the mobile screen width limit in the global settings of the plugin.', 'dp-intro-tours'), $mobile_breakpoint),
				'def'   => '0',
				'type'  => 'checkbox',
				'hide'  => !DP_INTRO_TOURS_IS_PRO,
			],
			'hidden_meta'         => [
				'title' => 'Hidden meta',
				'hide'  => !DP_INTRO_TOURS_DP_DEBUG_EN,
				'type'  => 'ext_only',
				'ext'   => [
					'build_with_wp_editor' => [
						'def'   => '0',
						'title' => __('wp editor', 'dp-intro-tours'),
						'type'  => 'checkbox',
					],
				],
			],

		];
	}


	public static function get_acf_root_key(string $prefix = '')
	{
		// cspell:ignore group_5e4c8efda20c2
		return $prefix . 'group_5e4c8efda20c2';
	}

	// sprintf(__("Defines an alternative target element for mobile devices with a display less than or equal to %dpx. This only makes sense if the target element in the mobile display differs from the standard target element or is a mobile menu element. You can adjust the mobile screen width limit in the global settings of the plugin.", 'dp-intro-tours'), $mobile_breakpoint)


	public static function get_plugin_ico_svg($title = '')
	{
		$title_element = $title ? '<title>' . $title . '</title>' : '';
		return '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  viewBox="0 0 344.75 319.46">' . $title_element . '<path class="dpit-ab-li__icon" fill="rgba(255, 255, 255, 0.6)" d="M344.67,192.14a139.42,139.42,0,0,0-3.47-24.73,196.51,196.51,0,0,0-16.72-44.81,207.52,207.52,0,0,0-12-20.49,182,182,0,0,0-14.51-19,146,146,0,0,0-17.39-17.13,112.18,112.18,0,0,0-21.06-14.06,84.26,84.26,0,0,0-25.32-8.34,75.71,75.71,0,0,0-13.84-.86,73.51,73.51,0,0,0-13.84,1.86,85.06,85.06,0,0,0-24.75,10.4,115.69,115.69,0,0,0-19.93,15.68,162.62,162.62,0,0,0-16.12,18.28,193.76,193.76,0,0,0-13.24,19.83,230.86,230.86,0,0,0-19.56,42.89,184.58,184.58,0,0,0-6.19,23.23,115.69,115.69,0,0,0-1.78,12.48,73.32,73.32,0,0,0,0,14,40.9,40.9,0,0,0,1.78,8.51,29.83,29.83,0,0,0,2.18,5.08,26,26,0,0,0,1.76,2.79,23.48,23.48,0,0,0,2.13,2.55,31.39,31.39,0,0,0,8.17,6.09,51.11,51.11,0,0,0,7.25,3.08,77,77,0,0,0,13.07,3c4.18.64,8.25,1,12.26,1.18a204.07,204.07,0,0,0,46.52-3.71q11.35-2.14,22.46-5.41a178.18,178.18,0,0,0,21.9-8A101.93,101.93,0,0,0,255.05,211a60.55,60.55,0,0,0,10.07-7.37,29.55,29.55,0,0,0,7.95-11.3c.21-.59.4-1.2.56-1.8s.3-1.27.38-1.78c.2-1.08.33-2.17.43-3.27a31.34,31.34,0,0,0-.14-6.57,35.36,35.36,0,0,0-3.85-12,49.51,49.51,0,0,0-6.84-9.85,87.47,87.47,0,0,0-17.41-14.79,151.84,151.84,0,0,0-19.51-10.87,155.52,155.52,0,0,0-20.62-8,155.63,155.63,0,0,1,19.41,10.28,148.3,148.3,0,0,1,17.67,12.71,81.24,81.24,0,0,1,14.47,15.42c3.92,5.64,6.55,11.94,6.56,17.95a21.07,21.07,0,0,1-.44,4.43c-.16.72-.33,1.44-.55,2.14a5.54,5.54,0,0,1-.32.89c-.11.27-.24.53-.37.79a18.13,18.13,0,0,1-5.62,5.78c-5,3.51-11.45,5.93-18,7.8a146.06,146.06,0,0,1-20.44,4c-6.95.92-14,1.46-21,1.74s-14.05.26-21,0l-.38,0c-13.31-.89-33.61-3.07-37.9-8.06-2.13-2.5-2.63-6.76-2.32-11.35.34-2.24.77-4.54,1.26-6.86a158.44,158.44,0,0,1,5.55-19.2,217.62,217.62,0,0,1,17.19-37c6.9-11.67,14.76-22.72,23.89-31.77s19.43-16.05,30-18.74A41.54,41.54,0,0,1,221.64,73a44.6,44.6,0,0,1,8.13.34,54.26,54.26,0,0,1,16.42,5.16,82,82,0,0,1,15.67,10.11,118.84,118.84,0,0,1,14,13.66,150,150,0,0,1,12.13,16,168.83,168.83,0,0,1,10.05,17.61,159.08,159.08,0,0,1,7.79,18.68A133.69,133.69,0,0,1,311,173.81a95.68,95.68,0,0,1,1.83,18.94,53.09,53.09,0,0,1-2.56,16.64,47.73,47.73,0,0,1-8.14,13.9,77.72,77.72,0,0,1-13,12.25C279.26,243,267.48,249.17,255,254a242.54,242.54,0,0,1-39,11.41,284.15,284.15,0,0,1-40.64,5.42,264.37,264.37,0,0,1-40.43-.46c-13.17-1.25-26.06-3.66-37.37-7.54A80.19,80.19,0,0,1,82.46,256a34.37,34.37,0,0,1-9.64-8.11A16.68,16.68,0,0,1,71.56,246c-.29-.54-.71-1.32-1.15-2.16a47,47,0,0,1-2.51-6.15c-.77-2.32-1.5-4.85-2.1-7.52s-1.14-5.47-1.54-8.37a170,170,0,0,1-.69-37.07C65.63,159.09,72.2,133,81.4,107.87A416.11,416.11,0,0,1,117,35.14q10.65-17.38,22.69-34L140.5,0H46.41A512.43,512.43,0,0,0,13.79,86.54C5.39,117.4.1,149.4,0,182.49a230.81,230.81,0,0,0,5.2,50.67c1,4.33,2.14,8.7,3.48,13.07s3,8.85,5,13.34a103.06,103.06,0,0,0,7.14,13.65A74.15,74.15,0,0,0,31.5,286.78a91.83,91.83,0,0,0,25.74,17.79,134.71,134.71,0,0,0,25.84,9.09c17,4.16,33.42,5.57,49.55,5.78a314.68,314.68,0,0,0,47.56-3.23q11.69-1.68,23.21-4.15t22.87-5.67a284.65,284.65,0,0,0,44.43-16.67c14.41-7,28.52-15.28,41.34-26.44A112.51,112.51,0,0,0,329.71,244a81.24,81.24,0,0,0,12.13-25A86.62,86.62,0,0,0,344.67,192.14Z" /></svg>';
	}


	public static function get_step_definition_ids($useBuild = '')
	{
		return (DP_INTRO_TOURS_IS_PRO || $useBuild === 'PRO')
			? ['element', 'intro', 'url', 'position', 'highlight', 'enable_interaction', 'alt_mobile_selector', 'is_in_mobile_menu', 'skip_on_mobile', 'skip_on_big_screen', 'hidden_meta']
			: ['element', 'intro', 'position', 'highlight', 'enable_interaction', 'hidden_meta'];
	}

	public static function is_singular_intro_tour($_post = null)
	{
		if (!$_post) {
			global $post;
			$_post = $post;
		}
		if (is_int($_post)) {
			$_post = get_post($_post);
		}
		return !is_archive() && $_post && is_object($_post) && $_post->post_type === 'dp_intro_tours';
	}

	/*  public static function get_text_style_options_4_frontend( $btn_font_tour_override, ) {

	}*/

	public static function get_text_style_options()
	{

		$use_custom_text_styles = !Settings::get_setting_array_bool('dp_it_general_options', 'inherit_all_styles', false);
		return $use_custom_text_styles
			? self::get_options_array(
				'dp_it_text_styles_options',
				[
					'all_in_1_size_coef' => 95,
					'mobile_size_coef'   => 90,
					'font_size_unit'     => 'em',
					'p_font_size'        => 1,
					'h2_font_size'       => 1.765,
					'h5_font_size'       => 1.05,
					'p_mb'               => 10,
					'h2_mb'              => 13,
					'h5_mb'              => 10,
				]
			)
			: null;
	}

	public static function get_text_style_options_inline_css($include_editor_content_css = false, bool $add_accent_color = false, $style_target_selector = ':root')
	{
		$res = '';
		if ($add_accent_color) {

			//$accent_color = Dp_Intro_Tours_Helper::get_accent_color( get_the_ID() );
			//$res          = $style_target_selector . '{--accent-color: 255,0,0;}';
			$res = Dp_Intro_Tours_Helper::get_dynamic_css(true, false, false, $style_target_selector);
			//$res = str_replace( '\\', '\\\\', $res );
			//$res = str_replace( '"', '\"', $res );
		}
		$text_style_options = self::get_text_style_options();
		if ($text_style_options) {
			$res .= self::generate_inline_text_styles($text_style_options, $style_target_selector, $include_editor_content_css);
		}
		return $res;
	}




	public static function get_options_array($key, $defaults, $type_by_default = true)
	{
		$options_array = get_option($key, []);

		foreach ($defaults as $option_key => $default_val) {
			if ($default_val || $default_val === 0) {

				$option_val = Arr::get($options_array, $option_key);
				if ($option_val && $type_by_default) {
					$def_val_type = gettype($default_val);
					switch ($def_val_type) {
						case 'float':
							//case 'double':
							$option_val = floatval($option_val);
							break;
						case 'integer':
							$option_val = intval($option_val);
							break;
					}
					$options_array[$option_key] = $option_val;
				}
				if ((!$option_val)) {

					$options_array[$option_key] = $default_val;
				}
			}
		}
		return $options_array;
	}

	public static function get_mobile_breakpoint_val()
	{
		return intval(Settings::get_setting_array_field('dp_it_mobile_breakpoints_options', 'mobile', 600));
	}

	public static function get_breakpoint_options()
	{
		return Dp_Intro_Tours_Helper::get_options_array('dp_it_mobile_breakpoints_options', ['mobile' => 600]);
	}




	public static function text_styles_is_h_or_p_option($key)
	{
		return strlen($key) >= 3 && ($key[0] === 'p' && $key[1] === '_' || $key[0] === 'h' && $key[2] === '_');
	}

	public static function text_styles_is_font_family_val($key)
	{
		return in_array($key, ['p_font', 'h_font', 'btn_font'], true);
	}

	public static function pre_process_text_styles($text_styles)
	{
		$res            = [];
		$font_size_unit = Arr::sget($text_styles, 'font_size_unit');
		if ($text_styles && count($text_styles)) {

			$font_size_coef = Arr::sget($text_styles, 'all_in_1_size_coef', 100);

			$res['font-size-coef'] = $font_size_coef / 100;
			foreach ($text_styles as $key => $val) {
				if (self::text_styles_is_font_family_val($key)) {
					$res[$key] = ($val || $val === '0') ? $val : 'inherit';
				}
			}

			$p_font_size = Arr::sget($text_styles, 'p_font_size', null);
			if ($p_font_size || $p_font_size === '0') {
				$res['p_font_size'] = 'calc(' . $p_font_size . $font_size_unit . '*var(--font-size-coef))';

				$p_mb = Arr::sget($text_styles, 'p_mb', null);
				if ($p_mb || $p_mb === '0') {
					$res['p_mb'] = 'calc(' . $p_mb / 100 . '*' . $p_font_size . $font_size_unit . ')';
				}
			}

			$h2_font_size = Arr::sget($text_styles, 'h2_font_size', null);
			$h5_font_size = Arr::sget($text_styles, 'h5_font_size', null);
			if ($h2_font_size || $h2_font_size === '0' && $h5_font_size || $h5_font_size === '0') {
				$unit = ($h2_font_size - $h5_font_size) / 4;
				for ($i = 1; $i <= 6; $i++) {
					$unitCnt                  = $i - 2;
					$res["h{$i}_font_size"] = 'calc(' . ($h2_font_size - $unitCnt * $unit) . $font_size_unit . '*var(--font-size-coef))';
				}
			}

			$h2_mb = Arr::sget($text_styles, 'h2_mb', null);
			$h5_mb = Arr::sget($text_styles, 'h5_mb', null);
			if ($h2_mb || $h2_mb === '0' && $h5_mb || $h5_mb === '0') {
				$unit = ($h2_mb - $h5_mb) / 4;
				for ($i = 1; $i <= 6; $i++) {
					$unitCnt           = $i - 2;
					$percent_val       = round(10 * ($h2_mb - $unitCnt * $unit)) / 10;
					$res["h{$i}_mb"] = 'calc(' . $percent_val / 100 . '*' . $res["h{$i}_font_size"] . ')';
				}
			}
		}
		return $res;
	}

	public static function generate_inline_text_styles($text_styles_cfg, $style_target_selector = 'body', $include_editor_content_css = false)
	{
		$res = '';

		$text_styles = self::pre_process_text_styles($text_styles_cfg);
		if ($text_styles && count($text_styles)) {
			$css_variables = [];
			foreach ($text_styles as $key => $val) {
				$css_variables["--{$key}"] = $val;
			}
			$mobile_size_coef      = Arr::get($text_styles_cfg, 'mobile_size_coef', '100') / 100;
			$all_in_1_size_coef    = Arr::get($text_styles_cfg, 'all_in_1_size_coef', '100') / 100;
			$font_size_coef        = $mobile_size_coef * $all_in_1_size_coef;
			$mobile_break_point_px = Dp_Intro_Tours_Helper::get_mobile_breakpoint_val();
			$media_query           = "@media (max-width: {$mobile_break_point_px}px){ {$style_target_selector}{--font-size-coef:{$font_size_coef}}}";
			$res                   = $style_target_selector . '{' . Html::get_style_str($css_variables) . '}' . $media_query;
		}

		if ($include_editor_content_css) {
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			$file_path = plugin_dir_path(__FILE__) . 'assets/css/editor-content.css';
			if (file_exists($file_path)) {
				$content = file_get_contents($file_path);

				if ($content) {
					$content = str_replace('\\', '\\\\', $content);
					$content = str_replace('"', '\"', $content);
					$res    .= $content;
				}
			}
			$file_path = plugin_dir_path(__FILE__) . 'assets/css/editor-content-color.css';
			if (file_exists($file_path)) {
				$content = file_get_contents($file_path);
				if ($content) {
					$res .= $content;
				}
			}
		}
		return self::minimize_css_simple($res);
	}

	public static function minimize_css_simple($css)
	{
		$css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css); // negative look ahead
		$css = preg_replace('/\s{2,}/', ' ', $css);
		$css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
		$css = preg_replace('/;}/', '}', $css);
		return $css;
	}

	public static function render_tiny_mce()
	{
?>
		<div id="dp-step-content-edit__backdrop" class="dpit-modal__backdrop"></div>
		<div id="dp-step-content-edit" class="dpit-mce-dialog dpit-modal wp-editor-expand wp-core-ui" role="dialog">
			<div class="dpit-mce-dialog__content">
				<div class="dpit-modal__title"><?php _e('Edit step content', 'dp-intro-tours'); ?></div>
				<?php
				wp_editor(
					'',
					'dp-tmce-editor',
					[
						'editor_height'    => 350,
						'default_editor'   => 'TinyMCE',
						'drag_drop_upload' => true,
						'tabindex'         => 0,
						'wpautop'          => false,
						'tinymce'          => [
							'block_formats'            => 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Address=address;Pre=pre',
							'content_style'            => self::get_text_style_options_inline_css(true, true, '#tinymce'),
							'allow_unsafe_link_target' => true,
							'default_link_target'      => '_blank',

						],
					]
				);
				?>
				<br />
				<div class="dpit-modal__buttons">
					<button id="dpit-mce-dialog-close" type="button" class="button button-secondary"><?php _e('Cancel'); ?></button>
					<button class="button button-primary"><?php _e('Confirm', 'dp-intro-tours'); ?></button>
				</div>
			</div>
		</div>
	<?php
	}



	public static function filter_mce_toolbar($toolbar_buttons, $toolbar_idx = 1)
	{
		$all_buttons_to_remove = [
			0 => [],
			1 => ['wp_more'],
			// cspell:ignore fontselect fontsizeselect
			2 => ['fontselect', 'fontsizeselect'],
		];
		$buttons_to_remove = Arr::get($all_buttons_to_remove, $toolbar_idx, []);
		$res               = array_filter(
			$toolbar_buttons,
			function ($button) use ($buttons_to_remove) {
				return !in_array($button, $buttons_to_remove, true);
			}
		);
		if ($toolbar_idx === 1) {
			array_splice($res, 9, 0, 'alignjustify');
			//array_push( $res, 'alignjustify' );
		}
		return $res;
	}

	public static function get_accent_color($tour_id, $generic_global_options_array = null)
	{
		$accent_color = Acf::get_group_field('intro_design', 'dp_it_accent_color', $tour_id);
		if (!$accent_color) {
			if ($generic_global_options_array) {
				$generic_global_options_array = get_option('dp_it_general_options', []);
			}
			$accent_color = Arr::get($generic_global_options_array, 'dp_it_accent_color');
			if (!$accent_color) {
				$accent_color = '#1d6093';
			}
		}
		return $accent_color;
	}


	public static function get_dp_intro_query_params_free_public_no_builder()
	{
		return ['dp_qp_step' => 'dp-step'];
	}

	public static function get_dp_intro_query_params($include_builder_params = true)
	{
		$res = [
			'dp_qp_step'               => 'dp-step',
			'dp_qp_tour_id'            => 'dp-id',
			'dp_qp_backward'           => 'dp-back',
			'dp_qp_trigger_id'         => 'dp-trg',
			'dp_qp_theme'              => 'dp-theme',
			'dp_qp_pch'                => 'dp-pch',
			'dp_qp_accent_color'       => 'dp-ac',
			'dp_qp_run_always_on_load' => 'dp-ra',
			'dp_qp_lock'               => 'dp-lock',
			'dp_qp_lock_bc'            => 'start-intro-tour',
			'dp_qp_url_vars'           => 'dp-uvs',
			'dp_qp_vfs'                => 'dp-vfs',
			'dp_qp_vls'                => 'dp-vls',
		];
		if ($include_builder_params) {
			$res = array_merge(
				$res,
				[
					'dp_qpb_builder_mode'         => 'dpb-mode',
					'dp_qpb_builder_origin'       => 'dpb-origin',
					// cspell:ignore dpb-oeid dpb-tsch
					'dp_qpb_origin_el_id'         => 'dpb-oeid',
					'dp_qpb_canceled'             => 'dpb-canceled',
					'dp_qpb_total_saved_changes'  => 'dpb-tsch',
					'dp_qpb_init_state'           => 'dpb-state',
					'dp_qpb_mobile_alt_step_mode' => 'dpb-mob-asm',
					'dp_qpb_in_new_window'        => 'dpb-in-new-win',
					'dp_qpb_create_new'           => 'dpb-create-new',
					'dp_qpb_tour_name'            => 'dpb-tour-name',
				]
			);
		}
		return $res;
	}

	public static function remove_dp_query_var(string $id, string $url, ?array $query_params_definitions = null)
	{
		if (!$query_params_definitions) {
			$query_params_definitions = self::get_dp_intro_query_params(true);
		}
		$varname = self::get_dp_url_param_name($id, $query_params_definitions);
		return preg_replace('/([?&])' . $varname . '=[^&]+(&|$)/', '$1', $url);
	}


	public static function get_dp_url_param_name(string $id, ?array $query_params_definitions = null)
	{

		$res = $id;
		if (!$query_params_definitions) {
			$query_params_definitions = self::get_dp_intro_query_params(true);
		}
		$res = Arr::get($query_params_definitions, $id);
		return $res;
	}

	public static function get_dp_url_param(string $id, $defVal = null, ?array $query_params_definitions = null)
	{
		$res = $defVal;
		$key = self::get_dp_url_param_name($id, $query_params_definitions);
		if ($key) {
			$res = self::get_url_param($key, $defVal);
		}
		return $res;
	}

	public static function get_dp_url_param_int(string $id, int $defVal = null, ?array $query_params_definitions = null)
	{
		$res = self::get_dp_url_param($id, $defVal, $query_params_definitions);
		return is_numeric($res) ? intval($res) : $defVal;
	}


	public static function set_dp_url_param(string $id, ?array $query_params_definitions, $val, bool $postfixAmpersand = true)
	{
		$res = '';
		$key = self::get_dp_url_param_name($id, $query_params_definitions);
		if ($key) {
			$res = $key . '=' . $val;
			if ($postfixAmpersand) {
				$res .= '&';
			}
		}
		return $res;
	}

	public static function build_dp_query_string(array $params, ?array $query_params_definitions, string $prefix = '?', array $non_mapped_params = [])
	{
		$res = $prefix;
		if ($non_mapped_params) {
			foreach ($non_mapped_params as $id => $val) {
				if (isset($val)) {
					$res .= $id . '=' . $val . '&';
				}
			}
		}
		if ($params) {
			foreach ($params as $id => $val) {
				if (isset($val)) {
					$res .= self::set_dp_url_param($id, $query_params_definitions, $val);
				}
			}
		}
		$res = rtrim($res, '&');
		if ($res === $prefix) {
			$res = '';
		}
		return $res;
	}

	public static function build_url(array $parts)
	{
		return rtrim(
			(isset($parts['scheme']) ? "{$parts['scheme']}:" : '') .
				((isset($parts['user']) || isset($parts['host'])) ? '//' : '') .
				(isset($parts['user']) ? "{$parts['user']}" : '') .
				(isset($parts['pass']) ? ":{$parts['pass']}" : '') .
				(isset($parts['user']) ? '@' : '') .
				(isset($parts['host']) ? "{$parts['host']}" : '') .
				(isset($parts['port']) ? ":{$parts['port']}" : '') .
				(isset($parts['path']) ? "{$parts['path']}" : '') .
				(isset($parts['query']) ? "?{$parts['query']}" : '') .
				(isset($parts['fragment']) ? "#{$parts['fragment']}" : ''),
			'?&'
		);
	}

	public static function get_transient_id($name, $current_user_id = null)
	{
		if (!$current_user_id) {
			$current_user_id = get_current_user_id();
		}
		if (!$current_user_id) {
			return $name;
		} else {
			return $name . '_' . $current_user_id;
		}
	}

	public static function fill_url_variables($url_to_fill, $url_vars)
	{
		if (DP_INTRO_TOURS_IS_PRO) {
			if ($url_vars) {
				foreach ($url_vars as $var_id => $var_val) {
					$url_to_fill = str_replace('{' . $var_id . '}', $var_val, $url_to_fill);
				}
			}
		}
		return $url_to_fill;
	}

	public static function fill_stored_url_variables($url_to_fill, $tour_id)
	{
		$url_var_examples = [];
		$process_url_vars = Acf::get_group_field('intro_url_variables', 'url_vars_enabled', $tour_id, false, true);
		if ($process_url_vars) {
			$url_var_examples_str = Acf::get_group_field('intro_url_variables', 'url_vars_examples');
			if ($url_var_examples_str) {

				$url_var_examples = Arr::explode_assoc($url_var_examples_str, "\n", '=');
			}
		}
		return self::fill_url_variables($url_to_fill, $url_var_examples);
	}

	public static function get_current_url($clear_intro_query = true, $trim_query_params = false)
	{
		$url = WpStd::get_current_url($trim_query_params);
		if ($url && $clear_intro_query) {
			try {
				$url_obj = parse_url($url);
				$query   = Arr::get($url_obj, 'query');
				if ($url_obj && $query) {
					$query_arr = Arr::explode_assoc($query, '&', '=');
					if ($query_arr && count($query_arr)) {
						$new_query = [];
						foreach ($query_arr as $key => $val) {
							if (!in_array($key, self::get_dp_intro_query_params(), true)) {
								$new_query[$key] = $val;
							}
						}
						$url_obj['query'] = Arr::implode_assoc($new_query, '&', '=');
						$url              = self::build_url($url_obj);
					}
				}
			} catch (Exception $e) {
				error_log("get_current_url error: $e");
			}
		}
		return $url;
	}

	public static function is_tour_started_globally_at_all_pages($tour_ID)
	{
		return DP_INTRO_TOURS_IS_PRO ? Acf::get_group_field_bool('intro_trigger', 'global_start_at_all_pages', $tour_ID, false) : false;
	}

	public static function is_tour_started_at_all_pages_with_admin_feature($tour_ID)
	{
		$is_globally = self::is_tour_started_globally_at_all_pages($tour_ID);
		if ($is_globally) {

			$is_globally = !Acf::get_group_field_bool('intro_trigger', 'dpit_start_everywhere_no_admin', $tour_ID, false) || !is_admin();
		}
		return $is_globally;
	}


	public static function get_step_definition_names_by_ids($ids)
	{
		$res         = [];
		$definitions = self::get_all_step_definitions();
		foreach ($ids as $id) {
			$definition                               = Arr::get($definitions, $id);
			$res[Arr::sget($definition, 'title')] = $id;
		}
		return $res;
	}

	public static function get_step_definition_names($useBuild = '')
	{
		return self::get_step_definition_names_by_ids(self::get_step_definition_ids($useBuild));
	}

	public static function get_all_step_definitions_back_compat_1_3_10($useBuild = '')
	{
		$names = self::get_step_definition_names($useBuild);
		$res   = [];
		foreach ($names as $key => $val) {
			switch ($val) {
				case 'element':
					$res['Selector *'] = $val;
					break;
				case 'intro':
					$res['Intro text *'] = $val;
					break;

				default:
					$res[$key] = $val;
			}
		}
		return $res;
	}

	public static function get_step_definitions($useBuild = '', bool $compact = false)
	{
		$res         = [];
		$definitions = self::get_all_step_definitions();
		$ids         = self::get_step_definition_ids($useBuild);
		foreach ($ids as $id) {
			if (array_key_exists($id, $definitions)) {
				if ($compact) {
					$res[$id] = [];
					$ext_cfg    = Arr::get($definitions[$id], 'ext');
					$def        = Arr::sget($definitions[$id], 'def');
					if ($def) {
						$res[$id]['def'] = $def;
					}
					if ($ext_cfg) {
						$res[$id]['ext'] = [];
						foreach ($ext_cfg as $ext_id => $ext_val) {
							$res[$id]['ext'][$ext_id] = [
								'def' => Arr::sget($ext_val, 'def'),
							];
						}
					}
				} else {
					$res[$id] = $definitions[$id];
				}
			}
		}
		return $res;
	}

	public static function get_plugin_settings_page_url(string $tab = '', ?string $site_url = null)
	{
		return Path::combine_url($site_url ? $site_url : get_site_url(), Dp_Intro_Tours_Helper::get_plugin_settings_page_path($tab));
	}

	public static function get_plugin_settings_page_path($tab = '', $without_wp_admin = false)
	{
		$tab_str = $tab ? "&tab=$tab" : '';
		if ($without_wp_admin) {
			return "options-general.php?page=dp_intro_tours$tab_str";
		} else {
			return "wp-admin/options-general.php?page=dp_intro_tours$tab_str";
		}
	}

	public static function get_generic_i18n($key)
	{
		$data = [
			'allow_popup_to_set_mob'      => __("To allow setting up mobile alternative menu element, you need to allow popup for current url as it seems your browser is blocking it and we'd like to simulate mobile view in popup window.", 'dp-intro-tours'),
			'or_set_man'                  => __('Or manually', 'dp-intro-tours'),
			'failed'                      => __('failed', 'dp-intro-tours'),
			'was_successful'              => __('was successful', 'dp-intro-tours'),
			'extend_call'                 => __('Activate or extend license to enable plugin updates that ensure WordPress compatibility, security fixes, improving existing and adding new features. You do not need to upload a new zip package of plugin for an extension, which you will receive after payment. Just use the newly generated license key, which you will also receive.', 'dp-intro-tours'),
			// translators: %s: <strong>"Custom variables"</strong>
			'custom_url_vars_desc'        => sprintf(__('%s are configured and evaluated in the first step for the entire tour.', 'dp-intro-tours'), '<strong>' . __('Custom variables', 'dp-intro-tours') . '</strong>'),
			'custom_url_vars_example'     => __('Eg.', 'dp-intro-tours') . ' /products/<strong>{product-id}</strong>?variant=<strong>{product-variant}</strong>',
			'custom_url_vars_desc_detail' => __('Their value is set as the corresponding part of the URL where the tour begins. The variable name can be any string enclosed in curly braces that DOESN\'T begin with \'$\'. You can define them in the 1st step by writing {my-var-name} (with curly braces included) into URL field (you choose your own name instead of my-var-name). Then you can use these variables as placeholders in the following steps.', 'dp-intro-tours'),
			// translators: %1$s: <strong>"System variables"</strong>, %2$s: <strong>"$"</strong>, %3$s: <i>get_current_user_id</i>
			'system_url_vars_desc'        => sprintf(__('%1$s are predefined and always available. Their name always starts by %2$s. Their value is set internally by calling a system function, eg. %3$s.', 'dp-intro-tours'), '<strong>' . __('System variables', 'dp-intro-tours') . '</strong>', '<strong>\'$\'</strong>', '<i>get_current_user_id</i>'),
			'system_url_vars_example'     => __('Eg.', 'dp-intro-tours') . ' /member-dashboard/<strong>{$current-user-login}</strong>',
			// translators: %1$s: Link to API documentation, %2$s: <<strong>dpintro_sys_url_var</strong>
			'system_url_vars_desc_detail' => sprintf(__('You can also extend them by own code based variables by %1$s with %2$s filter.', 'dp-intro-tours'), '<a href=\'' . DP_INTRO_TOURS_API_DOC . '\' target=\'_blank\'>' . __('integrated API', 'dp-intro-tours') . '</a>', '<strong>dpintro_sys_url_var</strong>'),
			'allow_redirect_to_ext'       => __('Allow redirect to extraneous web', 'dp-intro-tours'),
			'back'                        => __('Back', 'dp-intro-tours'),
			'next'                        => __('Next', 'dp-intro-tours'),
			'skip-for-future-visits' => __('Skip for future visits', 'dp-intro-tours'),
			'font_option_hint'            => __('You can use single value or multiple fonts used as a fallback delimited by commas.', 'dp-intro-tours')
				. '<br>' . __('When empty, font is inherited from your web.', 'dp-intro-tours')
				. '<br><strong>' . __('Plugin won\'t load fonts for you. You should use already loaded fonts.', 'dp-intro-tours')
				. '</strong>',
			'upgrade_notice'              => __("Heads up!! This is the major release. Plugin has many changes, that makes it much better then before. It has new positioning core, adjusted and renamed themes and also css selector names. We've made all possible fixes to keep compatibility back as much as possible. However we ask you to review all tours after the update, adjust themes and design and if you use own css to override default plugin style, change css selectors. If you encounter any problems after the update, please do not hesitate to contact our support.", 'dp-intro-tours'),

			'upgrade_link'                => __('<a href="https://www.deeppresentation.com/upgrade-to-v5-intro-tour-tutorial-plugin" target="_blank">How to upgrade to v5 - Intro Tour Tutorial plugin</a>', 'dp-intro-tours'),
			'storingChanges'              => __('Storing changes', 'dp-intro-tours'),
			'redirecting'                 => __('Redirecting', 'dp-intro-tours'),
			'unsaved_changes_prompt'      => __('You have some unsaved changes. Are you sure to cancel them and Exit?', 'dp-intro-tours'),
			//'a4r-suggestion' => __( "Amazing, you've been using the %1\$s for over %2\$s.<br>Nice rating helps us grow, so we can <strong>serve you better</strong> via our support and develop <strong>new cool features</strong> into this free product.<br>We really appreciate Your help. It takes just one minute. Thank You:)<br>", 'dp-intro-tours' )
		];
		return Arr::sget($data, $key);
	}

	public static function render_call_2_rating(string $class = '')
	{
	?>
		<p class="<?= $class ?>">Please <a href="<?= DP_INTRO_TOURS_PRODUCT_ASK_FOR_RATING_LINK_FREE; ?>" target="_blank">rate the plugin ★★★★★</a> to <b>keep it up-to-date & maintained</b>. It only takes a second to rate. Thank you! <img draggable="false" role="img" class="emoji" alt="👋" src="https://s.w.org/images/core/emoji/14.0.0/svg/1f44b.svg"></p>
<?php
	}

	/*public static function try_render_upgrade_notice() {
		$upgraded_v5 = Settings::get_setting_array_bool( 'dp_it_basic_options', 'upgraded_v5' );
		if ( ! $upgraded_v5 && Str::compare_versions( DP_INTRO_TOURS_VERSION, '5.0.0' ) >= 0 ) {
			$text = '<br><br>'
			. Dp_Intro_Tours_Helper::get_generic_i18n( 'upgrade_notice' );
			AdminNotice::render_notice(
				$text,
				'warning',
				true,
				'https://www.deeppresentation.com/upgrade-to-v5-intro-tour-tutorial-plugin',
				'button button-primary button-pro-promo',
				__( 'How to upgrade to v5', 'dp-intro-tours' ),
				true,
				'',
				'dpit-notice'
			);
			Settings::update_setting_array_bool( 'dp_it_basic_options', 'upgraded_v5', true, true );
		}

	}*/

	public static function is_debug_console_en()
	{
		$debug_console = Settings::get_setting_array_field('dp_it_general_options', 'debug_console', '0') === '1';
		return $debug_console || DP_INTRO_TOURS_DP_DEBUG_EN;
	}

	public static function dpit_console_log($data, $prefix = '')
	{
		if (self::is_debug_console_en()) {
			echo '<script>';
			echo 'console.log("' . $prefix . ':",' . json_encode($data) . ')';
			echo '</script>';
		}
	}

	public static function get_full_step_definition_names()
	{
		return self::get_step_definition_names('PRO');
	}

	public static function get_url_param($key, $def = null)
	{
		return key_exists($key, $_GET) ? htmlspecialchars($_GET[$key]) : $def;
	}

	public static function is_url_comp_strict($tour_id)
	{
		if (!DP_INTRO_TOURS_IS_PRO) {
			return false;
		} else {
			return Acf::get_group_field('dp_tour_behaviour', 'strict_url_compare', $tour_id, false, true);
		}
	}

	public static function get_tour_start_page_id($tourId, $is_run_at_all_pages_override = null, $all_start_urls = false)
	{
		$start_url = self::get_tour_start_page_url($tourId, false, DPIT_STEPS_URL_TYPE_ABS, $is_run_at_all_pages_override, $all_start_urls);
		if ($start_url) {
			if (is_array($start_url)) {
				$res = [];
				foreach ($start_url as $sub_url) {
					$post  = WpStd::get_post_by_url_path($sub_url);
					$res[] = $post ? $post->ID : null;
				}
				return $res;
			} else {
				$post = WpStd::get_post_by_url_path($start_url);
				return $post ? $post->ID : null;
			}
		}
		return $all_start_urls ? [] : null;
	}


	public static function get_tour_start_page_url($tourId, $fillExampleUrlVars = false, $type = DPIT_STEPS_URL_TYPE_ABS, $is_run_at_all_pages_override = null, $all_start_urls = false)
	{
		$is_run_at_all_pages = $is_run_at_all_pages_override ?? self::is_tour_started_globally_at_all_pages($tourId);
		if ($is_run_at_all_pages) {
			return $all_start_urls ? [get_site_url()] : get_site_url();
		}

		$urls = self::get_steps_url($tourId, $type);
		if ($all_start_urls) {
			$res           = [];
			$start_url_cnt = self::get_start_step_count($tourId);
			if ($start_url_cnt) {
				for ($i = 0; $i < $start_url_cnt; $i++) {
					$sub_res = Arr::get($urls, $i, null);
					if ($fillExampleUrlVars && !empty($sub_res)) {
						$sub_res = self::fill_stored_url_variables($sub_res, $tourId);
					}
					$res[] = $sub_res;
				}
			}
		} else {
			$res = Arr::get($urls, 0, null);
			if ($fillExampleUrlVars && !empty($res)) {
				$res = self::fill_stored_url_variables($res, $tourId);
			}
		}
		return $res;
	}

	public static function get_start_step_count($post_id): int
	{
		return intval(Acf::get_field('start_url_cnt', $post_id, true, 1));
	}

	public static function update_start_step_count($post_id, $start_url_cnt)
	{
		update_field('start_url_cnt', $start_url_cnt, $post_id);
	}

	public static function get_steps_url($tourId, $type = DPIT_STEPS_URL_TYPE_UNIFIED)
	{
		/*if ( $type === DPIT_STEPS_URL_TYPE_UNIFIED ) {
		return get_post_meta( $tourId, 'dpit_steps_url_unified', true );
		} else*/
		if ($type === DPIT_STEPS_URL_TYPE_REL) {
			return get_post_meta($tourId, 'dpit_steps_url_relative', true);
		} else {

			$res_urls  = [];
			$steps_url = get_post_meta($tourId, 'dpit_steps_url_relative', true);
			if ($steps_url && count($steps_url)) {
				$site_url = get_site_url();
				if ($type === DPIT_STEPS_URL_TYPE_UNIFIED) {
					$site_url = self::unify_url($site_url);
				}
				foreach ($steps_url as $url) {
					$res_url = $url;
					if (Str::starts_with($url, '/')) {
						$res_url = rtrim(Path::combine_url($site_url, $url), '/');
					}
					$res_urls[] = $res_url;
				}
			}
			return $res_urls;
		}
	}

	public static function set_steps_url($tourId, array $steps_url, int $start_url_cnt = 1)
	{
		$steps_url_unified  = [];
		$steps_url_relative = [];
		$is_url_comp_strict = self::is_url_comp_strict($tourId);
		$site_url           = get_site_url();

		foreach ($steps_url as $url) {
			$abs_url = $url;
			$rel_url = $url;
			if (Str::starts_with($url, '/')) {
				$abs_url = Path::combine_url($site_url, $url);
			} elseif (Str::starts_with($url, $site_url)) {
				$rel_url = Str::last_part($url, $site_url, $url);
			}
			$steps_url_unified[]  = self::unify_url($abs_url, !$is_url_comp_strict, true, false);
			$steps_url_relative[] = self::unify_url($rel_url, !$is_url_comp_strict, false, false);
		}

		update_post_meta($tourId, 'dpit_steps_url_unified', $steps_url_unified);
		update_post_meta($tourId, 'dpit_steps_url_relative', $steps_url_relative);
		self::update_start_step_count($tourId, $start_url_cnt);

		// dbg
		update_field('steps_url_unified_serialized', implode(PHP_EOL, $steps_url_unified), $tourId);
		update_field('steps_url_relative_serialized', implode(PHP_EOL, $steps_url_relative), $tourId);
	}

	public static function get_plugin_version_from_intro_data($tour_ID, $build_type_only = false)
	{
		$res = Acf::get_field('plugin_version', $tour_ID) ?? '';
		if ($res && $build_type_only) {
			$res = Str::first_part($res, '_');
		}
		return $res;
	}

	public static function update_steps_url($tour_ID, $force_build_type = null)
	{
		$build_type = $force_build_type ?? DP_INTRO_TOURS_DP_BUILD_TYPE;
		switch ($build_type) {
			case 'FREE':
				$intro_related_posts = Acf::get_group_field('intro_trigger', 'intro_related_posts', $tour_ID, []);
				$steps_url           = [];
				if ($intro_related_posts) {
					foreach ($intro_related_posts as $related_post_id) {
						$steps_url[] = get_permalink($related_post_id);
					}
				}
				self::set_steps_url($tour_ID, $steps_url, count($steps_url));
				break;
			case 'PRO':
				self::update_pro_url_relationships($tour_ID);
				break;
		}
	}

	public static function fix_relative_url_without_leading_slash($url)
	{
		if (
			!Str::starts_with($url, 'http://')
			&& !Str::starts_with($url, 'https://')
			&& !Str::starts_with($url, 'www.')
			&& !Str::starts_with($url, '/')
			&& !Str::starts_with($url, '$')
		) {
			$url = '/' . $url;
		}
		return $url;
	}



	public static function recreate_step_table($tour_ID, $table_raw_data, $force_first_step_url = false, $force_relative_url_leading_slash = false, $on_new_step_prop_cb = null, $on_step_data_cb = null)
	{
		if (!$table_raw_data) {
			$table_raw_data = Acf::get_field('intro_steps', $tour_ID, false);
		}
		$res          = [
			'was_changed'           => false,
			'raw_data'              => $table_raw_data,
			'was_start_url_changed' => false,
		];
		$stepDefNames = self::get_step_definition_names();
		if ($table_raw_data && is_array($table_raw_data)) {
			$start_urls_raw = self::get_tour_start_page_url($tour_ID, false, DPIT_STEPS_URL_TYPE_REL, false, true);
			$start_urls     = $start_urls_raw;
			if ($force_relative_url_leading_slash) {
				$start_urls = [];
				foreach ($start_urls_raw as $start_url) {
					$fixed_rel_url = self::fix_relative_url_without_leading_slash($start_url);
					if ($fixed_rel_url !== $start_url) {
						$res['was_changed']           = true;
						$res['was_start_url_changed'] = true;
						$start_urls[]                 = $fixed_rel_url;
					} else {
						$start_urls[] = $start_url;
					}
				}
			}
			$labels              = array_keys($stepDefNames);
			$step_data           = Acf::decode_raw_to_assoc_array_of_columns($table_raw_data, true);
			$res['decoded_data'] = $step_data;
			$new_step_data       = [];
			foreach ($step_data as $idx => $step) {
				$new_step = [];
				foreach ($stepDefNames as $val) {
					if (array_key_exists($val, $step)) {
						if ($val === 'url') {
							if ($force_first_step_url) {
								if ($idx === 0) {
									if (count($start_urls)) {
										$new_val          = implode(',', $start_urls);
										$new_step[$val] = $new_val;
									}
								} elseif (!$step[$val]) {
									$new_step[$val] = '$keep-prev-step-url';
								} else {
									$new_step[$val] = $step[$val];
								}
								if (array_key_exists($val, $new_step) && $new_step[$val] !== $step[$val]) {
									$res['was_changed']           = true;
									$res['was_start_url_changed'] = true;
								}
							} elseif ($force_relative_url_leading_slash) {
								$new_step[$val] = self::fix_relative_url_without_leading_slash($step[$val]);
								if ($new_step[$val] !== $step[$val]) {
									$res['was_changed']           = true;
									$res['was_start_url_changed'] = true;
								}
							} else {
								$new_step[$val] = $step[$val];
							}
						} else {
							$new_step[$val] = $step[$val];
						}
					} else {

						$res['was_changed'] = true;
						switch ($val) {
							case 'url':
								$res['was_start_url_changed'] = true;
								if ($idx === 0) {
									$new_step[$val] = Arr::get($start_urls, '0', '/');
								} else {
									$new_step[$val] = '$keep-prev-step-url';
								}
								break;
							case 'skip_on_big_screen':
							case 'skip_on_mobile':
							case 'is_in_mobile_menu':
							case 'enable_interaction':
								$new_step[$val] = '0';
								break;
							default:
								$new_step[$val] = '';
						}
						if ($on_new_step_prop_cb) {
							$new_step = call_user_func_array($on_new_step_prop_cb, [$step, $new_step]);
						}
					}
				}
				if ($on_step_data_cb) {
					$new_step_after_cb = call_user_func_array($on_step_data_cb, [$new_step]);
					if ($new_step_after_cb !== $new_step) {
						$res['was_changed'] = true;
					}
					$new_step_data[] = $new_step_after_cb;
				} else {
					$new_step_data[] = $new_step;
				}
			}
			$res['decoded_data'] = $new_step_data;
			$table_raw_data      = Acf::create_table_field_from_assoc_array_of_columns_ntn($new_step_data, false, true, $labels, DP_ACF_TABLE_VERSION);
			$res['raw_data']     = $table_raw_data;
			if ($force_first_step_url || $res['was_start_url_changed'] || $force_relative_url_leading_slash) {
				self::readjust_first_tour_page($tour_ID, $start_urls, $new_step_data);
			}
		}
		return $res;
	}

	public static function readjust_first_tour_page($tour_ID, ?array $start_urls = null, $new_step_data = null)
	{

		$_start_urls = $start_urls !== null ? $start_urls : self::get_tour_start_page_url($tour_ID, false, DPIT_STEPS_URL_TYPE_REL, false, true);

		switch (DP_INTRO_TOURS_DP_BUILD_TYPE) {
			case 'FREE':
				$startPageId = self::get_tour_start_page_id($tour_ID, false, true);
				Acf::update_group_field('intro_trigger', 'intro_related_posts', $startPageId, $tour_ID);
				self::set_steps_url($tour_ID, $_start_urls, count($_start_urls));
				break;
			case 'PRO':
				self::update_pro_url_relationships($tour_ID, $new_step_data);
				break;
		}
	}

	public static function is_admin_tour_edit_page()
	{
		$screen = get_current_screen();
		return ($screen && $screen->base === 'post' && $screen->post_type === 'dp_intro_tours');
	}

	public static function is_admin_tour_list_page()
	{
		$screen = get_current_screen();
		return ($screen && $screen->base === 'edit' && $screen->post_type === 'dp_intro_tours');
	}


	public static function store_plugin_version($post_ID)
	{
		if (get_post_type($post_ID) === 'dp_intro_tours') {
			update_field('plugin_version', DP_INTRO_TOURS_DP_BUILD_TYPE . '_' . DP_INTRO_TOURS_VERSION, $post_ID);
		}
	}

	public static function init_step_table()
	{
		$stepDefs  = self::get_step_definitions();
		$step_data = array_map(
			function ($val) {
				return Arr::sget($val, 'def');
			},
			$stepDefs
		);
		$colValues = array_values(self::get_step_definition_names());
		return Acf::create_table_field_from_assoc_array_of_columns_ntn([$step_data], false, false, $colValues, DP_ACF_TABLE_VERSION);
	}

	public static function update_pro_url_relationships($tour_ID, $step_data_assoc_array = null)
	{
		if (!$step_data_assoc_array) {
			$step_data_assoc_array = Acf::get_table_field_as_assoc_array_of_columns('intro_steps', $tour_ID, true);
		}

		$steps_url     = [];
		$start_url_cnt = 0;
		if ($step_data_assoc_array) {
			foreach ($step_data_assoc_array as $idx => $step) {
				$url = Arr::get($step, 'url');
				// manage post id of pages with this intro tour
				if ($url !== null) {
					if ($idx === 0) {
						$sub_urls = array_unique(array_filter(explode(',', $url)));
						if ($sub_urls && count($sub_urls)) {
							$start_url_cnt = count($sub_urls);
							foreach ($sub_urls as $sub_url) {
								if ($sub_url === '$keep-prev-step-url' || $sub_url === '$keep-current-url') {
									$steps_url[] = '/';
								} else {
									$steps_url[] = $sub_url;
								}
							}
						}
					} else {
						$steps_url[] = $url;
					}
				}
			}
		}
		self::set_steps_url($tour_ID, $steps_url, $start_url_cnt);
	}

	public static function unify_url(
		?string $url,
		bool $remove_query = true,
		bool $remove_http_prefix = true,
		bool $relative = false
	) {
		if ($url) {
			if ($relative) {
				$site_url = get_site_url();
				if (Str::starts_with($url, $site_url)) {
					$url = Str::last_part($url, $site_url, $url);
				}
			}
			if ($remove_http_prefix) {
				$url = Str::last_part($url, '://', $url);
				if ($url) {
					$url = ltrim($url, 'www.');
				}
			}
			if ($url && $remove_query) {
				$url = Str::first_part($url, '?', $url);
			} else {
				$url = Str::first_part($url, '#', $url); // remove hash
				$url = self::force_slash_before_q_mark($url);
			}
			if ($url) {
				$url = rtrim($url, '/');
			}
		}
		if (empty($url)) {
			$url = '/';
		} else {
			if (Str::ends_with($url, '/index.php')) {
				$url = Str::rtrim_by_string($url, '/index.php');
			} elseif (!$remove_query) {
				$url = str_replace('/index.php/', '/', $url);
			}
		}
		return $url;
	}

	public static function force_slash_before_q_mark($url)
	{
		$q_mark_idx = strpos($url, '?');
		if ($q_mark_idx !== false) {
			if ($q_mark_idx === 0 || $url[$q_mark_idx - 1] !== '/') {
				$url = substr($url, 0, $q_mark_idx) . '/' . substr($url, $q_mark_idx);
			}
		}
		return $url;
	}

	public static function force_q_mark_without_slash($url)
	{
		$q_mark_idx = strpos($url, '?');
		if ($q_mark_idx !== false) {
			if ($q_mark_idx > 0 && $url[$q_mark_idx - 1] === '/') {
				$url = substr($url, 0, $q_mark_idx - 1) . substr($url, $q_mark_idx);
			}
		}
		return $url;
	}

	public static function get_builder_api_key()
	{
		return 'ff125cb12ab';
	}

	public static function get_default_name_for_new_tour($startPageTitle)
	{
		return $startPageTitle . ' Tour' . '(' . date('YmdHis') . ')';
		/*	if (!is_admin()) {
			include_once ABSPATH . 'wp-admin/includes/post.php';
		}
		$idx = 0;
		do {
			$idx++;
			$tourName = $startPageTitle . ' Tour ' . $idx;
		} while (post_exists($tourName));
		return $tourName;*/
	}

	public static function is_dp_intro_cpt_admin()
	{
		$screen = function_exists('get_current_screen') ? get_current_screen() : false;
		if ($screen) {
			return ($screen->base === 'post' || $screen->base === 'edit') && $screen->post_type === 'dp_intro_tours';
		} else {
			return false;
		}
	}


	public static function get_pro_link_html($postfix = null, $title = null)
	{
		$link = DP_INTRO_TOURS_PRODUCT_LINK_PRO;
		if ($postfix) {
			$link .= $postfix;
		}
		$title = $title ? $title : DP_INTRO_TOURS_PRODUCT_TITLE_PRO;
		return '<a href="' . $link . '" target="_blank"><strong>' . $title . '</strong></a>';
	}

	public static function get_position_select_options()
	{
		return [
			''       => __('Auto', 'dp-intro-tours'),
			'bottom' => __('Bottom', 'dp-intro-tours'),
			'top'    => __('Top', 'dp-intro-tours'),
			'right'  => __('Right', 'dp-intro-tours'),
			'left'   => __('Left', 'dp-intro-tours'),
			'center' => __('Center', 'dp-intro-tours'),
		];
	}

	public static function get_highlight_select_options()
	{
		return [
			''            => __('Offset', 'dp-intro-tours'),
			'full_border' => __('Full', 'dp-intro-tours'),
		];
	}

	public static function get_themes_select_options(bool $is_global_option, bool $force_pro = false)
	{
		$res = (DP_INTRO_TOURS_IS_PRO || $force_pro)
			? ['basic:Basic', 'minimal:Minimal', 'colored-bottom:Colored Bottom', 'colored:Colored', 'dark:Dark', 'sticky:Sticky']
			: ['basic:Basic', 'minimal:Minimal', 'colored:Colored', 'sticky:Sticky'];
		return self::get_select_option($res, $is_global_option);
	}

	public static function get_available_themes_keys()
	{
		return array_map(
			function (string $theme_cfg_string) {
				return Str::first_part($theme_cfg_string, ':');
			},
			Dp_Intro_Tours_Helper::get_themes_select_options(true)
		);
	}

	public static function get_themes_select_placeholder()
	{
		return (DP_INTRO_TOURS_IS_PRO)
			? 'choose from: Basic|Minimal|Colored Bottom|Colored|Dark|Modern|Sticky'
			: 'choose from: Basic|Minimal|Colored|Sticky';
	}

	public static function get_themes_select_def_val(bool $is_global_option)
	{
		return $is_global_option ? 'basic' : 'default';
	}


	public static function get_button_labeling_select_def_val(bool $is_global_option, bool $is_cancel_button = false)
	{
		return $is_global_option ? ($is_cancel_button ? 'none' : 'vector') : 'default';
	}

	public static function get_button_labeling_select_options(bool $is_global_option)
	{
		return self::get_select_option(
			['none:None', 'text:Text symbol', 'vector:Vector (SVG)'],
			$is_global_option
		);
	}

	public static function get_button_labeling_select_instructions(string $title, bool $is_global_option)
	{
		$default_option_hint = '';
		if (!$is_global_option) {
			$default_option_hint = '<br><strong> • ' . __('Default', 'dp-intro-tours') . ':</strong> ' . __('Using a global option value', 'dp-intro-tours');
		}

		return '<strong>' . $title . '</strong>' . $default_option_hint
			. '<br><strong> • ' . __('None', 'dp-intro-tours') . ':</strong> ' . __('No icon is shown', 'dp-intro-tours')
			. '<br><strong> • ' . __('Text symbol', 'dp-intro-tours') . ':</strong> ' . __('ASCI symbol icon is shown', 'dp-intro-tours')
			. '<br><strong> • ' . __('Vector (SVG)', 'dp-intro-tours') . ':</strong> ' . __('SVG icon is shown', 'dp-intro-tours');
	}


	public static function convert_settings_select_options_2_acf($settings_select_options, $pre_choices = ['default' => 'Default'])
	{
		$choices = $pre_choices;
		foreach ($settings_select_options as $value) {
			$choices[Str::first_part($value, ':')] = Str::last_part($value, ':');
		}
		return $choices;
	}


	public static function get_select_option(array $options_key_colon_title, bool $is_global_option, array $pre_choices = ['default' => 'Default'])
	{
		if ($is_global_option) {
			// global config
			return $options_key_colon_title;
		} else {
			// tour config
			return self::convert_settings_select_options_2_acf($options_key_colon_title, $pre_choices);
		}
	}

	public static function fix_global_theme_option(?string $global_theme_key)
	{
		$default_global_theme_key = Dp_Intro_Tours_Helper::get_themes_select_def_val(true);
		if ($global_theme_key === Dp_Intro_Tours_Helper::get_themes_select_def_val(false)) {
			return $default_global_theme_key;
		} else {
			return $global_theme_key;
		}
	}

	public static function get_admin_theme_colors($user_id = null)
	{
		if (!$user_id) {
			$user_id = get_current_user_id();
		}
		$res = [];
		if ($user_id) {
			return get_user_meta($user_id, 'dp_it_admin_color_v6', true);
			/*$colors_str = get_user_meta( $user_id, 'dp_it_admin_color', true );
			if ( $colors_str ) {
			$res = explode( ',', $colors_str );
			}*/
		}
		return $res;
	}


	public static function get_admin_theme_colors_cfg($add_rgb_vars = true)
	{
		return [
			'colors'           => self::get_admin_theme_colors(),
			'addRgbVars'       => $add_rgb_vars,
			'rgbFeatureThresh' => 250,
			'rgbDefaults'      => [
				'r' => '#D44A30',
				'g' => '#559433',
				'b' => '#0D95C4',
			],
		];
	}

	public static function get_css_prop_val($rule_set, $prop_key)
	{
		$color_rule = $rule_set->getRules($prop_key);
		if ($color_rule) {
			return $color_rule[0]->getValue();
		}
		return null;
	}

	public static function profile_update(?int $user_id = null)
	{
		if (!$user_id) {
			$user_id = get_current_user_id();
		}
		if ($user_id) {
			try {
				global $_wp_admin_css_colors;
				$admin_colors = $_wp_admin_css_colors;

				$current_color_scheme = get_user_option('admin_color', $user_id);
				if ($current_color_scheme) {
					$colors_cfg = Arr::get($admin_colors, $current_color_scheme);
					if ($colors_cfg) {
						$dpit_admin_colors        = [];
						$dpit_admin_colors_parsed = [];
						if ($colors_cfg->url) {
							try {
								$content = file_get_contents($colors_cfg->url);
								$parser  = new Parser($content);
								if ($parser) {

									$style_sheet = $parser->parse();
									foreach ($style_sheet->getAllRuleSets() as $rule_set) {
										if (!$rule_set instanceof DeclarationBlock) {
											continue;
										}
										$selectors = $rule_set->getSelectors();
										foreach ($selectors as $selector_obj) {
											$selector_str = $selector_obj->getSelector();
											switch ($selector_str) {
												case '#wpadminbar':
													$dpit_admin_colors_parsed['main-menu']    = self::get_css_prop_val($rule_set, 'color');
													$dpit_admin_colors_parsed['main-menu-bg'] = self::get_css_prop_val($rule_set, 'background');
													break;
												case '.wp-core-ui .wp-ui-notification':
													$dpit_admin_colors_parsed['badge']    = self::get_css_prop_val($rule_set, 'color');
													$dpit_admin_colors_parsed['badge-bg'] = self::get_css_prop_val($rule_set, 'background-color');
													break;
												case '.wp-core-ui .button-primary:hover':
													$dpit_admin_colors_parsed['prim-bg-hov'] = self::get_css_prop_val($rule_set, 'background');
													break;
												case '.wp-core-ui .button-primary':
													$dpit_admin_colors_parsed['prim']    = self::get_css_prop_val($rule_set, 'color');
													$dpit_admin_colors_parsed['prim-bg'] = self::get_css_prop_val($rule_set, 'background');
													break;
												case '.wp-core-ui .button':
													$dpit_admin_colors_parsed['sec']        = self::get_css_prop_val($rule_set, 'color');
													$dpit_admin_colors_parsed['sec-border'] = self::get_css_prop_val($rule_set, 'border-color');
													break;
												case '#adminmenu li.menu-top:hover':
													$dpit_admin_colors_parsed['menu-a-item']    = self::get_css_prop_val($rule_set, 'color');
													$dpit_admin_colors_parsed['menu-a-item-bg'] = self::get_css_prop_val($rule_set, 'background-color');
													break;
												case 'body':
													$dpit_admin_colors_parsed['body-bg'] = self::get_css_prop_val($rule_set, 'background');
													break;
											}
										}
									}
								}
							} catch (Exception $e) {
								error_log('[dpit] Admin color scheme parsing failed');
							}

							// if not parsed, create default from legacy ....
							//if (array_key_exists())

							//print_r( get_user_meta( $user_id, 'dp_it_admin_color_v6' ) );
							//print_r( $legacy_colors );
							//self::update_admin_theme_colors( $legacy_colors, $user_id );
						} else {
							// default theme doesn't have an url
							$dpit_admin_colors_parsed = [
								'main-menu'      => '#f0f0f1',
								'main-menu-bg'   => '#1d2327',
								'badge'          => '#fff',
								'badge-bg'       => '#d63638',
								'prim'           => '#fff',
								'prim-bg'        => '#007cba',
								'prim-bg-hov'    => '#006ba1',
								'sec'            => '#2271b1',
								'sec-border'     => '#2271b1',
								'menu-a-item'    => '#fff',
								'menu-a-item-bg' => '#2271b1',
								'body-bg'        => '#f0f0f1',
							];
						}

						$dpit_admin_colors['actual'] = [];
						if (count($dpit_admin_colors_parsed)) {

							foreach ($dpit_admin_colors_parsed  as $color_key => $color_val) {
								if ($color_val) {
									if (is_string($color_val)) {
										$dpit_admin_colors['actual'][$color_key] = $color_val;
									} else {
										$dpit_admin_colors['actual'][$color_key] = $color_val->__toString();
										//echo $color_key . ': ' . $color_val->__toString() . ' | ';
									}
								}
							}
						}

						$legacy_colors = $colors_cfg->colors;

						if (count($legacy_colors) === 3) {
							$legacy_colors[] = $legacy_colors[2]; //'#E14D43'; // red
						}
						$dpit_admin_colors['legacy'] = $legacy_colors;

						update_user_meta($user_id, 'dp_it_admin_color_v6', $dpit_admin_colors);
					}
				}
			} catch (Exception $e) {
				error_log('Admin color scheme storing failed');
			}
		}
	}

	public static function try_render_create_your_first_tour_notice()
	{
		$disable_first_tour_create_notice = Settings::get_setting_array_bool('dp_it_general_options', 'disable_first_tour_create_notice', false);
		if ($disable_first_tour_create_notice && !DPIT_PROMO_DBG) {
			return false;
		}
		$query = new WP_Query(
			[
				'post_type'      => 'dp_intro_tours',
				'posts_per_page' => '-1',
			]
		);
		$count = $query->post_count;
		wp_reset_query();
		if ($count === 0 || DPIT_PROMO_DBG) {
			AdminNotice::render_raw_notice(
				[
					new Element('p', 'text', null, __('Creating guided tours for your website can be easy and fun. Are you ready to start building your first tour?', 'dp-intro-tours')),
					new Element(
						'a',
						'button',
						[
							'class'  => 'button button-primary',
							'href'   => get_site_url(
								null,
								Dp_Intro_Tours_Helper::build_dp_query_string(
									[
										'dp_qpb_builder_mode' => Dpit_Builder_Target_Type::STEP,
										'dp_qpb_builder_origin' => Dpit_Builder_Origin::FRONTEND,
										'dp_qp_run_always_on_load' => 1,
										'dp_qpb_create_new'   => 1,
									],
									Dp_Intro_Tours_Helper::get_dp_intro_query_params()
								)
							),
							'target' => '',
						],
						[__('Create the content of the first tour', 'dp-intro-tours')]
					),
					new Element(
						'a',
						'button',
						[
							'class'  => 'button button-secondary',
							'href'   => get_site_url(null, '/wp-admin/post-new.php?post_type=dp_intro_tours'),
							'target' => '',
						],
						[__('Configure the first tour', 'dp-intro-tours')],
						'secondary'
					),
				],
				'info',
				'dpit-notice',
				'dpit-notice-create-first-tour',
				'dpit-notice--2-buttons is-dismissible'
			);
			return true;
		}
		return false;
	}

	/*
	public static function update_admin_theme_colors( $colors, $user_id = null ) {
	if ( $colors && is_array( $colors ) ) {
		if ( ! $user_id ) {
			$user_id = get_current_user_id();
		}
		update_user_meta( $user_id, 'dp_it_admin_color', implode( ',', $colors ) );
	}
	}*/

	public static function get_dynamic_css(bool $admin_colors = true, bool $z_index_base_en = true, bool $hide_el_at_start_en = true, string $style_target_selector = ':root')
	{
		$dynamic_data = '';
		$res          = '';
		if ($admin_colors) {
			$colors_cfg = Dp_Intro_Tours_Helper::get_admin_theme_colors();

			if ($colors_cfg) {

				$idx           = 1;
				$colors_legacy = Arr::get($colors_cfg, 'legacy');
				foreach ($colors_legacy as $color_str) {
					$color_rgb_arr = Color::text2rgba($color_str);
					if ($color_rgb_arr && count($color_rgb_arr) >= 3) {
						$dynamic_data .= "--dpu-color-{$idx}: " . $color_rgb_arr[0] . ', ' . $color_rgb_arr[1] . ', ' . $color_rgb_arr[2] . ';';
						$idx++;
					}
				}
				$colors_actual = Arr::get($colors_cfg, 'actual');
				foreach ($colors_actual as $key => $color_str) {
					$color_rgb_arr = Color::text2rgba($color_str);
					if ($color_rgb_arr && count($color_rgb_arr) >= 3) {
						$dynamic_data .= "--dpit-uac-{$key}: " . $color_rgb_arr[0] . ', ' . $color_rgb_arr[1] . ', ' . $color_rgb_arr[2] . ';';
					}
				}
			}
		}
		if ($z_index_base_en) {
			$z_index_base = Settings::get_setting_array_field('dp_it_general_options', 'z_index_base');
			if (!$z_index_base && $z_index_base !== '0') {
				$z_index_base = DPIT_Z_INDEX_BASE_MAX;
			}
			$dynamic_data .= "--dp-z-index-base: {$z_index_base};";
		}

		if ($dynamic_data) {
			$css_data = $style_target_selector . '{' . $dynamic_data . '}';
			$res      = $css_data;
		}
		if ($hide_el_at_start_en) {
			$res .= self::get_dynamic_css_hide_el_at_start();
		}
		return $res;
	}

	public static function get_acf_select_val_safe($original_value)
	{
		return Arr::as_string($original_value);
	}

	public static function get_dynamic_css_hide_el_at_start()
	{
		$current_cfg      = Settings::get_setting_array_field('dp_it_general_options', 'hide_elements_at_start');
		$dynamic_css_data = '';
		if ($current_cfg) {
			$selectors_orig = explode(',', $current_cfg);
			if (count($selectors_orig)) {
				foreach ($selectors_orig as $selector) {
					$trimmed_selector = trim($selector);
					if (!is_admin() || $selector !== '#wpadminbar') {
						$dynamic_css_data .= ".dpit-on $trimmed_selector {display:none !important;}";
					}
				}
			}
		}
		return $dynamic_css_data;
	}

	private static function get_system_url_var_val($id)
	{
		switch ($id) {
			case '$current-user-id':
				return strval(get_current_user_id());
			case '$current-user-login':
				$current_user = wp_get_current_user();
				return $current_user ? sanitize_title($current_user->user_login) : '';
			default:
				return '';
		}
	}

	public static function get_all_system_url_vars($tour_id)
	{
		$variables = [];
		foreach (['$current-user-id', '$current-user-login'] as $var_id) {
			$variables[$var_id] = self::get_system_url_var_val($var_id);
		}
		$variables = apply_filters('dpintro_sys_url_var', $variables, $tour_id);

		return $variables;
	}
}

?>