<?php

/*
Widget Name: E: Product Category Box
Description: Display a Category from your shop.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/product-category-box/
*/

class EchelonSOProductCategoryBox extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'eso-product-category-box',
			__('E: Product Category Box', 'echelon-so'),
			array(
				'description' => __('Display a Category from your shop.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/product-category-box/',
				'panels_groups' => array('eso_woo'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template File
	*/

	function get_template_name($instance) {
		$template_name = $instance['settings']['layout'];
		$allowed_templates = array('simple', 'badge');
		if ( in_array($template_name, $allowed_templates) ) {
			return $template_name;
		}
		return 'simple';
	}

	/*
	* LESS File
	*/

	function get_style_name($instance) {
		$template_name = $instance['settings']['layout'];
		$allowed_templates = array('simple', 'badge');
		if ( in_array($template_name, $allowed_templates) ) {
			return $template_name;
		}
		return 'simple';
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		// settings
		if ( !empty($instance['settings']['category']) ) {

			$return['has_cat'] = true;

			$image_size = empty( $instance['settings']['image_size'] ) ? 'full' : $instance['settings']['image_size'];
			$thumbnail_id = get_term_meta( $instance['settings']['category'], 'thumbnail_id', true );
			$image = wp_get_attachment_image_src( $thumbnail_id, $image_size );

			if ( !empty($image) ) {
				$return['image'] = $image[0];
			} else {
				$return['image'] = false;
			}

			$term = get_term(  $instance['settings']['category'], 'product_cat' );
			$return['count'] = $term->count;
			$return['name'] = $term->name;
			$return['description'] = $term->description;
			$return['link'] = get_term_link( $term->term_id, 'product_cat' );

		} else{

			$return['has_cat'] = false;

		}

		// image
		$return['image_class'][] = 'eso';
		(empty($instance['settings']['image_transition'])) ?: $return['image_class'][] = $instance['settings']['image_transition'];

		// name
		$return['name_class'][] = 'eso';
		(empty($instance['name']['text_align'])) ?: $return['name_class'][] = $instance['name']['text_align'];
		(empty($instance['name']['text_transform'])) ?: $return['name_class'][] = $instance['name']['text_transform'];
		(empty($instance['name']['font_size'])) ?: $return['name_class'][] = $instance['name']['font_size'];
		(empty($instance['name']['font_weight'])) ?: $return['name_class'][] = $instance['name']['font_weight'];
		$return['name_visibility'] = $instance['name']['visibility'];

		// description
		$return['description_class'][] = 'eso';
		(empty($instance['description']['text_align'])) ?: $return['description_class'][] = $instance['description']['text_align'];
		(empty($instance['description']['text_transform'])) ?: $return['description_class'][] = $instance['description']['text_transform'];
		(empty($instance['description']['font_size'])) ?: $return['description_class'][] = $instance['description']['font_size'];
		(empty($instance['description']['font_weight'])) ?: $return['description_class'][] = $instance['description']['font_weight'];
		$return['description_visibility'] = $instance['description']['visibility'];

		// count
		$return['count_class'][] = 'eso';
		(empty($instance['count']['text_align'])) ?: $return['count_class'][] = $instance['count']['text_align'];
		(empty($instance['count']['text_transform'])) ?: $return['count_class'][] = $instance['count']['text_transform'];
		(empty($instance['count']['font_size'])) ?: $return['count_class'][] = $instance['count']['font_size'];
		(empty($instance['count']['font_weight'])) ?: $return['count_class'][] = $instance['count']['font_weight'];
		$return['count_label'] = !empty($instance['count']['label']) ? $instance['count']['label'] : '';
		$return['count_visibility'] = $instance['count']['visibility'];
		$return['count_visibility_label'] = $instance['count']['visibility_label'];

		// cover
		if ( $instance['settings']['layout'] == 'cover' || $instance['settings']['layout'] == 'cover_boxed' ) {

			$return['overlay_position_class'][] = 'eso';
			(empty($instance['cover']['position'])) ?: $return['overlay_position_class'][] = $instance['cover']['position'];
			(empty($instance['cover']['position_size'])) ?: $return['overlay_position_class'][] = $instance['cover']['position_size'];

			$return['overlay_class'][] = 'eso';
			(empty($instance['cover']['padding'])) ?: $return['overlay_class'][] = $instance['cover']['padding'];
			(empty($instance['cover']['border_radius'])) ?: $return['overlay_class'][] = $instance['cover']['border_radius'];

			if ( empty($instance['cover']['hide_name']) ) {
				$return['name_class'][] = 'uk-transition-opaque';
			}
			(empty($instance['cover']['name_transition'])) ?: $return['name_class'][] = $instance['cover']['name_transition'];

			if ( empty($instance['cover']['hide_count']) ) {
				$return['count_class'][] = 'uk-transition-opaque';
			}
			(empty($instance['cover']['count_transition'])) ?: $return['count_class'][] = $instance['cover']['count_transition'];

		}

		// overlay
		if ( $instance['settings']['layout'] == 'overlay' ) {

			$return['overlay_position_class'][] = 'eso';
			(empty($instance['overlay']['position'])) ?: $return['overlay_position_class'][] = $instance['overlay']['position'];
			(empty($instance['overlay']['position_size'])) ?: $return['overlay_position_class'][] = $instance['overlay']['position_size'];

			$return['overlay_class'][] = 'eso';
			(empty($instance['overlay']['padding'])) ?: $return['overlay_class'][] = $instance['overlay']['padding'];
			(empty($instance['overlay']['border_radius'])) ?: $return['overlay_class'][] = $instance['overlay']['border_radius'];

			if ( empty($instance['overlay']['hide_name']) ) {
				$return['name_class'][] = 'uk-transition-opaque';
			}
			(empty($instance['overlay']['name_transition'])) ?: $return['name_class'][] = $instance['overlay']['name_transition'];

			if ( empty($instance['overlay']['hide_count']) ) {
				$return['count_class'][] = 'uk-transition-opaque';
			}
			(empty($instance['overlay']['count_transition'])) ?: $return['count_class'][] = $instance['overlay']['count_transition'];

		}

		// wide
		if ( $instance['settings']['layout'] == 'wide' ) {

			if ( empty($instance['wide']['hide_name']) ) {
				$return['name_class'][] = 'uk-transition-opaque';
			}
			(empty($instance['wide']['name_transition'])) ?: $return['name_class'][] = $instance['wide']['name_transition'];

			if ( empty($instance['wide']['hide_count']) ) {
				$return['count_class'][] = 'uk-transition-opaque';
			}
			(empty($instance['wide']['count_transition'])) ?: $return['count_class'][] = $instance['wide']['count_transition'];

			if ( empty($instance['wide']['hide_description']) ) {
				$return['description_class'][] = 'uk-transition-opaque';
			}
			(empty($instance['wide']['description_transition'])) ?: $return['description_class'][] = $instance['wide']['description_transition'];

			$return['left_column_class'][] = 'eso';
			$return['right_column_class'][] = 'eso';

			if ( $instance['wide']['left_column'] == 'uk-width-1-2' ) {
				$return['left_column_class'][] = 'uk-width-1-2';
				$return['right_column_class'][] = 'uk-width-1-2';
			} elseif ( $instance['wide']['left_column'] == 'uk-width-1-3' ) {
				$return['left_column_class'][] = 'uk-width-1-3';
				$return['right_column_class'][] = 'uk-width-2-3';
			} elseif ( $instance['wide']['left_column'] == 'uk-width-1-4' ) {
				$return['left_column_class'][] = 'uk-width-1-4';
				$return['right_column_class'][] = 'uk-width-3-4';
			}

			$return['flex_class'][] = 'eso';
			$return['flex_child_class'][] = 'eso';

			if ( !empty($instance['wide']['flex_v']) ) {
				$return['flex_class'][] = 'uk-flex';
				$return['flex_class'][] = 'uk-flex-wrap';
				$return['flex_class'][] = 'uk-flex-row';
				$return['flex_class'][] = 'uk-flex-stretch';
				$return['flex_class'][] = $instance['wide']['flex_v'];
				$return['flex_child_class'][] = 'uk-width-1-1';
			}

		}

		return $return;

	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {

		$less_vars['name_color'] = isset( $instance['name']['color'] ) ? $instance['name']['color'] : false;
		$less_vars['name_padding'] = isset( $instance['name']['padding'] ) ? $instance['name']['padding'] : false;

		$less_vars['count_color'] = isset( $instance['count']['color'] ) ? $instance['count']['color'] : false;
		$less_vars['count_padding'] = isset( $instance['count']['padding'] ) ? $instance['count']['padding'] : false;

		$less_vars['description_color'] = isset( $instance['description']['color'] ) ? $instance['description']['color'] : false;
		$less_vars['description_padding'] = isset( $instance['description']['padding'] ) ? $instance['description']['padding'] : false;

		// badge
		if ( $instance['settings']['layout'] == 'badge' ) {
			$less_vars['badge_hover_text_color'] = isset( $instance['badge']['hover_text_color'] ) ? $instance['badge']['hover_text_color'] : false;
			$less_vars['badge_background_color'] = isset( $instance['badge']['background_color'] ) ? $instance['badge']['background_color'] : false;
			$less_vars['badge_hover_background_color'] = isset( $instance['badge']['hover_background_color'] ) ? $instance['badge']['hover_background_color'] : false;
		}

		// overlay
		if ( $instance['settings']['layout'] == 'overlay') {
			$less_vars['overlay_background_color'] = isset( $instance['overlay']['overlay_background_color'] ) ? $instance['overlay']['overlay_background_color'] : false;
			$less_vars['overlay_hover_background_color'] = isset( $instance['overlay']['overlay_hover_background_color'] ) ? $instance['overlay']['overlay_hover_background_color'] : false;
			$less_vars['overlay_hover_text_color'] = isset( $instance['overlay']['overlay_hover_text_color'] ) ? $instance['overlay']['overlay_hover_text_color'] : false;
		}

		// cover
		if ( $instance['settings']['layout'] == 'cover' || $instance['settings']['layout'] == 'cover_boxed' ) {

			$less_vars['tablet_breakpoint'] = siteorigin_panels_setting()['tablet-width'] . 'px';
			$less_vars['mobile_breakpoint'] = siteorigin_panels_setting()['mobile-width'] . 'px';

			$less_vars['desktop_height'] = isset( $instance['cover']['desktop_height'] ) ? $instance['cover']['desktop_height'] : false;
			$less_vars['tablet_height'] = isset( $instance['cover']['tablet_height'] ) ? $instance['cover']['tablet_height'] : false;
			$less_vars['mobile_height'] = isset( $instance['cover']['mobile_height'] ) ? $instance['cover']['mobile_height'] : false;

			$less_vars['overlay_background_color'] = isset( $instance['cover']['overlay_background_color'] ) ? $instance['cover']['overlay_background_color'] : false;
			$less_vars['overlay_hover_background_color'] = isset( $instance['cover']['overlay_hover_background_color'] ) ? $instance['cover']['overlay_hover_background_color'] : false;
			$less_vars['overlay_hover_text_color'] = isset( $instance['cover']['overlay_hover_text_color'] ) ? $instance['cover']['overlay_hover_text_color'] : false;
		}

		return $less_vars;

	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		$return = array();

		$return['settings'] = EsoWidgetFormCorePart::section('Settings', array(
			'category' => EsoWidgetFormCorePart::select('Product Category', 'Choose which category the box will be generated for.', '', EsoWidgetFormPart::get_wc_categoy_select_options()),
			'layout' => EsoWidgetFormCorePart::select('Layout', 'Choose a layout for the category box.', 'simple', array(
				'simple' => __('Simple', 'echelon-so'),
				'badge' => __('Badge', 'echelon-so'),
				'overlay' => __('Overlay' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
				'cover' => __('Cover' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
				'cover_boxed' => __('Cover Boxed' . EsoWidgetFormPart::prime_tag(), 'echelon-so'),
				'wide' => __('Wide' . EsoWidgetFormPart::prime_tag(), 'echelon-so' ),
			), array(

			), array(
				'callback' => 'select',
				'args' => array( 'layout' )
			)),
			'image_size' => EsoWidgetFormCorePart::image_size('Image Size', 'Choose the size of the image to use when generating the box.', 'ESO-720x900-Crop'),
			'image_transition' => EsoWidgetFormCorePart::select('Image Transition', 'Choose if a hover transition should be added to the boxes image.', '0', array(
				'0' => __('-', 'echelon-so'),
				'uk-transition-scale-up' => __('Scale Up', 'echelon-so')
			)),
		));

		$return['name'] = EsoWidgetFormCorePart::section('Name', array(
			'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the category name.', '1', 'Show', 'Hide'),
			'color' => EsoWidgetFormCorePart::color(),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'text_align' => EsoWidgetFormPart::uikit('text_align'),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'padding' => EsoWidgetFormCorePart::multi_measurement('Padding', 'Add padding to the name.', '10px 0px 0px 0px')
		));

		$return['count'] = EsoWidgetFormCorePart::section('Count', array(
			'visibility' => EsoWidgetFormPart::binary('Count Visibility', 'Show or hide the category count.', '1', 'Show', 'Hide'),
			'visibility_label' => EsoWidgetFormPart::binary('Label Visibility', 'Show or hide the category label.', '1', 'Show', 'Hide'),
			'label' => EsoWidgetFormCorePart::text('Label', 'The text label for the category count.', 'Products'),
			'color' => EsoWidgetFormCorePart::color(),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'text_align' => EsoWidgetFormPart::uikit('text_align'),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'padding' => EsoWidgetFormCorePart::multi_measurement('Padding', 'Add padding to the count.', '0px 0px 0px 0px')
		));

		$return['description'] = EsoWidgetFormCorePart::section('Description' . EsoWidgetFormPart::prime_tag(), array(
			'visibility' => EsoWidgetFormPart::binary('Visibility', 'Show or hide the category name.', '1', 'Show', 'Hide'),
			'color' => EsoWidgetFormCorePart::color(),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'text_align' => EsoWidgetFormPart::uikit('text_align'),
			'text_transform' => EsoWidgetFormPart::uikit('text_transform'),
			'padding' => EsoWidgetFormCorePart::multi_measurement('Padding', 'Add padding to the description.', '20px 0px 0px 0px')
		), array(
			'layout[wide]' => array( 'show' ),
			'_else[layout]' => array( 'hide' ),
		));

		$return['wide'] = EsoWidgetFormCorePart::section('Wide' . EsoWidgetFormPart::prime_tag(), array(
			'left_column' => EsoWidgetFormCorePart::select('Left Column Wtdth', 'How much space is taken by the left side image column.', 'uk-width-1-2', array(
				'0' => __('-', 'echelon-so'),
				'uk-width-1-4' => __('Quater', 'echelon-so'),
				'uk-width-1-3' => __('Third', 'echelon-so'),
				'uk-width-1-2' => __('Half', 'echelon-so')
			)),
			'flex_v' => EsoWidgetFormPart::uikit('flex_v', 'Content Alignemnt', 'How to arrange the category information vertically.'),
			'name_transition' => EsoWidgetFormPart::uikit('transition', 'Name Transition'),
			'hide_name' => EsoWidgetFormCorePart:: checkbox('Hide Name', 'Hide the category name until the transition is toggled.', false),
			'count_transition' => EsoWidgetFormPart::uikit('transition', 'Count Transition'),
			'hide_count' => EsoWidgetFormCorePart:: checkbox('Hide Count', 'Hide the category count until the transition is toggled.', false),
			'description_transition' => EsoWidgetFormPart::uikit('transition', 'Description Transition'),
			'hide_description' => EsoWidgetFormCorePart:: checkbox('Hide Description', 'Hide the category description until the transition is toggled.', false)
		), array(
			'layout[wide]' => array( 'show' ),
			'_else[layout]' => array( 'hide' ),
		));

		$return['badge'] = EsoWidgetFormCorePart::section('Badge', array(
			'hover_text_color' => EsoWidgetFormCorePart::color('Text Hover Color', '', EsoWidgetFormPart::default_color('inverse')),
			'background_color' => EsoWidgetFormPart::rgba('Background Color', '', EsoWidgetFormPart::default_color('overlay')),
			'hover_background_color' => EsoWidgetFormPart::rgba('Background Hover Color', '', EsoWidgetFormPart::default_color('overlay_hover')),
		), array(
			'layout[badge]' => array( 'show' ),
			'_else[layout]' => array( 'hide' ),
		));

		$return['overlay'] = EsoWidgetFormCorePart::section('Overlay' . EsoWidgetFormPart::prime_tag(), array(
			'overlay_background_color' => EsoWidgetFormPart::rgba('Overlay Color', 'The starting background color.', EsoWidgetFormPart::default_color('overlay')),
			'overlay_hover_background_color' => EsoWidgetFormPart::rgba('Overlay Hover Color', 'The starting background color.', EsoWidgetFormPart::default_color('overlay_hover')),
			'overlay_hover_text_color' => EsoWidgetFormCorePart::color('Text Hover Color', 'The starting colors are set in the Name and Count sections.', EsoWidgetFormPart::default_color('inverse')),
			'position' => EsoWidgetFormPart::uikit('position_nocover', '', 'The position for the overlay.' . EsoWidgetFormPart::required(), 'uk-position-bottom'),
			'position_size' => EsoWidgetFormPart::uikit('position_size'),
			'padding' => EsoWidgetFormPart::uikit('padding', '', '', 'uk-padding-small'),
			'border_radius' => EsoWidgetFormPart::uikit('border_radius_rounded'),
			'name_transition' => EsoWidgetFormPart::uikit('transition', 'Name Transition'),
			'hide_name' => EsoWidgetFormCorePart:: checkbox('Hide Name', 'Hide the category name until the transition is toggled.', false),
			'count_transition' => EsoWidgetFormPart::uikit('transition', 'Count Transition'),
			'hide_count' => EsoWidgetFormCorePart:: checkbox('Hide Count', 'Hide the category count until the transition is toggled.', false),
		), array(
			'layout[overlay]' => array( 'show' ),
			'_else[layout]' => array( 'hide' ),
		));

		$return['cover'] = EsoWidgetFormCorePart::section('Cover'. EsoWidgetFormPart::prime_tag(), array(
			'desktop_height' => EsoWidgetFormCorePart::measurement('Desktop Height', '', '200px'),
			'tablet_height' => EsoWidgetFormCorePart::measurement('Tablet Height', '', '200px'),
			'mobile_height' => EsoWidgetFormCorePart::measurement('Mobile Height', '', '200px'),
			'overlay_background_color' => EsoWidgetFormPart::rgba('Overlay Color', 'The starting background color.', EsoWidgetFormPart::default_color('overlay')),
			'overlay_hover_background_color' => EsoWidgetFormPart::rgba('Overlay Color', 'The starting background color.', EsoWidgetFormPart::default_color('overlay_hover')),
			'overlay_hover_text_color' => EsoWidgetFormCorePart::color('Hover Text Color', 'The starting colors are set in the Name and Count sections.', EsoWidgetFormPart::default_color('inverse')),
			'position' => EsoWidgetFormPart::uikit('position_nocover'),
			'position_size' => EsoWidgetFormPart::uikit('position_size'),
			'padding' => EsoWidgetFormPart::uikit('padding', '', '', 'uk-padding-small'),
			'border_radius' => EsoWidgetFormPart::uikit('border_radius_rounded'),
			'name_transition' => EsoWidgetFormPart::uikit('transition', 'Name Transition'),
			'hide_name' => EsoWidgetFormCorePart:: checkbox('Hide Name', 'Hide the category name until the transition is toggled.', false),
			'count_transition' => EsoWidgetFormPart::uikit('transition', 'Count Transition'),
			'hide_count' => EsoWidgetFormCorePart:: checkbox('Hide Count', 'Hide the category count until the transition is toggled.', false),
		), array(
			'layout[cover]' => array( 'show' ),
			'layout[cover_boxed]' => array( 'show' ),
			'_else[layout]' => array( 'hide' ),
		));

		return $return;

	}

}

siteorigin_widget_register('eso-product-category-box', __FILE__, 'EchelonSOProductCategoryBox');
