<?php

use CounterBox\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	'width' => [
		'type'  => 'number',
		'title' => __( 'Width', 'counter-box' ),
		'val'   => '30',
		'addon' => [
			'type' => 'select',
			'name' => 'width_unit',
			'atts' => [
				'auto' => __( 'auto', 'counter-box' ),
				'px'   => __( 'px', 'counter-box' ),
			],
		],
	],

	'height' => [
		'type'  => 'number',
		'title' => __( 'Height', 'counter-box' ),
		'val'   => '30',
		'addon' => [
			'type' => 'select',
			'name' => 'height_unit',
			'atts' => [
				'auto' => __( 'auto', 'counter-box' ),
				'px'   => __( 'px', 'counter-box' ),
			],
		],
	],

	'background' => [
		'type'  => 'text',
		'title' => __( 'Background', 'counter-box' ),
		'val'   => 'rgba(255, 255, 255, 0)',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'border_radius' => [
		'type'  => 'number',
		'title' => __( 'Border Radius', 'counter-box' ),
		'val'   => 0,
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
		'addon' => 'px',
	],

	'border_style' => [
		'type'  => 'select',
		'title' => __( 'Border Style', 'counter-box' ),
		'atts'  => [
			'none'   => __( 'None', 'counter-box' ),
			'solid'  => __( 'Solid', 'counter-box' ),
			'dotted' => __( 'Dotted', 'counter-box' ),
			'dashed' => __( 'Dashed', 'counter-box' ),
			'double' => __( 'Double', 'counter-box' ),
			'groove' => __( 'Groove', 'counter-box' ),
			'inset'  => __( 'Inset', 'counter-box' ),
			'outset' => __( 'Outset', 'counter-box' ),
			'ridge'  => __( 'Ridge', 'counter-box' ),
		],
	],

	'border_width' => [
		'type'  => 'number',
		'title' => __( 'Border Thickness', 'counter-box' ),
		'val'   => 1,
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
		'addon' => 'px',
	],

	'border_color' => [
		'type'  => 'text',
		'title' => __( 'Border Color', 'counter-box' ),
		'val'   => 'rgba(255, 255, 255, 0)',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],


];