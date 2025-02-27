<?php

namespace NMGR\Blocks;

use NMGR\Blocks\Block;

defined( 'ABSPATH' ) || exit;

class Search extends Block {

	/**
	 * Set block attributes here rather than in block.json so that we can do the attribute translations
	 * in php for both the lite and pro versions at the same time rather than doing it in the edit.js file
	 * which requires more code.
	 */
	public static function metadata() {
		$texts = \NMGR\Lib\WidgetSearch::get_form_fields();

		return [
			'attributes' => [
				"hide_form" => [
					"type" => "boolean"
				],
				"show_results" => [
					"type" => "boolean"
				],
				"show_results_if_no_search_query" => [
					"type" => "boolean"
				],
				"input_placeholder" => [
					"type" => "string",
					'default' => $texts[ 'input_placeholder' ][ 'default' ],
				],
				"submit_button_text" => [
					"type" => "string",
					'default' => $texts[ 'submit_button_text' ][ 'default' ],
				],
				"form_action" => [
					"type" => "string",
					'default' => $texts[ 'form_action' ][ 'default' ],
				]
			],
		];
	}

	public static function rest_response( $request ) {
		$texts = \NMGR\Lib\WidgetSearch::get_form_fields();
		$texts[ 'settings' ] = self::settings_text();

		return rest_ensure_response( [
			'text' => $texts,
			'template' => self::template( $request->get_params() )
			] );
	}

	public static function template( $attributes ) {
		$template_args = array(
			'show_form' => empty( $attributes[ 'hide_form' ] ) ? 1 : 0,
			'show_results_if_no_search_query' => empty( $attributes[ 'show_results_if_no_search_query' ] ) ? 0 : 1,
			'show_results' => empty( $attributes[ 'show_results' ] ) ? 0 : 1,
			'input_required' => empty( $attributes[ 'input_required' ] ) ? 0 : 1,
			'input_placeholder' => empty( $attributes[ 'input_placeholder' ] ) ? '' : $attributes[ 'input_placeholder' ],
			'submit_button_text' => empty( $attributes[ 'submit_button_text' ] ) ? '' : $attributes[ 'submit_button_text' ],
			'form_action' => empty( $attributes[ 'form_action' ] ) ? '' : $attributes[ 'form_action' ],
		);

		return \NMGR\Lib\Archive::get_search_template( $template_args );
	}

}
