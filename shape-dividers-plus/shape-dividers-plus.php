<?php
/*
Plugin Name: Shape Dividers Plus
Plugin URI: https://mburnette.com/shape-dividers-plus/
Description: Adds a number of additional custom shape divider options for Elementor
Version: 1.2.4
Author: Marcus Burnette
Author URI: https://mburnette.com
License: GPLv2 or later
Text Domain: shape-dividers-plus
*/


/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}


// ---------------------------------------------------------------------------------
// ----- set up all available dividers ------------------------------------------------
// ---------------------------------------------------------------------------------
$GLOBALS['sdpfe_custom_dividers'] = [
    'sdpfe-brush-001' => [
        'title' => _x( 'SD+ Brush 1', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/brushes/sdpfe-brush-001.svg',
    ],
    'sdpfe-brush-002' => [
        'title' => _x( 'SD+ Brush 2', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/brushes/sdpfe-brush-002.svg',
    ],
    'sdpfe-ink-stripe-001' => [
        'title' => _x( 'SD+ Ink Stripe', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/brushes/sdpfe-ink-stripe-001.svg',
    ],
    'sdpfe-splatter-paint-001' => [
        'title' => _x( 'SD+ Splatter Paint', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/brushes/sdpfe-splatter-paint-001.svg',
    ],
    'sdpfe-splatter-paint-002' => [
        'title' => _x( 'SD+ Splatter Paint 2', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/brushes/sdpfe-splatter-paint-002.svg',
    ],
    'sdpfe-melting-lines-001' => [
        'title' => _x( 'SD+ Melting Lines', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => false,
		'file' => '/assets/dividers/geometric/sdpfe-melting-lines-001c.svg',
    ],
    'sdpfe-grass-001' => [
        'title' => _x( 'SD+ Grass', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => false,
		'file' => '/assets/dividers/misc/sdpfe-grass-001.svg',
    ],
    'sdpfe-halftone-001' => [
        'title' => _x( 'SD+ Halftone', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/geometric/sdpfe-halftone-001.svg',
    ],
    'sdpfe-geometric-001' => [
        'title' => _x( 'SD+ Geometric Chevrons 1', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/geometric/sdpfe-geometric-001.svg',
    ],
    'sdpfe-geometric-002' => [
        'title' => _x( 'SD+ Geometric Polygons', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/geometric/sdpfe-geometric-002.svg',
    ],
    'sdpfe-cardboard-001' => [
        'title' => _x( 'SD+ Cardboard', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/paper/sdpfe-cardboard-001.svg',
    ],
    'sdpfe-papertear-001' => [
        'title' => _x( 'SD+ Paper Tear 1', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/paper/sdpfe-papertear-001.svg',
    ],
    'sdpfe-papertear-002' => [
        'title' => _x( 'SD+ Paper Tear 2', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/paper/sdpfe-papertear-002.svg',
    ],
    'sdpfe-papertear-003' => [
        'title' => _x( 'SD+ Paper Tear 3', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/paper/sdpfe-papertear-003.svg',
    ],
	'sdpfe-tape-measure-001' => [
        'title' => _x( 'SD+ Tape Measure', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => false,
		'height_only' => true,
		'file' => '/assets/dividers/misc/sdpfe-tape-measure-001.svg',
    ],
    'sdpfe-wood-001' => [
        'title' => _x( 'SD+ Wood 1', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/wood/sdpfe-wood-001.svg',
    ],
    'sdpfe-wood-002' => [
        'title' => _x( 'SD+ Wood 2', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/wood/sdpfe-wood-002.svg',
	],
	'sdpfe-tire-tread-001' => [
        'title' => _x( 'SD+ Tire Tread', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/misc/sdpfe-tire-tread-001.svg',
    ],
	'sdpfe-offroad-tread-001' => [
        'title' => _x( 'SD+ Offroad Tire Tread', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => true,
		'file' => '/assets/dividers/misc/sdpfe-offroad-tread-001.svg',
	],
	'sdpfe-holiday-lights-001' => [
        'title' => _x( 'SD+ Holiday Lights', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => false,
		'file' => '/assets/dividers/misc/sdpfe-holiday-lights-001.svg',
    ],
	'sdpfe-sprinkles-001' => [
        'title' => _x( 'SD+ Sprinkles', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => false,
		'file' => '/assets/dividers/misc/sdpfe-sprinkles-001.svg',
    ],
	'sdpfe-jagged-edge-001' => [
        'title' => _x( 'SD+ Jagged Edge', 'Shapes', 'elementor' ),
		'has_negative' => false,
		'has_flip' => true,
		'height_only' => false,
		'file' => '/assets/dividers/misc/sdpfe-jagged-edge-001.svg',
    ],
];

// ---------------------------------------------------------------------------------
// ----- add dividers to elementor (via filter hook) -------------------------------
// ---------------------------------------------------------------------------------
add_filter( 'elementor/shapes/additional_shapes', function( $additional_shapes ) {

    foreach($GLOBALS['sdpfe_custom_dividers'] as $k => $v){
        $additional_shapes[$k] = [
            'title' => $v['title'],
            'has_negative' => $v['has_negative'],
            'has_flip' => $v['has_flip'],
            'height_only' => $v['height_only'],
            'url' => plugin_dir_url(__FILE__) . $v['file'],
            'path' => plugin_dir_path(__FILE__) . $v['file'],
        ];
    }

    return $additional_shapes;
});