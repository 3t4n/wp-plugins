<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglFluid;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'webgl_fluid',
		'WebGL Fluid',
		[
			control(
				'relative_to',
				'Relative To',
				[
					'type' => 'dropdown',
					'layout' => 'inline',
					'items' => [
						'0' => ['text' => 'Section', 'value' => 'section'],
						'1' => ['text' => 'Page', 'value' => 'page'],
					],
				]
			),
			control(
				'color_type',
				'Color Type',
				[
					'type' => 'dropdown',
					'layout' => 'inline',
					'items' => [
						'0' => ['text' => 'Colorful', 'value' => 'colorful'],
						'1' => ['text' => 'Random', 'value' => 'random'],
						'2' => ['text' => 'Custom', 'value' => 'custom'],
					],
				]
			),
			control(
				'color',
				'Color',
				[
					'type' => 'color',
					'layout' => 'vertical',
					'colorOptions' => [ 'type' => 'solidOnly' ],
					'condition' => ['path' => '%%CURRENTPATH%%.color_type', 'operand' => 'equals', 'value' => 'custom'],
				]
			),
			control('splat_radius', 'Radius', [
				'type' => 'number',
				'rangeOptions' => [
					'min' => 0.1,
					'max' => 1,
					'step' => 0.1,
				],
			]),
			control(
				'immediate',
				'Draw on Load',
				[
					'type' => 'toggle',
				]
			),
			control(
				'bloom',
				'Bloom',
				[
					'type' => 'toggle',
				]
			),
			control(
				'sunrays',
				'Sunrays',
				[
					'type' => 'toggle',
				]
			),
			control(
				"disable_on_touch_devices",
        		"Disable on Touch Devices",
				[
					'type' => 'toggle',
				]
			),
			control(
				"infobox",
				"Infobox",
				[
					'type' => 'alert_box',
					'layout' => 'vertical',
					'alertBoxOptions' => [
						'style' => 'warning',
						'content' => '<p>Will not load on touch-enabled devices like tablets and mobiles.</p>'
					]
				],
			),
		],
		[
			'condition' => ['path' => 'design.elements_hive.backgrounds.background_type', 'operand' => 'equals', 'value' => 'webgl_fluid'],
			'isExternal' => true,
		],
		'popout'
	);
}
