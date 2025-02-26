<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get the Plugin Data.
 */
function astro_sb_plugin_data($var = false) {
	$plugin_file = plugin_dir_path(__FILE__) . 'astro-sticky-buttons.php';
	if( !function_exists('get_plugin_data') ){
		require_once(ABSPATH . 'wp-admin/includes/plugin.php');
	}
	$get_plugin_data = get_plugin_data( $plugin_file );
	if ($var) { $get_plugin_data = $get_plugin_data[$var]; }
	return $get_plugin_data;
}

/**
 * Set the plugin options names.
 */
function astro_sb_option_names($tab = false) {

	$option_names = false;

	switch ($tab) {
		case 'settings' :
			$option_names_enable = array();

			$args = array( 'public' => true );
			$post_types = get_post_types( $args );
			foreach ($post_types as $post_type) {
				$option_names_enable[ASTRO_SB_PREFIX . 'enable_' . $post_type] = ASTRO_SB_PREFIX . 'enable_' . $post_type;
			}

			$args = array( 'public' => true );
			$taxonomies = get_taxonomies( $args );
			foreach ($taxonomies as $taxonomy) {
				$option_names_enable[ASTRO_SB_PREFIX . 'enable_' . $taxonomy] = ASTRO_SB_PREFIX . 'enable_' . $taxonomy;
			}

			$option_names = array(
				ASTRO_SB_PREFIX . 'email' => ASTRO_SB_PREFIX . 'email',
				ASTRO_SB_PREFIX . 'telephone' => ASTRO_SB_PREFIX . 'telephone',
				ASTRO_SB_PREFIX . 'whatsapp' => ASTRO_SB_PREFIX . 'whatsapp',
				ASTRO_SB_PREFIX . 'facebook_messenger' => ASTRO_SB_PREFIX . 'facebook_messenger',
				ASTRO_SB_PREFIX . 'skype' => ASTRO_SB_PREFIX . 'skype',
				ASTRO_SB_PREFIX . 'twitter' => ASTRO_SB_PREFIX . 'twitter',
				ASTRO_SB_PREFIX . 'instagram' => ASTRO_SB_PREFIX . 'instagram',
				ASTRO_SB_PREFIX . 'facebook' => ASTRO_SB_PREFIX . 'facebook',
				ASTRO_SB_PREFIX . 'youtube' => ASTRO_SB_PREFIX . 'youtube',
				ASTRO_SB_PREFIX . 'tiktok' => ASTRO_SB_PREFIX . 'tiktok',
				ASTRO_SB_PREFIX . 'vimeo' => ASTRO_SB_PREFIX . 'vimeo',
				ASTRO_SB_PREFIX . 'pinterest' => ASTRO_SB_PREFIX . 'pinterest',
			);

			$option_names = array_merge($option_names_enable, $option_names);
			break;

		case 'layout' :
			$option_names = array(
				ASTRO_SB_PREFIX . 'position' => ASTRO_SB_PREFIX . 'position',
				ASTRO_SB_PREFIX . 'icon-margin-top' => ASTRO_SB_PREFIX . 'icon-margin-top',
				ASTRO_SB_PREFIX . 'icon-margin-right' => ASTRO_SB_PREFIX . 'icon-margin-right',
				ASTRO_SB_PREFIX . 'icon-margin-bottom' => ASTRO_SB_PREFIX . 'icon-margin-bottom',
				ASTRO_SB_PREFIX . 'icon-margin-left' => ASTRO_SB_PREFIX . 'icon-margin-left',
				ASTRO_SB_PREFIX . 'icon-padding' => ASTRO_SB_PREFIX . 'icon-padding',
				ASTRO_SB_PREFIX . 'icon-width' => ASTRO_SB_PREFIX . 'icon-width',
				ASTRO_SB_PREFIX . 'icon-font-size' => ASTRO_SB_PREFIX . 'icon-font-size',
				ASTRO_SB_PREFIX . 'icon-border-width' => ASTRO_SB_PREFIX . 'icon-border-width',
				ASTRO_SB_PREFIX . 'icon-border-style' => ASTRO_SB_PREFIX . 'icon-border-style',
				ASTRO_SB_PREFIX . 'icon-border-radius' => ASTRO_SB_PREFIX . 'icon-border-radius',
				ASTRO_SB_PREFIX . 'icon-box-shadow' => ASTRO_SB_PREFIX . 'icon-box-shadow',
				ASTRO_SB_PREFIX . 'custom-css' => ASTRO_SB_PREFIX . 'custom-css',
			);
			break;
	}

	return $option_names;
}

/**
 * Unregister the option names if the plugin will delete.
 */
register_uninstall_hook(__FILE__, 'astro_sb_unregister_option_names');
function astro_sb_unregister_option_names() {
	$tab = 'settings';
	$option_group = ASTRO_SB_PREFIX . '_' . $tab;
	$option_names = astro_sb_option_names($tab);

	foreach ($option_names as $option_name) {
		register_setting( $option_group, $option_name );
	}
}

