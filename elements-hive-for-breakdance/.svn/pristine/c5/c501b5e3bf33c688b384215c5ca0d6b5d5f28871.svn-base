<?php

namespace ElementsHiveForBreakdance\Extensions\MouseCursors\MagneticMouseCursor;

use function Breakdance\Elements\control;
use function Breakdance\Elements\c;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'magnetic_cursor',
		'Magnetic Cursor',
		[
			controlSection(
				'outer_container',
				'Outer Container',
				[
					control('stroke_size', 'Stroke Size', [
						'type' => 'number',
						'layout' => 'inline',
						'rangeOptions' => [
							'min' => 1,
							'max' => 10,
							'step' => 0.1,
						],
					],
					),
					control('width', 'Width', [
						'type' => 'unit',
						'layout' => 'inline',
						'unitOptions' => ['types' => ['px']],
						'rangeOptions' => [
							'min' => 25,
							'max' => 200,
							'step' => 1,
						],
					],
					),
					control('height', 'Height', [
						'type' => 'unit',
						'layout' => 'inline',
						'unitOptions' => ['types' => ['px']],
						'rangeOptions' => [
							'min' => 25,
							'max' => 200,
							'step' => 1,
						],
					],
					),
					control('border_radius', 'Border Radius', [
						'type' => 'unit',
						'layout' => 'inline',
						'unitOptions' => ['types' => ['px']],
						'rangeOptions' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					),
					control(
						'color',
						'Color',
						[
							'type' => 'color',
							'layout' => 'vertical',
							'colorOptions' => [ 'type' => 'solidOnly' ],
						]
					)
				],
				[],
				'popout'
			),
			controlSection(
				'inner_container',
				'Inner Container',
				[
					control('width', 'Width', [
						'type' => 'unit',
						'layout' => 'inline',
						'unitOptions' => ['types' => ['px']],
						'rangeOptions' => [
							'min' => 25,
							'max' => 200,
							'step' => 1,
						],
					],
					),
					control('height', 'Height', [
						'type' => 'unit',
						'layout' => 'inline',
						'unitOptions' => ['types' => ['px']],
						'rangeOptions' => [
							'min' => 25,
							'max' => 200,
							'step' => 1,
						],
					],
					),
					control('border_radius', 'Border Radius', [
						'type' => 'unit',
						'layout' => 'inline',
						'unitOptions' => ['types' => ['px']],
						'rangeOptions' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					),
					control(
						'background_color',
						'Background Color',
						[
							'type' => 'color',
							'layout' => 'vertical',
							'colorOptions' => [ 'type' => 'solidAndGradient' ],
						]
					),
				],
				[],
				'popout'
			),
			control('z_index', 'Z-index', [
				'type' => 'number',
			]),
			control(
				'apply_to_page',
				'Apply to whole page',
				[
					'type' => 'toggle',
				]
			),
			c(
				'additional_selectors',
				'Additional Selectors',
				[
					control('selector', 'Selector', [ 'type' => 'text'])
				],
				['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{selector}', 'defaultTitle' => 'CSS Class or ID', 'buttonName' => 'Add Selector']],
				false,
            	false
			)
		],
		[
			'condition' => ['path' => 'design.elements_hive.mouse_cursors.cursor_type', 'operand' => 'equals', 'value' => 'magnetic_cursor'],
			'isExternal' => true,
		],
		'popout'
	);
}
