<?php

/*
Widget Name: E: Lightbox Gallery
Description: Builder based Lightbox Galleries (uses Lightbox Components).
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/lightbox-gallery/
*/

class EchelonSOEsoLightboxGallery extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-lightbox-gallery',
			__('E: Lightbox Gallery', 'echelon-so'),
			array(
				'description' => __('Builder based Lightbox Galleries (uses Lightbox Components).', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/lightbox-gallery/',
				'panels_groups' => array('eso'),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {
		$return['lightbox'] = !empty($instance['lightbox_gallery']['lightbox']) ? $instance['lightbox_gallery']['lightbox'] : '';
		$return['animation'] = 'slide';
		return $return;
	}

	/*
	* Widgert Form
	*/

	function get_widget_form() {

		$return['lightbox_gallery'] = EsoWidgetFormCorePart::section('Settings', array(
			'lightbox' => EsoWidgetFormCorePart::builder('Gallery Layout', 'Build the gallery with E: Lightbox Component Image widgets.' . EsoWidgetFormPart::important()),
			'animation' => EsoWidgetFormCorePart::select('Animation', 'Which animation should be used when changing images.', 'slide', array(
				'slide' => __('Slide', EsoWidgetFormCorePart::text_domain()),
				'fade' => __('Fade' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormCorePart::text_domain()),
				'scale' => __('Scale' . EsoWidgetFormPart::prime_tag(), EsoWidgetFormCorePart::text_domain()),
			))
		));

		return $return;

	}

}

siteorigin_widget_register('echelonso-eso-lightbox-gallery', __FILE__, 'EchelonSOEsoLightboxGallery');
