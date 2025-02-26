<?php
namespace tmc\acfptf\src\Components;

/**
 * @author jakubkuranda@gmail.com
 * Date: 22.08.2018
 * Time: 15:40
 */

use shellpress\v1_2_9_1\src\Shared\Components\IComponent;
use WP_Post_Type;

class Utility extends IComponent {

	/**
	 * Called on creation of component.
	 *
	 * @return void
	 */
	protected function onSetUp() {

		//  TODO

	}

	/**
	 * Returns array of post type labels keyed with names ( slugs ).
	 *
	 * @param array $args - get_post_types( $args ) argument.
	 * @param string $operator - 'and'/'or'
	 *
	 * @return array - postTypeSlug => postTypeLabel
	 */
	public function getPostTypesNames( $args = array(), $operator = 'and' ) {

		$postTypesObjs = get_post_types( $args, 'object', $operator );   /** @var WP_Post_Type[] $postTypesObjs */

		$names = array();

		foreach( $postTypesObjs as $postTypeObj ){
			$names[ $postTypeObj->name ] = $postTypeObj->label;
		}

		return (array) $names;

	}

}