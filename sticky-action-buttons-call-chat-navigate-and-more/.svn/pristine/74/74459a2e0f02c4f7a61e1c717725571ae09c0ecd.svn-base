<?php
// If this file is called directly, abort.
if (!defined("ABSPATH")) {
	exit();
}

/*
 *
 * PLUGIN MAIN FUNCTIONS
 * 'combar_sab_preview_mode' // set page for iframe preview
 * 'combar_sab_main' // main plugin function, added to 'wp_footer'
 * 'combar_sab_create' // create the main function of the buttons and control where they will show.
 * 'combar_sab_create_styles' // create the css variables
 * 'combar_sab_create_buttons' // create contact buttons html
 * 'combar_sab_create_buttons_css' // create contact buttons inline css
 * 'combar_sab_create_trigger' // create trigger button html
 * 'combar_sab_setting_deafult' // check if option exist and set default
 *
 */

/*
 * preview mode set up
 * remove admin bar on preview iframe
*/
function combar_sab_preview_mode() {
	
	if(true == $_GET['sab-preview'] && !current_user_can('administrator')) {
		die ('NOT ALLOWED!');
	}
	
	if(true == $_GET['sab-preview']) {
		
		// remove admin bar
		add_filter( 'show_admin_bar', '__return_false' );
		
		// add class to body
		function combar_sab_preview_body_class( $classes ) {
			$classes[] = 'sab-preview';
			return $classes;
		}
		add_filter( 'body_class', 'combar_sab_preview_body_class' );

	}
}
add_action('init', 'combar_sab_preview_mode');

/*
 * Float buttons main function.
 * Print plugin html to frontend
*/
function combar_sab_main() {
	$dsek_settings = get_option('combar_sab_setting_desk');
	$mob_settings = get_option('combar_sab_setting_mob');

	// don't load on choosen pages
	$general_settings = get_option('combar_sab_general_setting');
	$nopage = $general_settings['nopage'];
	$nopage = preg_replace('/\s+/', '', $nopage);
	$nopage = explode(',', $nopage);

	foreach ($nopage as $key => $page) {
		if (!is_numeric($page)) {
			unset($nopage[$key]);
		}
	}

	if (is_page($nopage) && !empty($nopage)) {
		return;
	}

	// start of html
	$html = '';
	$css = '';
	if ('on' == $dsek_settings['active']) {
		$html .= combar_sab_create($dsek_settings, false);
		$html .= combar_sab_create_styles($dsek_settings, false);
	}

	if ('on' == $mob_settings['active']) {
		if ('on' != $mob_settings['customize']) {
			$mob_settings = $dsek_settings;
		}
		$html .= combar_sab_create($mob_settings, true);
		$html .= combar_sab_create_styles($mob_settings, true);
	}

	echo  wp_kses_normalize_entities($html);
}
add_action('wp_footer', 'combar_sab_main', 100);