/**
 * Return the Astro Sticky Buttons shortcode.
 */
function astro_sb_shortcode_output() {

	// Get the Template
	$template_file = plugin_dir_path(__FILE__) . 'templates/astro-sticky-buttons.php';
	if (file_exists($template_file)) { // Check if the template file exists.
		ob_start();
		include($template_file);
		$content = ob_get_clean();
		return $content;
	}
}
add_shortcode('astro-sticky-buttons', 'astro_sb_shortcode_output');

/**
 * Return the custom Layout CSS classes.
 */
function astro_sb_get_custom_layout() {

	$arr = array();

	//Position
	$position = array();
	$position_element = get_option(ASTRO_SB_PREFIX.'position');
	if (!empty($position_element)) {
		$position[] = 'color:'.$position_element;
	}
	if (!empty($position)) {
		$position = implode(';', $position);
		$arr[] = array('class' => '.astro_sb', 'prop' => $position);
	}

	//Icon
	$icon = array();
	$icon_margin_top = get_option(ASTRO_SB_PREFIX.'icon-margin-top');
	if ($icon_margin_top != '') {
		$icon[] = 'margin-top:'.$icon_margin_top.'px';
	}
	$icon_margin_right = get_option(ASTRO_SB_PREFIX.'icon-margin-right');
	if ($icon_margin_right != '') {
		$icon[] = 'margin-right:'.$icon_margin_right.'px';
	}
	$icon_margin_bottom = get_option(ASTRO_SB_PREFIX.'icon-margin-bottom');
	if ($icon_margin_bottom != '') {
		$icon[] = 'margin-bottom:'.$icon_margin_bottom.'px';
	}
	$icon_margin_left = get_option(ASTRO_SB_PREFIX.'icon-margin-left');
	if ($icon_margin_left != '') {
		$icon[] = 'margin-left:'.$icon_margin_left.'px';
	}
	$icon_padding = get_option(ASTRO_SB_PREFIX.'icon-padding');
	if ($icon_padding != '') {
		$icon[] = 'padding:'.$icon_padding.'px';
	}
	$icon_width = get_option(ASTRO_SB_PREFIX.'icon-width');
	if ($icon_width != '') {
		$icon[] = 'width:'.$icon_width.'px';
		$icon[] = 'height:'.$icon_width.'px';
	}
	$icon_font_size = get_option(ASTRO_SB_PREFIX.'icon-font-size');
	if ($icon_font_size != '') {
		$icon[] = 'font-size:'.$icon_font_size.'px';
	}
	$icon_border_width = get_option(ASTRO_SB_PREFIX.'icon-border-width');
	if ($icon_border_width != '') {
		$icon[] = 'border-width:'.$icon_border_width.'px';
	}
	$icon_border_style = get_option(ASTRO_SB_PREFIX.'icon-border-style');
	if ($icon_border_style != '') {
		$icon[] = 'border-style:'.$icon_border_style;
	}
	$icon_border_radius = get_option(ASTRO_SB_PREFIX.'icon-border-radius');
	if ($icon_border_radius != '') {
		$icon[] = 'border-radius:'.$icon_border_radius.'px';
	}
	$icon_box_shadow = get_option(ASTRO_SB_PREFIX.'icon-box-shadow');
	if ($icon_box_shadow == 'no') {
		$icon[] = 'box-shadow:none';
	}
	if (!empty($icon)) {
		$icon = implode(';', $icon);
		$arr[] = array('class' => '.astro_sb a', 'prop' => $icon);
	}

	$custom_css = get_option(ASTRO_SB_PREFIX.'custom-css');

	$str = false;
	if (!empty($arr) || !empty($custom_css)) {
		foreach ($arr as $item) {
			$str .= $item['class'].'{'.$item['prop'].';}';
		}
		$str .= $custom_css;
	}

	return $str;
}

/**
 * Check the current page/post type.
 */
function astro_sb_get_current_post_type() {
	global $post;

	//Default value
	$enable = false;

	if ( is_singular() || is_single() || is_page() ) {
		$option_value = get_option('astro_sb_enable_' . $post->post_type);
		if ($option_value == 1) {
			$enable = true;
		}
	}

	if ( is_category() || is_tax() || is_tag() ) {
		$obj = get_queried_object();
		if ($obj) {
			$term_taxonomy = $obj->taxonomy;
			$option_value = get_option('astro_sb_enable_' . $term_taxonomy);
			if ($option_value == 1) {
				$enable = true;
			}
		}
	}

	if ( is_archive() ) {
		$enable = true;
	}

	if ($enable) {
		echo astro_sb_shortcode_output();
	}else{
		return false;
	}
}
add_action('wp_footer', 'astro_sb_get_current_post_type');
