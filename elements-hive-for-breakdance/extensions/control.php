<?php

namespace ElementsHiveForBreakdance\Extensions;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

add_filter( 'breakdance_element_controls', 'ElementsHiveForBreakdance\Extensions\addControls', 69, 2 );


/**
 * @param Control[] $controls
 * @param Element   $element
 * @return Control[]
 */
function addControls( $controls, $element ) {
	$slug = $element->slug();

	/**
	 * Sections Extensions
	 */
	if ( 'EssentialElements\\Section' === $slug ) {

		$controls['designSections'][] = controlSection(
			'elements_hive',
			'Elements Hive',
			[
				\ElementsHiveForBreakdance\Extensions\Backgrounds\controls(),
				\ElementsHiveForBreakdance\Extensions\MouseCursors\controls(),
				\ElementsHiveForBreakdance\Extensions\Backlight\controls(),

			],
			[ 'isExternal' => true ]
		);
	} else {
		$controls['designSections'][] = controlSection(
			'elements_hive',
			'Elements Hive',
			[
				\ElementsHiveForBreakdance\Extensions\Backlight\controls(),

			],
			[ 'isExternal' => true ]
		);
	}

	/** @var Control[] $controls */
	return $controls;
}