/*
 * create buttons html
*/
function combar_sab_create($settings, $mob = false) {
	$general_settings = get_option('combar_sab_general_setting');
	$tablet = $general_settings['tablet'];

	// set wrapper class
	$main_class = array();
	$main_class[] = 'combar-sab-wrapper';
	$main_class[] = esc_attr('style-' . $settings['style']);

	if ('block' == $settings['style']) {
		$main_class[] = esc_attr('style-' . $settings['style_1']);

		if ('on' == $settings['soft_sep']) {
			$main_class[] = 'soft-sep';
		}
	}
	elseif ('buttons' == $settings['style']) {
		$main_class[] = esc_attr('style-' . $settings['style_2']);
	}
	elseif ($settings['style'] == 'toggle_buttons') {
		$main_class[] = esc_attr('style-' . $settings['style_3']);
		if ('on' == $settings['hover']) {
			$main_class[] = 'hover-triggered';
		}

		$main_class[] = esc_attr('animate-' . $settings['animation']);

	}
	elseif ('toggle_menu' == $settings['style']) {
		$main_class[] = esc_attr('style-' . $settings['style_4']);
		if ('on' == $settings['hover']) {
			$main_class[] = 'hover-triggered';
		}
	}

	$main_class[] = esc_attr('sab-side-' . $settings['side']);
	$main_class[] = esc_attr('sab-align-' . $settings['align']);

	if ($mob) {
		$screenClass = 'sab-mob';
	} else {
		$screenClass = 'sab-desk';
	}

	$main_class[] = esc_attr($screenClass);

	if ('desk' == $tablet) {
		$main_class[] = 'tablet-as-desk';
	}

	$html = '';
	$html .= '<div class="' . implode(' ', $main_class) . '">';
	if ('toggle_buttons' == $settings['style'] || 'toggle_menu' == $settings['style']) {
		$html .= combar_sab_create_trigger($settings);
	}
	$html .= '<div class="combar-sab-container">';
	$html .= combar_sab_create_buttons($mob);
	$html .= '</div>';
	$html .= '</div>';

	if ('on' == $settings['footer_gap']) {
		$settings['footer_gap_color'] = combar_sab_setting_deafult($settings['footer_gap_color'], '#000');
		$gapClass = array();
		$gapClass[] = 'sab-bottom-gap';
		$gapClass[] = esc_attr($screenClass);
		if ('on' == $settings['footer_gap_js']) {
			$gapClass[] = 'js_bottom';
		}
		$html .= '<div class=" ' . implode(' ', $gapClass) . '" style="background-color: ' . esc_attr($settings['footer_gap_color']) . ';"></div>';
	}
	
	return $html;
}

