<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'backgrounds',
		'Backgrounds',
		[
			control(
				'background_type',
				'Background Type',
				[
					'type' => 'dropdown',
					'layout' => 'inline',
					'items' => [
						'0' => ['text' => 'WebGL Fluid', 'value' => 'webgl_fluid'],
						'1' => ['text' => 'WebGL Slideshow', 'value' => 'webgl_slideshow'],
						'2' => ['text' => 'WebGL Kinetic Typography', 'value' => 'webgl_kinetic_typography'],
					],
				],
			),
			\ElementsHiveForBreakdance\Extensions\Backgrounds\WebglFluid\controls(),
			\ElementsHiveForBreakdance\Extensions\Backgrounds\WebglSlideshow\controls(),
			\ElementsHiveForBreakdance\Extensions\Backgrounds\WebglKineticTypography\controls(),
		],
		[ 'isExternal' => true ],
		'popout'
	);
}

