<?php

namespace ElementsHiveForBreakdance\Extensions\Backgrounds\WebglKineticTypography;

use function Breakdance\Elements\control;
use function Breakdance\Elements\controlSection;

/**
 * @return Control
 */
function controls() {
	/** @var Control */
	return controlSection(
		'webgl_kinetic_typography',
		'WebGL Kinetic Typography',
		[
			controlSection(
				'shape',
				'Shape',
				[
					control(
						'shape_type',
						'Shape Type',
						[
							'type' => 'dropdown',
							'layout' => 'inline',
							'items' => [
								'0' => ['text' => 'Box', 'value' => 'box'],
								'1' => ['text' => 'Plane Square', 'value' => 'plane_square'],
								'2' => ['text' => 'Plane Rectangle', 'value' => 'plane_rectangle'],
								'3' => ['text' => 'Sphere', 'value' => 'sphere'],
								'4' => ['text' => 'Torus', 'value' => 'torus'],
								'5' => ['text' => 'Torus Knot', 'value' => 'knot'],
								'6' => ['text' => 'Torus Knot 2', 'value' => 'knot_2'],
								'7' => ['text' => 'Rectangle', 'value' => 'rectangle'],
							],
						]
					),
					// control(
					// 	'isScallable',
					// 	'Enable auto-scale',
					// 	[
					// 		'type' => 'toggle',
					// 	],
					// ),
					// control(
					// 	'scale_factor',
					// 	'Scale Factor',
					// 	[
					// 		'type' => 'number',
					// 		'rangeOptions' => [
					// 			'min' => 0.1,
					// 			'max' => 3.2,
					// 			'step' => 0.1,
					// 		],
					// 		'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.isScallable', 'operand' => 'equals', 'value' => true] ] ],
					// 	]
					// ),
					controlSection(
						'image',
						'Image',
						[
						control(
							'texture',
							'Texture',
							['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => [ 'multiple' => false ]],
						),
						control(
							'repeat_x',
							'Repeat Horizontal',
							[
								'type' => 'number',
								'rangeOptions' =>
								[
									'min' => 1,
									'max' => 30,
									'step' => 1,
								],
							]
						),
						control(
							'repeat_y',
							'Repeat Vertical',
							[
								'type' => 'number',
								'rangeOptions' =>
								[
									'min' => 1,
									'max' => 30,
									'step' => 1,
								],
							]
						),
					],
					[],
					'popout',
				),
				controlSection(
					'image_animation',
					'Image Animation',
					[
						control(
							'enable',
							'Animate Image',
							[
								'type' => 'toggle',
							]
						),
						control(
							'axis',
							'Axis',
							[
								'type' => 'dropdown',
								'layout' => 'inline',
								'items' => [
									'0' => ['text' => 'Horizontal', 'value' => 0],
									'1' => ['text' => 'Vertical', 'value' => 1],
								],
								'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
							]
						),
						control(
							'direction',
							'Direction',
							[
								'type' => 'dropdown',
								'layout' => 'inline',
								'items' => [
									'0' => ['text' => 'Forward', 'value' => -1],
									'1' => ['text' => 'Backward', 'value' => 1],
								],
								'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
							]
						),
						control(
							'speed',
							'Speed',
							[
								'type' => 'number',
								'rangeOptions' =>
								[
									'min' => 0.1,
									'max' => 5,
									'step' => 0.1,
								],
								'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
							],
						),
					],
					[ 'isExternal' => true ],
					'popout'
				),
				controlSection(
					'transform',
					'Transform',
					[
						control(
							'position',
							'Position',
							[
								'type' => 'focus_point',
								'layout' => 'vertical',
							]
						),
						control(
							'rotation_x',
							'Rotation on X Axis',
							[
								'type' => 'unit',
								'layout' => 'inline',
								'unitOptions' => ['types' => ['deg']],
								'rangeOptions' =>
								[
									'min' => 0,
									'max' => 360,
									'step' => 1,
								],
							]
						),
						control(
							'rotation_y',
							'Rotation on Y Axis',
							[
								'type' => 'unit',
								'layout' => 'inline',
								'unitOptions' => ['types' => ['deg']],
								'rangeOptions' =>
								[
									'min' => 0,
									'max' => 360,
									'step' => 1,
								],
							]
						),
						control(
							'rotation_z',
							'Rotation on Z Axis',
							[
								'type' => 'unit',
								'layout' => 'inline',
								'unitOptions' => ['types' => ['deg']],
								'rangeOptions' =>
								[
									'min' => 0,
									'max' => 360,
									'step' => 1,
								],
							]
						),
					],
					[],
					'popout'
				),
				],
				[],
				'popout'
			),
			control(
				'camera_zoom',
				'Camera Zoom',
				[
					'type' => 'number',
					'rangeOptions' =>
					[
						'min' => 0,
						'max' => 30,
						'step' => 0.1,
					],
				],
				true,
			),
			controlSection(
				'effects',
				'Effects',
				[
					controlSection(
						'displacement',
						'Displacement',
						[
							control(
								'enable',
								'Enable',
								[
									'type' => 'toggle',
								]
							),
							control(
								'strength',
								'Strength Factor',
								[
									'type' => 'number',
									'rangeOptions' =>
									[
										'min' => 0,
										'max' => 2,
										'step' => 1,
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
							control(
								'speed',
								'Speed Factor',
								[
									'type' => 'number',
									'rangeOptions' =>
									[
										'min' => 0,
										'max' => 1,
										'step' => 0.1,
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
						],
						[ 'isExternal' => true ],
						'popout'
					),
					controlSection(
						'swirl',
						'Swirl',
						[
							control(
								'enable',
								'Enable',
								[
									'type' => 'toggle',
								]
							),
							control(
								'direction',
								'Direction',
								[
									'type' => 'dropdown',
									'layout' => 'inline',
									'items' =>
									[
										'0' => ['text' => 'Forward', 'value' => '1'],
										'1' => ['text' => 'Backward', 'value' => '-1'],
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
							control(
								'factor',
								'Swirl Factor',
								[
									'type' => 'number',
									'rangeOptions' =>
									[
										'min' => 0,
										'max' => 10,
										'step' => 0.1,
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
						],
						[ 'isExternal' => true ],
						'popout'
					),
					controlSection(
						'twist',
						'Twist',
						[
							control(
								'enable',
								'Enable',
								[
									'type' => 'toggle',
								]
							),
							control(
								'factor',
								'Twist Factor',
								[
									'type' => 'number',
									'rangeOptions' =>
									[
										'min' => 0,
										'max' => 5,
										'step' => 0.1,
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
						],
						[ 'isExternal' => true ],
						'popout'
					),
					controlSection(
						'wave',
						'Wave',
						[
							control(
								'enable',
								'Enable',
								[
									'type' => 'toggle',
								],
							),
							control(
								'shadow',
								'Enable Ripple Shadow',
								[
									'type' => 'toggle',
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								],
							),
							control(
								'frequency',
								'Frequency',
								[
									'type' => 'number',
									'rangeOptions' =>
									[
										'min' => 0,
										'max' => 10,
										'step' => 0.1,
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
							control(
								'amplitude',
								'Amplitude',
								[
									'type' => 'number',
									'rangeOptions' =>
									[
										'min' => 0,
										'max' => 1,
										'step' => 0.01,
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
							control(
								'speed',
								'Speed',
								[
									'type' => 'number',
									'rangeOptions' =>
									[
										'min' => 0,
										'max' => 1,
										'step' => 0.1,
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
						],
						[ 'isExternal' => true ],
						'popout'
					),
					controlSection(
						'fog',
						'Fog',
						[
							control(
								'enable',
								'Enable',
								[
									'type' => 'toggle',
								]
							),
							control(
								'color',
								'Color',
								[
									'type' => 'color',
									'colorOptions' => [ 'type' => 'solidOnly' ],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
							control(
								'factor',
								'Intensity ',
								[
									'type' => 'number',
									'rangeOptions' =>
									[
										'min' => 0,
										'max' => 5,
										'step' => 0.1,
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								],
							),
						],
						[],
						'popout'
					),
					controlSection(
						'fresnel',
						'Fresnel',
						[
							control(
								'enable',
								'Enable',
								[
									'type' => 'toggle',
								]
							),
							control(
								'color',
								'Color',
								[
									'type' => 'color',
									'colorOptions' => [ 'type' => 'solidOnly' ],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
							control(
								'factor',
								'Intensity ',
								[
									'type' => 'number',
									'rangeOptions' =>
									[
										'min' => 0,
										'max' => 5,
										'step' => 0.1,
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								],
							),
						],
						[],
						'popout'
					),
					controlSection(
						'mouse',
						'Mouse Follow',
						[
							control(
								'enable',
								'Enable',
								[
									'type' => 'toggle',
								]
							),
							control(
								'factor',
								'Distance Factor',
								[
									'type' => 'number',
									'rangeOptions' =>
									[
										'min' => 0,
										'max' => 30,
										'step' => 1,
									],
									'condition' => ['0' => [ '0' => ['path' => '%%CURRENTPATH%%.enable', 'operand' => 'equals', 'value' => true] ] ],
								]
							),
						],
						[ 'isExternal' => true ],
						'popout',
					)
				],
				[ 'isExternal' => true ],
				'popout'
			),
			control(
				'apply_to_page',
				'Apply to whole page',
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
			'condition' => ['path' => 'design.elements_hive.backgrounds.background_type', 'operand' => 'equals', 'value' => 'webgl_kinetic_typography'],
			'isExternal' => true,
		],
		'popout'
	);
}