function combar_sab_create_styles($settings, $mob = false) {
	
	$break_point = '1024px';
	if ('desk' == $tablet) {
		$main_class[] = 'tablet-as-desk';
		$break_point = '768px';
	}
	
	// position
	$settings['side_gap'] = combar_sab_setting_deafult($settings['side_gap'], 10);
	$settings['bottom_gap'] = combar_sab_setting_deafult($settings['bottom_gap'], 10);
	$settings['buttons_gap'] = combar_sab_setting_deafult($settings['buttons_gap'], 15);

	// size
	$settings['height'] = combar_sab_setting_deafult($settings['height'], 50);
	$settings['width'] = combar_sab_setting_deafult($settings['width'], '100%');
	$settings['inline_gap'] = combar_sab_setting_deafult($settings['inline_gap'], 8);

	// background
	$settings['bg'] = combar_sab_setting_deafult($settings['bg'], '#000');
	$settings['hover_bg'] = combar_sab_setting_deafult($settings['hover_bg'], '#333');

	// border
	$settings['border_width'] = combar_sab_setting_deafult($settings['border_width'], 0);
	$settings['border_style'] = combar_sab_setting_deafult($settings['border_style'], 'solid');
	$settings['border_color'] = combar_sab_setting_deafult($settings['border_color'], '#000');
	$settings['border_hover_color'] = combar_sab_setting_deafult($settings['border_hover_color'], '#000');

	// shadow
	$settings['shadow_h'] = combar_sab_setting_deafult($settings['shadow_h'], '0');
	$settings['shadow_v'] = combar_sab_setting_deafult($settings['shadow_v'], '0');
	$settings['shadow_blur'] = combar_sab_setting_deafult($settings['shadow_blur'], '5');
	$settings['shadow_spread'] = combar_sab_setting_deafult($settings['shadow_spread'], '0');
	$settings['shadow_color'] = combar_sab_setting_deafult($settings['shadow_color'], '#ccc');

	// radius
	$settings['border_radius'] = combar_sab_setting_deafult($settings['border_radius'], '100');

	// text
	$settings['text_color'] = combar_sab_setting_deafult($settings['text_color'], '#fff');
	$settings['hover_color'] = combar_sab_setting_deafult($settings['hover_color'], '#fff');
	$settings['text_size'] = combar_sab_setting_deafult($settings['text_size'], 20);
	$settings['text_weight'] = combar_sab_setting_deafult($settings['text_weight'], 700);

	// icon
	$settings['icon_color'] = combar_sab_setting_deafult($settings['icon_color'], $settings['text_color']);
	$settings['icon_hover_color'] = combar_sab_setting_deafult($settings['icon_hover_color'], $settings['hover_color']);
	$settings['icon_size'] = combar_sab_setting_deafult($settings['icon_size'], $settings['text_size']);
	
	// tooltip
	$settings['tooltip_bg'] = combar_sab_setting_deafult($settings['tooltip_bg'], '#000');
	$settings['tooltip_color'] = combar_sab_setting_deafult($settings['tooltip_color'], '#fff');
	$settings['tooltip_radius'] = combar_sab_setting_deafult($settings['tooltip_radius'], 5);
	$settings['tt_shadow_h'] = combar_sab_setting_deafult($settings['tt_shadow_h'], '0');
	$settings['tt_shadow_v'] = combar_sab_setting_deafult($settings['tt_shadow_v'], '0');
	$settings['tt_shadow_blur'] = combar_sab_setting_deafult($settings['tt_shadow_blur'], '5');
	$settings['tt_shadow_spread'] = combar_sab_setting_deafult($settings['tt_shadow_spread'], '0');
	$settings['tt_shadow_color'] = combar_sab_setting_deafult($settings['tt_shadow_color'], 'rgba(0, 0, 0, 0.3)');

	// separator
	$settings['separator_width'] = combar_sab_setting_deafult($settings['separator_width'], 2);
	$settings['separator_height'] = combar_sab_setting_deafult($settings['separator_height'], 100);
	$settings['separator_color'] = combar_sab_setting_deafult($settings['separator_color'], '#fff');

	$html = '';
	$html .= '<style>';

	if ($mob) {
		$html .= '@media only screen and (max-width: ' . $break_point . ') {';
	}
	else {
		$html .= '@media only screen and (min-width: ' . $break_point . ') {';
	}

	$html .= ':root {';
	$html .= '--sab-side-gap: ' . esc_attr($settings['side_gap']) . 'px;';
	$html .= '--sab-bottom-gap: ' . esc_attr($settings['bottom_gap']) . 'px;';
	$html .= '--sab-buttons-gap: ' . esc_attr($settings['buttons_gap']) . 'px;';
	$html .= '--sab-size: ' . esc_attr($settings['height']) . 'px;';
	$html .= '--sab-width: ' . esc_attr($settings['width']) . ';';
	$html .= '--sab-inline-gap: ' . esc_attr($settings['inline_gap']) . 'px;';
	$html .= '--sab-background: ' . esc_attr($settings['bg']) . ';';
	$html .= '--sab-hover-background: ' . esc_attr($settings['hover_bg']) . ';';
	$html .= '--sab-border-width: ' . esc_attr($settings['border_width']) . 'px;';
	$html .= '--sab-border-style: ' . esc_attr($settings['border_style']) . ';';
	$html .= '--sab-border-color: ' . esc_attr($settings['border_color']) . ';';
	$html .= '--sab-border-hover-color: ' . esc_attr($settings['border_hover_color']) . ';';
	$html .= '--sab-shadow-h: ' . esc_attr($settings['shadow_h']) . 'px;';
	$html .= '--sab-shadow-v: ' . esc_attr($settings['shadow_v']) . 'px;';
	$html .= '--sab-shadow-blur: ' . esc_attr($settings['shadow_blur']) . 'px;';
	$html .= '--sab-shadow-spread: ' . esc_attr($settings['shadow_spread']) . 'px;';
	$html .= '--sab-shadow-color: ' . esc_attr($settings['shadow_color']) . ';';
	$html .= '--sab-border-radius: ' . esc_attr($settings['border_radius']) . 'px;';
	$html .= '--sab-color: ' . esc_attr($settings['text_color']) . ';';
	$html .= '--sab-hover-color: ' . esc_attr($settings['hover_color']) . ';';
	$html .= '--sab-font-size: ' . esc_attr($settings['text_size']) . 'px;';
	$html .= '--sab-font-weight: ' . esc_attr($settings['text_weight']) . ';';
	$html .= '--sab-icon-color: ' . esc_attr($settings['icon_color']) . ';';
	$html .= '--sab-icon-hover-color: ' . esc_attr($settings['icon_hover_color']) . ';';
	$html .= '--sab-icon-size: ' . esc_attr($settings['icon_size']) . 'px;';
	$html .= '--sab-tooltip-bg: ' . esc_attr($settings['tooltip_bg']) . ';';
	$html .= '--sab-tooltip-color: ' . esc_attr($settings['tooltip_color']) . ';';
	$html .= '--sab-tooltip-radius: ' . esc_attr($settings['tooltip_radius']) . 'px;';
	$html .= '--sab-tt-shadow-h: ' . esc_attr($settings['tt_shadow_h']) . 'px;';
	$html .= '--sab-tt-shadow-v: ' . esc_attr($settings['tt_shadow_v']) . 'px;';
	$html .= '--sab-tt-shadow-blur: ' . esc_attr($settings['tt_shadow_blur']) . 'px;';
	$html .= '--sab-tt-shadow-spread: ' . esc_attr($settings['tt_shadow_spread']) . 'px;';
	$html .= '--sab-tt-shadow-color: ' . esc_attr($settings['tt_shadow_color']) . ';';
	$html .= '--sab-separator-width: ' . esc_attr($settings['separator_width']) . 'px;';
	$html .= '--sab-separator-height: ' . esc_attr($settings['separator_height']) . '%;';
	$html .= '--sab-separator-color: ' . esc_attr($settings['separator_color']) . ';';

	$html .= '}';

	if ($mob) {
		$html .= '}';
	}

	$html .= combar_sab_create_buttons_css();

	$html .= '</style>';

	return $html;
	
}

