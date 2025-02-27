<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglSlideshow;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'webgl_slideshow',
		'WebGL Slideshow',
		[
			controlSection(
				'images',
				'Images',
				[
					control(
						'images',
						'Images',
						[
							'type' => 'wpmedia',
							'layout' => 'vertical',
							'mediaOptions' => [
								'multiple' => true
							],
							'relativeDynamicPropertyPaths' => [
								[
									'0' => [
										'accepts' => 'gallery',
									'path' => 'design.elements_hive.backgrounds.webgl_slideshow.images',
									],
								],
							],
						],
					),
				],
				[],
				'popout'
			),
			controlSection(
				'effects',
				'Effects',
				[
					control(
						'effect',
						'Effect',
						['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'blend-wave', 'text' => 'Blend Wave'], '1' => ['text' => 'Blobs', 'value' => 'blobs'], '2' => ['text' => 'Circular Mask', 'value' => 'circular-mask'], '3' => ['text' => 'Color Mix', 'value' => 'color-mix']]],
					),
					control(
						'direction',
						'Direction',
						['type' => 'dropdown', 'layout' => 'vertical', 'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.effect', 'operand' => 'equals', 'value' => 'blend-wave'] ], '1' => [ '0' => ['path' => '%%CURRENTPATH%%.effect', 'operand' => 'equals', 'value' => 'circular-mask'] ]], 'items' => ['0' => ['value' => '0', 'text' => 'Center'], '1' => ['text' => 'Left', 'value' => '1'], '2' => ['text' => 'Right', 'value' => '2'], '3' => ['text' => 'Top', 'value' => '3'], '4' => ['text' => 'Bottom', 'value' => '4'], '5' => ['text' => 'Top Left', 'value' => '5'], '6' => ['text' => 'Top Right', 'value' => '6'], '7' => ['text' => 'Bottom Right', 'value' => '7'], '8' => ['text' => 'Bottom Left', 'value' => '8']]],
					),
					control(
						'invert',
						'Invert',
						['type' => 'toggle', 'layout' => 'vertical', 'condition' => [ '0' => [ '0' => ['path' => '%%CURRENTPATH%%.effect', 'operand' => 'equals', 'value' => 'circular-mask'] ] ]],
					),
					control(
						'scale',
						'Scale',
						['type' => 'unit', 'layout' => 'vertical', 'unitOptions' => [ 'types' => [ '0' => 'custom' ] ], 'rangeOptions' => ['min' => 0, 'max' => 10, 'step' => 0.1], 'condition' => [ '0' => [ '0' => ['path' => '%%CURRENTPATH%%.effect', 'operand' => 'equals', 'value' => 'blobs'] ] ]],
					),
					control(
						'blur_level',
						'Blur Level',
						['type' => 'unit', 'layout' => 'vertical', 'unitOptions' => [ 'types' => [ '0' => 'custom' ] ], 'rangeOptions' => ['min' => 0, 'max' => 1, 'step' => 0.1], 'condition' => [ '0' => [ '0' => ['path' => '%%CURRENTPATH%%.effect', 'operand' => 'equals', 'value' => 'blobs'] ] ]],
					),
				],
				[],
				'popout'
			),
			controlSection(
				'timing',
				'Timing',
				[
					control(
						'transition_duration',
						'Transition Duration',
						['type' => 'unit', 'layout' => 'vertical', 'unitOptions' => [ 'types' => [ '0' => 'ms' ] ]],
					),
					control(
						'transition_interval',
						'Transition Interval',
						['type' => 'unit', 'layout' => 'vertical', 'unitOptions' => [ 'types' => [ '0' => 'ms' ] ]],
					),
				],
				[ 'isExternal' => true ],
				'popout'
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
			'condition' => ['path' => 'design.elements_hive.backgrounds.background_type', 'operand' => 'equals', 'value' => 'webgl_slideshow'],
			'isExternal' => true,
		],
		'popout'
	);
}
