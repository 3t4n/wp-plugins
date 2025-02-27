<?php

/**
 * Support for Page Builder by SiteOrigin
 *
 * @package		Meteorite_Extensions
 * @link		http://terra-themes.com
 * Author:		Terra Themes
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/* Defaults */
add_theme_support( 'siteorigin-panels', array( 
	'margin-bottom' => 0,
) );

/* Theme widgets */
function meteorite_theme_widgets($widgets) {
	$theme_widgets = array(
	'Meteorite_List_With_Icons',
	'Meteorite_Clients',
	'Meteorite_Testimonials',
	'Meteorite_Skills',
	'Meteorite_Action',
	'Meteorite_Video_Widget',
	'Meteorite_Employees',
	'Meteorite_Projects',
	'Meteorite_Projects_Carousel',
	'Meteorite_Text_With_Icon',
	'Meteorite_Contact_Info',
	'Meteorite_Latest_News',
	'Meteorite_Latest_News_Carousel',
	'Meteorite_Social_Media',
	'Meteorite_Facts',
	'Meteorite_Tabs',
	'Meteorite_Image_Frame',
	'Meteorite_Pricing_Table',
	'Meteorite_Skills_Circle',
	'Meteorite_Buttons',
	);
	foreach($theme_widgets as $theme_widget) {
		if ( isset( $widgets[$theme_widget] ) ) {
			$widgets[$theme_widget]['groups'] = array('meteorite-theme');
			$widgets[$theme_widget]['icon'] = 'dashicons dashicons-schedule';
		}
	}
	return $widgets;
}
add_filter('siteorigin_panels_widgets', 'meteorite_theme_widgets');

/* Add a tab for the theme widgets in the page builder */
function meteorite_theme_widgets_tab($tabs){
	$tabs[] = array(
		'title' => __('Meteorite Theme Widgets', 'meteorite_extensions'),
		'filter' => array(
			'groups' => array('meteorite-theme')
		)
	);
	return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'meteorite_theme_widgets_tab', 20);

