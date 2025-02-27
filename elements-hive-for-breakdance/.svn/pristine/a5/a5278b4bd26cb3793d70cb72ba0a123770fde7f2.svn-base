<?php

namespace ElementsHiveForBreakdance\Extensions\Backlight;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'backlight',
		'Backlight',
		[
			control(
				'enabled',
				'Enabled',
				[
					'type' => 'toggle',
					'layout' => 'inline',
				],
			),
			control(
				'blur',
				'Blur Level',
				[
					'type' => 'number',
					'layout' => 'inline',
					'rangeOptions' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
					'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'equals', 'value' => true] ] ],
				],
			),
			control(
				'saturation',
				'Saturation Level',
				[
					'type' => 'number',
					'layout' => 'inline',
					'rangeOptions' => [
						'min' => 1,
						'max' => 4,
						'step' => 0.1,
					],
					'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enabled', 'operand' => 'equals', 'value' => true] ] ],
				],
			),
		],
		[ 'isExternal' => true ],
		'popout'
	);
}

