<?php

/*
Widget Name: E: Count Query Result
Description: Display the count from a posts query.
Author: Echelon
Author URI: https://echelonso.com
Documentation: https://echelonso.com/widgets/count-query-result/
*/

class EchelonSOEsoCountQueryResult extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-count-query-result',
			__('E: Count Query Result', 'echelon-so' ),
			array(
				'description' => __('Display the count from a posts query.', 'echelon-so' ),
				'help' => 'https://echelonso.com/widgets/count-query-result/',
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
		$return = array();

		// the query to count
		$post_selector_pseudo_query = $instance['query'];
		$processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );
		$query_result = new WP_Query( $processed_query );
		if ($query_result->have_posts()) {
			$return['found_posts'] = $query_result->found_posts;
		} else {
			$return['found_posts'] = false;
		}

		// class
		$return['class'] = array();
		(empty($instance['appearance']['font_size'])) ?: $return['class'][] = $instance['appearance']['font_size'];
		(empty($instance['appearance']['font_weight'])) ?: $return['class'][] = $instance['appearance']['font_weight'];
		(empty($instance['appearance']['text_align'])) ?: $return['class'][] = $instance['appearance']['text_align'];

		return $return;
	}

	/*
	* Less Variables
	*/

	function get_less_variables($instance) {
		$return = array();
		if ( isset($instance['appearance']) ) {
			$less_vars['color'] = !empty( $instance['appearance']['color'] ) ? $instance['appearance']['color'] : false;
		}
		return $less_vars;
	}

	/**
	* Widget Form
	*/

	function get_widget_form() {
		$return['query'] = EsoWidgetFormCorePart::posts('Count This Query');
		$return['appearance'] = EsoWidgetFormCorePart::Section('Appearance', array(
			'color' => EsoWidgetFormCorePart::color('Color', 'The color for the results text.', EsoWidgetFormPart::default_color('primary')),
			'font_size' => EsoWidgetFormPart::uikit('font_size'),
			'font_weight' => EsoWidgetFormPart::uikit('font_weight'),
			'text_align' => EsoWidgetFormPart::uikit('text_align')
		));
		return $return;
	}

	/*
	* Instance modifications
	* The form changes over time
	*/

	function modify_instance( $instance )  {
		// update 2.1.0
		if ( isset( $instance['count_query_result']['query'] ) ) {
			$instance['query'] = $instance['count_query_result']['query'];
			unset($instance['count_query_result']['query']);
		}
		if ( isset( $instance['count_query_result']['font'] ) ) {
			$instance['appearance']['font'] = $instance['count_query_result']['font'];
			unset($instance['count_query_result']['font']);
		}
		if ( isset( $instance['modifiers']['size'] ) ) {
			$instance['appearance']['font_size'] = $instance['modifiers']['size'];
			unset($instance['modifiers']['size']);
		}
		if ( isset( $instance['modifiers']['weight'] ) ) {
			$instance['appearance']['font_weight'] = $instance['modifiers']['weight'];
			unset($instance['modifiers']['weight']);
		}
		if ( isset( $instance['modifiers']['alignment'] ) ) {
			$instance['appearance']['text_align'] = $instance['modifiers']['alignment'];
			unset($instance['modifiers']['alignment']);
		}
		// end 2.1.0
		return $instance;
	}

}

siteorigin_widget_register('echelonso-eso-count-query-result', __FILE__, 'EchelonSOEsoCountQueryResult');
