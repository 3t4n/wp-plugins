<?php

/*
Widget Name: E: Lightbox Component - Image
Description: Images designed for Lighbox supported widgets.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/lightbox-gallery/
*/

class EchelonSOEsoLightboxComponentImage extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-lightbox-component-image',
			__('E: Lightbox Component - Image', 'echelon-so'),
			array(
				'description' => __('Images designed for Lighbox supported widgets.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/lightbox-gallery/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template
	*/

	function get_template_name($instance) {
		$allowed_templates = array('default', 'icon');
		if ( in_array($instance['lightbox_content']['template'], $allowed_templates) ) {
			return $instance['lightbox_content']['template'];
		} else {
			return 'default';
		}
	}

	/*
	* Stylesheet
	*/

	function get_style_name($instance) {
		$allowed_templates = array('icon');
		if ( in_array($instance['lightbox_content']['template'], $allowed_templates) ) {
			return $instance['lightbox_content']['template'];
		} else {
			return 'default';
		}
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		// content
		if ( ! empty( $instance['lightbox_content']['image'] ) ) {

			$t_size = empty( $instance['lightbox_content']['thumb_size'] ) ? 'full' : $instance['lightbox_content']['thumb_size'];
			$d_size = empty( $instance['lightbox_content']['display_size'] ) ? 'full' : $instance['lightbox_content']['display_size'];

			$return['image_thumb'] = sow_esc_url(wp_get_attachment_image_src( $instance['lightbox_content']['image'], $t_size )[0]);
			$return['image_display'] = sow_esc_url(wp_get_attachment_image_src( $instance['lightbox_content']['image'], $d_size )[0]);

		} else {

			$return['thumb'] = false;
			$return['display'] = false;

		}

		$return['image_class'][] = 'eso';
		(empty($instance['lightbox_content']['image_scale'])) ?: $return['image_class'][] = 'uk-transition-scale-up';

		$return['title'] = !empty($instance['lightbox_content']['title']) ? $instance['lightbox_content']['title'] : '';
		$return['sub_title'] = !empty($instance['lightbox_content']['sub_title']) ? $instance['lightbox_content']['sub_title'] : '';

		// icon
		if ( $instance['lightbox_content']['template'] == 'icon') {
			$return['icon_styles'] = array();
			if (!empty($instance['icon']['size'])) $return['icon_styles'][] = 'font-size: ' . $instance['icon']['size'];
			if (!empty($instance['icon']['color'])) $return['icon_styles'][] = 'color: ' . $instance['icon']['color'];
			$return['icon'] = $instance['icon']['icon'];
		}

		// overlay
		$return['overlay_class'][] = 'eso';
		(empty($instance['overlay']['position'])) ?: $return['overlay_class'][] = $instance['overlay']['position'];
		(empty($instance['overlay']['position_size'])) ?: $return['overlay_class'][] = $instance['overlay']['position_size'];
		(empty($instance['overlay']['padding'])) ?: $return['overlay_class'][] = $instance['overlay']['padding'];
		(empty($instance['overlay']['transition'])) ?: $return['overlay_class'][] = $instance['overlay']['transition'];
		if ( isset($instance['overlay']['position']) && $instance['overlay']['position'] == 'uk-position-cover' ) {
			$return['overlay_class'][] = 'uk-flex';
			// (empty($instance['overlay']['flex_h'])) ?: $return['overlay_class'][] = $instance['overlay']['flex_h'];
			(empty($instance['overlay']['flex_v'])) ?: $return['overlay_class'][] = $instance['overlay']['flex_v'];
		}

		$return['title_class'][] = 'eso';
		(empty($instance['title']['font_size'])) ?: $return['title_class'][] = $instance['title']['font_size'];
		(empty($instance['title']['font_weight'])) ?: $return['title_class'][] = $instance['title']['font_weight'];
		(empty($instance['title']['text_align'])) ?: $return['title_class'][] = $instance['title']['text_align'];

		$return['sub_title_class'][] = 'eso';
		(empty($instance['sub_title']['font_size'])) ?: $return['sub_title_class'][] = $instance['sub_title']['font_size'];
		(empty($instance['sub_title']['font_weight'])) ?: $return['sub_title_class'][] = $instance['sub_title']['font_weight'];
		(empty($instance['sub_title']['text_align'])) ?: $return['sub_title_class'][] = $instance['sub_title']['text_align'];

		return $return;

	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {

		if ( isset($instance['icon']) && $instance['lightbox_content']['template'] == 'icon' ) {
			$return['background_color'] = !empty( $instance['icon']['background_color'] ) ? $instance['icon']['background_color'] : false;
		}

		if ( isset($instance['overlay']) && $instance['lightbox_content']['template'] == 'overlay' ) {
			$return['background_color'] = !empty( $instance['overlay']['background_color'] ) ? $instance['overlay']['background_color'] : false;
			$return['background_hover_color'] = !empty( $instance['overlay']['background_hover_color'] ) ? $instance['overlay']['background_hover_color'] : false;
			$return['text_color'] = !empty( $instance['overlay']['text_color'] ) ? $instance['overlay']['text_color'] : false;
			$return['text_hover_color'] = !empty( $instance['overlay']['text_hover_color'] ) ? $instance['overlay']['text_hover_color'] : false;
		}

		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		$return['lightbox_content'] = EsoWidgetFormCorePart::section('Settings', array(
			'template' => EsoWidgetFormCorePart::select('Template', '', 'default', array(
				'default' => __('Blank', 'echelon-so'),
				'icon' => __('Icon', 'echelon-so'),
				'overlay' => __('Overlay' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
			), array(

			), array(
				'callback' => 'select',
				'args' => array( 'template' )
			)),
			'image' => EsoWidgetFormCorePart::media('Image', 'Choose an image to use in the gallery.'),
			'thumb_size' => EsoWidgetFormCorePart::image_size('Thumb Size', 'Choose a size to use for the image thumbnail.'),
			'display_size' => EsoWidgetFormCorePart::image_size('Display Size', 'Choose a size to use for the image when shown in the lightbox.'),
			'title' => EsoWidgetFormCorePart::text('Title', 'The title is used in overlays and as the caption text.'),
			'sub_title' => EsoWidgetFormCorePart::text('Sub Title' . EsoWidgetFormPart::prime_tag(), 'The sub title is used in overlays.', '', array(
				'template[overlay]' => array( 'show' ),
				'_else[template]' => array( 'hide' ),
			)),
			'image_scale' => EsoWidgetFormPart::binary('Image Scale Up', 'Add the Scale Up transition to the thumbnail image.', '0', 'Yes', 'No')
		));

		$return['icon'] = EsoWidgetFormCorePart::section('Icon', array(
			'icon' => EsoWidgetFormCorePart::icon('Icon', 'The icon to use.'),
			'color' => EsoWidgetFormCorePart::color('Color', 'The color to use for the icon', '#ffffff'),
			'size' => EsoWidgetFormCorePart::measurement('Size', 'How big to make the icon.', '30px'),
			'background_color' => EsoWidgetFormPart::rgba('Background Color', 'The background color for the overlay when hovered or focused.', 'rgba(0,0,0,0.45)'),
		), array(
			'template[icon]' => array( 'show' ),
			'_else[template]' => array( 'hide' ),
		));

		$return['title'] = EsoWidgetFormCorePart::section('Title' . EsoWidgetFormPart::prime_tag(), array(
			'color' => EsoWidgetFormCorePart::color('Color', 'The color to use for the text', '#ffffff'),
			'hover_color' => EsoWidgetFormCorePart::color('Hover Color', 'The color to use for the text', '#ffffff'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_align' => EsoWidgetFormPart::uikit('text_align')
		), array(
			'template[overlay]' => array( 'show' ),
			'_else[template]' => array( 'hide' ),
		));

		$return['sub_title'] = EsoWidgetFormCorePart::section(' Sub Title' . EsoWidgetFormPart::prime_tag(), array(
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_align' => EsoWidgetFormPart::uikit('text_align')
		), array(
			'template[overlay]' => array( 'show' ),
			'_else[template]' => array( 'hide' ),
		));

		$return['overlay'] = EsoWidgetFormCorePart::section('Overlay Appearance' . EsoWidgetFormPart::prime_tag(), array(
			'background_color' => EsoWidgetFormPart::rgba('Background Color', 'The background color for the overlay.', 'rgba(0,0,0,0.45)'),
			'background_hover_color' => EsoWidgetFormPart::rgba('Hover Background Color', 'The background color for the overlay when hovered or focused.', 'rgba(0,0,0,0.3)'),
			'text_color' => EsoWidgetFormCorePart::color('Color', 'The color to use for the text', '#ffffff'),
			'text_hover_color' => EsoWidgetFormCorePart::color('Hover Color', 'The color to use for the text', '#ffffff'),
			'padding' => EsoWidgetFormPart::uikit('padding'),
			'position' => EsoWidgetFormPart::uikit('position', '', '', array(), array(
				'callback' => 'select',
				'args' => array( 'position' )
			)),
			'position_size' => EsoWidgetFormPart::uikit('position_size'),
			'transition' => EsoWidgetFormPart::uikit('transition'),
			'flex_v' => EsoWidgetFormPart::uikit('flex_v', 'Vertical Alignment', 'When using cover positions you can for the vertical alginemnt here.', '0', array(
				'position[uk-position-cover]' => array( 'show' ),
				'_else[position]' => array( 'hide' ),
			)),
			// 'flex_h' => EsoWidgetFormPart::uikit('flex_h', '', '', '0', array(
			// 	'position[uk-position-cover]' => array( 'show' ),
			// 	'_else[position]' => array( 'hide' ),
			// ))
		), array(
			'template[overlay]' => array( 'show' ),
			'_else[template]' => array( 'hide' ),
		));

		return $return;
	}


	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset($instance['modifiers']['title_size']) ) {
			$instance['title']['font_size'] = $instance['modifiers']['title_size'];
			unset( $instance['modifiers']['title_size'] );
		}
		if ( isset($instance['modifiers']['title_weight']) ) {
			$instance['title']['font_weight'] = $instance['modifiers']['title_weight'];
			unset( $instance['modifiers']['title_weight'] );
		}
		if ( isset($instance['modifiers']['title_align']) ) {
			$instance['title']['text_align'] = $instance['modifiers']['title_align'];
			unset( $instance['modifiers']['title_align'] );
		}
		if ( isset($instance['modifiers']['sub_title_size']) ) {
			$instance['sub_title']['font_size'] = $instance['modifiers']['sub_title_size'];
			unset( $instance['modifiers']['sub_title_size'] );
		}
		if ( isset($instance['modifiers']['sub_title_weight']) ) {
			$instance['sub_title']['font_weight'] = $instance['modifiers']['sub_title_weight'];
			unset( $instance['modifiers']['sub_title_weight'] );
		}
		if ( isset($instance['modifiers']['sub_title_align']) ) {
			$instance['sub_title']['text_align'] = $instance['modifiers']['sub_title_align'];
			unset( $instance['modifiers']['sub_title_align'] );
		}
		if ( isset($instance['modifiers']['image_scale']) ) {
			if ( !empty($instance['modifiers']['image_scale']) ) {
				$instance['lightbox_content']['image_scale'] = '1';
			}
			unset( $instance['modifiers']['image_scale'] );
		}
		if ( isset($instance['modifiers']['position']) ) {
			$instance['overlay']['position'] = $instance['modifiers']['position'];
			unset( $instance['modifiers']['position'] );
		}
		if ( isset($instance['modifiers']['position_size']) ) {
			$instance['overlay']['position_size'] = $instance['modifiers']['position_size'];
			unset( $instance['modifiers']['position_size'] );
		}
		if ( isset($instance['modifiers']['flex_v']) ) {
			$instance['overlay']['flex_v'] = $instance['modifiers']['flex_v'];
			unset( $instance['modifiers']['flex_v'] );
		}
		if ( isset($instance['modifiers']['flex_h']) ) {
			$instance['overlay']['flex_v'] = $instance['modifiers']['flex_h'];
			unset( $instance['modifiers']['flex_h'] );
		}
		if ( isset($instance['modifiers']['transition']) ) {
			$instance['overlay']['transition'] = $instance['modifiers']['transition'];
			unset( $instance['modifiers']['transition'] );
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-lightbox-component-image', __FILE__, 'EchelonSOEsoLightboxComponentImage');