/*
 * set default value for setting
*/
function combar_sab_create_buttons($mob = false) {
	$buttons = get_option('combar_sab_buttons');
	$buttonsArray = json_decode($buttons);
	$html = '';
	$delay = 0;
	$zindex = count($buttonsArray) + 1;
	foreach ($buttonsArray as $button) {
		if ((true == $mob && 'on' == $button->mobile) || (false == $mob && 'on' == $button->desktop)) {
			// button tag
			$btnTag = 'a';
			if (!$button->url || (isset($button->special_action) && '' != $button->special_action)) {
				$btnTag = 'span';
			}

			// button class
			$btnClass = array();
			$btnClass[] = 'sab-btn';
			$btnClass[] = esc_attr('icon-' . $button->icon_side);
			$btnClass[] = esc_attr('style-' . $button->text_style);
			if ($button->gradient) {
				$btnClass[] = 'sab-gradient';
			}
			if ('toogle_tooltip' == $button->text_style || 'tooltip' == $button->text_style) {
				$btnClass[] = 'sab-tooltip';
			}
			if ($button->class) {
				$btnClass[] = esc_attr($button->class);
			}
			if (isset($button->special_action) && '' != $button->special_action) {
				$btnClass[] = esc_attr('sab-action sab-act-' . $button->special_action);
			}
			if ($button->unique) {
				$btnClass[] = esc_attr('sab-' . $button->unique);
			}

			// button style
			$btnStyle = '';
			$btnStyle .= 'transition-delay: 0s, 0s, 0s, ' . $delay . 's, ' . $delay . 's;';
			$btnStyle .= 'z-index: ' . $zindex . ';';

			// update values
			$delay += 0.3;
			$zindex--;

			// button custom  attributes
			$customAtts = '';
			if ($button->attr) {
				$attr_no_spaces = preg_replace("/\s+/", "", $attr_no_spaces);
				$attsArray = explode(';', $attr_no_spaces);
				if (!empty($attsArray)) {
					foreach ($attsArray as $att) {
						$att = explode('=', $att);
						$customAtts .= ' ' . esc_html($att[0]) . '=' . esc_attr($att[1]) . '';
					}
				}
			}

			// button attributes
			$btnAtts = '';
			if ($button->url && (!isset($button->special_action) || '' == $button->special_action)) {
				$btnAtts .= ' href="' . esc_url($button->url) . '"';
				if ('on' == $button->target) {
					$btnAtts .= ' target="_blank"';
				}
			}
			if (!empty($btnClass)) {
				$btnAtts .= ' class="' . implode(' ', $btnClass) . '"';
			}
			if ('' != $btnStyle) {
				$btnAtts .= ' style="' . esc_attr($btnStyle) . '"';
			}
			if ($button->id) {
				$btnAtts .= ' id="' . esc_attr($button->id) . '"';
			}
			if ($button->title) {
				$btnAtts .= ' title="' . esc_attr($button->title) . '"';
				$btnAtts .= ' aria-label="' . esc_attr($button->title) . '"';
			}
			if ('' != $customAtts) {
				$btnAtts .= $customAtts;
			}

			$html .= '<' . $btnTag;
			$html .= $btnAtts;
			$html .= '>';

			$html .= '<div class="sab-button-inner">';

			if ($button->icon) {
				$iconClass = explode(' ', $button->icon);
				foreach ($iconClass as $icon) {
					$iconClass[] = esc_attr($icon);
				}
				$html .= '<i class="' .  implode(' ', $iconClass) . ' sab-icon"></i>';
			}
			$html .= '<span class="sab-title">' . esc_html($button->title) . '</span>';

			$html .= '</div>';

			$html .= '</' . $btnTag . '>';
		}
	}

	return $html;
}