/* Replace default row options */
function meteorite_row_styles($fields) {

	$fields['padding_top'] = array(
		'name' 			=> __('Top Padding', 'meteorite_extensions'),
		'type' 			=> 'measurement',
		'description' 	=> __('Top padding for this row [default: 100px]', 'meteorite_extensions'),
		'priority' 		=> 3,
		'group' 		=> 'layout'
	);
	$fields['padding_bottom'] = array(
		'name' 			=> __('Bottom Padding', 'meteorite_extensions'),
		'type' 			=> 'measurement',
		'description'	=> __('Bottom padding for this row [default: 100px]', 'meteorite_extensions'),
		'priority' 		=> 4,
		'group' 		=> 'layout'
	);
	$fields['mobile_padding'] = array(
		'name'			=> __('Mobile Padding', 'meteorite_extensions'),
		'type'			=> 'select',
		'description' 	=> __('Here you can select a top/bottom row padding for screen sizes < 992px', 'meteorite_extensions'),
		'options'		=> array(
			'' 				=> __('Default', 'meteorite_extensions'),
			'mob-pad-0' 	=> __('0', 'meteorite_extensions'),
			'mob-pad-25'	=> __('25px', 'meteorite_extensions'),
			'mob-pad-50'	=> __('50px', 'meteorite_extensions'),
			'mob-pad-75'	=> __('75px', 'meteorite_extensions'),
			'mob-pad-100'	=> __('100px', 'meteorite_extensions'),
		),
		'priority'	=> 8,
		'group' 	=> 'layout'
	);
	$fields['fullscreen_row'] = array(
		'name'			=> __('Set this row to full height?', 'meteorite_extensions'),
		'type'			=> 'checkbox',
		'group'			=> 'layout',
		'description' 	=> __('This makes your row full browser height.', 'meteorite_extensions'),
		'priority'		=> 10,
	);
	$fields['align'] = array(
		'name' 			=> __('Center align the content?', 'meteorite_extensions'),
		'type' 			=> 'checkbox',
		'description' 	=> __('This may or may not work. It depends on the widget styles.', 'meteorite_extensions'),
		'priority' 		=> 2,
		'group' 		=> 'design'
	);
	$fields['bottom_border'] = array(
		'name' 		=> __('Bottom Border Color', 'meteorite_extensions'),
		'type' 		=> 'color',
		'description' 	=> __('Bottom border color of the row.', 'meteorite_extensions'),
		'priority' 	=> 4,
		'group' 	=> 'design'
	);
	$fields['color'] = array(
		'name' 			=> __('Color', 'meteorite_extensions'),
		'type' 			=> 'color',
		'description' 	=> __('Color of the row.', 'meteorite_extensions'),
		'priority' 		=> 8,
		'group' 		=> 'design'
	);
	$fields['background_image'] = array(
		'name' 			=> __('Background Image', 'meteorite_extensions'),
		'type' 			=> 'image',
		'description' 	=> __('Background image of the row.', 'meteorite_extensions'),
		'priority' 		=> 10,
		'group' 		=> 'design'
	);
	$fields['parallax_effect'] = array(
		'name'			=> __('Parallax', 'meteorite_extensions'),
		'type'			=> 'select',
		'description' 	=> __('Background image effect.', 'meteorite_extensions'),
		'options'		=> array(
			'parallax'	=> __('Parallax', 'meteorite_extensions'),
			'fixed'		=> __('Fixed', 'meteorite_extensions'),
			'scroll'	=> __('Scroll', 'meteorite_extensions'),
		),
		'priority'	=> 12,
		'group' 	=> 'design'
	);
	$fields['row_seperator'] = array(
		'name'			=> __('Row Seperator', 'meteorite_extensions'),
		'type'			=> 'checkbox',
		'description' 	=> __('Activate a seperator after this row?', 'meteorite_extensions'),
		'priority'		=> 14,
		'group' 		=> 'design'
	);
	$fields['overlay'] = array(
		'name'		=> __('Disable row overlay?', 'meteorite_extensions'),
		'type'		=> 'checkbox',
		'priority'	=> 16,
		'group'		=> 'design'
	);
	$fields['overlay_color'] = array(
		'name'		=> __('Overlay color', 'meteorite_extensions'),
		'type'		=> 'color',
		'default'	=> '#000000',
		'priority'	=> 18,
		'group'		=> 'design'
	);

	return $fields;
}
//remove_filter('siteorigin_panels_row_style_fields', array('SiteOrigin_Panels_Default_Styling', 'row_style_fields' ) );
add_filter('siteorigin_panels_row_style_fields', 'meteorite_row_styles');

/**
 * Page builder widget options
 */
function meteorite_custom_widget_style_fields($fields) {
	$fields['content_alignment'] = array(
		'name'		=> __('Content alignment', 'meteorite_extensions'),
		'type'		=> 'select',
		'group'		=> 'design',
		'options'	=> array(
			''			=> __('None', 'meteorite_extensions'),
			'left'		=> __('Left', 'meteorite_extensions'),
			'center' 	=> __('Center', 'meteorite_extensions'),
			'right'		=> __('Right', 'meteorite_extensions'),
		),
		'default'		=> 'left',
		'description' 	=> __('This setting depends on the content, it may or may not work.', 'meteorite_extensions'),
		'priority'		=> 10,
	);
	$fields['title_color'] = array(
		'name'		=> __('Widget title color', 'meteorite_extensions'),
		'type'		=> 'color',
		'default'	=> '#444444',
		'group'		=> 'design',
		'priority'	=> 11,
	);
	$fields['headings_color'] = array(
		'name'			=> __('Headings color', 'meteorite_extensions'),
		'type'			=> 'color',
		'default'		=> '#444444',
		'group'			=> 'design',
		'description'	=> __('This applies to all headings in the widget, except the widget title.', 'meteorite_extensions'),
		'priority'		=> 12,
	);

	return $fields;
}
add_filter( 'siteorigin_panels_widget_style_fields', 'meteorite_custom_widget_style_fields');

