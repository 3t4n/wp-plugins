<?php

declare( strict_types=1 );

namespace WPDesk\ShopMagic\Recipe;

use WPDesk\ShopMagic\Workflow\Automation\AutomationFiltersGroup;
use WPDesk\ShopMagic\Workflow\Extensions\ExtensionsSet;
use WPDesk\ShopMagic\Workflow\FieldValuesBag;

/**
 * Converts recipe JSON file to automation object.
 * May also be used to convert old automation JSON to newer one.
 */
class RecipeConverter {

	private ExtensionsSet $extensions;

	public function __construct( ExtensionsSet $extensions ) {
		$this->extensions = $extensions;
	}

	public function to_automation( array $decoded ): RecipeAutomation {
		$as_automation = new RecipeAutomation();
		$as_automation->set_status( 'draft' );
		$as_automation->set_name( $decoded['name'] );
		$as_automation->set_description( $decoded['description'] );

		$event = $this->extensions->get_event( $decoded['event']['slug'] );
		$event->set_parameters( new FieldValuesBag( $decoded['event']['data'] ) );
		$as_automation->set_event( $event );

		$as_automation->set_actions(
			array_map(
				function ( $action_data ) {
					$action = $this->extensions->get_action( $action_data['_action'] );
					$action->set_parameters( new FieldValuesBag( $action_data ) );

					return $action;
				},
				$decoded['actions']
			)
		);

		if ( ! empty( $decoded['filters'] ) ) {
			$as_automation->set_filters_group(
				new AutomationFiltersGroup(
					array_map(
						function ( $outer_group ) {
							return array_map(
								function ( $inner_group ) {
									$filter = $this->extensions->get_filter( $inner_group['filter_slug'] );
									$filter->set_parameters( new FieldValuesBag( $inner_group['data'] ) );

									return $filter;
								},
								array_values( $outer_group ?? [] )
							);
						},
						array_values( $decoded['filters'] )
					)
				)
			);
		} else {
			$as_automation->set_filters_group( new AutomationFiltersGroup() );
		}

		$as_automation->set_recipe( true );

		$as_automation->set_meta( $decoded['meta'] ?? [] );

		return $as_automation;
	}
}