function combar_sab_create_buttons_css() {
	$buttons = get_option('combar_sab_buttons');
	$buttonsArray = json_decode($buttons);
	$css = '';

	foreach ($buttonsArray as $button) {
		if ($button->bg || $button->border_color) {
			$css .= '.combar-sab-container > .sab-btn.sab-' . esc_attr($button->unique) . ' {';
			if ($button->bg) {
				$css .= 'background-color: ' . esc_attr($button->bg) . '!important;';
			}
			if ($button->border_color) {
				$css .= 'border-color: ' . esc_attr($button->border_color) . '!important;';
			}
			$css .= '}';
		}

		if ($button->color) {
			$css .= '.combar-sab-container > .sab-btn.sab-' . esc_attr($button->unique) . ' .sab-button-inner {';
			$css .= 'color: ' . esc_attr($button->color) . '!important;';
			$css .= '}';
		}	

		if ($button->hover_bg || $button->border_hover) {
			$css .= '.combar-sab-container > .sab-btn.sab-' . esc_attr($button->unique) . ':hover {';
			if ($button->hover_bg) {
				$css .= 'background-color: ' . esc_attr($button->hover_bg) . ' !important;';
			}
			if ($button->border_hover) {
				$css .= 'border-color: ' . esc_attr($button->border_hover) . '!important;';
			}
			$css .= '}';
		}

		if ($button->hover_color) {
			$css .= '.combar-sab-container > .sab-btn.sab-' . esc_attr($button->unique) . ':hover .sab-button-inner {';
			$css .= 'color: ' . esc_attr($button->hover_color) . '!important;';
			$css .= '}';
		}
		
		if ($button->icon_color || $button->color) {
			if (!$button->icon_color) {
				$button->icon_color = $button->color;
			}
			$css .= '.combar-sab-container > .sab-btn.sab-' . esc_attr($button->unique) . ' .sab-button-inner i.sab-icon {';
			$css .= 'color: ' . esc_attr($button->icon_color) . '!important;';
			$css .= '}';
		}

		if ($button->icon_hover || $button->hover_color) {
			if (!$button->icon_hover) {
				$button->icon_hover = $button->hover_color;
			}
			$css .= '.combar-sab-container > .sab-btn.sab-' . esc_attr($button->unique) . ':hover .sab-button-inner i.sab-icon {';
			$css .= 'color: ' .  esc_attr($button->icon_hover) . '!important;';
			$css .= '}';
		}
		
	}

	return $css;
}