/**
 * Output page builder widget options
 */
function meteorite_custom_widget_style_attributes( $attributes, $args ) {

	if ( !empty($args['title_color']) ) {
		$attributes['data-title-color'] = esc_attr($args['title_color']);
	}

	if ( !empty($args['headings_color']) ) {
		$attributes['data-headings-color'] = esc_attr($args['headings_color']);
	}

	if ( !empty($args['content_alignment']) ) {
		$attributes['style'] .= 'text-align: ' . esc_attr($args['content_alignment']) . ';';
	}

	return $attributes;
}
add_filter('siteorigin_panels_widget_style_attributes', 'meteorite_custom_widget_style_attributes', 10, 2);

/* Filter for the styles */
function meteorite_row_styles_output($attr, $style) {
	$defaultRowPadding = get_theme_mod('so_default_row_padding', '100');

	//$attr['style'] = '';

	if ( !empty($style['bottom_border']) ) {
		$attr['style'] .= 'border-bottom: 1px solid '. esc_attr($style['bottom_border']) . ';';
	}

	if ( !empty($style['color']) ) {
		$attr['style'] .= 'color: ' . esc_attr($style['color']) . ';';
		$attr['data-hascolor'] = 'hascolor';
	}

	if ( !empty($style['align']) ) {
		$attr['style'] .= 'text-align: center;';
	}

	if ( !empty($style['background_image']) ) {
		$url = wp_get_attachment_image_src( $style['background_image'], 'full' );
		if ( !empty($url) ) {
			$attr['style'] .= 'background-image: url(' . esc_url($url[0]) . ');';
			$attr['data-hasbg'] = 'hasbg';
		}
	}

	if ( !empty($style['padding_top']) ) {
		$attr['style'] .= 'padding-top: ' . esc_attr($style['padding_top']) . '; ';
	} else {
		$attr['style'] .= 'padding-top: ' . $defaultRowPadding . 'px; ';
	}

	if ( !empty($style['padding_bottom']) ) {
		$attr['style'] .= 'padding-bottom: ' . esc_attr($style['padding_bottom']) . '; ';
	} else {
		$attr['style'] .= 'padding-bottom: ' . $defaultRowPadding . 'px; ';
	}

	if ( !empty($style['parallax_effect']) ) {
		$attr['class'][] = 'meteorite-' . esc_attr($style['parallax_effect']);
	}

	if ( !empty($style['mobile_padding']) ) {
		$attr['class'][] = esc_attr($style['mobile_padding']);
	}

	if ( !empty($style['fullscreen_row']) ) {
		$attr['data-fullheight'] = 'true';
	}

	if ( !empty($style['row_seperator']) ) {
		$attr['class'][] = 'row-has-seperator';
	}

	if ( empty($style['overlay']) ) {
		$attr['data-overlay'] = 'true';
	}

	if ( !empty($style['overlay_color']) ) {
		$attr['data-overlay-color'] = esc_attr($style['overlay_color']);
	}

	if (empty($attr['style']) ) 
		unset($attr['style']);

	return $attr;
}
add_filter('siteorigin_panels_row_style_attributes', 'meteorite_row_styles_output', 10, 2);

/**
 * Remove defaults
 */
function meteorite_remove_default_so_row_styles( $fields ) {
	unset( $fields['background_image_attachment'] );
	unset( $fields['background_display'] );
	unset( $fields['border_color'] );
	unset( $fields['padding'] );
	return $fields;
}
add_filter('siteorigin_panels_row_style_fields', 'meteorite_remove_default_so_row_styles' );
add_filter('siteorigin_premium_upgrade_teaser', '__return_false');