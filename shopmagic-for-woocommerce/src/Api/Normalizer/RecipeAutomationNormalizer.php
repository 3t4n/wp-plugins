<?php
declare(strict_types=1);

namespace WPDesk\ShopMagic\Api\Normalizer;

use WPDesk\ShopMagic\Recipe\RecipeAutomation;

class RecipeAutomationNormalizer extends WorkflowAutomationNormalizer {

	public function normalize( object $object ): array {
		if ( $object instanceof RecipeAutomation ) {
			return array_merge(
				parent::normalize( $object ),
				[ 'meta' => $object->get_meta() ]
			);
		}

		return parent::normalize( $object );
	}
}