function combar_sab_create_trigger($settings) {
	$general_settings = get_option('combar_sab_general_setting');
	$hash = $general_settings['hash'];
	$esc = $general_settings['esc'];

	$title = $settings['trigger_text'];
	$icon = $settings['trigger_icon'];
	$close_title = $settings['close_text'];
	$close_icon = $settings['close_icon'];
	$icon_side = $settings['icon_side'];
	
	if (!$close_title) {
		$close_title = $title;
	}
	if (!$close_icon) {
		$close_icon = $icon;
	}
	
	if ($icon) {
		$iconClass = explode(' ', $icon);
		foreach ($iconClass as $iconC) {
			$iconClass[] = esc_attr($iconC);
		}
	}
	if ($close_icon) {
		$closeIconClass = explode(' ', $close_icon);
		foreach ($closeIconClass as $CloseIconC) {
			$closeIconClass[] = esc_attr($CloseIconC);
		}
	}

	$html = '';
	
	// button tag 
	$btnTag = 'span ';
	if ('on' == $hash) {
		$btnTag = 'a ';
	}
	// trigger class
	$btnClass = array();
	$btnClass[] = 'sab-btn';
	$btnClass[] = 'sab-trigger';
	$btnClass[] = esc_attr('style-' . $settings['trigger_text_style']);
	$btnClass[] = esc_attr('icon-' . $icon_side);
	if ('on' == $settings['trigger_gradient']) {
		$btnClass[] = 'sab-gradient';
	}
	if ('toogle_tooltip' == $settings['trigger_text_style'] || 'tooltip' == $settings['trigger_text_style']) {
		$btnClass[] = 'sab-tooltip';
	}

	// button attributes
	$btnAtts = array();
	if ('on' == $hash) {
		$btnAtts[] = 'href="#sab-toggle"';
		$btnAtts[] = 'data-hash="true"';
	}
	if ('on' == $esc) {
		$btnAtts[] = 'data-esc="true"';
	}

	// buttonclass
	if (!empty($btnClass)) {
		$btnClassAttr = 'class="';
		$btnClassAttr .= implode(' ', $btnClass);
		$btnClassAttr .= '"';
		$btnAtts[] = $btnClassAttr;
	}

	$btnAtts[] = 'id="sab-trigger"';

	if ($title) {
		$btnAtts[] = 'title="' . esc_attr($title) . '"';
		$btnAtts[] = 'aria-label="' . esc_attr($title) . '"';
	}
	$html .= '<' . esc_html($btnTag) .  implode(' ', $btnAtts) . '>';

	$html .= '<div class="sab-button-inner trigger-open">';

	if (!empty($iconClass)) {
		$html .= '<i class="' . implode(' ' , $iconClass) . ' sab-icon"></i>';
	}

	if ($title) {
		$html .= '<span class="sab-title">' . esc_html($title) . '</span>';
	}

	$html .= '</div>';

	$html .= '<div class="sab-button-inner trigger-close">';

	if (!empty($closeIconClass)) {
		$html .= '<i class="' . implode(' ', $closeIconClass) . ' sab-icon"></i>';
	}

	if ($close_title) {
		$html .= '<span class="sab-title">' . esc_html($close_title) . '</span>';
	}

	$html .= '</div>';

	$html .= '</a>';

	return $html;
}

/*
 * set default value for setting
*/
function combar_sab_setting_deafult($setting, $default) {
	if ('' == $setting || !isset($setting)) {
		return $default;
	}
	else {
		return $setting;
	}
}